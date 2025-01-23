<?php
include "connection.php";

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Fetch exams from the database
$sql = "SELECT id, category, exam_time_in_minutes FROM examcategory";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brainiac Lokendra Quizzes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('img/1000.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.0); 
            z-index: -1;
        }
        .container {
            max-width: 800px;
            padding: 40px;
            background: rgba(0, 0, 0, 0.1); 
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.5);
        }
        h1 {
            font-size: 2.75rem;
            font-weight: 800;
            margin-bottom: 30px;
            color: white;
        }
        @media (max-width: 768px) {
            h1 {
                font-size: 2.2rem;
            }
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="container text-center">
        <h1>Select a Difficulty</h1>
        
        <!-- Difficulty Level Table -->
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th scope="col">Difficulty Level</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Generate difficulty level rows
                $difficulties = ['easy' => 'Easy', 'medium' => 'Medium', 'hard' => 'Difficult'];
                foreach ($difficulties as $key => $value) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($value) . '</td>';
                    echo '<td><a href="quiz_play.php?exam_id=' . htmlspecialchars($_REQUEST['exam_id']) . '&b=' . htmlspecialchars($key) . '" class="btn btn-custom">Start Quiz</a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
