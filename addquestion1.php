<?php
session_start();
$question=$_REQUEST["question"];
$difficulty=$_REQUEST["difficulty"];
$opt1=$_REQUEST["opt1"];
$opt2=$_REQUEST["opt2"];
$opt3=$_REQUEST["opt3"];
$opt4=$_REQUEST["opt4"];
$category=$_REQUEST["category"];
$answer=$_REQUEST["answer"];

$con= new mysqli("localhost","root","","online_quiz");

$r=$con->query("insert into questions(question,difficulty,opt1,opt2,opt3,opt4,answer,category)
values('$question','$difficulty','$opt1','$opt2','$opt3','$opt4','$answer','$category')");

if($r){
	$_SESSION["questionerr"]="Question Added Successfully";
header("location:Addquestions.php");
}
else
	echo "Not Insert";
?>
