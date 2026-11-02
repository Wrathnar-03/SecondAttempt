<main>
    <h2>Listings</h2>
    <div class="table-holder">
        <table>
            <caption>Reserves</caption>
            <thead>
                <tr>
                    <th>Reserve ID</th>
                    <th>Arrival Time</th>
                    <th>Spot Reserved</th>
                    <th>Vehicle Type</th>
                    <th>Plate Number</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($spots)): ?>
                    <?php foreach ($spots as $spots): ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <table>
            <caption>Whitelist</caption>
            <thead>
                <tr>
                    <th>Whitelist ID</th>
                    <th>Whitelist Duration</th>
                    <th>Spots Available</th>
                    <th>Vehicle Type</th>
                    <th>Plate Number</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($spots)): ?>
                    <?php foreach ($spots as $spots): ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <table>
            <caption>Blacklist</caption>
            <thead>
                <tr>
                    <th>Blacklist ID</th>
                    <th>Blacklist Duration</th>
                    <th>Vehicle Type</th>
                    <th>Plate Number</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($spots)): ?>
                    <?php foreach ($spots as $spots): ?>
                        <tr>
                            <td></td>
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