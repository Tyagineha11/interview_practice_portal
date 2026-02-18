<?php
include 'header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'candidate'){
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user']['id'];

// ================= Total Interviews =================
$total_interviews = $conn->query("SELECT id FROM interviews")->num_rows;

// ================= Completed Interviews =================
$completed_interviews = $conn->query("SELECT id FROM candidate_scores WHERE user_id = $user_id AND score IS NOT NULL")->num_rows;


// ================= Total Questions =================
$total_questions = $conn->query("SELECT COUNT(*) AS total FROM questions")->fetch_assoc()['total'];

// ================= Questions Solved by User =================
// Count total questions attempted by the user
$attempted_res = $conn->query("SELECT COUNT(question_id) AS total_solved FROM candidate_scores WHERE user_id = $user_id");
$total_solved_questions = ($attempted_res && $attempted_res->num_rows > 0) ? $attempted_res->fetch_assoc()['total_solved'] : 0;

// ================= Pending Questions =================
$pending_question_count = $total_questions - $completed_interviews;
?>

<div class="dashboard-container">

  <!-- Sidebar -->
  <?php include 'sidebar.php'; ?>

  <!-- Main Content -->
  <main class="main-content">

    <!-- Welcome Card -->
    <div class="card welcome-card">
      <h3>Welcome, <?php echo htmlspecialchars($_SESSION['user']['name']); ?></h3>
      <p class="small">Here’s your dashboard overview:</p>
      <div class="stats-cards">
        <div class="stat-card">
                    <h4>Total Courses</h4>
                    <p><?php echo $total_interviews; ?></p>
                </div>

                <div class="stat-card">
                    <h4>Completed Questions</h4>
                    <p><?php echo $completed_interviews; ?></p>
                </div>

                <div class="stat-card">
                    <h4>Pending Questions</h4>
                    <p><?php echo $pending_question_count; ?></p>
                </div>

                <div class="stat-card">
                    <h4>Total Questions</h4>
                    <p><?php echo $total_questions; ?></p>
                </div>
      </div>
    </div>

    <!-- Available Interviews Table -->
    <div class="card">
      <h3>Available Interviews</h3>

      <table class="table">
        <thead>
          <tr>
            <th>Title</th>
            <th>Domain</th>
            <th>Level</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
      $res = $conn->query('SELECT * FROM interviews ORDER BY created_at DESC');
      if($res && $res->num_rows > 0){
        while($r = $res->fetch_assoc()){
        $interview_id = $r['id'];

        // Total questions in this interview
        $total_questions = $conn->query("SELECT COUNT(*) AS total FROM questions WHERE interview_id = $interview_id")->fetch_assoc()['total'];

        // Questions attempted by this user in this interview
        $attempted = $conn->query("SELECT COUNT(*) AS attempted_count FROM candidate_scores WHERE user_id = $user_id AND interview_id = $interview_id")->fetch_assoc()['attempted_count'];

        // Determine status
          if($attempted == $total_questions && $total_questions > 0){
              $status_text = 'Completed';
              $status_class = 'status-completed';
          } else {
              $status_text = 'Pending';
              $status_class = 'status-pending';
          }

          // Action button
          $action_btn = ($status_text == 'Pending') 
                          ? '<a class="btn-action" href="take_interview.php?i='.$interview_id.'">Take</a>' 
                          : '<span class="btn-completed">Completed</span>';

          // Output row
          echo '<tr>
                  <td>'.htmlspecialchars($r['title']).'</td>
                  <td>'.htmlspecialchars($r['domain']).'</td>
                  <td>'.htmlspecialchars($r['level']).'</td>
                  <td><span class="status-badge '.$status_class.'">'.$status_text.'</span></td>
                  <td>'.$action_btn.'</td>
                </tr>';

              }
          } else {
              echo '<tr><td colspan="5" style="text-align:center;">No interviews available</td></tr>';
          }
?>

<style>
.status-badge {
    color: #fff;
    padding: 6px 12px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 14px;
    display: inline-block;
    text-align: center;
}

.status-pending {
    background-color: #f1c40f; /* yellow */
}

.status-completed {
    background-color: #2ecc71; /* green */
}
</style>

        </tbody>
      </table>
    </div>

    <!-- Recent Activity Card -->
    <div class="card">
      <h3>Recent Activity</h3>
      <ul class="activity-list">
        <ul class="activity-list">
          <?php
          $activity = $conn->query("
              SELECT i.title, a.score, a.created_at 
              FROM candidate_scores a
              JOIN interviews i ON i.id = a.interview_id
              WHERE a.user_id = $user_id
              ORDER BY a.created_at DESC
              LIMIT 5
          ");

          if($activity && $activity->num_rows > 0){
              while($act = $activity->fetch_assoc()){
                  $status_text = ($act['score'] !== null && $act['score'] > 0) ? 'Completed' : 'Started';
                  echo '<li>'.htmlspecialchars($status_text).' "'.htmlspecialchars($act['title']).'" on '.date('d M Y', strtotime($act['created_at'])).'</li>';
              }
          } else {
              echo '<li>No recent activity</li>';
          }
          ?>
        </ul>

      </ul>
    </div>

  </main>

</div>

<style>
/* ================= Dashboard Container ================= */
.dashboard-container {
  display: flex;
  min-height: 100vh;
  background: #0f111a;
  font-family: 'Poppins', sans-serif;
}



/* ================= Main Content ================= */
.main-content {
  flex-grow: 1;
  padding: 40px;
}

/* ================= Cards ================= */
.card {
  background: linear-gradient(145deg, #1e1e2f, #27293d);
  padding: 30px;
  border-radius: 20px;
  box-shadow: 0 8px 30px rgba(0,0,0,0.5);
  color: #fff;
  margin-bottom: 30px;
}

h3 {
  margin-bottom: 15px;
  color: #fff;
}

p.small {
  color: #bbb;
}

/* ================= Stats Cards ================= */
.stats-cards {
  display: flex;
  gap: 20px;
  margin-top: 15px;
}
.stat-card {
  background: #1a1f36;
  flex: 1;
  text-align: center;
  padding: 20px;
  border-radius: 15px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.3);
  transition: 0.3s;
}
.stat-card:hover {
  transform: translateY(-3px);
  background: #00d4ff;
  color: #1a1f36;
}

/* ================= Table ================= */
.table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0 15px; /* space between rows */
  margin-top: 25px;
}

.table th {
  background: #0d111f;
  color: #00d4ff;
  font-weight: 700;
  font-size: 16px;
  padding: 15px 20px;
  border-radius: 12px 12px 0 0;
  text-align: left;
}

.table tbody tr {
  background: #1a1f36;
  transition: all 0.3s ease;
  box-shadow: 0 5px 15px rgba(0,0,0,0.25);
  border-radius: 12px;
}

.table tbody tr td {
  padding: 15px 20px;
  font-size: 15px;
  color: #fff;
}

.table tbody tr:hover {
  transform: translateY(-4px);
  background: #00d4ff;
  color: #1a1f36;
}

.table tbody tr:hover td {
  color: #1a1f36;
}

/* ================= Buttons ================= */
.btn-action {
  background: #3c40ed;
  color: #fff;
  padding: 10px 20px;
  border-radius: 15px;
  font-weight: 700;
  font-size: 14px;
  text-decoration: none;
  transition: all 0.3s ease;
}
.btn-action:hover {
  background: #007bff;
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(0,123,255,0.5);
}

.btn-completed {
  background: #2ecc71;
  color: #fff;
  padding: 8px 18px;
  border-radius: 12px;
  font-weight: 600;
  font-size: 14px;
  display: inline-block;
  text-align: center;
}

.btn-completed:hover {
  background: #27ae60;
  cursor: default;
}

/* ================= Activity List ================= */
.activity-list {
  list-style: none;
  padding: 0;
}

.activity-list li {
  padding: 12px 15px;
  background: #1a1f36;
  border-radius: 12px;
  margin-bottom: 10px;
  transition: 0.3s;
}

.activity-list li:hover {
  background: #00d4ff;
  color: #1a1f36;
}

/* ================= Responsive ================= */
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

  /* Tables scrollable */
  .table {
    display: block;
    width: 100%;
    overflow-x: auto;
  }

  .table th, .table td {
    padding: 12px 10px;
    font-size: 13px;
  }

  /* Buttons smaller */
  .btn-action, .btn-completed {
    padding: 8px 12px;
    font-size: 13px;
  }

  /* Activity list */
  .activity-list li {
    padding: 10px 12px;
    font-size: 14px;
  }

  /* Card padding */
  .card {
    padding: 20px;
  }

}

/* Extra small screens (<480px) */
@media (max-width: 480px) {

  .stats-cards {
    gap: 10px;
  }

  .stat-card {
    font-size: 13px;
    padding: 12px;
  }

  .table th, .table td {
    font-size: 12px;
    padding: 10px 8px;
  }

  .btn-action, .btn-completed {
    font-size: 12px;
    padding: 6px 10px;
  }

  .activity-list li {
    font-size: 13px;
    padding: 8px 10px;
  }

}


</style>

<?php include 'footer.php'; ?>
