<?php
include 'header.php';

// Check if tutorial ID or subtopic ID is passed
$subtopic_id = null; // <-- IMPORTANT INITIALIZATION

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    // Main tutorial video
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM tutorials WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();

    if($res && $res->num_rows > 0){
        $tut = $res->fetch_assoc();
        $video_title = $tut['title'];
        $video_url = $tut['video_url'];
        $video_thumbnail = $tut['thumbnail'];
        $description = $tut['description'];
        $questions_count = $tut['questions_count'];
        $tutorial_id = $tut['id'];
    } else {
        echo "<div style='color:white;text-align:center;margin-top:50px;'>Tutorial not found.</div>";
        include 'footer.php';
        exit;
    }

} elseif(isset($_GET['sub_id']) && is_numeric($_GET['sub_id'])){
    // Subtopic video
    $sub_id = intval($_GET['sub_id']);

    $sub_stmt = $conn->prepare("SELECT ts.*, t.id AS tutorial_id, t.title AS tutorial_title 
                                FROM tutorial_subtopics ts
                                JOIN tutorials t ON t.id = ts.tutorial_id
                                WHERE ts.id=?");
    $sub_stmt->bind_param("i", $sub_id);
    $sub_stmt->execute();
    $sub_res = $sub_stmt->get_result();

    if($sub_res && $sub_res->num_rows > 0){
        $sub = $sub_res->fetch_assoc();
        $video_title = $sub['title'];
        $video_url = $sub['video_url'];
        $video_thumbnail = $sub['thumbnail'] ?? '';
        $questions_count = 0; 
        $tutorial_id = $sub['tutorial_id'];

        // ⭐ FIX: Now set subtopic_id correctly
        $subtopic_id = $sub['id'];  

    } else {
        echo "<div style='color:white;text-align:center;margin-top:50px;'>Subtopic not found.</div>";
        include 'footer.php';
        exit;
    }

} else {
    echo "<div style='color:white;text-align:center;margin-top:50px;'>Invalid ID.</div>";
    include 'footer.php';
    exit;
}
?>

<div class="dashboard-container">
    <?php include 'sidebar.php'; ?>

    <main class="main-content">
        <div class="card">
            <div class="profile-header">
                <h1><i class="fa fa-play-circle"></i> <?= htmlspecialchars($video_title); ?></h1>
            </div>

            <div class="video-container">
                <video id="tutorialVideo" width="100%" height="480" controls poster="<?= htmlspecialchars($video_thumbnail); ?>">
                    <source src="<?= htmlspecialchars($video_url); ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <div id="startTestContainer" style="text-align:center; margin-top:20px; display:none;">
                    <button id="startTestBtn" class="btn-test">Start Test</button>
                </div>
            </div>

            <div class="tutorial-details">
                <?php if($questions_count > 0): ?>
                    <p><strong>Questions:</strong> <?= htmlspecialchars($questions_count); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </main>
</div>

<script>
const video = document.getElementById('tutorialVideo');
const startTestContainer = document.getElementById('startTestContainer');
const startTestBtn = document.getElementById('startTestBtn');

// Show Start Test button when video ends
video.addEventListener('ended', () => {
    startTestContainer.style.display = 'block';
});

// Redirect to test
startTestBtn.addEventListener('click', () => {
    <?php if (!empty($subtopic_id)) { ?>
        // ⭐ Subtopic test exists → go to test page
        window.location.href = 'tutorial-test.php?sub_id=<?= $subtopic_id; ?>';
    <?php } else { ?>
        // ❗ No subtopic test for main tutorial
        alert("This tutorial has no subtopic test.");
    <?php } ?>
});
</script>



<style>
/* Reuse your existing styles */
.btn-test {
  background: #00d4ff;
  color: #000;
  padding: 12px 25px;
  font-size: 16px;
  font-weight: 600;
  border: none;
  border-radius: 10px;
  cursor: pointer;
  transition: 0.3s;
}
.btn-test:hover { background: #007bff; color: #fff; }

.profile-header { text-align: center; margin-bottom: 30px; }
.profile-header h1 { font-size: 32px; color: #00d4ff; position: relative; display: inline-block; font-weight: 700; }
.profile-header h1 i { margin-right: 10px; }
.profile-header h1::after { content: ''; display: block; width: 113%; height: 4px; background: linear-gradient(to right, #00d4ff, #007bff); margin: 10px auto 0; border-radius: 2px; }

.dashboard-container { display:flex; min-height:100vh; background:#0f111a; font-family:'Poppins',sans-serif; }
.main-content { flex-grow:1; padding:40px; }
.card { background: linear-gradient(145deg,#1e1e2f,#27293d); padding:30px; border-radius:20px; box-shadow:0 8px 30px rgba(0,0,0,0.5); color:#fff; }
.video-container video { border-radius:12px; box-shadow:0 4px 18px rgba(0,0,0,0.5); }
.tutorial-details { margin-top:20px; color:#ccc; font-size:15px; }
.tutorial-details p { margin-bottom:8px; }

/* Responsive */
@media(max-width:768px){
    .main-content{padding:20px 15px;}
    .card{padding:20px;}
    .profile-header h1{font-size:24px;}
    .video-container video{max-height:300px;}
    .btn-test{width:100%; padding:10px 0; font-size:15px;}
}
</style>

<?php include 'footer.php'; ?>
