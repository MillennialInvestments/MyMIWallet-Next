<?php
$ticker = esc($ticker ?? 'AAPL');
$exchange = esc($exchange ?? '');
?>

<style <?= $nonce['style'] ?? '' ?>>
    .tv-embed-widget-wrapper__body {
        border: none !important;
    }
    #tradingview_chart_container {
        transition: all 0.3s ease-in-out;
    }
    #tradingview_chart {
        height: 600px;
    }
    .tradingview-widget-copyright a {
        color: white !important;
    }
    .hidden {
        display: none;
    }
</style>

<div class="modal-header">
    <h5 class="modal-title">TradingView Chart for <?= $ticker ?></h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<div class="modal-body">
    <?php if ($exchange_missing): ?>
        <div id="exchangePrompt">
            <div class="row">
                <div class="col">
                    <label for="chartOption">Select Chart Input Type:</label>
                    <select id="chartOption" class="form-control">
                        <option value="url">TradingView Image Link</option>
                        <option value="embed">TradingView Embed</option>
                        <option value="file">Upload Image</option>
                    </select>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <label for="chartInput">Enter Chart URL or Embed Code:</label>
                    <input type="text" id="chartInput" class="form-control" placeholder="Enter TradingView link or Embed Code">
                </div>
            </div>

            <div class="row mt-2 hidden" id="fileUploadContainer">
                <div class="col">
                    <label for="chartFile">Upload Chart Image:</label>
                    <input type="file" id="chartFile" class="form-control">
                </div>
            </div>

            <button class="btn btn-success mt-3" id="saveChartOverride">Save Custom Chart</button>
        </div>
    <?php else: ?>
        <div id="tradingview_chart_container">
            <div class="row">
                <div class="col">
                    <label for="chartOption">Select Chart Input Type:</label>
                    <select id="chartOption" class="form-control">
                        <option value="url">TradingView Image Link</option>
                        <option value="embed">TradingView Embed</option>
                        <option value="file">Upload Image</option>
                    </select>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <label for="chartInput">Enter Chart URL or Embed Code:</label>
                    <input type="text" id="chartInput" class="form-control" placeholder="Enter TradingView link or Embed Code">
                </div>
            </div>

            <div class="row mt-2 hidden" id="fileUploadContainer">
                <div class="col">
                    <label for="chartFile">Upload Chart Image:</label>
                    <input type="file" id="chartFile" class="form-control">
                </div>
            </div>

            <button class="btn btn-success mt-3" id="saveChartOverride">Save Custom Chart</button>
            <hr>
            <div class="row">
                <div class="col">
                    <?php if ($chartType === "url"): ?>
                        <a href="<?= esc($chartData) ?>" target="_blank">
                            <img src="<?= esc($chartData) ?>" width="100%" height="600px">
                        </a>
                    <?php elseif ($chartType === "embed"): ?>
                        <?= $chartData ?>
                    <?php elseif ($chartType === "file"): ?>
                        <img src="/public/assets/images/Charts/<?= esc($chartData) ?>" width="100%" height="600px">
                    <?php else: ?>
                        <div id="tradingview_chart"></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function () {
    let isFullscreen = false;
    let csrfName = $('meta[name="csrf-name"]').attr('content');
    let csrfHash = $('meta[name="csrf-hash"]').attr('content');

    function updateCsrfToken(newCsrfName, newCsrfHash) {
        csrfName = newCsrfName;
        csrfHash = newCsrfHash;
        $('meta[name="csrf-name"]').attr('content', csrfName);
        $('meta[name="csrf-hash"]').attr('content', csrfHash);
    }

    // ✅ Load TradingView script dynamically if not already loaded
    function loadTradingViewScript(callback) {
        if (typeof TradingView === "undefined") {
            let script = document.createElement("script");
            script.type = "text/javascript";
            script.src = "https://s3.tradingview.com/tv.js"; // ✅ TradingView widget script
            script.onload = callback; // ✅ Run callback once script loads
            document.head.appendChild(script);
        } else {
            callback(); // ✅ If script is already loaded, run callback immediately
        }
    }

    // ✅ Function to load the TradingView chart
    function loadTradingViewChart(exchange, ticker) {
        loadTradingViewScript(function () {
            new TradingView.widget({
                "autosize": true,
                "symbol": exchange + ":" + ticker,
                "interval": "60",  // Default timeframe (1-hour)
                "timezone": "America/Chicago",
                "theme": "dark",
                "style": "1",
                "locale": "en",
                "toolbar_bg": "#f1f3f6",
                "enable_publishing": true,
                "hide_side_toolbar": false,  // ✅ Show left toolbar (for drawing tools)
                "show_popup_button": true,  // ✅ Adds "Full Chart" popup button
                "allow_symbol_change": true, // ✅ Allow changing ticker inside chart
                "show_drawing_toolbar": true, // ✅ Enables drawing tools

                // ✅ Available timeframes (4H, D, W, M)
                "timeframe": "4H",
                "supported_resolutions": ["60", "240", "D", "W", "M"],

                // ✅ Adding 3, 8, 13, 34, 48 EMA
                "studies": [
                    "Moving Average Exponential@tv-basicstudies", // 3 EMA
                    "Moving Average Exponential@tv-basicstudies", // 8 EMA
                    "Moving Average Exponential@tv-basicstudies", // 13 EMA
                    "Moving Average Exponential@tv-basicstudies", // 34 EMA
                    "Moving Average Exponential@tv-basicstudies", // 48 EMA
                    "Moving Average@tv-basicstudies",  // 50 SMA
                    "Moving Average@tv-basicstudies",  // 200 SMA

                    // ✅ Trick to Simulate EMA Bands - Bollinger Bands
                    "RSI@tv-basicstudies",     // ✅ Relative Strength Index (RSI)
                    "MACD@tv-basicstudies",    // ✅ Moving Average Convergence Divergence (MACD)
                    "BollingerBands@tv-basicstudies" // ✅ Bollinger Bands
                ],

                // ✅ Custom settings for each EMA & SMA (Matching Pine Script Colors)
                "overrides": {
                    "Moving Average Exponential.length": [3, 8, 13, 34, 48], // Custom EMA periods
                    "Moving Average.length": [50, 200],  // Custom SMA periods
                    "Moving Average Exponential.linewidth": 2, // Adjust EMA line thickness
                    "Moving Average.linewidth": 2,  // Adjust SMA thickness

                    // ✅ Match Pine Script Colors for EMAs
                    "Moving Average Exponential.color.0": "#00FF00", // 3 EMA  (Green)
                    "Moving Average Exponential.color.1": "#FFA500", // 8 EMA  (Orange)
                    "Moving Average Exponential.color.2": "#FF4500", // 13 EMA (Red)
                    "Moving Average Exponential.color.3": "#1E90FF", // 34 EMA (Blue)
                    "Moving Average Exponential.color.4": "#8A2BE2", // 48 EMA (Purple)

                    // ✅ Match SMA Colors
                    "Moving Average.color.0": "#FFD700", // 50 SMA (Gold)
                    "Moving Average.color.1": "#FF1493", // 200 SMA (Pink)

                    // ✅ Simulating EMA Bands using Bollinger Bands
                    "BollingerBands.color": "#3CB371", // Green Bands
                    "BollingerBands.linewidth": 2
                },

                "container_id": "tradingview_chart"
            });
        });
    }

    setTimeout(function () {
        loadTradingViewChart("<?= $exchange ?>", "<?= $ticker ?>");
    }, 5000);


    // ✅ Check if the exchange is missing, otherwise load chart
    <?php if (!$exchange_missing) { ?>
        loadTradingViewChart("<?= $exchange ?>", "<?= $ticker ?>");
    <?php } ?>

    // ✅ Save exchange and reload TradingView chart
    $("#saveExchange").on("click", function () {
        let exchange = $("#exchangeInput").val().trim();
        if (!exchange) {
            alert("Exchange cannot be empty!");
            return;
        }

        $.ajax({
            url: "<?= site_url('API/Alerts/updateExchange') ?>",
            type: "POST",
            dataType: 'json',
            data: {
                ticker: "<?= $ticker ?>",
                exchange: exchange
            },
            success: function (response) {
                if (response.status === "success") {
                    alert("Exchange updated successfully!");
                    $("#exchangePrompt").hide();
                    loadTradingViewChart(exchange, "<?= $ticker ?>");

                    // ✅ Close the dynamic modal after updating
                    $('#dynamicModal').modal('hide');
                } else {
                    alert("Error updating exchange: " + response.message);
                }
            },
            error: function (xhr) {
                alert("Failed to update exchange. Check console for details.");
                console.error(xhr.responseText);
            }
        });
    });

    // ✅ Save custom TradingView chart override
    // ✅ Show/hide file upload based on selection
    $("#chartOption").on("change", function () {
        let selectedOption = $(this).val();
        if (selectedOption === "file") {
            $("#fileUploadContainer").removeClass("hidden");
            $("#chartInput").parent().addClass("hidden");
        } else {
            $("#fileUploadContainer").addClass("hidden");
            $("#chartInput").parent().removeClass("hidden");
        }
    });

    $("#saveChartOverride").on("click", function () {
        let selectedOption = $("#chartOption").val();
        let chartData = $("#chartInput").val().trim();
        let formData = new FormData();

        formData.append(csrfName, csrfHash);
        formData.append("ticker", "<?= $ticker ?>");

        if (selectedOption === "file") {
            let file = $("#chartFile")[0].files[0];
            if (!file) {
                alert("Please select a file to upload.");
                return;
            }
            formData.append("chart_file", file);
        } else {
            if (!chartData) {
                alert("Please enter a valid chart URL or embed code.");
                return;
            }
            formData.append("chart_data", chartData);
            formData.append("chart_type", selectedOption);
        }

        $.ajax({
            url: "<?= site_url('API/Alerts/updateChartOverride') ?>",
            type: "POST",
            dataType: "json",
            processData: false,
            contentType: false,
            data: formData,
            success: function (response) {
                if (response.status === "success") {
                    alert("Custom TradingView chart saved!");

                    // ✅ Reload based on type
                    if (response.chart_type === "url") {
                        $("#tradingview_chart").html(`<a href="${response.chart_data}" target="_blank">
                            <img src="${response.chart_data}" width="100%" height="600px" />
                        </a>`);
                    } else if (response.chart_type === "embed") {
                        $("#tradingview_chart").html(response.chart_data);
                    } else if (response.chart_type === "file") {
                        $("#tradingview_chart").html(`<img src="/public/assets/images/Charts/${response.file_name}" width="100%" height="600px" />`);
                    }
                } else {
                    alert("Error saving chart override: " + response.message);
                }
            },
            error: function (xhr) {
                alert("Failed to save chart override. Check console for details.");
                console.error(xhr.responseText);
            }
        });
    });

    $("#fullscreenChart").on("click", function () {
        let chartContainer = $("#tradingview_chart_container");

        if (!isFullscreen) {
            // Enable fullscreen mode
            chartContainer.css({
                "position": "fixed",
                "top": "0",
                "left": "0",
                "width": "100vw",
                "height": "100vh",
                "background": "#000",
                "z-index": "9999",
                "padding": "20px"
            });

            $("#tradingview_chart").css({
                "width": "100%",
                "height": "90vh"
            });

            $(this).html('<em class="icon ni ni-shrink"></em> Exit Fullscreen');

        } else {
            // Disable fullscreen mode
            chartContainer.css({
                "position": "relative",
                "width": "",
                "height": ""
            });

            $("#tradingview_chart").css({
                "width": "",
                "height": "600px"
            });

            $(this).html('<em class="icon ni ni-expand"></em> Fullscreen');
        }

        isFullscreen = !isFullscreen;
    });

});

</script>
