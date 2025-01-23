<?php
include "connection.php";

$category = isset($_GET['category']) ? $_GET['category'] : 'all';

if ($category === 'all') {
    $query = "SELECT * FROM addvideo";
} else {
    $query = "SELECT * FROM addvideo WHERE category = ?";
}

$stmt = $con->prepare($query);

if ($category !== 'all') {
    $stmt->bind_param("s", $category);
}

$stmt->execute();
$result = $stmt->get_result();

while ($video = $result->fetch_assoc()) {
    $videoSrc = htmlspecialchars($video['video']);
    $videoId = '';
    $embedSrc = '';
    if (strpos($videoSrc, 'youtube.com') !== false) {
        parse_str(parse_url($videoSrc, PHP_URL_QUERY), $urlParams);
        $videoId = $urlParams['v'] ?? '';
        $embedSrc = "https://www.youtube.com/embed/$videoId";
    } elseif (strpos($videoSrc, 'youtu.be') !== false) {
        $videoId = basename(parse_url($videoSrc, PHP_URL_PATH));
        $embedSrc = "https://www.youtube.com/embed/$videoId";
    } else {
        $embedSrc = $videoSrc;
    }
    
    echo "<div class='video-item' data-video-src='" . htmlspecialchars($embedSrc) . "'>";
    echo "<div class='video-thumbnail'>";
    if ($videoId) {
        echo "<img src='https://img.youtube.com/vi/$videoId/0.jpg' alt='Video thumbnail'>";
    } else {
        echo "<img src='/path/to/default/thumbnail.jpg' alt='Video thumbnail'>";
    }
    echo "</div>";
    echo "<div class='video-info'>";
    echo "<div class='video-title'>" . htmlspecialchars($video['category']) ."<span class='video-meta'>  •". rand(100, 999) . "K views </span> </div>";
    echo "</div>";
    echo "</div>";
}

$stmt->close();
$con->close();
?>