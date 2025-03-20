<?php
require_once 'database.php';

function createTask($data)
{
    $title = trim($data['title']);
    $description = trim($data['description']);
    $department = trim($data['department']);
    $status = 'todo'; // Standaardwaarde

    // Inputvalidatie
    if (empty($title) || empty($description) || empty($department)) {
        die("Alle velden zijn verplicht!");
    }

    // SQL Query
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare("INSERT INTO taken (title, description, department, status) VALUES (?, ?, ?, ?)");
    $stmt->execute([$title, $description, $department, $status]);

    header("Location: ../taken/index.php");
    $userId = $_SESSION['user_id']; // Haal het user-id uit de sessie
    $stmt = $pdo->prepare("INSERT INTO taken (title, description, department, status, user) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$title, $description, $department, $status, $userId]);

    header("Location: ../taken/index.php");
    exit;
}

function getTasks()
{
    $pdo = getDatabaseConnection();
    $stmt = $pdo->query("SELECT * FROM taken WHERE status <> 'done'");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getMyTasks()
{
    $pdo = getDatabaseConnection();
    $userId = $_SESSION['user_id']; // Haal het user-id uit de sessie
    $stmt = $pdo->prepare("SELECT * FROM taken WHERE user = ?");
    $stmt->execute([$userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}w