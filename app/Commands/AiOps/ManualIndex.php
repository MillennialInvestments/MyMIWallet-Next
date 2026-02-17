<?php

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class ManualIndex extends SafeBaseCommand
{
    protected $group = 'AIOps - Run';
    protected $name = 'aiops:manual:index';
    protected $description = 'Index AI manual documentation under docs/_aiops/manual';

    public function run(array $params)
    {
        $path = ROOTPATH . 'docs/_aiops/manual';

        if (!is_dir($path)) {
            CLI::error("Directory not found: {$path}");
            return;
        }

        $files = glob($path . '/*.md');

        $index = [];

        foreach ($files as $file) {
            $index[] = [
                'file' => basename($file),
                'path' => str_replace(ROOTPATH, '', $file),
                'updated_at' => date('c', filemtime($file)),
                'size_bytes' => filesize($file)
            ];
        }

        file_put_contents(
            $path . '/index.json',
            json_encode([
                'generated_at' => date('c'),
                'total_docs' => count($index),
                'documents' => $index
            ], JSON_PRETTY_PRINT)
        );

        CLI::write('Manual documentation index updated.');
        CLI::write('Total docs: ' . count($index));
    }
}
