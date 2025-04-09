
<label>Status:</label>
        <select name="status" required>
            <option value="open" <?= ($task['status'] ?? '') === 'open' ? 'selected' : '' ?>>Open</option>
            <option value="in_progress" <?= ($task['status'] ?? '') === 'in_progress' ? 'selected' : '' ?>>In Progress</option>
            <option value="done" <?= ($task['status'] ?? '') === 'done' ? 'selected' : '' ?>>Done</option>
        </select><br>

        <select name="status">
            <option value="open" <?= $task['status'] == 'open' ? 'selected' : '' ?>>Open</option>
            <option value="in_progress" <?= $task['status'] == 'in_progress' ? 'selected' : '' ?>>In Progress</option>
            <option value="done" <?= $task['status'] == 'done' ? 'selected' : '' ?>>Done</option>
        </select><br>