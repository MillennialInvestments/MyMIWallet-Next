<?php
/**
 * Automated +EV SGP & Arbitrage Radar View
 *
 * @var list<array> $edges
 * @var string $activeSport
 * @var string $activeType
 * @var string $disclaimer
 */
$edges ??= [];
$activeSport ??= 'ALL';
$activeType ??= 'all';
?>
<?= view('App\\Modules\\Sports\\Views\\nfl\\_responsive') ?>
<section class="container-fluid py-4" id="sports-value-finder-hub">
    <?= view('App\\Modules\\Sports\\Views\\_header', [
        'activeTab'    => 'value_finder',
        'pageTitle'    => 'Automated +EV SGP & Market Arbitrage Radar',
        'pageSubtitle' => 'Algorithmic detection of mispriced parlay juice, empirical covariance anomalies, and guaranteed cross-book arbitrage lines.',
    ]) ?>

    <!-- Control Bar & Filters -->
    <div class="card mb-4 shadow-sm border-0">
        <div class="card-body">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <form method="get" action="<?= site_url('My-Bets/Value-Finder') ?>" class="d-flex flex-wrap align-items-center gap-2">
                    <label class="form-label mb-0 fw-semibold small text-muted">Sport:</label>
                    <select name="sport" class="form-select form-select-sm" style="width: auto;" onchange="this.form.submit()">
                        <option value="ALL" <?= $activeSport === 'ALL' ? 'selected' : '' ?>>All Sports</option>
                        <option value="MLB" <?= $activeSport === 'MLB' ? 'selected' : '' ?>>MLB Baseball</option>
                        <option value="NHL" <?= $activeSport === 'NHL' ? 'selected' : '' ?>>NHL Hockey</option>
                        <option value="NFL" <?= $activeSport === 'NFL' ? 'selected' : '' ?>>NFL Football</option>
                        <option value="SOCCER" <?= $activeSport === 'SOCCER' ? 'selected' : '' ?>>Soccer (EPL/UCL)</option>
                        <option value="COLLEGE" <?= $activeSport === 'COLLEGE' ? 'selected' : '' ?>>College Sports (NCAAF/B)</option>
                    </select>

                    <label class="form-label mb-0 ms-2 fw-semibold small text-muted">Edge Type:</label>
                    <select name="type" class="form-select form-select-sm" style="width: auto;" onchange="this.form.submit()">
                        <option value="all" <?= $activeType === 'all' ? 'selected' : '' ?>>All Edges</option>
                        <option value="sgp" <?= $activeType === 'sgp' ? 'selected' : '' ?>>Correlated SGP (+EV)</option>
                        <option value="arbitrage" <?= $activeType === 'arbitrage' ? 'selected' : '' ?>>Cross-Book Arbitrage</option>
                    </select>
                </form>

                <div class="d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-sm btn-outline-warning fw-bold" id="btn-refresh-radar" onclick="triggerRadarScan()">
                        <i class="bi bi-arrow-repeat me-1"></i> Scan Live Edges
                    </button>
                    <span class="badge bg-success-subtle text-success border border-success-subtle">
                        <?= count($edges) ?> Active Inefficiencies
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Active Edges Radar Grid -->
    <div class="row g-4 mb-4">
        <?php if ($edges === []): ?>
            <div class="col-12 text-center py-5 text-muted">
                <i class="bi bi-radar fs-1 d-block mb-2 text-warning"></i>
                No high-edge market inefficiencies found meeting current filters. Click "Scan Live Edges" to run real-time solver.
            </div>
        <?php else: ?>
            <?php foreach ($edges as $edge): ?>
                <?php
                $isSgp = ($edge['scan_type'] ?? 'sgp') === 'sgp';
                $stars = (int) ($edge['star_rating'] ?? 1);
                $starIcons = str_repeat('★', $stars) . str_repeat('☆', 3 - $stars);
                $badgeColor = $stars === 3 ? 'danger' : ($stars === 2 ? 'warning' : 'primary');
                $legs = (array) ($edge['legs'] ?? []);
                ?>
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge bg-light text-secondary border me-1"><?= esc($edge['sport'] ?? 'SPORT') ?></span>
                                <span class="badge bg-<?= $badgeColor ?>-subtle text-<?= $badgeColor ?> border border-<?= $badgeColor ?>-subtle">
                                    <?= $isSgp ? 'Correlated +EV' : 'Arbitrage (Risk-Free)' ?>
                                </span>
                            </div>
                            <span class="text-warning fw-bold small" title="<?= $stars ?> of 3 stars edge"><?= $starIcons ?></span>
                        </div>
                        <div class="card-body pt-0 d-flex flex-column justify-content-between">
                            <div>
                                <h3 class="h6 fw-bold mb-2"><?= esc($edge['title'] ?? '') ?></h3>
                                <p class="small text-muted mb-3"><?= esc($edge['rationale'] ?? '') ?></p>

                                <div class="bg-light p-2 rounded mb-3 small">
                                    <div class="fw-semibold text-muted mb-1 text-uppercase" style="font-size: 0.75rem;">Correlated Legs / Lines:</div>
                                    <ul class="list-unstyled mb-0 font-monospace">
                                        <?php foreach ($legs as $leg): ?>
                                            <li class="mb-1 text-truncate">
                                                <i class="bi bi-check-circle-fill text-success me-1"></i>
                                                <?= esc((string) $leg) ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>

                            <div>
                                <div class="row g-2 mb-3 text-center small">
                                    <div class="col-4">
                                        <div class="border rounded py-1">
                                            <div class="text-muted text-uppercase" style="font-size: 0.65rem;">Fair Odds</div>
                                            <div class="fw-bold font-monospace text-primary">
                                                <?= (int) ($edge['fair_odds'] ?? 100) > 0 ? '+' . (int) $edge['fair_odds'] : (int) $edge['fair_odds'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="border rounded py-1">
                                            <div class="text-muted text-uppercase" style="font-size: 0.65rem;">Offered</div>
                                            <div class="fw-bold font-monospace text-dark">
                                                <?= (int) ($edge['offered_odds'] ?? 100) > 0 ? '+' . (int) $edge['offered_odds'] : (int) $edge['offered_odds'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="border rounded py-1 bg-success-subtle border-success-subtle">
                                            <div class="text-success text-uppercase fw-bold" style="font-size: 0.65rem;">Expected Edge</div>
                                            <div class="fw-bold font-monospace text-success">
                                                +<?= number_format((float) ($edge['ev_pct'] ?? 0.0), 1) ?>%
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-3 small text-muted">
                                    <span><i class="bi bi-shop me-1"></i> <?= esc($edge['sportsbook'] ?? 'Sportsbook') ?></span>
                                    <?php if (isset($edge['correlation_r'])): ?>
                                        <span class="badge bg-secondary-subtle text-dark font-monospace">r = <?= number_format((float) $edge['correlation_r'], 2) ?></span>
                                    <?php endif; ?>
                                </div>

                                <!-- 1-Click Track in Ledger Form -->
                                <form method="post" action="<?= site_url('My-Bets/Create') ?>">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="sport" value="<?= esc($edge['sport'] ?? 'MLB') ?>">
                                    <input type="hidden" name="sportsbook" value="<?= esc($edge['sportsbook'] ?? 'DraftKings') ?>">
                                    <input type="hidden" name="bet_type" value="<?= $isSgp ? 'SGP' : 'Arbitrage' ?>">
                                    <input type="hidden" name="event_description" value="<?= esc($edge['title'] ?? 'Edge Play') ?>">
                                    <input type="hidden" name="selection" value="<?= esc(implode(' + ', array_slice($legs, 0, 2))) ?>">
                                    <input type="hidden" name="odds" value="<?= (int) ($edge['offered_odds'] ?? 100) ?>">
                                    <input type="hidden" name="stake_amount" value="50.00">
                                    <input type="hidden" name="notes" value="+EV Radar Detection: +<?= number_format((float) ($edge['ev_pct'] ?? 0.0), 1) ?>% Edge vs Fair Odds">

                                    <button type="submit" class="btn btn-outline-success btn-sm w-100 fw-bold">
                                        <i class="bi bi-journal-plus me-1"></i> Track in My Bets Ledger ($50)
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <!-- Educational Regulatory Disclaimer Card -->
    <div class="card bg-light border-0 shadow-sm">
        <div class="card-body p-3 small text-muted d-flex align-items-center gap-2">
            <i class="bi bi-info-circle-fill text-secondary fs-5"></i>
            <div>
                <strong>Statistical Framework Notice:</strong> <?= esc($disclaimer) ?>
                All probability calculations are derived from historical covariance matrices and no-vig de-juicing formulas under <em>Lowe v. SEC</em>.
            </div>
        </div>
    </div>
</section>

<script<?= script_nonce_attr() ?>>
function triggerRadarScan() {
    const btn = document.getElementById('btn-refresh-radar');
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Scanning Books...';

    fetch('<?= site_url('My-Bets/Value-Finder/Scan') ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
        }
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            window.location.reload();
        } else {
            alert('Scan failed: ' + (data.message || 'Unknown error'));
            btn.disabled = false;
            btn.innerHTML = '<i class="bi bi-arrow-repeat me-1"></i> Scan Live Edges';
        }
    })
    .catch(err => {
        console.error(err);
        btn.disabled = false;
        btn.innerHTML = '<i class="bi bi-arrow-repeat me-1"></i> Scan Live Edges';
    });
}
</script>
