<?php

$routes->get('Budget', '\\App\\Modules\\User\\Controllers\\BudgetController::index', ['filter' => 'login']);
$routes->get('Insights', '\\App\\Modules\\User\\Controllers\\BudgetController::insights', ['filter' => 'login']);
