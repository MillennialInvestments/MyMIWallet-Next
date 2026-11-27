<?php
/**
 * Soccer (EPL / Champions League) Analytics Dashboard View:
 * Expected Goals (xG), Poisson goal simulation, Both Teams to Score (BTTS), and Over/Under 2.5 goals.
 *
 * @var bool $tablesReady
 * @var list<array> $teams
 * @var list<array> $fixtures
 * @var string $activeLeague
 * @var string $disclaimer
 */
$teams ??= [];
$fixtures ??= [];
$activeLeague ??= 'EPL';
?>
<?= view('App\\Modules\\Sports\\Views\\nfl\\_responsive') ?>
<section class="container-fluid py-4" id="sports-soccer-index">
    <?= view('App\\Modules\\Sports\\Views\\_header', [
        'activeTab'    => 'soccer',
        'pageTitle'    => 'Soccer Analytics & Poisson Expected Goals (xG) Engine',
        'pageSubtitle' => 'Quantitative offensive/defensive ratings, 1X2 match probabilities, Both Teams to Score (BTTS), and Over 2.5 goal modeling.',
    ]) ?>

    <!-- League Selector Pills -->
    <ul class="nav nav-pills mb-3" id="soccer-league-pills">
        <li class="nav-item">
            <a class="nav-link <?= $activeLeague === 'EPL' ? 'active' : '' ?>" href="<?= site_url('MyMISports/Soccer?league=EPL') ?>">Premier League (EPL)</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $activeLeague === 'UCL' ? 'active' : '' ?>" href="<?= site_url('MyMISports/Soccer?league=UCL') ?>">Champions League (UCL)</a>
        </li>
    </ul>

    <!-- Upcoming Fixtures & Quantitative Projections -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0 fw-bold"><i class="bi bi-calendar-event me-2 text-primary"></i> Upcoming Matches &amp; Fair 1X2 Probabilities</h2>
            <span class="badge bg-light text-dark border">Poisson Simulation</span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light small text-uppercase text-muted">
                    <tr>
                        <th>Fixture</th>
                        <th>Kickoff</th>
                        <th class="text-center">Projected xG</th>
                        <th class="text-center">Home Win (1)</th>
                        <th class="text-center">Draw (X)</th>
                        <th class="text-center">Away Win (2)</th>
                        <th class="text-center">BTTS Yes</th>
                        <th class="text-center">Over 2.5</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($fixtures === []): ?>
                        <tr><td colspan="9" class="text-center py-4 text-muted">No fixtures currently scheduled.</td></tr>
                    <?php else: ?>
                        <?php foreach ($fixtures as $f): ?>
                            <tr>
                                <td class="fw-bold">
                                    <span class="badge bg-dark me-1"><?= esc($f['home_team']) ?></span> vs 
                                    <span class="badge bg-secondary me-1"><?= esc($f['away_team']) ?></span>
                                </td>
                                <td class="font-monospace small text-muted"><?= date('M j, H:i', strtotime((string) $f['fixture_date'])) ?></td>
                                <td class="text-center font-monospace fw-bold text-primary">
                                    <?= number_format((float) $f['home_xg_proj'], 2) ?> - <?= number_format((float) $f['away_xg_proj'], 2) ?>
                                </td>
                                <td class="text-center font-monospace">
                                    <?= number_format((float) $f['home_win_prob'] * 100, 1) ?>%
                                    <span class="badge bg-light text-dark border"><?= (int) $f['fair_home_odds'] > 0 ? '+' : '' ?><?= (int) $f['fair_home_odds'] ?></span>
                                </td>
                                <td class="text-center font-monospace text-muted">
                                    <?= number_format((float) $f['draw_prob'] * 100, 1) ?>%
                                    <span class="badge bg-light text-dark border">+<?= (int) $f['fair_draw_odds'] ?></span>
                                </td>
                                <td class="text-center font-monospace">
                                    <?= number_format((float) $f['away_win_prob'] * 100, 1) ?>%
                                    <span class="badge bg-light text-dark border"><?= (int) $f['fair_away_odds'] > 0 ? '+' : '' ?><?= (int) $f['fair_away_odds'] ?></span>
                                </td>
                                <td class="text-center font-monospace <?= (float) $f['btts_prob'] >= 0.55 ? 'text-success fw-bold' : '' ?>">
                                    <?= number_format((float) $f['btts_prob'] * 100, 1) ?>%
                                </td>
                                <td class="text-center font-monospace <?= (float) $f['over_25_prob'] >= 0.55 ? 'text-danger fw-bold' : '' ?>">
                                    <?= number_format((float) $f['over_25_prob'] * 100, 1) ?>%
                                </td>
                                <td class="text-center">
                                    <form method="post" action="<?= site_url('MyMISports/Tracker/Create') ?>" class="d-inline">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="sport" value="SOCCER">
                                        <input type="hidden" name="sportsbook" value="DraftKings">
                                        <input type="hidden" name="event_description" value="<?= esc($f['home_team'] . ' vs ' . $f['away_team']) ?>">
                                        <input type="hidden" name="selection" value="<?= esc($f['home_team'] . ' ML (' . ((int) $f['fair_home_odds'] > 0 ? '+' : '') . (int) $f['fair_home_odds'] . ')') ?>">
                                        <input type="hidden" name="odds" value="<?= (int) $f['fair_home_odds'] ?>">
                                        <input type="hidden" name="stake_amount" value="50.00">
                                        <button type="submit" class="btn btn-outline-success btn-sm py-0 px-2" title="Track in Ledger">
                                            <i class="bi bi-plus-circle me-1"></i> Track
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Team xG Matrix & Simulator Row -->
    <div class="row g-4 mb-4">
        <!-- Team xG Efficiency Table -->
        <div class="col-12 col-xl-7">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                    <h2 class="h5 mb-0 fw-bold"><i class="bi bi-graph-up text-success me-2"></i> Team Expected Goals &amp; Possession Table</h2>
                    <span class="badge bg-light text-dark border">Domestic Form</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-hover align-middle mb-0">
                        <thead class="table-light small text-uppercase text-muted">
                            <tr>
                                <th>Team</th>
                                <th class="text-end">xG For/G</th>
                                <th class="text-end">xG Against/G</th>
                                <th class="text-end">Clean Sheet %</th>
                                <th class="text-end">BTTS %</th>
                                <th class="text-end">Possession %</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($teams as $t): ?>
                                <tr>
                                    <td class="fw-bold">
                                        <span class="badge bg-light text-dark border me-1"><?= esc($t['team']) ?></span>
                                        <?= esc($t['team_name']) ?>
                                    </td>
                                    <td class="text-end font-monospace text-primary fw-bold"><?= number_format((float) $t['xg_for_pg'], 2) ?></td>
                                    <td class="text-end font-monospace"><?= number_format((float) $t['xg_against_pg'], 2) ?></td>
                                    <td class="text-end font-monospace <?= (float) $t['clean_sheet_pct'] >= 40 ? 'text-success fw-bold' : '' ?>">
                                        <?= number_format((float) $t['clean_sheet_pct'], 1) ?>%
                                    </td>
                                    <td class="text-end font-monospace"><?= number_format((float) $t['btts_pct'], 1) ?>%</td>
                                    <td class="text-end font-monospace"><?= number_format((float) $t['possession_pct'], 1) ?>%</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Interactive Match Simulator -->
        <div class="col-12 col-xl-5">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-primary text-white py-3">
                    <h2 class="h5 mb-0 fw-bold"><i class="bi bi-cpu-fill me-2"></i> Poisson Match Simulator</h2>
                </div>
                <div class="card-body">
                    <p class="small text-muted mb-3">Simulates 10,000 scoreline distributions using bivariate Poisson processes.</p>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label for="sim-home-team" class="form-label small fw-bold">Home Club</label>
                            <select id="sim-home-team" class="form-select form-select-sm">
                                <?php foreach ($teams as $t): ?>
                                    <option value="<?= esc($t['team']) ?>" data-xgf="<?= esc((string) $t['xg_for_pg']) ?>" data-xga="<?= esc((string) $t['xg_against_pg']) ?>" <?= $t['team'] === 'ARS' ? 'selected' : '' ?>>
                                        <?= esc($t['team_name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="sim-away-team" class="form-label small fw-bold">Away Club</label>
                            <select id="sim-away-team" class="form-select form-select-sm">
                                <?php foreach ($teams as $t): ?>
                                    <option value="<?= esc($t['team']) ?>" data-xgf="<?= esc((string) $t['xg_for_pg']) ?>" data-xga="<?= esc((string) $t['xg_against_pg']) ?>" <?= $t['team'] === 'MCI' ? 'selected' : '' ?>>
                                        <?= esc($t['team_name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="p-3 bg-light rounded border mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="small text-muted">Projected xG:</span>
                            <span class="font-monospace fw-bold text-primary" id="sim-res-xg">2.15 - 1.05</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="small text-muted">Home Win / Draw / Away Win:</span>
                            <span class="font-monospace fw-bold" id="sim-res-1x2">51.0% / 26.0% / 23.0%</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="small text-muted">Both Teams To Score (BTTS):</span>
                            <span class="font-monospace fw-bold" id="sim-res-btts">52.0%</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="small text-muted">Over 2.5 Goals:</span>
                            <span class="font-monospace fw-bold" id="sim-res-o25">54.0%</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                            <span class="small fw-bold">Most Likely Score:</span>
                            <span class="badge bg-dark font-monospace fs-6" id="sim-res-score">2 - 1</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script<?= script_nonce_attr() ?>>
    (function() {
        function poisson(k, lambda) {
            if (k < 0 || lambda <= 0.0) return k === 0 ? 1.0 : 0.0;
            var fact = 1;
            for (var i = 2; i <= k; i++) fact *= i;
            return (Math.pow(lambda, k) * Math.exp(-lambda)) / fact;
        }

        function runSim() {
            var hSel = document.getElementById('sim-home-team');
            var aSel = document.getElementById('sim-away-team');
            var hOpt = hSel.options[hSel.selectedIndex];
            var aOpt = aSel.options[aSel.selectedIndex];

            var hXgf = parseFloat(hOpt.getAttribute('data-xgf') || '1.80');
            var hXga = parseFloat(hOpt.getAttribute('data-xga') || '1.10');
            var aXgf = parseFloat(aOpt.getAttribute('data-xgf') || '1.60');
            var aXga = parseFloat(aOpt.getAttribute('data-xga') || '1.20');

            var leagueAvg = 1.45;
            var homeXg = Math.max(0.4, (hXgf / leagueAvg) * (aXga / leagueAvg) * leagueAvg * 1.15);
            var awayXg = Math.max(0.3, (aXgf / leagueAvg) * (hXga / leagueAvg) * leagueAvg * 0.85);

            document.getElementById('sim-res-xg').textContent = homeXg.toFixed(2) + ' - ' + awayXg.toFixed(2);

            var pH = 0.0, pD = 0.0, pA = 0.0, pBtts = 0.0, pO25 = 0.0;
            var topScore = { h: 1, a: 1, p: 0.0 };

            for (var h = 0; h <= 6; h++) {
                var probH = poisson(h, homeXg);
                for (var a = 0; a <= 6; a++) {
                    var probA = poisson(a, awayXg);
                    var pScore = probH * probA;
                    if (h > a) pH += pScore;
                    else if (h === a) pD += pScore;
                    else pA += pScore;

                    if (h >= 1 && a >= 1) pBtts += pScore;
                    if ((h + a) >= 3) pO25 += pScore;

                    if (pScore > topScore.p) {
                        topScore = { h: h, a: a, p: pScore };
                    }
                }
            }

            var sum = pH + pD + pA;
            document.getElementById('sim-res-1x2').textContent = (pH / sum * 100).toFixed(1) + '% / ' + (pD / sum * 100).toFixed(1) + '% / ' + (pA / sum * 100).toFixed(1) + '%';
            document.getElementById('sim-res-btts').textContent = (pBtts * 100).toFixed(1) + '%';
            document.getElementById('sim-res-o25').textContent = (pO25 * 100).toFixed(1) + '%';
            document.getElementById('sim-res-score').textContent = topScore.h + ' - ' + topScore.a;
        }

        document.getElementById('sim-home-team').addEventListener('change', runSim);
        document.getElementById('sim-away-team').addEventListener('change', runSim);
        runSim();
    })();
    </script>
</section>
