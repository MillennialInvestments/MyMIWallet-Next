<?php 
$subViewData = [
    'siteSettings' => $siteSettings, 
    'socialMedia' => $socialMedia, 
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'MyMI Wallet Notification') ?></title>
    <style <?= $nonce['style'] ?? '' ?>>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f6fa;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .email-wrapper {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
        }
        .email-header {
            background-color: #0056b3;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .email-body {
            padding: 20px;
            line-height: 1.6;
            font-size: 16px;
        }
        .email-footer {
            background-color: #f5f6fa;
            padding: 15px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }
        .email-footer a {
            color: #0056b3;
            text-decoration: none;
        }
        .details-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        .details-table th, .details-table td {
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
        }
        .details-table th {
            background-color: #f4f5f7;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <!-- Include Header -->
        <?= view('emails/header', $subViewData) ?>

        <!-- Include Content -->
        <div class="email-body">
            <?= $content ?? '' ?>
        </div>

        <!-- Include Footer -->
        <?= view('themes/public/resources/stayConnected', $subViewData) ?>
        <?= view('emails/footer', $subViewData) ?>
    </div>
</body>
</html>
