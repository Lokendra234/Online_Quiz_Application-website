<?php
$category=$_REQUEST["category"];
$video=$_REQUEST["vid"];


include "db.php";

$r=$con->query("insert into addvideo(category,video)
values('$category','$video')");

if($r){
	$_SESSION["videoerr"]="Video Added Successfully";
header("location:addvideo.php");
}
else
	echo "Not Insert";
?>
