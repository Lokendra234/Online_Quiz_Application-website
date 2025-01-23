<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Video Lectures</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0,0,0,.08);
        }
        .navbar-brand {
            font-weight: bold;
            color: #ff0000;
        }
        .category-tabs {
            overflow-x: auto;
            white-space: nowrap;
            padding: 10px 0;
            background-color: #ffffff;
            border-bottom: 1px solid #e0e0e0;
        }
        .category-tabs .nav-link {
            color: #606060;
            border: none;
            padding: 8px 16px;
            margin-right: 8px;
            cursor: pointer;
        }
        .category-tabs .nav-link.active {
            color: #030303;
            font-weight: bold;
            border-bottom: 3px solid #030303;
        }
        .video-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .video-item {
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12);
            cursor: pointer;
        }
        .video-thumbnail {
            position: relative;
            padding-top: 56.25%;
        }
        .video-thumbnail img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .video-info {
            padding: 12px;
        }
        .video-title {
            font-weight: bold;
            margin-bottom: 4px;
        }
        .video-meta {
            font-size: 0.9rem;
            color: #606060;
        }
        .modal-dialog {
            max-width: 800px;
        }
        .modal-content {
            background-color: #000;
        }
        .modal-body {
            padding: 0;
        }
        .embed-responsive {
            position: relative;
            display: block;
            width: 100%;
            padding: 0;
            overflow: hidden;
        }
        .embed-responsive::before {
            content: "";
            display: block;
            padding-top: 56.25%;
        }
        .embed-responsive iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">VideoTube</a>
            <form class="d-flex ms-auto">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-danger" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="category-tabs">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-category="all">All</a>
            </li>
            <?php
            include "connection.php";
            $categories = $con->query("SELECT DISTINCT category FROM addvideo");
            while ($cat = $categories->fetch_assoc()) {
                echo "<li class='nav-item'>";
                echo "<a class='nav-link' data-category='" . htmlspecialchars($cat['category']) . "'>" . htmlspecialchars($cat['category']) . "</a>";
                echo "</li>";
            }
            ?>
        </ul>
    </div>

    <div class="container-fluid">
        <div id="video-grid" class="video-grid">
            <!-- Videos will be loaded here -->
        </div>
    </div>

    <!-- Video Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Load all videos initially
            loadVideos('all');

            // Handle category click
            $('.category-tabs .nav-link').click(function() {
                $('.category-tabs .nav-link').removeClass('active');
                $(this).addClass('active');
                var category = $(this).data('category');
                loadVideos(category);
            });

            function loadVideos(category) {
                $.ajax({
                    url: 'fetch_videos.php',
                    type: 'GET',
                    data: { category: category },
                    success: function(response) {
                        $('#video-grid').html(response);
                        // Attach click event to video items
                        $('.video-item').click(function() {
                            var videoSrc = $(this).data('video-src');
                            $('#videoModal iframe').attr('src', videoSrc);
                            $('#videoModal').modal('show');
                        });
                    },
                    error: function() {
                        alert('Error loading videos');
                    }
                });
            }

            // Reset iframe src when modal is closed
            $('#videoModal').on('hidden.bs.modal', function () {
                $('#videoModal iframe').attr('src', '');
            });
        });
    </script>
</body>
</html>