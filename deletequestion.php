<?php
session_start();
$con = new mysqli("localhost", "root", "", "online_quiz");

if (isset($_GET['question'])) {
    // Get the question ID from the GET request
    $question_id = intval($_GET['question']); 

    // Prepare the SQL statement
    $stmt = $con->prepare("DELETE FROM questions WHERE id = ?");
    $stmt->bind_param("i", $question_id); // Bind the correct variable here

    // Execute the query
    if ($stmt->execute()) {
        $_SESSION['questionmsg'] = "Question deleted successfully!";
    } else {
        $_SESSION['questionerr'] = "Failed to delete the question.";
    }

    // Close the prepared statement
    $stmt->close();
} else {
    $_SESSION['questionerr'] = "No question ID provided!";
}

// Redirect to the page displaying the questions
header("Location: Addquestions.php");
exit;
?>
