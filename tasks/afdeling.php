<?php
require_once '../backend/taskcontroller.php';

$afdeling = $_GET['afdeling'] ?? '';

if (empty($afdeling)) {
    die("Geen afdeling opgegeven!");
}

$tasks = getTasksByAfdeling($afdeling);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Takenlijst per Afdeling</title>
</head>
<body>
    <h1>Takenlijst voor afdeling <?= htmlspecialchars($afdeling) ?></h1>
    <a href="index.php">Terug naar overzicht</a>
    <table border="1">
        <tr>
            <th>Titel</th>
            <th>Afdeling</th>
            <th>Beschrijving</th>
            <th>Deadline</th>
            <th>Status</th>
        </tr>
        <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?= htmlspecialchars($task['title']) ?></td>
            <td><?= htmlspecialchars($task['department']) ?></td>
            <td><?= htmlspecialchars($task['description']) ?></td>
            <td><?= htmlspecialchars($task['deadline']) ?></td>
            <td><?= htmlspecialchars($task['status']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
