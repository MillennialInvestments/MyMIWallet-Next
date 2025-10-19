<?php
use Config\Services;
use CodeIgniter\CodeIgniter;

$title     = $title ?? 'Access Denied';
$exception = $exception ?? new \RuntimeException('You do not have permission to access this page.');
$file      = $file ?? 'N/A';
$line      = $line ?? 'N/A';
$trace     = $trace ?? [];

$currentUrl = current_url();
$clientIP   = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
$userAgent  = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
$timestamp  = date('Y-m-d H:i:s');

// Auto log + notify
if (ENVIRONMENT === 'production') {
    @mail(
        'support@mymiwallet.com',
        '🚫 403 Access Denied - MyMI Wallet',
        "A 403 error occurred:\n\n"
        . "🔗 URL: $currentUrl\n"
        . "💻 IP: $clientIP\n"
        . "📱 User Agent: $userAgent\n"
        . "🧠 File: $file @ line $line\n"
        . "⏱️ Time: $timestamp\n",
        "From: noreply@mymiwallet.com"
    );

    try {
        $db = db_connect();
        $db->table('bf_error_logs')->insert([
            'type'       => '403',
            'level'      => 'warning',
            'message'    => 'Access denied to ' . uri_string() ?? 'ERROR: No Message Provided',
            'path'       => uri_string(),
            'full_url'   => $currentUrl,
            'ip_address' => $clientIP,
            'user_agent' => $userAgent,
            'created_at' => $timestamp
        ]);
    } catch (\Throwable $e) {
        log_message('error', '[403 Logger] DB Logging Failed: ' . $e->getMessage());
    }
}
$nonce = $nonce ?? ['style' => '', 'script' => ''];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="5;url=<?= site_url('/Support') ?>">
    <title>403 - <?= esc($title) ?> | MyMI Wallet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" <?= $nonce['style'] ?? '' ?>>
    <style <?= $nonce['style'] ?? '' ?>>
        body {
            background: #f8f9fa;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }
        .wrap {
            max-width: 760px;
            margin: 5rem auto;
            background: #fff;
            padding: 2rem;
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .footer {
            margin-top: 2rem;
            font-size: 0.875rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
<div class="wrap text-center">
    <h1 class="text-warning display-4">403 - Access Denied</h1>
    <p class="lead">Sorry, you don’t have permission to access this page or perform this action.</p>

    <div class="alert alert-danger mt-4">
        <strong>Reason:</strong> <?= nl2br(esc($exception->getMessage())); ?>
    </div>

    <a href="<?= site_url('/Dashboard') ?>" class="btn btn-primary mt-3">Return to Dashboard</a>

    <div class="support-links mt-5 text-start">
        <h5>Need Help?</h5>
        <ul class="list-unstyled">
            <li><strong>Email:</strong> <a href="mailto:support@mymiwallet.com">support@mymiwallet.com</a></li>
            <li><strong>Discord:</strong> <a href="https://discord.gg/UUMexvA" target="_blank">Join our Discord</a></li>
            <li><strong>Twitter:</strong> <a href="https://www.twitter.com/MyMIWalletNews" target="_blank">@MyMIWalletNews</a></li>
            <li><strong>Facebook:</strong> <a href="https://www.facebook.com/MyMIWalletNews" target="_blank">facebook.com/MyMIWalletNews</a></li>
        </ul>
    </div>

    <div class="footer">
        Displayed at <?= esc($timestamp) ?> —
        PHP <?= esc(PHP_VERSION) ?> |
        CI <?= esc(CodeIgniter::CI_VERSION) ?> |
        Env: <?= ENVIRONMENT ?>
    </div>
</div>
</body>
</html>
