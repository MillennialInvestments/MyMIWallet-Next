<?php

namespace App\Commands\Docs;

use App\Commands\SafeBaseCommand;

class RoutesInventory extends SafeBaseCommand
{
    protected $group = 'Docs';
    protected $name = 'docs:routes:inventory';

    public function run(array $params)
    {

        $routes = service('routes')->getRoutes();

        file_put_contents(
            ROOTPATH . 'docs/_routes_inventory.json',
            json_encode($routes, JSON_PRETTY_PRINT)
        );
    }
}