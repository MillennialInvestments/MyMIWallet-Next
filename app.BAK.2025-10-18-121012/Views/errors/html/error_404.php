<?php
// app/Views/errors/html/error_404.php
use CodeIgniter\Router\RouteCollection;
use Config\Services;

// Capture and parse the broken URL path
$currentPath = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$uriSegments = explode('/', $currentPath);
$segment1 = $uriSegments[0] ?? null;
$segment2 = $uriSegments[1] ?? null;

// Get all routes defined in your app
$routes = Services::routes(true);
$allRoutes = [];

// Flatten route keys for comparison
foreach ($routes->getRoutes() as $route => $handler) {
    if (is_string($route)) {
        $allRoutes[] = trim($route, '/');
    }
}

// Add root path and segment1 explicitly for matching
if (!in_array('', $allRoutes)) {
    $allRoutes[] = ''; // Add homepage `/`
}

if ($segment1 && !in_array($segment1, $allRoutes)) {
    $allRoutes[] = $segment1;
}

// Find similar route suggestions
$suggestions = [];
foreach ($allRoutes as $route) {
    similar_text($currentPath, $route, $percent);
    if ($percent > 40) {
        $suggestions[$route] = round($percent, 1);
    }
}

// Boost segment1 and root `/` as high priority links
if ($segment1 && $segment2) {
    $suggestions = array_merge([
        $segment1 => 99,
        '' => 95 // homepage
    ], $suggestions);
}

arsort($suggestions);
$suggestions = array_slice($suggestions, 0, 5, true);

// Automatically alert support
if (ENVIRONMENT === 'production') {
    $to = 'support@mymiwallet.com';
    $subject = '404 Error on MyMI Wallet';
    $body = "A 404 error occurred:\n\n"
        . "URL: " . current_url() . "\n"
        . "Path: {$currentPath}\n"
        . "IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'Unknown') . "\n"
        . "User Agent: " . ($_SERVER['HTTP_USER_AGENT'] ?? 'Unknown') . "\n"
        . "Time: " . date('Y-m-d H:i:s') . "\n";
    @mail($to, $subject, $body, "From: noreply@mymiwallet.com");

    // Log the error to the DB
    $db = db_connect();
    $db->table('bf_error_logs')->insert([
        'type'       => '404',
        'level'      => 'error',
        'message'    => '404 Page Not Found: ' . $currentPath ?? 'ERROR: No Message Provided',
        'path'       => $currentPath,
        'full_url'   => current_url(),
        'ip_address' => $_SERVER['REMOTE_ADDR'] ?? 'Unknown',
        'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown',
        'created_at' => date('Y-m-d H:i:s')
    ]);
}
$nonce = ['style' => '', 'script' => ''];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Page Not Found - MyMI Wallet</title>
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
    <h1 class="text-danger display-4">404 - Page Not Found</h1>
    <p class="lead">Sorry, we couldn't find the page you were looking for.</p>

    <!-- Auto-Redirect to Dashboard Button -->
    <a href="<?= site_url('/Dashboard') ?>" class="btn btn-primary mt-3">Return to Dashboard</a>

    <!-- Suggested Routes -->
    <?php if (!empty($suggestions)) : ?>
        <div class="suggested-links text-start mt-5">
            <h5>Did you mean one of these?</h5>
            <ul class="list-group list-group-flush mt-3">
                <?php
                $displayed = [];
                foreach ($suggestions as $route => $score) :
                    $segments = explode('/', trim($route, '/'));
                    $firstSegment = strtolower($segments[0] ?? '');
                    
                    if ($firstSegment === 'index.php') {
                        $firstSegment = '';
                    }
                    
                    if (in_array($firstSegment, $displayed)) {
                        continue;
                    }
                    
                    if ($firstSegment === '') {
                        $label = 'Dashboard';
                        $href = site_url('/Dashboard');
                    } else {
                        $label = ucfirst($firstSegment);
                        $href = site_url(ucfirst($firstSegment));
                    }
                    
                    $displayed[] = $firstSegment;
                    
                    ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="<?= $href ?>" class="text-decoration-none fw-semibold">
                            <?= esc($label) ?>
                        </a>
                        <span class="badge bg-secondary rounded-pill"><?= $score ?>%</span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Support Info -->
    <div class="support-links mt-4">
        <h5>Need Help?</h5>
        <ul class="list-unstyled">
            <li><strong>Email:</strong> <a href="mailto:support@mymiwallet.com">support@mymiwallet.com</a></li>
            <li><strong>Discord:</strong> <a href="https://discord.gg/UUMexvA" target="_blank">Contact Support on Discord</a></li>
            <li><strong>Twitter:</strong> <a href="https://www.twitter.com/MyMIWalletNews" target="_blank">@MyMIWalletNews</a></li>
            <li><strong>Facebook:</strong> <a href="https://www.facebook.com/MyMIWalletNews" target="_blank">facebook.com/MyMIWalletNews</a></li>
        </ul>
    </div>

    <div class="footer">
        &copy; <?= date('Y') ?> MyMI Wallet. All rights reserved.
    </div>
</div>
</body>
</html>
