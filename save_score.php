<?php
include 'config.php';
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$user_id = intval($data['user_id']);
$interview_id = intval($data['interview_id']);
$score = intval($data['score']);
$total = intval($data['total']);

// Insert or update
$res = $conn->query("SELECT id FROM interview_results WHERE user_id=$user_id AND interview_id=$interview_id");
if($res->num_rows>0){
    $conn->query("UPDATE interview_results SET score=$score, total=$total, updated_at=NOW() WHERE user_id=$user_id AND interview_id=$interview_id");
} else {
    $conn->query("INSERT INTO interview_results (user_id, interview_id, score, total) VALUES ($user_id,$interview_id,$score,$total)");
}

echo json_encode(['success'=>true,'total'=>$total]);
?>
