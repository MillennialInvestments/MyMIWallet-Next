<?php
$routes->group('Management/Marketing', ['filter' => 'auth'], static function($r){
    $r->get('Blogger', 'App\Modules\Management\Controllers\Marketing\BloggerController::index');
    $r->post('Blogger/generate', 'App\Modules\Management\Controllers\Marketing\BloggerController::generate');
    $r->post('Blogger/repurpose', 'App\Modules\Management\Controllers\Marketing\BloggerController::repurpose');
    $r->post('Blogger/schedule', 'App\Modules\Management\Controllers\Marketing\BloggerController::schedule');
    $r->get('Blogger/preview/(:segment)', 'App\Modules\Management\Controllers\Marketing\BloggerController::preview/$1');
    $r->post('Blogger/save', 'App\Modules\Management\Controllers\Marketing\BloggerController::save');
});
?>