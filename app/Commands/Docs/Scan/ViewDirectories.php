<?php

namespace App\Commands\Docs\Scan;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class ViewDirectories extends SafeBaseCommand
{
    protected $group = 'Docs Scan';
    protected $name = 'docs:views:dirs';

    public function run(array $params)
    {

        $rii = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(APPPATH . 'Modules')
        );

        $dirs = [];

        foreach ($rii as $file) {

            if ($file->isDir() && $file->getFilename() === 'Views') {

                $dirs[] = str_replace(ROOTPATH, '', $file->getPathname());
            }
        }

        sort($dirs);

        foreach ($dirs as $dir) {
            CLI::write($dir);
        }

        CLI::write("Total View Directories: " . count($dirs), 'green');
    }
}