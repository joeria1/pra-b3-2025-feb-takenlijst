<?php
require_once 'database.php';

function createTask($data)
{
    $title = trim($data['title']);
    $description = trim($data['description']);
    $department = trim($data['department']);
    $deadline = trim($data['deadline']);
    $status = 'todo'; // Standaardwaarde

    // Inputvalidatie
    if (empty($title) || empty($description) || empty($department) || empty($deadline)) {
        die("Alle velden zijn verplicht!");
    }

    // SQL Query
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare("INSERT INTO taken (title, description, department, deadline, status) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$title, $description, $department, $deadline, $status]);

    header("Location: ../taken/index.php");
    exit;
}

function getTasks()
{
    $pdo = getDatabaseConnection();
    $stmt = $pdo->query("SELECT * FROM taken WHERE status <> 'done' ORDER BY deadline ASC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getTasksByAfdeling($afdeling)
{
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare("SELECT * FROM taken WHERE department = ? AND status <> 'done' ORDER BY deadline ASC");
    $stmt->execute([$afdeling]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
