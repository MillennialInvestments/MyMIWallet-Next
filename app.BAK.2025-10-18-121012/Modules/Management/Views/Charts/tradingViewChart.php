<div class="modal-header">
    <h5 class="modal-title">TradingView Chart for <?php echo $symbol; ?></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div id="tv_chart_container"></div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function() {
    new TradingView.widget({
        "container_id": "tv_chart_container",
        "width": "100%",
        "height": 500,
        "symbol": "NASDAQ:<?php echo $symbol; ?>",
        "interval": "D",
        "theme": "light",
        "style": "1",
        "locale": "en",
        "toolbar_bg": "#f1f3f6",
        "enable_publishing": false,
        "allow_symbol_change": true,
        "studies": ["RSI@tv-basicstudies", "MACD@tv-basicstudies"],
        "show_popup_button": true
    });
});
</script>
