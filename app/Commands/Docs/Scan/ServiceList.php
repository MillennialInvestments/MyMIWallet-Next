<?php

namespace App\Commands\Docs\Scan;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class ServiceList extends SafeBaseCommand
{
    protected $group = 'Docs Scan';
    protected $name = 'docs:services:list';
    protected $description = 'List all Services classes';

    public function run(array $params)
    {
        $path = APPPATH . 'Services';

        $files = $this->scan($path);

        foreach ($files as $file) {
            CLI::write($file);
        }

        CLI::write("Total Services: " . count($files), 'green');
    }

    private function scan($path)
    {
        $rii = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path)
        );

        $files = [];

        foreach ($rii as $file) {

            if ($file->isDir()) continue;

            if ($file->getExtension() === 'php') {
                $files[] = str_replace(ROOTPATH, '', $file->getPathname());
            }
        }

        sort($files);

        return $files;
    }
}