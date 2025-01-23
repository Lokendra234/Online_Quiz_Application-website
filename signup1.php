<?php
session_start();
include "connection.php";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $number = $_POST['number'];

    if(!empty($username) && !empty($password) && !is_numeric($email))
    {
        $query ="insert into registration(firstname,lastname,gender,username,password,email,number) values ('$firstname','$lastname','$gender','$username','$password','$email','$number')";

        mysqli_query($con,$query);

        echo "<script type='text/javascript'> alert('Successfully Register')</script>";
    }
    else{
            echo "<script type='text/javascript'> alert('Please Enter Some Valid Information')</script>";
        }
}
?>