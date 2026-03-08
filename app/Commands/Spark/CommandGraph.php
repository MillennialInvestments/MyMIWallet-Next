<?php

namespace App\Commands\Ops\Spark;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class CommandGraph extends SafeBaseCommand
{
    protected $group = 'Spark';
    protected $name = 'spark:commands:graph';
    protected $description = 'Generate Spark command graph';

    public function run(array $params)
    {
        $commands = [];

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(APPPATH . 'Commands')
        );

        foreach ($iterator as $file) {

            if ($file->getExtension() !== 'php') {
                continue;
            }

            $path = str_replace(APPPATH, '', $file->getPathname());

            if (str_contains($path, 'Traits')) continue;
            if (str_contains($path, 'Support')) continue;

            $class = "App\\" . str_replace(
                ['/', '.php'],
                ['\\', ''],
                $path
            );

            if (!class_exists($class)) {
                continue;
            }

            $ref = new \ReflectionClass($class);

            if (!$ref->isSubclassOf(\CodeIgniter\CLI\BaseCommand::class)) {
                continue;
            }

            $commands[] = [
                'class' => $class,
                'file' => $file->getPathname(),
            ];
        }

        $output = [
            'generated_at' => date('c'),
            'command_count' => count($commands),
            'commands' => $commands
        ];

        $target = ROOTPATH . 'docs/_spark_command_graph.json';

        if (!is_dir(dirname($target))) {
            mkdir(dirname($target), 0755, true);
        }

        file_put_contents(
            $target,
            json_encode($output, JSON_PRETTY_PRINT)
        );

        CLI::write('Spark command graph generated:', 'green');
        CLI::write($target);
    }
}