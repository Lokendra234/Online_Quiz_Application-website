<?php
session_start();
include("includes/header.php");
include("includes/topbar.php");
include("includes/sidebar.php");

?>
   <div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h5>Add New Question</h5>
                </div>
                <div class="card-body">
                    <form action="addquestion1.php" method="post">
                        <div class="form-group mb-3">
                            <label for="category">Subject</label>
                            <select name="category" id="category" class="form-control">
                                <option value="">Select Category</option>
                                <?php
                                $con = new mysqli("localhost", "root", "", "online_quiz");
                                $r = $con->query("SELECT * FROM examcategory");
                                while ($rows = $r->fetch_array()) {
                                    echo "<option value='" . htmlspecialchars($rows[1]) . "'>" . htmlspecialchars($rows[1]) . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="difficulty">Difficulty</label>
                            <select name="difficulty" id="difficulty" class="form-control">
                                <option value="">Select Difficulty</option>
                                <option value="Easy">Easy</option>
                                <option value="Medium">Medium</option>
                                <option value="Hard">Hard</option>
                            </select>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="question">Question</label>
                            <input type="text" name="question" id="question" class="form-control" placeholder="Enter Question">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="opt1">Option 1</label>
                            <input type="text" name="opt1" id="opt1" class="form-control" placeholder="Enter Option 1">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="opt2">Option 2</label>
                            <input type="text" name="opt2" id="opt2" class="form-control" placeholder="Enter Option 2">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="opt3">Option 3</label>
                            <input type="text" name="opt3" id="opt3" class="form-control" placeholder="Enter Option 3">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="opt4">Option 4</label>
                            <input type="text" name="opt4" id="opt4" class="form-control" placeholder="Enter Option 4">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="answer">Answer</label>
                            <input type="text" name="answer" id="answer" class="form-control" placeholder="Enter Correct Answer">
                        </div>
                        
                        <?php
                        if (isset($_SESSION["questionerr"])) {
                            echo "<div class='alert alert-danger text-center'>" . $_SESSION["questionerr"] . "</div>";
                        }
                        ?>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Add Question</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
include('includes/footer.php');
?>
