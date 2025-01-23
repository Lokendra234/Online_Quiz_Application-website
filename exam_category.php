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
                    <h5>Add New Exam Category</h5>
                </div>
                <div class="card-body">
                    <form action="examcategory.php" method="post">
                        <div class="form-group mb-3">
                            <label for="category">Exam Name</label>
                            <input type="text" class="form-control" id="category" name="category" placeholder="Enter Exam Name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exam_time_in_minutes">Exam Time (in minutes)</label>
                            <input type="number" class="form-control" id="exam_time_in_minutes" name="exam_time_in_minutes" placeholder="Enter Exam Time">
                        </div>
                        <?php
                        if(isset($_SESSION["subjecterr"])) {
                            echo "<div class='alert alert-danger text-center'>" . $_SESSION["subjecterr"] . "</div>";
                        }
                        ?>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Add Exam</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Category</th>
                            <th>Exam Time</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $con = new mysqli("localhost", "root", "", "online_quiz");
                    $r = $con->query("SELECT * FROM examcategory");

                    while($row = $r->fetch_array()) {
                        echo "<tr>";
                        for($i = 0; $i < 3; $i++) {
                            echo "<td>", htmlspecialchars($row[$i]), "</td>";
                        }
                        echo "<td><a href='edit.php?id=$row[0]' class='btn btn-sm btn-warning'>Edit</a></td>";
                        echo "<td><a href='delete.php?id=$row[0]' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure you want to delete this category?\")'>Delete</a></td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
$_SESSION["subjecterr"] = "";
include('includes/footer.php');
?>
