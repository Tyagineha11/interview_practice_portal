<?php
include 'header.php';
if(!isset($_SESSION['user'])){ 
    header('Location: login.php'); 
    exit; 
}

$user_id = $_SESSION['user']['id'];
$interview_id = intval($_POST['interview_id']);
$answers = isset($_POST['answer']) ? $_POST['answer'] : [];

// Fetch all questions for that interview
$qResult = $conn->query("SELECT id, correct_answer, points FROM questions WHERE interview_id=$interview_id");

$totalPoints = 0;
$score = 0;

while($q = $qResult->fetch_assoc()){
    $qid = $q['id'];
    $correct = trim(strtolower($q['correct_answer']));
    $points = intval($q['points']);
    $totalPoints += $points;

    if(isset($answers[$qid])){
        $userAnswer = trim(strtolower($answers[$qid]));
        if($userAnswer === $correct){
            $score += $points;
        }
    }
}
?>

<div class="dashboard-container">
  <?php include 'sidebar.php'; ?>
  <main class="main-content">
    <div class="card result-card">
      <h2 class="result-title">Interview Result</h2>
      <p class="score-text">
        🎯 Your Score: <span class="score"><?php echo $score; ?></span> / 
        <span class="total"><?php echo $totalPoints; ?></span>
      </p>
      
      <div class="progress-bar">
        <div class="progress" style="width: <?php echo ($totalPoints>0 ? ($score/$totalPoints)*100 : 0); ?>%;"></div>
      </div>

      <a href="mu_interview.php" class="btn-back">← Back to Interviews</a>
    </div>
  </main>
</div>

<style>
.result-card {
  text-align: center;
  padding: 50px;
  background: linear-gradient(145deg, #1e1e2f, #27293d);
  color: #fff;
  border-radius: 20px;
  box-shadow: 0 8px 30px rgba(0,0,0,0.5);
  max-width: 700px;
  margin: 100px auto;
}
.result-title {
  color: #00d4ff;
  font-size: 28px;
  font-weight: 700;
  margin-bottom: 20px;
}
.score-text {
  font-size: 22px;
  font-weight: 600;
  margin-bottom: 25px;
}
.score {
  color: #28a745;
  font-weight: 700;
  font-size: 26px;
}
.total {
  color: #ffb700;
  font-size: 22px;
}
.progress-bar {
  background: #333;
  border-radius: 20px;
  overflow: hidden;
  height: 20px;
  width: 80%;
  margin: 0 auto 30px;
}
.progress {
  background: linear-gradient(90deg, #00d4ff, #007bff);
  height: 100%;
  border-radius: 20px;
  transition: width 1s ease-in-out;
}
.btn-back {
  display: inline-block;
  padding: 10px 25px;
  background: #00d4ff;
  color: #1a1f36;
  border-radius: 30px;
  text-decoration: none;
  font-weight: 700;
  transition: 0.3s;
}
.btn-back:hover {
  background: #007bff;
  color: #fff;
}
</style>

<?php include 'footer.php'; ?>
