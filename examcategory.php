<?php
session_start();
$category=$_REQUEST["category"];
$exam_time_in_hours=$_REQUEST["exam_time_in_minutes"];

$con= new mysqli("localhost","root","","online_quiz");

$r=$con->query("insert into examcategory(category,exam_time_in_minutes)
values('$category','$exam_time_in_minutes')");

if($r){
	$_SESSION["subjecterr"]="Exam Added Successfully";
header("location:exam_category.php");
}
else
	echo "Not Insert";
?>
