<?php
use App\Modules\Sports\Libraries\GoldilocksEngine;
use App\Modules\Sports\Libraries\RbSplitsCalculator;

/** @var array $report @var array $lines */
$p = $report['player'];
$gold = $report['goldilocks'];
$opp = $report['opponent'];
$fmt = static fn ($v) => $v === null ? '–' : number_format((float) $v, 1);
$pct = static fn ($v) => number_format((float) $v * 100, 1) . '%';
$rows = array_values($lines);
while (count($rows) < 3) {
    $rows[] = ['market' => RbSplitsCalculator::MARKETS[count($rows)], 'line' => '', 'over_odds' => '', 'under_odds' => ''];
}
?>
<section class="container-fluid py-4" id="sports-rb-player">
    <p class="mb-2"><a href="<?= site_url('MyMISports/NFL') ?>">&larr; All running backs</a></p>
    <h1 class="h3 mb-1"><?= esc((string) $p['full_name']) ?> <small class="text-muted"><?= esc((string) $p['team']) ?> · <?= esc((string) $p['position']) ?> · <?= (int) $report['season'] ?></small></h1>
    <?php if ($report['provenance']['is_sample']): ?><span class="badge bg-secondary mb-2">sample data, not real stats</span><?php endif; ?>
    <div class="alert alert-warning small" role="note"><?= esc($report['disclaimer']) ?></div>

    <div class="card mb-3">
        <div class="card-header"><strong>Matchup and prop lines</strong></div>
        <div class="card-body">
            <form method="get" action="<?= site_url('MyMISports/NFL/Player/' . (int) $p['id']) ?>" class="row g-2" id="sports-goldilocks-form">
                <div class="col-md-3">
                    <label class="form-label" for="sports-opponent">Upcoming opponent</label>
                    <select class="form-select" id="sports-opponent" name="opponent" required>
                        <option value="">Choose a defense</option>
                        <?php foreach ($report['teams'] as $t): ?>
                            <option value="<?= esc($t) ?>" <?= ($opp['team'] ?? '') === $t ? 'selected' : '' ?>><?= esc($t) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-9">
                    <label class="form-label">Sportsbook lines (optional; American odds, e.g. -115)</label>
                    <?php foreach ($rows as $i => $r): ?>
                        <div class="row g-1 mb-1">
                            <div class="col-4">
                                <select class="form-select form-select-sm" name="market[]" aria-label="Market <?= $i + 1 ?>">
                                    <?php foreach (RbSplitsCalculator::MARKETS as $m): ?>
                                        <option value="<?= esc($m) ?>" <?= $r['market'] === $m ? 'selected' : '' ?>><?= esc(GoldilocksEngine::marketLabel($m)) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-3"><input class="form-control form-control-sm" name="line[]" inputmode="decimal" placeholder="Line, e.g. 65.5" value="<?= esc((string) $r['line']) ?>" aria-label="Line <?= $i + 1 ?>"></div>
                            <div class="col-2"><input class="form-control form-control-sm" name="over[]" placeholder="Over odds" value="<?= esc((string) ($r['over_odds'] ?? '')) ?>" aria-label="Over odds <?= $i + 1 ?>"></div>
                            <div class="col-2"><input class="form-control form-control-sm" name="under[]" placeholder="Under odds" value="<?= esc((string) ($r['under_odds'] ?? '')) ?>" aria-label="Under odds <?= $i + 1 ?>"></div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <input type="hidden" name="season" value="<?= (int) $report['season'] ?>">
                <div class="col-12"><button type="submit" class="btn btn-primary">Find the Goldilocks bet</button></div>
            </form>
        </div>
    </div>

    <?php if ($gold !== null): ?>
        <div class="card mb-3 border-<?= $gold['best'] ? 'success' : 'secondary' ?>" id="sports-goldilocks-result">
            <div class="card-header"><strong>Goldilocks vs <?= esc((string) $opp['team']) ?></strong>
                <span class="text-muted small">rush defense rank <?= esc((string) ($opp['rush_def_rank'] ?? '?')) ?>, RB receiving defense rank <?= esc((string) ($opp['rb_rec_def_rank'] ?? '?')) ?></span>
            </div>
            <div class="card-body">
                <p class="fs-5 mb-3"><?= esc($gold['verdict']) ?></p>
                <div class="table-responsive mb-3">
                    <table class="table table-sm mb-0">
                        <thead><tr><th>Market</th><th>Matchup tier</th><th class="text-end">Projection</th><th class="text-end">Season avg</th><th class="text-end">Avg vs tier (games)</th><th class="text-end">Last 5 avg</th><th>Confidence</th><th>Suggested lines (≈65% hit)</th></tr></thead>
                        <tbody>
                        <?php foreach ($gold['projections'] as $m => $pr): $sg = $gold['suggested_lines'][$m]; ?>
                            <tr>
                                <td><?= esc(GoldilocksEngine::marketLabel($m)) ?></td>
                                <td><?= esc(RbSplitsCalculator::TIER_LABELS[$pr['opponent_tier']] ?? $pr['opponent_tier']) ?></td>
                                <td class="text-end"><strong><?= $fmt($pr['projection']) ?></strong></td>
                                <td class="text-end"><?= $fmt($pr['season_avg']) ?></td>
                                <td class="text-end"><?= $fmt($pr['tier_avg']) ?> (<?= (int) $pr['tier_games'] ?>)</td>
                                <td class="text-end"><?= $fmt($pr['last5_avg']) ?></td>
                                <td><?= esc($pr['confidence']) ?></td>
                                <td>Over <?= $fmt($sg['over_at_or_below']) ?> or lower · Under <?= $fmt($sg['under_at_or_above']) ?> or higher</td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php if ($gold['candidates'] !== []): ?>
                    <div class="table-responsive">
                        <table class="table table-sm table-striped mb-0" id="sports-candidates">
                            <thead><tr><th>Bet</th><th class="text-end">Odds</th><th class="text-end">Model chance</th><th class="text-end">Priced chance (no vig)</th><th class="text-end">Edge</th><th class="text-end">EV per $1</th><th>Goldilocks?</th></tr></thead>
                            <tbody>
                            <?php foreach ($gold['candidates'] as $c): ?>
                                <tr class="<?= $c['goldilocks'] ? 'table-success' : '' ?>">
                                    <td><?= esc(ucfirst($c['side']) . ' ' . number_format($c['line'], 1) . ' ' . GoldilocksEngine::marketLabel($c['market'])) ?></td>
                                    <td class="text-end"><?= esc(GoldilocksEngine::formatOdds((int) $c['odds'])) ?></td>
                                    <td class="text-end"><?= $pct($c['model_prob']) ?></td>
                                    <td class="text-end"><?= $pct($c['market_prob']) ?></td>
                                    <td class="text-end"><?= esc(number_format($c['edge'] * 100, 1)) ?> pts</td>
                                    <td class="text-end"><?= esc(number_format($c['ev_per_dollar'], 3)) ?></td>
                                    <td><?= $c['goldilocks'] ? 'Yes' : esc(implode('; ', $c['why_not'])) ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
                <p class="small text-muted mt-2 mb-0">Goldilocks = model hit chance between <?= (int) ($gold['rules']['min_prob'] * 100) ?>% and <?= (int) ($gold['rules']['max_prob'] * 100) ?>%, at least <?= (int) ($gold['rules']['min_edge'] * 100) ?> points of edge over the no-vig price, and positive expected value. Best pick = highest expected value.</p>
            </div>
        </div>
    <?php endif; ?>

    <div class="card mb-3">
        <div class="card-header"><strong>Averages by opponent defense rank</strong></div>
        <div class="table-responsive">
            <table class="table table-sm mb-0" id="sports-splits">
                <thead><tr><th>Split</th><?php foreach (RbSplitsCalculator::MARKETS as $m): ?><th class="text-end"><?= esc(GoldilocksEngine::marketLabel($m)) ?> avg / median (games)</th><?php endforeach; ?></tr></thead>
                <tbody>
                <?php foreach (['overall' => 'Season', 'last5' => 'Last 5 games', 'top' => RbSplitsCalculator::TIER_LABELS['top'], 'mid' => RbSplitsCalculator::TIER_LABELS['mid'], 'bottom' => RbSplitsCalculator::TIER_LABELS['bottom']] as $k => $label): ?>
                    <tr><td><?= esc($label) ?></td>
                    <?php foreach (RbSplitsCalculator::MARKETS as $m): $s = $report['splits'][$m][$k]; ?>
                        <td class="text-end"><?= $fmt($s['avg']) ?> / <?= $fmt($s['median']) ?> (<?= (int) $s['games'] ?>)</td>
                    <?php endforeach; ?></tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer small text-muted">Rushing uses the opponent's rush defense rank; receiving uses its rank against running-back receiving.</div>
    </div>

    <div class="card">
        <div class="card-header"><strong>Game log</strong></div>
        <div class="table-responsive">
            <table class="table table-sm table-striped mb-0" id="sports-gamelog">
                <thead><tr><th>Wk</th><th>Opp</th><th>Rush D rank</th><th class="text-end">Att</th><th class="text-end">Rush yds</th><th class="text-end">Tgt</th><th class="text-end">Rec</th><th class="text-end">Rec yds</th><th class="text-end">Total</th><th class="text-end">TD</th></tr></thead>
                <tbody>
                <?php foreach ($report['games'] as $g): ?>
                    <tr>
                        <td><?= (int) $g['week'] ?></td>
                        <td><?= $g['home_away'] === 'A' ? '@' : 'vs' ?> <?= esc((string) $g['opponent']) ?></td>
                        <td><?= esc((string) ($g['rush_def_rank'] ?? '?')) ?> <span class="text-muted small">(<?= esc($g['tiers']['rush_yds']) ?>)</span></td>
                        <td class="text-end"><?= (int) $g['rush_att'] ?></td>
                        <td class="text-end"><?= (int) $g['rush_yds'] ?></td>
                        <td class="text-end"><?= (int) $g['targets'] ?></td>
                        <td class="text-end"><?= (int) $g['receptions'] ?></td>
                        <td class="text-end"><?= (int) $g['rec_yds'] ?></td>
                        <td class="text-end"><?= (int) $g['rush_rec_yds'] ?></td>
                        <td class="text-end"><?= (int) $g['rush_td'] + (int) $g['rec_td'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
