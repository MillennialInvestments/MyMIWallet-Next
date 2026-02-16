<?php

namespace App\Commands\Codex;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class Index extends BaseCommand
{
    protected $group       = 'Codex';
    protected $name        = 'codex:index';
    protected $description = 'Generate repo_filtered.txt';

    public function run(array $params)
    {
        $rii = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(APPPATH)
        );

        $files = [];

        foreach ($rii as $file) {
            if ($file->isDir()) continue;

            if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
                $files[] = $file->getPathname();
            }
        }

        file_put_contents(ROOTPATH . 'repo_filtered.txt', implode("\n", $files));

        CLI::write('repo_filtered.txt generated.');
    }
}
