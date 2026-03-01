<?php

$routes->get('Watchlist', '\\App\\Modules\\User\\Controllers\\InvestmentsController::index', ['filter' => 'login']);
