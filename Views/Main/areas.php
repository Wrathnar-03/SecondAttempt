<main>
    <div class="display-data">
        <h2>Area Information</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Occupation</th>
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
    </div>
</main>