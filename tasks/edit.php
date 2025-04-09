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
 
        <label>Afdeling:
    <select name="department" required>
        <?php
        $departments = ['personeel', 'horeca', 'techniek', 'inkoop', 'klantenservice', 'groen'];
        foreach ($departments as $dept) {
            $selected = ($task['department'] === $dept) ? 'selected' : '';
            echo "<option value=\"$dept\" $selected>" . ucfirst($dept) . "</option>";
        }
        ?>
     </select>
</label><br>

        <label>Deadline: <input type="date" name="deadline" value="<?= htmlspecialchars($task['deadline']) ?>" required></label><br>
        
<!-- werkt nog niet -->   
        <label>Status:</label>
        <select name="status" required>
            <option value="open" <?= ($task['status'] === 'open') ? 'selected' : '' ?>>Open</option>
            <option value="in_progress" <?= ($task['status'] === 'in_progress') ? 'selected' : '' ?>>In Progress</option>
            <option value="done" <?= ($task['status'] === 'done') ? 'selected' : '' ?>>Done</option>
        </select><br>
        <button type="submit">Opslaan</button>
    </form>
</body>
</html>
