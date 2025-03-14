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
    $stmt = $pdo->prepare("INSERT INTO tasks (title, description, department, status) VALUES (?, ?, ?, ?)");
    $stmt->execute([$title, $description, $department, $status]);

    header("Location: ../tasks/index.php");
    exit;
}

function getTasks()
{
    $pdo = getDatabaseConnection();
    $stmt = $pdo->query("SELECT * FROM tasks WHERE status <> 'done'");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
