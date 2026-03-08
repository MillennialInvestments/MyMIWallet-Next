<?php

namespace App\Commands\Docs\Scan;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class ViewFiles extends SafeBaseCommand
{
    protected $group = 'Docs Scan';
    protected $name = 'docs:views:list';

    public function run(array $params)
    {
        $rii = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(APPPATH . 'Modules')
        );

        $views = [];

        foreach ($rii as $file) {

            if ($file->isDir()) continue;

            if (strpos($file->getPathname(), '/Views/') !== false) {

                $views[] = str_replace(ROOTPATH, '', $file->getPathname());
            }
        }

        sort($views);

        foreach ($views as $view) {
            CLI::write($view);
        }

        CLI::write("Total Views: " . count($views), 'green');
    }
}