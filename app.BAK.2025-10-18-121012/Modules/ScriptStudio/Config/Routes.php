<?php
if (! isset($routes)) {
    throw new \Exception('Cannot access directly.');
}

$routes->group('ScriptStudio', ['namespace' => 'App\\Modules\\ScriptStudio\\Controllers'], function ($routes) {
    $routes->get('/', 'ScriptStudioController::index');
    $routes->get('Marketplace', 'ScriptStudioController::marketplace');
    $routes->get('Create', 'ScriptStudioController::create');
    $routes->post('Store', 'ScriptStudioController::store');
    $routes->get('Edit/(:num)', 'ScriptStudioController::edit/$1');
    $routes->post('Update/(:num)', 'ScriptStudioController::update/$1');
    $routes->get('Preview/(:num)', 'ScriptStudioController::preview/$1');
    $routes->get('Export/(:num)/(:segment)', 'ScriptStudioController::export/$1/$2');
});