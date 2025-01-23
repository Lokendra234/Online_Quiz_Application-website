<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['feedback'])) {
    // Here you can save the feedback to your database or perform other actions
    // For example:
    // saveFeedbackToDatabase($data['feedback'], $data['score'], $data['percentage'], $data['category'], $data['difficulty']);
    
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid feedback data.']);
}
?>
