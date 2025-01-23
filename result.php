<?php
// new added for header
header('Content-Type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include "connection.php"; // Ensure this file connects to your database

// Ensure the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get the raw POST data
    $data = json_decode(file_get_contents('php://input'), true);

    // Check if the required fields are present
    if (isset($data['score'], $data['percentage'], $data['questions'], $data['category'], $data['difficulty'])) {
        $score = $data['score'];
        $percentage = $data['percentage'];
        $category = $data['category'];
        $difficulty = $data['difficulty'];
        $emailId =    $_SESSION['email'];

        // Check if $con is set and connected
        if ($con) {
            // Create the SQL query to insert the quiz result into the database
            $query = "INSERT INTO quiz_results (email_id, category, difficulty, score, percentage, date_taken) 
                      VALUES (?, ?, ?, ?, ?, NOW())";

            // Prepare the statement to prevent SQL injection
            $stmt = $con->prepare($query);
            $stmt->bind_param("sssdi", $emailId, $category, $difficulty, $score, $percentage);

            // Execute the query
            if ($stmt->execute()) {
                // Get the ID of the inserted result to link question details
                $resultId = $stmt->insert_id;

                // Prepare the query to insert individual question results
                $questionQuery = "INSERT INTO quiz_answers (result_id, question, user_answer, correct_answer, score) 
                                  VALUES (?, ?, ?, ?, ?)";
                $stmtQuestion = $con->prepare($questionQuery);

                // Insert each question result
                foreach ($data['questions'] as $question) {
                    $userAnswer = $question['userAnswer'] ?? 'No Answer';
                    $correctAnswer = $question['correctAnswer'];
                    $questionText = $question['question'];
                    $questionScore = ($userAnswer === $correctAnswer) ? 2 : 0; // Assuming 2 points for a correct answer

                    // Bind and execute for each question
                    $stmtQuestion->bind_param("isssi", $resultId, $questionText, $userAnswer, $correctAnswer, $questionScore);
                    $stmtQuestion->execute();
                }

                // Close the statement and connection
                $stmt->close();
                $stmtQuestion->close();

                // Return success response
                echo json_encode(['status' => 'success']);
            } else {
                // for debug
                error_log("SQL error: " . $stmt->error);
                // Return error response if the query fails
                echo json_encode(['status' => 'error', 'message' => 'Failed to save the results.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Database connection failed.']);
        }
    } else {
        // Return error response if data is incomplete
        echo json_encode(['status' => 'error', 'message' => 'Invalid input data.']);
    }
} else {
    // Return error response if the request method is not POST
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
