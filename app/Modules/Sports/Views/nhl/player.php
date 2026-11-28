<?php
/**
 * Individual NHL Player Prop & Special Teams Splits View.
 *
 * @var array $player
 * @var array $report
 * @var array<string,array> $teamsDefense
 * @var string $selectedOpponent
 * @var string $disclaimer
 */
$player ??= [];
$report ??= [];
$teamsDefense ??= [];
$selectedOpponent ??= 'SJS';
$isGoalie = (bool) ($report['is_goalie'] ?? false);
$splits = $report['splits'] ?? [];
$oppDef = $report['opp_defense'] ?? [];
$st = $report['special_teams'] ?? [];
$games = $report['games'] ?? [];
?>
<?= view('App\\Modules\\Sports\\Views\\nfl\\_responsive') ?>
<section class="container-fluid py-4" id="sports-nhl-player">
    <?= view('App\\Modules\\Sports\\Views\\_header', [
        'activeTab'    => 'nhl',
        'pageTitle'    => esc($player['full_name'] ?? 'Player') . ' | NHL Prop Splits',
        'pageSubtitle' => 'Opponent shot suppression tiers, goalie save rates, and Power Play vs Penalty Kill mismatches.',
    ]) ?>

    <!-- Player Banner & Opponent Selector -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-primary fs-6"><?= esc($player['position'] ?? 'C') ?></span>
                    <span class="badge bg-dark fs-6"><?= esc($player['team'] ?? 'NHL') ?></span>
                    <span class="badge bg-secondary-subtle text-dark"><?= $isGoalie ? 'Goaltender' : 'Skater' ?></span>
                </div>
                <h2 class="h3 fw-bold mb-0"><?= esc($player['full_name'] ?? '') ?></h2>
            </div>

            <!-- Opponent Selection -->
            <form method="get" action="<?= site_url('MyMISports/NHL/Player/' . (int) ($player['id'] ?? 0)) ?>" class="d-flex align-items-center gap-2">
                <label for="nhl-opponent-select" class="small fw-bold text-muted text-nowrap">Opponent Matchup:</label>
                <select name="opponent" id="nhl-opponent-select" class="form-select form-select-sm" onchange="this.form.submit()">
                    <?php foreach ($teamsDefense as $teamCode => $d): ?>
                        <option value="<?= esc($teamCode) ?>" <?= $selectedOpponent === $teamCode ? 'selected' : '' ?>>
                            <?= esc($teamCode) ?> — SOG Rank #<?= (int) ($d['sog_def_rank'] ?? 15) ?> (PK <?= number_format((float) ($d['pk_pct'] ?? 80), 1) ?>%)
                        </option>
                    <?php endforeach; ?>
                </select>
                <noscript><button type="submit" class="btn btn-sm btn-primary">Apply</button></noscript>
            </form>
        </div>
    </div>

    <?php if (! empty($report['personalized_quant'])): ?>
        <?php $pq = $report['personalized_quant']; ?>
        <div class="alert alert-warning-subtle border border-warning-subtle py-2 px-3 mb-4 rounded-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-sliders text-warning fs-5"></i>
                <div>
                    <strong class="text-dark">Personalized Quant Model Active:</strong>
                    <span class="text-muted small">Weights: Form (<?= $pq['weights']['form'] ?>%), Matchup (<?= $pq['weights']['matchup'] ?>%), Home/Away (<?= $pq['weights']['home_away'] ?>%), Venue (<?= $pq['weights']['venue'] ?>%).</span>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2 small">
                <span class="badge bg-white text-dark border font-monospace">Baseline: <?= $pq['baseline_projection'] ?></span>
                <i class="bi bi-arrow-right text-muted"></i>
                <span class="badge bg-success text-white font-monospace">Personalized: <?= $pq['personalized_projection'] ?> (<?= $pq['edge_shift_pct'] >= 0 ? '+' : '' ?><?= $pq['edge_shift_pct'] ?>%)</span>
                <span class="badge bg-secondary-subtle text-dark"><?= esc($pq['dominant_driver']) ?></span>
            </div>
        </div>
    <?php endif; ?>

    <!-- Matchup & Special Teams Summary -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card shadow-sm border-0 h-100 border-start border-4 border-primary">
                <div class="card-body">
                    <span class="text-uppercase text-muted small fw-bold">Opponent: <?= esc($selectedOpponent) ?> Shot Suppression</span>
                    <h3 class="h4 fw-bold mt-1 mb-2">
                        Rank #<?= (int) ($oppDef['sog_def_rank'] ?? 15) ?>
                        <span class="fs-6 text-muted fw-normal">(<?= number_format((float) ($oppDef['sog_allowed_pg'] ?? 30), 1) ?> SOG/G)</span>
                    </h3>
                    <p class="small text-muted mb-0">
                        Tier: <strong><?= esc(\App\Modules\Sports\Libraries\NhlSplitsCalculator::TIER_LABELS[\App\Modules\Sports\Libraries\NhlSplitsCalculator::tierForRank((int) ($oppDef['sog_def_rank'] ?? null))] ?? 'Neutral') ?></strong>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-4">
            <div class="card shadow-sm border-0 h-100 border-start border-4 border-<?= ((float) ($st['special_teams_edge'] ?? 0) >= 0) ? 'success' : 'danger' ?>">
                <div class="card-body">
                    <span class="text-uppercase text-muted small fw-bold">Special Teams PP vs PK Matchup</span>
                    <h3 class="h4 fw-bold mt-1 mb-2 <?= ((float) ($st['special_teams_edge'] ?? 0) >= 0) ? 'text-success' : 'text-danger' ?>">
                        <?= ((float) ($st['special_teams_edge'] ?? 0) >= 0 ? '+' : '') . number_format((float) ($st['special_teams_edge'] ?? 0), 1) ?>% Edge
                    </h3>
                    <p class="small text-muted mb-0"><?= esc($st['verdict'] ?? 'Neutral') ?></p>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-4">
            <div class="card shadow-sm border-0 h-100 border-start border-4 border-info">
                <div class="card-body">
                    <span class="text-uppercase text-muted small fw-bold">Sample Log Size</span>
                    <h3 class="h4 fw-bold mt-1 mb-2"><?= count($games) ?> Games Tracked</h3>
                    <p class="small text-muted mb-0">Per-game distribution across defensive shot tiers.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Splits Table (Skaters) -->
    <?php if (! $isGoalie && $splits !== []): ?>
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                <h2 class="h5 mb-0 fw-bold">Skater Splits by Opponent Shot Suppression Tier</h2>
                <span class="badge bg-light text-dark border">Quantitative Distributions</span>
            </div>
            <div class="table-responsive">
                <table class="table table-sm table-hover align-middle mb-0">
                    <thead class="table-light small text-uppercase text-muted">
                        <tr>
                            <th>Prop Market</th>
                            <th class="text-end">Overall Avg</th>
                            <th class="text-end">Top 10 Defense (Low SOG)</th>
                            <th class="text-end">Mid 10 Defense (Neutral)</th>
                            <th class="text-end">Bottom 10 Defense (High SOG)</th>
                            <th class="text-end">Std Dev (&sigma;)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($splits as $marketKey => $data): ?>
                            <tr>
                                <td class="fw-bold">
                                    <?= esc(\App\Modules\Sports\Libraries\NhlSplitsCalculator::SKATER_MARKETS[$marketKey] ?? $marketKey) ?>
                                </td>
                                <td class="text-end font-monospace fw-bold text-primary">
                                    <?= number_format((float) ($data['overall']['avg'] ?? 0), 2) ?>
                                </td>
                                <td class="text-end font-monospace">
                                    <?= number_format((float) ($data['top']['avg'] ?? 0), 2) ?>
                                </td>
                                <td class="text-end font-monospace">
                                    <?= number_format((float) ($data['mid']['avg'] ?? 0), 2) ?>
                                </td>
                                <td class="text-end font-monospace text-success fw-bold">
                                    <?= number_format((float) ($data['bottom']['avg'] ?? 0), 2) ?>
                                </td>
                                <td class="text-end font-monospace text-muted">
                                    &plusmn;<?= number_format((float) ($data['overall']['std'] ?? 0), 2) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>

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
                        <?php if ($isGoalie): ?>
                            <th class="text-end">Shots</th>
                            <th class="text-end">Saves</th>
                            <th class="text-end">GA</th>
                            <th class="text-end">SV%</th>
                            <th class="text-end">xGA</th>
                            <th class="text-center">Dec</th>
                        <?php else: ?>
                            <th class="text-end">TOI</th>
                            <th class="text-end">SOG</th>
                            <th class="text-end">Attempts</th>
                            <th class="text-end">Goals</th>
                            <th class="text-end">Assists</th>
                            <th class="text-end">Points</th>
                            <th class="text-end">PPP</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($games as $g): ?>
                        <tr>
                            <td class="font-monospace small"><?= esc($g['game_date']) ?></td>
                            <td><span class="badge bg-light text-dark border"><?= esc($g['opponent']) ?></span></td>
                            <td><?= esc($g['home_away']) ?></td>
                            <?php if ($isGoalie): ?>
                                <td class="text-end font-monospace"><?= (int) ($g['shots_faced'] ?? 0) ?></td>
                                <td class="text-end font-monospace fw-bold text-primary"><?= (int) ($g['saves'] ?? 0) ?></td>
                                <td class="text-end font-monospace"><?= (int) ($g['goals_against'] ?? 0) ?></td>
                                <td class="text-end font-monospace">.<?= str_pad((string) (int) round(((float) ($g['save_pct'] ?? 0)) * 1000), 3, '0', STR_PAD_LEFT) ?></td>
                                <td class="text-end font-monospace"><?= number_format((float) ($g['xga'] ?? 0), 2) ?></td>
                                <td class="text-center"><span class="badge bg-<?= ($g['decision'] ?? '') === 'W' ? 'success' : 'secondary' ?>"><?= esc($g['decision'] ?? '-') ?></span></td>
                            <?php else: ?>
                                <td class="text-end font-monospace"><?= number_format((float) ($g['toi_minutes'] ?? 0), 1) ?></td>
                                <td class="text-end font-monospace fw-bold text-primary"><?= (int) ($g['shots_on_goal'] ?? 0) ?></td>
                                <td class="text-end font-monospace"><?= (int) ($g['shot_attempts'] ?? 0) ?></td>
                                <td class="text-end font-monospace text-danger fw-bold"><?= (int) ($g['goals'] ?? 0) ?></td>
                                <td class="text-end font-monospace"><?= (int) ($g['assists'] ?? 0) ?></td>
                                <td class="text-end font-monospace text-success fw-bold"><?= (int) ($g['points'] ?? 0) ?></td>
                                <td class="text-end font-monospace"><?= (int) ($g['powerplay_points'] ?? 0) ?></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
