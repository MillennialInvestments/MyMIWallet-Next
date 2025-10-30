<div class="container">
    <h4 class="mt-4">Crypto Overview</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Symbol</th>
                <th>Coin Name</th>
                <th>Coin Value</th>
                <th>Market Cap</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($cryptoData)): ?>
                <?php foreach ($cryptoData as $crypto): ?>
                    <tr>
                        <td><?= esc($crypto['symbol']) ?></td>
                        <td><?= esc($crypto['coin_name']) ?></td>
                        <td><?= esc($crypto['coin_value']) ?></td>
                        <td><?= esc($crypto['market_cap']) ?></td>
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
