<?php
session_start();
include "connection.php";

$email_id = isset($_SESSION['email']) ? $_SESSION['email'] : '';

if (!empty($email_id)) {
    $stmt = $con->prepare("SELECT qr.id, qr.category, qr.difficulty, qr.score, qr.percentage, qr.date_taken 
                            FROM quiz_results qr 
                            WHERE qr.email_id = ?");
    $stmt->bind_param("s", $email_id);
    $stmt->execute();
    $results = $stmt->get_result();
} else {
    $results = false;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brainiac Lokendra Quizzes - Last Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
            background-image: url('img/space.jpg');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 2rem;
            max-width: 90%; /* Ensure it doesn't exceed viewport width */
            width: 100%;
        }
        .table thead th {
            background-color: #3566dc; /* Custom color */
            color: #fff;
        }
        .table tbody tr:hover {
            background-color: rgba(220, 53, 69, 0.1);
        }
        h2 {
            font-weight: bold;
        }
        .btn-danger {
            margin-left: 0.5rem;
        }
        .welcome-text {
            font-size: 1.15rem;
            font-weight: bold;
        }
        .text-center {
            text-align: center;
        }
        /* Responsive adjustments */
        @media (max-width: 576px) {
            .welcome-text {
                font-size: 1rem;
            }
            .btn-danger, .btn-outline-danger {
                font-size: 0.875rem;
                padding: 0.375rem 0.75rem;
            }
        }
        @media (min-width: 577px) and (max-width: 768px) {
            .welcome-text {
                font-size: 1.05rem;
            }
        }
        @media (min-width: 769px) {
            .welcome-text {
                font-size: 1.15rem;
            }
        }

    </style>
</head>
<body>
<div class="container shadow-lg">
    <h2 class="text-dark">Last Quiz Results</h2>
    <span class="text-dark welcome-text">Welcome, <?php echo htmlspecialchars($email_id); ?></span>

    <div class="table-responsive mt-4">
    <table class="table table-bordered table-hover table-responsive">
    <thead>
        <tr>
            <th>Category</th>
            <th>Difficulty</th>
            <th>Score</th>
            <th>Percentage</th>
            <th>Date Taken</th>
            <th>View Answers</th>
        </tr>
    </thead>
    <tbody>
    <?php
    if ($results && $results->num_rows > 0) {
        while ($row = $results->fetch_assoc()) {
            // Determine row class based on score or any other criteria
            $rowClass = '';
            if ($row['score'] >= 90) {
                $rowClass = 'table-success';
            } elseif ($row['score'] >= 75) {
                $rowClass = 'table-warning';
            } elseif ($row['score'] < 75) {
                $rowClass = 'table-danger';
            }

            echo "<tr class='$rowClass'>";
            echo "<td>" . htmlspecialchars($row["category"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["difficulty"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["score"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["percentage"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["date_taken"]) . "</td>";
            echo "<td><a href='view_answers.php?result_id=" . $row['id'] . "' class='btn btn-info btn-sm'>View</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6' class='text-center text-muted'>No results found</td></tr>";
    }
    ?>
    </tbody>
</table>

    </div>

    <div class="mt-4">
        <a href="index.php" class="btn btn-primary">Back to Home</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
