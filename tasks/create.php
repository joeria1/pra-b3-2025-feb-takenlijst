<?php
require_once '../backend/taskcontroller.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    createTask($_POST);
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Nieuwe Taak</title>
    <?php require_once __DIR__.'../index.php';?>
</head>
<body>
    <h1>Nieuwe Taak Toevoegen</h1>
    <form method="post">
        <label>Titel: <input type="text" name="title" required></label><br>
        <label>Beschrijving: <textarea name="description" required></textarea></label><br>
        <label>Afdeling:
            <select name="department" required>
                <option value="personeel">Personeel</option>
                <option value="horeca">Horeca</option>
                <option value="techniek">Techniek</option>
                <option value="inkoop">Inkoop</option>
                <option value="klantenservice">Klantenservice</option>
                <option value="groen">Groen</option>
            </select>
        </label><br>
        <label>Deadline: <input type="date" name="deadline" required></label><br>
        <select name="status">
        <option value="open" <?= $taak['status'] == 'open' ? 'selected' : '' ?>>Open</option>
        <option value="in_progress" <?= $taak['status'] == 'in_progress' ? 'selected' : '' ?>>In Progress</option>
        <option value="done" <?= $taak['status'] == 'done' ? 'selected' : '' ?>>Done</option>
    </select><br>
        <button type="submit">Toevoegen</button>
    </form>
</body>
</html>
