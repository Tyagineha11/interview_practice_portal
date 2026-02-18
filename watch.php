<?php
include 'header.php';

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    echo "<div style='color:white;text-align:center;margin-top:50px;'>Invalid tutorial ID.</div>";
    include 'footer.php';
    exit;
}

$tutorial_id = $_GET['id'];

// Fetch tutorial info
$tut_stmt = $conn->prepare("SELECT * FROM tutorials WHERE id=?");
$tut_stmt->bind_param("i",$tutorial_id);
$tut_stmt->execute();
$tut_res = $tut_stmt->get_result();
$tutorial = $tut_res->fetch_assoc();

// Fetch subtopics
$sub_stmt = $conn->prepare("SELECT * FROM tutorial_subtopics WHERE tutorial_id=? ORDER BY created_at ASC");
$sub_stmt->bind_param("i",$tutorial_id);
$sub_stmt->execute();
$sub_res = $sub_stmt->get_result();
$subtopics = $sub_res->fetch_all(MYSQLI_ASSOC);
?>

<div class="dashboard-container">
    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>

    <main class="main-content">
        <div class="card">
            <div class="profile-header">
                <h1><i class="fa fa-play-circle"></i> <?= htmlspecialchars($tutorial['title']); ?></h1>
            </div>

            <div class="subtopic-grid">
                <?php if(!empty($subtopics)): ?>
                    <?php foreach($subtopics as $sub): ?>
                        <div class="subtopic-card">
                            <h3><?= htmlspecialchars($sub['title']); ?></h3>
                            <p>Duration: <strong><?= htmlspecialchars($sub['duration']); ?></strong></p>
                            <a href="play.php?sub_id=<?= $sub['id']; ?>" class="play-btn">
                                <i class="fa fa-play-circle"></i> Watch Video
                            </a>

                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="color:#fff;text-align:center;">No subtopics available.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>
</div>

<style>
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

/* Subtopic Grid */
.subtopic-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
}

/* Subtopic Card */
.subtopic-card {
    background: linear-gradient(145deg, #1e1e2f, #27293d);
    padding: 20px;
    border-radius: 14px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.4);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center;
}
.subtopic-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.6);
}
.subtopic-card h3 {
    font-size: 20px;
    margin-bottom: 10px;
    color: #00d4ff;
}
.subtopic-card p {
    font-size: 14px;
    color: #aaa;
    margin-bottom: 15px;
}
.play-btn {
    display: inline-block;
    padding: 10px 20px;
    background: #00d4ff;
    color: #1a1f36;
    font-weight: 600;
    border-radius: 8px;
    text-decoration: none;
    transition: all 0.3s ease;
}
.play-btn i { margin-right: 8px; }
.play-btn:hover {
    background: #007bff;
    color: #fff;
}

/* Responsive */
@media (max-width: 768px){
    .main-content { padding: 20px 15px; }
    .card { padding: 20px; }
    .profile-header h1 { font-size: 24px; }
    .subtopic-card { padding: 15px; }
}
</style>

<?php include 'footer.php'; ?>
