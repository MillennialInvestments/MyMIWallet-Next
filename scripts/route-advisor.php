<?php
require __DIR__ . '/../vendor/autoload.php';

use Config\Services;

$probe = [
  '/', 'healthz', 'Apex/Referral', 'Corporate-Earnings',
  'login', 'Dashboard', 'Wallets', 'API/Health',
];

$routes = Services::routes(true);
$router = Services::router(null, null, $routes);

printf("%-32s | %-50s | %s\n", "URI", "Controller", "Method");
echo str_repeat('-', 100) . PHP_EOL;

foreach ($probe as $uri) {
    $router->handle($uri);
    $c = $router->controllerName() ?: '(none)';
    $m = $router->methodName() ?: '(none)';
    printf("%-32s | %-50s | %s\n", $uri, $c, $m);
}
