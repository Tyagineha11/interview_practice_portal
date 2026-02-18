<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<?php
include 'header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'candidate'){
    header('Location: login.php'); 
    exit;
}

$user_id = $_SESSION['user']['id'];

// Fetch all results for this candidate
$sql = "
    SELECT ir.score, ir.total, i.title
    FROM interview_results ir
    JOIN interviews i ON ir.interview_id = i.id
    WHERE ir.user_id = $user_id
    ORDER BY ir.created_at DESC
";

$results = $conn->query($sql);

if(!$results){
    echo "<p style='color:red; text-align:center;'>SQL Error: " . $conn->error . "</p>";
    $results = null;
}
?>

<div class="dashboard-container">
  <?php include 'sidebar.php'; ?>
  <main class="main-content">
    <div class="card">
      <div class="profile-header">
        <h1><i class="fa fa-chart-line"></i> My Scores</h1>
      </div>

      <?php if($results && $results->num_rows > 0): ?>
        <table class="score-table">
          <thead>
            <tr>
              <th>Interview</th>
              <th>Your Score</th>
              <th>Feedback</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row = $results->fetch_assoc()): 
                $score = intval($row['score']);
                $total = intval($row['total']) ?: 500; // fallback if total is null
                $percent = $total > 0 ? ($score / $total) * 100 : 0;

                // Feedback logic
                if($percent < 50){
                    $feedback = "Needs Improvement";
                    $color = "#ff6b6b";
                } elseif($percent < 80){
                    $feedback = "Good";
                    $color = "#f0ad4e";
                } elseif($percent < 100){
                    $feedback = "Excellent";
                    $color = "#1bd15b";
                } else {
                    $feedback = "Outstanding";
                    $color = "#00d4ff";
                }
            ?>
            <tr>
              <td><?php echo htmlspecialchars($row['title']); ?></td>
              <td><?php echo $score . " / " . $total; ?></td>
              <td style="color:<?php echo $color; ?>; font-weight:700;"><?php echo $feedback; ?></td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      <?php else: ?>
        <p style="color:#fff; text-align:center; font-size:18px;">No interviews attempted yet.</p>
      <?php endif; ?>

    </div>
  </main>
</div>

<style>
.dashboard-container { display:flex; min-height:100vh; background:#0f111a; font-family:'Poppins',sans-serif; }
.main-content { flex-grow:1; padding:40px; }
.card { background: linear-gradient(145deg,#1e1e2f,#27293d); padding:30px; border-radius:20px; box-shadow:0 8px 30px rgba(0,0,0,0.5); color:#fff; }

.profile-header { text-align:center; margin-bottom:30px; }
.profile-header h1 { font-size:32px; color:#00d4ff; display:inline-block; position:relative; font-weight:700; }
.profile-header h1 i { margin-right:10px; }
.profile-header h1::after { content:''; display:block; width:113%; height:4px; background: linear-gradient(to right,#00d4ff,#007bff); margin:10px auto 0; border-radius:2px; }

.score-table { width:100%; border-collapse: collapse; margin-top:20px; }
.score-table th, .score-table td { padding:12px 15px; border:1px solid #444; text-align:center; }
.score-table th { background:#00d4ff; color:#1a1f36; }
.score-table tr:nth-child(even) { background:#1a1f36; }
.score-table tr:nth-child(odd) { background:#27293d; }
.score-table td { color:#fff; }

@media(max-width:900px){
  .dashboard-container{ flex-direction:column; }
  .main-content{ padding:20px; }
  .score-table th, .score-table td { padding:8px; font-size:14px; }
}
</style>

<?php include 'footer.php'; ?>
