<?php
// Start the session and include necessary files
session_start();
include("includes/header.php");
include("includes/topbar.php");
include("includes/sidebar.php");

// Get the question ID from the URL
if (isset($_GET['question'])) {
    $question_id = $_GET['question'];

    // Connect to the database
    $con = new mysqli("localhost", "root", "", "online_quiz");

    // Check if connection was successful
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Fetch the question details from the database
    $stmt = $con->prepare("SELECT * FROM questions WHERE id = ?");
    $stmt->bind_param("i", $question_id);  // Use $question_id here
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Check if the question exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Question not found!";
        exit();
    }
} else {
    echo "Invalid request!";
    exit();
}
?>
<div style="width:100%;background:white">
    <body>
    <div style="width:500px;margin:auto">
        <form action="updatequestion.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <table border="1" align="center" cellpadding=10 cellspacing=0 class="table table-bordered">
                <tr align="center">
                    <td>Subject</td>
                    <td>
                        <select name="category" class="form-control">
                            <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
                            <?php
                            $r = $con->query("select * from examcategory");
                            while ($rows = $r->fetch_array()) {
                                echo "<option value='$rows[1]'>$rows[1]</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr align="center">
                    <td>Difficulty</td>
                    <td>
                        <select name="difficulty" class="form-control">
                            <option value="<?php echo $row['difficulty']; ?>"><?php echo $row['difficulty']; ?></option>
                            <option value="Easy">Easy</option>
                            <option value="Medium">Medium</option>
                            <option value="Hard">Hard</option>
                        </select>
                    </td>
                </tr>
                <tr align="center">
                    <td>Question</td>
                    <td><input class="form-control" type="text" name="question" value="<?php echo $row['question']; ?>"></td>
                </tr>
                <tr align="center">
                    <td>Option1</td>
                    <td><input class="form-control" type="text" name="option1" value="<?php echo $row['opt1']; ?>"></td>
                </tr>
                <tr align="center">
                    <td>Option2</td>
                    <td><input class="form-control" type="text" name="option2" value="<?php echo $row['opt2']; ?>"></td>
                </tr>
                <tr align="center">
                    <td>Option3</td>
                    <td><input class="form-control" type="text" name="option3" value="<?php echo $row['opt3']; ?>"></td>
                </tr>
                <tr align="center">
                    <td>Option4</td>
                    <td><input class="form-control" type="text" name="option4" value="<?php echo $row['opt4']; ?>"></td>
                </tr>
                <tr align="center">
                    <td>Answer</td>
                    <td><input class="form-control" type="text" name="answer" value="<?php echo $row['answer']; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="Update Question" class="btn btn-primary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
include('includes/footer.php');
?>
