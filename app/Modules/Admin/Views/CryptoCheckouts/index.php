<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= esc($title ?? 'Crypto Checkouts') ?> | MyMI Admin</title>
    <link rel="stylesheet" href="/assets/css/dashlite.css">
</head>
<body class="nk-body bg-lighter npc-general has-sidebar">
<div class="nk-app-root">
    <div class="nk-main">
        <div class="nk-wrap">
            <div class="nk-content">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">Crypto Checkouts Support</h3>
                                        <div class="nk-block-des text-soft">
                                            <p>Manage and audit multi-chain crypto checkouts (Ethereum, Base, XRPL, Bitcoin).</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php if (! empty($msg)): ?>
                                <div class="alert alert-success alert-icon"><?= esc($msg) ?></div>
                            <?php endif; ?>
                            <?php if (! empty($err)): ?>
                                <div class="alert alert-danger alert-icon"><?= esc($err) ?></div>
                            <?php endif; ?>

                            <div class="nk-block">
                                <div class="card card-bordered">
                                    <div class="card-inner border-bottom">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Filter by Status</h6>
                                            </div>
                                            <div class="card-tools">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="/Admin/Crypto/Checkouts" class="btn <?= empty($currentStatus) ? 'btn-primary' : 'btn-outline-light' ?>">All</a>
                                                    <?php foreach ($validStatuses as $st): ?>
                                                        <a href="/Admin/Crypto/Checkouts?status=<?= esc($st) ?>" class="btn <?= $currentStatus === $st ? 'btn-primary' : 'btn-outline-light' ?>"><?= esc(ucfirst($st)) ?></a>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-inner p-0">
                                        <table class="table table-tranx">
                                            <thead>
                                                <tr class="tb-tnx-head">
                                                    <th>Reference</th>
                                                    <th>Chain / Asset</th>
                                                    <th>User ID</th>
                                                    <th>Amount (USD)</th>
                                                    <th>Status</th>
                                                    <th>Result</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (empty($checkouts)): ?>
                                                    <tr>
                                                        <td colspan="7" class="text-center text-muted py-4">No checkouts found matching criteria.</td>
                                                    </tr>
                                                <?php else: ?>
                                                    <?php foreach ($checkouts as $row): ?>
                                                        <tr>
                                                            <td>
                                                                <span class="fw-bold"><?= esc($row['reference']) ?></span><br>
                                                                <small class="text-muted"><?= esc(date('Y-m-d H:i:s', (int) $row['created_at'])) ?></small>
                                                            </td>
                                                            <td>
                                                                <span class="badge bg-outline-info"><?= esc(strtoupper($row['chain'])) ?></span>
                                                                <span><?= esc($row['asset']) ?></span>
                                                            </td>
                                                            <td><?= esc($row['user_id']) ?></td>
                                                            <td>$<?= esc(number_format(((int) $row['usd_cents']) / 100, 2)) ?></td>
                                                            <td>
                                                                <span class="badge bg-<?= in_array($row['status'], ['confirmed', 'delivered']) ? 'success' : ($row['status'] === 'pending' ? 'warning' : 'danger') ?>">
                                                                    <?= esc($row['status']) ?>
                                                                </span>
                                                            </td>
                                                            <td><?= esc($row['result'] ?? '-') ?></td>
                                                            <td>
                                                                <?php if (in_array($row['status'], ['pending', 'unfulfilled', 'confirmed'])): ?>
                                                                    <form action="/Admin/Crypto/Checkouts/Action" method="POST" class="d-inline">
                                                                        <?= csrf_field() ?>
                                                                        <input type="hidden" name="reference" value="<?= esc($row['reference']) ?>">
                                                                        <input type="hidden" name="action" value="credit_gold">
                                                                        <button type="submit" class="btn btn-xs btn-outline-success">Credit Gold</button>
                                                                    </form>
                                                                    <form action="/Admin/Crypto/Checkouts/Action" method="POST" class="d-inline">
                                                                        <?= csrf_field() ?>
                                                                        <input type="hidden" name="reference" value="<?= esc($row['reference']) ?>">
                                                                        <input type="hidden" name="action" value="mark_refunded">
                                                                        <button type="submit" class="btn btn-xs btn-outline-danger">Mark Refunded</button>
                                                                    </form>
                                                                <?php else: ?>
                                                                    <span class="text-muted small">None</span>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
