<?php
// Include database connection and header files
include "db.php";
include('includes/header.php');
?>
<style>
    .btn-success {
    color: #fff;
    background-color: #dc3545;
    border-color: #28a745;
    box-shadow: none;
}
    .bg-primary {
    background-color: #6f42c1 !important;
}
    .login-card {
    width: 600px; 
    height: 350px; 
}
    .center-button {
    display: flex;
    justify-content: center;
}
</style>
<body class="d-flex align-items-center justify-content-center vh-100" style="background-image:url(dist/img/credit/bg.webp);">

<div class="container d-flex justify-content-left align-items-center" style="height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6">
            <div class="card login-card shadow">
                <div class="card-header text-center bg-primary text-white">
                    <h3>Master Panel</h3>
                </div>
                <div class="card-body p-4">
                    <form name="form1" action="" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit1" class="btn btn-success">Sign In</button>
                        </div>

                        <!-- Hidden by default, only show when login fails -->
                        <div class="alert alert-danger mt-3 d-none" id="errormsg">
                            <strong>Invalid!</strong> Username or Password.
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
if (isset($_POST['submit1'])) {
    // Sanitize and escape user inputs
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);

    // Check login credentials
    $res = mysqli_query($con, "SELECT * FROM master_login WHERE username='$username' AND password='$password'");
    $count = mysqli_num_rows($res);

    if ($count == 0) {
        // Display error message if login fails
        echo '<script type="text/javascript">document.getElementById("errormsg").classList.remove("d-none");</script>';
    } else {
        // Redirect to dashboard if login succeeds
        echo '<script type="text/javascript">window.location = "index.php";</script>';
    }
}
?>

