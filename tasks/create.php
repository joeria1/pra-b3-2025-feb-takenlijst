<?php
require_once '../backend/tasksController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    createTask($_POST);
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuwe Taak</title>
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
        <button type="submit">Toevoegen</button>
    </form>
</body>
</html>
