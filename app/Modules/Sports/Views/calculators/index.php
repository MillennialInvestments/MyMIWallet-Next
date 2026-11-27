<?php
/**
 * Advanced Sports Betting Calculators View:
 * Kelly Criterion, Two-Way Arbitrage, and No-Vig Fair Odds / +EV.
 *
 * @var float $defaultBankroll
 * @var float $defaultUnit
 * @var string $disclaimer
 */
$defaultBankroll ??= 2500.00;
$defaultUnit ??= 50.00;
?>
<?= view('App\\Modules\\Sports\\Views\\nfl\\_responsive') ?>
<section class="container-fluid py-4" id="sports-calculators">
    <?= view('App\\Modules\\Sports\\Views\\_header', [
        'activeTab'    => 'calculators',
        'pageTitle'    => 'Quantitative Sports Betting & Bankroll Calculators',
        'pageSubtitle' => 'Mathematical models for Kelly Criterion position sizing, two-way cross-book arbitrage hedging, and no-vig expected value (+EV).',
    ]) ?>

    <div class="row g-4">
        <!-- Kelly Criterion Calculator -->
        <div class="col-12 col-lg-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h2 class="h5 mb-0 fw-bold"><i class="bi bi-pie-chart-fill me-2"></i> Kelly Criterion Sizing</h2>
                </div>
                <div class="card-body">
                    <p class="small text-muted mb-3">Calculates optimal capital allocation to maximize logarithmic bankroll growth while preventing risk of ruin.</p>

                    <div class="mb-3">
                        <label for="kc-bankroll" class="form-label fw-semibold small">Current Bankroll ($)</label>
                        <input type="number" step="10" class="form-control" id="kc-bankroll" value="<?= (float) $defaultBankroll ?>">
                    </div>

                    <div class="mb-3">
                        <label for="kc-odds" class="form-label fw-semibold small">Offered American Odds</label>
                        <input type="number" step="5" class="form-control" id="kc-odds" value="-110" placeholder="-110 or +140">
                    </div>

                    <div class="mb-3">
                        <label for="kc-prob" class="form-label fw-semibold small">Estimated Win Probability (%)</label>
                        <input type="number" step="0.5" min="1" max="99" class="form-control" id="kc-prob" value="56.0">
                        <div class="form-text small">e.g. 56% model projection vs 52.4% market implied.</div>
                    </div>

                    <div class="mb-3">
                        <label for="kc-fraction" class="form-label fw-semibold small">Kelly Multiplier</label>
                        <select class="form-select" id="kc-fraction">
                            <option value="0.5" selected>Half Kelly (0.50x - Recommended)</option>
                            <option value="0.25">Quarter Kelly (0.25x - Conservative)</option>
                            <option value="1.0">Full Kelly (1.00x - Aggressive)</option>
                        </select>
                    </div>

                    <hr>

                    <!-- Outputs -->
                    <div class="bg-light p-3 rounded">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">Expected Value (+EV):</span>
                            <span class="fw-bold font-monospace" id="kc-ev">+6.91%</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">Market Edge:</span>
                            <span class="fw-bold font-monospace text-success" id="kc-edge">+3.62%</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">Half Kelly Allocation:</span>
                            <span class="fw-bold font-monospace" id="kc-pct">3.80%</span>
                        </div>
                        <div class="d-flex justify-content-between border-top pt-2 mt-2">
                            <span class="fw-bold">Recommended Stake:</span>
                            <span class="fw-bold fs-5 text-primary font-monospace" id="kc-stake">$95.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Arbitrage & Hedge Calculator -->
        <div class="col-12 col-lg-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-header bg-success text-white py-3">
                    <h2 class="h5 mb-0 fw-bold"><i class="bi bi-arrow-left-right me-2"></i> Two-Way Arbitrage &amp; Hedge</h2>
                </div>
                <div class="card-body">
                    <p class="small text-muted mb-3">Distributes capital across two sportsbooks to lock in guaranteed profit or construct a zero-risk hedge.</p>

                    <div class="mb-3">
                        <label for="arb-stake" class="form-label fw-semibold small">Total Combined Stake ($)</label>
                        <input type="number" step="50" class="form-control" id="arb-stake" value="1000">
                    </div>

                    <div class="mb-3">
                        <label for="arb-odds-a" class="form-label fw-semibold small">Book A Odds (e.g. DraftKings)</label>
                        <input type="number" step="5" class="form-control" id="arb-odds-a" value="125" placeholder="+125">
                    </div>

                    <div class="mb-3">
                        <label for="arb-odds-b" class="form-label fw-semibold small">Book B Odds (e.g. FanDuel)</label>
                        <input type="number" step="5" class="form-control" id="arb-odds-b" value="-115" placeholder="-115">
                    </div>

                    <hr>

                    <!-- Outputs -->
                    <div class="bg-light p-3 rounded">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">Market Status:</span>
                            <span class="badge bg-success" id="arb-status">ARBITRAGE FOUND</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">Stake on Book A:</span>
                            <span class="fw-bold font-monospace" id="arb-stake-a">$460.67</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">Stake on Book B:</span>
                            <span class="fw-bold font-monospace" id="arb-stake-b">$539.33</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">Guaranteed Payout:</span>
                            <span class="fw-bold font-monospace" id="arb-payout">$1,036.51</span>
                        </div>
                        <div class="d-flex justify-content-between border-top pt-2 mt-2">
                            <span class="fw-bold">Guaranteed Profit:</span>
                            <span class="fw-bold fs-5 text-success font-monospace" id="arb-profit">+$36.51 (+3.65%)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- No-Vig Fair Odds & +EV Calculator -->
        <div class="col-12 col-lg-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-header bg-dark text-white py-3">
                    <h2 class="h5 mb-0 fw-bold"><i class="bi bi-bullseye me-2"></i> No-Vig Fair Odds (+EV)</h2>
                </div>
                <div class="card-body">
                    <p class="small text-muted mb-3">Removes bookmaker overround (juice) to reveal true market win probability and fair zero-vig lines.</p>

                    <div class="mb-3">
                        <label for="nv-odds-a" class="form-label fw-semibold small">Side A American Odds</label>
                        <input type="number" step="5" class="form-control" id="nv-odds-a" value="-115">
                    </div>

                    <div class="mb-3">
                        <label for="nv-odds-b" class="form-label fw-semibold small">Side B American Odds</label>
                        <input type="number" step="5" class="form-control" id="nv-odds-b" value="-105">
                    </div>

                    <div class="mb-3">
                        <label for="nv-model-prob" class="form-label fw-semibold small">Optional Model Win Probability (%)</label>
                        <input type="number" step="0.5" class="form-control" id="nv-model-prob" value="55.0" placeholder="55.0">
                    </div>

                    <hr>

                    <!-- Outputs -->
                    <div class="bg-light p-3 rounded">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">Bookmaker Vig (Juice):</span>
                            <span class="fw-bold font-monospace" id="nv-vig">4.71%</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">Fair No-Vig Probability Side A:</span>
                            <span class="fw-bold font-monospace" id="nv-prob-a">51.09%</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">Fair No-Vig Odds Side A:</span>
                            <span class="fw-bold font-monospace text-primary" id="nv-fair-odds-a">-104</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">Model Edge over Fair:</span>
                            <span class="fw-bold font-monospace text-success" id="nv-edge">+3.91%</span>
                        </div>
                        <div class="d-flex justify-content-between border-top pt-2 mt-2">
                            <span class="fw-bold">Expected Value (+EV):</span>
                            <span class="fw-bold fs-5 text-success font-monospace" id="nv-ev">+7.17%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Interactive Client-side Script -->
    <script<?= script_nonce_attr() ?>>
    (function () {
        function americanToDecimal(odds) {
            odds = parseFloat(odds);
            if (!odds || odds === 0) return 1.0;
            return odds > 0 ? (1.0 + odds / 100.0) : (1.0 + 100.0 / Math.abs(odds));
        }

        function decimalToAmerican(dec) {
            if (dec <= 1.0) return 0;
            return dec >= 2.0 ? Math.round((dec - 1.0) * 100.0) : Math.round(-100.0 / (dec - 1.0));
        }

        function americanToImpliedProb(odds) {
            odds = parseFloat(odds);
            if (!odds) return 0.5;
            return odds > 0 ? 100.0 / (odds + 100.0) : Math.abs(odds) / (Math.abs(odds) + 100.0);
        }

        // 1. Recalculate Kelly
        function updateKelly() {
            var bankroll = parseFloat(document.getElementById('kc-bankroll').value) || 0;
            var odds = parseFloat(document.getElementById('kc-odds').value) || -110;
            var prob = (parseFloat(document.getElementById('kc-prob').value) || 50.0) / 100.0;
            var fraction = parseFloat(document.getElementById('kc-fraction').value) || 0.5;

            var dec = americanToDecimal(odds);
            var b = Math.max(0.0001, dec - 1.0);
            var q = 1.0 - prob;

            var fStar = (b * prob - q) / b;
            var ev = (prob * b - q) * 100.0;
            var implied = americanToImpliedProb(odds);
            var edge = (prob - implied) * 100.0;

            var recPct = fStar > 0 ? Math.max(0, fStar * fraction * 100.0) : 0;
            var stake = bankroll * (recPct / 100.0);

            document.getElementById('kc-ev').textContent = (ev >= 0 ? '+' : '') + ev.toFixed(2) + '%';
            document.getElementById('kc-ev').className = 'fw-bold font-monospace ' + (ev >= 0 ? 'text-success' : 'text-danger');
            document.getElementById('kc-edge').textContent = (edge >= 0 ? '+' : '') + edge.toFixed(2) + '%';
            document.getElementById('kc-edge').className = 'fw-bold font-monospace ' + (edge >= 0 ? 'text-success' : 'text-danger');
            document.getElementById('kc-pct').textContent = recPct.toFixed(2) + '%';
            document.getElementById('kc-stake').textContent = '$' + stake.toFixed(2);
        }

        // 2. Recalculate Arbitrage
        function updateArbitrage() {
            var totalStake = parseFloat(document.getElementById('arb-stake').value) || 1000;
            var oddsA = parseFloat(document.getElementById('arb-odds-a').value) || 100;
            var oddsB = parseFloat(document.getElementById('arb-odds-b').value) || -110;

            var decA = americanToDecimal(oddsA);
            var decB = americanToDecimal(oddsB);

            var invA = 1.0 / decA;
            var invB = 1.0 / decB;
            var margin = invA + invB;

            var isArb = margin < 1.0;
            var stakeA = totalStake * (invA / margin);
            var stakeB = totalStake - stakeA;
            var payout = Math.min(stakeA * decA, stakeB * decB);
            var profit = payout - totalStake;
            var roi = totalStake > 0 ? (profit / totalStake) * 100.0 : 0;

            var statusEl = document.getElementById('arb-status');
            if (isArb) {
                statusEl.textContent = 'ARBITRAGE FOUND (' + ((1.0 - margin) * 100).toFixed(2) + '% EDGE)';
                statusEl.className = 'badge bg-success';
            } else {
                statusEl.textContent = 'NO ARB (VIG ' + ((margin - 1.0) * 100).toFixed(2) + '%)';
                statusEl.className = 'badge bg-secondary';
            }

            document.getElementById('arb-stake-a').textContent = '$' + stakeA.toFixed(2);
            document.getElementById('arb-stake-b').textContent = '$' + stakeB.toFixed(2);
            document.getElementById('arb-payout').textContent = '$' + payout.toFixed(2);
            document.getElementById('arb-profit').textContent = (profit >= 0 ? '+' : '') + '$' + profit.toFixed(2) + ' (' + roi.toFixed(2) + '%)';
            document.getElementById('arb-profit').className = 'fw-bold fs-5 font-monospace ' + (profit >= 0 ? 'text-success' : 'text-danger');
        }

        // 3. Recalculate No-Vig
        function updateNoVig() {
            var oddsA = parseFloat(document.getElementById('nv-odds-a').value) || -110;
            var oddsB = parseFloat(document.getElementById('nv-odds-b').value) || -110;
            var modelProb = parseFloat(document.getElementById('nv-model-prob').value);

            var probA = americanToImpliedProb(oddsA);
            var probB = americanToImpliedProb(oddsB);
            var sumProb = probA + probB;
            var vig = (sumProb - 1.0) * 100.0;

            var fairProbA = probA / sumProb;
            var fairDecA = 1.0 / fairProbA;
            var fairOddsA = decimalToAmerican(fairDecA);

            document.getElementById('nv-vig').textContent = vig.toFixed(2) + '%';
            document.getElementById('nv-prob-a').textContent = (fairProbA * 100.0).toFixed(2) + '%';
            document.getElementById('nv-fair-odds-a').textContent = (fairOddsA > 0 ? '+' : '') + fairOddsA;

            if (!isNaN(modelProb) && modelProb > 0) {
                var p = modelProb / 100.0;
                var decA = americanToDecimal(oddsA);
                var ev = (p * (decA - 1.0) - (1.0 - p)) * 100.0;
                var edge = (p - fairProbA) * 100.0;

                document.getElementById('nv-edge').textContent = (edge >= 0 ? '+' : '') + edge.toFixed(2) + '%';
                document.getElementById('nv-edge').className = 'fw-bold font-monospace ' + (edge >= 0 ? 'text-success' : 'text-danger');
                document.getElementById('nv-ev').textContent = (ev >= 0 ? '+' : '') + ev.toFixed(2) + '%';
                document.getElementById('nv-ev').className = 'fw-bold fs-5 font-monospace ' + (ev >= 0 ? 'text-success' : 'text-danger');
            }
        }

        ['kc-bankroll', 'kc-odds', 'kc-prob', 'kc-fraction'].forEach(function(id) {
            document.getElementById(id).addEventListener('input', updateKelly);
            document.getElementById(id).addEventListener('change', updateKelly);
        });

        ['arb-stake', 'arb-odds-a', 'arb-odds-b'].forEach(function(id) {
            document.getElementById(id).addEventListener('input', updateArbitrage);
            document.getElementById(id).addEventListener('change', updateArbitrage);
        });

        ['nv-odds-a', 'nv-odds-b', 'nv-model-prob'].forEach(function(id) {
            document.getElementById(id).addEventListener('input', updateNoVig);
            document.getElementById(id).addEventListener('change', updateNoVig);
        });

        updateKelly();
        updateArbitrage();
        updateNoVig();
    })();
    </script>
</section>
