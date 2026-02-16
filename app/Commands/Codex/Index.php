<?php

namespace App\Commands\Codex;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use App\Libraries\AuditState;

class Index extends SafeBaseCommand
{
    protected $group = 'Codex';
    protected $name = 'codex:index';
    protected $description = 'Index repository and initialize audit state';

    public function run(array $params)
    {
        $mode = $params[0] ?? 'core'; // core or full

        $files = [];

        if ($mode === 'full') {

            $rii = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator(APPPATH)
            );

            foreach ($rii as $file) {
                if ($file->isDir()) continue;
                if ($file->getExtension() === 'php') {
                    $files[] = $file->getPathname();
                }
            }

        } else {

            $paths = [
                APPPATH . 'Controllers',
                APPPATH . 'Models',
                APPPATH . 'Services',
            ];

            foreach ($paths as $path) {
                if (!is_dir($path)) continue;

                $rii = new \RecursiveIteratorIterator(
                    new \RecursiveDirectoryIterator($path)
                );

                foreach ($rii as $file) {
                    if ($file->isDir()) continue;
                    if ($file->getExtension() === 'php') {
                        $files[] = $file->getPathname();
                    }
                }
            }
        }

        file_put_contents(ROOTPATH . 'repo_filtered.txt', implode("\n", $files));

        $state = new AuditState();
        $data = $state->get();
        $data['total_files'] = count($files);
        $data['current_index'] = 0;
        $data['completed'] = [];
        $data['status'] = 'ready';

        $state->save($data);

        CLI::write('Index complete.');
        CLI::write('Total files: ' . count($files));
    }

}
