<?php
// app/Modules/Management/Views/Alerts/form_fields/trade_alert_fields.php
$ticker = $alert['ticker'] ?? '';
$tradeType = $alert['type'] ?? 'Long';
$marketSentiment = $alert['market_sentiment'] ?? 'Bullish';
$alertPriority = $alert['alert_priority'] ?? 'Medium';
$price = $alert['price'] ?? '';
$targetPrice = $alert['target_price'] ?? '';
$recommendedEntry = $alert['recommended_entry'] ?? '';
$recommendedExit = $alert['recommended_exit'] ?? '';
$stopLoss = $alert['stop_loss'] ?? '';
$tradeRationale = $alert['details'] ?? '';
$analysisSummary = $alert['analysis_summary'] ?? '';
?>

<div class="nk-block">
    <div class="nk-block-head nk-block-head-sm">
        <h4 class="nk-block-title">Trade Alert Information</h4>
        <p class="sub-text">Fill out the trade alert details below.</p>
    </div>
    
    <hr>

    <div class="form-group">
        <label>Symbol:</label>
        <input type="text" name="ticker" value="<?= $ticker ?>" class="form-control" readonly>

    </div>

    <div class="form-group">
        <label>Trade Type:</label>
        <select name="trade_type" class="form-control">
            <option value="Long" <?= ($tradeType === 'Long') ? 'selected' : '' ?>>Long</option>
            <option value="Short" <?= ($tradeType === 'Short') ? 'selected' : '' ?>>Short</option>
        </select>
    </div>

    <div class="form-group">
        <label>Market Sentiment:</label>
        <select name="market_sentiment" class="form-control">
            <option value="Bullish" <?= ($marketSentiment === 'Bullish') ? 'selected' : '' ?>>Bullish</option>
            <option value="Bearish" <?= ($marketSentiment === 'Bearish') ? 'selected' : '' ?>>Bearish</option>
            <option value="Neutral" <?= ($marketSentiment === 'Neutral') ? 'selected' : '' ?>>Neutral</option>
        </select>
    </div>

    <div class="form-group">
        <label>Alert Priority:</label>
        <select name="alert_priority" class="form-control">
            <option value="High" <?= ($alertPriority === 'High') ? 'selected' : '' ?>>High</option>
            <option value="Medium" <?= ($alertPriority === 'Medium') ? 'selected' : '' ?>>Medium</option>
            <option value="Low" <?= ($alertPriority === 'Low') ? 'selected' : '' ?>>Low</option>
        </select>
    </div>

    <div class="form-group">
        <label>Price:</label>
        <input type="text" name="price" value="<?= $price ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Target Price:</label>
        <input type="text" name="target_price" value="<?= $targetPrice ?>" class="form-control">
    </div>

    <div class="form-group">
        <label>Recommended Entry:</label>
        <input type="text" name="recommended_entry" value="<?= $recommendedEntry ?>" class="form-control">
    </div>

    <div class="form-group">
        <label>Recommended Exit:</label>
        <input type="text" name="recommended_exit" value="<?= $recommendedExit ?>" class="form-control">
    </div>

    <div class="form-group">
        <label>Stop Loss:</label>
        <input type="text" name="stop_loss" value="<?= $stopLoss ?>" class="form-control">
    </div>

    <div class="form-group">
        <label for="trade_description">Trade Description</label>
        <textarea id="trade_description" name="trade_description" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label for="financial_news">Financial News</label>
        <textarea id="financial_news" name="financial_news" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label>Analysis Summary (For Social Media):</label>
        <textarea name="analysis_summary" class="form-control" rows="2"><?= $analysisSummary ?></textarea>
    </div>

    <div class="form-group">
        <label>Distribute To:</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="distribution_channels[]" value="Twitter">
            <label class="form-check-label">Twitter</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="distribution_channels[]" value="Discord">
            <label class="form-check-label">Discord</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="distribution_channels[]" value="Facebook">
            <label class="form-check-label">Facebook</label>
        </div>
    </div>
</div>
