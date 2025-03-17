<?php
require_once '../backend/taskController.php';

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
    <a href="tasks/done.php">Bekijk "Done" Taken</a>
    <table border="1">
        <tr>
            <th>Titel</th>
            <th>Afdeling</th>
            <th>Beschrijving</th>
            <th>Status</th>
            <th>Aanpassen</th>
        </tr>
        <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?= htmlspecialchars($task['title']) ?></td>
            <td><?= htmlspecialchars($task['department']) ?></td>
            <td><?= htmlspecialchars($task['status']) ?></td>
            <td><?= htmlspecialchars($task['Beschrijving']) ?></td>
            <td><?= htmlspecialchars($task['afdeling']) ?></td>
            <td><a href="edit.php?id=<?= $tasks['id'];?>">Aanpassen</a></td>

        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
