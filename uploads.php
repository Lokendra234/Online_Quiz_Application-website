<?php
include("includes/header.php");
include("includes/topbar.php");
include("includes/sidebar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload CSV</title>
    <!-- Include Bootstrap 5 CSS if not already included in header -->
</head>
<body>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h2>Upload CSV File</h2>
                </div>
                <div class="card-body bg-light">
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="file" class="form-label">Choose CSV File:</label>
                            <input type="file" name="file" id="file" class="form-control" accept=".csv" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>
</body>
</html>
