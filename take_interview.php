<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
include 'header.php';
if(!isset($_SESSION['user'])){
    header('Location: login.php'); exit;
}

$user_id = $_SESSION['user']['id'];
$interview_id = isset($_GET['i']) ? intval($_GET['i']) : 0;

// Fetch interview info
$interview = $conn->query("SELECT * FROM interviews WHERE id=$interview_id")->fetch_assoc();
if(!$interview){
    echo "<div class='notice'>Interview not found.</div>";
    include 'footer.php'; exit;
}

// Fetch all questions
$qres = $conn->query("SELECT * FROM questions WHERE interview_id=$interview_id");
$questions = [];
while($q = $qres->fetch_assoc()){ $questions[] = $q; }
$total_questions = count($questions);

// Fetch user's previous answers
$answeredQRes = $conn->query("SELECT question_id, answer, score FROM user_answers WHERE user_id=$user_id AND interview_id=$interview_id");
$answeredQuestions = [];
$prevScore = 0;
while($ar = $answeredQRes->fetch_assoc()) {
    $answeredQuestions[$ar['question_id']] = [
        'answer' => $ar['answer'],
        'score' => $ar['score']
    ];
    $prevScore += $ar['score'];
}

// Total possible points
$totalPoints = array_sum(array_map(fn($q)=>intval($q['points']??1), $questions));
?>

<div class="dashboard-container">
    <?php include 'sidebar.php'; ?>
    <main class="main-content">
        <div class="card">
            <div class="total-questions" id="totalQuestions">Question 1 of <?php echo $total_questions; ?></div>
            <div class="profile-header">
                <h1><i class="fa fa-pencil-alt"></i> <?php echo htmlspecialchars($interview['title']); ?> Interview</h1>
            </div>

            <form id="quizForm">
                <input type="hidden" name="interview_id" value="<?php echo $interview_id; ?>">

                <?php 
                $firstUnsolvedFound = false;
                foreach($questions as $index => $q): 
                    $opts = array_map('trim', explode(',', $q['options']));
                    $isSubmitted = isset($answeredQuestions[$q['id']]);
                    $userPrevAns = $isSubmitted ? $answeredQuestions[$q['id']]['answer'] : '';
                    $displayStyle = (!$isSubmitted && !$firstUnsolvedFound) ? 'block' : 'none';
                    if($displayStyle==='block') $firstUnsolvedFound=true;
                ?>
                <div class="question" data-index="<?php echo $index; ?>" data-submitted="<?php echo $isSubmitted ? '1':'0'; ?>" style="display:<?php echo $displayStyle; ?>">
                    <label><strong>Q<?php echo $index+1; ?>.</strong> <?php echo htmlspecialchars($q['qtext']); ?></label>
                    <?php foreach($opts as $opt): ?>
                        <div class="option" style="<?php echo ($isSubmitted && $opt==$q['correct_answer']) ? 'background:rgba(40,167,69,0.12);' : ''; ?>">
                            <label>
                                <input type="radio" name="answer[<?php echo $q['id']; ?>]" value="<?php echo htmlspecialchars($opt); ?>" 
                                <?php echo $opt==$userPrevAns ? 'checked disabled' : ''; ?> >
                                <?php echo htmlspecialchars($opt); ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                    <?php if($isSubmitted): ?>
                        <div class="correctness" style="margin-top:10px;padding:8px;border-radius:8px;font-weight:600;color:<?php echo ($userPrevAns==$q['correct_answer']) ? '#1bd15b':'#ff6b6b'; ?>;">
                            <?php echo ($userPrevAns==$q['correct_answer']) ? "✅ Correct Answer! (+{$answeredQuestions[$q['id']]['score']} points)" : "❌ Incorrect Answer! Correct: {$q['correct_answer']}"; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>

                <div class="quiz-nav">
                    <button type="button" id="submitBtn" class="btn-action" style="background:#28a745;">Submit</button>
                    <div class="right-buttons">
                        <button type="button" id="prevBtn" class="btn-action" disabled style="background:#c8e932;">Previous</button>
                        <button type="button" id="nextBtn" class="btn-action">Next</button>
                        <button type="button" id="clearBtn" class="btn-action" style="background:red;color:white;">Clear</button>
                        <button type="button" id="finishQuiz" class="btn-action" style="background:#007bff;">Finish Quiz</button>
                    </div>
                </div>

                <div id="scoreCard" style="display:block;margin-top:30px;padding:20px;background:#1a1f36;border-radius:10px;color:white;">
                    <h3>Score Card</h3>
                    <p>Current Score: <b id="currentScore"><?php echo $prevScore; ?></b> / <b id="totalScore"><?php echo $totalPoints; ?></b></p>
                </div>
            </form>
        </div>
    </main>
</div>

<?php include 'footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', ()=>{
    let currentQ = 0;
    let totalScore = <?php echo $prevScore; ?>;
    const questions = document.querySelectorAll('.question');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const clearBtn = document.getElementById('clearBtn');
    const submitBtn = document.getElementById('submitBtn');
    const finishBtn = document.getElementById('finishQuiz');

    function showQ(index){
        questions.forEach((q,i)=>q.style.display = i===index ? 'block':'none');
        prevBtn.disabled = index===0;
        nextBtn.disabled = index===questions.length-1;
        submitBtn.innerText = questions[index].dataset.submitted==='1' ? 'Submitted' : 'Submit';
        submitBtn.disabled = questions[index].dataset.submitted==='1';
        document.getElementById('totalQuestions').innerText = `Question ${index+1} of ${questions.length}`;
    }

    for(let i=0;i<questions.length;i++){
        if(questions[i].dataset.submitted==='0'){ currentQ=i; break; }
    }
    showQ(currentQ);

    nextBtn.onclick = ()=>{
        let next = currentQ;
        do { next++; if(next>=questions.length) break; } while(questions[next].dataset.submitted==='1');
        if(next<questions.length){ currentQ=next; showQ(currentQ);}
    };
    prevBtn.onclick = ()=>{
        let prev = currentQ;
        do { prev--; if(prev<0) break; } while(questions[prev].dataset.submitted==='1');
        if(prev>=0){ currentQ=prev; showQ(currentQ);}
    };
    clearBtn.onclick = ()=>{
        if(questions[currentQ].dataset.submitted==='1') return;
        questions[currentQ].querySelectorAll('input[type=radio]').forEach(r=>r.checked=false);
    };

    submitBtn.onclick = ()=>{
        const qDiv = questions[currentQ];
        if(qDiv.dataset.submitted==='1') return;

        const qData = <?php echo json_encode($questions); ?>[currentQ];
        const formData = new FormData(document.getElementById('quizForm'));
        const userAnsRaw = (formData.get(`answer[${qData.id}]`)||'').trim();
        if(!userAnsRaw){ alert("Please select an answer!"); return; }

        const correctOption = (qData.correct_answer||'').trim().charAt(0).toUpperCase();
        const userOption = userAnsRaw.charAt(0).toUpperCase();

        qDiv.querySelectorAll('.option').forEach(opt=>{
            const val = opt.querySelector('input').value.trim();
            if(val.charAt(0).toUpperCase()===correctOption){ opt.style.background='rgba(40,167,69,0.12)'; }
            if(opt.querySelector('input').checked && val.charAt(0).toUpperCase()!==correctOption){ opt.style.background='rgba(255,77,77,0.12)'; }
            opt.querySelector('input').disabled=true;
        });

        const msg=document.createElement('div');
        msg.classList.add('correctness');
        msg.style.marginTop='10px'; msg.style.fontWeight='600'; msg.style.padding='8px'; msg.style.borderRadius='8px';
        let scoreToAdd = 0;
        if(userOption===correctOption){
            scoreToAdd = parseInt(qData.points)||1;
            totalScore += scoreToAdd;
            msg.textContent = `✅ Correct Answer! (+${scoreToAdd} points)`;
            msg.style.color='#1bd15b';
        } else {
            msg.textContent = `❌ Incorrect Answer! Correct: ${correctOption}`;
            msg.style.color='#ff6b6b';
        }
        qDiv.appendChild(msg);

        qDiv.dataset.submitted='1';
        submitBtn.disabled=true;
        submitBtn.innerText='Submitted';

        document.getElementById('currentScore').textContent = totalScore;

        fetch('save_score.php',{
          method:'POST',
          headers:{'Content-Type':'application/json'},
          body:JSON.stringify({
            user_id: <?php echo $user_id; ?>,
            interview_id: <?php echo $interview_id; ?>,
            question_id: qData.id,
            answer: userAnsRaw,
            score: scoreToAdd
          })
        });
    };

    finishBtn.onclick = ()=>{
    fetch('save_score.php',{
        method:'POST',
        headers:{'Content-Type':'application/json'},
        body:JSON.stringify({
            user_id: <?php echo $user_id; ?>,
            interview_id: <?php echo $interview_id; ?>,
            score: totalScore,
            total: <?php echo $totalPoints; ?>
        })
    }).then(res=>res.json())
    .then(data=>{
        if(data.success){
            Swal.fire({
                icon: 'success',
                title: '✅ Your final score has been saved!',
                html: `Total Score: <b>${totalScore}</b> / ${<?php echo $totalPoints; ?>}`,
                confirmButtonText: 'OK'
            });
            document.getElementById('currentScore').textContent = totalScore;
        } else {
            Swal.fire({
                icon: 'error',
                title: '⚠️ Could not save score',
                text: 'Try again.',
                confirmButtonText: 'OK'
            });
        }
    });
};

});
</script>



<style>
  /* Existing dashboard, card, header styles... same as before */
.question{margin-bottom:20px;}

.btn-action{
  background:#00d4ff;color:#1a1f36;padding:10px 20px;border-radius:10px;border:none;cursor:pointer;font-weight:700;
}
.btn-action:hover{background:#007bff;color:#fff;}
textarea.form-control{width:100%;padding:10px;border-radius:8px;border:none;background:#1a1f36;color:#fff;resize:vertical;}
.option{margin-bottom:10px;}
  .total-questions {
  position: absolute;
  top: 20px;
  right: 30px;
  font-weight: 600;
  font-size: 16px;
  color: #00d4ff;
}
.card {
  position: relative; /* required for absolute positioning */
}



  .quiz-nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 25px;
  flex-wrap: wrap;
  gap: 10px;
}


/* Right side buttons container */
.right-buttons {
  display: flex;
  gap: 10px;
}



/* Common button styles */
.btn-action {
  padding: 12px 25px;
  border-radius: 12px;
  font-weight: 700;
  border: none;
  cursor: pointer;
  transition: all 0.3s ease;
  min-width: 100px;
  text-align: center;
}

  /* Dashboard layout */
.dashboard-container {
  display: flex;
  min-height: 100vh;
  background: #0f111a;
  font-family: 'Poppins', sans-serif;
}

/* Main content */
.main-content {
  flex-grow: 1;
  padding: 40px;
}

/* Card */
.card {
  background: linear-gradient(145deg, #1e1e2f, #27293d);
  padding: 30px;
  border-radius: 20px;
  box-shadow: 0 8px 30px rgba(0,0,0,0.5);
  color: #fff;
  max-width: 900px;
  margin: 0 auto;
}

/* Profile Header */
.profile-header {
  text-align: center;
  margin-bottom: 30px;
}
.profile-header h1 {
  font-size: 28px;
  color: #00d4ff;
  font-weight: 700;
  display: inline-block;
  position: relative;
}
.profile-header h1 i {
  margin-right: 10px;
}
.profile-header h1::after {
  content: '';
  display: block;
  width: 120%;
  height: 4px;
  background: linear-gradient(to right,#00d4ff,#007bff);
  margin: 10px auto 0;
  border-radius: 2px;
}
.profile-header p {
  font-size: 14px;
  color: #aaa;
  margin-top: 5px;
}

/* Questions */
.question {
  margin-bottom: 25px;
  padding: 20px;
  border-radius: 15px;
  background: #1a1f36;
  box-shadow: inset 0 0 10px rgba(0,0,0,0.3);
}

/* Question label */
.question label {
  font-weight: 600;
  font-size: 16px;
  display: block;
  margin-bottom: 15px;
}

/* MCQ options */
.option {
  margin-bottom: 12px;
}
.option input[type="radio"] {
  margin-right: 10px;
}

/* Textarea for text questions */
textarea.form-control {
  width: 100%;
  padding: 12px;
  border-radius: 10px;
  border: none;
  outline: none;
  font-size: 14px;
  background: #121625;
  color: #fff;
  resize: vertical;
  box-shadow: inset 0 0 5px rgba(0,0,0,0.5);
}

/* Quiz navigation buttons */

.btn-action {
  background: #00d4ff;
  color: #1a1f36;
  padding: 12px 25px;
  border-radius: 12px;
  font-weight: 700;
  border: none;
  cursor: pointer;
  transition: all 0.3s ease;
  min-width: 100px;
  text-align: center;
}
.btn-action:hover {
  background: #007bff;
  color: #fff;
}

/* ================= Responsive for Mobile ================= */
@media (max-width: 768px) {

  /* Dashboard flex layout */
  .dashboard-container {
    flex-direction: column;
  }

  /* Main content padding */
  .main-content {
    padding: 20px 15px;
  }

  /* Stats cards stacked vertically */
  .stats-cards {
    flex-direction: column;
    gap: 15px;
  }

  .stat-card {
    padding: 15px;
    font-size: 14px;
  }
  /* ===== Card ===== */
.card {
  background: linear-gradient(145deg, #1e1e2f, #27293d);
  padding: 25px;
  border-radius: 20px;
  box-shadow: 0 8px 30px rgba(0,0,0,0.5);
  color: #fff;
  max-width: 900px;
  margin: 0 auto;
  position: relative; /* for absolute positioning elements inside */
}

/* ===== Profile Header ===== */
.profile-header {
  text-align: center;
  margin-bottom: 25px;
}
.profile-header h1 {
  font-size: 26px;
  color: #00d4ff;
  font-weight: 700;
  display: inline-block;
  position: relative;
}
.profile-header h1 i {
  margin-right: 10px;
}
.profile-header h1::after {
  content: '';
  display: block;
  width: 97%;
  height: 4px;
  background: linear-gradient(to right,#00d4ff,#007bff);
  margin: 10px auto 0;
  border-radius: 2px;
}

/* ===== Total Questions ===== */
.total-questions {
  position: absolute;
  top: 20px;
  right: 20px;
  font-weight: 600;
  font-size: 14px;
  color: #00d4ff;
}

/* ===== Questions ===== */
.question {
  margin-bottom: 20px;
  padding: 18px;
  border-radius: 15px;
  background: #1a1f36;
  box-shadow: inset 0 0 10px rgba(0,0,0,0.3);
}
.question label {
  font-weight: 600;
  font-size: 15px;
  display: block;
  margin-bottom: 12px;
}

/* ===== Options ===== */
.option {
  margin-bottom: 10px;
  padding: 8px 12px;
  border-radius: 8px;
  background: #141526;
  cursor: pointer;
  transition: 0.3s;
}
.option:hover { background: #007bff33; }
.option input[type="radio"] { margin-right: 10px; }

/* ===== Textarea ===== */
textarea.form-control {
  width: 100%;
  padding: 12px;
  border-radius: 10px;
  border: none;
  background: #121625;
  color: #fff;
  font-size: 14px;
  resize: vertical;
  box-shadow: inset 0 0 5px rgba(0,0,0,0.5);
}

/* ===== Navigation Buttons ===== */
.quiz-nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 20px;
  flex-wrap: wrap;
  gap: 10px;
}
.right-buttons {
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
}

.btn-action {
  background: #00d4ff;
  color: #1a1f36;
  padding: 12px 25px;
  border-radius: 12px;
  font-weight: 700;
  border: none;
  cursor: pointer;
  transition: all 0.3s ease;
  min-width: 100px;
  text-align: center;
}
.btn-action:hover { background: #007bff; color: #fff; }

/* ===== Score Card ===== */
#scoreCard {
  display: block;
  margin-top: 25px;
  padding: 20px;
  background: #1a1f36;
  border-radius: 12px;
  color: #fff;
}
}

/* ===== Responsive ===== */
@media (max-width: 900px){
  .main-content { padding: 20px; }
  .quiz-nav { flex-direction: column; align-items: stretch; }
  .right-buttons { justify-content: flex-start; flex-wrap: wrap; }
  .total-questions { position: relative; top: auto; right: auto; margin-bottom: 15px; }
  .profile-header h1 { font-size: 22px; }
  .question label { font-size: 14px; }
  .option { font-size: 14px; padding: 6px 10px; }
  .btn-action { padding: 10px 20px; font-size: 14px; min-width: 80px; }
}

@media (max-width: 480px){
  .profile-header h1 { font-size: 20px; }
  .question label { font-size: 13px; }
  .option { font-size: 13px; }
  .btn-action { width: 100%; min-width: unset; padding: 10px; }
  .quiz-nav { gap: 8px; }
}

</style>
