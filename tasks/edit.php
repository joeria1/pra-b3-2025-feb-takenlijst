<?php require_once __DIR__.'/../backend/config1.php';?>
<?php require_once __DIR__.'/../backend/updatecontroller.php';?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Nieuwe Taak</title> 
    <?php require_once __DIR__.'../index.php';?>
    <link rel="stylesheet" href="../css/main.css">

</head>
<body>

    <h1> Tasks aanpassen </h1>
    <form method="post">
        <label>Titel: <input type="text" name="titel" value="<?= htmlspecialchars($task['title']) ?>" required></label><br>
        <label>Beschrijving: <textarea name="description" required><?= htmlspecialchars($task['description']) ?></textarea></label><br>
 
<!-- werkt nog niet -->  
        <label>Afdeling:
            <select name="department" required>
                <option value="personeel" <?= $task['department'] == 'personeel' ? 'selected' : '' ?>>Personeel</option>
                <option value="horeca" <?= $task['department'] == 'horeca' ? 'selected' : '' ?>>Horeca</option>
                <option value="techniek" <?= $task['department'] == 'techniek' ? 'selected' : '' ?>>Techniek</option>
                <option value="inkoop" <?= $task['department'] == 'inkoop' ? 'selected' : '' ?>>Inkoop</option>
                <option value="klantenservice" <?= $task['department'] == 'klantenservice' ? 'selected' : '' ?>>Klantenservice</option>
                <option value="groen" <?= $task['department'] == 'groen' ? 'selected' : '' ?>>Groen</option>
            </select>

        </label><br>
        <label>Deadline: <input type="date" name="deadline" value="<?= htmlspecialchars($task['deadline']) ?>" required></label><br>
        
<!-- werkt nog niet -->   
        <select name="status">
            <option value="open" <?= $task['status'] == 'open' ? 'selected' : '' ?>>Open</option>
            <option value="in_progress" <?= $task['status'] == 'in_progress' ? 'selected' : '' ?>>In Progress</option>
            <option value="done" <?= $task['status'] == 'done' ? 'selected' : '' ?>>Done</option>
        </select><br>
        <button type="submit">Opslaan</button>
    </form>
</body>
</html>
