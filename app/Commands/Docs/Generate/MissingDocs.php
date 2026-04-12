<?php

declare(strict_types=1);

namespace App\Commands\Docs\Generate;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class MissingDocs extends SafeBaseCommand
{

    protected $group = 'Docs';
    protected $name = 'docs:generate-missing';
    protected $description = 'Generate documentation for undocumented controllers';

    public function run(array $params)
    {

        CLI::write('Generating missing documentation...', 'yellow');

        $controllerPath = APPPATH . 'Controllers';
        $docPath = ROOTPATH . 'docs/controllers';

        if (!is_dir($docPath)) {
            mkdir($docPath, 0755, true);
        }

        $files = glob($controllerPath . '/*.php');

        foreach ($files as $file) {

            $name = basename($file, '.php');

            $docFile = $docPath . '/' . $name . '.md';

            if (file_exists($docFile)) {
                continue;
            }

            $markdown = "# {$name}\n\n";
            $markdown .= "Controller Documentation\n\n";
            $markdown .= "## Location\n";
            $markdown .= "`{$file}`\n\n";
            $markdown .= "## Purpose\n";
            $markdown .= "Describe controller functionality.\n\n";

            file_put_contents($docFile, $markdown);

            CLI::write("Created doc: {$docFile}", 'green');
        }

        CLI::write('Missing documentation generated.', 'green');
    }
}