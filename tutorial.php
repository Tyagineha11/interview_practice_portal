<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<?php
include 'header.php';
?>

<div class="dashboard-container">

  <!-- Sidebar -->
  <?php include 'sidebar.php'; ?>

  <!-- Main Content -->
  <main class="main-content">
    <div class="card">
      <div class="profile-header">
        <h1><i class="fa fa-book"></i> Tutorial</h1>
      </div>

      <!-- ================= Tutorial Grid ================= -->
      <div class="tutorial-grid">
        <?php

        // DB connection assumed in header.php as $conn
        $res = $conn->query("SELECT * FROM tutorials ORDER BY created_at DESC");
        if($res && $res->num_rows > 0){
            while($tut = $res->fetch_assoc()){
                ?>
                <div class="tutorial-card">
                    <img src="<?= htmlspecialchars($tut['thumbnail']); ?>" class="tutorial-thumb" alt="<?= htmlspecialchars($tut['title']); ?>">
                    <div class="tutorial-content">
                        <h3 class="tutorial-title"><?= htmlspecialchars($tut['title']); ?></h3>
                        <p class="tutorial-desc"><?= htmlspecialchars($tut['description']); ?></p>
                        <div class="tutorial-info">
                            <span>⏱ Duration: <strong><?= htmlspecialchars($tut['duration']); ?></strong></span>
                            <span>📘 <?= htmlspecialchars($tut['questions_count']); ?> Questions</span>
                        </div>
                        <a href="watch.php?id=<?= $tut['id']; ?>" class="watch-btn"><i class="fa fa-play-circle"></i> Watch Tutorial</a>
                    </div>
                </div>
                <?php
            }
        } else {
            echo '<p style="color:#fff;text-align:center;">No tutorials found.</p>';
        }
        ?>
      </div>
      <!-- ================= Tutorial Grid End ================= -->

    </div>
  </main>
</div>

<style>
.profile-header {
  text-align: center;
  margin-bottom: 30px;
}
.profile-header h1 {
  font-size: 32px;
  color: #00d4ff;
  position: relative;
  display: inline-block;
  font-weight: 700;
}
.profile-header h1 i { margin-right: 10px; }
.profile-header h1::after {
  content: '';
  display: block;
  width: 113%;
  height: 4px;
  background: linear-gradient(to right, #00d4ff, #007bff);
  margin: 10px auto 0;
  border-radius: 2px;
}
.dashboard-container {
  display: flex;
  min-height: 100vh;
  background: #0f111a;
  font-family: 'Poppins', sans-serif;
}
.main-content { flex-grow: 1; padding: 40px; }
.card {
  background: linear-gradient(145deg,#1e1e2f,#27293d);
  padding: 30px;
  border-radius: 20px;
  box-shadow: 0 8px 30px rgba(0,0,0,0.5);
  color: #fff;
}

/* ================= Grid Layout ================= */
.tutorial-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr); /* 2 cards per row */
    gap: 25px;
}

/* ================= Tutorial Card ================= */
.tutorial-card {
    background: linear-gradient(145deg, #1e1e2f, #27293d);
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    color: #fff;
}
.tutorial-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 18px rgba(0,0,0,0.5);
}
.tutorial-thumb {
    width: 100%;
    height: 190px;
    object-fit: cover;
}
.tutorial-content { padding: 18px; }
.tutorial-title { font-size: 20px; font-weight: 600; margin-bottom: 6px; }
.tutorial-desc { font-size: 14px; color: #ccc; margin-bottom: 14px; }
.tutorial-info {
    display: flex;
    justify-content: space-between;
    font-size: 14px;
    color: #aaa;
    margin-bottom: 15px;
}
.watch-btn {
    display: inline-block;
    width: 100%;
    background: #00d4ff;
    color: #1a1f36;
    text-align: center;
    padding: 10px 0;
    border-radius: 8px;
    font-size: 15px;
    text-decoration: none;
    transition: all 0.3s ease;
    font-weight: 600;
}
.watch-btn i { margin-right: 8px; }
.watch-btn:hover {
    background: #007bff;
    color: #fff;
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
}

/* ===== Mobile-first: default 1 column ===== */
.tutorial-grid {
    display: grid;
    grid-template-columns: 1fr; /* stack cards on small screens */
    gap: 20px;
}

.tutorial-card {
    padding: 15px;
}

.tutorial-thumb {
    height: 150px; /* smaller on mobile */
}

.tutorial-title {
    font-size: 18px;
}

.tutorial-desc {
    font-size: 13px;
}

.tutorial-info {
    flex-direction: column;
    gap: 6px;
    font-size: 12px;
}

/* Watch button full width for mobile */
.watch-btn {
    padding: 8px 0;
    font-size: 14px;
}

/* ===== Tablet screens ===== */
@media (min-width: 600px) {
    .tutorial-grid {
        grid-template-columns: repeat(2, 1fr); /* 2 cards per row */
    }
    .tutorial-thumb {
        height: 180px;
    }
    .tutorial-title { font-size: 19px; }
    .tutorial-desc { font-size: 14px; }
    .tutorial-info { flex-direction: row; font-size: 13px; }
}

/* ===== Desktop screens ===== */
@media (min-width: 900px) {
    .tutorial-grid {
        grid-template-columns: repeat(3, 1fr); /* 3 cards per row */
        gap: 25px;
    }
    .tutorial-thumb {
        height: 200px;
    }
    .tutorial-title { font-size: 20px; }
    .tutorial-desc { font-size: 14px; }
    .tutorial-info { font-size: 14px; }
    .watch-btn { font-size: 15px; padding: 10px 0; }
}

</style>

<?php include 'footer.php'; ?>
