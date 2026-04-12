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
    $routes->get('Accounts', 'AccountsController::index');

    $routes->get('Accounts/create', 'AccountsController::create');
    $routes->post('Accounts', 'AccountsController::store');
    $routes->get('Accounts/(:num)', 'AccountsController::detail/$1');
    $routes->get('Accounts/(:num)/edit', 'AccountsController::edit/$1');
    $routes->put('Accounts/(:num)', 'AccountsController::update/$1');
    $routes->delete('Accounts/(:num)', 'AccountsController::delete/$1');
    $routes->post('Accounts/(:num)/refresh-state', 'AccountsController::refreshState/$1');
    $routes->post('Accounts/(:num)/connect-broker', 'AccountsController::connectBroker/$1');

    $routes->post('Signals/scan/(:num)', 'SignalsController::scan/$1');

    $routes->get('Notifications', 'NotificationsController::index');
    $routes->post('Notifications/(:num)/read', 'NotificationsController::markRead/$1');

    $routes->post('Rules/SeedDefaults', 'PropFirmsController::seedDefaults');
});

$routes->group('API', ['namespace' => 'App\Modules\PropFirms\Controllers', 'filter' => ['login', 'noStore']], static function ($routes) {
    $routes->get('account-state/(:num)', 'AccountsController::accountState/$1');
});
