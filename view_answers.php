<?php
session_start();
include "connection.php";

$result_id = isset($_GET['result_id']) ? intval($_GET['result_id']) : 0;

if ($result_id > 0) {
    $stmt = $con->prepare("SELECT question, user_answer, correct_answer FROM quiz_answers WHERE result_id = ?");
    $stmt->bind_param("i", $result_id);
    $stmt->execute();
    $answers = $stmt->get_result();
} else {
    $answers = false;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Answers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        h2 {
            margin-bottom: 20px;
            font-weight:bold;
            color:black;
        }
        .table {
            background-color: silver;
            border-radius: 0.5rem;
            overflow: hidden;
        }
        .table th {
            background-color: #007bff;
            font-weight:bold;
            color: black;
        }
        .table td {
            vertical-align: middle;
        }
        .btn-primary {
            margin-top: 20px;
            font-weight: bold;
            color:black;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h2>Your Answers</h2>
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Question</th>
                        <th>Your Answer</th>
                        <th>Correct Answer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($answers && $answers->num_rows > 0) {
                        while ($row = $answers->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row["question"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["user_answer"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["correct_answer"]) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3' class='text-center text-muted'>No answers found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <a href="lastresult.php" class="btn btn-primary">Back to Results</a>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
