<?php
require_once __DIR__.'/../backend/config1.php';
require_once __DIR__.'/../backend/database.php'; // Zorg ervoor dat je database-connectie is ingeladen

// Controleer of een taak-ID is opgegeven
if (!isset($_GET['id'])) {
    die("Geen taak-ID opgegeven!");
}

$pdo = getDatabaseConnection(); 

// Haal de taak op uit de database
$stmt = $pdo->prepare("SELECT * FROM taken WHERE id = ?");
$stmt->execute([$_GET['id']]);
$task = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$task) {
    die("Taak niet gevonden!");
}

// **Formulierverwerking: Bijwerken van de taak**
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $department = $_POST['department'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];

    // SQL-query om de taak bij te werken
    $updateStmt = $pdo->prepare("UPDATE taken SET title = ?, description = ?, department = ?, deadline = ?, status = ? WHERE id = ?");
    $updateStmt->execute([$title, $description, $department, $deadline, $status, $_GET['id']]);

    // Redirect na opslaan
    header("Location: ../taken/index.php");
    exit;
}
?>
