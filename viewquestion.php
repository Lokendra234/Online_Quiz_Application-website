<?php
session_start();
include("includes/header.php");
include("includes/topbar.php");
include("includes/sidebar.php");

?>
<?php
    $con= new mysqli("localhost","root","","online_quiz");

    $r=$con->query("select * from questions");

echo "<div class='container mt-5'>";
echo "<div class='row justify-content-center'>";
echo "<div class='col-md-10'>"; // Adjusts the width to a medium size
echo "<table class='table table-bordered table-striped'>";
echo "<thead class='thead-dark'>
        <tr>
        <style>
        .table .thead-dark th {
    color: #fff;
    background-color: #590ee0;
    border-color: #5a14db;
}
</style>
            <th scope='col'>Id</th>
            <th scope='col'>Question</th>
            <th scope='col'>Difficulty</th>
            <th scope='col'>Opt1</th>
            <th scope='col'>Opt2</th>
            <th scope='col'>Opt3</th>
            <th scope='col'>Opt4</th>
            <th scope='col'>Answer</th>
            <th scope='col'>Category</th>
            <th scope='col'>Edit</th>
            <th scope='col'>Delete</th>
        </tr>
      </thead>";
echo "<tbody>";
while($row = $r->fetch_array()) {
    $sno = 1;
    echo "<tr>";
    for($i = 0; $i < 9; $i++) {
        echo "<td>", htmlspecialchars($row[$i]), "</td>";
    }
    echo "<td><a href='editquestion.php?question=" . htmlspecialchars($row[0]) . "' class='btn btn-sm btn-primary'>Edit</a></td>";
    echo "<td><a href='deletequestion.php?question=" . htmlspecialchars($row[0]) . "' class='btn btn-sm btn-primary'>Delete</a></td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
echo "</div>";
echo "</div>";
echo "</div>";
?>
</table>
</div></div>
<?php
include('includes/footer.php');
?>