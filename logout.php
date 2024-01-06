<?php
error_reporting(0);
session_start();
unset($_SESSION['username']);
session_destroy();

header("Location: login.php");
exit;
?>
