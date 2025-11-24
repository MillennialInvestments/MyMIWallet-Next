<?php

$routes->group('blog', ['namespace' => 'App\Modules\Blog\Controllers'], function($routes) {
    $routes->get('/', 'BlogController::index');
    $routes->get('post/(:any)', 'BlogController::post/$1');
});
