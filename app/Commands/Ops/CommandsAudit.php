<?php

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use ReflectionClass;

class CommandsAudit extends SafeBaseCommand
{
    protected $group = 'ops';
    protected $name = 'ops:commands:audit';
    protected $description = 'Audit registered Spark commands for validity.';
    protected $usage = 'ops:commands:audit';

    public function run(array $params)
    {
        $commands = config('Console')->commands ?? [];

        $rows = [];
        $hasInvalid = false;

        foreach ($commands as $commandClass) {
            $exists = class_exists($commandClass);
            $name = '';
            $group = '';
            $valid = true;

            if (! $exists) {
                $valid = false;
            } else {
                $reflection = new ReflectionClass($commandClass);
                $defaults = $reflection->getDefaultProperties();
                $name = (string) ($defaults['name'] ?? '');
                $group = (string) ($defaults['group'] ?? '');

                if (! $reflection->isSubclassOf(BaseCommand::class)) {
                    $valid = false;
                }

                if ($name === '' || ! str_contains($name, ':')) {
                    $valid = false;
                }

                if ($group === '') {
                    $valid = false;
                }

                if (! $reflection->hasMethod('run')) {
                    $valid = false;
                } else {
                    $method = $reflection->getMethod('run');
                    $methodParams = $method->getParameters();
                    $firstParam = $methodParams[0] ?? null;
                    $paramType = $firstParam?->getType();

                    if ($firstParam === null || $paramType === null || $paramType->getName() !== 'array') {
                        $valid = false;
                    }
                }
            }

            $rows[] = [
                $commandClass,
                $exists ? 'Y' : 'N',
                $name !== '' ? $name : '-',
                $group !== '' ? $group : '-',
                $valid ? 'Y' : 'N',
            ];

            if (! $valid) {
                $hasInvalid = true;
            }
        }

        $headers = ['Class', 'Exists', 'Name', 'Group', 'Valid'];
        $widths = array_map('strlen', $headers);

        foreach ($rows as $row) {
            foreach ($row as $index => $cell) {
                $widths[$index] = max($widths[$index], strlen($cell));
            }
        }

        $divider = '';
        foreach ($widths as $width) {
            $divider .= str_repeat('-', $width + 2);
        }

        $line = '';
        foreach ($headers as $index => $header) {
            $line .= ' ' . str_pad($header, $widths[$index]) . ' ';
        }

        CLI::write($line, 'white');
        CLI::write($divider, 'white');

        foreach ($rows as $row) {
            $rowLine = '';
            foreach ($row as $index => $cell) {
                $rowLine .= ' ' . str_pad($cell, $widths[$index]) . ' ';
            }
            CLI::write($rowLine);
        }

        if ($hasInvalid) {
            CLI::error('One or more registered commands are invalid.');
            return EXIT_ERROR;
        }

        CLI::write('All registered commands are valid.', 'green');
        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
