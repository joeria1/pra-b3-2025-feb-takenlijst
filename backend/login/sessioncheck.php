<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../backend/login/login.php");
    exit();
}
?>
