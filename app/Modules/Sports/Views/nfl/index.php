<?php
/** @var bool $tablesReady @var array $players @var string $disclaimer @var array $picks */
use App\Modules\Sports\Libraries\GoldilocksEngine;
use App\Modules\Sports\Libraries\Providers\NflverseStatsProvider;

$picks ??= [];
$hasReal = in_array(NflverseStatsProvider::NAME, array_column($players, 'provider'), true);
?>
<?= view('App\\Modules\\Sports\\Views\\nfl\\_responsive') ?>
<section class="container-fluid py-4" id="sports-rb-props">
    <div class="mb-3">
        <h1 class="h3 mb-1">NFL Running Back Props</h1>
        <p class="text-muted mb-0">Rushing and receiving yards per game, split by opponent defense rank, with a Goldilocks prop pick.</p>
    </div>

    <div class="alert alert-warning small" role="note"><?= esc($disclaimer) ?></div>

    <?php if (! $tablesReady): ?>
        <div class="alert alert-info">Sports tables are not set up yet. An operator runs the migration <code>2026-11-27-000100_CreateSportsPropAnalyticsTables</code>, then <code>php spark sports:import --provider=sample</code>.</div>
    <?php elseif ($players === []): ?>
        <div class="alert alert-info">No game logs yet. Load the sample set with <code>php spark sports:import --provider=sample</code> or import a CSV with <code>php spark sports:import --logs=FILE --defense=FILE</code>.</div>
    <?php else: ?>
        <?php if ($picks !== []): ?>
            <div class="card mb-3" id="sports-weekly-picks">
                <div class="card-header"><strong>This week's Goldilocks picks</strong> <span class="text-muted small">from current sportsbook lines</span></div>
                <div class="table-responsive">
                    <table class="table table-sm mb-0 sports-stack-lg" id="sports-picks-table">
                        <thead><tr><th>Player</th><th>Matchup</th><th>Pick</th><th class="text-end">Model chance</th><th class="text-end">EV per $1</th><th><span class="visually-hidden">Actions</span></th></tr></thead>
                        <tbody>
                        <?php foreach ($picks as $pk): $b = $pk['best']; ?>
                            <tr class="<?= $b ? 'table-success' : '' ?>">
                                <td class="sports-stack-title"><?= esc((string) $pk['player']['full_name']) ?> <span class="text-muted small"><?= esc((string) $pk['player']['team']) ?></span></td>
                                <td data-label="Matchup">vs <?= esc((string) $pk['opponent']) ?><?php if ($pk['commence_time']): ?> <span class="text-muted small"><?= esc(date('D M j', strtotime($pk['commence_time'] . ' UTC'))) ?></span><?php endif; ?></td>
                                <td data-label="Pick"><?= $b ? esc(ucfirst($b['side']) . ' ' . number_format($b['line'], 1) . ' ' . GoldilocksEngine::marketLabel($b['market']) . ' (' . GoldilocksEngine::formatOdds((int) $b['odds']) . ')') : 'Pass' ?></td>
                                <td class="text-end" data-label="Model chance"><?= $b ? esc(number_format($b['model_prob'] * 100, 1)) . '%' : '–' ?></td>
                                <td class="text-end" data-label="EV per $1"><?= $b ? esc(number_format($b['ev_per_dollar'], 3)) : '–' ?></td>
                                <td class="sports-stack-action"><a class="btn btn-sm btn-outline-primary text-nowrap" href="<?= site_url('MyMISports/NFL/Player/' . (int) $pk['player']['id']) ?>">Details</a></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
        <div class="mb-2">
            <label class="visually-hidden" for="sports-player-filter">Find a player or team</label>
            <input type="search" class="form-control" id="sports-player-filter" placeholder="Find a player or team" autocomplete="off">
        </div>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-striped mb-0 sports-stack" id="sports-player-table">
                    <thead><tr><th>Player</th><th>Team</th><th>Season</th><th class="text-end">Games</th><th class="text-end">Rush yds / game</th><th class="text-end">Rec yds / game</th><th><span class="visually-hidden">Actions</span></th></tr></thead>
                    <tbody>
                    <?php foreach ($players as $p): ?>
                        <tr>
                            <td class="sports-stack-title"><?= esc((string) $p['full_name']) ?><?php if ($p['provider'] === 'sample'): ?> <span class="badge bg-secondary">sample data</span><?php endif; ?></td>
                            <td data-label="Team"><?= esc((string) $p['team']) ?></td>
                            <td data-label="Season"><?= (int) $p['season'] ?></td>
                            <td class="text-end" data-label="Games"><?= (int) $p['games'] ?></td>
                            <td class="text-end" data-label="Rush yds / game"><?= esc(number_format((float) $p['rush_avg'], 1)) ?></td>
                            <td class="text-end" data-label="Rec yds / game"><?= esc(number_format((float) $p['rec_avg'], 1)) ?></td>
                            <td class="sports-stack-action"><a class="btn btn-sm btn-primary text-nowrap" href="<?= site_url('MyMISports/NFL/Player/' . (int) $p['id']) ?>">Splits &amp; Goldilocks</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php if ($hasReal): ?><p class="small text-muted mt-2 mb-0"><?= esc(NflverseStatsProvider::ATTRIBUTION) ?>, <a href="https://github.com/nflverse/nflverse-data" rel="noopener" target="_blank">github.com/nflverse</a>. Defense ranks are computed from running-back yards allowed each week.</p><?php endif; ?>
        <script<?= script_nonce_attr() ?>>
        (function () {
            var input = document.getElementById('sports-player-filter');
            var rows = document.querySelectorAll('#sports-player-table tbody tr');
            if (!input) { return; }
            input.addEventListener('input', function () {
                var q = input.value.trim().toLowerCase();
                rows.forEach(function (tr) { tr.style.display = !q || tr.textContent.toLowerCase().indexOf(q) !== -1 ? '' : 'none'; });
            });
        })();
        </script>
    <?php endif; ?>
</section>
