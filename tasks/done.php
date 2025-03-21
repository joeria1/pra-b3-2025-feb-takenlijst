<?php

require_once __DIR__ . '../../../backend/config1.php'; 


$sql = "SELECT title, department FROM tasks WHERE status = 'done'";
$stmt = $pdo->query("SELECT * FROM taken WHERE status = 'done' ORDER BY deadline ASC");
$result = $conn->query($sql); 

?>

<!DOCTYPE html>
<html lang="nl">
<link rel="stylesheet" href="../css/main.css">

<head>
    <title>Done Taken</title>
</head>
<body>

    <h1>Overzicht van "Done" Taken</h1>

    <a href="../index.php">Terug naar alle taken</a> 

    <?php if ($result->num_rows > 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Titel</th>
                    <th>Afdeling</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['title']) ?></td>
                        <td><?= htmlspecialchars($row['department']) ?></td>
                        <td><?= htmlspecialchars($task['deadline']) ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Er zijn geen taken met de status "done".</p>
    <?php endif; ?>

</body>
</html>

<?php

$conn->close();
?>
