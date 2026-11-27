<?php
/**
 * MLB Intelligence Dashboard View:
 * Pitcher strikeout distributions, batter platoon splits (LHP vs RHP), ballpark altitude adjustments, and F5 model.
 *
 * @var bool $tablesReady
 * @var list<array> $players
 * @var array<string,array> $parks
 * @var string $activePos
 * @var string|null $statsUpdated
 * @var string $disclaimer
 */
$players ??= [];
$parks ??= [];
$activePos ??= 'ALL';
$statsUpdated ??= null;
?>
<?= view('App\\Modules\\Sports\\Views\\nfl\\_responsive') ?>
<section class="container-fluid py-4" id="sports-mlb-index">
    <?= view('App\\Modules\\Sports\\Views\\_header', [
        'activeTab'    => 'mlb',
        'pageTitle'    => 'MLB Baseball Analytics & Prop Intelligence',
        'pageSubtitle' => 'Quantitative pitcher strikeout rates, batter platoon splits (LHP/RHP), ballpark altitude factors, and F5 run lines.',
    ]) ?>

    <!-- Position Navigation Pills -->
    <ul class="nav nav-pills mb-3" id="mlb-pos-pills">
        <li class="nav-item">
            <a class="nav-link <?= $activePos === 'ALL' ? 'active' : '' ?>" href="<?= site_url('MyMISports/MLB?pos=ALL') ?>">All Players</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $activePos === 'PITCHER' ? 'active' : '' ?>" href="<?= site_url('MyMISports/MLB?pos=PITCHER') ?>">Starting Pitchers (SP)</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $activePos === 'BATTER' ? 'active' : '' ?>" href="<?= site_url('MyMISports/MLB?pos=BATTER') ?>">Batters &amp; Sluggers</a>
        </li>
    </ul>

    <!-- Ballpark Factor Quick Matrix -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-xl-8">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                    <h2 class="h5 mb-0 fw-bold"><i class="bi bi-geo-alt-fill text-danger me-1"></i> Ballpark Dimensions &amp; Altitude Multipliers</h2>
                    <span class="badge bg-light text-dark border">Park Factors</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-hover align-middle mb-0">
                        <thead class="table-light small text-uppercase text-muted">
                            <tr>
                                <th>Team</th>
                                <th>Venue</th>
                                <th class="text-end">Altitude</th>
                                <th class="text-end">Run Factor</th>
                                <th class="text-end">HR Factor</th>
                                <th class="text-center">Environment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($parks as $p): ?>
                                <tr>
                                    <td><span class="badge bg-light text-dark border"><?= esc($p['team']) ?></span></td>
                                    <td class="fw-bold"><?= esc($p['venue_name']) ?></td>
                                    <td class="text-end font-monospace"><?= number_format((int) ($p['altitude_feet'] ?? 0)) ?> ft</td>
                                    <td class="text-end font-monospace <?= (float) $p['run_factor'] > 1.05 ? 'text-danger fw-bold' : ((float) $p['run_factor'] < 0.95 ? 'text-primary fw-bold' : '') ?>">
                                        <?= number_format((float) $p['run_factor'], 3) ?>x
                                    </td>
                                    <td class="text-end font-monospace <?= (float) $p['hr_factor'] > 1.05 ? 'text-danger fw-bold' : ((float) $p['hr_factor'] < 0.95 ? 'text-primary fw-bold' : '') ?>">
                                        <?= number_format((float) $p['hr_factor'], 3) ?>x
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-<?= ((int) ($p['is_dome'] ?? 0) === 1) ? 'info' : 'secondary' ?>-subtle text-dark">
                                            <?= ((int) ($p['is_dome'] ?? 0) === 1) ? 'Retractable / Dome' : 'Open Air' ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-4">
            <div class="card shadow-sm border-0 h-100 bg-primary-subtle text-dark">
                <div class="card-body">
                    <h3 class="h6 fw-bold text-primary mb-2"><i class="bi bi-calculator-fill me-1"></i> First 5 Innings (F5) Edge</h3>
                    <p class="small text-muted mb-3">
                        Starting pitcher performance accounts for over 75% of variance in the first 5 innings, removing erratic late-inning bullpen noise.
                    </p>
                    <ul class="list-unstyled small mb-3">
                        <li class="mb-1"><i class="bi bi-check-circle-fill text-success me-1"></i> FIP &amp; SIERA regression projections</li>
                        <li class="mb-1"><i class="bi bi-check-circle-fill text-success me-1"></i> Platoon strikeout splits vs LHP/RHP</li>
                        <li class="mb-1"><i class="bi bi-check-circle-fill text-success me-1"></i> Coors Field altitude air-density scaling</li>
                    </ul>
                    <a href="<?= site_url('My-Bets/Calculators') ?>" class="btn btn-sm btn-primary w-100">
                        Explore +EV Calculators <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Players Table -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0 fw-bold">Active MLB Player Roster</h2>
            <span class="badge bg-light text-dark border"><?= count($players) ?> players tracked</span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="mlb-players-table">
                <thead class="table-light small text-uppercase text-muted">
                    <tr>
                        <th>Player</th>
                        <th>Team</th>
                        <th>Pos</th>
                        <th>Type</th>
                        <th class="text-center">Games</th>
                        <th class="text-end">Primary Metric</th>
                        <th class="text-end">Secondary Metric</th>
                        <th class="text-end">Key Efficiency</th>
                        <th class="text-center">Matchup Intelligence</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($players === []): ?>
                        <tr>
                            <td colspan="9" class="text-center py-5 text-muted">
                                <i class="bi bi-baseball fs-1 d-block mb-2 text-muted"></i>
                                No MLB players loaded.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($players as $p): ?>
                            <?php $isP = ($p['type'] ?? '') === 'Pitcher'; ?>
                            <tr>
                                <td class="fw-bold">
                                    <a href="<?= site_url('MyMISports/MLB/Player/' . (int) $p['id']) ?>" class="text-decoration-none">
                                        <?= esc($p['full_name']) ?>
                                    </a>
                                </td>
                                <td><span class="badge bg-light text-dark border"><?= esc($p['team'] ?? 'MLB') ?></span></td>
                                <td><span class="badge bg-secondary-subtle text-secondary"><?= esc($p['position']) ?></span></td>
                                <td>
                                    <span class="badge bg-<?= $isP ? 'primary' : 'warning' ?>-subtle text-dark">
                                        <?= esc($p['type']) ?>
                                    </span>
                                </td>
                                <td class="text-center font-monospace"><?= (int) ($p['games'] ?? 0) ?></td>
                                <td class="text-end font-monospace fw-bold">
                                    <?= $isP ? number_format((float) ($p['k_pg'] ?? 0), 1) . ' Ks/G' : number_format((float) ($p['tb_pg'] ?? 0), 1) . ' TB/G' ?>
                                </td>
                                <td class="text-end font-monospace">
                                    <?= $isP ? number_format((float) ($p['ip_pg'] ?? 0), 1) . ' IP/G' : '.' . str_pad((string) (int) round(((float) ($p['avg'] ?? 0)) * 1000), 3, '0', STR_PAD_LEFT) . ' AVG' ?>
                                </td>
                                <td class="text-end font-monospace <?= $isP ? 'text-success' : 'text-danger' ?> fw-bold">
                                    <?= $isP ? number_format((float) ($p['era'] ?? 0), 2) . ' ERA' : (int) ($p['hr_total'] ?? 0) . ' HRs' ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?= site_url('MyMISports/MLB/Player/' . (int) $p['id']) ?>" class="btn btn-sm btn-outline-primary py-0 px-2">
                                        Analyze Splits <i class="bi bi-chevron-right ms-1"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
