<?php
/**
 * Individual MLB Player Prop & Platoon Splits View.
 *
 * @var array $player
 * @var array $report
 * @var array<string,array> $parks
 * @var string $selectedOpponent
 * @var string $disclaimer
 */
$player ??= [];
$report ??= [];
$parks ??= [];
$selectedOpponent ??= 'COL';
$isPitcher = (bool) ($report['is_pitcher'] ?? false);
$splits = $report['splits'] ?? [];
$park = $report['park'] ?? [];
$f5 = $report['f5'] ?? [];
$games = $report['games'] ?? [];
?>
<?= view('App\\Modules\\Sports\\Views\\nfl\\_responsive') ?>
<section class="container-fluid py-4" id="sports-mlb-player">
    <?= view('App\\Modules\\Sports\\Views\\_header', [
        'activeTab'    => 'mlb',
        'pageTitle'    => esc($player['full_name'] ?? 'Player') . ' | MLB Prop Splits',
        'pageSubtitle' => 'Platoon splits, opposing strikeout rate tiers, ballpark altitude adjustments, and F5 modeling.',
    ]) ?>

    <!-- Player Banner & Opponent Selector -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-primary fs-6"><?= esc($player['position'] ?? 'SP') ?></span>
                    <span class="badge bg-dark fs-6"><?= esc($player['team'] ?? 'MLB') ?></span>
                    <span class="badge bg-secondary-subtle text-dark"><?= $isPitcher ? 'Starting Pitcher' : 'Position Player' ?></span>
                </div>
                <h2 class="h3 fw-bold mb-0"><?= esc($player['full_name'] ?? '') ?></h2>
            </div>

            <!-- Opponent Selection -->
            <form method="get" action="<?= site_url('MyMISports/MLB/Player/' . (int) ($player['id'] ?? 0)) ?>" class="d-flex align-items-center gap-2">
                <label for="opponent-select" class="small fw-bold text-muted text-nowrap">Opponent &amp; Venue:</label>
                <select name="opponent" id="opponent-select" class="form-select form-select-sm" onchange="this.form.submit()">
                    <?php foreach ($parks as $teamCode => $p): ?>
                        <option value="<?= esc($teamCode) ?>" <?= $selectedOpponent === $teamCode ? 'selected' : '' ?>>
                            <?= esc($teamCode) ?> — <?= esc($p['venue_name']) ?> (<?= number_format((int) ($p['altitude_feet'] ?? 0)) ?> ft)
                        </option>
                    <?php endforeach; ?>
                </select>
                <noscript><button type="submit" class="btn btn-sm btn-primary">Apply</button></noscript>
            </form>
        </div>
    </div>

    <!-- Matchup & Park Impact Summary -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card shadow-sm border-0 h-100 border-start border-4 border-info">
                <div class="card-body">
                    <span class="text-uppercase text-muted small fw-bold">Venue Factor: <?= esc($park['venue_name'] ?? 'Ballpark') ?></span>
                    <h3 class="h4 fw-bold mt-1 mb-2">
                        <?= number_format((float) ($park['run_factor'] ?? 1.0), 3) ?>x Runs
                        <span class="fs-6 text-muted fw-normal">/ <?= number_format((float) ($park['hr_factor'] ?? 1.0), 3) ?>x HR</span>
                    </h3>
                    <p class="small text-muted mb-0">
                        Altitude: <strong><?= number_format((int) ($park['altitude_feet'] ?? 0)) ?> ft</strong>
                        (<?= ((int) ($park['is_dome'] ?? 0) === 1) ? 'Domed / Climate Controlled' : 'Open Air Natural Turf' ?>).
                    </p>
                </div>
            </div>
        </div>

        <?php if ($isPitcher && $f5 !== []): ?>
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card shadow-sm border-0 h-100 border-start border-4 border-success">
                    <div class="card-body">
                        <span class="text-uppercase text-muted small fw-bold">First 5 Innings (F5) Model</span>
                        <h3 class="h4 fw-bold mt-1 mb-2 text-success">
                            <?= number_format((float) ($f5['team_a_prob'] ?? 0.5) * 100, 1) ?>% Implied Win
                        </h3>
                        <p class="small text-muted mb-0">
                            F5 Projected Total: <strong><?= esc((string) ($f5['f5_total_runs'] ?? 4.5)) ?> Runs</strong>.
                            Edge: <strong><?= esc($f5['edge_pick'] ?? 'Neutral') ?></strong>
                        </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="col-12 col-md-6 col-xl-4">
            <div class="card shadow-sm border-0 h-100 border-start border-4 border-primary">
                <div class="card-body">
                    <span class="text-uppercase text-muted small fw-bold">Sample Log Size</span>
                    <h3 class="h4 fw-bold mt-1 mb-2"><?= count($games) ?> Games Tracked</h3>
                    <p class="small text-muted mb-0">Empirical distribution across home/away and opposing tiers.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Splits Table -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0 fw-bold">
                <?= $isPitcher ? 'Pitcher Splits by Opponent Strikeout Tier' : 'Batter Platoon Splits (vs LHP / vs RHP)' ?>
            </h2>
            <span class="badge bg-light text-dark border">Quantitative Distributions</span>
        </div>
        <div class="table-responsive">
            <table class="table table-sm table-hover align-middle mb-0">
                <thead class="table-light small text-uppercase text-muted">
                    <tr>
                        <th>Prop Market</th>
                        <th class="text-end">Overall Avg</th>
                        <th class="text-end"><?= $isPitcher ? 'Top 10 K Defense' : 'vs Left-Handed (LHP)' ?></th>
                        <th class="text-end"><?= $isPitcher ? 'Mid 10 Defense' : 'vs Right-Handed (RHP)' ?></th>
                        <?php if ($isPitcher): ?>
                            <th class="text-end">Bottom 10 K Defense</th>
                        <?php endif; ?>
                        <th class="text-end">Std Dev (&sigma;)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($splits as $marketKey => $data): ?>
                        <tr>
                            <td class="fw-bold">
                                <?= esc(\App\Modules\Sports\Libraries\MlbSplitsCalculator::PITCHER_MARKETS[$marketKey] ?? \App\Modules\Sports\Libraries\MlbSplitsCalculator::BATTER_MARKETS[$marketKey] ?? $marketKey) ?>
                            </td>
                            <td class="text-end font-monospace fw-bold text-primary">
                                <?= number_format((float) ($data['overall']['avg'] ?? 0), 2) ?>
                            </td>
                            <td class="text-end font-monospace">
                                <?= number_format((float) ($isPitcher ? ($data['top']['avg'] ?? 0) : ($data['vs_lhp']['avg'] ?? 0)), 2) ?>
                            </td>
                            <td class="text-end font-monospace">
                                <?= number_format((float) ($isPitcher ? ($data['mid']['avg'] ?? 0) : ($data['vs_rhp']['avg'] ?? 0)), 2) ?>
                            </td>
                            <?php if ($isPitcher): ?>
                                <td class="text-end font-monospace text-success fw-bold">
                                    <?= number_format((float) ($data['bottom']['avg'] ?? 0), 2) ?>
                                </td>
                            <?php endif; ?>
                            <td class="text-end font-monospace text-muted">
                                &plusmn;<?= number_format((float) ($data['overall']['std'] ?? 0), 2) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Game Logs Table -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3 border-0">
            <h2 class="h5 mb-0 fw-bold">Recent Game Logs</h2>
        </div>
        <div class="table-responsive">
            <table class="table table-sm table-hover align-middle mb-0">
                <thead class="table-light small text-uppercase text-muted">
                    <tr>
                        <th>Date</th>
                        <th>Opp</th>
                        <th>H/A</th>
                        <?php if ($isPitcher): ?>
                            <th class="text-end">IP</th>
                            <th class="text-end">Ks</th>
                            <th class="text-end">Hits</th>
                            <th class="text-end">ER</th>
                            <th class="text-end">BB</th>
                            <th class="text-end">Pitches</th>
                        <?php else: ?>
                            <th>Pitcher Hand</th>
                            <th class="text-end">AB</th>
                            <th class="text-end">Hits</th>
                            <th class="text-end">2B</th>
                            <th class="text-end">HR</th>
                            <th class="text-end">TB</th>
                            <th class="text-end">RBI</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($games as $g): ?>
                        <tr>
                            <td class="font-monospace small"><?= esc($g['game_date']) ?></td>
                            <td><span class="badge bg-light text-dark border"><?= esc($g['opponent']) ?></span></td>
                            <td><?= esc($g['home_away']) ?></td>
                            <?php if ($isPitcher): ?>
                                <td class="text-end font-monospace"><?= number_format((float) ($g['ip'] ?? 0), 1) ?></td>
                                <td class="text-end font-monospace fw-bold text-primary"><?= (int) ($g['strikeouts'] ?? 0) ?></td>
                                <td class="text-end font-monospace"><?= (int) ($g['hits_allowed'] ?? 0) ?></td>
                                <td class="text-end font-monospace"><?= (int) ($g['er'] ?? 0) ?></td>
                                <td class="text-end font-monospace"><?= (int) ($g['walks'] ?? 0) ?></td>
                                <td class="text-end font-monospace"><?= (int) ($g['pitches'] ?? 0) ?></td>
                            <?php else: ?>
                                <td><span class="badge bg-secondary-subtle text-dark"><?= esc($g['opp_pitcher_hand']) ?>HP</span></td>
                                <td class="text-end font-monospace"><?= (int) ($g['at_bats'] ?? 0) ?></td>
                                <td class="text-end font-monospace fw-bold"><?= (int) ($g['hits'] ?? 0) ?></td>
                                <td class="text-end font-monospace"><?= (int) ($g['doubles'] ?? 0) ?></td>
                                <td class="text-end font-monospace text-danger fw-bold"><?= (int) ($g['home_runs'] ?? 0) ?></td>
                                <td class="text-end font-monospace text-primary fw-bold"><?= (int) ($g['total_bases'] ?? 0) ?></td>
                                <td class="text-end font-monospace"><?= (int) ($g['rbi'] ?? 0) ?></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
