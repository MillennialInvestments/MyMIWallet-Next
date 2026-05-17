<?php $tableStatus = $table_status ?? []; ?>
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Payout Requests</h4>
            <p class="text-soft">Coin Vault wraps the existing MyMI Exchange/Solana stack with project coin vault accounting.</p>
        </div>
    </div>
    <?php if (! empty($tableStatus)) : ?>
        <div class="alert alert-warning">
            <strong>Schema review required before migration.</strong>
            <ul class="mb-0">
                <?php foreach ($tableStatus as $info) : ?>
                    <li><?= esc($info['table'] ?? '') ?>: <?= ! empty($info['exists']) ? 'available' : 'missing/recommended' ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    
<table class="table table-striped"><thead><tr><th>ID</th><th>User ID</th><th>Coins</th><th>USD Ref</th><th>Status</th></tr></thead><tbody>
<?php foreach (($payouts ?? []) as $row) : ?><tr><td><?= esc($row['id'] ?? '') ?></td><td><?= esc($row['user_id'] ?? '') ?></td><td><?= esc($row['coin_amount'] ?? '') ?></td><td><?= esc($row['usd_reference_amount'] ?? '') ?></td><td><?= esc($row['status'] ?? '') ?></td></tr><?php endforeach; ?>
</tbody></table>

</div>
