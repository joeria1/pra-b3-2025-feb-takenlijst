<?php
require_once '../backend/taskcontroller.php';
session_start();

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

$tasks = getMyTasks();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mijn Taken</title>
</head>
<body>
    <h1>Mijn Taken</h1>
    <a href="../taken/index.php">Terug naar alle taken</a>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <strong><?php echo htmlspecialchars($task['title']); ?></strong><br>
                <?php echo htmlspecialchars($task['description']); ?><br>
                <em>Afdeling: <?php echo htmlspecialchars($task['department']); ?></em>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>