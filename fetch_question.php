<?php
include "connection.php";

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
header('Content-Type: application/json');


$category_id = $_GET['category_id'];
$diffculty= $_GET['difficulty'];


$current_question = isset($_GET['current_question']) ? intval($_GET['current_question']) : 0;

$sql = "SELECT * FROM questions WHERE category ='$category_id'  and difficulty='$diffculty' LIMIT $current_question, 1";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $question = $result->fetch_assoc();
    echo json_encode([
        "question" => $question['question'],
        "opt1" => $question['opt1'],
        "opt2" => $question['opt2'],
        "opt3" => $question['opt3'],
        "opt4" => $question['opt4'],
        "correct_answer" => $question['answer'] // assuming you have this field in your table
    ]);
} else {
    echo json_encode(["status" => "no_more_questions"]);
}

$con->close();
?>