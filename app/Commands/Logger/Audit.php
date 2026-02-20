<?php

namespace App\Commands\Logger;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Logger;

class Audit extends SafeBaseCommand
{
    protected $group = 'Diagnostics';
    protected $name = 'logger:audit';
    protected $description = 'Audit logger handlers for overlap and recursion risks.';

    public function run(array $params)
    {
        $config = new Logger();
        $handlers = $config->handlers;

        $levelMap = [];

        foreach ($handlers as $class => $settings) {

            $levels = $settings['handles'] ?? $settings['levels'] ?? [];

            foreach ($levels as $level) {

                if (! isset($levelMap[$level])) {
                    $levelMap[$level] = [];
                }

                $levelMap[$level][] = $class;
            }
        }

        foreach ($levelMap as $level => $classes) {
            if (count($classes) > 1) {
                CLI::write("⚠ Overlapping level '{$level}' handled by:", 'yellow');
                foreach ($classes as $class) {
                    CLI::write("  - {$class}");
                }
            }
        }

        CLI::write("Logger audit complete.", 'green');
    }
}
