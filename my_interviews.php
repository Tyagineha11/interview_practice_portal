<?php
include 'header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'candidate'){
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user']['id'];
?>

<div class="dashboard-container">
  <?php include 'sidebar.php'; ?>

  <main class="main-content">
    <section class="popular-interviews">
      <h2 class="section-title">Popular Interviews</h2>

      <div class="interview-grid">
        <?php
        $res = $conn->query("SELECT * FROM interviews WHERE status='active' ORDER BY created_at DESC");
        if($res && $res->num_rows > 0){
          while($r = $res->fetch_assoc()){
            $img = !empty($r['image']) ? $r['image'] : 'images/default.png';
            echo '
            <div class="interview-card">
              <img src="'.$img.'" alt="'.htmlspecialchars($r['title']).'">
              <h3>'.htmlspecialchars($r['title']).'</h3>
              <p>'.(strlen($r['description'])>100 ? substr($r['description'],0,97).'...' : htmlspecialchars($r['description'])).'</p>
              <div class="meta">
                <span class="tag">'.htmlspecialchars($r['domain']).'</span>
                <span class="level '.strtolower($r['difficulty']).'">'.htmlspecialchars($r['difficulty']).'</span>
              </div>
              <a href="take_interview.php?i='.$r['id'].'" class="btn-start">Start Interview</a>
            </div>';
          }
        } else {
          echo '<p class="no-data">No interviews available yet.</p>';
        }
        ?>
      </div>
    </section>
  </main>
</div>

<style>
/* ===== Dashboard Layout ===== */
.dashboard-container {
  display: flex;
  min-height: 100vh;
  background: #0f111a;
  font-family: 'Poppins', sans-serif;
}

.main-content {
  flex: 1;
  padding: 40px;
}

/* ===== Section Title ===== */
.section-title {
  font-size: 2rem;
  color: #00d4ff;
  margin-bottom: 30px;
  text-align: left;
}

/* ===== Interview Grid ===== */
.interview-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
  gap: 25px;
}

/* ===== Interview Card ===== */
.interview-card {
  background: linear-gradient(145deg, #1e1e2f, #27293d);
  border-radius: 18px;
  padding: 25px;
  text-align: center;
  box-shadow: 0 8px 25px rgba(0,0,0,0.5);
  color: #fff;
  transition: 0.3s ease;
}

.interview-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 0 25px rgba(0,212,255,0.5);
}

.interview-card img {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  object-fit: cover;
  margin-bottom: 15px;
  border: 2px solid #00d4ff;
  box-shadow: 0 0 20px rgba(0,212,255,0.4);
}

.interview-card h3 {
  font-size: 1.3rem;
  margin-bottom: 8px;
  color: #e3f6ff;
}

.interview-card p {
  font-size: 0.9rem;
  color: #bfe8ff;
  line-height: 1.5;
  margin-bottom: 15px;
  min-height: 60px;
}

/* ===== Meta Tags ===== */
.meta {
  display: flex;
  justify-content: center;
  gap: 10px;
  margin-bottom: 20px;
}

.tag {
  background: rgba(0,212,255,0.1);
  padding: 5px 12px;
  border-radius: 20px;
  color: #00d4ff;
  font-size: 0.85rem;
}

.level {
  padding: 5px 12px;
  border-radius: 20px;
  font-size: 0.85rem;
  font-weight: 600;
  text-transform: uppercase;
}
.level.easy { background: rgba(34,197,94,0.1); color: #8ef0a7; }
.level.medium { background: rgba(250,204,21,0.1); color: #ffed9a; }
.level.hard { background: rgba(239,68,68,0.1); color: #ffb0b0; }

/* ===== Button ===== */
.btn-start {
  text-decoration: none;
  background: linear-gradient(135deg, #00d4ff, #007bff);
  color: #fff;
  padding: 10px 25px;
  border-radius: 30px;
  font-weight: 600;
  display: inline-block;
  transition: 0.3s ease;
}

.btn-start:hover {
  transform: translateY(-3px);
  box-shadow: 0 0 20px rgba(0,212,255,0.6);
}

/* ===== Responsive ===== */
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
}
</style>

<?php include 'footer.php'; ?>
