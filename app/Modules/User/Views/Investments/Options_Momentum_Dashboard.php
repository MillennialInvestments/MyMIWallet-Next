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
            <!-- TAB 1: POSITIONS -->
            <div class="tab-pane active" id="tab-positions">
                <div class="card-inner">
                    <div class="card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">Active Two-Sided Positions</h6>
                            <p class="text-soft">Real-time dual-leg tracking with peak profit trailing stops and theta decay monitors.</p>
                        </div>
                        <div class="card-tools">
                            <a href="#" class="btn btn-primary btn-sm"><em class="icon ni ni-plus"></em><span>Simulate Straddle</span></a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-tranx">
                            <thead>
                                <tr class="tb-tnx-head">
                                    <th class="tb-tnx-id"><span class="">Position ID</span></th>
                                    <th class="tb-tnx-info">
                                        <span class="tb-tnx-desc d-none d-sm-inline-block">
                                            <span>Underlier</span>
                                        </span>
                                        <span class="tb-tnx-date d-md-inline-block d-none">
                                            <span class="d-md-none">Date</span>
                                            <span class="d-none d-md-block"><span>Strikes (Call / Put)</span></span>
                                        </span>
                                    </th>
                                    <th class="tb-tnx-amt tb-tnx-req">
                                        <span class="tb-tnx-total">Target Balance</span>
                                        <span class="tb-tnx-status d-none d-md-inline-block">Outlay</span>
                                    </th>
                                    <th class="tb-tnx-amt tb-tnx-req">
                                        <span class="tb-tnx-total">Combined Bid</span>
                                        <span class="tb-tnx-status d-none d-md-inline-block">Target Exit</span>
                                    </th>
                                    <th class="tb-tnx-amt is-alt">
                                        <span class="tb-tnx-total">Unrealized P&L</span>
                                        <span class="tb-tnx-status d-none d-md-inline-block">High-Water Mark</span>
                                    </th>
                                    <th class="tb-tnx-status">
                                        <h2>Status</h2>
                                    </th>
                                    <th class="tb-tnx-action">
                                        <span>&nbsp;</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tb-tnx-item">
                                    <td class="tb-tnx-id"><a href="#"><span>#2</span></a></td>
                                    <td class="tb-tnx-info">
                                        <div class="tb-tnx-desc">
                                            <span class="title">NVDA (Straddle)</span>
                                        </div>
                                        <div class="tb-tnx-date">
                                            <span class="date">Call: $145.00 / Put: $140.00</span>
                                        </div>
                                    </td>
                                    <td class="tb-tnx-amount is-alt">
                                        <div class="tb-tnx-total">
                                            <span class="amount">$100 C / $100 P</span>
                                        </div>
                                        <div class="tb-tnx-status">
                                            <span class="amount text-soft">$190.00</span>
                                        </div>
                                    </td>
                                    <td class="tb-tnx-amount is-alt">
                                        <div class="tb-tnx-total">
                                            <span class="amount">$2.45</span>
                                        </div>
                                        <div class="tb-tnx-status">
                                            <span class="amount text-primary">$3.90</span>
                                        </div>
                                    </td>
                                    <td class="tb-tnx-amount is-alt">
                                        <div class="tb-tnx-total">
                                            <span class="amount text-success">+$55.00</span>
                                        </div>
                                        <div class="sub-text text-soft">Peak: +$75.00</div>
                                    </td>
                                    <td class="tb-tnx-status">
                                        <span class="badge bg-success">ACTIVE HOLD</span>
                                    </td>
                                    <td class="tb-tnx-action">
                                        <div class="dropdown">
                                            <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                <ul class="link-list-plain">
                                                    <li><a href="#">Take Profit</a></li>
                                                    <li><a href="#">Harvest Leg</a></li>
                                                    <li><a href="#">Tighten Stop</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
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
                            <h6 class="title">Liquid Weekly Opportunities (Ranked by Profit Reachability)</h6>
                            <p class="text-soft">Evaluates 14D ATR, 5D historical range, RVOL, and price displacement efficiency against the $200 profit threshold.</p>
                        </div>
                    </div>
                    <div class="alert alert-pro alert-primary">
                        <div class="alert-text">
                            <h6>Volume-per-Dollar & Price Efficiency Insight</h6>
                            <p>Opportunities are filtered by <strong>Price Displacement Efficiency</strong> ($|\Delta P| / (\text{Volume} / 1\text{M})$) and <strong>Turnover Efficiency</strong> ($\% \Delta P / (\text{Turnover} / \$1\text{M})$) to ensure volume accelerates price movement rather than absorbing it.</p>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Ticker</th>
                                    <th>Stock Price</th>
                                    <th>Call Strike</th>
                                    <th>Put Strike</th>
                                    <th>Target Balance</th>
                                    <th>14D ATR</th>
                                    <th>5D Range</th>
                                    <th>RVOL</th>
                                    <th>Reachability</th>
                                    <th>Rank Score</th>
                                    <th>Recommendation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>SPY</strong></td>
                                    <td>$580.05</td>
                                    <td>$580</td>
                                    <td>$580</td>
                                    <td>$100C / $100P</td>
                                    <td>$24.80</td>
                                    <td>$78.48</td>
                                    <td>1.65x</td>
                                    <td><span class="badge bg-success">95.0%</span></td>
                                    <td><strong>74.2</strong></td>
                                    <td><span class="badge badge-dim bg-success">Top Candidate</span></td>
                                </tr>
                                <tr>
                                    <td><strong>NVDA</strong></td>
                                    <td>$142.50</td>
                                    <td>$143</td>
                                    <td>$143</td>
                                    <td>$100C / $100P</td>
                                    <td>$6.09</td>
                                    <td>$19.28</td>
                                    <td>1.58x</td>
                                    <td><span class="badge bg-success">95.0%</span></td>
                                    <td><strong>72.5</strong></td>
                                    <td><span class="badge badge-dim bg-success">Top Candidate</span></td>
                                </tr>
                                <tr>
                                    <td><strong>COIN</strong></td>
                                    <td>$215.00</td>
                                    <td>$215</td>
                                    <td>$215</td>
                                    <td>$100C / $100P</td>
                                    <td>$9.19</td>
                                    <td>$29.09</td>
                                    <td>1.52x</td>
                                    <td><span class="badge bg-success">95.0%</span></td>
                                    <td><strong>71.8</strong></td>
                                    <td><span class="badge badge-dim bg-success">Top Candidate</span></td>
                                </tr>
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
                                <li class="list-group-item"><strong>Secret Header / Field:</strong> <code>mymi-options-secure-key</code></li>
                                <li class="list-group-item"><strong>Target Balance Defaults:</strong> <code>$100.00 Call / $100.00 Put</code> (configurable in <code>app/Config/OptionsStrategy.php</code> or <code>.env</code>)</li>
                                <li class="list-group-item"><strong>Idempotency:</strong> Handled automatically via SHA-256 event hash</li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <h6>TradingView Alert JSON Template</h6>
                            <pre class="bg-light p-3 rounded fs-12px"><code>{
  "secret": "mymi-options-secure-key",
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
