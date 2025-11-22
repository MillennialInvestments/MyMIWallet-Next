<?php
// -----------------------------------------------------------------------------
// Helper functions & base variable setup
// -----------------------------------------------------------------------------
$nonce = $nonce ?? ['style' => '', 'script' => ''];

if (!function_exists('vstr')) {
    function vstr($v): string { return (string)($v ?? ''); }
}
if (!function_exists('vupper')) {
    function vupper($v): string { return strtoupper(vstr($v)); }
}
if (!function_exists('vv')) {
    function vv($arr, $key, $default = null) {
        return (is_array($arr) && array_key_exists($key, $arr)) ? $arr[$key] : $default;
    }
}

// Core objects
$tradeAlert         = isset($tradeAlert) && is_array($tradeAlert) ? $tradeAlert : null;
$recentTradeAlerts  = is_array($recentTradeAlerts ?? null) ? $recentTradeAlerts : [];
$realTimeStockData  = is_array($realTimeStockData ?? null) ? $realTimeStockData : [];
$comments           = is_array($comments ?? null) ? $comments : [];
$secFilings         = is_array($secFilings ?? null) ? $secFilings : [];
$cuID               = $cuID ?? null;
$isPremiumUser      = (bool)($isPremiumUser ?? false);

// New data containers for Finviz-style layout (all optional)
$companyProfile     = is_array($companyProfile ?? null) ? $companyProfile : [];
$keyStats           = is_array($keyStats ?? null) ? $keyStats : [];          // list: ['label' => 'P/E', 'value' => '44.31']
$performanceStats   = is_array($performanceStats ?? null) ? $performanceStats : [];
$valuationStats     = is_array($valuationStats ?? null) ? $valuationStats : [];
$ownershipTopHolders= is_array($ownershipTopHolders ?? null) ? $ownershipTopHolders : []; // list of ['name','percent']
$insiderTrades      = is_array($insiderTrades ?? null) ? $insiderTrades : []; // short list for header block
$analystRatings     = is_array($analystRatings ?? null) ? $analystRatings : []; // ratings table (optional)
$peers              = is_array($peers ?? null) ? $peers : [];                 // list of tickers
$heldByEtfs         = is_array($heldByEtfs ?? null) ? $heldByEtfs : [];       // list of ETF tickers

// Symbols
$ticker     = vupper($ticker ?? ($tradeAlert['ticker'] ?? ''));
$exchange   = vupper($exchange ?? ($tradeAlert['exchange'] ?? ''));
$tvSymbol   = vupper($tvSymbol ?? ($exchange . ':' . $ticker));
$hasAlert   = is_array($tradeAlert) && !empty($tradeAlert);

$tvExch     = $hasAlert ? vupper(vv($tradeAlert, 'exchange', $exchange)) : $exchange;
$tvTicker   = $hasAlert ? vupper(vv($tradeAlert, 'ticker', $ticker)) : $ticker;

// Derived company / profile info
$companyName    = vv($companyProfile, 'name', vv($tradeAlert, 'company_name', ''));
$sector         = vv($companyProfile, 'sector', vv($tradeAlert, 'sector', 'Technology'));
$industry       = vv($companyProfile, 'industry', vv($tradeAlert, 'industry', ''));
$country        = vv($companyProfile, 'country', 'USA');
$primaryExLabel = vv($companyProfile, 'primaryExchange', $exchange);

// Price / quote info (graceful fallbacks)
$lastClose      = $realTimeStockData['price']    ?? $realTimeStockData['close'] ?? null;
$prevClose      = $realTimeStockData['prevClose']?? null;
$change         = $realTimeStockData['change']   ?? (
                    ($lastClose !== null && $prevClose !== null)
                        ? ($lastClose - $prevClose)
                        : null
                 );
$changePercent  = $realTimeStockData['changePercent'] ?? null;
$lastCloseDate  = $realTimeStockData['latestTradingDay'] ?? vv($tradeAlert, 'alerted_on', '');
$lastCloseTime  = $realTimeStockData['lastUpdate'] ?? '04:00PM ET';
$quoteAsOf      = $lastCloseDate ? date('M d', strtotime($lastCloseDate)) : '—';

// Build TradingView symbols list from recent alerts
$tradingViewSymbols = [];
foreach ($recentTradeAlerts as $ra) {
    $ex = vupper(vv($ra, 'exchange', 'NASDAQ'));
    $tk = vupper(vv($ra, 'ticker', null));
    if ($tk) {
        $tradingViewSymbols[] = [
            'proName' => "{$ex}:{$tk}",
            'title'   => $tk,
        ];
    }
}
?>
<style <?= $nonce['style'] ?? '' ?>>
.section-title {
    text-align: center;
    margin-bottom: 2rem;
}
.table-container { overflow-x: auto; }
.promotion-card {
    background: #f9f9f9;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    text-align: center;
}
.tradingview-widget-container { margin-bottom: 20px; }
.trade-alert-card {
    background: #fff;
    border-radius: 8px;
    padding: 15px;
    box-shadow: 0 4px 8px rgba(0,0,0,.1);
    margin-bottom: 20px;
    text-align: left;
    position: relative;
}
.blur-overlay {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(255,255,255,.8);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    font-weight: 700;
    color: #333;
    text-align: center;
    border-radius: 8px;
}
.blur-overlay a {
    text-decoration: none;
    font-weight: 700;
    color: #007bff;
}
#marketaux-news-fallback { display: none; }

/* --------------------------------------------------------------------------
 * Finviz-style header + stats
 * ----------------------------------------------------------------------- */
.ticker-header {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 1.5rem;
}
.ticker-header-main {
    flex: 1 1 60%;
}
.ticker-header-meta {
    flex: 1 1 35%;
    text-align: right;
}
.ticker-symbol {
    font-size: 2.25rem;
    font-weight: 700;
    letter-spacing: .03em;
}
.ticker-company {
    font-size: 1.1rem;
    color: #555;
}
.price-line {
    font-size: 1.6rem;
    font-weight: 600;
}
.price-change {
    font-size: 1rem;
    margin-left: .75rem;
}
.price-change.up { color: #0a9f4d; }
.price-change.down { color: #d9534f; }
.price-meta {
    font-size: .9rem;
    color: #777;
}
.meta-tags {
    font-size: .9rem;
    color: #555;
}
.meta-tags span::after {
    content: "•";
    margin: 0 .35rem;
    color: #bbb;
}
.meta-tags span:last-child::after {
    content: "";
    margin: 0;
}
.action-links {
    margin-top: .75rem;
    font-size: .9rem;
}
.action-links a {
    margin-right: .75rem;
    text-decoration: none;
    color: #007bff;
}
.action-links a::after {
    content: "•";
    margin-left: .5rem;
    color: #ccc;
}
.action-links a:last-child::after {
    content: "";
}

/* Peers / Held By */
.peers-heldby-row {
    margin-top: 1rem;
    margin-bottom: .5rem;
    display: flex;
    flex-wrap: wrap;
    gap: .75rem 2rem;
}
.peers-heldby-row .label {
    font-weight: 600;
    margin-right: .5rem;
}
.peers-heldby-row .badge-ticker {
    display: inline-block;
    padding: .15rem .45rem;
    border-radius: 16px;
    border: 1px solid #ddd;
    font-size: .8rem;
    margin: 0 .25rem .25rem 0;
}

/* “Draw / Ideas / Intraday / Daily / Weekly / Monthly” bar */
.chart-interval-tabs {
    display: inline-flex;
    flex-wrap: wrap;
    gap: .35rem;
    margin: .75rem 0 1.25rem;
}
.chart-interval-tabs .tab-pill {
    padding: .25rem .7rem;
    border-radius: 20px;
    border: 1px solid #ddd;
    font-size: .8rem;
    cursor: pointer;
    user-select: none;
}
.chart-interval-tabs .tab-pill.active {
    background: #007bff;
    color: #fff;
    border-color: #007bff;
}

/* Key stats grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: .75rem 1.5rem;
    font-size: .86rem;
}
.stats-item-label {
    font-size: .8rem;
    color: #777;
}
.stats-item-value {
    font-size: 1rem;
    font-weight: 600;
}

/* Ownership / Insider cards */
.small-card-header {
    font-weight: 600;
    font-size: .9rem;
    margin-bottom: .35rem;
}
.small-card-body-text {
    font-size: .85rem;
}
</style>

<script src="https://s3.tradingview.com/tv.js" defer <?= $nonce['script'] ?? '' ?>></script>

<!-- Top Ticker Strip (Recent Alerts Tickerbar) -->
<div class="tradingview-widget-container d-md-block d-none mt-4 pt-1">
    <div class="tradingview-widget-container__widget"></div>
    <script
        src="https://s3.tradingview.com/external-embedding/embed-widget-tickers.js"
        async
        type="text/javascript"
        <?= $nonce['script'] ?? '' ?>
    >{
        "symbols": [
            <?php foreach ($tradingViewSymbols as $i => $s): ?>
            {"proName": "<?= $s['proName'] ?>", "title": "<?= $s['title'] ?>"}<?= $i < count($tradingViewSymbols) - 1 ? ',' : '' ?>
            <?php endforeach; ?>
        ],
        "isTransparent": false,
        "showSymbolLogo": true,
        "colorTheme": "dark",
        "locale": "en"
    }</script>
</div>

<div class="mt-3 container-fluid px-3">

    <!-- ------------------------------------------------------------------
         FINVIZ-STYLE HEADER
    ------------------------------------------------------------------- -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="ticker-header">
                <div class="ticker-header-main">
                    <div class="ticker-symbol">
                        <?= esc(vupper($tvTicker)) ?>
                    </div>
                    <?php if (!empty($companyName)): ?>
                        <div class="ticker-company">
                            <?= esc($companyName) ?>
                        </div>
                    <?php endif; ?>

                    <div class="mt-2">
                        <span class="price-line">
                            <?= $lastClose !== null ? number_format((float)$lastClose, 2) : '—' ?>
                        </span>
                        <?php
                        $chgClass = '';
                        if ($change !== null && (float)$change > 0) {
                            $chgClass = 'up';
                        } elseif ($change !== null && (float)$change < 0) {
                            $chgClass = 'down';
                        }
                        ?>
                        <span class="price-change <?= $chgClass ?>">
                            <?php if ($change !== null): ?>
                                <?= sprintf('%+0.2f', (float)$change) ?>
                            <?php endif; ?>
                            <?php if ($changePercent !== null): ?>
                                (<?= esc($changePercent) ?>)
                            <?php endif; ?>
                        </span>
                    </div>
                    <div class="price-meta">
                        Last Close
                        <?php if ($quoteAsOf !== '—'): ?>
                            — <?= esc($quoteAsOf) ?> • <?= esc($lastCloseTime) ?>
                        <?php endif; ?>
                    </div>

                    <div class="meta-tags mt-2">
                        <?php if ($sector): ?>
                            <span><?= esc($sector) ?></span>
                        <?php endif; ?>
                        <?php if ($industry): ?>
                            <span><?= esc($industry) ?></span>
                        <?php endif; ?>
                        <?php if ($country): ?>
                            <span><?= esc($country) ?></span>
                        <?php endif; ?>
                        <?php if ($primaryExLabel): ?>
                            <span><?= esc($primaryExLabel) ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="action-links mt-2">
                        <!-- These can be wired to internal pages/routes later -->
                        <a href="javascript:void(0)">Stock Detail</a>
                        <a href="javascript:void(0)">Compare</a>
                        <a href="javascript:void(0)">Short Interest</a>
                        <a href="javascript:void(0)">Financials</a>
                        <a href="javascript:void(0)">Options</a>
                        <a href="#sec-filings-block">Latest Filings</a>
                        <a href="<?= site_url('/Portfolio/Add/' . urlencode($tvTicker)) ?>">Add to Portfolio</a>
                        <a href="<?= site_url('/Alerts/Create/' . urlencode($tvTicker)) ?>">Set Alert</a>
                    </div>
                </div>

                <div class="ticker-header-meta">
                    <!-- Quick metrics summary (if you send them in $keyStats / $performanceStats) -->
                    <div class="stats-grid">
                        <?php
                        // Example: show first 3 "headline" stats if provided
                        $headlineStats = array_slice($keyStats, 0, 3);
                        foreach ($headlineStats as $stat):
                        ?>
                            <div>
                                <div class="stats-item-label"><?= esc(vv($stat, 'label')) ?></div>
                                <div class="stats-item-value"><?= esc(vv($stat, 'value')) ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Peers + Held By ETFs row -->
            <?php if (!empty($peers) || !empty($heldByEtfs)): ?>
                <div class="peers-heldby-row">
                    <?php if (!empty($peers)): ?>
                        <div>
                            <span class="label">Peers:</span>
                            <?php foreach ($peers as $p): ?>
                                <span class="badge-ticker">
                                    <a href="<?= site_url('/Alerts/Preview/' . urlencode($p)) ?>">
                                        <?= esc($p) ?>
                                    </a>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($heldByEtfs)): ?>
                        <div>
                            <span class="label">Held by:</span>
                            <?php foreach ($heldByEtfs as $etf): ?>
                                <span class="badge-ticker">
                                    <a href="<?= site_url('/Alerts/Preview/' . urlencode($etf)) ?>">
                                        <?= esc($etf) ?>
                                    </a>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <!-- Finviz-style descriptive note / headline (optional) -->
            <?php if (!empty($headlineNews ?? null)): ?>
                <div class="mt-2 small">
                    <?= esc($headlineNews) ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- ------------------------------------------------------------------
         KEY STATS + OWNERSHIP / INSIDER SNAPSHOT (Finviz-style “Index” block)
    ------------------------------------------------------------------- -->
    <div class="row mb-3">
        <!-- Key / Valuation stats -->
        <div class="col-md-8 mb-3">
            <div class="card card-bordered trade-alert-card">
                <div class="bg-primary card-header text-white">
                    Key Metrics & Performance
                </div>
                <div class="card-body">
                    <?php if (!empty($keyStats) || !empty($performanceStats) || !empty($valuationStats)): ?>
                        <div class="stats-grid">
                            <?php foreach ($keyStats as $stat): ?>
                                <div>
                                    <div class="stats-item-label"><?= esc(vv($stat, 'label')) ?></div>
                                    <div class="stats-item-value"><?= esc(vv($stat, 'value')) ?></div>
                                </div>
                            <?php endforeach; ?>

                            <?php foreach ($performanceStats as $stat): ?>
                                <div>
                                    <div class="stats-item-label"><?= esc(vv($stat, 'label')) ?></div>
                                    <div class="stats-item-value"><?= esc(vv($stat, 'value')) ?></div>
                                </div>
                            <?php endforeach; ?>

                            <?php foreach ($valuationStats as $stat): ?>
                                <div>
                                    <div class="stats-item-label"><?= esc(vv($stat, 'label')) ?></div>
                                    <div class="stats-item-value"><?= esc(vv($stat, 'value')) ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-muted mb-0">
                            Key valuation and performance metrics will appear here once wired
                            from the AlertsModel/AlphaVantage fundamentals.
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Ownership + Insider snapshot -->
        <div class="col-md-4 mb-3">
            <div class="card card-bordered trade-alert-card mb-3">
                <div class="bg-primary card-header text-white">
                    Institutional Ownership
                </div>
                <div class="card-body small-card-body-text">
                    <?php if (!empty($ownershipTopHolders)): ?>
                        <ul class="list-unstyled mb-0">
                            <?php foreach ($ownershipTopHolders as $holder): ?>
                                <li>
                                    <strong><?= esc(vv($holder, 'name')) ?></strong>
                                    — <?= esc(vv($holder, 'percent')) ?>%
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="text-muted mb-0">
                            Top institutional holders will be displayed here.
                        </p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card card-bordered trade-alert-card">
                <div class="bg-primary card-header text-white">
                    Insider Activity (Snapshot)
                </div>
                <div class="card-body small-card-body-text">
                    <?php if (!empty($insiderTrades)): ?>
                        <ul class="list-unstyled mb-0">
                            <?php
                            $insiderPreview = array_slice($insiderTrades, 0, 3);
                            foreach ($insiderPreview as $it):
                            ?>
                                <li>
                                    <strong><?= esc(vv($it, 'insider_name')) ?></strong>
                                    — <?= esc(vv($it, 'relationship')) ?> —
                                    <?= esc(vv($it, 'transaction_type')) ?>  
                                    at <?= esc(vv($it, 'price')) ?>  
                                    on <?= esc(vv($it, 'date')) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="text-muted mb-0">
                            Recent insider trades will be summarized here.
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- ------------------------------------------------------------------
         TRADINGVIEW PROFILE + CHART TABS
    ------------------------------------------------------------------- -->
    <div class="row px-3 my-3">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Technical Overview & Company Profile</h5>

            <!-- Finviz-like tab strip (visual only; TV widget handles intervals internally) -->
            <div class="chart-interval-tabs" id="chartIntervalTabs">
                <span class="tab-pill active" data-interval="ideas">Draw</span>
                <span class="tab-pill" data-interval="ideas">Ideas</span>
                <span class="tab-pill" data-interval="1">Intraday</span>
                <span class="tab-pill" data-interval="D">Daily</span>
                <span class="tab-pill" data-interval="W">Weekly</span>
                <span class="tab-pill" data-interval="M">Monthly</span>
            </div>
        </div>
    </div>

    <div class="row px-3 my-3">
        <div class="col-12 col-md-3">
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <div class="tradingview-widget-copyright">
                    <a href="<?= 'https://www.tradingview.com/symbols/' . urlencode($tvExch) . '-' . urlencode($tvTicker) . '/' ?>"
                       rel="noopener nofollow"
                       target="_blank">
                        <span class="blue-text">Track <?= esc($ticker) ?> markets on TradingView</span>
                    </a>
                </div>
                <script
                    src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js"
                    async
                    type="text/javascript"
                    <?= $nonce['script'] ?? '' ?>
                >{
                    "interval": "1m",
                    "width": "100%",
                    "isTransparent": false,
                    "height": "100%",
                    "symbol": "<?= $tvExch . ':' . $tvTicker ?>",
                    "showIntervalTabs": true,
                    "displayMode": "single",
                    "locale": "en",
                    "colorTheme": "light"
                }</script>
            </div>
        </div>

        <div class="col-12 col-md-9">
            <div class="tradingview-widget-container">
                <div id="tv-company-profile"></div>
            </div>
        </div>
    </div>

    <hr class="mb-3">

    <!-- ------------------------------------------------------------------
         SYMBOL PROFILE + FINANCIALS (TradingView)
    ------------------------------------------------------------------- -->
    <div class="row px-3 my-3" style="height:600px!important">
        <div class="col-12 col-md-3">
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <div class="tradingview-widget-copyright">
                    <a href="https://www.tradingview.com/"
                       rel="noopener nofollow"
                       target="_blank">
                        <span class="blue-text">Track all markets on TradingView</span>
                    </a>
                </div>
                <script
                    src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-profile.js"
                    async
                    type="text/javascript"
                    <?= $nonce['script'] ?? '' ?>
                >{
                    "width": "100%",
                    "height": "100%",
                    "isTransparent": false,
                    "colorTheme": "light",
                    "symbol": "<?= $tvExch . ':' . $tvTicker ?>",
                    "locale": "en"
                }</script>
            </div>
        </div>

        <div class="col-12 col-md-9">
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <div class="tradingview-widget-copyright">
                    <a href="https://www.tradingview.com/"
                       rel="noopener nofollow"
                       target="_blank">
                        <span class="blue-text">Track all markets on TradingView</span>
                    </a>
                </div>
                <script
                    src="https://s3.tradingview.com/external-embedding/embed-widget-financials.js"
                    async
                    type="text/javascript"
                    <?= $nonce['script'] ?? '' ?>
                >{
                    "width": "100%",
                    "height": "100%",
                    "isTransparent": false,
                    "colorTheme": "light",
                    "symbol": "<?= vupper(vv($tradeAlert ?? $alert ?? [], 'exchange', $exchange)) ?>:<?= vupper(vv($tradeAlert ?? $alert ?? [], 'ticker', $ticker)) ?>",
                    "locale": "en"
                }</script>
            </div>
        </div>
    </div>

    <hr class="mb-3">

    <!-- ------------------------------------------------------------------
         LATEST NEWS (TradingView + MarketAux fallback)
    ------------------------------------------------------------------- -->
    <div class="row px-3 my-3" id="market-news-block">
        <div class="col-12">
            <h4>📰 Latest News Headlines</h4>
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget" id="tv-news-timeline"></div>
                <script
                    src="https://s3.tradingview.com/external-embedding/embed-widget-timeline.js"
                    async
                    type="text/javascript"
                    <?= $nonce['script'] ?? '' ?>
                >{
                    "feedMode": "symbol",
                    "symbol": "<?= $tvExch . ':' . $tvTicker ?>",
                    "height": 480,
                    "width": "100%",
                    "colorTheme": "light",
                    "isTransparent": false,
                    "displayMode": "regular",
                    "locale": "en"
                }</script>
            </div>
            <div class="row mt-3" id="marketaux-news-fallback"></div>
        </div>
    </div>

    <hr class="mb-3">

    <!-- ------------------------------------------------------------------
         COMMUNITY DISCUSSION
    ------------------------------------------------------------------- -->
    <div class="row px-3 my-3">
        <div class="col-12">
            <div class="card card-bordered">
                <div class="bg-primary card-header text-white">💬 Community Discussion</div>
                <div class="card-body">
                    <h5>Share Your Thoughts</h5>
                    <form id="comment-form">
                        <input name="ticker" type="hidden" value="<?= esc($ticker) ?>">
                        <input name="user_id" type="hidden" value="<?= $cuID ?: 'anon' ?>">
                        <input name="<?= csrf_token() ?>" type="hidden" value="<?= csrf_hash() ?>" id="csrf_token">
                        <textarea
                            class="form-control"
                            id="comment_text"
                            name="comment_text"
                            placeholder="Leave a comment..."
                            required
                            rows="3"
                        ></textarea>
                        <button class="btn btn-primary mt-2" type="submit">Post Comment</button>
                    </form>
                    <hr>
                    <h5>📢 Recent Comments</h5>
                    <div id="comment-section">
                        <?php if (!empty($comments)): ?>
                            <?php foreach ($comments as $comment): ?>
                                <div class="border comment-box mb-2 p-3 rounded">
                                    <strong>
                                        <?= $comment['user_id'] ? 'User' . esc($comment['user_id']) : esc($comment['anonymous_id']) ?>
                                    </strong>
                                    <p><?= esc($comment['comment_text']) ?></p>
                                    <small class="text-muted">
                                        <?= date('Y-m-d H:i', strtotime($comment['created_at'])) ?>
                                    </small>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No comments yet. Be the first to share your thoughts!</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="mb-3">

    <!-- ------------------------------------------------------------------
         PREMIUM TRADE ALERT ANALYSIS
    ------------------------------------------------------------------- -->
    <div class="mb-3 row px-3">
        <div class="col-12 col-md-4 text-left">
            <div class="card card-bordered trade-alert-card h-100">
                <div class="bg-primary card-header text-white">📊 Trade Alert Analysis</div>
                <div class="card-body">
                    <h5 class="text-primary"><?= esc($tvExch . ':' . $tvTicker) ?></h5>
                    <p><strong>Type:</strong> <?= esc(vv($tradeAlert, 'category', 'N/A')) ?></p>
                    <p><strong>Sentiment:</strong> <?= esc(ucfirst(vv($tradeAlert, 'market_sentiment', 'Neutral'))) ?></p>
                    <p><strong>Date:</strong>
                        <?php if ($d = vv($tradeAlert, 'alerted_on')): ?>
                            <?= date('Y-m-d', strtotime($d)) ?>
                        <?php else: ?>
                            N/A
                        <?php endif; ?>
                    </p>
                    <h5 class="text-success">🔄 Live Stock Data</h5>
                    <p><strong>Current Price:</strong> $<?= esc($realTimeStockData['price'] ?? 'N/A') ?></p>
                    <p>
                        <strong>Change:</strong>
                        <?= esc($realTimeStockData['change'] ?? 'N/A') ?>
                        (<?= esc($realTimeStockData['changePercent'] ?? 'N/A') ?>)
                    </p>
                    <p>
                        <strong>Volume:</strong>
                        <?= number_format((float)($realTimeStockData['volume'] ?? 0)) ?>
                    </p>
                    <p>
                        <strong>High:</strong> $<?= esc($realTimeStockData['high'] ?? 'N/A') ?>
                        |
                        <strong>Low:</strong> $<?= esc($realTimeStockData['low'] ?? 'N/A') ?>
                    </p>

                    <?php if (!$isPremiumUser): ?>
                        <div class="blur-overlay">
                            <p>🔒 <a href="<?= site_url('/Memberships') ?>">Sign Up for Premium</a> to Unlock Full Details!</p>
                        </div>
                    <?php endif; ?>

                    <?php
                    $defaultChart = '/assets/images/Charts/' . $tvTicker . '_' . date('Y-m-d') . '.png';
                    $src          = vv($tradeAlert, 'tv_chart');
                    $chosen       = $src ?: $defaultChart;
                    $fsPath       = FCPATH . ltrim($chosen, '/');
                    if (!is_file($fsPath)) {
                        $chosen = '/assets/images/Charts/placeholder.png';
                    }
                    $svgFallback = "data:image/svg+xml;utf8," . rawurlencode(
                        '<svg xmlns="http://www.w3.org/2000/svg" width="800" height="450">
                            <rect width="100%" height="100%" fill="#1e1e1e"/>
                            <text x="50%" y="50%" fill="#888" font-size="24" text-anchor="middle" dominant-baseline="middle">
                                Chart will appear here
                            </text>
                        </svg>'
                    );
                    ?>
                    <img
                        alt="<?= esc($tvTicker) ?> Chart"
                        class="img-fluid<?= !$isPremiumUser ? ' blurred' : '' ?>"
                        onerror='this.onerror=null;this.src="<?= $svgFallback ?>"'
                        src="<?= esc($chosen) ?>"
                    >
                </div>
            </div>
        </div>

        <div class="col-12 col-md-8">
            <div class="card card-bordered trade-alert-card h-100">
                <div class="bg-primary card-header text-white">📊 Most Recent Trade Analysis</div>
                <div class="card-body">
                    <?php if ($hasAlert && $isPremiumUser): ?>
                        <table class="table table-bordered" id="trade-alert-table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Alert Type</th>
                                    <th>Price</th>
                                    <th>Market Sentiment</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php if ($d = vv($tradeAlert, 'alerted_on')): ?>
                                            <?= date('Y-m-d', strtotime($d)) ?>
                                        <?php else: ?>
                                            N/A
                                        <?php endif; ?>
                                    </td>
                                    <td><?= esc(vv($tradeAlert, 'category', 'N/A')) ?></td>
                                    <td>
                                        <?php if ($p = vv($tradeAlert, 'price')): ?>
                                            $<?= number_format((float)$p, 2) ?>
                                        <?php else: ?>
                                            N/A
                                        <?php endif; ?>
                                    </td>
                                    <td><?= esc(ucfirst(vv($tradeAlert, 'market_sentiment', 'Neutral'))) ?></td>
                                    <td><?= esc(vv($tradeAlert, 'details', '—')) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <div class="position-relative">
                            <table class="table table-bordered" id="trade-alert-table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Alert Type</th>
                                        <th>Price</th>
                                        <th>Market Sentiment</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <div class="blur-overlay">
                                <p>
                                    <?= $hasAlert
                                        ? '🔒 <a href="' . site_url('/Memberships') . '">Sign Up for Premium</a> to unlock this alert.'
                                        : 'No alert on record yet. <a href="' . site_url('/register') . '">Create a free account</a> to follow ' . esc($tvTicker) . '.' ?>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- ------------------------------------------------------------------
         RECENT SEC FILINGS
    ------------------------------------------------------------------- -->
    <div class="mb-3 row px-3" id="sec-filings-block">
        <div class="col-12 col-md-12">
            <div class="card card-bordered trade-alert-card h-100">
                <div class="bg-primary card-header text-white">📑 Recent SEC Filings</div>
                <div class="card-body">
                    <?php if ($isPremiumUser): ?>
                        <table class="table table-bordered display" id="sec-filing-table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Form Type</th>
                                    <th>Document</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($secFilings as $filing): ?>
                                    <tr>
                                        <td><?= date('Y-m-d', strtotime($filing['filing_date'])) ?></td>
                                        <td><?= esc($filing['form_type']) ?></td>
                                        <td>
                                            <a href="<?= esc($filing['document_url']) ?>"
                                               rel="noopener"
                                               target="_blank">
                                                📄 View Filing
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <table class="table table-bordered display" id="sec-filing-table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Form Type</th>
                                    <th>Document</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <div class="blur-overlay">
                            <p>🔒 <a href="<?= site_url('/Memberships') ?>">Sign Up for Premium</a> to Unlock SEC Filings!</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <hr class="mb-3">

    <!-- ------------------------------------------------------------------
         RELATED TRADE ALERTS
    ------------------------------------------------------------------- -->
    <div class="row px-3 my-3">
        <div class="col-12">
            <h3 class="text-center">📢 Related Trade Alerts</h3>
        </div>

        <?php $relatedAlerts = array_slice($recentTradeAlerts, 0, 4); ?>
        <?php foreach ($relatedAlerts as $alert): ?>
            <?php
            $maskedTicker   = $alert['ticker'] ?? '';
            $maskedExchange = $alert['exchange'] ?? '';
            $maskedPrice    = isset($alert['price']) ? number_format((float)$alert['price'], 2) : 'N/A';

            if (!$isPremiumUser) {
                $len           = strlen((string)$maskedTicker);
                $maskedTicker  = $len >= 5 ? 'XXXX' : 'XXX';
                $maskedExchange= 'LOCKED';
                $maskedPrice   = '🔒';
            }
            ?>
            <div class="col-md-3">
                <div class="card card-bordered trade-alert-card">
                    <div class="bg-primary card-header text-white">
                        <?= esc(vupper($maskedTicker)) ?> - <?= esc($alert['category'] ?? 'Trade Alert') ?>
                    </div>
                    <div class="card-body">
                        <p><strong>Exchange:</strong> <?= esc($maskedExchange) ?></p>
                        <p><strong>Price:</strong> <?= $isPremiumUser ? '$' . esc($maskedPrice) : esc($maskedPrice) ?></p>
                        <p>
                            <strong>Sentiment:</strong>
                            <?= esc(isset($alert['market_sentiment']) ? ucfirst($alert['market_sentiment']) : 'Neutral') ?>
                        </p>
                        <?php if (!$isPremiumUser): ?>
                            <div class="blur-overlay">
                                <p>🔒 <a href="<?= site_url('/Memberships') ?>">Sign Up for Premium</a> to Unlock Details!</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <hr class="mb-3">

    <!-- ------------------------------------------------------------------
         PROMO CARDS
    ------------------------------------------------------------------- -->
    <div class="mb-3 row px-3">
        <div class="col-md-6">
            <div class="promotion-card">
                <h3>🚀 Register for MyMI Wallet Today!</h3>
                <p>Gain access to comprehensive tools and insights to manage your finances effectively.</p>
                <a href="<?= site_url('/register') ?>" class="btn btn-primary">Register Now</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="promotion-card">
                <h3>💰 Special Promotions</h3>
                <p>Explore our latest offers to achieve your financial goals.</p>
                <a href="<?= site_url('/Promotions') ?>" class="btn btn-success">Save More!</a>
            </div>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
function ensureSafeFetchJson() {
    if (typeof window.safeFetchJson === 'function') {
        return window.safeFetchJson;
    }

    window.safeFetchJson = async function(url, options = {}) {
        const requestOptions = { ...options };
        if (!requestOptions.credentials) {
            requestOptions.credentials = 'same-origin';
        }

        const response = await fetch(url, requestOptions);
        const preview = async () => {
            const clone = response.clone();
            const text  = await clone.text();
            return text.slice(0, 200).trim();
        };

        if (!response.ok) {
            const snippet = await preview();
            if (snippet.startsWith('<')) {
                throw new Error(`Unexpected HTML from ${url}: maybe 404/500/login?`);
            }
            throw new Error(`HTTP ${response.status} from ${url}: ${snippet}`);
        }

        const contentType = response.headers.get('content-type') || '';
        if (!contentType.includes('application/json')) {
            const snippet = await preview();
            if (snippet.startsWith('<')) {
                throw new Error(`Non-JSON (HTML) response from ${url}: ${snippet}`);
            }
            throw new Error(`Non-JSON response from ${url}: ${contentType} => ${snippet}`);
        }

        return response.json();
    };

    return window.safeFetchJson;
}

const safeFetchJson = ensureSafeFetchJson();

document.addEventListener("DOMContentLoaded", function () {
    // ✅ Safely init TradingView widget (tv.js may load after DOM)
    function initTVWidget() {
        if (!window.TradingView) return setTimeout(initTVWidget, 50);
        const containerId = "tv-company-profile";
        const el = document.getElementById(containerId);
        if (!el) return;

        try {
            new TradingView.widget({
                container_id: containerId,
                symbol: "<?= $tvSymbol ?>",
                width: "100%",
                height: 550,
                colorTheme: "light",
                isTransparent: false,
                locale: "en"
            });
        } catch (e) {
            console.error("Failed to init TradingView widget:", e);
        }
    }
    initTVWidget();

    // Interval pill UI (visual highlight only; TV widget has its own tabs)
    const tabs = document.querySelectorAll('#chartIntervalTabs .tab-pill');
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
        });
    });

    // ✅ Initialize DataTables (only if present)
    if (window.jQuery && $.fn && $.fn.DataTable) {
        $("#sec-filing-table").DataTable({ paging: true, searching: true, order: [[0, "desc"]] });
        $("#trade-alert-table").DataTable({ paging: true, searching: true, order: [[0, "desc"]] });
    }

    // ✅ Comment Form Submission
    const commentForm = document.getElementById("comment-form");
    if (commentForm) {
        commentForm.addEventListener("submit", function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            formData.append("csrf_test_name", document.getElementById("csrf_token").value);

            safeFetchJson("<?= site_url('/API/Users/Comments/Add') ?>", {
                method: "POST",
                headers: { "X-Requested-With": "XMLHttpRequest" },
                body: formData
            })
            .then(data => {
                if (data.success) {
                    const list = document.getElementById("comment-section");
                    document.getElementById("comment_text").value = "";
                    document.getElementById("csrf_token").value = data.csrf_token;
                    const div = document.createElement("div");
                    div.className = "border comment-box mb-2 p-3 rounded";
                    div.innerHTML = `<strong>User${data.user_id}</strong><p>${data.comment}</p><small class="text-muted">${data.created_at}</small>`;
                    list.appendChild(div);
                }
            })
            .catch(err => {
                console.error("Comment submission failed:", err);
                const result = document.getElementById("comment-error") || document.createElement("div");
                result.id = "comment-error";
                result.className = "alert alert-danger mt-3";
                result.textContent = err.message;
                commentForm.appendChild(result);
            });
        });
    }
});
</script>

<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener("DOMContentLoaded", function () {
    const tvNewsBlock       = document.querySelector("#tv-news-timeline");
    const fallbackNewsBlock = document.querySelector("#marketaux-news-fallback");

    if (tvNewsBlock && fallbackNewsBlock) {
        tvNewsBlock.style.display       = "block";
        fallbackNewsBlock.style.display = "none";

        setTimeout(() => {
            const looksEmpty = !tvNewsBlock.textContent || tvNewsBlock.textContent.trim().length === 0;

            if (looksEmpty) {
                tvNewsBlock.style.display       = "none";
                fallbackNewsBlock.style.display = "block";

                safeFetchJson("<?= site_url('/API/Alerts/fetchMarketAuxNews/' . $ticker) ?>")
                    .then(data => {
                        if (data.status === 'success' && Array.isArray(data.news) && data.news.length) {
                            const newsHTML = data.news.map(item => `
                                <div class="col-md-4">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h6 class="card-title">${item.title}</h6>
                                            <p class="card-text">${item.summary}</p>
                                            <a href="${item.url}" target="_blank" rel="noopener" class="btn btn-sm btn-primary">Read More</a>
                                            <small class="text-muted d-block mt-2">${item.published_at}</small>
                                        </div>
                                    </div>
                                </div>
                            `).join('');
                            fallbackNewsBlock.innerHTML = newsHTML;
                        } else {
                            fallbackNewsBlock.innerHTML = `
                                <div class="col-12 alert alert-warning">
                                    No news available for this symbol.
                                </div>`;
                        }
                    })
                    .catch(err => {
                        console.error("❌ MarketAux fetch failed", err);
                        fallbackNewsBlock.innerHTML = `
                            <div class="col-12 alert alert-danger">
                                ${err.message}
                            </div>`;
                    });
            }
        }, 3000);
    }
});
</script>
