<?php
// app/Modules/Management/Views/Alerts/modals/createTradeAlert.php
use CodeIgniter\HTTP\URI;
use Config\Services;

$autoAnalysisSummarize = $autoAnalysisSummarize ?? 0;

$log = Services::logger();
$errorClass = empty($errorClass) ? ' error' : $errorClass;
$controlClass = empty($controlClass) ? 'span6' : $controlClass;

$log->info('Current URL: ' . current_url());
$tradeAlertID = $alert['id'] ?? null;
$addModalTitle = $tradeAlertID ? "Edit Trade Alert - {$alert['ticker']}" : "Create Trade Alert";

// Fetch chart override values
$chartType = $alert['tv_chart_type'] ?? "";
$chartData = $alert['tv_chart'] ?? "";
// log_message('info', 'Management/Alerts/modals/createTradeAlert L17: $alert Array: ' . (print_r($alert,true)));
if (!isset($alert)) {
    $alert = [];
}
$targetPrice = isset($alert['target_price']) && is_numeric($alert['target_price']) 
    ? number_format((float) $alert['target_price'], 2) 
    : '—';

$lockedProfitStop = isset($alert['locked_profit_stop']) && is_numeric($alert['locked_profit_stop']) 
    ? number_format((float) $alert['locked_profit_stop'], 2) 
    : '—';

/**
 * Dynamic Field Configuration
 * Map category => required and optional fields
 */
$fieldMap = [
    'Pending Entry' => [
        'required' => ['ticker', 'exchange', 'entry_price', 'stop_loss'],
        'optional' => ['target_price', 'company', 'financial_news']
    ],
    'Price Target' => [
        'required' => ['ticker', 'exchange', 'target_price'],
        'optional' => ['entry_price', 'stop_loss', 'financial_news']
    ],
    'Active Buy Alert' => [
        'required' => ['ticker', 'exchange', 'entry_price', 'target_price', 'stop_loss'],
        'optional' => ['trailing_stop_percent', 'market_sentiment', 'trade_description']
    ],
    'Active Sell Alert' => [
        'required' => ['ticker', 'exchange', 'entry_price', 'target_price'],
        'optional' => ['stop_loss', 'market_sentiment']
    ],
    'Breakout Alert' => [
        'required' => ['ticker', 'exchange', 'entry_price'],
        'optional' => ['target_price', 'stop_loss']
    ],
    'Liquidity Stocks' => [
        'required' => ['ticker', 'exchange'],
        'optional' => ['entry_price', 'volume']
    ],
    'Momentum Trade' => [
        'required' => ['ticker', 'exchange', 'entry_price'],
        'optional' => ['target_price', 'market_sentiment']
    ],
    'Option - Call Buy' => [
        'required' => ['ticker', 'exchange', 'entry_price', 'target_price'],
        'optional' => ['stop_loss', 'financial_news']
    ],
    'Option - Call Sell' => [
        'required' => ['ticker', 'exchange', 'entry_price'],
        'optional' => ['stop_loss']
    ],
    'Option - Put Buy' => [
        'required' => ['ticker', 'exchange', 'entry_price', 'target_price'],
        'optional' => ['stop_loss']
    ],
    'Option - Put Sell' => [
        'required' => ['ticker', 'exchange', 'entry_price'],
        'optional' => ['stop_loss']
    ],
    'Penny Stocks' => [
        'required' => ['ticker', 'exchange', 'entry_price'],
        'optional' => ['target_price', 'market_cap']
    ],
];

// Fallback default if category not matched
$defaultFields = [
    'required' => ['ticker', 'exchange'],
    'optional' => []
];

$alert = array_merge([
    'ticker' => '',
    'price' => '',
    'strategy' => '',
    'note' => '',
    'chart_link' => '',
    'analysis_summary' => '',
    'trade_description' => '',
    'financial_news' => '',
], $alert);
$fieldData = [
    'errorClass'         => $errorClass,
    'controlClass'       => $controlClass,
    'tradeAlertID'       => $tradeAlertID,
    'alert'              => $alert ?? [],
];
?>
<div class="modal-header">
    <h3 class="modal-title"><?= $addModalTitle; ?></h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <form class="form-horizontal" id="createTradeAlertForm" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
        <input type="hidden" name="user_id" value="<?= $cuID ?? auth()->id() ?>">
        <input type="hidden" name="trade_id" value="<?= $tradeAlertID ?>">
        <input type="hidden" name="formMode" value="<?= $formMode ?? 'Add' ?>">
        <?php if(!empty($tradeAlertID)) : ?>
            <input type="hidden" name="formType" id="formType" value="Update">
        <?php else : ?>
            <input type="hidden" name="formType" value="Add">
        <?php endif; ?>

        <!-- Hidden Input for Market Session -->
        <input type="hidden" name="market_session" id="marketSession">

        <fieldset>
            <legend>Trade Alert Details</legend>

            <!-- ✅ Category Selection -->
            <div class="form-group">
                <label for="category">Category:</label>
                <select name="category" id="category" class="form-control" data-live-search="true">
                    <option value="Pending Entry" <?= ($alert['category'] ?? '') === 'Pending Entry' ? 'selected' : '' ?>>Pending Entry</option>
                    <option value="Price Target" <?= ($alert['category'] ?? '') === 'Price Target' ? 'selected' : '' ?>>Price Target</option>
                    <option value="Active Buy Alert" <?= ($alert['category'] ?? '') === 'Active Buy Alert' ? 'selected' : '' ?>>Active Buy Alert</option>
                    <option value="Active Sell Alert" <?= ($alert['category'] ?? '') === 'Active Sell Alert' ? 'selected' : '' ?>>Active Sell Alert</option>
                    <option value="Breakout Alert" <?= ($alert['category'] ?? '') === 'Breakout Alert' ? 'selected' : '' ?>>Breakout Alert</option>
                    <option value="Liquidity Stocks" <?= ($alert['category'] ?? '') === 'Liquidity Stocks' ? 'selected' : '' ?>>Liquidity Stocks</option>
                    <option value="Momentum Trade" <?= ($alert['category'] ?? '') === 'Momentum Trade' ? 'selected' : '' ?>>Momentum Trade</option>
                    <option value="Option - Call Buy" <?= ($alert['category'] ?? '') === 'Option - Call Buy' ? 'selected' : '' ?>>Option - Call Buy</option>
                    <option value="Option - Call Sell" <?= ($alert['category'] ?? '') === 'Option - Call Sell' ? 'selected' : '' ?>>Option - Call Sell</option>
                    <option value="Option - Put Buy" <?= ($alert['category'] ?? '') === 'Option - Put Buy' ? 'selected' : '' ?>>Option - Put Buy</option>
                    <option value="Option - Put Sell" <?= ($alert['category'] ?? '') === 'Option - Put Sell' ? 'selected' : '' ?>>Option - Put Sell</option>
                    <option value="Penny Stocks" <?= ($alert['category'] ?? '') === 'Penny Stocks' ? 'selected' : '' ?>>Penny Stocks</option>
                </select>
            </div>

            <!-- ✅ Exchange Selection -->
            <div class="form-group">
                <label for="exchange">Exchange:</label>
                <select name="exchange" id="exchange" class="form-control" data-live-search="true">
                    <option value="NASDAQ" <?= ($alert['exchange'] ?? '') === 'NASDAQ' ? 'selected' : '' ?>>NASDAQ</option>
                    <option value="NYSE" <?= ($alert['exchange'] ?? '') === 'NYSE' ? 'selected' : '' ?>>NYSE</option>
                    <option value="AMEX" <?= ($alert['exchange'] ?? '') === 'AMEX' ? 'selected' : '' ?>>AMEX</option>
                    <option value="OTC" <?= ($alert['exchange'] ?? '') === 'OTC' ? 'selected' : '' ?>>OTC</option>
                    <option value="LSE" <?= ($alert['exchange'] ?? '') === 'LSE' ? 'selected' : '' ?>>LSE</option>
                    <option value="TSX" <?= ($alert['exchange'] ?? '') === 'TSX' ? 'selected' : '' ?>>TSX</option>
                    <option value="ASX" <?= ($alert['exchange'] ?? '') === 'ASX' ? 'selected' : '' ?>>ASX</option>
                    <option value="SKILLING" <?= ($alert['exchange'] ?? '') === 'SKILLING' ? 'selected' : '' ?>>SKILLING</option>
                </select>
            </div>

            <!-- ✅ Symbol with Inline TradingView & ThinkorSwim Buttons -->
            <div class="form-group">
                <label for="ticker">Symbol:</label>
                <div class="input-group">
                    <input type="text" name="ticker" id="ticker" class="form-control" value="<?= $alert['ticker'] ?? '' ?>">
                    <div class="input-group-append" id="symbolActionButtons" style="display: none;">
                        <!-- 🔍 TradingView -->
                        <a id="tradingViewLink" href="#" target="_blank" class="btn btn-outline-secondary" title="View on TradingView">
                            <em class="icon ni ni-search"></em>
                        </a>

                        <!-- 💼 ThinkorSwim -->
                        <a id="thinkorSwimLink" href="#" target="_blank" class="btn btn-outline-success" title="Open in ThinkorSwim">
                            <em class="icon ni ni-briefcase"></em>
                        </a>

                        <!-- ➕ Add Chart
                        <a id="addChartBtn" class="dynamicModalLoader btn btn-outline-warning" data-formtype="Alerts" data-endpoint="addChart" data-accountid="<?= $alert['id'] ?? '' ?>" title="Add Chart">
                            <em class="icon ni ni-plus"></em>
                        </a> -->
                    </div>
                </div>
            </div>

            <!-- ✅ Company Name -->
            <div class="form-group">
                <label for="company">Company:</label>
                <input type="text" name="company" id="company" class="form-control" value="<?= $alert['company'] ?? '' ?>" placeholder="Enter company name">
            </div>

            <div class="form-group text-right">
                <button type="button" id="fetchAlphaMetricsBtn" class="btn btn-outline-info btn-sm" title="Auto-Fill Using AlphaVantage">
                    <em class="icon ni ni-bulb-fill"></em> Auto-Fill Metrics
                </button>
            </div>

            <!-- ✅ Price -->
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" class="form-control" value="<?= $alert['price'] ?? '' ?>" step="0.01">
            </div>

            <!-- ✅ Target Price -->
            <div class="form-group">
                <label for="target_price">Target Price:</label>
                <input type="number" name="target_price" id="target_price" class="form-control" value="<?= $alert['potential_price'] ?? '' ?>" step="0.01">
            </div>

            <!-- ✅ Entry Price -->
            <div class="form-group">
                <label for="entry_price">Entry Price:</label>
                <input type="number" name="entry_price" id="entry_price" class="form-control" value="<?= $alert['max_entry'] ?? '' ?>" step="0.01">
            </div>

            <!-- ✅ Stop Loss -->
            <div class="form-group">
                <label for="stop_loss">Stop Loss:</label>
                <input type="number" name="stop_loss" id="stop_loss" class="form-control" value="<?= $alert['stop_loss'] ?? '' ?>" step="0.01">
            </div>

            <div class="form-group">
                <label>Profit Target (3% Gain):</label>
                <input name="target_price_display" value="<?= '$' . $targetPrice ?>" id="target_price_display" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label>Locked-In Profit Stop:</label>
                <input name="locked_profit_stop_display" value="<?= '$' . $lockedProfitStop ?>" id="locked_profit_stop_display" class="form-control" readonly>
            </div>


            <div class="form-group">
                <label for="trailing_stop_percent">Trailing Stop % After Profit Lock:</label>
                <input type="number" name="trailing_stop_percent" id="trailing_stop_percent" class="form-control" step="0.1" value="1">
            </div>

            <div class="form-group">
                <label>📊 Profit Lock Strategy Summary:</label>
                <div id="dynamicTargetOutput" class="bg-light p-2 border rounded"></div>
            </div>

            <!-- ✅ Exchange Selection -->
            <div class="form-group">
                <label for="trade_type">Type of Trade:</label>
                <select name="trade_type" id="trade_type" class="form-control" data-live-search="true" required>
                    <option value="N/A">Select-A-Type</option>
                    <option value="Crypto" <?= ($alert['trade_type'] ?? '') === 'Crypto' ? 'selected' : '' ?>>Crypto</option>
                    <option value="Option" <?= ($alert['trade_type'] ?? '') === 'Option' ? 'selected' : '' ?>>Option</option>
                    <option value="Stock" <?= ($alert['trade_type'] ?? '') === 'Stock' ? 'selected' : '' ?>>Stock</option>
                </select>
            </div>

            <!-- ✅ Market Sentiment -->
            <div class="form-group">
                <label for="market_sentiment">Market Sentiment:</label>
                <select name="market_sentiment" class="form-control">
                    <option value="Bullish" <?= ($alert['market_sentiment'] ?? '') === 'Bullish' ? 'selected' : '' ?>>Bullish</option>
                    <option value="Bearish" <?= ($alert['market_sentiment'] ?? '') === 'Bearish' ? 'selected' : '' ?>>Bearish</option>
                    <option value="Neutral" <?= ($alert['market_sentiment'] ?? '') === 'Neutral' ? 'selected' : '' ?>>Neutral</option>
                </select>
            </div>

            <!-- ✅ Alert Priority -->
            <div class="form-group">
                <label for="alert_priority">Alert Priority:</label>
                <select name="alert_priority" class="form-control">
                    <option value="High" <?= ($alert['alert_priority'] ?? '') === 'High' ? 'selected' : '' ?>>High</option>
                    <option value="Medium" <?= ($alert['alert_priority'] ?? '') === 'Medium' ? 'selected' : '' ?>>Medium</option>
                    <option value="Low" <?= ($alert['alert_priority'] ?? '') === 'Low' ? 'selected' : '' ?>>Low</option>
                </select>
            </div>

            <!-- ✅ Trade Description -->
            <div class="form-group">
                <label for="trade_description">Trade Description:</label>
                <textarea name="trade_description" id="trade_description" class="form-control"><?= $alert['trade_description'] ?? '' ?></textarea>
            </div>

            <!-- ✅ Financial News -->
            <div class="form-group">
                <label for="financial_news">Financial News:</label>
                <textarea name="financial_news" id="financial_news" class="form-control"><?= $alert['financial_news'] ?? '' ?></textarea>
            </div>

            <!-- ✅ Analysis Summary -->
            <div class="form-group">
                <label for="analysis_summary">
                    Analysis Summary:
                    <button type="button" class="btn btn-sm btn-outline-primary ml-2" id="generateSummaryButton" title="Generate analysis summary from alert data">
                        <em class="icon ni ni-refresh"></em> Generate
                    </button>
                </label>
                <textarea name="analysis_summary" id="analysis_summary" class="form-control"><?= $alert['analysis_summary'] ?? '' ?></textarea>
            </div>


            <!-- ✅ Analysis Summary -->
            <div class="form-group">
                <label>Trade Summary:</label>
                <textarea id="gptTradeTemplate" class="form-control mt-2" rows="10" readonly></textarea>
                <input type="hidden" id="hiddenGPTTemplate" value="">
                <button type="button" class="btn btn-outline-dark btn-sm mt-1" onclick="copyGPTTemplate()">
                    <i class="icon ni ni-copy"></i>
                </button>
            </div>
        </fieldset>
        <hr>
        <fieldset>
            <legend>Chart Selection</legend>
            <div class="form-group">
                <label for="chartOption">Select Chart Type:</label>
                <select name="chart_type" id="chartOption" class="form-control">
                    <option value="url" <?= ($alert['tv_chart_type'] ?? '') === "url" ? "selected" : "" ?>>TradingView Image Link</option>
                    <option value="embed" <?= ($alert['tv_chart_type'] ?? '') === "embed" ? "selected" : "" ?>>TradingView Embed</option>
                    <option value="file" <?= ($alert['tv_chart_type'] ?? '') === "file" ? "selected" : "" ?>>Upload Image</option>
                </select>
            </div>
            <div class="form-group" id="chartUrlContainer">
                <label for="chartInput">Enter Chart URL or Embed Code:</label>
                <input type="text" name="chart_data" id="chartInput" class="form-control" value="<?= $alert['tv_chart'] ?? '' ?>">
            </div>
            <div class="form-group" id="chartFileContainer" style="display: none;">
                <label for="chartFile">Upload Chart Image:</label>
                <input type="file" name="chart_file" id="chartFile" class="form-control">
            </div>
        </fieldset>
        <hr>
        <fieldset>
            <!-- EMA Analysis -->
            <?php foreach ([5, 8, 13, 34, 48, 200] as $period): ?>
                <?php $key = 'ema_' . $period; ?>
                <?php if (isset($alert[$key])): ?>
                    <div class="form-group">
                        <label for="<?= $key ?>">EMA <?= $period ?>:</label>
                        <input type="text" class="form-control" name="<?= $key ?>" id="<?= $key ?>" 
                            value="<?= esc($alert[$key]) ?>" readonly />
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            <div class="form-group d-none" id="emaComparisonOutput">
                <label>📈 EMA Trend Comparisons:</label>
                <ul class="list-group" id="emaComparisonList"></ul>
            </div>

            <!-- All-Time High -->
            <div class="form-group">
                <label for="all_time_high">All-Time High:</label>
                <input type="text" name="all_time_high" id="all_time_high" class="form-control" readonly>
            </div>

            <!-- SMA Cross -->
            <div class="form-group">
                <label for="golden_cross_status">Golden/Death Cross:</label>
                <input type="text" name="golden_cross_status" id="golden_cross_status" class="form-control" readonly>
            </div>

        </fieldset>
    
        <fieldset>
            <legend>📊 Multi-Timeframe Technicals</legend>
            <div id="timeframeResultsContainer"></div>
        </fieldset>
        <div class="pricing-action mt-0">
            <input class="btn btn-primary btn-sm" type="submit" name="submit" id="submitTradeAlert" value="Submit Alert">
        </div>
    </form>
</div>
<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function () {
    let csrfToken = '<?= csrf_token() ?>';
    let csrfHash = '<?= csrf_hash() ?>';
    const autoAnalysisSummarize = <?= $autoAnalysisSummarize ?>;

    let symbolFilled = false;
    let companyFilled = false;
    let fetchTriggered = false;

    function updateCsrfToken(newToken, newHash) {
        csrfToken = newToken;
        csrfHash = newHash;
        $('input[name="<?= csrf_token() ?>"]').val(csrfHash);
    }

    // 🔁 Chart option toggle logic
    $("#chartOption").on("change", function () {
        let selectedOption = $(this).val();
        if (selectedOption === "file") {
            $("#chartFileContainer").show();
            $("#chartUrlContainer").hide();
        } else {
            $("#chartFileContainer").hide();
            $("#chartUrlContainer").show();
        }
    });

    // 📨 Submit trade alert via AJAX
    $("#createTradeAlertForm").on("submit", function (event) {
        event.preventDefault();

        let formData = new FormData(this);
        formData.append("trade_id", $('input[name="trade_id"]').val());
        formData.append("formType", $('input[name="formType"]').val());

        $.ajax({
            type: "POST",
            url: "<?= site_url('API/Alerts/addTradeAlert') ?>",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status && response.status.toLowerCase() === "success") {
                    alert("✅ Trade Alert successfully created!");
                    setTimeout(function () {
                        $("#createTradeAlertForm").closest(".modal").modal("hide");
                    }, 300);

                    if ($.fn.DataTable.isDataTable("#tradeAlertsTable")) {
                        $("#tradeAlertsTable").DataTable().ajax.reload(null, false);
                    } else {
                        $("#tradeAlertsTable").load("<?= site_url('Management/Alerts #tradeAlertsTable') ?>");
                    }
                } else {
                    alert("❌ Error: " + (response.message || "Unknown error occurred."));
                }
            },
            error: function (jqXHR) {
                alert("❌ Failed to submit trade alert. Check console for details.");
                console.error(jqXHR.responseText);
            }
        });
    });

    function tryAutoFetchFullMetrics() {
        const symbol = $('#ticker').val().trim().toUpperCase();
        const company = $('#company').val().trim();
        const exchange = $('#exchange').val().trim().toUpperCase();

        console.log('📡 Running tryAutoFetchFullMetrics', { symbol, company, exchange });

        if (!fetchTriggered && symbol && company) {
            fetchTriggered = true;

            $.ajax({
                url: "<?= site_url('API/Alerts/getFullMetrics') ?>",
                method: "POST",
                dataType: "json",
                data: {
                    symbol: symbol,
                    exchange: exchange,
                    [csrfToken]: csrfHash
                },
                success: function (res) {
                    console.log('✅ getFullMetrics response:', res);
                    // existing success handler...
                },
                error: function (xhr, status, error) {
                    console.error('❌ AJAX Error:', { xhr, status, error });
                }
            });
        }
    }

    $('#ticker').on('blur', function () {
        $(this).val($(this).val().toUpperCase());
        symbolFilled = $(this).val().length > 0;
        tryAutoFetchFullMetrics();
    });

    $('#company').on('blur', function () {
        companyFilled = $(this).val().length > 0;
        tryAutoFetchFullMetrics();
    });

    function renderEMAComparisons(ema) {
        const comparison = {
            'EMA 5 > EMA 8': (parseFloat(ema['EMA 5']) > parseFloat(ema['EMA 8'])) ? 'up' : 'down',
            'EMA 8 > EMA 13': (parseFloat(ema['EMA 8']) > parseFloat(ema['EMA 13'])) ? 'up' : 'down',
            'EMA 13 > EMA 34': (parseFloat(ema['EMA 13']) > parseFloat(ema['EMA 34'])) ? 'up' : 'down',
            'EMA 34 > EMA 48': (parseFloat(ema['EMA 34']) > parseFloat(ema['EMA 48'])) ? 'up' : 'down'
        };

        let html = '';
        Object.entries(comparison).forEach(([label, trend]) => {
            const icon = trend === 'up' ? '📈' : '📉';
            const badge = trend === 'up' ? 'success' : 'danger';
            html += `<li class="list-group-item d-flex justify-content-between align-items-center">
                ${label}
                <span class="badge badge-${badge}">${icon} ${trend}</span>
            </li>`;
        });

        $('#emaComparisonList').html(html);
        $('#emaComparisonOutput').show();
    }

    function updateSymbolActionButtons() {
        const exchange = $('#exchange').val();
        const symbol = $('#ticker').val().trim().toUpperCase();

        if (exchange && symbol) {
            $('#tradingViewLink').attr('href', `https://www.tradingview.com/symbols/${exchange}-${symbol}/`);
            $('#thinkorSwimLink').attr('href', `https://trade.thinkorswim.com/trade?symbol=${symbol}`);
            $('#symbolActionButtons').fadeIn();
        } else {
            $('#symbolActionButtons').hide();
        }
    }

    function calculateDynamicTargets() {
        const entry = parseFloat($('#entry_price').val());
        const trailPercent = parseFloat($('#trailing_stop_percent').val()) / 100 || 0.01;

        if (!isNaN(entry)) {
            const target = (entry * 1.03).toFixed(2);
            const simulatedHigh = (entry * 1.10).toFixed(2);
            const trailStop = (simulatedHigh * (1 - trailPercent)).toFixed(2);

            $('#target_price_display').val(`$${target}`);
            $('#locked_profit_stop_display').val(`$${target}`);

            $('#dynamicTargetOutput').html(`
                🎯 <strong>Target Price (3%):</strong> $${target}<br>
                🔐 <strong>Locked Stop:</strong> $${target}<br>
                📈 <strong>Example Trail if High = $${simulatedHigh}:</strong> $${trailStop}
            `);
        }
    }

    function generateGPTTemplate() {
        const symbol = $('#ticker').val();
        const exchange = $('#exchange').val();
        const type = $('#trade_type').val();
        const category = $('#category').val();
        const sentiment = $('#market_sentiment').val();
        const priority = $('#alert_priority').val();
        const entry = $('#entry_price').val();
        const target = $('#target_price').val();
        const stop = $('#stop_loss').val();
        const chart = $('#chartInput').val();
        const summary = $('#analysis_summary').val();

        const template = `
📊 Trade Analysis Overview
━━━━━━━━━━━━━━━━━━━━━━━━━━━
Symbol: $${symbol}
Exchange: ${exchange}
Trade Type: ${type}
Category: ${category}
Sentiment: ${sentiment}
Priority: ${priority}

📈 Price Targets
• Entry: $${entry}
• Target: $${target}
• Stop Loss: $${stop}

📉 Profit Lock Strategy
• Trigger: $${(entry * 1.03).toFixed(2)} (3% Gain)
• Trailing Stop: ${$('#trailing_stop_percent').val()}%
• Chart: ${chart}

🧠 Summary
${summary || 'Summary not yet generated.'}
        `;

        $('#gptTradeTemplate').val(template.trim());
        $('#hiddenGPTTemplate').val(template.trim());
    }

    function renderMultiTimeframeMetrics(data) {
        let html = '';

        for (const [tf, values] of Object.entries(data)) {
            if (values.error) {
                html += `<div class="alert alert-warning"><strong>${tf.toUpperCase()}:</strong> ${values.error}</div>`;
                continue;
            }

            html += `<div class="card mb-2">
                <div class="card-header bg-light">
                    <strong>${tf.toUpperCase()} Timeframe</strong>
                </div>
                <div class="card-body p-2">
                    <ul class="list-unstyled small mb-1">
                        <li><strong>SMA 50:</strong> ${values.sma_50 ?? 'N/A'}</li>
                        <li><strong>SMA 200:</strong> ${values.sma_200 ?? 'N/A'}</li>
                        <li><strong>Cross:</strong> <span class="text-${values.sma_cross === 'Golden Cross' ? 'success' : 'danger'}">${values.sma_cross}</span></li>
                        <li><strong>EMA 8:</strong> ${values.ema_8 ?? 'N/A'}</li>
                        <li><strong>EMA 13:</strong> ${values.ema_13 ?? 'N/A'}</li>
                        <li><strong>EMA 34:</strong> ${values.ema_34 ?? 'N/A'}</li>
                        <li><strong>EMA 48:</strong> ${values.ema_48 ?? 'N/A'}</li>
                        <li><strong>Trend:</strong> ${values.ema_trend ?? 'N/A'}</li>
                    </ul>
                </div>
            </div>`;
        }

        $('#timeframeResultsContainer').html(html);
    }

    function validateAutoFetchButton() {
        const symbol = $('#ticker').val().trim();
        const company = $('#company').val().trim();
        const button = $('#fetchAlphaMetricsBtn');

        if (symbol && company) {
            button.prop('disabled', false).show();
        } else {
            button.prop('disabled', true).hide();
        }
    }

    // Trigger validation on input
    $('#ticker, #company').on('input', validateAutoFetchButton);

    // Run once on page load
    validateAutoFetchButton();

    // Bind button click
    $('#fetchAlphaMetricsBtn').on('click', function (e) {
        e.preventDefault();

        const symbol = $('#ticker').val().trim().toUpperCase();
        const exchange = $('#exchange').val().trim().toUpperCase();

        if (!symbol || !exchange) {
            alert("⚠️ Please enter Symbol and Exchange first.");
            return;
        }

        const button = $(this);
        button.prop('disabled', true).html('<em class="icon ni ni-reload fa-spin"></em> Fetching...');

        $.ajax({
            url: `<?= site_url('API/Alerts/getFullMetrics') ?>`,
            method: 'POST',
            dataType: 'json',
            data: {
                symbol: symbol,
                exchange: exchange,
                ['<?= csrf_token() ?>']: '<?= csrf_hash() ?>'
            },
            success: function (res) {
                if (res.status === 'success') {
                    const d = res.data;

                    $('#price').val(d.price ?? '');
                    $('#ema_5').val(d.ema_5 ?? '');
                    $('#ema_8').val(d.ema_8 ?? '');
                    $('#ema_13').val(d.ema_13 ?? '');
                    $('#ema_34').val(d.ema_34 ?? '');
                    $('#ema_48').val(d.ema_48 ?? '');
                    $('#sma_50').val(d.sma_50 ?? '');
                    $('#sma_200').val(d.sma_200 ?? '');
                    $('#golden_cross_status').val(d.golden_cross_status ?? '');
                    $('#all_time_high').val(d.all_time_high ?? '');
                    $('#financial_news').val(d.financial_news ?? '');
                    $('#market_sentiment').val(d.market_sentiment ?? 'Neutral');

                    renderEMAComparisons({
                        'EMA 5': d.ema_5,
                        'EMA 8': d.ema_8,
                        'EMA 13': d.ema_13,
                        'EMA 34': d.ema_34,
                        'EMA 48': d.ema_48
                    });

                    updateSymbolActionButtons();
                    calculateDynamicTargets();
                    generateGPTTemplate();

                    if (d.multi_timeframe_data) {
                        renderMultiTimeframeMetrics(d.multi_timeframe_data);
                    }
                } else {
                    console.warn('❌ Alpha fetch failed:', res.message);
                    alert('Failed to auto-fill. No data returned.');
                }
            },
            error: function (err) {
                console.error('❌ AJAX error:', err);
                alert('Something went wrong with auto-fetch.');
            },
            complete: function () {
                button.prop('disabled', false).html('<em class="icon ni ni-bulb-fill"></em> Auto-Fill Metrics');
            }
        });
    });


    $('#entry_price, #trailing_stop_percent').on('input', function () {
        calculateDynamicTargets();
        generateGPTTemplate();
    });

    $('#generateSummaryButton').on('click', function () {
        const symbol = $('#ticker').val();
        const exchange = $('#exchange').val();

        if (!symbol || !exchange) {
            alert("⚠️ Please enter Symbol and Exchange first.");
            return;
        }

        $('#analysis_summary').val("⏳ Generating...");
        $.ajax({
            url: "<?= site_url('API/Alerts/generateTradeAlertSummary') ?>",
            method: "POST",
            dataType: "json",
            data: {
                formType: $('#formType').val(),
                market_session: $('#market_session').val(),
                category: $('#category').val(),
                exchange: exchange,
                symbol: symbol,
                company: $('#company').val(),
                price: $('#price').val(),
                target_price: $('#target_price').val(),
                entry_price: $('#entry_price').val(),
                stop_loss: $('#stop_loss').val(),
                trade_type: $('#trade_type').val(),
                market_sentiment: $('#market_sentiment').val(),
                alert_priority: $('#alert_priority').val(),
                strategy: $('#trade_description').val(),
                note: $('#financial_news').val(),
                chart: $('#chartInput').val(),
                gptTradeTemplate: $('#gptTradeTemplate').val(),
                [csrfToken]: csrfHash
            },
            success: function (res) {
                if (res.status === 'success') {
                    $('#analysis_summary').val(res.summary);
                    generateGPTTemplate();
                } else {
                    $('#analysis_summary').val('');
                    alert('⚠️ Failed to generate summary.');
                }
            },
            error: function () {
                $('#analysis_summary').val('');
                alert('❌ AJAX error while generating summary.');
            }
        });
    });

    $('#createTradeAlertForm input, #createTradeAlertForm select').on('input change', function () {
        generateGPTTemplate();
    });

    $('#fetchAlphaMetricsBtn').on('click', function () {
        fetchTriggered = false; // allow manual trigger even if auto-triggered already
        tryAutoFetchFullMetrics();
    });

    $('#ticker, #company').on('input', validateAutoFetchButton);

    // ✅ Replaces direct binding with delegation for modal-injected button
    $(document).on('click', '#fetchAlphaMetricsBtn', function (e) {
        e.preventDefault();
        console.log('🔍 fetchAlphaMetricsBtn clicked (delegated)');
        fetchTriggered = false; // allow manual trigger even if auto-triggered already
        tryAutoFetchFullMetrics();A
    });

    validateAutoFetchButton();
    updateSymbolActionButtons();
    calculateDynamicTargets();
    generateGPTTemplate();
});
</script>
