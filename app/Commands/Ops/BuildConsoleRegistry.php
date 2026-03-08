<?php

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class BuildConsoleRegistry extends SafeBaseCommand
{
    protected $group = 'ops';
    protected $name = 'ops:console:build';
    protected $description = 'Rebuild Console.php command registry';

    public function run(array $params)
    {
        $basePath = APPPATH . 'Commands';
        $commands = [];

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($basePath)
        );

        foreach ($iterator as $file) {
            if (!$file->isFile()) {
                continue;
            }

            if ($file->getExtension() !== 'php') {
                continue;
            }

            $path = str_replace(APPPATH, '', $file->getPathname());

            if (str_contains($path, 'Traits')) continue;
            if (str_contains($path, 'Contracts')) continue;
            if (str_contains($path, 'Support')) continue;

            $class = str_replace(
                ['/', '.php'],
                ['\\', ''],
                $path
            );

            $class = "\\App\\" . $class;

            $commands[] = $class . "::class";
        }

        sort($commands);

        $output = "<?php\n\nnamespace Config;\n\nuse CodeIgniter\Config\BaseConfig;\n\nclass Console extends BaseConfig\n{\n\n    public array \$commands = [\n";

        foreach ($commands as $cmd) {
            $output .= "        {$cmd},\n";
        }

        $output .= "    ];\n\n    public bool \$showHelp = true;\n}\n";

        file_put_contents(APPPATH . 'Config/Console.php', $output);

        CLI::write("Console registry rebuilt.", 'green');
    }
}