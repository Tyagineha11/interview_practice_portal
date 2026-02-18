<?php
include 'config.php';
header('Content-Type: application/json');

// Check POST data
if(!isset($_POST['subtopic_id'], $_POST['answers'])){
    echo json_encode(['success'=>false, 'message'=>'Invalid data']);
    exit;
}

$subtopic_id = intval($_POST['subtopic_id']);
$answers = $_POST['answers'];

// Fetch questions for the subtopic
$stmt = $conn->prepare("SELECT * FROM tutorial_questions WHERE tutorial_subtopic_id = ?");
$stmt->bind_param("i", $subtopic_id);
$stmt->execute();
$res = $stmt->get_result();
$questions = $res->fetch_all(MYSQLI_ASSOC);

if(empty($questions)){
    echo json_encode(['success'=>false, 'message'=>'No questions found']);
    exit;
}

$totalPoints = count($questions);
$score = 0;
$wrong_questions = [];

foreach($questions as $q){
    $qid = $q['id'];
    $correct = trim($q['correct_answer']);
    $your = isset($answers[$qid]) ? trim($answers[$qid]) : '';

    $question_text = $q['question_text'] ?? 'No question text'; // ✅ Use correct column name

    if($your === $correct){
        $score++;
    } else {
        $wrong_questions[] = [
            'question' => $question_text,
            'your_answer' => $your ?: 'No answer',
            'correct_answer' => $correct
        ];
    }
}

// Return JSON response
echo json_encode([
    'success' => true,
    'score' => $score,
    'total' => $totalPoints,
    'wrong_questions' => $wrong_questions
]);
exit;
?>
