<?php
session_start();
include("includes/header.php");
include("includes/topbar.php");
include("includes/sidebar.php");

?>
<div style="width:100%;background:white">
<body>
<div style="width:500px;margin:auto">
    <form action="addvideo1.php" method="post">
    <table border="1" align="center" width=50%
    cellspacing=0 cellpadding=10 class="table table-bordered">
    <tr>
    <td colspan="2" align='center' style='color:red;font-weight:bold'>
    <?php
    if(isset($_SESSION["videoerr"]))
    echo $_SESSION["videoerr"];
    ?>
    <tr align="center">
        <td>Category</td>
        <td>
        <select name="category"  class="form-control">
            <option value="">Select Category</option>
            <?php
             $con=new mysqli ("localhost","root","","online_quiz");
                $r=$con->query("select * from examcategory");
                while($rows=$r->fetch_array()){
                echo "<option value='$rows[1]'>$rows[1]</option>";
                }
                ?>
</select>
        </td>
    </tr>
    <tr align="center">
        <td>Video Id</td>
        <td>
            <input type='text'  class="form-control" name="vid">
        </td>
    </tr>
   
    <tr>
        <td colspan="2" align="center">
         <input type="submit" value="Add Video" class="btn btn-primary">  
        </td>
    </tr>
</table>
</form>
</div>
<?php
    $con= new mysqli("localhost","root","","online_quiz");

    $r=$con->query("select * from addvideo");

    echo "<table border='1' cellspacing=0 cellpadding=10 width=50%
    align='center'>";
    
    echo"<tr>
            <th>Id</th>
            <th>Category</th>
            <th>Video</th>
          
        </tr>";
        while($row=$r->fetch_array())
        {
           echo "<tr>";
            for($i=0;$i<3;$i++)
            {
                echo "<td>",$row[$i],"</td>";
            }
        }
?>
</table>
<?php
$_SESSION["videoerr"]="";
include('includes/footer.php');


?>


