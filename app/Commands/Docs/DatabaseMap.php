<?php

namespace App\Commands\Docs;

use App\Commands\SafeBaseCommand;

class DatabaseMap extends SafeBaseCommand
{
    protected $group = 'Docs';
    protected $name = 'docs:database:map';

    public function run(array $params)
    {

        $models = glob(APPPATH . 'Models/*.php');

        $map = [];

        foreach ($models as $model) {

            $content = file_get_contents($model);

            preg_match('/protected \$table = \'(.*?)\'/', $content, $matches);

            $map[basename($model)] = $matches[1] ?? null;
        }

        file_put_contents(
            ROOTPATH . 'docs/_database_map.json',
            json_encode($map, JSON_PRETTY_PRINT)
        );
    }
}