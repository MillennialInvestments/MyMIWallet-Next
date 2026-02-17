<?php

declare(strict_types=1);

namespace App\Modules\Management\Config;

use CodeIgniter\Router\RouteCollection;

class Routes
{
    public static function map(RouteCollection $routes): void
    {
        $routes->group('Management', [
            'namespace' => 'App\\Modules\\Management\\Controllers',
        ], static function (RouteCollection $routes): void {
            $routes->get('/', 'ManagementAdminController::index');
        });
    }
}
