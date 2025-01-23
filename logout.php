<?php
session_start();
session_destroy(); // Destroy all sessions
header("Location: master_login.php");
exit();
?>
