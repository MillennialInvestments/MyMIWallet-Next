<?php

use CodeIgniter\Router\RouteCollection;

/**
 * MyMI Sports: NFL running back prop analytics (read-only, no wagering).
 * Matches the existing dashboard sidebar links (/MyMISports, /MyMISports/NFL, /MyMISports/NBA).
 *
 * @var RouteCollection $routes
 */
$routes->group('MyMISports', ['namespace' => 'App\Modules\Sports\Controllers', 'filter' => ['login', 'noStore']], static function ($routes) {
    $routes->get('/', 'SportsController::index');
    $routes->get('NFL', 'SportsController::nfl');
    $routes->get('nfl', 'SportsController::nfl');
    $routes->get('NFL/Player/(:num)', 'SportsController::player/$1');
    $routes->get('NFL/API/Goldilocks', 'SportsController::goldilocksApi');
    $routes->get('NBA', 'SportsController::index');
});
