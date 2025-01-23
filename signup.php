<?php
session_start();
include "connection.php";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $college = $_POST['college'];

    if(!empty($email) && !empty($password) && !is_numeric($email))
    {
        $query ="insert into user(name,email,password,college) values ('$name','$email','$password','$college')";

        mysqli_query($con,$query);

        echo "<script type='text/javascript'> alert('Successfully Register')</script>";
    }
    else{
            echo "<script type='text/javascript'> alert('Please Enter Some Valid Information')</script>";
        }
}
?>