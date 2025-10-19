<?php
use CodeIgniter\Router\RouteCollection;
use Config\Services;
use CodeIgniter\CodeIgniter;

$currentPath = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$uriSegments = explode('/', $currentPath);
$segment1 = $uriSegments[0] ?? null;
$segment2 = $uriSegments[1] ?? null;

// Suggested fallback routes (same as 404 logic)
$routes = Services::routes(true);
$allRoutes = [];

foreach ($routes->getRoutes() as $route => $handler) {
    if (is_string($route)) {
        $allRoutes[] = trim($route, '/');
    }
}
if (!in_array('', $allRoutes)) $allRoutes[] = '';
if ($segment1 && !in_array($segment1, $allRoutes)) $allRoutes[] = $segment1;

$suggestions = [];
foreach ($allRoutes as $route) {
    similar_text($currentPath, $route, $percent);
    if ($percent > 40) {
        $suggestions[$route] = round($percent, 1);
    }
}
if ($segment1 && $segment2) {
    $suggestions = array_merge([
        $segment1 => 99,
        '' => 95,
    ], $suggestions);
}
arsort($suggestions);
$suggestions = array_slice($suggestions, 0, 5, true);

// Error metadata
$errorTitle = $title ?? 'Gateway Timeout';
$exception = $exception ?? new \RuntimeException('The server took too long to respond.');
$file      = $file ?? 'N/A';
$line      = $line ?? 'N/A';
$trace     = $trace ?? [];
$timestamp = date('Y-m-d H:i:s');
$currentUrl = current_url();
$clientIP = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';

// Logging
if (ENVIRONMENT === 'production') {
    @mail(
        'support@mymiwallet.com',
        '🚨 504 Timeout on MyMI Wallet',
        "A 504 Gateway Timeout occurred:\n\nURL: $currentUrl\nIP: $clientIP\nUser Agent: $userAgent\nFile: $file @ line $line\nTime: $timestamp\n",
        "From: noreply@mymiwallet.com"
    );

    try {
        $db = db_connect();
        $db->table('bf_error_logs')->insert([
            'type'       => '504',
            'level'      => 'error',
            'message'    => $exception->getMessage() ?? 'ERROR: No Message Provided',
            'path'       => $currentPath,
            'full_url'   => $currentUrl,
            'file'       => $file,
            'line'       => $line,
            'ip_address' => $clientIP,
            'user_agent' => $userAgent,
            'created_at' => $timestamp
        ]);
    } catch (\Throwable $e) {
        log_message('error', '[504 Logging Error] ' . $e->getMessage());
    }
}
$nonce = $nonce ?? ['style' => '', 'script' => ''];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>504 - <?= esc($errorTitle) ?> | MyMI Wallet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" <?= $nonce['style'] ?? '' ?>>
    <style <?= $nonce['style'] ?? '' ?>>
        body { background: #f8f9fa; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; }
        .wrap { max-width: 760px; margin: 5rem auto; background: #fff; padding: 2rem; border: 1px solid #dee2e6; border-radius: 0.5rem; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .footer { margin-top: 2rem; font-size: 0.875rem; color: #6c757d; }
        pre { font-size: 0.875rem; background: #f8f9fa; padding: 1rem; border-radius: 0.5rem; }
    </style>
</head>
<body>
<div class="wrap text-center">
    <h1 class="text-danger display-4">504 - Gateway Timeout</h1>
    <p class="lead">Sorry, our server took too long to respond. This may be due to high traffic or a slow external service.</p>

    <div class="alert alert-warning mt-4">
        <strong>Error Message:</strong> <?= nl2br(esc($exception->getMessage())); ?>
    </div>

    <div class="text-start mt-3">
        <p><strong>File:</strong> <?= esc($file) ?> @ line <?= esc($line) ?></p>
    </div>

    <!-- Suggested Routes -->
    <?php if (!empty($suggestions)) : ?>
        <div class="suggested-links text-start mt-5">
            <h5>Try one of these instead:</h5>
            <ul class="list-group list-group-flush mt-3">
                <?php
                $displayed = [];
                foreach ($suggestions as $route => $score) :
                    $segments = explode('/', trim($route, '/'));
                    $firstSegment = strtolower($segments[0] ?? '');
                    if ($firstSegment === 'index.php') $firstSegment = '';
                    if (in_array($firstSegment, $displayed)) continue;

                    $label = $firstSegment === '' ? 'Dashboard' : ucfirst($firstSegment);
                    $href = site_url($firstSegment === '' ? '/Dashboard' : ucfirst($firstSegment));
                    $displayed[] = $firstSegment;
                ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="<?= $href ?>" class="text-decoration-none fw-semibold"><?= esc($label) ?></a>
                        <span class="badge bg-secondary rounded-pill"><?= $score ?>%</span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <a href="<?= site_url('/Dashboard') ?>" class="btn btn-primary mt-4">Return to Dashboard</a>

    <div class="mt-5 text-start">
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
