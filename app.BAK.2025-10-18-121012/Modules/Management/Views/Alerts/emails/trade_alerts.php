<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade Alert</title>
    <style <?= $nonce['style'] ?? '' ?>>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 8px;
        }
        .header {
            text-align: center;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }
        .content {
            padding: 20px 0;
        }
        .footer {
            text-align: center;
            font-size: 0.8rem;
            color: #666;
            margin-top: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>MyMI Wallet - <?php echo $ticker . ' ' . $tradeType ?> Alert</h1>
            <p>Trade ID: <?= $tradeId; ?></p>
        </div>
        <div class="content">
            <p><strong>Stock Ticker:</strong> <a href="<?= site_url('/Trades/Alerts/' . $tradeId) ?>"><?= $tradeId ?></a></p>
            <p><strong>Stock Ticker:</strong>  <a href="<?= site_url('/Trades/Stocks/' . $ticker) ?>"><?= $ticker ?></a></p>
            <p><strong>Trade Type:</strong> <?= $tradeType; ?></p>
            <p><strong>Entry Price:</strong> $<?= number_format($entryPrice, 2); ?></p>
            <p><strong>Target Price:</strong> $<?= number_format($targetPrice, 2); ?></p>
            <p><strong>Stop Loss:</strong> $<?= number_format($stopLoss, 2); ?></p>
            <p><strong>Details:</strong> <?= $alertDetails; ?></p>
            <p><strong>Generated On:</strong> <?= $date; ?> at <?= $time; ?></p>
            <a href="https://www.mymiwallet.com" class="button">View More Alerts</a>
        </div>
        <div class="footer">
            <p>Thank you for using MyMI Wallet. Stay updated with premium trade alerts.</p>
        </div>
    </div>
</body>
</html>
