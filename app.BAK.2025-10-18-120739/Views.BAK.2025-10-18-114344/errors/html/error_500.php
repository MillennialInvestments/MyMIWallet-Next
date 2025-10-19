<?php
use CodeIgniter\CodeIgniter;
use Config\Services;

$request   = service('request');
$url       = $request ? (string) $request->getUri() : ($_SERVER['REQUEST_URI'] ?? '');

$title     = $title ?? 'Internal Server Error';
$exception = $exception ?? new \RuntimeException('Something went wrong.');
$file      = $file ?? 'N/A';
$line      = $line ?? 'N/A';
$trace     = $trace ?? [];

// $currentUrl = esc($url);
$clientIP   = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
$userAgent  = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
$timestamp  = date('Y-m-d H:i:s');

// Production logging + alert
if (ENVIRONMENT === 'production') {
    @mail(
        'support@mymiwallet.com',
        '❌ 500 Error on MyMI Wallet',
        "A 500 Internal Error occurred:\n\n"
        . "URL: " . esc($url) . "\nIP: $clientIP\nUser Agent: $userAgent\n"
        . "Message: " . $exception->getMessage() . "\nFile: $file @ line $line\nTime: $timestamp",
        "From: noreply@mymiwallet.com"
    );

    try {
        $db = db_connect();
        $db->table('bf_error_logs')->insert([
            'type'       => '500',
            'level'      => 'critical',
            'message'    => $exception->getMessage() ?? 'ERROR: No Message Provided',
            'path'       => uri_string(),
            'full_url'   => esc($url),
            'file'       => $file,
            'line'       => $line,
            'ip_address' => $clientIP,
            'user_agent' => $userAgent,
            'created_at' => $timestamp
        ]);
    } catch (\Throwable $e) {
        log_message('error', '[Logger] Failed to log 500 error: ' . $e->getMessage());
    }
}
$nonce = $nonce ?? ['style' => '', 'script' => ''];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="5;url=<?= site_url('/Support') ?>">
    <title>500 - <?= esc($title) ?> | MyMI Wallet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" <?= $nonce['style'] ?? '' ?>>
    <style <?= $nonce['style'] ?? '' ?>>
        body { background: #f8f9fa; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; }
        .wrap { max-width: 760px; margin: 5rem auto; background: #fff; padding: 2rem; border: 1px solid #dee2e6; border-radius: 0.5rem; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .footer { margin-top: 2rem; font-size: 0.875rem; color: #6c757d; }
    </style>
</head>
<body>
<div class="wrap text-center">
    <h1 class="text-danger display-4">500 - Internal Server Error</h1>
    <p class="lead">Sorry, something unexpected happened on our end.</p>

    <div class="alert alert-warning mt-4">
        <strong>Error Message:</strong> <?= nl2br(esc($exception->getMessage())); ?>
    </div>

    <div class="text-start mt-3">
        <p><strong>File:</strong> <?= esc($file) ?> @ line <?= esc($line) ?></p>
    </div>

    <?php if (!empty($trace)) : ?>
        <div class="text-start">
            <h5>Current URL:</h5>
            <pre><?= esc(print_r($url, true)) ?></pre>
            <h5>Stack Trace:</h5>
            <pre><?= esc(print_r($trace, true)) ?></pre>
        </div>
    <?php endif; ?>

    <a href="<?= site_url('/') ?>" class="btn btn-primary mt-4">Return to Dashboard</a>

    <div class="footer">
        Logged at <?= esc($timestamp) ?> | PHP <?= PHP_VERSION ?> | CI <?= CodeIgniter::CI_VERSION ?>
    </div>
</div>
</body>
</html>
