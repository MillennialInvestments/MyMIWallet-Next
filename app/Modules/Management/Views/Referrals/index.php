<?php
$rows = $referralRows ?? [];
$startDate = $startDate ?? '';
$endDate = $endDate ?? '';
$referralCode = $referralCode ?? '';
?>

<div class="nk-block">
    <div class="nk-block-head-xs">
        <div class="nk-block-head-content">
            <h1 class="nk-block-title title">Referral Conversion</h1>
            <p class="text-soft">Track referral conversion across registration, activation, login, and setup.</p>
        </div>
    </div>

    <div class="card card-bordered mb-3">
        <div class="card-inner">
            <form method="get" class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label">Start date</label>
                    <input type="date" name="start_date" class="form-control" value="<?= esc($startDate) ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">End date</label>
                    <input type="date" name="end_date" class="form-control" value="<?= esc($endDate) ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Referral code</label>
                    <input type="text" name="referral_code" class="form-control" placeholder="Optional" value="<?= esc($referralCode) ?>">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card card-bordered">
        <div class="card-inner">
            <table class="table table-bordered" id="referral-conversion-table">
                <thead>
                    <tr>
                        <th>Referral Code</th>
                        <th>Registrations</th>
                        <th>Activations</th>
                        <th>First Logins</th>
                        <th>Setup Completes</th>
                        <th>Conversion %</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row): ?>
                        <tr>
                            <td><?= esc($row['referral_code'] ?? '') ?></td>
                            <td><?= esc((string) ($row['registrations'] ?? 0)) ?></td>
                            <td><?= esc((string) ($row['activations'] ?? 0)) ?></td>
                            <td><?= esc((string) ($row['first_logins'] ?? 0)) ?></td>
                            <td><?= esc((string) ($row['setup_completes'] ?? 0)) ?></td>
                            <td><?= esc((string) ($row['conversion_rate'] ?? 0)) ?>%</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    (function() {
        if (window.jQuery && $.fn && $.fn.DataTable) {
            $('#referral-conversion-table').DataTable({
                order: [[1, 'desc']],
                pageLength: 25,
            });
        }
    })();
</script>
