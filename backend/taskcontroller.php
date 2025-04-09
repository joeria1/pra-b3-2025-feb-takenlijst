<?php
require_once 'database.php';

function createTask($data)
{
    $titel = trim($data['titel']);
    $description = trim($data['description']);
    $afdeling = trim($data['afdeling']);
    $deadline = trim($data['deadline']);
    $status = 'todo'; // Standaardwaarde

    // Inputvalidatie
    if (empty($titel) || empty($description) || empty($afdeling) || empty($deadline)) {
        die("Alle velden zijn verplicht!");
    }

    // SQL Query
    // Controleer of een taak met dezelfde titel al bestaat
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM taken WHERE title = ?");
    $stmt->execute([$titel]);
    try {
        if ($stmt->fetchColumn() > 0) {
            die("Een taak met deze titel bestaat al!");
        }
    } catch (PDOException $e) {
        die("Databasefout: " . $e->getMessage());
    }
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare("INSERT INTO taken (title, description, afdeling, deadline, status) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$titel, $description, $afdeling, $deadline, $status]);

    header("Location: ../tasks/index.php");
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
    $stmt = $pdo->prepare("SELECT * FROM taken WHERE afdeling = ? AND status <> 'done' ORDER BY deadline ASC");
    $stmt->execute([$afdeling]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
