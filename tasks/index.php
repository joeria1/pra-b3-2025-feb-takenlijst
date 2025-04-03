<?php
require_once '../backend/taskController.php';
require '../backend/login/sessioncheck.php';


$tasks = getTasks(); // Ophalen van taken
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/main.css">
    <title>Takenlijst</title>
    
</head>
<body>
    <h1>Takenlijst</h1>
    <a href="create.php">Nieuwe taak toevoegen</a>
    <a href="done.php">Bekijk "Done" Taken</a>
    <table border="1">
        <tr>
            <th>Titel</th>
            <th>Afdeling</th>
            <th>Beschrijving</th>
            <th>Status</th>
            <th>Deadline</th>

        </tr>
        <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?= htmlspecialchars($task['title']) ?></td>
            <td><?= htmlspecialchars($task['department']) ?></td>
            <td><?= htmlspecialchars($task['description']) ?></td>
            <td><?= htmlspecialchars($task['status']) ?></td>
            <td><?= htmlspecialchars($task['deadline']) ?></td>
            <td><a href="edit.php?id=<?= $tasks['id'];?>">Aanpassen</a></td>

        </tr>
        <a href="../tasks/my.php">Bekijk mijn taken</a>
        <?php endforeach; ?>
    </table>
</body>
</html>
