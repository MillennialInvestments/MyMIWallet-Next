<?php
use App\Modules\Sports\Libraries\GoldilocksEngine;
use App\Modules\Sports\Libraries\QbSplitsCalculator;
use App\Modules\Sports\Libraries\RbSplitsCalculator;
use App\Modules\Sports\Libraries\ReceiverSplitsCalculator;

/** @var array $report @var array $lines @var ?array $bookLines */
$bookLines ??= null;
$notice ??= null;
$p = $report['player'];
$pos = strtoupper(trim((string) ($report['position'] ?? $p['position'] ?? 'RB')));
$gold = $report['goldilocks'];
$opp = $report['opponent'];
$fmt = static fn ($v) => $v === null ? '–' : number_format((float) $v, 1);
$pct = static fn ($v) => number_format((float) $v * 100, 1) . '%';

$markets = match ($pos) {
    'QB'       => QbSplitsCalculator::MARKETS,
    'WR', 'TE' => ReceiverSplitsCalculator::MARKETS,
    default    => RbSplitsCalculator::MARKETS,
};
$tierLabels = match ($pos) {
    'QB'       => QbSplitsCalculator::TIER_LABELS,
    'WR', 'TE' => ReceiverSplitsCalculator::TIER_LABELS,
    default    => RbSplitsCalculator::TIER_LABELS,
};

$rows = array_values($lines);
while (count($rows) < min(3, count($markets))) {
    $rows[] = ['market' => $markets[count($rows)], 'line' => '', 'over_odds' => '', 'under_odds' => ''];
}
?>
<?= view('App\\Modules\\Sports\\Views\\nfl\\_responsive') ?>
<section class="container-fluid py-4" id="sports-player-detail">
    <p class="mb-2"><a href="<?= site_url('MyMISports/NFL?pos=' . esc($pos)) ?>">&larr; Back to <?= esc(match ($pos) { 'QB' => 'Quarterbacks', 'WR', 'TE' => 'Receivers', default => 'Running backs' }) ?></a></p>
    <h1 class="h3 mb-1"><?= esc((string) $p['full_name']) ?> <small class="text-muted"><?= esc((string) $p['team']) ?> · <?= esc((string) $pos) ?> · <?= (int) $report['season'] ?></small></h1>
    <?php if ($report['provenance']['is_sample']): ?><span class="badge bg-secondary mb-2">sample data, not real stats</span><?php endif; ?>
    <div class="alert alert-warning small" role="note"><?= esc($report['disclaimer']) ?></div>
    <?php if (is_string($notice) && $notice !== ''): ?><div class="alert alert-info" role="status" id="sports-notice"><?= esc($notice) ?></div><?php endif; ?>
    <form method="post" action="<?= site_url('MyMISports/NFL/RefreshLines/' . (int) $p['id']) ?>" class="mb-3" id="sports-refresh-lines-form">
        <?= csrf_field() ?>
        <button type="submit" class="btn btn-outline-primary btn-sm">Refresh live lines for <?= esc((string) $p['team']) ?>'s next game</button>
    </form>
    <?php if ($bookLines !== null): ?>
        <div class="alert alert-info small" id="sports-book-lines-note">Next game vs <?= esc((string) $bookLines['opponent']) ?><?php if ($bookLines['commence_time']): ?> on <?= esc(date('D M j', strtotime($bookLines['commence_time'] . ' UTC'))) ?><?php endif; ?>. Lines below are from <?= esc(ucfirst((string) $bookLines['bookmaker'])) ?>, fetched <?= esc((string) $bookLines['fetched_at']) ?> UTC. Change them and press the button to test other numbers.</div>
    <?php endif; ?>

    <div class="card mb-3">
        <div class="card-header"><strong>Matchup and prop lines</strong></div>
        <div class="card-body">
            <form method="get" action="<?= site_url('MyMISports/NFL/Player/' . (int) $p['id']) ?>" class="row g-2" id="sports-goldilocks-form">
                <div class="col-12 col-lg-3">
                    <label class="form-label" for="sports-opponent">Upcoming opponent</label>
                    <select class="form-select" id="sports-opponent" name="opponent" required>
                        <option value="">Choose a defense</option>
                        <?php foreach ($report['teams'] as $t): ?>
                            <option value="<?= esc($t) ?>" <?= ($opp['team'] ?? '') === $t ? 'selected' : '' ?>><?= esc($t) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-12 col-lg-9">
                    <label class="form-label">Sportsbook lines (optional; American odds, e.g. -115)</label>
                    <?php foreach ($rows as $i => $r): ?>
                        <div class="row g-1 mb-2 mb-lg-1 sports-line-row">
                            <div class="col-12 col-sm-6 col-lg-4">
                                <select class="form-select form-select-sm" name="market[]" aria-label="Market <?= $i + 1 ?>">
                                    <?php foreach ($markets as $m): ?>
                                        <option value="<?= esc($m) ?>" <?= $r['market'] === $m ? 'selected' : '' ?>><?= esc(GoldilocksEngine::marketLabel($m)) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3"><input class="form-control form-control-sm" name="line[]" inputmode="decimal" placeholder="Line, e.g. 65.5" value="<?= esc((string) $r['line']) ?>" aria-label="Line <?= $i + 1 ?>"></div>
                            <div class="col-6 col-lg-2"><input class="form-control form-control-sm" name="over[]" placeholder="Over odds" value="<?= esc((string) ($r['over_odds'] ?? '')) ?>" aria-label="Over odds <?= $i + 1 ?>"></div>
                            <div class="col-6 col-lg-2"><input class="form-control form-control-sm" name="under[]" placeholder="Under odds" value="<?= esc((string) ($r['under_odds'] ?? '')) ?>" aria-label="Under odds <?= $i + 1 ?>"></div>
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
                <span class="text-muted small">
                    <?php if ($pos === 'QB'): ?>
                        pass def rank <?= esc((string) ($opp['pass_def_rank'] ?? $opp['rush_def_rank'] ?? '?')) ?>, rush def rank <?= esc((string) ($opp['rush_def_rank'] ?? '?')) ?>
                    <?php elseif ($pos === 'WR' || $pos === 'TE'): ?>
                        pass def rank <?= esc((string) ($opp['pass_def_rank'] ?? '?')) ?>
                    <?php else: ?>
                        rush defense rank <?= esc((string) ($opp['rush_def_rank'] ?? '?')) ?>, RB receiving defense rank <?= esc((string) ($opp['rb_rec_def_rank'] ?? '?')) ?>
                    <?php endif; ?>
                </span>
            </div>
            <div class="card-body">
                <p class="fs-5 mb-3"><?= esc($gold['verdict']) ?></p>
                <div class="table-responsive mb-3">
                    <table class="table table-sm mb-0 sports-stack-lg" id="sports-projections">
                        <thead><tr><th>Market</th><th>Matchup tier</th><th class="text-end">Projection</th><th class="text-end">Season avg</th><th class="text-end">Avg vs tier (games)</th><th class="text-end">Last 5 avg</th><th>Confidence</th><th>Suggested lines (≈65% hit)</th></tr></thead>
                        <tbody>
                        <?php foreach ($gold['projections'] as $m => $pr): $sg = $gold['suggested_lines'][$m]; ?>
                            <tr>
                                <td class="sports-stack-title"><?= esc(GoldilocksEngine::marketLabel($m)) ?></td>
                                <td data-label="Matchup tier"><?= esc($tierLabels[$pr['opponent_tier']] ?? $pr['opponent_tier']) ?></td>
                                <td class="text-end" data-label="Projection"><strong><?= $fmt($pr['projection']) ?></strong></td>
                                <td class="text-end" data-label="Season avg"><?= $fmt($pr['season_avg']) ?></td>
                                <td class="text-end" data-label="Avg vs tier (games)"><?= $fmt($pr['tier_avg']) ?> (<?= (int) $pr['tier_games'] ?>)</td>
                                <td class="text-end" data-label="Last 5 avg"><?= $fmt($pr['last5_avg']) ?></td>
                                <td data-label="Confidence"><?= esc($pr['confidence']) ?></td>
                                <td data-label="Suggested lines">Over <?= $fmt($sg['over_at_or_below']) ?> or lower · Under <?= $fmt($sg['under_at_or_above']) ?> or higher</td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php if ($gold['candidates'] !== []): ?>
                    <div class="table-responsive">
                        <table class="table table-sm table-striped mb-0 sports-stack-lg" id="sports-candidates">
                            <thead><tr><th>Bet</th><th class="text-end">Odds</th><th class="text-end">Model chance</th><th class="text-end">Priced chance (no vig)</th><th class="text-end">Edge</th><th class="text-end">EV per $1</th><th>Goldilocks?</th></tr></thead>
                            <tbody>
                            <?php foreach ($gold['candidates'] as $c): ?>
                                <tr class="<?= $c['goldilocks'] ? 'table-success' : '' ?>">
                                    <td class="sports-stack-title"><?= esc(ucfirst($c['side']) . ' ' . number_format($c['line'], 1) . ' ' . GoldilocksEngine::marketLabel($c['market'])) ?></td>
                                    <td class="text-end" data-label="Odds"><?= esc(GoldilocksEngine::formatOdds((int) $c['odds'])) ?></td>
                                    <td class="text-end" data-label="Model chance"><?= $pct($c['model_prob']) ?></td>
                                    <td class="text-end" data-label="Priced chance (no vig)"><?= $pct($c['market_prob']) ?></td>
                                    <td class="text-end" data-label="Edge"><?= esc(number_format($c['edge'] * 100, 1)) ?> pts</td>
                                    <td class="text-end" data-label="EV per $1"><?= esc(number_format($c['ev_per_dollar'], 3)) ?></td>
                                    <td data-label="Goldilocks?"><?= $c['goldilocks'] ? 'Yes' : esc(implode('; ', $c['why_not'])) ?></td>
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
            <table class="table table-sm mb-0 sports-stack-lg" id="sports-splits">
                <thead><tr><th>Split</th><?php foreach ($markets as $m): ?><th class="text-end"><?= esc(GoldilocksEngine::marketLabel($m)) ?> avg / median (games)</th><?php endforeach; ?></tr></thead>
                <tbody>
                <?php foreach (['overall' => 'Season', 'last5' => 'Last 5 games', 'top' => $tierLabels['top'], 'mid' => $tierLabels['mid'], 'bottom' => $tierLabels['bottom']] as $k => $label): ?>
                    <tr><td class="sports-stack-title"><?= esc($label) ?></td>
                    <?php foreach ($markets as $m): $s = $report['splits'][$m][$k]; ?>
                        <td class="text-end" data-label="<?= esc(GoldilocksEngine::marketLabel($m), 'attr') ?> avg / med (g)"><?= $fmt($s['avg']) ?> / <?= $fmt($s['median']) ?> (<?= (int) $s['games'] ?>)</td>
                    <?php endforeach; ?></tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer small text-muted">Defensive rankings match the driver for each market.<?php if (! empty($report['provenance']['attribution'])): ?> <?= esc($report['provenance']['attribution']) ?>.<?php endif; ?></div>
    </div>

    <div class="card">
        <div class="card-header"><strong>Game log</strong></div>
        <div class="table-responsive">
            <table class="table table-sm table-striped mb-0 sports-stack" id="sports-gamelog">
                <?php if ($pos === 'QB'): ?>
                    <thead><tr><th>Wk</th><th>Opp</th><th>Pass D</th><th class="text-end">Att</th><th class="text-end">Cmp</th><th class="text-end">Pass yds</th><th class="text-end">Pass TD</th><th class="text-end">INT</th><th class="text-end">Rush yds</th></tr></thead>
                    <tbody>
                    <?php foreach ($report['games'] as $g): ?>
                        <tr>
                            <td class="sports-stack-title"><span class="d-md-none">Week </span><?= (int) $g['week'] ?></td>
                            <td data-label="Opponent"><?= $g['home_away'] === 'A' ? '@' : 'vs' ?> <?= esc((string) $g['opponent']) ?></td>
                            <td data-label="Pass D"><?= esc((string) ($g['pass_def_rank'] ?? $g['rush_def_rank'] ?? '?')) ?> <span class="text-muted small">(<?= esc($g['tiers']['pass_yds'] ?? 'unknown') ?>)</span></td>
                            <td class="text-end" data-label="Att"><?= (int) ($g['pass_att'] ?? 0) ?></td>
                            <td class="text-end" data-label="Cmp"><?= (int) ($g['completions'] ?? 0) ?></td>
                            <td class="text-end" data-label="Pass yds"><?= (int) ($g['pass_yds'] ?? 0) ?></td>
                            <td class="text-end" data-label="Pass TD"><?= (int) ($g['pass_td'] ?? 0) ?></td>
                            <td class="text-end" data-label="INT"><?= (int) ($g['interceptions'] ?? 0) ?></td>
                            <td class="text-end" data-label="Rush yds"><?= (int) ($g['rush_yds'] ?? 0) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                <?php elseif ($pos === 'WR' || $pos === 'TE'): ?>
                    <thead><tr><th>Wk</th><th>Opp</th><th>Pass D</th><th class="text-end">Tgt</th><th class="text-end">Rec</th><th class="text-end">Rec yds</th><th class="text-end">Rec TD</th><th class="text-end">Rush yds</th></tr></thead>
                    <tbody>
                    <?php foreach ($report['games'] as $g): ?>
                        <tr>
                            <td class="sports-stack-title"><span class="d-md-none">Week </span><?= (int) $g['week'] ?></td>
                            <td data-label="Opponent"><?= $g['home_away'] === 'A' ? '@' : 'vs' ?> <?= esc((string) $g['opponent']) ?></td>
                            <td data-label="Pass D"><?= esc((string) ($g['pass_def_rank'] ?? '?')) ?> <span class="text-muted small">(<?= esc($g['tiers']['rec_yds'] ?? 'unknown') ?>)</span></td>
                            <td class="text-end" data-label="Tgt"><?= (int) ($g['targets'] ?? 0) ?></td>
                            <td class="text-end" data-label="Rec"><?= (int) ($g['receptions'] ?? 0) ?></td>
                            <td class="text-end" data-label="Rec yds"><?= (int) ($g['rec_yds'] ?? 0) ?></td>
                            <td class="text-end" data-label="Rec TD"><?= (int) ($g['rec_td'] ?? 0) ?></td>
                            <td class="text-end" data-label="Rush yds"><?= (int) ($g['rush_yds'] ?? 0) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                <?php else: ?>
                    <thead><tr><th>Wk</th><th>Opp</th><th>Rush D rank</th><th class="text-end">Att</th><th class="text-end">Rush yds</th><th class="text-end">Tgt</th><th class="text-end">Rec</th><th class="text-end">Rec yds</th><th class="text-end">Total</th><th class="text-end">TD</th></tr></thead>
                    <tbody>
                    <?php foreach ($report['games'] as $g): ?>
                        <tr>
                            <td class="sports-stack-title"><span class="d-md-none">Week </span><?= (int) $g['week'] ?></td>
                            <td data-label="Opponent"><?= $g['home_away'] === 'A' ? '@' : 'vs' ?> <?= esc((string) $g['opponent']) ?></td>
                            <td data-label="Rush D rank"><?= esc((string) ($g['rush_def_rank'] ?? '?')) ?> <span class="text-muted small">(<?= esc($g['tiers']['rush_yds']) ?>)</span></td>
                            <td class="text-end" data-label="Rush att"><?= (int) $g['rush_att'] ?></td>
                            <td class="text-end" data-label="Rush yds"><?= (int) $g['rush_yds'] ?></td>
                            <td class="text-end" data-label="Targets"><?= (int) $g['targets'] ?></td>
                            <td class="text-end" data-label="Receptions"><?= (int) $g['receptions'] ?></td>
                            <td class="text-end" data-label="Rec yds"><?= (int) $g['rec_yds'] ?></td>
                            <td class="text-end" data-label="Total yds"><?= (int) ($g['rush_rec_yds'] ?? ($g['rush_yds'] + $g['rec_yds'])) ?></td>
                            <td class="text-end" data-label="TD"><?= (int) ($g['rush_td'] ?? 0) + (int) ($g['rec_td'] ?? 0) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                <?php endif; ?>
            </table>
        </div>
    </div>
</section>
