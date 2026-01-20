<?php
$routes->group('Management/Marketing', ['filter' => 'auth'], static function($r){
    $r->get('Blogger', 'App\\Modules\\Management\\Controllers\\Marketing\\BloggerController::index');
    $r->post('Blogger/generate', 'App\\Modules\\Management\\Controllers\\Marketing\\BloggerController::generate');
    $r->post('Blogger/repurpose', 'App\\Modules\\Management\\Controllers\\Marketing\\BloggerController::repurpose');
    $r->post('Blogger/schedule', 'App\\Modules\\Management\\Controllers\\Marketing\\BloggerController::schedule');
    $r->get('Blogger/preview/(:any)', 'App\\Modules\\Management\\Controllers\\Marketing\\BloggerController::preview/$1');
    $r->post('Blogger/save', 'App\\Modules\\Management\\Controllers\\Marketing\\BloggerController::save');
    $r->post('Blogs/Backfill-Excerpts', 'App\\Modules\\Management\\Controllers\\MarketingController::backfillBlogExcerpts');
});

$routes->group('Management/ContentEngine', ['filter' => 'auth'], static function($r){
    $r->get('previewPost/(:num)', 'App\\Modules\\Management\\Controllers\\ContentEngineController::previewPost/$1');
});

$routes->group('Management/OpsInbox', ['filter' => 'role:admin'], static function($r){
    $r->get('/', 'App\\Modules\\Management\\Controllers\\OpsInboxController::index');
    $r->get('view/(:num)', 'App\\Modules\\Management\\Controllers\\OpsInboxController::view/$1');
    $r->post('create-task-file/(:num)', 'App\\Modules\\Management\\Controllers\\OpsInboxController::createTaskFile/$1');
    $r->post('create-task-registry/(:num)', 'App\\Modules\\Management\\Controllers\\OpsInboxController::createTaskRegistry/$1');
    $r->post('approve/(:num)', 'App\\Modules\\Management\\Controllers\\OpsInboxController::markApproved/$1');
    $r->post('reject/(:num)', 'App\\Modules\\Management\\Controllers\\OpsInboxController::reject/$1');
});

$routes->group('Management', ['namespace' => 'App\\Modules\\Management\\Controllers'], static function($routes) {
    $routes->get('Docs', 'DocsController::index');
    $routes->get('Docs/browse/(:any)', 'DocsController::browse/$1');
    $routes->get('Docs/view/(:any)', 'DocsController::view/$1');
});

$routes->group('Management/Users', ['namespace' => 'App\\Modules\\Management\\Controllers', 'filter' => 'auth'], static function($routes) {
    $routes->get('Referral-Report', 'UsersController::referralReport');
});

$routes->group('Management/AuthHealth', ['namespace' => 'App\\Modules\\Management\\Controllers', 'filter' => 'permission:admin.access'], static function($routes) {
    $routes->get('/', 'AuthHealthController::index');
    $routes->get('details/(:num)', 'AuthHealthController::details/$1');
});

$routes->group('Management', ['namespace' => 'App\\Modules\\Management\\Controllers', 'filter' => 'permission:admin.access'], static function($routes) {
    $routes->get('AuthFunnel', 'AuthFunnelController::authFunnel');
    $routes->get('Referrals', 'AuthFunnelController::referrals');
});
