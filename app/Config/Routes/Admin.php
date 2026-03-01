<?php

$routes->group('admin', ['filter' => 'admin'], function ($routes) {
    $routes->get('/', 'AdminController::index');
});
