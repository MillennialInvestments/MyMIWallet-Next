<?php helper(['url','form']); ?>
<div class="container py-4">
    <div class="d-flex align-items-center mb-4">
        <h1 class="h3 mb-0">MyMI Auctions</h1>
        <span class="badge bg-warning-subtle text-warning-emphasis ms-3">Powered by MyMIGold</span>
    </div>

    <section class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h5 mb-0">Live Auctions</h2>
            <small class="text-muted">Anti-sniping protection automatically extends auctions placed in the final minutes.</small>
        </div>
        <?php if (empty($liveLots)): ?>
            <p class="text-muted">No live auctions yet. Check back soon!</p>
        <?php else: ?>
            <div class="row g-3">
                <?php foreach ($liveLots as $lot): ?>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm">
                            <?php if (! empty($lot['images'])): ?>
                                <img src="<?= esc($lot['images'][0] ?? '') ?>" class="card-img-top" alt="<?= esc($lot['title']) ?>">
                            <?php endif; ?>
                            <div class="card-body d-flex flex-column">
                                <h3 class="h6"><?= esc($lot['title']) ?></h3>
                                <p class="small text-muted mb-2">Ends <?= esc(date('M j, g:i A', strtotime($lot['ends_at']))); ?></p>
                                <p class="mb-1">
                                    <span class="text-muted">FMV:</span>
                                    <strong><?= number_format(($lot['fmv_amount_cents'] ?? 0) / 100, 2) ?> MYMIGold</strong>
                                </p>
                                <?php
                                $topAmount = is_array($lot['top_bid'] ?? null) ? (int) ($lot['top_bid']['amount_cents'] ?? 0) : 0;
                                $current   = $topAmount > 0 ? $topAmount : (int) ($lot['reserve_cents'] ?? 0);
                                ?>
                                <p class="mb-3">
                                    <span class="text-muted">Top Bid:</span>
                                    <strong class="<?= ($lot['fmv_amount_cents'] ?? 0) && $current > ($lot['fmv_amount_cents'] ?? 0) ? 'text-danger' : 'text-success' ?>">
                                        <?= number_format($current / 100, 2) ?> MYMIGold
                                    </strong>
                                </p>
                                <div class="mt-auto">
                                    <a href="<?= site_url('Auctions/Item/' . $lot['item_id']) ?>" class="btn btn-primary w-100">View &amp; Bid</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>

    <section class="mb-5">
        <h2 class="h5 mb-3">Scheduled Auctions</h2>
        <?php if (empty($scheduledLots)): ?>
            <p class="text-muted">No scheduled auctions.</p>
        <?php else: ?>
            <div class="row g-3">
                <?php foreach ($scheduledLots as $lot): ?>
                    <div class="col-md-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h3 class="h6"><?= esc($lot['title']) ?></h3>
                                <p class="text-muted small mb-2">Starts <?= esc(date('M j, g:i A', strtotime($lot['starts_at']))); ?></p>
                                <p class="mb-0">FMV: <strong><?= number_format(($lot['fmv_amount_cents'] ?? 0) / 100, 2) ?> MYMIGold</strong></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>

    <section>
        <h2 class="h5 mb-3">Recently Ended</h2>
        <?php if (empty($endedLots)): ?>
            <p class="text-muted">No auctions have ended yet.</p>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-sm align-middle">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Winner</th>
                            <th class="text-end">Winning Bid (MYMIGold)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($endedLots as $lot): ?>
                            <tr>
                                <td><?= esc($lot['title']) ?></td>
                                <td><?= esc($lot['winner_id'] ?? 'TBD') ?></td>
                                <?php
                                    $winning = (int) ($lot['winning_cents'] ?? 0);
                                    if ($winning === 0 && isset($lot['top_bid']['amount_cents'])) {
                                        $winning = (int) $lot['top_bid']['amount_cents'];
                                    }
                                ?>
                                <td class="text-end"><?= number_format($winning / 100, 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </section>
</div>