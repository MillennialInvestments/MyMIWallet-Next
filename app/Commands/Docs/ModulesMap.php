<?php

namespace App\Commands\Docs;

use App\Commands\SafeBaseCommand;

class ModulesMap extends SafeBaseCommand
{
    protected $group = 'Docs';
    protected $name = 'docs:modules:map';

    public function run(array $params)
    {

        $modules = glob(APPPATH . 'Modules/*', GLOB_ONLYDIR);

        $map = [];

        foreach ($modules as $module) {

            $map[basename($module)] = [
                'controllers' => glob($module . '/Controllers/*.php'),
                'models' => glob($module . '/Models/*.php'),
                'views' => glob($module . '/Views/*'),
            ];
        }

        file_put_contents(
            ROOTPATH . 'docs/_modules_map.json',
            json_encode($map, JSON_PRETTY_PRINT)
        );
    }
}