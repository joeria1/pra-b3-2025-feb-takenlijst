<?php
require_once '../backend/tasksController.php';

$tasks = getTasks(); // Ophalen van taken
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Takenlijst</title>
</head>
<body>
    <h1>Takenlijst</h1>
    <a href="create.php">Nieuwe taak toevoegen</a>
    <table border="1">
        <tr>
            <th>Titel</th>
            <th>Afdeling</th>
            <th>Status</th>
        </tr>
        <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?= htmlspecialchars($task['title']) ?></td>
            <td><?= htmlspecialchars($task['department']) ?></td>
            <td><?= htmlspecialchars($task['status']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
