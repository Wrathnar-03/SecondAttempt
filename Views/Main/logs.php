<main>
    <h2>Log Information</h2>
    <table>
        <thead>
            <tr>
                <th>Log ID</th>
                <th>Date Created</th>
                <th>Source</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($spots)): ?>
                <?php foreach ($spots as $spots): ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</main>