<?php

$routes->get('Investments', '\\App\\Modules\\User\\Controllers\\InvestmentsController::index', ['filter' => 'login']);
$routes->get('Portfolio/Manual', '\\App\\Modules\\User\\Controllers\\InvestmentsController::tradeTracker', ['filter' => 'login']);
