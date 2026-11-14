<?php

namespace App\Commands\Docs;

use App\Commands\SafeBaseCommand;

class DependenciesMap extends SafeBaseCommand
{
    protected $group = 'Docs';
    protected $name = 'docs:dependencies:map';
    protected $description = 'Export a map of project dependencies for the docs.';

    public function run(array $params)
    {

        $controllers = glob(APPPATH . 'Controllers/*.php');

        $map = [];

        foreach ($controllers as $file) {

            $content = file_get_contents($file);

            preg_match_all('/service\((.*?)\)/', $content, $matches);

            $map[basename($file)] = $matches[1];
        }

        file_put_contents(
            ROOTPATH . 'docs/_dependencies_map.json',
            json_encode($map, JSON_PRETTY_PRINT)
        );
    }
}