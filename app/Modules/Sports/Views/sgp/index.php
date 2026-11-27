<?php
/**
 * Same-Game Parlay (SGP) Correlation & +EV Valuation Engine View.
 *
 * @var list<array> $correlations
 * @var string $disclaimer
 */
$correlations ??= [];
$disclaimer ??= \App\Modules\Sports\Libraries\SportsPropsService::DISCLAIMER;
?>
<?= view('App\\Modules\\Sports\\Views\\nfl\\_responsive') ?>
<section class="container-fluid py-4" id="sports-sgp-engine">
    <?= view('App\\Modules\\Sports\\Views\\_header', [
        'activeTab'    => 'sgp',
        'pageTitle'    => 'Same-Game Parlay (SGP) Correlation & +EV Valuation Engine',
        'pageSubtitle' => 'Empirical covariance models, fair joint probability solving, and synthetic juice exploitation across NFL, NBA, MLB, and NHL.',
    ]) ?>

    <div class="row g-4 mb-4">
        <!-- Interactive SGP Valuation Solver -->
        <div class="col-12 col-xl-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-danger text-white py-3">
                    <h2 class="h5 mb-0 fw-bold"><i class="bi bi-diagram-3-fill me-2"></i> SGP Fair Price &amp; +EV Solver</h2>
                </div>
                <div class="card-body">
                    <p class="small text-muted mb-3">
                        Sportsbooks build heavy synthetic vig into Same-Game Parlays. This solver models the true joint probability $P(A \cap B)$ adjusted for empirical correlation ($r$) and detects mispriced odds.
                    </p>

                    <!-- Presets Selector -->
                    <div class="mb-3">
                        <label for="sgp-preset" class="form-label fw-semibold small">Preset Market Correlation</label>
                        <select class="form-select" id="sgp-preset">
                            <option value="custom">-- Custom Inputs --</option>
                            <option value="nfl_qb_wr" selected>NFL: QB Pass Yds Over + WR1 Rec Yds Over (r = +0.58)</option>
                            <option value="nfl_qb_rb">NFL: QB Pass Yds Over + RB Rush Yds Over (r = -0.22)</option>
                            <option value="nba_pg_c">NBA: PG Assists Over + Center Points Over (r = +0.42)</option>
                            <option value="mlb_k_under">MLB: Pitcher Strikeouts Over + Game Total Under (r = +0.48)</option>
                            <option value="nhl_sog_pts">NHL: Skater SOG Over + Skater Points Over (r = +0.51)</option>
                            <option value="nhl_g_under">NHL: Goalie Saves Over + Game Total Under (r = +0.35)</option>
                        </select>
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label for="sgp-odds-a" class="form-label fw-semibold small">Leg A American Odds</label>
                            <input type="number" step="5" class="form-control font-monospace" id="sgp-odds-a" value="-115">
                        </div>
                        <div class="col-6">
                            <label for="sgp-odds-b" class="form-label fw-semibold small">Leg B American Odds</label>
                            <input type="number" step="5" class="form-control font-monospace" id="sgp-odds-b" value="-115">
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <label for="sgp-r" class="form-label fw-semibold small mb-0">Empirical Correlation ($r$)</label>
                            <span class="badge bg-primary font-monospace" id="sgp-r-badge">+0.58</span>
                        </div>
                        <input type="range" class="form-range" id="sgp-r" min="-0.60" max="0.80" step="0.02" value="0.58">
                        <div class="d-flex justify-content-between text-muted" style="font-size: 0.75rem;">
                            <span>-0.60 (Cannibalistic)</span>
                            <span>0.00 (Independent)</span>
                            <span>+0.80 (Highly Correlated)</span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="sgp-offered-odds" class="form-label fw-semibold small">Sportsbook Offered SGP Odds</label>
                        <input type="number" step="5" class="form-control font-monospace form-control-lg fw-bold text-danger" id="sgp-offered-odds" value="+185">
                        <div class="form-text small">Enter the actual parlay payout offered by DraftKings, FanDuel, or BetMGM.</div>
                    </div>

                    <!-- Live Results Box -->
                    <div class="p-3 bg-light rounded border">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="small text-muted">Fair Correlated Odds:</span>
                            <span class="fw-bold font-monospace fs-5 text-primary" id="res-fair-odds">+165</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="small text-muted">Unadjusted Independent Odds:</span>
                            <span class="font-monospace text-muted" id="res-ind-odds">+264</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="small text-muted">Fair Joint Win Probability:</span>
                            <span class="font-monospace fw-bold" id="res-fair-prob">37.7%</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="small text-muted">Expected Value (+EV / $):</span>
                            <span class="font-monospace fw-bold fs-5 text-success" id="res-ev">+7.45%</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                            <span class="small fw-bold">Mathematical Verdict:</span>
                            <span class="badge bg-success" id="res-verdict">+EV High Value SGP</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SGP Mechanics & Educational Guide -->
        <div class="col-12 col-xl-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-dark text-white py-3">
                    <h2 class="h5 mb-0 fw-bold"><i class="bi bi-lightbulb-fill text-warning me-2"></i> How Sportsbooks Price Same-Game Parlays</h2>
                </div>
                <div class="card-body">
                    <h3 class="h6 fw-bold mb-2">The Synthetic Juice Problem</h3>
                    <p class="small text-muted mb-3">
                        On traditional independent bets, a two-leg parlay of -110 / -110 pays <strong>+264</strong>.
                        However, when you add two correlated legs from the same game, the sportsbook discounts the payout to <strong>+180 or +160</strong>.
                    </p>

                    <h3 class="h6 fw-bold mb-2">Why Math Gives the Edge</h3>
                    <p class="small text-muted mb-3">
                        Because books use automated heuristic models to slash payouts, they frequently over-adjust or fail to recognize negative correlations that actually fit game scripts.
                    </p>

                    <div class="card bg-light border-0 mb-3">
                        <div class="card-body py-2">
                            <h4 class="small fw-bold mb-1 text-primary"><i class="bi bi-shield-check me-1"></i> Golden SGP Correlation Principles:</h4>
                            <ul class="small text-muted mb-0 ps-3">
                                <li><strong>Positive Synergy ($r &gt; +0.40$):</strong> QB + WR1, Pitcher Ks + Under, Skater SOG + Points. If you bet both Overs, verify that the book has not discounted odds beyond the fair correlated joint probability.</li>
                                <li><strong>Inverse Game Scripts ($r &lt; -0.20$):</strong> Large favorites + Under. When an NFL team takes a 21-point lead, they stop passing and run clock, suppressing passing totals while keeping the overall score low.</li>
                                <li><strong>Blowout Minutes Risk:</strong> In NBA basketball, parlaying a heavy favorite (-14.5 spread) with their superstar's points Over carries negative expectation because 4th-quarter blowouts bench the starters.</li>
                            </ul>
                        </div>
                    </div>

                    <a href="<?= site_url('My-Bets/Calculators') ?>" class="btn btn-outline-primary btn-sm w-100">
                        <i class="bi bi-calculator me-1"></i> Open Kelly Criterion Bankroll Sizing
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Empirical Cross-Market Correlation Matrix Table -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0 fw-bold"><i class="bi bi-table me-1"></i> Multi-Sport Empirical Correlation Matrix</h2>
            <span class="badge bg-light text-dark border"><?= count($correlations) ?> Empirical Covariances Tracked</span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="sgp-matrix-table">
                <thead class="table-light small text-uppercase text-muted">
                    <tr>
                        <th>Sport</th>
                        <th>Leg A Market</th>
                        <th>Leg B Market</th>
                        <th class="text-center">Correlation ($r$)</th>
                        <th>Synergy Classification</th>
                        <th>Game Script &amp; Statistical Rationale</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($correlations === []): ?>
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">No correlation pairs loaded.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($correlations as $c): ?>
                            <?php
                            $r = (float) ($c['correlation_coeff'] ?? $c['r'] ?? 0);
                            $sport = esc((string) ($c['sport'] ?? 'NFL'));
                            $isPos = $r > 0;
                            ?>
                            <tr>
                                <td><span class="badge bg-dark"><?= $sport ?></span></td>
                                <td class="fw-bold font-monospace"><?= esc((string) ($c['leg_a_market'] ?? $c['leg_a'] ?? '')) ?></td>
                                <td class="fw-bold font-monospace"><?= esc((string) ($c['leg_b_market'] ?? $c['leg_b'] ?? '')) ?></td>
                                <td class="text-center font-monospace fw-bold <?= $isPos ? 'text-success' : 'text-danger' ?>">
                                    <?= ($isPos ? '+' : '') . number_format($r, 2) ?>
                                </td>
                                <td>
                                    <span class="badge bg-<?= $isPos ? 'success' : 'danger' ?>-subtle text-dark border">
                                        <?= esc((string) ($c['synergy_label'] ?? $c['synergy'] ?? 'Neutral')) ?>
                                    </span>
                                </td>
                                <td class="small text-muted"><?= esc((string) ($c['notes'] ?? $c['description'] ?? '')) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script<?= script_nonce_attr() ?>>
    (function() {
        var PRESETS = {
            'nfl_qb_wr':    { oddsA: -115, oddsB: -115, r: 0.58, offered: 185 },
            'nfl_qb_rb':    { oddsA: -115, oddsB: -115, r: -0.22, offered: 290 },
            'nba_pg_c':     { oddsA: -110, oddsB: -110, r: 0.42, offered: 215 },
            'mlb_k_under':  { oddsA: -115, oddsB: -110, r: 0.48, offered: 200 },
            'nhl_sog_pts':  { oddsA: -110, oddsB: -110, r: 0.51, offered: 195 },
            'nhl_g_under':  { oddsA: -115, oddsB: -115, r: 0.35, offered: 220 }
        };

        function americanToProb(odds) {
            if (odds === 0) return 0.5;
            if (odds > 0) return 100.0 / (odds + 100.0);
            var pos = Math.abs(odds);
            return pos / (pos + 100.0);
        }

        function probToAmerican(prob) {
            var p = Math.max(0.01, Math.min(0.99, prob));
            if (p >= 0.5) {
                return Math.round(-100.0 * (p / (1.0 - p)));
            }
            return Math.round(100.0 * ((1.0 - p) / p));
        }

        function updateSgp() {
            var oddsA = parseInt(document.getElementById('sgp-odds-a').value, 10);
            var oddsB = parseInt(document.getElementById('sgp-odds-b').value, 10);
            var r = parseFloat(document.getElementById('sgp-r').value);
            var offeredOdds = parseInt(document.getElementById('sgp-offered-odds').value, 10);

            if (isNaN(oddsA) || isNaN(oddsB) || isNaN(r) || isNaN(offeredOdds)) return;

            document.getElementById('sgp-r-badge').textContent = (r >= 0 ? '+' : '') + r.toFixed(2);

            var pA = americanToProb(oddsA);
            var pB = americanToProb(oddsB);

            var pInd = pA * pB;
            var covariance = r * Math.sqrt(pA * (1.0 - pA) * pB * (1.0 - pB));
            var pCorrelated = Math.max(0.01, Math.min(0.95, pInd + covariance));

            var fairOdds = probToAmerican(pCorrelated);
            var indOdds = probToAmerican(pInd);

            var multiplier = offeredOdds > 0 ? (1.0 + offeredOdds / 100.0) : (1.0 + 100.0 / Math.abs(offeredOdds));
            var ev = ((pCorrelated * multiplier) - 1.0) * 100.0;

            document.getElementById('res-fair-odds').textContent = (fairOdds > 0 ? '+' : '') + fairOdds;
            document.getElementById('res-ind-odds').textContent = (indOdds > 0 ? '+' : '') + indOdds;
            document.getElementById('res-fair-prob').textContent = (pCorrelated * 100.0).toFixed(1) + '%';
            document.getElementById('res-ev').textContent = (ev >= 0 ? '+' : '') + ev.toFixed(2) + '%';
            document.getElementById('res-ev').className = 'font-monospace fw-bold fs-5 ' + (ev >= 0 ? 'text-success' : 'text-danger');

            var badge = document.getElementById('res-verdict');
            if (ev >= 5.0) {
                badge.className = 'badge bg-success';
                badge.textContent = '+EV High Value SGP (Underpriced Correlation)';
            } else if (ev >= 0.0) {
                badge.className = 'badge bg-primary';
                badge.textContent = '+EV Marginal Edge';
            } else if (ev >= -7.0) {
                badge.className = 'badge bg-warning text-dark';
                badge.textContent = 'Fair / Market Neutral SGP';
            } else {
                badge.className = 'badge bg-danger';
                badge.textContent = '-EV Sub-Optimal (Excessive Synthetic Juice)';
            }
        }

        document.getElementById('sgp-preset').addEventListener('change', function() {
            var val = this.value;
            if (PRESETS[val]) {
                var p = PRESETS[val];
                document.getElementById('sgp-odds-a').value = p.oddsA;
                document.getElementById('sgp-odds-b').value = p.oddsB;
                document.getElementById('sgp-r').value = p.r;
                document.getElementById('sgp-offered-odds').value = (p.offered > 0 ? '+' : '') + p.offered;
                updateSgp();
            }
        });

        ['sgp-odds-a', 'sgp-odds-b', 'sgp-r', 'sgp-offered-odds'].forEach(function(id) {
            document.getElementById(id).addEventListener('input', updateSgp);
            document.getElementById(id).addEventListener('change', updateSgp);
        });

        updateSgp();
    })();
    </script>
</section>
