<?php
$filters = $filters ?? [
    'referral_code' => '',
    'status'        => '',
    'start_date'    => '',
    'end_date'      => '',
];
$referralReport = $referralReport ?? [];
?>

<div class="nk-block">
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="card-title-group align-start mb-3">
                <div class="card-title">
                    <h4 class="title">Referral Report</h4>
                    <p class="text-soft">Track referrals attributed to new user registrations.</p>
                </div>
                <div class="card-tools">
                    <a href="<?= site_url('Management/Users') ?>" class="btn btn-outline-light btn-sm">Back to Users</a>
                </div>
            </div>

            <form method="get" class="row g-3">
                <div class="col-md-3">
                    <label class="form-label" for="start-date">Start date</label>
                    <input class="form-control" type="date" id="start-date" name="start_date" value="<?= esc($filters['start_date']) ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="end-date">End date</label>
                    <input class="form-control" type="date" id="end-date" name="end_date" value="<?= esc($filters['end_date']) ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="referral-code">Referral code</label>
                    <input class="form-control" type="text" id="referral-code" name="referral_code" value="<?= esc($filters['referral_code']) ?>" placeholder="Referral code">
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="status">Status</label>
                    <select class="form-select" id="status" name="status">
                        <option value="" <?= $filters['status'] === '' ? 'selected' : '' ?>>All</option>
                        <option value="active" <?= $filters['status'] === 'active' ? 'selected' : '' ?>>Active</option>
                        <option value="inactive" <?= $filters['status'] === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                    </select>
                </div>
                <div class="col-12 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Apply filters</button>
                    <a class="btn btn-outline-light" href="<?= site_url('Management/Users/Referral-Report') ?>">Reset</a>
                </div>
            </form>
        </div>

        <div class="card-inner">
            <table class="table" id="referral-report-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Created</th>
                        <th>Referral Code</th>
                        <th>Referrer</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($referralReport as $row) : ?>
                        <tr>
                            <td>
                                <a href="<?= site_url('Management/Users/Profile/' . ($row['username'] ?? $row['id'])) ?>">
                                    <?= esc($row['id']) ?>
                                </a>
                            </td>
                            <td>
                                <div class="fw-bold"><?= esc($row['email'] ?? 'Unknown') ?></div>
                                <div class="text-soft small"><?= esc($row['username'] ?? '-') ?></div>
                            </td>
                            <td><?= esc(date('M d, Y', strtotime($row['created_at'] ?? ''))) ?></td>
                            <td><?= esc($row['referral_code'] ?? '-') ?></td>
                            <td>
                                <?php if (! empty($row['referrer_email']) || ! empty($row['referrer_username'])) : ?>
                                    <div class="fw-bold"><?= esc($row['referrer_email'] ?? 'Unknown') ?></div>
                                    <div class="text-soft small"><?= esc($row['referrer_username'] ?? '-') ?></div>
                                <?php else : ?>
                                    <span class="text-soft">—</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge bg-<?= (int) ($row['active'] ?? 0) === 1 ? 'success' : 'warning' ?>">
                                    <?= (int) ($row['active'] ?? 0) === 1 ? 'Active' : 'Inactive' ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function() {
    initDataTableSafe($('#referral-report-table'),{
        order: [[2, 'desc']],
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, 'All']]
    });
});
</script>
