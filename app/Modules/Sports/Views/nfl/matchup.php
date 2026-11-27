<?php
use App\Modules\Sports\Libraries\GoldilocksEngine;

/** @var array $report @var array $lines */
$report ??= [];
$lines ??= [];
$proj = $report['projection'] ?? [];
$best = $report['best'] ?? null;
$candidates = $report['candidates'] ?? [];
$home = $report['home_team'] ?? 'HOME';
$away = $report['away_team'] ?? 'AWAY';
$fmt = static fn ($v) => $v === null ? '–' : number_format((float) $v, 1);
$pct = static fn ($v) => number_format((float) $v * 100, 1) . '%';
?>
<?= view('App\\Modules\\Sports\\Views\\nfl\\_responsive') ?>
<section class="container-fluid py-4" id="sports-matchup">
    <p class="mb-2"><a href="<?= site_url('MyMISports/NFL?pos=MATCHUPS') ?>">&larr; Back to NFL matchups &amp; props</a></p>
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
        <div>
            <h1 class="h3 mb-1"><?= esc($away) ?> @ <?= esc($home) ?> <small class="text-muted">· Game Matchup &amp; Goldilocks Model</small></h1>
            <p class="text-muted mb-0">Projected final scores, point spread, game total, and edge against market odds.</p>
        </div>
    </div>

    <div class="alert alert-warning small" role="note"><?= esc($report['disclaimer']) ?></div>

    <!-- Projected Scoreboard Banner -->
    <div class="card mb-4 border-primary">
        <div class="card-header bg-primary text-white">
            <h2 class="h5 mb-0">Projected Scoreboard (Model Simulation)</h2>
        </div>
        <div class="card-body">
            <div class="row text-center align-items-center g-3">
                <div class="col-5">
                    <div class="display-6 fw-bold"><?= esc($away) ?></div>
                    <div class="display-4 text-primary fw-bold"><?= $fmt($proj['away_score'] ?? null) ?></div>
                    <div class="text-muted small">Win prob: <?= $pct($proj['away_win_prob'] ?? 0.5) ?></div>
                </div>
                <div class="col-2">
                    <span class="badge bg-secondary fs-6">AT</span>
                    <div class="text-muted small mt-2">Proj Total: <?= $fmt($proj['projected_total'] ?? null) ?></div>
                    <div class="text-muted small">Proj Spread: <?= ($proj['projected_spread'] ?? 0) <= 0 ? esc($home) . ' ' . $fmt($proj['projected_spread'] ?? null) : esc($away) . ' -' . $fmt($proj['projected_spread'] ?? null) ?></div>
                </div>
                <div class="col-5">
                    <div class="display-6 fw-bold"><?= esc($home) ?> <span class="badge bg-info text-dark fs-6">HOME</span></div>
                    <div class="display-4 text-primary fw-bold"><?= $fmt($proj['home_score'] ?? null) ?></div>
                    <div class="text-muted small">Win prob: <?= $pct($proj['home_win_prob'] ?? 0.5) ?></div>
                </div>
            </div>
            <hr>
            <p class="fs-6 mb-0 text-center fw-semibold text-success"><?= esc($report['verdict']) ?></p>
        </div>
    </div>

    <!-- Interactive Line Evaluator -->
    <div class="card mb-4">
        <div class="card-header">
            <strong>Evaluate Sportsbook Lines &amp; Find Goldilocks Edge</strong>
        </div>
        <div class="card-body">
            <form method="get" action="<?= site_url('MyMISports/NFL/Matchup/' . esc($home) . '/' . esc($away)) ?>" class="row g-3" id="sports-matchup-form">
                <div class="col-12 col-md-4">
                    <label class="form-label fw-bold">Point Spread (from Home perspective)</label>
                    <input type="hidden" name="market[]" value="spread">
                    <div class="input-group input-group-sm mb-1">
                        <span class="input-group-text"><?= esc($home) ?> Line</span>
                        <input type="text" class="form-control" name="line[]" inputmode="decimal" placeholder="-3.5" value="<?= esc((string) ($lines[0]['line'] ?? ($proj['projected_spread'] ?? -3.5))) ?>">
                    </div>
                    <div class="row g-1">
                        <div class="col-6"><input class="form-control form-control-sm" name="over[]" placeholder="Home Odds (-110)" value="<?= esc((string) ($lines[0]['over_odds'] ?? -110)) ?>"></div>
                        <div class="col-6"><input class="form-control form-control-sm" name="under[]" placeholder="Away Odds (-110)" value="<?= esc((string) ($lines[0]['under_odds'] ?? -110)) ?>"></div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <label class="form-label fw-bold">Game Total (Over / Under)</label>
                    <input type="hidden" name="market[]" value="total">
                    <div class="input-group input-group-sm mb-1">
                        <span class="input-group-text">O/U Line</span>
                        <input type="text" class="form-control" name="line[]" inputmode="decimal" placeholder="45.5" value="<?= esc((string) ($lines[1]['line'] ?? ($proj['projected_total'] ?? 45.5))) ?>">
                    </div>
                    <div class="row g-1">
                        <div class="col-6"><input class="form-control form-control-sm" name="over[]" placeholder="Over Odds (-110)" value="<?= esc((string) ($lines[1]['over_odds'] ?? -110)) ?>"></div>
                        <div class="col-6"><input class="form-control form-control-sm" name="under[]" placeholder="Under Odds (-110)" value="<?= esc((string) ($lines[1]['under_odds'] ?? -110)) ?>"></div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <label class="form-label fw-bold">Moneyline</label>
                    <input type="hidden" name="market[]" value="moneyline">
                    <input type="hidden" name="line[]" value="0">
                    <div class="input-group input-group-sm mb-1">
                        <span class="input-group-text">Home ML</span>
                        <input type="text" class="form-control" name="over[]" placeholder="-140" value="<?= esc((string) ($lines[2]['over_odds'] ?? -140)) ?>">
                    </div>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Away ML</span>
                        <input type="text" class="form-control" name="under[]" placeholder="+120" value="<?= esc((string) ($lines[2]['under_odds'] ?? 120)) ?>">
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Recalculate Edge &amp; Goldilocks Picks</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Candidate Lines & Edges -->
    <?php if ($candidates !== []): ?>
        <div class="card mb-4">
            <div class="card-header">
                <strong>Model vs Market Odds Evaluation</strong>
            </div>
            <div class="table-responsive">
                <table class="table table-sm table-striped mb-0 sports-stack-lg" id="sports-matchup-candidates">
                    <thead>
                        <tr>
                            <th>Wager Opportunity</th>
                            <th>Market Line</th>
                            <th class="text-end">Odds</th>
                            <th class="text-end">Model Chance</th>
                            <th class="text-end">No-Vig Market</th>
                            <th class="text-end">Edge</th>
                            <th class="text-end">EV per $1</th>
                            <th>Goldilocks Verdict</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($candidates as $c): ?>
                            <tr class="<?= ($c['goldilocks'] ?? false) ? 'table-success fw-bold' : '' ?>">
                                <td class="sports-stack-title"><?= esc((string) ($c['pick'] ?? $c['market'])) ?></td>
                                <td data-label="Market Line"><?= esc(number_format((float) ($c['line'] ?? 0), 1)) ?></td>
                                <td class="text-end" data-label="Odds"><?= esc(GoldilocksEngine::formatOdds((int) ($c['odds'] ?? -110))) ?></td>
                                <td class="text-end" data-label="Model Chance"><?= $pct($c['model_prob'] ?? 0) ?></td>
                                <td class="text-end" data-label="No-Vig Market"><?= $pct($c['market_prob'] ?? 0) ?></td>
                                <td class="text-end" data-label="Edge"><?= esc(number_format(($c['edge'] ?? 0) * 100, 1)) ?> pts</td>
                                <td class="text-end" data-label="EV per $1"><?= esc(number_format($c['ev_per_dollar'] ?? 0, 3)) ?></td>
                                <td data-label="Goldilocks Verdict">
                                    <?php if ($c['goldilocks'] ?? false): ?>
                                        <span class="badge bg-success">GOLDILOCKS PICK</span>
                                    <?php else: ?>
                                        <span class="text-muted small"><?= esc(implode('; ', (array) ($c['why_not'] ?? ['No edge']))) ?></span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer small text-muted">
                Goldilocks Criteria: Model probability between 55% and 75%, &ge; 3.0 points edge over no-vig odds, and positive expected value (+EV).
            </div>
        </div>
    <?php endif; ?>

    <!-- Team Defense & Power Ranking Comparison -->
    <div class="card">
        <div class="card-header">
            <strong>Defensive Profile &amp; Matchup Rankings</strong>
        </div>
        <div class="table-responsive">
            <table class="table table-sm mb-0">
                <thead>
                    <tr>
                        <th>Metric</th>
                        <th class="text-center"><?= esc($away) ?></th>
                        <th class="text-center"><?= esc($home) ?> (HOME)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Points Allowed per Game</td>
                        <td class="text-center"><?= $fmt($report['away_stats']['points_allowed_pg'] ?? null) ?></td>
                        <td class="text-center"><?= $fmt($report['home_stats']['points_allowed_pg'] ?? null) ?></td>
                    </tr>
                    <tr>
                        <td>Scoring Defense Rank (1-32)</td>
                        <td class="text-center"><?= esc((string) ($report['away_def']['scoring_def_rank'] ?? '16')) ?></td>
                        <td class="text-center"><?= esc((string) ($report['home_def']['scoring_def_rank'] ?? '16')) ?></td>
                    </tr>
                    <tr>
                        <td>Rush Defense Rank (1-32)</td>
                        <td class="text-center"><?= esc((string) ($report['away_def']['rush_def_rank'] ?? '–')) ?></td>
                        <td class="text-center"><?= esc((string) ($report['home_def']['rush_def_rank'] ?? '–')) ?></td>
                    </tr>
                    <tr>
                        <td>Pass Defense Rank (1-32)</td>
                        <td class="text-center"><?= esc((string) ($report['away_def']['pass_def_rank'] ?? '–')) ?></td>
                        <td class="text-center"><?= esc((string) ($report['home_def']['pass_def_rank'] ?? '–')) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
