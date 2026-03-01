<?php

$routes->get('/', 'Home::index');
$routes->get('Home', 'Home::index');
$routes->get('Dashboard', '\\App\\Modules\\User\\Controllers\\DashboardController::index', ['filter' => 'login']);
$routes->get('Budget', '\\App\\Modules\\User\\Controllers\\BudgetController::index', ['filter' => 'login']);
$routes->get('Portfolio/Manual', '\\App\\Modules\\User\\Controllers\\InvestmentsController::tradeTracker', ['filter' => 'login']);
$routes->get('Watchlist', '\\App\\Modules\\User\\Controllers\\InvestmentsController::index', ['filter' => 'login']);
$routes->get('Insights', '\\App\\Modules\\User\\Controllers\\BudgetController::insights', ['filter' => 'login']);
