<?php // app/Views/themes/public/previewAlert.php ?>

<?php
$nonce = $nonce ?? ['style' => '', 'script' => ''];

/**
 * Null-tolerant helpers for this view (guard against PHP 8.2 deprecations)
 */
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

// ✅ Define all variables with sane defaults to avoid notices
$tradeAlert         = isset($tradeAlert) && is_array($tradeAlert) ? $tradeAlert : null; // array|null
$recentTradeAlerts  = is_array($recentTradeAlerts ?? null) ? $recentTradeAlerts : [];
$ticker             = vupper($ticker ?? ($tradeAlert['ticker'] ?? ''));
$exchange           = vupper($exchange ?? ($tradeAlert['exchange'] ?? ''));
$tvSymbol           = vupper($tvSymbol ?? ($exchange . ':' . $ticker));
$realTimeStockData  = is_array($realTimeStockData ?? null) ? $realTimeStockData : [];
$comments           = is_array($comments ?? null) ? $comments : [];
$secFilings         = is_array($secFilings ?? null) ? $secFilings : [];
$cuID               = $cuID ?? null;
$isPremiumUser      = (bool)($isPremiumUser ?? false);

$hasAlert = is_array($tradeAlert) && !empty($tradeAlert);

// Canonical strings for TradingView widgets:
$tvExch   = $hasAlert ? vupper(vv($tradeAlert, 'exchange', $exchange)) : $exchange;
$tvTicker = $hasAlert ? vupper(vv($tradeAlert, 'ticker',   $ticker))   : $ticker;

// Build symbols array for the tickers widget (related alerts)
$tradingViewSymbols = [];
foreach ($recentTradeAlerts as $ra) {
    $ex = vupper(vv($ra, 'exchange', 'NASDAQ'));
    $tk = vupper(vv($ra, 'ticker',   null));
    if ($tk) {
        $tradingViewSymbols[] = ['proName' => "{$ex}:{$tk}", 'title' => $tk];
    }
}
?>
<style <?= $nonce['style'] ?? '' ?>>
    .section-title { text-align: center; margin-bottom: 2rem; }
    .table-container { overflow-x: auto; }
    .promotion-card { background: #f9f9f9; border-radius: 10px; padding: 20px; margin-bottom: 20px; text-align: center; }
    .tradingview-widget-container { margin-bottom: 20px; }
    .trade-alert-card {
        background: #ffffff; border-radius: 8px; padding: 15px;
        box-shadow: 0px 4px 8px rgba(0,0,0,0.1); margin-bottom: 20px;
        text-align: center; position: relative;
    }
    .blur-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(255, 255, 255, 0.8); display: flex;
        align-items: center; justify-content: center;
        font-size: 18px; font-weight: bold; color: #333;
        text-align: center; border-radius: 8px;
    }
    .blur-overlay a { text-decoration: none; font-weight: bold; color: #007bff; }
    #marketaux-news-fallback { display: none; }
</style>

<!-- ✅ TradingView core library (needed for new TradingView.widget) -->
<script <?= $nonce['script'] ?? '' ?> src="https://s3.tradingview.com/tv.js" defer></script>

<!-- TradingView Widget BEGIN: Tickers strip -->
<div class="tradingview-widget-container d-none d-md-block mt-4 pt-1">
    <div class="tradingview-widget-container__widget"></div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-tickers.js" async <?= $nonce['script'] ?? '' ?>>
    {
        "symbols": [
            <?php foreach ($tradingViewSymbols as $i => $s): ?>
            {"proName": "<?= $s['proName'] ?>", "title": "<?= $s['title'] ?>"}<?= $i < count($tradingViewSymbols) - 1 ? ',' : '' ?>
            <?php endforeach; ?>
        ],
        "isTransparent": false,
        "showSymbolLogo": true,
        "colorTheme": "dark",
        "locale": "en"
    }
    </script>
</div>
<!-- TradingView Widget END -->

<div class="container-fluid mt-3 px-3">
    <div class="row mb-3">
        <div class="col">
            <h1 class="text-center"><?= esc(vupper($tvTicker)) ?> Trade Alert Preview</h1>
        </div>
    </div>

    <!-- Primary Trading Widgets -->
    <div class="row my-3 px-3">
        <div class="col-12 col-md-3">
            <!-- TradingView Widget BEGIN: Technical Analysis -->
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <div class="tradingview-widget-copyright">
                    <a href="<?= 'https://www.tradingview.com/symbols/' . urlencode($tvExch) . '-' . urlencode($tvTicker) . '/' ?>"
                       rel="noopener nofollow" target="_blank">
                        <span class="blue-text">Track <?= esc($ticker) ?> markets on TradingView</span>
                    </a>
                </div>
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async <?= $nonce['script'] ?? '' ?>>
                {
                    "interval": "1m",
                    "width": "100%",
                    "isTransparent": false,
                    "height": "100%",
                    "symbol": "<?= $tvExch . ':' . $tvTicker ?>",
                    "showIntervalTabs": true,
                    "displayMode": "single",
                    "locale": "en",
                    "colorTheme": "light"
                }
                </script>
            </div>
            <!-- TradingView Widget END -->
        </div>
        <div class="col-12 col-md-9">
            <div class="tradingview-widget-container">
                <div id="tv-company-profile"></div>
                <!-- ❌ Removed inline `new TradingView.widget(...)` here (we init safely at the bottom) -->
            </div>
        </div>
    </div>

    <hr class="mb-3">

    <div class="row my-3 px-3" style="height: 600px !important;">
        <!-- Symbol Profile Widget -->
        <div class="col-12 col-md-3">
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <div class="tradingview-widget-copyright">
                    <a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank">
                        <span class="blue-text">Track all markets on TradingView</span>
                    </a>
                </div>
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-profile.js" async <?= $nonce['script'] ?? '' ?>>
                {
                    "width": "100%",
                    "height": "100%",
                    "isTransparent": false,
                    "colorTheme": "light",
                    "symbol": "<?= $tvExch . ':' . $tvTicker ?>",
                    "locale": "en"
                }
                </script>
            </div>
        </div>
        <!-- Financials Widget -->
        <div class="col-12 col-md-9">
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <div class="tradingview-widget-copyright">
                    <a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank">
                        <span class="blue-text">Track all markets on TradingView</span>
                    </a>
                </div>
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-financials.js" async <?= $nonce['script'] ?? '' ?>>
                {
                    "width": "100%",
                    "height": "100%",
                    "isTransparent": false,
                    "colorTheme": "light",
                    "symbol": "<?= vupper(vv($tradeAlert ?? $alert ?? [], 'exchange', $exchange)) ?>:<?= vupper(vv($tradeAlert ?? $alert ?? [], 'ticker', $ticker)) ?>",
                    "locale": "en"
                }
                </script>
            </div>
        </div>
    </div>

    <hr class="mb-3">

    <!-- 📰 Market News: TV Timeline + Fallback -->
    <div class="row my-3 px-3" id="market-news-block">
        <div class="col-12">
            <h4>📰 Latest News Headlines</h4>

            <!-- TradingView Timeline (shows first; may be empty for some symbols) -->
            <div class="tradingview-widget-container">
                <div id="tv-news-timeline" class="tradingview-widget-container__widget"></div>
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-timeline.js" async <?= $nonce['script'] ?? '' ?>>
                {
                    "feedMode": "symbol",
                    "symbol": "<?= $tvExch . ':' . $tvTicker ?>",
                    "height": 480,
                    "width": "100%",
                    "colorTheme": "light",
                    "isTransparent": false,
                    "displayMode": "regular",
                    "locale": "en"
                }
                </script>
            </div>

            <!-- MarketAux Fallback Container -->
            <div id="marketaux-news-fallback" class="row mt-3"></div>
        </div>
    </div>

    <hr class="mb-3">

    <div class="row my-3 px-3">
        <div class="col-12">
            <div class="card card-bordered">
                <div class="card-header text-white bg-primary">💬 Community Discussion</div>
                <div class="card-body">
                    <h5>Share Your Thoughts</h5>
                    <form id="comment-form">
                        <input type="hidden" name="ticker" value="<?= esc($ticker) ?>">
                        <input type="hidden" name="user_id" value="<?= $cuID ?: 'anon' ?>">
                        <input type="hidden" id="csrf_token" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                        <textarea class="form-control" name="comment_text" id="comment_text" rows="3" placeholder="Leave a comment..." required></textarea>
                        <button type="submit" class="btn btn-primary mt-2">Post Comment</button>
                    </form>

                    <hr>

                    <h5>📢 Recent Comments</h5>
                    <div id="comment-section">
                        <?php if (!empty($comments)): ?>
                            <?php foreach ($comments as $comment): ?>
                                <div class="border comment-box mb-2 p-3 rounded">
                                    <strong><?= $comment['user_id'] ? 'User' . esc($comment['user_id']) : esc($comment['anonymous_id']) ?></strong>
                                    <p><?= esc($comment['comment_text']) ?></p>
                                    <small class="text-muted"><?= date('Y-m-d H:i', strtotime($comment['created_at'])) ?></small>
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

    <div class="row mb-3">
        <div class="col">
            <h1 class="text-center">Gain Premium Access To More At MyMI Wallet!</h1>
        </div>
    </div>

    <!-- Trade Alert Table -->
    <div class="row mb-3 px-3">
        <div class="col-12 col-md-4 text-left">
            <div class="card card-bordered trade-alert-card h-100">
                <div class="card-header text-white bg-primary">📊 Trade Alert Analysis</div>
                <div class="card-body">
                    <h5 class="text-primary"><?= esc($tvExch . ':' . $tvTicker) ?></h5>
                    <p><strong>Type:</strong> <?= esc(vv($tradeAlert, 'category', 'N/A')) ?></p>
                    <p><strong>Sentiment:</strong> <?= esc(ucfirst(vv($tradeAlert, 'market_sentiment', 'Neutral'))) ?></p>
                    <p><strong>Date:</strong> <?= ($d = vv($tradeAlert, 'alerted_on')) ? date('Y-m-d', strtotime($d)) : 'N/A' ?></p>

                    <!-- ✅ Real-Time Stock Data from AlphaVantage -->
                    <h5 class="text-success">🔄 Live Stock Data</h5>
                    <p><strong>Current Price:</strong> $<?= esc($realTimeStockData['price'] ?? 'N/A') ?></p>
                    <p><strong>Change:</strong> <?= esc($realTimeStockData['change'] ?? 'N/A') ?> (<?= esc($realTimeStockData['changePercent'] ?? 'N/A') ?>)</p>
                    <p><strong>Volume:</strong> <?= number_format((float)($realTimeStockData['volume'] ?? 0)) ?></p>
                    <p><strong>High:</strong> $<?= esc($realTimeStockData['high'] ?? 'N/A') ?> | <strong>Low:</strong> $<?= esc($realTimeStockData['low'] ?? 'N/A') ?></p>

                    <?php if (!$isPremiumUser): ?>
                        <div class="blur-overlay">
                            <p>🔒 <a href="<?= site_url('/Memberships') ?>">Sign Up for Premium</a> to Unlock Full Details!</p>
                        </div>
                    <?php endif; ?>

                    <?php
                    $defaultChart = '/assets/images/Charts/' . $tvTicker . '_' . date('Y-m-d') . '.png';
                    $src = vv($tradeAlert, 'tv_chart');
                    $chosen = $src ?: $defaultChart;

                    $fsPath = FCPATH . ltrim($chosen, '/');
                    if (!is_file($fsPath)) {
                        $chosen = '/assets/images/Charts/placeholder.png'; // make sure this exists
                    }
                    $svgFallback = "data:image/svg+xml;utf8," . rawurlencode('<svg xmlns="http://www.w3.org/2000/svg" width="800" height="450"><rect width="100%" height="100%" fill="#1e1e1e"/><text x="50%" y="50%" fill="#888" font-size="24" text-anchor="middle" dominant-baseline="middle">Chart will appear here</text></svg>');
                    ?>
                    <img src="<?= esc($chosen) ?>"
                         alt="<?= esc($tvTicker) ?> Chart"
                         class="img-fluid <?= !$isPremiumUser ? 'blurred' : '' ?>"
                         onerror="this.onerror=null;this.src='<?= $svgFallback ?>';">
                </div>
            </div>
        </div>

        <div class="col-12 col-md-8">
            <div class="card card-bordered trade-alert-card h-100">
                <div class="card-header text-white bg-primary">📊 Most Recent Trade Analysis</div>
                <div class="card-body">
                <?php if ($hasAlert && $isPremiumUser): ?>
                    <table class="table table-bordered" id="trade-alert-table">
                        <thead>
                            <tr><th>Date</th><th>Alert Type</th><th>Price</th><th>Market Sentiment</th><th>Details</th></tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= ($d = vv($tradeAlert, 'alerted_on')) ? date('Y-m-d', strtotime($d)) : 'N/A' ?></td>
                                <td><?= esc(vv($tradeAlert, 'category', 'N/A')) ?></td>
                                <td><?= ($p = vv($tradeAlert, 'price')) ? ('$' . number_format((float)$p, 2)) : 'N/A' ?></td>
                                <td><?= esc(ucfirst(vv($tradeAlert, 'market_sentiment', 'Neutral'))) ?></td>
                                <td><?= esc(vv($tradeAlert, 'details', '—')) ?></td>
                            </tr>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="position-relative">
                        <table class="table table-bordered" id="trade-alert-table">
                            <thead>
                                <tr><th>Date</th><th>Alert Type</th><th>Price</th><th>Market Sentiment</th><th>Details</th></tr>
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

    <div class="row mb-3 px-3">
        <div class="col-12 col-md-12">
            <div class="card card-bordered trade-alert-card h-100">
                <div class="card-header text-white bg-primary">📑 Recent SEC Filings</div>
                <div class="card-body">
                    <?php if ($isPremiumUser): ?>
                        <table class="table table-bordered display" id="sec-filing-table">
                            <thead>
                                <tr><th>Date</th><th>Form Type</th><th>Document</th></tr>
                            </thead>
                            <tbody>
                                <?php foreach ($secFilings as $filing): ?>
                                    <tr>
                                        <td><?= date('Y-m-d', strtotime($filing['filing_date'])) ?></td>
                                        <td><?= esc($filing['form_type']) ?></td>
                                        <td><a href="<?= esc($filing['document_url']) ?>" target="_blank" rel="noopener">📄 View Filing</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <table class="table table-bordered display" id="sec-filing-table">
                            <thead>
                                <tr><th>Date</th><th>Form Type</th><th>Document</th></tr>
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

    <!-- ✅ Related Trade Alerts Section -->
    <div class="row my-3 px-3">
        <div class="col-12">
            <h3 class="text-center">📢 Related Trade Alerts</h3>
        </div>

        <?php $relatedAlerts = array_slice($recentTradeAlerts, 0, 4); ?>
        <?php foreach ($relatedAlerts as $alert): ?>
            <?php
                // Mask values if user is not premium
                $maskedTicker   = $alert['ticker'] ?? '';
                $maskedExchange = $alert['exchange'] ?? '';
                $maskedPrice    = isset($alert['price']) ? number_format((float)$alert['price'], 2) : 'N/A';

                if (!$isPremiumUser) {
                    $len            = strlen((string)$maskedTicker);
                    $maskedTicker   = $len >= 5 ? 'XXXX' : 'XXX';
                    $maskedExchange = 'LOCKED';
                    $maskedPrice    = '🔒';
                }
            ?>
            <div class="col-md-3">
                <div class="card card-bordered trade-alert-card">
                    <div class="card-header text-white bg-primary">
                        <?= esc(vupper($maskedTicker)) ?> - <?= esc($alert['category'] ?? 'Trade Alert') ?>
                    </div>
                    <div class="card-body">
                        <p><strong>Exchange:</strong> <?= esc($maskedExchange) ?></p>
                        <p><strong>Price:</strong> <?= $isPremiumUser ? '$' . esc($maskedPrice) : esc($maskedPrice) ?></p>
                        <p><strong>Sentiment:</strong> <?= esc(isset($alert['market_sentiment']) ? ucfirst($alert['market_sentiment']) : 'Neutral') ?></p>

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

    <!-- Promotional Section -->
    <div class="row mb-3 px-3">
        <div class="col-md-6">
            <div class="promotion-card">
                <h3>🚀 Register for MyMI Wallet Today!</h3>
                <p>Gain access to comprehensive tools and insights to manage your finances effectively.</p>
                <a class="btn btn-primary" href="<?= site_url('/register') ?>">Register Now</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="promotion-card">
                <h3>💰 Special Promotions</h3>
                <p>Explore our latest offers to achieve your financial goals.</p>
                <a class="btn btn-success" href="<?= site_url('/Promotions') ?>">Save More!</a>
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
            const text = await clone.text();
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
        if (!el) return; // container missing

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
    const tvNewsBlock = document.querySelector("#tv-news-timeline");
    const fallbackNewsBlock = document.querySelector("#marketaux-news-fallback");

    if (tvNewsBlock && fallbackNewsBlock) {
        // Show TV widget by default
        tvNewsBlock.style.display = "block";
        fallbackNewsBlock.style.display = "none";

        // After delay, if TV widget appears empty, show fallback
        setTimeout(() => {
            const looksEmpty = !tvNewsBlock.textContent || tvNewsBlock.textContent.trim().length === 0;

            if (looksEmpty) {
                tvNewsBlock.style.display = "none";
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
                            fallbackNewsBlock.innerHTML = `<div class="col-12 alert alert-warning">No news available for this symbol.</div>`;
                        }
                    })
                    .catch(err => {
                        console.error("❌ MarketAux fetch failed", err);
                        fallbackNewsBlock.innerHTML = `<div class="col-12 alert alert-danger">${err.message}</div>`;
                    });
            }
        }, 3000);
    }
});
</script>
