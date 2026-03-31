<?php
/** @var object $asset */
/** @var array $orderBook */
$orderBook = is_array($orderBook ?? null) ? $orderBook : ['buy' => [], 'sell' => []];
?>
<div class="container py-4">
    <h2><?= esc($asset->name ?? $asset->symbol ?? 'Project Asset') ?></h2>
    <p class="text-muted mb-4">Ticker: <strong><?= esc($asset->symbol ?? $asset->ticker ?? 'N/A') ?></strong></p>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card card-bordered">
                <div class="card-inner">
                    <h5>Buy Orders</h5>
                    <div class="table-responsive">
                        <table class="table table-sm table-striped">
                            <thead><tr><th>Price</th><th>Amount</th><th>Total</th></tr></thead>
                            <tbody>
                            <?php foreach (($orderBook['buy'] ?? []) as $order): ?>
                                <tr>
                                    <td><?= number_format((float) ($order['price'] ?? 0), 8) ?></td>
                                    <td><?= number_format((float) ($order['amount'] ?? 0), 8) ?></td>
                                    <td><?= number_format((float) ($order['total'] ?? 0), 2) ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-bordered">
                <div class="card-inner">
                    <h5>Sell Orders</h5>
                    <div class="table-responsive">
                        <table class="table table-sm table-striped">
                            <thead><tr><th>Price</th><th>Amount</th><th>Total</th></tr></thead>
                            <tbody>
                            <?php foreach (($orderBook['sell'] ?? []) as $order): ?>
                                <tr>
                                    <td><?= number_format((float) ($order['price'] ?? 0), 8) ?></td>
                                    <td><?= number_format((float) ($order['amount'] ?? 0), 8) ?></td>
                                    <td><?= number_format((float) ($order['total'] ?? 0), 2) ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
