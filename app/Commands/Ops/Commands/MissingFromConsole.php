<?php

namespace App\Commands\Ops\Commands;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class MissingFromConsole extends SafeBaseCommand
{
    protected $group = 'ops';
    protected $name = 'ops:commands:missing';
    protected $description = 'Check commands missing from Console registry';

    public function run(array $params)
    {
        $this->parseParams($params);

        $console = config('Console');

        $registered = $console->commands ?? [];

        // Convert ::class entries to real class strings
        $normalized = [];

        foreach ($registered as $entry) {
            if (is_string($entry)) {
                $normalized[] = ltrim($entry, '\\');
            }
        }

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(APPPATH . 'Commands')
        );

        foreach ($iterator as $file) {

            if ($file->getExtension() !== 'php') {
                continue;
            }

            $path = str_replace(APPPATH, '', $file->getPathname());

            // Ignore traits / helpers
            if (str_contains($path, 'Traits')) continue;
            if (str_contains($path, 'Support')) continue;
            if (str_contains($path, 'Contracts')) continue;

            $class = "App\\" . str_replace(
                ['/', '.php'],
                ['\\', ''],
                $path
            );

            if (!in_array($class, $normalized, true)) {
                CLI::write("Missing: \\" . $class, 'yellow');
            }
        }

        CLI::write("Audit complete.", 'green');
    }
}