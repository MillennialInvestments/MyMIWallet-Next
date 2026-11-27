<?php
/**
 * NBA Player Detail & Opponent Splits View.
 *
 * @var array $player
 * @var array $report
 * @var list<string> $teams
 * @var string|null $selectedOpponent
 * @var string $disclaimer
 */
$player ??= [];
$report ??= [];
$teams ??= [];
$selectedOpponent ??= null;
$splits = $report['splits'] ?? [];
$taggedGames = $report['tagged_games'] ?? [];
$evaluation = $report['evaluation'] ?? [];
$goldilocks = $evaluation['goldilocks'] ?? [];
$candidates = $evaluation['candidates'] ?? [];
?>
<?= view('App\\Modules\\Sports\\Views\\nfl\\_responsive') ?>
<section class="container-fluid py-4" id="sports-nba-player">
    <div class="mb-3">
        <a href="<?= site_url('MyMISports/NBA') ?>" class="text-decoration-none small text-muted">
            <i class="bi bi-arrow-left me-1"></i> Back to NBA Intelligence
        </a>
    </div>

    <!-- Player Banner -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <div>
                    <h1 class="h3 mb-1 fw-bold"><?= esc($player['full_name'] ?? 'NBA Player') ?></h1>
                    <div class="d-flex gap-2 align-items-center">
                        <span class="badge bg-primary"><?= esc($player['team'] ?? 'NBA') ?></span>
                        <span class="badge bg-secondary"><?= esc($player['position'] ?? 'G/F') ?></span>
                        <span class="text-muted small"><?= count($taggedGames) ?> games tracked this season</span>
                    </div>
                </div>

                <!-- Opponent Simulator Launcher -->
                <form method="get" class="d-flex align-items-center gap-2 mt-3 mt-md-0">
                    <label for="opponent" class="form-label mb-0 small fw-semibold">Simulate vs Opponent:</label>
                    <select name="opponent" id="opponent" class="form-select form-select-sm" onchange="this.form.submit()">
                        <option value="">Select Opponent</option>
                        <?php foreach ($teams as $t): ?>
                            <option value="<?= esc($t) ?>" <?= $selectedOpponent === $t ? 'selected' : '' ?>><?= esc($t) ?></option>
                        <?php endforeach; ?>
                    </select>
                </form>
            </div>
        </div>
    </div>

    <!-- Goldilocks Pick Evaluation (if opponent selected) -->
    <?php if ($selectedOpponent && $goldilocks !== []): ?>
        <div class="card mb-4 border-success shadow-sm">
            <div class="card-header bg-success text-white py-2 d-flex justify-content-between align-items-center">
                <h2 class="h6 mb-0 fw-bold"><i class="bi bi-stars me-1"></i> Goldilocks +EV Recommendation vs <?= esc($selectedOpponent) ?></h2>
                <span class="badge bg-white text-success fw-bold">Mathematical Edge</span>
            </div>
            <div class="card-body">
                <div class="row g-3 align-items-center">
                    <?php foreach (array_slice($goldilocks, 0, 2) as $pick): ?>
                        <div class="col-12 col-md-6">
                            <div class="p-3 bg-light rounded border">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="fw-bold fs-5"><?= esc(strtoupper((string) $pick['side'])) ?> <?= esc((string) $pick['line']) ?> <?= esc($pick['market_label'] ?? $pick['market']) ?></span>
                                    <span class="badge bg-success">+<?= number_format((float) $pick['ev_per_dollar'] * 100, 1) ?>% EV</span>
                                </div>
                                <div class="small text-muted mb-2">
                                    Model Hit Probability: <strong><?= number_format((float) $pick['model_prob'] * 100, 1) ?>%</strong> | Edge vs Market: <strong>+<?= number_format((float) $pick['edge'] * 100, 1) ?>%</strong>
                                </div>
                                <form method="post" action="<?= site_url('MyMISports/Tracker/Create') ?>" class="d-inline">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="sport" value="NBA">
                                    <input type="hidden" name="sportsbook" value="DraftKings">
                                    <input type="hidden" name="event_description" value="vs <?= esc($selectedOpponent) ?>">
                                    <input type="hidden" name="selection" value="<?= esc($player['full_name'] . ' ' . strtoupper((string) $pick['side']) . ' ' . $pick['line'] . ' ' . ($pick['market_label'] ?? $pick['market'])) ?>">
                                    <input type="hidden" name="line" value="<?= esc((string) $pick['line']) ?>">
                                    <input type="hidden" name="odds" value="-110">
                                    <input type="hidden" name="stake_amount" value="50.00">
                                    <button type="submit" class="btn btn-sm btn-outline-success">
                                        <i class="bi bi-journal-plus me-1"></i> Log Pick to Bet Tracker
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Splits by Defensive Tier -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3 border-0">
            <h2 class="h5 mb-0 fw-bold">Prop Splits by Opponent Defensive Tier</h2>
            <span class="small text-muted">Comparison of production against Top-10 (Tough), Mid-10 (Neutral), and Bottom-10 (Favorable) defenses.</span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="nba-splits-table">
                <thead class="table-light small text-uppercase text-muted">
                    <tr>
                        <th>Market</th>
                        <th class="text-center">Overall Avg</th>
                        <th class="text-center">Last 5 Games</th>
                        <th class="text-center text-danger">vs Top-10 (Tough)</th>
                        <th class="text-center text-warning">vs Mid-10 (Neutral)</th>
                        <th class="text-center text-success">vs Bottom-10 (Favorable)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $marketLabels = [
                        'pts'    => 'Points (PTS)',
                        'reb'    => 'Rebounds (REB)',
                        'ast'    => 'Assists (AST)',
                        'threes' => '3-Pointers Made (3PM)',
                        'stocks' => 'Steals + Blocks (Stocks)',
                        'pra'    => 'Pts + Reb + Ast (PRA)',
                    ];
                    foreach ($marketLabels as $mKey => $mLabel):
                        $mSplit = $splits[$mKey] ?? [];
                        $overall = $mSplit['overall'] ?? [];
                        $last5 = $mSplit['last5'] ?? [];
                        $top = $mSplit['top'] ?? [];
                        $mid = $mSplit['mid'] ?? [];
                        $bot = $mSplit['bottom'] ?? [];
                    ?>
                        <tr>
                            <td class="fw-bold"><?= esc($mLabel) ?></td>
                            <td class="text-center font-monospace fw-bold"><?= $overall['avg'] !== null ? number_format((float) $overall['avg'], 1) : '-' ?></td>
                            <td class="text-center font-monospace"><?= $last5['avg'] !== null ? number_format((float) $last5['avg'], 1) : '-' ?></td>
                            <td class="text-center font-monospace <?= ($top['avg'] ?? 0) < ($overall['avg'] ?? 0) ? 'text-danger' : '' ?>">
                                <?= $top['avg'] !== null ? number_format((float) $top['avg'], 1) . ' (' . (int) $top['games'] . 'g)' : '-' ?>
                            </td>
                            <td class="text-center font-monospace">
                                <?= $mid['avg'] !== null ? number_format((float) $mid['avg'], 1) . ' (' . (int) $mid['games'] . 'g)' : '-' ?>
                            </td>
                            <td class="text-center font-monospace <?= ($bot['avg'] ?? 0) > ($overall['avg'] ?? 0) ? 'text-success fw-bold' : '' ?>">
                                <?= $bot['avg'] !== null ? number_format((float) $bot['avg'], 1) . ' (' . (int) $bot['games'] . 'g)' : '-' ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Game Logs -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-0">
            <h2 class="h5 mb-0 fw-bold">Season Game Logs</h2>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="nba-logs-table">
                <thead class="table-light small text-uppercase text-muted">
                    <tr>
                        <th>Date</th>
                        <th>Opp</th>
                        <th>H/A</th>
                        <th class="text-center">MIN</th>
                        <th class="text-end">PTS</th>
                        <th class="text-end">REB</th>
                        <th class="text-end">AST</th>
                        <th class="text-end">3PM</th>
                        <th class="text-end">STL</th>
                        <th class="text-end">BLK</th>
                        <th class="text-end">PRA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($taggedGames === []): ?>
                        <tr><td colspan="11" class="text-center text-muted py-4">No game logs recorded for this player.</td></tr>
                    <?php else: ?>
                        <?php foreach (array_reverse($taggedGames) as $g): ?>
                            <?php
                            $ptsTier = $g['tiers']['pts'] ?? 'mid';
                            $tierBadgeClass = match ($ptsTier) {
                                'top'    => 'bg-danger-subtle text-danger border border-danger-subtle',
                                'bottom' => 'bg-success-subtle text-success border border-success-subtle',
                                default  => 'bg-warning-subtle text-warning border border-warning-subtle',
                            };
                            $pra = (float) ($g['pts'] ?? 0) + (float) ($g['reb'] ?? 0) + (float) ($g['ast'] ?? 0);
                            ?>
                            <tr>
                                <td class="small text-nowrap"><?= esc((string) ($g['game_date'] ?? '')) ?></td>
                                <td>
                                    <span class="badge <?= $tierBadgeClass ?>"><?= esc((string) $g['opponent']) ?></span>
                                </td>
                                <td><span class="badge bg-light text-muted border"><?= esc((string) ($g['home_away'] ?? 'H')) ?></span></td>
                                <td class="text-center font-monospace"><?= number_format((float) ($g['minutes'] ?? 0), 1) ?></td>
                                <td class="text-end font-monospace fw-bold"><?= (int) ($g['pts'] ?? 0) ?></td>
                                <td class="text-end font-monospace"><?= (int) ($g['reb'] ?? 0) ?></td>
                                <td class="text-end font-monospace"><?= (int) ($g['ast'] ?? 0) ?></td>
                                <td class="text-end font-monospace"><?= (int) ($g['threes'] ?? 0) ?></td>
                                <td class="text-end font-monospace"><?= (int) ($g['steals'] ?? 0) ?></td>
                                <td class="text-end font-monospace"><?= (int) ($g['blocks'] ?? 0) ?></td>
                                <td class="text-end font-monospace fw-bold text-primary"><?= (int) $pra ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
