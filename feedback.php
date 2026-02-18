<?php
include 'header.php';
if(!isset($_SESSION['user'])){ header('Location: login.php'); exit; }
$attempt_id = isset($_GET['a']) ? intval($_GET['a']) : 0;
$attempt = $conn->query('SELECT a.*, i.title FROM attempts a JOIN interviews i ON a.interview_id=i.id WHERE a.id='.$attempt_id)->fetch_assoc();
if(!$attempt){ echo '<div class="notice">Attempt not found</div>'; include 'footer.php'; exit; }
$answers = $conn->query('SELECT ans.*, q.qtext FROM answers ans JOIN questions q ON ans.question_id=q.id WHERE ans.attempt_id='.$attempt_id);
?>
<div class="card">
  <h3>Feedback for: <?php echo htmlspecialchars($attempt['title']); ?></h3>
  <p>Score: <?php echo $attempt['score'].' / '.$attempt['total']; ?></p>
  <h4>Answers</h4>
  <table class="table"><tr><th>Q</th><th>Your Answer</th><th>Points</th></tr>
  <?php while($r=$answers->fetch_assoc()){
    echo '<tr><td>'.htmlspecialchars($r['qtext']).'</td><td>'.htmlspecialchars($r['answer']).'</td><td>'.$r['points_awarded'].'</td></tr>';
  } ?>
  </table>
</div>
<?php include 'footer.php'; ?>