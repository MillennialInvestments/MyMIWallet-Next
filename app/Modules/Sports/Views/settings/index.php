<?php
/**
 * Sports Settings, BYOK API Keys & Non-Custodial Integration Guide View.
 *
 * @var array $settings
 * @var string $disclaimer
 */
$settings ??= [];
$hasOddsKey = ! empty($settings['has_odds_api_key']);
$hasSportsKey = ! empty($settings['has_api_sports_key']);
?>
<?= view('App\\Modules\\Sports\\Views\\nfl\\_responsive') ?>
<section class="container-fluid py-4" id="sports-settings">
    <?= view('App\\Modules\\Sports\\Views\\_header', [
        'activeTab'    => 'settings',
        'pageTitle'    => 'Sports Integrations & BYOK Settings',
        'pageSubtitle' => 'Configure your personal API credentials, bankroll preferences, and learn safe non-custodial sportsbook slip synchronization.',
    ]) ?>

    <div class="row g-4">
        <!-- BYOK API Credentials -->
        <div class="col-12 col-lg-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-header bg-white py-3 border-0">
                    <h2 class="h5 mb-0 fw-bold"><i class="bi bi-key-fill me-2 text-primary"></i> Bring Your Own Keys (BYOK)</h2>
                </div>
                <div class="card-body">
                    <p class="small text-muted mb-3">
                        Enter your personal API keys to power live lines and player stats using your own provider quotas.
                        All keys are encrypted at rest using audited military-grade encryption (<code>enc:v1</code>).
                    </p>

                    <form method="post" action="<?= site_url('My-Bets/Settings/Save') ?>">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="odds_api_key" class="form-label fw-semibold small">
                                The Odds API Key
                                <?php if ($hasOddsKey): ?>
                                    <span class="badge bg-success-subtle text-success ms-1">Active &amp; Encrypted</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary-subtle text-secondary ms-1">Not Configured</span>
                                <?php endif; ?>
                            </label>
                            <input type="password" class="form-control font-monospace" id="odds_api_key" name="odds_api_key" placeholder="<?= $hasOddsKey ? '••••••••••••••••••••••••' : 'Enter 32-character key from the-odds-api.com' ?>">
                            <div class="form-text small">
                                Powers real-time multi-book line shopping (DraftKings, FanDuel, BetMGM, Caesars). Free tier provides 500 requests/month at <a href="https://the-odds-api.com" target="_blank" rel="noopener">the-odds-api.com</a>. Leave blank to keep existing key.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="api_sports_key" class="form-label fw-semibold small">
                                API-Sports Key
                                <?php if ($hasSportsKey): ?>
                                    <span class="badge bg-success-subtle text-success ms-1">Active &amp; Encrypted</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary-subtle text-secondary ms-1">Not Configured</span>
                                <?php endif; ?>
                            </label>
                            <input type="password" class="form-control font-monospace" id="api_sports_key" name="api_sports_key" placeholder="<?= $hasSportsKey ? '••••••••••••••••••••••••' : 'Enter API key from api-sports.io' ?>">
                            <div class="form-text small">
                                Powers live NFL and NBA box scores and game telemetry from <a href="https://api-sports.io" target="_blank" rel="noopener">api-sports.io</a>. Leave blank to keep existing key.
                            </div>
                        </div>

                        <hr>

                        <h3 class="h6 fw-bold mb-3">Bankroll &amp; Unit Sizing Preferences</h3>

                        <div class="row g-2 mb-3">
                            <div class="col-12 col-md-6">
                                <label for="default_unit_size" class="form-label fw-semibold small">Default 1-Unit Stake ($)</label>
                                <input type="number" step="1" min="1" class="form-control" id="default_unit_size" name="default_unit_size" value="<?= (float) ($settings['default_unit_size'] ?? 50.0) ?>" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="default_bankroll" class="form-label fw-semibold small">Total Starting Bankroll ($)</label>
                                <input type="number" step="50" min="10" class="form-control" id="default_bankroll" name="default_bankroll" value="<?= (float) ($settings['default_bankroll'] ?? 2500.0) ?>" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="bankroll_currency" class="form-label fw-semibold small">Currency</label>
                            <select class="form-select" id="bankroll_currency" name="bankroll_currency">
                                <option value="USD" <?= ($settings['bankroll_currency'] ?? 'USD') === 'USD' ? 'selected' : '' ?>>USD ($)</option>
                                <option value="CAD" <?= ($settings['bankroll_currency'] ?? '') === 'CAD' ? 'selected' : '' ?>>CAD ($)</option>
                                <option value="EUR" <?= ($settings['bankroll_currency'] ?? '') === 'EUR' ? 'selected' : '' ?>>EUR (€)</option>
                                <option value="GBP" <?= ($settings['bankroll_currency'] ?? '') === 'GBP' ? 'selected' : '' ?>>GBP (£)</option>
                            </select>
                        </div>

                        <hr>

                        <h3 class="h6 fw-bold mb-1">Quantitative Edge Model Personalization</h3>
                        <p class="small text-muted mb-3">Tune the relative weighting of variables in your personal Goldilocks prop &amp; +EV edge calculations.</p>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between small fw-semibold">
                                <span>Recent Form Weight (Last 3 Games)</span>
                                <span id="val-form"><?= (int) (((float) ($settings['quant_form_weight'] ?? 0.35)) * 100) ?>%</span>
                            </div>
                            <input type="range" class="form-range" min="0.10" max="0.60" step="0.05" name="quant_form_weight" id="quant_form_weight" value="<?= (float) ($settings['quant_form_weight'] ?? 0.35) ?>" oninput="document.getElementById('val-form').textContent = Math.round(this.value * 100) + '%'">
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between small fw-semibold">
                                <span>Defensive Matchup Weight (Opponent Rank)</span>
                                <span id="val-matchup"><?= (int) (((float) ($settings['quant_matchup_weight'] ?? 0.40)) * 100) ?>%</span>
                            </div>
                            <input type="range" class="form-range" min="0.10" max="0.60" step="0.05" name="quant_matchup_weight" id="quant_matchup_weight" value="<?= (float) ($settings['quant_matchup_weight'] ?? 0.40) ?>" oninput="document.getElementById('val-matchup').textContent = Math.round(this.value * 100) + '%'">
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between small fw-semibold">
                                <span>Home / Away Venue Weight</span>
                                <span id="val-home"><?= (int) (((float) ($settings['quant_home_away_weight'] ?? 0.15)) * 100) ?>%</span>
                            </div>
                            <input type="range" class="form-range" min="0.05" max="0.30" step="0.05" name="quant_home_away_weight" id="quant_home_away_weight" value="<?= (float) ($settings['quant_home_away_weight'] ?? 0.15) ?>" oninput="document.getElementById('val-home').textContent = Math.round(this.value * 100) + '%'">
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between small fw-semibold">
                                <span>Ballpark Altitude &amp; Weather Weight</span>
                                <span id="val-venue"><?= (int) (((float) ($settings['quant_venue_weight'] ?? 0.10)) * 100) ?>%</span>
                            </div>
                            <input type="range" class="form-range" min="0.00" max="0.25" step="0.05" name="quant_venue_weight" id="quant_venue_weight" value="<?= (float) ($settings['quant_venue_weight'] ?? 0.10) ?>" oninput="document.getElementById('val-venue').textContent = Math.round(this.value * 100) + '%'">
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="bi bi-save me-1"></i> Save Preferences &amp; Keys
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Safe Sportsbook Sync Guidance -->
        <div class="col-12 col-lg-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-header bg-white py-3 border-0">
                    <h2 class="h5 mb-0 fw-bold"><i class="bi bi-shield-check me-2 text-success"></i> Safe Sportsbook Data Synchronization</h2>
                </div>
                <div class="card-body">
                    <div class="alert alert-info py-2 px-3 small mb-3">
                        <i class="bi bi-lock-fill me-1"></i> <strong>Strict Non-Custodial Policy:</strong> MyMI Wallet never connects to, requests, or stores your sportsbook passwords or session cookies. You maintain full self-custody and control of all accounts.
                    </div>

                    <h3 class="h6 fw-bold">How to Export &amp; Sync Your Slips Safely:</h3>

                    <div class="timeline small mt-3">
                        <div class="mb-3 border-start border-2 border-primary ps-3">
                            <div class="fw-bold">Step 1: Export from DraftKings / FanDuel</div>
                            <div class="text-muted">
                                On desktop or mobile browser, navigate to your <strong>Account &gt; Betting Activity &gt; Settled Bets</strong>, and click <strong>Download CSV</strong>.
                            </div>
                        </div>

                        <div class="mb-3 border-start border-2 border-primary ps-3">
                            <div class="fw-bold">Step 2: Action Network / Pikkit Sync</div>
                            <div class="text-muted">
                                If you use bet-tracking apps like Action Network or Pikkit, export your historical slip report as a <code>.csv</code> file.
                            </div>
                        </div>

                        <div class="mb-3 border-start border-2 border-success ps-3">
                            <div class="fw-bold">Step 3: 1-Click Import into MyMI Wallet</div>
                            <div class="text-muted">
                                Head to the <a href="<?= site_url('My-Bets') ?>">Bet Tracker</a> tab and click <strong>Import Slips</strong> to parse your bets directly into your private ledger.
                            </div>
                        </div>
                    </div>

                    <hr>

                    <h3 class="h6 fw-bold mb-2">Data Portability &amp; Backup</h3>
                    <p class="small text-muted">
                        You can export your complete MyMI betting history anytime for personal accounting, spreadsheets, or tax reconciliation.
                    </p>
                    <a href="<?= site_url('My-Bets/Export') ?>" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-download me-1"></i> Download Complete Bet History (CSV)
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
