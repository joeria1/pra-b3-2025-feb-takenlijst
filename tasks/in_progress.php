<?php
// in_progress.php

// Include database connection or necessary configurations
require_once '../backend/conn.php';

// Fetch tasks that are in progress from the database
$query = "SELECT * FROM tasks WHERE status = 'in_progress'";
$result = $db->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In Progress Tasks</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <h1>Tasks In Progress</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($task = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($task['id']); ?></td>
                        <td><?php echo htmlspecialchars($task['title']); ?></td>
                        <td><?php echo htmlspecialchars($task['description']); ?></td>
                        <td><?php echo htmlspecialchars($task['due_date']); ?></td>
                        <td>
                            <a href="edit_task.php?id=<?php echo $task['id']; ?>">Edit</a> |
                            <a href="delete_task.php?id=<?php echo $task['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No tasks in progress.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>