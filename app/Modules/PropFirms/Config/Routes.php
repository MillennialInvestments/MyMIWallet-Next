<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->group('Dashboard', ['namespace' => 'App\Modules\PropFirms\Controllers', 'filter' => ['login', 'noStore']], static function ($routes) {
    $routes->get('PropFirms', 'DashboardController::index');
    $routes->get('propfirms', 'DashboardController::index');
});

$routes->group('PropFirms', ['namespace' => 'App\Modules\PropFirms\Controllers', 'filter' => ['login', 'noStore']], static function ($routes) {
    $routes->get('/', 'PropFirmsController::index');
    $routes->get('RuleSets', 'PropFirmsController::ruleSets');
    $routes->get('Accounts', 'PropFirmsController::accounts');
    $routes->post('Rules/SeedDefaults', 'PropFirmsController::seedDefaults');
});
