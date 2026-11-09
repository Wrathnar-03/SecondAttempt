<main>
    <div class="display-data">
        <h2>Log Information</h2>
        <table>
            <thead>
                <tr>
                    <th>Log ID</th>
                    <th>Date Created</th>
                    <th>Log Type</th>
                    <th>Log Details</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($logs) && is_array($logs)): ?>
                    <?php foreach ($logs as $log): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($log['log_id']); ?></td>
                            <td><?php echo htmlspecialchars($log['date_created'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($log['log_type'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($log['log_details'] ?? ''); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No logs found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php if ($user->isAdmin()): ?>
    <div class="alter-data">
        <h2>Alteration options</h2>
        <form action="controller.php" method="POST">
            <input type="hidden" name="action" value="insert">

            <input type="number" name="log_id" placeholder="Log ID">
            <input type="text" name="user_id" placeholder="User ID">
            <select name="log_type">
                <option value="entering">Entering</option>
                <option value="exiting">Exiting</option>
                <option value="report">Report</option>
                <option value="other">Other</option>
            </select>
            <input type="text" name="log_details" placeholder="Log details">
            
            <button type="submit">Submit</button>
        </form>
    </div>
    <?php endif; ?>
</main>