<?php
/** @var bool $tablesReady @var array $players @var array $teams @var string $disclaimer @var array $picks @var string $activePos */
use App\Modules\Sports\Libraries\GoldilocksEngine;
use App\Modules\Sports\Libraries\Providers\NflverseStatsProvider;

$picks ??= [];
$notice ??= null;
$statsUpdated ??= null;
$activePos ??= 'ALL';
$teams ??= [];
$hasReal = in_array(NflverseStatsProvider::NAME, array_column($players, 'provider'), true);
?>
<?= view('App\\Modules\\Sports\\Views\\nfl\\_responsive') ?>
<section class="container-fluid py-4" id="sports-props-index">
    <div class="mb-3">
        <h1 class="h3 mb-1"><?= esc($pageTitle ?? 'NFL Props & Matchup Analytics') ?></h1>
        <p class="text-muted mb-0">Player prop distributions by defensive tier (QBs, RBs, Receivers) and team-vs-team spread/total simulations.</p>
    </div>

    <div class="alert alert-warning small" role="note"><?= esc($disclaimer) ?></div>
    <?php if (is_string($notice) && $notice !== ''): ?><div class="alert alert-info" role="status" id="sports-notice"><?= esc($notice) ?></div><?php endif; ?>

    <!-- Category Navigation Pills -->
    <ul class="nav nav-pills mb-3" id="sports-nav-pills">
        <li class="nav-item">
            <a class="nav-link <?= $activePos === 'ALL' ? 'active' : '' ?>" href="<?= site_url('MyMISports/NFL?pos=ALL') ?>">All Players</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $activePos === 'RB' ? 'active' : '' ?>" href="<?= site_url('MyMISports/NFL?pos=RB') ?>">Running Backs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $activePos === 'QB' ? 'active' : '' ?>" href="<?= site_url('MyMISports/NFL?pos=QB') ?>">Quarterbacks</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $activePos === 'WR' ? 'active' : '' ?>" href="<?= site_url('MyMISports/NFL?pos=WR') ?>">Wide Receivers / TEs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $activePos === 'MATCHUPS' ? 'active' : '' ?>" href="<?= site_url('MyMISports/NFL?pos=MATCHUPS') ?>">Game Matchups (Spreads &amp; Totals)</a>
        </li>
    </ul>

    <?php if ($tablesReady): ?>
        <form method="post" action="<?= site_url('MyMISports/NFL/Refresh') ?>" class="d-flex flex-wrap align-items-center gap-2 mb-3" id="sports-refresh-form">
            <?= csrf_field() ?>
            <button type="submit" class="btn btn-outline-primary btn-sm">Refresh stats now</button>
            <span class="text-muted small"><?= $statsUpdated ? 'Stats last pulled ' . esc($statsUpdated) . ' UTC. They update automatically every morning.' : 'Stats update automatically every morning.' ?></span>
        </form>
    <?php endif; ?>

    <?php if (! $tablesReady): ?>
        <div class="alert alert-info">Sports tables are not set up yet. An operator runs the migration <code>2026-11-27-000100_CreateSportsPropAnalyticsTables</code>, then <code>php spark sports:import --provider=sample</code>.</div>
    <?php elseif ($activePos === 'MATCHUPS'): ?>
        <!-- Team Matchup Simulator View -->
        <div class="card mb-4 border-primary">
            <div class="card-header bg-primary text-white">
                <h2 class="h5 mb-0">Head-to-Head Game Matchup Analyzer</h2>
            </div>
            <div class="card-body">
                <p class="text-muted">Select upcoming opponent teams to simulate final scores, point spread probability, game total, and check for Goldilocks edge.</p>
                <form method="get" class="row g-2 align-items-end" id="sports-matchup-launcher" onsubmit="event.preventDefault(); var away=document.getElementById('m-away').value; var home=document.getElementById('m-home').value; if(away && home && away !== home) { window.location.href='<?= site_url('MyMISports/NFL/Matchup') ?>/' + encodeURIComponent(home) + '/' + encodeURIComponent(away); } else { alert('Please select two distinct teams.'); }">
                    <div class="col-12 col-md-5">
                        <label for="m-away" class="form-label fw-bold">Away Team (Visitor)</label>
                        <select class="form-select" id="m-away" required>
                            <option value="">Select Away Team</option>
                            <?php foreach ($teams as $t): ?>
                                <option value="<?= esc($t) ?>"><?= esc($t) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-12 col-md-2 text-center pb-2">
                        <span class="badge bg-secondary fs-6">AT</span>
                    </div>
                    <div class="col-12 col-md-5">
                        <label for="m-home" class="form-label fw-bold">Home Team (Host)</label>
                        <select class="form-select" id="m-home" required>
                            <option value="">Select Home Team</option>
                            <?php foreach ($teams as $t): ?>
                                <option value="<?= esc($t) ?>"><?= esc($t) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary w-100">Simulate Matchup &amp; Goldilocks Odds</button>
                    </div>
                </form>
            </div>
        </div>
    <?php elseif ($players === []): ?>
        <div class="alert alert-info">No game logs found for this filter. Load stats with <code>php spark sports:import --provider=nflverse</code> or sample data with <code>php spark sports:import --provider=sample</code>.</div>
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
                                <td class="sports-stack-title"><?= esc((string) $pk['player']['full_name']) ?> <span class="text-muted small"><?= esc((string) $pk['player']['team']) ?> (<?= esc((string) ($pk['player']['position'] ?? 'RB')) ?>)</span></td>
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
                    <thead>
                        <tr>
                            <th>Player</th>
                            <th>Team</th>
                            <th>Pos</th>
                            <th>Season</th>
                            <th class="text-end">Games</th>
                            <?php if ($activePos === 'QB'): ?>
                                <th class="text-end">Pass yds / g</th>
                                <th class="text-end">Rush yds / g</th>
                            <?php elseif ($activePos === 'WR' || $activePos === 'TE'): ?>
                                <th class="text-end">Rec yds / g</th>
                                <th class="text-end">Rush yds / g</th>
                            <?php else: ?>
                                <th class="text-end">Rush yds / g</th>
                                <th class="text-end">Rec yds / g</th>
                                <th class="text-end">Pass yds / g</th>
                            <?php endif; ?>
                            <th><span class="visually-hidden">Actions</span></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($players as $p): ?>
                        <tr>
                            <td class="sports-stack-title"><?= esc((string) $p['full_name']) ?><?php if ($p['provider'] === 'sample'): ?> <span class="badge bg-secondary">sample data</span><?php endif; ?></td>
                            <td data-label="Team"><?= esc((string) $p['team']) ?></td>
                            <td data-label="Pos"><span class="badge bg-light text-dark border"><?= esc((string) ($p['position'] ?? 'RB')) ?></span></td>
                            <td data-label="Season"><?= (int) $p['season'] ?></td>
                            <td class="text-end" data-label="Games"><?= (int) $p['games'] ?></td>
                            <?php if ($activePos === 'QB'): ?>
                                <td class="text-end" data-label="Pass yds / game"><strong><?= esc(number_format((float) ($p['pass_avg'] ?? 0), 1)) ?></strong></td>
                                <td class="text-end" data-label="Rush yds / game"><?= esc(number_format((float) $p['rush_avg'], 1)) ?></td>
                            <?php elseif ($activePos === 'WR' || $activePos === 'TE'): ?>
                                <td class="text-end" data-label="Rec yds / game"><strong><?= esc(number_format((float) $p['rec_avg'], 1)) ?></strong></td>
                                <td class="text-end" data-label="Rush yds / game"><?= esc(number_format((float) $p['rush_avg'], 1)) ?></td>
                            <?php else: ?>
                                <td class="text-end" data-label="Rush yds / game"><?= esc(number_format((float) $p['rush_avg'], 1)) ?></td>
                                <td class="text-end" data-label="Rec yds / game"><?= esc(number_format((float) $p['rec_avg'], 1)) ?></td>
                                <td class="text-end" data-label="Pass yds / game"><?= esc(number_format((float) ($p['pass_avg'] ?? 0), 1)) ?></td>
                            <?php endif; ?>
                            <td class="sports-stack-action"><a class="btn btn-sm btn-primary text-nowrap" href="<?= site_url('MyMISports/NFL/Player/' . (int) $p['id']) ?>">Splits &amp; Goldilocks</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php if ($hasReal): ?><p class="small text-muted mt-2 mb-0"><?= esc(NflverseStatsProvider::ATTRIBUTION) ?>, <a href="https://github.com/nflverse/nflverse-data" rel="noopener" target="_blank">github.com/nflverse</a>. Defense ranks are computed from weekly game performances.</p><?php endif; ?>
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
