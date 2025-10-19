<?php

$routes->group('blog', ['namespace' => 'App\Modules\Blog\Controllers'], function($routes) {
    $routes->get('/', 'BlogController::index');
    $routes->get('post/(:segment)', 'BlogController::post/$1');
});
