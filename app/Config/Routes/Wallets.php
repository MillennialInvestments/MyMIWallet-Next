<?php

$routes->get('Wallets', 'WalletsController::index', ['filter' => 'login']);
