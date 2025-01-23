<?php
session_start();
if (isset($_SESSION['email'])) {
    header("location: index.php");
    die;
}
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password) && !is_numeric($email)) {
        $query = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($con, $query);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            if ($user_data['password'] == $password) {
                $_SESSION['email'] = $email;
                header("location: index.php");
                die;
            }
        }
        echo "<script>alert('Incorrect email or password.');</script>";
    } else {
        echo "<script>alert('Please enter a valid email and password.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("img/login.jpg");
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            max-width: 400px;
            width: 100%;
            position: relative;
        }
        h1 {
            font-size: 2rem;
            font-weight: bold;
            color: #003d6b;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .form-label {
            font-weight: bold;
            color: #003d6b;
        }
        .btn-primary {
            background-color: #003d6b;
            border-color: #003d6b;
            border-radius: 0.5rem;
        }
        .btn-primary:hover {
            background-color: #002d4b;
            border-color: #002d4b;
        }
        .text-center {
            text-align: center;
            color: black;
            font-weight: 900;
        }
        .text-center a {
            color: #0056b3;
        }
        .text-center a:hover {
            color: #003d6b;
        }
        .login-container::before {
            content: '';
            position: absolute;
            top: 10%;
            left: 10%;
            right: 10%;
            bottom: 10%;
            z-index: -1;
            background: linear-gradient(45deg, #003d6b, #007bff);
            filter: blur(30px);
            border-radius: 1rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Student Login</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <p class="text-center mt-3">Don't have an account? <a href="register.php">Sign up here</a></p>
    </div>
</body>
</html>
