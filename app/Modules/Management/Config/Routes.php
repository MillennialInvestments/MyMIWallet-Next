<?php declare(strict_types=1);

$routes->group('Management/Marketing', ['filter' => 'role:admin,team'], static function ($r) {
    $r->get('Distro', 'App\Modules\Management\Controllers\Marketing\DistroDashboardController::index');
    $r->get('DistroDashboard', 'App\Modules\Management\Controllers\Marketing\DistroDashboardController::index');
    $r->get('Distribution', 'App\Modules\Management\Controllers\Marketing\DistroDashboardController::index');
    $r->get('Blogger', '\\App\\Modules\\Management\\Controllers\\Marketing\\BloggerAdminController::index');
    $r->post('Blogger/generate', '\\App\\Modules\\Management\\Controllers\\Marketing\\BloggerAdminController::generate');
    $r->post('Blogger/repurpose', '\\App\\Modules\\Management\\Controllers\\Marketing\\BloggerAdminController::repurpose');
    $r->post('Blogger/schedule', '\\App\\Modules\\Management\\Controllers\\Marketing\\BloggerAdminController::schedule');
    $r->get('Blogger/preview/(:any)', '\\App\\Modules\\Management\\Controllers\\Marketing\\BloggerAdminController::preview/$1');
    $r->post('Blogger/save', '\\App\\Modules\\Management\\Controllers\\Marketing\\BloggerAdminController::save');
    $r->post('Blogs/Backfill-Excerpts', '\\App\\Modules\\Management\\Controllers\\MarketingAdminController::backfillBlogExcerpts');
});

$routes->group('Management/ContentEngine', ['filter' => 'role:admin,team'], static function ($r) {
    $r->get('previewPost/(:num)', '\\App\\Modules\\Management\\Controllers\\ContentEngineAdminController::previewPost/$1');
});

$routes->group('Management/OpsInbox', ['filter' => 'role:admin'], static function ($r) {
    $r->get('/', '\\App\\Modules\\Management\\Controllers\\OpsInboxAdminController::index');
    $r->get('view/(:num)', '\\App\\Modules\\Management\\Controllers\\OpsInboxAdminController::view/$1');
    $r->post('create-task-file/(:num)', '\\App\\Modules\\Management\\Controllers\\OpsInboxAdminController::createTaskFile/$1');
    $r->post('create-task-registry/(:num)', '\\App\\Modules\\Management\\Controllers\\OpsInboxAdminController::createTaskRegistry/$1');
    $r->post('approve/(:num)', '\\App\\Modules\\Management\\Controllers\\OpsInboxAdminController::markApproved/$1');
    $r->post('reject/(:num)', '\\App\\Modules\\Management\\Controllers\\OpsInboxAdminController::reject/$1');
});
