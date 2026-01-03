<?php
$usage     = $chatUsage ?? [];
$global    = $usage['global'] ?? [];
$users     = $usage['users'] ?? [];
$month     = $usage['month'] ?? date('Y-m');
$alertPerc = $usage['alert']['percent'] ?? 80;
$budget    = (float) ($global['budget'] ?? 0);
$used      = (float) ($global['usd_used'] ?? 0);
$percent   = $global['percent'] ?? 0;
$config    = $chatConfig ?? [];
?>

<div class="nk-block">
    <div class="nk-block-head">
        <div class="nk-block-between g-2">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title">Chat AI Usage</h3>
                <div class="nk-block-des text-soft">Month: <?= esc($month); ?> &middot; Alert at <?= esc($alertPerc); ?>%</div>
            </div>
        </div>
    </div>

    <div class="card card-bordered mb-3">
        <div class="card-inner">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="small text-soft">Global usage</div>
                    <div class="fs-16px fw-bold">$<?= number_format($used, 2); ?> / $<?= number_format($budget, 2); ?></div>
                </div>
                <div>
                    <span class="badge <?= ($percent >= $alertPerc) ? 'bg-warning text-dark' : 'bg-success'; ?>">
                        <?= esc($percent); ?>%
                    </span>
                </div>
            </div>
            <div class="progress my-2">
                <div class="progress-bar <?= ($percent >= $alertPerc) ? 'bg-warning' : 'bg-primary'; ?>" style="width: <?= min(100, (int)$percent); ?>%"></div>
            </div>
            <div class="d-flex gap-2 flex-wrap">
                <form class="d-flex flex-wrap gap-2 align-items-end" action="<?= site_url('Management/Chat/Settings'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-check form-switch">
                        <input type="hidden" name="enabled" value="0">
                        <input class="form-check-input" type="checkbox" name="enabled" value="1" id="chatEnabled" <?= !empty($config['enabled']) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="chatEnabled">Chat enabled</label>
                    </div>
                    <div>
                        <label class="form-label small mb-0" for="provider">Provider</label>
                        <input type="text" class="form-control form-control-sm" name="provider" id="provider" value="<?= esc($config['provider'] ?? 'openai'); ?>">
                    </div>
                    <div>
                        <label class="form-label small mb-0" for="providerModel">Model</label>
                        <input type="text" class="form-control form-control-sm" name="providerModel" id="providerModel" value="<?= esc($config['providerModel'] ?? 'gpt-4o-mini'); ?>">
                    </div>
                    <div>
                        <label class="form-label small mb-0" for="monthlyBudgetUsd">Monthly Budget (USD)</label>
                        <input type="number" step="0.01" class="form-control form-control-sm" name="monthlyBudgetUsd" id="monthlyBudgetUsd" value="<?= esc($config['monthlyBudgetUsd'] ?? 0); ?>">
                    </div>
                    <div>
                        <label class="form-label small mb-0" for="alertThresholdPercent">Alert %</label>
                        <input type="number" min="1" max="100" class="form-control form-control-sm" name="alertThresholdPercent" id="alertThresholdPercent" value="<?= esc($config['alertThresholdPercent'] ?? 80); ?>">
                    </div>
                    <div>
                        <label class="form-label small mb-0" for="hardStopPercent">Hard Stop %</label>
                        <input type="number" min="1" max="100" class="form-control form-control-sm" name="hardStopPercent" id="hardStopPercent" value="<?= esc($config['hardStopPercent'] ?? 95); ?>">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </form>
                <form action="<?= site_url('Management/Chat/Settings'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="killSwitch" value="1">
                    <button type="submit" class="btn btn-danger btn-sm">Emergency Kill Switch</button>
                </form>
            </div>
        </div>
    </div>

    <div class="card card-bordered">
        <div class="card-inner">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="title mb-0">Per-user usage</h6>
                <form class="d-flex gap-2 align-items-end" action="<?= site_url('Management/Chat/ResetUser'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div>
                        <label class="form-label small mb-0" for="resetUserId">User ID</label>
                        <input type="number" min="1" class="form-control form-control-sm" name="user_id" id="resetUserId" required>
                    </div>
                    <div>
                        <label class="form-label small mb-0" for="resetMonth">Month</label>
                        <input type="text" class="form-control form-control-sm" name="month" id="resetMonth" placeholder="YYYY-MM" value="<?= esc($month); ?>">
                    </div>
                    <button type="submit" class="btn btn-outline-danger btn-sm">Reset Usage</button>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Email</th>
                            <th>Plan</th>
                            <th>USD Used</th>
                            <th>Tokens</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($users)): ?>
                            <tr>
                                <td colspan="6" class="text-center text-soft">No usage recorded for <?= esc($month); ?>.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($users as $user): ?>
                                <?php
                                    $rowPercent = $user['percent'] ?? 0;
                                    $isHot = $rowPercent !== null && $rowPercent >= $alertPerc;
                                ?>
                                <tr class="<?= $isHot ? 'table-warning' : ''; ?>">
                                    <td><?= esc($user['user_id']); ?></td>
                                    <td><?= esc($user['email'] ?? 'n/a'); ?></td>
                                    <td class="text-capitalize"><?= esc($user['plan'] ?? 'free'); ?></td>
                                    <td>$<?= number_format((float) ($user['usd_used'] ?? 0), 4); ?></td>
                                    <td><?= number_format((int) ($user['tokens'] ?? 0)); ?></td>
                                    <td>
                                        <?php if ($rowPercent === null): ?>
                                            <span class="badge bg-secondary">No cap</span>
                                        <?php elseif ($isHot): ?>
                                            <span class="badge bg-warning text-dark">Alert <?= esc($rowPercent); ?>%</span>
                                        <?php else: ?>
                                            <span class="badge bg-success"><?= esc($rowPercent); ?>%</span>
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
