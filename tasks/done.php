<?php

require_once __DIR__ . '/../backend/config1.php';


try {
   
    $stmt = $conn->prepare("SELECT * FROM taken WHERE status != 'done' ORDER BY deadline ASC");
    $stmt->execute();
    $taken = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Fout bij ophalen van taken: " . $e->getMessage());
}
?>


<!DOCTYPE html>
<html lang="nl">

<head>
    <title>Done Taken</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>

    <h1>Open Taken</h1>
    <a href="../index.php">Terug naar alle taken</a> 

    <?php if (!empty($taken)): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Titel</th>
                    <th>Afdeling</th>
                    <th>Deadline</th>
                    <th>Actie</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($taken as $task){ 
                ?>
                    <tr>
                        <td><?= htmlspecialchars($task['title']) ?></td>
                        <td><?= htmlspecialchars($task['afdeling']) ?></td>
                        <td><?= htmlspecialchars($task['deadline']) ?></td>
                        <td>
                            <form method="post" action="update_status.php">
                                <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
                                <button type="submit">markeer als Done</button>
                            </form>
                        </td>
                    </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Er zijn geen taken met de status "done".</p>
    <?php endif; ?>

</body>
</html>


