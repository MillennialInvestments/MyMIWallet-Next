<div class="container">
    <h4 class="mt-4">Stock Overview</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Symbol</th>
                <th>Company Name</th>
                <th>Market Cap</th>
                <th>Sector</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($stockData)): ?>
                <?php foreach ($stockData as $stock): ?>
                    <tr>
                        <td><?= esc($stock['symbol']) ?></td>
                        <td><?= esc($stock['company_name']) ?></td>
                        <td><?= esc($stock['market_cap']) ?></td>
                        <td><?= esc($stock['sector']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No data available.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
