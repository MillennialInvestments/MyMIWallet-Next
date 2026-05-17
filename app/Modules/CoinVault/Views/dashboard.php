<?php $tableStatus = $table_status ?? []; ?>
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Coin Vault Dashboard</h4>
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
    
<div class="row g-gs">
  <div class="col-md-4"><div class="card card-bordered"><div class="card-inner"><h6>Projects</h6><div class="h3"><?= count($projects ?? []) ?></div></div></div></div>
  <div class="col-md-4"><div class="card card-bordered"><div class="card-inner"><h6>Pending Contributions</h6><div class="h3"><?= count($pending_contributions ?? []) ?></div></div></div></div>
  <div class="col-md-4"><div class="card card-bordered"><div class="card-inner"><h6>Pending Payouts</h6><div class="h3"><?= count($pending_payouts ?? []) ?></div></div></div></div>
</div>

</div>
