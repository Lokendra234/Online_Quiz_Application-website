<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $category = $_POST['category'];
    $difficulty = $_POST['difficulty'];
    $question = $_POST['question'];
    $opt1 = $_POST['opt1'];
    $opt2 = $_POST['opt2'];
    $opt3 = $_POST['opt3'];
    $opt4 = $_POST['opt4'];
    $answer = $_POST['answer'];

    // Connect to the database
    $con = new mysqli("localhost", "root", "", "online_quiz");

    // Update the question details in the database
    $stmt = $con->prepare("UPDATE questions SET category=?, difficulty=?, question=?, opt1=?, opt2=?, opt3=?, opt4=?, answer=? WHERE id=?");
    $stmt->bind_param("ssssssssi", $category, $difficulty, $question, $opt1, $opt2, $opt3, $opt4, $answer, $id);
    
    if ($stmt->execute()) {
        $_SESSION['success'] = "Question updated successfully!";
        header("Location: Addquestions.php"); // Redirect to the questions list page
    } else {
        echo "Error updating record: " . $con->error;
    }

    $stmt->close();
    $con->close();
}
?>
