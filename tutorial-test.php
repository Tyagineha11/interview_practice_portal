<?php
include 'header.php';

// Validate Subtopic ID
if (!isset($_GET['sub_id']) || !is_numeric($_GET['sub_id'])) {
    echo "<h3 style='color:red; text-align:center;'>Invalid Subtopic ID</h3>";
    exit;
}

$subtopic_id = intval($_GET['sub_id']);

// ================= Fetch Tutorial + Subtopic Title =================
$tutStmt = $conn->prepare("
    SELECT 
        ts.title AS subtopic_title,
        t.title AS tutorial_title
    FROM tutorial_subtopics ts
    INNER JOIN tutorials t ON ts.tutorial_id = t.id
    WHERE ts.id = ?
");

$tutStmt->bind_param("i", $subtopic_id);
$tutStmt->execute();
$tutRes = $tutStmt->get_result();

if ($tutRes->num_rows == 0) {
    echo "<h3 style='color:red; text-align:center;'>Subtopic Not Found</h3>";
    exit;
}

$data = $tutRes->fetch_assoc();

$subtopicTitle  = htmlspecialchars($data['subtopic_title']);
$tutorialTitle  = htmlspecialchars($data['tutorial_title']);


// ================= Fetch Questions =================
$stmt = $conn->prepare("SELECT * FROM tutorial_questions WHERE tutorial_subtopic_id = ?");
$stmt->bind_param("i", $subtopic_id);
$stmt->execute();
$res = $stmt->get_result();

if ($res->num_rows == 0) {
    echo "<h3 style='color:orange; text-align:center;'>No questions found for this subtopic.</h3>";
    exit;
}

$question_text = $res->fetch_all(MYSQLI_ASSOC);
?>

<div class="dashboard-container">
  <?php include 'sidebar.php'; ?>

  <main class="main-content">
    <h2><?= $tutorialTitle ?> → <?= $subtopicTitle ?></h2>

    <form id="quizForm">
      <input type="hidden" name="subtopic_id" value="<?= $subtopic_id; ?>">

      <?php foreach ($question_text as $index => $q): ?>
    <div class="question" data-qid="<?= $q['id']; ?>">
        <p><strong>Q<?= $index + 1 ?>:</strong> <?= htmlspecialchars($q['question_text']); ?></p>

        <?php
        // Decode options from JSON
        $options = json_decode($q['options'], true);

        if (!empty($options) && is_array($options)) {
            foreach ($options as $opt) { ?>
                <label>
                    <input type="radio" name="answers[<?= $q['id']; ?>]" value="<?= htmlspecialchars($opt); ?>">
                    <?= htmlspecialchars($opt); ?>
                </label>
            <?php }
        } else {
            echo "<p style='color:red;'>Options not available</p>";
        }
        ?>
    </div>
    <hr>
<?php endforeach; ?>


      <button type="button" id="submitTest" class="btn-test">Submit Test</button>
    </form>

    <div id="scoreCard" style="margin-top:20px; display:none; padding:20px; background:#1a1f36; border-radius:12px; color:white;">
      <h3>Your Score</h3>
      <p id="scoreText"></p>
      <div id="wrongAnswers"></div>
    </div>

  </main>
</div>

<script>
document.getElementById('submitTest').addEventListener('click', function(){
    const form = document.getElementById('quizForm');
    const formData = new FormData(form);

    fetch('submit-test.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {

        if (data.success) {
            document.getElementById('scoreCard').style.display = 'block';
            document.getElementById('scoreText').innerText = 
                `You scored ${data.score} out of ${data.total}`;

            const wrongDiv = document.getElementById('wrongAnswers');
            wrongDiv.innerHTML = '';

            if (data.wrong_questions.length > 0) {
                wrongDiv.innerHTML = '<h4>Incorrect Questions:</h4>';

                data.wrong_questions.forEach(q => {
                    const div = document.createElement('div');
                    div.style.marginBottom = '15px';
                    div.style.padding = '10px';
                    div.style.background = '#2a2d42';
                    div.style.borderRadius = '8px';
                    div.innerHTML = `
                        <strong>Q:</strong> ${q.question}<br>
                        <strong>Your Answer:</strong> ${q.your_answer}<br>
                        <strong>Correct Answer:</strong> ${q.correct_answer}
                    `;
                    wrongDiv.appendChild(div);
                });
            }

        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(err => console.error(err));
});
</script>




<style>
.dashboard-container {
  display: flex;
  min-height: 100vh;
  background: #0e1018;
  font-family: 'Poppins', sans-serif;
}

.main-content {
  flex-grow: 1;
  padding: 40px;
}

h2 {
  color: #00d4ff;
  text-align: center;
  font-size: 28px;
  margin-bottom: 30px;
  position: relative;
}
h2::after {
  content: '';
  display: block;
  width: 150px;
  height: 4px;
  background: linear-gradient(to right, #00d4ff, #007bff);
  margin: 10px auto 0;
  border-radius: 2px;
}

form {
  max-width: 900px;
  margin: 0 auto;
  background: linear-gradient(145deg, #1c1c2b, #242539);
  padding: 30px;
  border-radius: 20px;
  box-shadow: 0 8px 30px rgba(0,0,0,0.5);
  color: #fff;
}

.question {
  background: #1a1c2f;
  border-radius: 15px;
  padding: 20px;
  margin-bottom: 20px;
  box-shadow: inset 0 0 10px rgba(0,0,0,0.3);
}

.question p {
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 10px;
  padding: 8px 12px;
  border-radius: 8px;
  cursor: pointer;
  transition: 0.3s;
  background: #141526;
}
label:hover {
  background: #007bff33;
}

input[type="radio"] {
  margin-right: 10px;
}

.btn-test {
  display: block;
  margin: 20px auto 0;
  background: #00d4ff;
  color: #1a1f36;
  padding: 14px 30px;
  font-size: 16px;
  font-weight: 700;
  border: none;
  border-radius: 12px;
  cursor: pointer;
  transition: 0.3s;
}
.btn-test:hover {
  background: #007bff;
  color: #fff;
}

/* Responsive */
@media(max-width: 768px){
  .main-content {
    padding: 20px;
  }
  form {
    padding: 20px;
  }
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

  /* ===== Form ===== */
form {
  max-width: 100%;
  margin: 0 auto;
  background: linear-gradient(145deg, #1c1c2b, #242539);
  padding: 25px;
  border-radius: 20px;
  box-shadow: 0 8px 30px rgba(0,0,0,0.5);
  color: #fff;
}

/* ===== Questions ===== */
.question {
  background: #1a1c2f;
  border-radius: 15px;
  padding: 15px 18px;
  margin-bottom: 18px;
  box-shadow: inset 0 0 10px rgba(0,0,0,0.3);
}

.question p {
  font-size: 15px;
  font-weight: 600;
  margin-bottom: 12px;
}

/* ===== Options ===== */
label {
  display: block;
  margin-bottom: 10px;
  padding: 8px 12px;
  border-radius: 8px;
  cursor: pointer;
  transition: 0.3s;
  background: #141526;
}
label:hover {
  background: #007bff33;
}
input[type="radio"] {
  margin-right: 10px;
}

/* ===== Submit Button ===== */
.btn-test {
  display: block;
  margin: 20px auto 0;
  background: #00d4ff;
  color: #1a1f36;
  padding: 12px 25px;
  font-size: 15px;
  font-weight: 700;
  border: none;
  border-radius: 12px;
  cursor: pointer;
  transition: 0.3s;
}
.btn-test:hover {
  background: #007bff;
  color: #fff;
}

/* ===== Score Card ===== */
#scoreCard {
  margin-top: 20px;
  padding: 18px;
  background: #1a1f36;
  border-radius: 12px;
  color: white;
}

/* Wrong answer box */
#wrongAnswers div {
  margin-bottom: 12px;
  padding: 10px;
  background: #2a2d42;
  border-radius: 8px;
}
}



/* ===== Responsive ===== */
@media(max-width: 768px){
  .main-content {
    padding: 15px 10px;
  }
  form {
    padding: 18px 15px;
  }
  .question p {
    font-size: 14px;
  }
  label {
    font-size: 14px;
  }
  .btn-test {
    padding: 10px;
    font-size: 14px;
  }
  #scoreCard {
    padding: 15px;
  }
  #wrongAnswers div {
    padding: 8px;
  }
}

@media(max-width: 480px){
  h2 {
    font-size: 22px;
  }
  .question p {
    font-size: 13px;
  }
  label {
    font-size: 13px;
  }
  .btn-test {
    width: 100%; /* full width for small screens */
    padding: 10px;
  }
}
</style>
