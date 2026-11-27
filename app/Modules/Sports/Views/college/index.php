<?php
/**
 * College Sports (NCAAF Football & NCAAB Basketball) Analytics View:
 * Net efficiency ratings (SP+ / KenPom style power ratings), home advantage, and spread simulator.
 *
 * @var bool $tablesReady
 * @var list<array> $teams
 * @var string $activeSport 'NCAAF'|'NCAAB'
 * @var string $disclaimer
 */
$teams ??= [];
$activeSport ??= 'NCAAF';
?>
<?= view('App\\Modules\\Sports\\Views\\nfl\\_responsive') ?>
<section class="container-fluid py-4" id="sports-college-index">
    <?= view('App\\Modules\\Sports\\Views\\_header', [
        'activeTab'    => 'college',
        'pageTitle'    => 'College Sports (NCAAF & NCAAB) Matchup & Spread Intelligence',
        'pageSubtitle' => 'Quantitative net efficiency ratings, home-field/home-court advantage modeling, and tempo-adjusted point spreads.',
    ]) ?>

    <!-- Sport Selector Pills -->
    <ul class="nav nav-pills mb-3" id="college-sport-pills">
        <li class="nav-item">
            <a class="nav-link <?= $activeSport === 'NCAAF' ? 'active' : '' ?>" href="<?= site_url('MyMISports/College?sport=NCAAF') ?>">College Football (NCAAF)</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $activeSport === 'NCAAB' ? 'active' : '' ?>" href="<?= site_url('MyMISports/College?sport=NCAAB') ?>">College Basketball (NCAAB)</a>
        </li>
    </ul>

    <div class="row g-4 mb-4">
        <!-- Power Ratings Table -->
        <div class="col-12 col-xl-7">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                    <h2 class="h5 mb-0 fw-bold"><i class="bi bi-award-fill text-warning me-2"></i> Power Ratings &amp; Net Efficiency</h2>
                    <span class="badge bg-light text-dark border"><?= count($teams) ?> Programs Ranked</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light small text-uppercase text-muted">
                            <tr>
                                <th>Program</th>
                                <th>Conf</th>
                                <th class="text-end">Net Rating</th>
                                <th class="text-end">Offense</th>
                                <th class="text-end">Defense</th>
                                <th class="text-end">Pace/Tempo</th>
                                <th class="text-end">Home Edge</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($teams as $t): ?>
                                <tr>
                                    <td class="fw-bold">
                                        <?php if (! empty($t['ap_rank'])): ?>
                                            <span class="badge bg-danger me-1">#<?= (int) $t['ap_rank'] ?></span>
                                        <?php endif; ?>
                                        <span class="badge bg-light text-dark border me-1"><?= esc($t['team']) ?></span>
                                        <?= esc($t['team_name']) ?>
                                    </td>
                                    <td><span class="badge bg-secondary-subtle text-dark"><?= esc($t['conference']) ?></span></td>
                                    <td class="text-end font-monospace text-primary fw-bold">+<?= number_format((float) $t['net_rating'], 1) ?></td>
                                    <td class="text-end font-monospace"><?= number_format((float) $t['off_rating'], 1) ?></td>
                                    <td class="text-end font-monospace"><?= number_format((float) $t['def_rating'], 1) ?></td>
                                    <td class="text-end font-monospace text-muted"><?= number_format((float) $t['tempo_pace'], 1) ?></td>
                                    <td class="text-end font-monospace text-success fw-bold">+<?= number_format((float) $t['home_court_adv_pts'], 1) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- College Matchup & Spread Simulator -->
        <div class="col-12 col-xl-5">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-dark text-white py-3">
                    <h2 class="h5 mb-0 fw-bold"><i class="bi bi-sliders me-2 text-warning"></i> Matchup Spread Simulator</h2>
                </div>
                <div class="card-body">
                    <p class="small text-muted mb-3">Calculates quantitative fair point spread and total points using power ratings and home-venue impact.</p>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label for="col-home-team" class="form-label small fw-bold">Home Program</label>
                            <select id="col-home-team" class="form-select form-select-sm">
                                <?php foreach ($teams as $t): ?>
                                    <option value="<?= esc($t['team']) ?>" data-net="<?= esc((string) $t['net_rating']) ?>" data-hca="<?= esc((string) $t['home_court_adv_pts']) ?>" data-tempo="<?= esc((string) $t['tempo_pace']) ?>">
                                        <?= esc($t['team_name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="col-away-team" class="form-label small fw-bold">Away Program</label>
                            <select id="col-away-team" class="form-select form-select-sm">
                                <?php foreach (array_reverse($teams) as $t): ?>
                                    <option value="<?= esc($t['team']) ?>" data-net="<?= esc((string) $t['net_rating']) ?>" data-tempo="<?= esc((string) $t['tempo_pace']) ?>">
                                        <?= esc($t['team_name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="col-neutral-site">
                        <label class="form-check-label small" for="col-neutral-site">
                            Neutral Site Game (Zero Home Venue Advantage)
                        </label>
                    </div>

                    <div class="p-3 bg-light rounded border mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="small text-muted">Fair Point Spread:</span>
                            <span class="font-monospace fw-bold fs-5 text-primary" id="col-res-spread">-3.5</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="small text-muted">Projected Total Points:</span>
                            <span class="font-monospace fw-bold" id="col-res-total">54.5 Pts</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="small text-muted">Home Win Probability:</span>
                            <span class="font-monospace fw-bold" id="col-res-prob">60.2%</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                            <span class="small fw-bold">Model Recommendation:</span>
                            <span class="badge bg-success font-monospace" id="col-res-pick">Home Program Cover</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script<?= script_nonce_attr() ?>>
    (function() {
        function normalCdf(x) {
            var b1 =  0.319381530;
            var b2 = -0.356563782;
            var b3 =  1.781477937;
            var b4 = -1.821255978;
            var b5 =  1.330274429;
            var p  =  0.2316419;
            var c  =  0.39894228;

            if (x >= 0.0) {
                var t = 1.0 / (1.0 + p * x);
                return 1.0 - c * Math.exp(-x * x / 2.0) * t *
                    (t * (t * (t * (t * b5 + b4) + b3) + b2) + b1);
            }
            var t2 = 1.0 / (1.0 - p * x);
            return c * Math.exp(-x * x / 2.0) * t2 *
                (t2 * (t2 * (t2 * (t2 * b5 + b4) + b3) + b2) + b1);
        }

        function runCollegeSim() {
            var hSel = document.getElementById('col-home-team');
            var aSel = document.getElementById('col-away-team');
            var neutral = document.getElementById('col-neutral-site').checked;

            var hOpt = hSel.options[hSel.selectedIndex];
            var aOpt = aSel.options[aSel.selectedIndex];

            var hNet = parseFloat(hOpt.getAttribute('data-net') || '15.0');
            var aNet = parseFloat(aOpt.getAttribute('data-net') || '10.0');
            var hca = neutral ? 0.0 : parseFloat(hOpt.getAttribute('data-hca') || '3.5');

            var margin = (hNet - aNet) + hca;
            var fairSpread = (-1.0 * margin).toFixed(1);

            var z = margin / 14.0;
            var prob = normalCdf(z);

            document.getElementById('col-res-spread').textContent = (fairSpread > 0 ? '+' : '') + fairSpread;
            document.getElementById('col-res-prob').textContent = (prob * 100.0).toFixed(1) + '%';
            document.getElementById('col-res-total').textContent = (54.0 + (margin > 0 ? margin * 0.2 : 0)).toFixed(1) + ' Pts';

            var pickBadge = document.getElementById('col-res-pick');
            if (margin >= 2.5) {
                pickBadge.className = 'badge bg-success';
                pickBadge.textContent = hOpt.textContent.trim() + ' (' + (fairSpread > 0 ? '+' : '') + fairSpread + ')';
            } else {
                pickBadge.className = 'badge bg-primary';
                pickBadge.textContent = aOpt.textContent.trim() + ' (' + (-1 * fairSpread > 0 ? '+' : '') + (-1 * fairSpread) + ')';
            }
        }

        document.getElementById('col-home-team').addEventListener('change', runCollegeSim);
        document.getElementById('col-away-team').addEventListener('change', runCollegeSim);
        document.getElementById('col-neutral-site').addEventListener('change', runCollegeSim);
        runCollegeSim();
    })();
    </script>
</section>
