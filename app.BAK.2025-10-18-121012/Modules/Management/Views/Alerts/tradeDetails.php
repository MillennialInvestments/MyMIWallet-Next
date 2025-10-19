<div class="modal-header">
    <h5 class="modal-title">Trade Alert Details</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <table class="table">
        <tr><th>Ticker:</th><td><?php echo $symbol; ?></td></tr>
        <tr><th>Price:</th><td>$<?php echo rand(100, 500); ?>.00</td></tr> <!-- Dummy Price for now -->
        <tr><th>Status:</th><td>Pending</td></tr>
        <tr><th>Volume:</th><td><?php echo rand(1000, 50000); ?></td></tr> <!-- Dummy Volume for now -->
    </table>

    <h6>TradingView Chart:</h6>
    <div id="tradingViewChart"></div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function() {
    new TradingView.widget({
        "container_id": "tradingViewChart",
        "width": "100%",
        "height": 400,
        "symbol": "NASDAQ:<?php echo $symbol; ?>",
        "interval": "D",
        "theme": "light",
        "style": "1",
        "locale": "en",
        "toolbar_bg": "#f1f3f6",
        "enable_publishing": false,
        "allow_symbol_change": true,
        "studies": ["MACD@tv-basicstudies"],
        "show_popup_button": true
    });
});
</script>
