<?php $tableStatus = $table_status ?? []; ?>
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Coin Vault Project</h4>
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
    
<?php if (! empty($project)) : ?><pre><?= esc(json_encode($project, JSON_PRETTY_PRINT)) ?></pre><?php else : ?><p>No project loaded yet. Create schema after inventory review.</p><?php endif; ?>

</div>
