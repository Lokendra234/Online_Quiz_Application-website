<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Brainiac Lokendra Quizzes</title>
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)),
                        url('img/background.jpg');
            background-size: cover;
            color: #fff;
            font-family: 'Poppins', Arial, sans-serif;
        }
        .logo img {
            width: 50px;  
            height: auto;  
            margin-left: -30%;
        }
        .navbar {
            background: rgba(0, 0, 0, 0.0);
            
        }
        .welcome-text {
            color: gold;
            font-weight: bold;
            font-family: initial;
            background: rgba(0, 0, 0, 0.0);
            text-decoration-color: aliceblue;
        }
        .offcanvas-body {
            background: rgba(0, 0, 0, 0.0); 
            color: #ffffff;
            width: max-content;
            font-style: italic;
            margin-bottom: 15px;
        }
        .offcanvas, .offcanvas-lg, .offcanvas-md, .offcanvas-sm, .offcanvas-xl, .offcanvas-xxl {
        --bs-offcanvas-zindex: 1045;
        --bs-offcanvas-width: 400px;
        --bs-offcanvas-height: 30vh;
        --bs-offcanvas-padding-x: 1rem;
        --bs-offcanvas-padding-y: 1rem;
        --bs-offcanvas-color: #fff;
        --bs-offcanvas-bg: #212529;
        --bs-offcanvas-border-width: var(--bs-border-width);
        --bs-offcanvas-border-color: var(--bs-border-color-translucent);
        --bs-offcanvas-box-shadow: var(--bs-box-shadow-sm);
        --bs-offcanvas-transition: transform 0.3s ease-in-out;
        --bs-offcanvas-title-line-height: 1.5;
    }
    .nav-link {
        color: white;
        font-weight: bold;
    }
    .nav-link:hover {
        color: pink; 
    }
    .nav-link.active {
        color: #0d6efd;
    }
    .navbar-nav .nav-link.active, .navbar-nav .nav-link.show {
        color: white;
        font-weight: bold;
    }
    .hero {
        height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }
    .hero h1 {
        font-size: 2rem;
        font-weight: bold;
    }
    .hero p {
        font-size: 1.25rem;
    }
    .card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
    }
    .btn-primary {
        --bs-btn-color: #fff;
        background: rgba(0, 0, 0, 0.5); 
        --bs-btn-border-color: #dc3545;
        --bs-btn-hover-color: #fff;
        --bs-btn-hover-bg: #e80f96;
    }
    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
    <div class="container-fluid">
        <a href="index.php" class="logo">
            <img src="img/85.png" alt="Online Quiz Logo" style="width: 50px; height: auto;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php"><i class="bi-house"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="select_exam.php"><i class="bi-journal-text"></i> Select Exam</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lastresult.php"><i class="bi-graph-up"></i> Last Result</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aboutus.php"><i class="bi-info-circle"></i> About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewvideo.php"><i class="bi-journal-text"></i> Video Lecture</a>
                </li>
            </ul>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Hello, <?php echo htmlspecialchars($_SESSION['email']); ?>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="change_password.php">Change Password</a></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero">
    <div>
        <h1>Welcome to Brainiac Lokendra Quizzes!</h1>
        <p>Your journey to success in exams starts here.</p>
       <!-- <a href="select_exam.php" class="btn btn-primary btn-lg">Start Quiz</a>-->
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
