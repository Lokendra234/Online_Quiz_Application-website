<?php
include "connection.php";
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Fetch exam categories from the database
$sql = "SELECT id, category, exam_time_in_minutes, exam_image FROM examcategory";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Exam - Brainiac Lokendra Quizzes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('img/HD.jpg');
            background-size: cover;
            background-attachment: fixed;
            font-family: 'Roboto', sans-serif;
            color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .custom-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 50px 25px;
            background: rgba(0, 0, 0, 0.8); 
            border: 1px solid #dee2e6; 
            border-radius: 8px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        }
        h1 {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        }
        .table {
            background: rgba(255, 255, 255, 0.5);
            color: #343a40;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table img {
            width: 100px;
            height: auto;
            object-fit: contain;
        }
        a {
        color: rgba(var(--bs-link-color-rgb), var(--bs-link-opacity, 1));
        text-decoration: none;
        font-weight: bold;
    }
    </style>
</head>
<body>
    <div class="container custom-container">
        <h1>Select an Exam Category</h1>
        <?php if ($result->num_rows > 0): ?>
            <table class="table table-bordered table-light">
                <thead class="table-primary">
                    <tr>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Exam Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td>
                                <a exam_id=<?php echo urlencode($row['category']); ?>">
                                    <img src="<?php echo !empty($row['exam_image']) ? 'img/' . htmlspecialchars($row['exam_image']) : 'img/default-logo.png'; ?>" 
                                         alt="<?php echo htmlspecialchars($row['category']); ?>" 
                                         onerror="this.onerror=null; this.src='img/default-logo.png';">
                                </a>
                            </td>
                            <td>
                                <a href="select_diff.php?exam_id=<?php echo urlencode($row['category']); ?>" class="text-dark">
                                    <?php echo htmlspecialchars($row['category']); ?>
                                </a>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($row['exam_time_in_minutes']); ?> minutes
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center text-muted">No categories available.</p>
        <?php endif; ?>
        <?php $con->close(); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
