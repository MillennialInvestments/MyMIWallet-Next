<?php

namespace App\Commands\Docs\Exports;

use App\Commands\SafeBaseCommand;

class ExportViewTxt extends SafeBaseCommand
{
    protected $group = 'Docs Export';
    protected $name = 'docs:views:export';

    public function run(array $params)
    {

        $views = [];

        $rii = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(APPPATH . 'Modules')
        );

        foreach ($rii as $file) {

            if ($file->isDir()) continue;

            if (strpos($file->getPathname(), '/Views/') !== false) {

                $views[] = str_replace(ROOTPATH, '', $file->getPathname());
            }
        }

        sort($views);

        file_put_contents(
            ROOTPATH . 'docs/_views_inventory.txt',
            implode("\n", $views)
        );
    }
}