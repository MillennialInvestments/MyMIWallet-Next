<?php

namespace App\Commands\Docs\Generate;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class DocsReadmeBuilder extends SafeBaseCommand
{
    protected $group = 'Docs Generate';
    protected $name = 'docs:readme:build';

    public function run(array $params)
    {

        $base = ROOTPATH . 'docs';

        $dirs = glob($base . '/*', GLOB_ONLYDIR);

        foreach ($dirs as $dir) {

            $files = glob($dir . '/*.md');

            $readme = "# " . basename($dir) . " Documentation\n\n";

            $readme .= "Last Generated: " . date('Y-m-d H:i:s') . "\n\n";

            foreach ($files as $file) {

                $name = basename($file);

                if ($name === 'README.md') continue;

                $readme .= "- {$name}\n";
            }

            file_put_contents($dir . '/README.md', $readme);

            CLI::write("Generated README for: " . basename($dir), 'green');
        }
    }
}