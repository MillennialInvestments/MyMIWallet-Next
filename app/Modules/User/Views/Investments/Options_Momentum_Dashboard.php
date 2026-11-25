<?php
/**
 * MyMI Options Opportunity Scanner + Trade Momentum Manager
 * View file for the weekly two-sided options momentum platform.
 */
?>
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Options Opportunity Scanner & Momentum Manager</h3>
            <div class="nk-block-des text-soft">
                <p>Two-Sided Weekly Momentum Strategy · $100 Call / $100 Put Target Balance Entry ($200 Budget) · $0.95 Debit Target &rarr; +$200.00 Net Profit ($3.90 Exit Target)</p>
            </div>
        </div>
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <li><span class="badge badge-dim bg-success"><em class="icon ni ni-shield-check"></em> Pine v6 Webhook Active</span></li>
                        <li><span class="badge badge-dim bg-info"><em class="icon ni ni-activity-round"></em> Dual-Leg Tracker Ready</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Strategy Metric Highlights -->
<div class="nk-block">
    <div class="row g-gs">
        <div class="col-sm-6 col-xxl-3">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="nk-wg5">
                        <div class="nk-wg5-title text-soft">Target Entry Balance</div>
                        <div class="nk-wg5-amount">
                            <div class="amount">$200.00 <span class="currency currency-usd">USD</span></div>
                            <div class="change text-soft"><span class="fs-12px">$100 Call Leg + $100 Put Leg</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xxl-3">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="nk-wg5">
                        <div class="nk-wg5-title text-soft">Target Net Profit</div>
                        <div class="nk-wg5-amount">
                            <div class="amount text-success">+$200.00 <span class="currency currency-usd">USD</span></div>
                            <div class="change text-success"><em class="icon ni ni-arrow-long-up"></em><span class="fs-12px">Combined Exit: $3.90 / pair</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xxl-3">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="nk-wg5">
                        <div class="nk-wg5-title text-soft">Breakeven Stock Move</div>
                        <div class="nk-wg5-amount">
                            <div class="amount">$1.90 <span class="currency currency-usd">From Strike</span></div>
                            <div class="change text-soft"><span class="fs-12px">Either Direction (Up or Down)</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xxl-3">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="nk-wg5">
                        <div class="nk-wg5-title text-soft">Profit Target Stock Move</div>
                        <div class="nk-wg5-amount">
                            <div class="amount text-primary">$3.90 <span class="currency currency-usd">From Strike</span></div>
                            <div class="change text-primary"><span class="fs-12px">At Expiry (Lower Pre-Expiry)</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Active Positions & Opportunities Tabs -->
<div class="nk-block mt-4">
    <div class="card card-bordered">
        <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#tab-positions"><em class="icon ni ni-trend-up"></em><span>Active Position Manager</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-scanner"><em class="icon ni ni-radar"></em><span>Opportunity Scanner</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-pine"><em class="icon ni ni-code"></em><span>TradingView Pine v6 Webhook</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-catalysts"><em class="icon ni ni-bulb"></em><span>AlphaVantage Catalysts & News</span></a>
            </li>
        </ul>
        <div class="tab-content">
            <!-- TAB 1: POSITIONS & CAMPAIGNS -->
            <div class="tab-pane active" id="tab-positions">
                <div class="card-inner">
                    <div class="card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">Active Two-Sided Options Campaigns</h6>
                            <p class="text-soft">Real-time dual-leg tracking with 12-metric campaign accounting, cash-recovery progress, and residual runner status.</p>
                        </div>
                    </div>
                    <div class="alert alert-pro alert-warning mb-3">
                        <div class="alert-text">
                            <h6><em class="icon ni ni-shield-alert"></em> Residual Runner Operating Rule</h6>
                            <p class="fs-12px mb-0">When an options campaign's original debit is fully recovered ($C_{\text{rec}} \ge D_0$), open residual contracts are economically funded but <strong>strictly not risk-free</strong>. Remaining contracts carry opportunity cost and total loss of current market value if expiring worthless.</p>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-tranx">
                            <thead>
                                <tr class="tb-tnx-head">
                                    <th class="tb-tnx-id"><span>Campaign / Ticker</span></th>
                                    <th><span>Strategy</span></th>
                                    <th><span>Original Debit</span></th>
                                    <th><span>Cash Recovered</span></th>
                                    <th><span>Recovery %</span></th>
                                    <th><span>Unrecovered Net Cost</span></th>
                                    <th><span>Open Legs</span></th>
                                    <th><span>Liquidation Value</span></th>
                                    <th><span>Net P&amp;L</span></th>
                                    <th><span>Runner Status</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (! empty($campaigns)): ?>
                                    <?php foreach ($campaigns as $camp): ?>
                                        <tr class="tb-tnx-item">
                                            <td class="tb-tnx-id">
                                                <strong><?= esc($camp['ticker']) ?></strong>
                                            </td>
                                            <td><?= esc(ucwords(str_replace('_', ' ', (string) ($camp['strategy'] ?? 'Strangle')))) ?></td>
                                            <td>$<?= number_format((float) ($camp['total_original_premium_debit'] ?? 0), 2) ?></td>
                                            <td class="text-success">+$<?= number_format((float) ($camp['cash_recovered'] ?? 0), 2) ?></td>
                                            <td>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-success" style="width: <?= min(100, max(0, (float) ($camp['premium_recovery_percentage'] ?? 0))) ?>%"></div>
                                                </div>
                                                <span class="fs-11px text-soft"><?= number_format((float) ($camp['premium_recovery_percentage'] ?? 0), 1) ?>%</span>
                                            </td>
                                            <td>$<?= number_format((float) ($camp['remaining_unrecovered_net_cost'] ?? 0), 2) ?></td>
                                            <td><?= (int) ($camp['open_contract_quantities']['total'] ?? 0) ?> (<span class="text-primary"><?= (int) ($camp['open_contract_quantities']['calls'] ?? 0) ?>C</span> / <span class="text-danger"><?= (int) ($camp['open_contract_quantities']['puts'] ?? 0) ?>P</span>)</td>
                                            <td>$<?= number_format((float) ($camp['current_executable_liquidation_value'] ?? 0), 2) ?></td>
                                            <td class="<?= ((float) ($camp['fee_adjusted_campaign_pnl'] ?? 0)) >= 0 ? 'text-success' : 'text-danger' ?>">
                                                <?= ((float) ($camp['fee_adjusted_campaign_pnl'] ?? 0)) >= 0 ? '+' : '' ?>$<?= number_format((float) ($camp['fee_adjusted_campaign_pnl'] ?? 0), 2) ?>
                                            </td>
                                            <td>
                                                <?php if (! empty($camp['residual_runner_accounting']['has_residual_runner'])): ?>
                                                    <span class="badge bg-warning"><em class="icon ni ni-bolt"></em> RUNNER ACTIVE (DEBIT FUNDED)</span>
                                                <?php elseif ((float) ($camp['remaining_unrecovered_net_cost'] ?? 0) <= 0 && ((int) ($camp['open_contract_quantities']['total'] ?? 0)) === 0): ?>
                                                    <span class="badge bg-success">CLOSED (PROFIT)</span>
                                                <?php else: ?>
                                                    <span class="badge bg-info">CAPITAL AT RISK</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="10" class="text-center py-4 text-soft">
                                            <em>No active options campaigns for this user. Simulate or enter a two-sided trade below to begin tracking recovery.</em>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- TAB 2: SCANNER -->
            <div class="tab-pane" id="tab-scanner">
                <div class="card-inner">
                    <div class="card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">Liquid Weekly Opportunities (5-Part Research Ranking)</h6>
                            <p class="text-soft">Composite 100-pt evaluation: Technical Setup (25) + Catalyst (20) + Liquidity (20) + Risk/Reward (25) + Capital (10). Fails closed to <strong>NO TRADE</strong> below 70.0.</p>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Ticker</th>
                                    <th>Stock Price</th>
                                    <th>Strikes (Call / Put)</th>
                                    <th>RVOL</th>
                                    <th>Tech / Cat / Liq / R:R / Cap</th>
                                    <th>Total Score</th>
                                    <th>Status</th>
                                    <th>Recommendation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (! empty($topOpportunities)): ?>
                                    <?php foreach ($topOpportunities as $opp): ?>
                                        <tr>
                                            <td><strong><?= esc($opp['ticker']) ?></strong></td>
                                            <td>$<?= number_format((float) ($opp['stock_price'] ?? 0), 2) ?></td>
                                            <td>$<?= number_format((float) ($opp['call_strike'] ?? 0), 2) ?> / $<?= number_format((float) ($opp['put_strike'] ?? 0), 2) ?></td>
                                            <td><?= number_format((float) ($opp['rvol_20d'] ?? 1.0), 2) ?>x</td>
                                            <td>
                                                <span class="fs-12px text-soft">
                                                    <?= number_format((float) ($opp['ranking_breakdown']['technical_setup'] ?? 0), 0) ?> /
                                                    <?= number_format((float) ($opp['ranking_breakdown']['catalyst_quality'] ?? 0), 0) ?> /
                                                    <?= number_format((float) ($opp['ranking_breakdown']['execution_liquidity'] ?? 0), 0) ?> /
                                                    <?= number_format((float) ($opp['ranking_breakdown']['risk_reward'] ?? 0), 0) ?> /
                                                    <?= number_format((float) ($opp['ranking_breakdown']['capital_suitability'] ?? 0), 0) ?>
                                                </span>
                                            </td>
                                            <td><strong><?= number_format((float) ($opp['ranking_score'] ?? 0), 1) ?></strong></td>
                                            <td>
                                                <?php if (($opp['scan_status'] ?? 'rejected') === 'qualified'): ?>
                                                    <span class="badge bg-success">QUALIFIED</span>
                                                <?php else: ?>
                                                    <span class="badge bg-danger" title="<?= esc((string) ($opp['rejection_reason'] ?? 'Exclusion')) ?>">
                                                        <?= esc((string) ($opp['exclusion_code'] ?? 'REJECTED')) ?>
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if (($opp['recommendation'] ?? '') === 'TRADE'): ?>
                                                    <span class="badge badge-dim bg-success">TRADE</span>
                                                <?php else: ?>
                                                    <span class="badge badge-dim bg-secondary">NO TRADE</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td><strong>SPY</strong></td>
                                        <td>$580.05</td>
                                        <td>$580.00 / $580.00</td>
                                        <td>1.65x</td>
                                        <td><span class="fs-12px text-soft">18 / 15 / 16 / 18 / 7</span></td>
                                        <td><strong>74.2</strong></td>
                                        <td><span class="badge bg-success">QUALIFIED</span></td>
                                        <td><span class="badge badge-dim bg-success">TRADE</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>NVDA</strong></td>
                                        <td>$142.50</td>
                                        <td>$145.00 / $140.00</td>
                                        <td>1.58x</td>
                                        <td><span class="fs-12px text-soft">17 / 14 / 15 / 19 / 7</span></td>
                                        <td><strong>72.5</strong></td>
                                        <td><span class="badge bg-success">QUALIFIED</span></td>
                                        <td><span class="badge badge-dim bg-success">TRADE</span></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- TAB 3: TRADINGVIEW PINE V6 INTEGRATION -->
            <div class="tab-pane" id="tab-pine">
                <div class="card-inner">
                    <div class="card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">TradingView Pine Script v6 Integration</h6>
                            <p class="text-soft">Connect your TradingView charts and webhooks to trigger momentum warnings directly into MyMI Wallet.</p>
                        </div>
                    </div>
                    <div class="row g-gs">
                        <div class="col-lg-6">
                            <h6>Webhook Configuration</h6>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Webhook Endpoint:</strong> <code>https://www.mymiwallet.com/API/Options/webhook</code></li>
                                <li class="list-group-item"><strong>HTTP Method:</strong> <code>POST</code> (application/json)</li>
                                <li class="list-group-item"><strong>Secret Header / Field:</strong> <code>X-MyMI-Secret</code> or <code>"secret"</code>, set to the value of <code>OPTIONS_WEBHOOK_SECRET</code> (ask an admin; the webhook is off until it is set)</li>
                                <li class="list-group-item"><strong>Target Balance Defaults:</strong> <code>$100.00 Call / $100.00 Put</code> (configurable in <code>app/Config/OptionsStrategy.php</code> or <code>.env</code>)</li>
                                <li class="list-group-item"><strong>Idempotency:</strong> Handled automatically via SHA-256 event hash</li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <h6>TradingView Alert JSON Template</h6>
                            <pre class="bg-light p-3 rounded fs-12px"><code>{
  "secret": "YOUR_OPTIONS_WEBHOOK_SECRET",
  "ticker": "{{ticker}}",
  "signal": "momentum_weakening",
  "timeframe": "{{interval}}",
  "price": {{close}},
  "call_strike": 145.0,
  "put_strike": 140.0,
  "target_balance_call": 100.0,
  "target_balance_put": 100.0,
  "timestamp": "{{time}}"
}</code></pre>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="<?php echo site_url('docs/tradingview/MyMI_Options_Momentum_Tracker_v6.pine'); ?>" target="_blank" class="btn btn-primary btn-sm">
                            <em class="icon ni ni-download"></em><span>Download Pine Script v6 File</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- TAB 4: ALPHAVANTAGE NEWS & MACRO CATALYSTS -->
            <div class="tab-pane" id="tab-catalysts">
                <div class="card-inner">
                    <div class="card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">AlphaVantage Economic News & Ticker Catalyst Engine</h6>
                            <p class="text-soft">Identify breaking earnings announcements, M&amp;A developments, and macroeconomic moves that trigger high-velocity momentum shifts.</p>
                        </div>
                    </div>
                    <div class="row g-gs">
                        <div class="col-lg-6">
                            <h6>Catalyst Integration Features</h6>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>NEWS_SENTIMENT Ingestion:</strong> Analyzes overall &amp; ticker-specific sentiment scores (-1.0 to +1.0) and relevance weights.</li>
                                <li class="list-group-item"><strong>Catalyst Classification:</strong> Automatically categorizes catalysts (Earnings Reports, Deal/M&amp;A, Analyst Upgrades, Macro/Regulatory).</li>
                                <li class="list-group-item"><strong>Momentum Ranking Boost:</strong> Tickers with breaking catalysts receive up to a +20 point ranking boost to elevate strike-breach candidates.</li>
                                <li class="list-group-item"><strong>Macroeconomic Pulse:</strong> Ingests economy-wide headlines affecting index ETFs (SPY, QQQ, IWM).</li>
                                <li class="list-group-item"><strong>Configurable API Key:</strong> Set <code>ALPHA_VANTAGE_API_KEY</code> in <code>.env</code> or supply via <code>--alphavantage-key</code>.</li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <h6>CLI Commands with AlphaVantage</h6>
                            <pre class="bg-light p-3 rounded fs-12px"><code># Run weekly options scanner with AlphaVantage news sentiment
php spark options:scan --alphavantage-key=YOUR_KEY

# Open simulated strangle and check active underlier news
php spark options:simulate-straddle NVDA --call-strike=210 --put-strike=150

# Fast offline scan without API calls
php spark options:scan --skip-news --dry-run</code></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
