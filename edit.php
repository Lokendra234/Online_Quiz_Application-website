<?php
session_start();
$con = new mysqli("localhost", "root", "", "online_quiz");

// Check if the form is submitted
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $new_category_name = $_POST['category']; // Get updated category name from the form
    $new_exam_time = $_POST['exam_time_in_minutes']; // Get updated exam time from the form

    // Update query with prepared statement to prevent SQL injection
    $stmt = $con->prepare("UPDATE examcategory SET category=?, exam_time_in_minutes=? WHERE id=?");
    $stmt->bind_param("ssi", $new_category_name, $new_exam_time, $id);
    
    if ($stmt->execute()) {
        $_SESSION['subjecterr'] = "Exam category updated successfully.";
    } else {
        $_SESSION['subjecterr'] = "Failed to update the exam category.";
    }
    $stmt->close();

    // Redirect back to the exam category list
    header('Location: examcategory.php');
    exit();
}

// Get the current category data for the selected ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $con->prepare("SELECT * FROM examcategory WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
} else {
    header('Location: examcategory.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Exam Category</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div style="width:500px; margin:auto; padding-top:50px;">
    <form action="edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <table class="table table-bordered">
            <tr>
                <td>Exam Name</td>
                <td>
                    <input class="form-control" type="text" name="category" value="<?php echo $row['category']; ?>" placeholder="Enter Exam Name">
                </td>
            </tr>
            <tr>
                <td>Exam Time (in minutes)</td>
                <td>
                    <input class="form-control" type="text" name="exam_time_in_minutes" value="<?php echo $row['exam_time_in_minutes']; ?>" placeholder="Enter Exam Time">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="update" value="Update Exam" class="btn btn-primary">
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
