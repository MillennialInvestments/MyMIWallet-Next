<?php

namespace App\Commands\Docs\Scan;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class ControllersList extends SafeBaseCommand
{
    protected $group = 'Docs Scan';
    protected $name = 'docs:controllers:list';
    protected $description = 'List all module controllers';

    public function run(array $params)
    {
        $rii = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(APPPATH . 'Modules')
        );

        $controllers = [];

        foreach ($rii as $file) {

            if ($file->isDir()) continue;

            if (strpos($file->getPathname(), '/Controllers/') !== false) {

                if ($file->getExtension() === 'php') {
                    $controllers[] = str_replace(ROOTPATH, '', $file->getPathname());
                }
            }
        }

        sort($controllers);

        foreach ($controllers as $controller) {
            CLI::write($controller);
        }

        CLI::write("Total Controllers: " . count($controllers), 'green');
    }
}