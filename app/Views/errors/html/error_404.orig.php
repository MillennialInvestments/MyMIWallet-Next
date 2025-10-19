<?php
use CodeIgniter\Router\RouteCollection;
use Config\Services;

// Capture the broken URL path
$currentPath = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// Get all routes defined in your app
$routes = Services::routes(true);
$allRoutes = [];

// Flatten route keys for comparison
foreach ($routes->getRoutes() as $route => $handler) {
    if (is_string($route)) {
        $allRoutes[] = trim($route, '/');
    }
}

// Find similar route suggestions
$suggestions = [];
foreach ($allRoutes as $route) {
    similar_text($currentPath, $route, $percent);
    if ($percent > 40) { // threshold for similarity
        $suggestions[$route] = round($percent, 1);
    }
}

// Sort by best match
arsort($suggestions);
$suggestions = array_slice($suggestions, 0, 5, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= lang('Errors.pageNotFound') ?></title>

    <style <?= $nonce['style'] ?? '' ?>>
        div.logo {
            height: 200px;
            width: 155px;
            display: inline-block;
            opacity: 0.08;
            position: absolute;
            top: 2rem;
            left: 50%;
            margin-left: -73px;
        }
        body {
            height: 100%;
            background: #fafafa;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            color: #777;
            font-weight: 300;
        }
        h1 {
            font-weight: lighter;
            letter-spacing: normal;
            font-size: 3rem;
            margin-top: 0;
            margin-bottom: 0;
            color: #222;
        }
        .wrap {
            max-width: 1024px;
            margin: 5rem auto;
            padding: 2rem;
            background: #fff;
            text-align: center;
            border: 1px solid #efefef;
            border-radius: 0.5rem;
            position: relative;
        }
        pre {
            white-space: normal;
            margin-top: 1.5rem;
        }
        code {
            background: #fafafa;
            border: 1px solid #efefef;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            display: block;
        }
        p {
            margin-top: 1.5rem;
        }
        .footer {
            margin-top: 2rem;
            border-top: 1px solid #efefef;
            padding: 1em 2em 0 2em;
            font-size: 85%;
            color: #999;
        }
        a:active,
        a:link,
        a:visited {
            color: #dd4814;
        }
        .suggested-links {
            margin-top: 2rem;
            text-align: left;
            background: #f9f9f9;
            padding: 1rem;
            border-radius: 8px;
            border: 1px solid #eee;
        }
        .suggested-links h3 {
            margin-top: 0;
            color: #333;
        }
        .suggested-links a {
            font-weight: bold;
            color: #007bff;
        }

    </style>
</head>
<body>
    <div class="wrap">
        <h1>404</h1>

        <p>
            <?php if (ENVIRONMENT !== 'production') : ?>
                <?= nl2br(esc($message)) ?>
            <?php else : ?>
                <?= lang('Errors.sorryCannotFind') ?>
            <?php endif; ?>
        </p>

        <!-- Notification Form -->
        <div class="notification-form">
            <p>Would you like to be notified when this page becomes available?</p>
            <form action="" method="post">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                <input type="hidden" name="redirect_url" value="<?= $_SERVER['REQUEST_URI']; ?>">
                <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?? ''; ?>">
                <input type="hidden" name="user_email" value="<?= $_SESSION['user_email'] ?? ''; ?>">
                <button type="submit" name="notify" value="yes">Yes, notify me!</button>
                <button type="submit" name="notify" value="no">No, thanks.</button>
            </form>
        </div>

        <?php if (!empty($suggestions)) : ?>
            <div class="suggested-links">
                <h3>Were you trying to find one of these?</h3>
                <ul style="list-style: none; padding: 0;">
                    <?php foreach ($suggestions as $route => $score) : ?>
                        <li>
                            <a href="<?= site_url($route) ?>">
                                <?= esc($route) ?> (Match Score: <?= $score ?>%)
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['notify'])) {
            $db = db_connect(); // Ensure you have a connection function or instance

            if ($_POST['notify'] == 'yes' && !empty($_POST['user_id']) && !empty($_POST['user_email'])) {
                $data = [
                    'user_id' => $_POST['user_id'],
                    'email' => $_POST['user_email'],
                    'page_url' => $_POST['redirect_url'],
                    'is_notified' => 0  // Assuming 'is_notified' is a flag to track if notification sent
                ];
                
                $db->table('bf_user_notification_subscriptions')->insert($data);
            }

            // Redirect back to the previous page or to a default page
            header('Location: ' . $_POST['redirect_url']);
            exit;
        }
        ?>
    </div>
</body>
</html>
