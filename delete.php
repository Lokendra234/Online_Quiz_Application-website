<?php
session_start();
$con = new mysqli("localhost", "root", "", "online_quiz");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete query
    $delete = $con->query("DELETE FROM examcategory WHERE id=$id");

    if ($delete) {
        $_SESSION['subjecterr'] = "Exam category deleted successfully.";
    } else {
        $_SESSION['subjecterr'] = "Failed to delete the exam category.";
    }
}

header('Location: examcategory.php');
exit();
?>
