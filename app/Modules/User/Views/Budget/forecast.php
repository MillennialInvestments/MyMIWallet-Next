<?php

$nonce = $nonce ?? ['style' => '', 'script' => ''];
$periodLabel   = $periodLabel   ?? '';
$months        = (int)($months ?? 12);
$useAvgMonths  = (int)($useAvgMonths ?? 3);
$baselineMonths= (int)($baselineMonths ?? $useAvgMonths);
$assumptions   = is_array($assumptions ?? null) ? $assumptions : ['incomeGrowth'=>3,'expenseGrowth'=>2,'inflation'=>2,'startingBalance'=>0];
$baseline      = is_array($baseline ?? null) ? $baseline : ['income'=>0,'expense'=>0];
$baselineHistory = is_array($baselineHistory ?? null) ? $baselineHistory : [];
$ending        = is_array($ending ?? null) ? $ending : ['income'=>0,'expense'=>0,'net'=>0,'balance'=>0];
$forecast      = is_array($forecast ?? null) ? $forecast : [];
$forecastTotals= is_array($forecastTotals ?? null) ? array_merge(['income'=>0,'expense'=>0,'surplus'=>0], $forecastTotals) : ['income'=>0,'expense'=>0,'surplus'=>0];
$queryParams   = is_array($queryParams ?? null) ? array_filter($queryParams, static function ($value) {
    return $value !== null && $value !== '';
}) : [];

$buildForecastUrl = static function (string $h) use ($queryParams): string {
    $qs = http_build_query($queryParams);
    return site_url('Budget/Forecast/' . $h) . ($qs ? ('?' . $qs) : '');
};
?>
<div class="container py-3">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h2 class="mb-0">Budget Forecast<?php if (trim($periodLabel) !== ''): ?> <small class="text-muted">(<?= esc($periodLabel) ?>)</small><?php endif; ?></h2>
        <a class="btn btn-secondary" href="<?= site_url('Budget'); ?>">Back to Budget</a>
    </div>

    <div class="d-flex flex-wrap gap-2 mb-3">
        <a class="btn btn-outline-primary <?= $months===12 ? 'active':'' ?>"  href="<?= $buildForecastUrl('1y') ?>">1Y</a>
        <a class="btn btn-outline-primary <?= $months===60 ? 'active':'' ?>"  href="<?= $buildForecastUrl('5y') ?>">5Y</a>
        <a class="btn btn-outline-primary <?= $months===120 ? 'active':'' ?>" href="<?= $buildForecastUrl('10y') ?>">10Y</a>
        <a class="btn btn-outline-primary <?= $months===180 ? 'active':'' ?>" href="<?= $buildForecastUrl('15y') ?>">15Y</a>
        <a class="btn btn-outline-primary <?= $months===360 ? 'active':'' ?>" href="<?= $buildForecastUrl('30y') ?>">30Y</a>
    </div>

    <form class="card shadow-sm mb-3" method="get" action="<?= current_url() ?>">
        <div class="card-header fw-semibold">Assumptions</div>
        <div class="card-body row g-3">
            <div class="col-6 col-md-2">
                <label class="form-label">Income Growth (%/yr)</label>
                <input type="number" step="0.1" name="incomeGrowth" class="form-control" value="<?= esc($assumptions['incomeGrowth']) ?>">
            </div>
            <div class="col-6 col-md-2">
                <label class="form-label">Expense Growth (%/yr)</label>
                <input type="number" step="0.1" name="expenseGrowth" class="form-control" value="<?= esc($assumptions['expenseGrowth']) ?>">
            </div>
            <div class="col-6 col-md-2">
                <label class="form-label">Inflation (%/yr)</label>
                <input type="number" step="0.1" name="inflation" class="form-control" value="<?= esc($assumptions['inflation']) ?>">
            </div>
            <div class="col-6 col-md-3">
                <label class="form-label">Starting Balance ($)</label>
                <input type="number" step="0.01" name="startingBalance" class="form-control" value="<?= esc($assumptions['startingBalance']) ?>">
            </div>
            <div class="col-6 col-md-3">
                <label class="form-label">Avg History Window (months)</label>
                <input type="number" min="1" max="12" name="useAvgMonths" class="form-control" value="<?= esc($useAvgMonths) ?>">
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end gap-2">
            <button class="btn btn-primary">Recalculate</button>
            <a class="btn btn-outline-secondary" href="<?= site_url('Budget/Forecast') ?>">Reset</a>
        </div>
    </form>

    <div class="row g-3 mb-3">
        <div class="col-md-3">
            <div class="card shadow-sm h-100"><div class="card-body">
                <div class="fw-semibold text-muted mb-1">Baseline Monthly Income</div>
                <div class="fs-4">$<?= number_format((float)($baseline['income'] ?? 0), 2) ?></div>
                <small class="text-muted">Averaged over <?= (int)$baselineMonths ?> month(s)</small>
            </div></div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm h-100"><div class="card-body">
                <div class="fw-semibold text-muted mb-1">Baseline Monthly Expense</div>
                <div class="fs-4">$<?= number_format((float)($baseline['expense'] ?? 0), 2) ?></div>
                <small class="text-muted">Averaged over <?= (int)$baselineMonths ?> month(s)</small>
            </div></div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm h-100"><div class="card-body">
                <div class="fw-semibold text-muted mb-1">Ending Monthly Net</div>
                <div class="fs-4">$<?= number_format((float)($ending['net'] ?? 0), 2) ?></div>
                <small class="text-muted">After growth over <?= (int)ceil($months/12) ?> year(s)</small>
            </div></div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm h-100"><div class="card-body">
                <div class="fw-semibold text-muted mb-1">Projected Balance</div>
                <div class="fs-4">$<?= number_format((float)($ending['balance'] ?? 0), 2) ?></div>
                <small class="text-muted">Starting from $<?= number_format((float)($assumptions['startingBalance'] ?? 0), 2) ?></small>
            </div></div>
        </div>
    </div>

    <div class="card shadow-sm mb-3">
        <div class="card-body row g-3 align-items-center">
            <div class="col-sm-4">
                <div class="fw-semibold text-muted text-uppercase small">Projected Income</div>
                <div class="fs-4 mb-0">$<?= number_format((float)$forecastTotals['income'], 2) ?></div>
                <small class="text-muted">Across <?= (int)$months ?> month(s)</small>
            </div>
            <div class="col-sm-4">
                <div class="fw-semibold text-muted text-uppercase small">Projected Expenses</div>
                <div class="fs-4 mb-0">$<?= number_format((float)$forecastTotals['expense'], 2) ?></div>
                <small class="text-muted">Across <?= (int)$months ?> month(s)</small>
            </div>
            <div class="col-sm-4">
                <div class="fw-semibold text-muted text-uppercase small">Projected Surplus</div>
                <div class="fs-4 mb-0">$<?= number_format((float)$forecastTotals['surplus'], 2) ?></div>
                <small class="text-muted">Net difference over the period</small>
            </div>
        </div>
    </div>

    <?php if (!empty($baselineHistory)): ?>
    <div class="card shadow-sm mb-3">
        <div class="card-header fw-semibold">Recent Baseline History</div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-sm table-striped mb-0">
                    <thead>
                        <tr>
                            <th>Month</th>
                            <th class="text-end">Income</th>
                            <th class="text-end">Expense</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($baselineHistory as $row): ?>
                        <tr>
                            <td><?= esc($row['label'] ?? ($row['date'] ?? '')) ?></td>
                            <td class="text-end">$<?= number_format((float)($row['income'] ?? 0), 2) ?></td>
                            <td class="text-end">$<?= number_format((float)($row['expense'] ?? 0), 2) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-header fw-semibold d-flex justify-content-between align-items-center">
            <span>Yearly Checkpoints</span>
            <small class="text-muted"><?= count($forecast) ?> month(s) projected</small>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-sm table-striped mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th class="text-end">Income (mo)</th>
                            <th class="text-end">Expense (mo)</th>
                            <th class="text-end">Net (mo)</th>
                            <th class="text-end">Cumulative</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($forecast)):
                        $count = 0;
                        foreach ($forecast as $row):
                            $count++;
                            $isCheckpoint = ($count === 1) || ($count % 12 === 0) || ($count === count($forecast));
                            if (!$isCheckpoint) {
                                continue;
                            }
                            $dateValue   = (string)($row['date'] ?? '');
                            $timestamp   = $dateValue !== '' ? strtotime($dateValue) : false;
                            $displayDate = $timestamp ? date('M Y', $timestamp) : $dateValue;
                    ?>
                        <tr>
                            <td><?= (int)$row['monthIndex'] ?></td>
                            <td><?= esc($displayDate) ?></td>
                            <td class="text-end">$<?= number_format((float)$row['income'], 2) ?></td>
                            <td class="text-end">$<?= number_format((float)$row['expense'], 2) ?></td>
                            <td class="text-end">$<?= number_format((float)$row['net'], 2) ?></td>
                            <td class="text-end">$<?= number_format((float)$row['cumulative'], 2) ?></td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="6" class="text-center text-muted py-4">No forecast data available.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>