<?php
session_start();
require_once __DIR__ . '/../database.php';

$pdo = getDatabaseConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!$pdo) {
        die("Databaseverbinding ontbreekt!");
    }


    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();


    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username'];
        header("Location: ../../index.php");
        exit();
    } else {
        header("Location: login.php?error=Ongeldige inloggegevens");
        exit();
    }
}
?>
