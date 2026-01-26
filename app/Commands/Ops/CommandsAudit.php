<?php

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Services;
use ReflectionClass;
use Throwable;

class CommandsAudit extends SafeBaseCommand
{
    protected string $group = 'ops';
    protected string $name = 'ops:commands:audit';
    protected string $description = 'Audit registered Spark commands for validity.';
    protected string $usage = 'ops:commands:audit';

    public function run(array $params)
    {
        $console = config('Console');
        $commands = $console->commands ?? [];
        $logger = Services::logger();

        $rows = [];
        $hasInvalid = false;

        foreach ($commands as $commandClass) {
            $exists = class_exists($commandClass);
            $name = '';
            $group = '';
            $valid = true;
            $reasons = [];

            if (! $exists) {
                $valid = false;
                $reasons[] = 'Class not found';
            } else {
                $reflection = new ReflectionClass($commandClass);
                $defaults = $reflection->getDefaultProperties();
                $name = (string) ($defaults['name'] ?? '');
                $group = (string) ($defaults['group'] ?? '');

                if (! $reflection->isSubclassOf(BaseCommand::class)) {
                    $valid = false;
                    $reasons[] = 'Does not extend BaseCommand';
                }

                if ($name === '' || ! str_contains($name, ':')) {
                    $valid = false;
                    $reasons[] = 'Missing or invalid $name';
                }

                if ($group === '') {
                    $valid = false;
                    $reasons[] = 'Missing $group';
                }

                if (! $reflection->hasMethod('run')) {
                    $valid = false;
                    $reasons[] = 'Missing run(array $params)';
                } else {
                    $method = $reflection->getMethod('run');
                    $methodParams = $method->getParameters();
                    $firstParam = $methodParams[0] ?? null;
                    $paramType = $firstParam?->getType();

                    if ($firstParam === null || $paramType === null || $paramType->getName() !== 'array') {
                        $valid = false;
                        $reasons[] = 'run() signature must accept array $params';
                    }
                }

                try {
                    $reflection->newInstance($logger, (array) $console);
                } catch (Throwable $e) {
                    $valid = false;
                    $reasons[] = 'Instantiation failed: ' . $e->getMessage();
                }
            }

            $rows[] = [
                $commandClass,
                $exists ? 'Y' : 'N',
                $name !== '' ? $name : '-',
                $group !== '' ? $group : '-',
                $valid ? 'Y' : 'N',
                $reasons ? implode('; ', $reasons) : '-',
            ];

            if (! $valid) {
                $hasInvalid = true;
            }
        }

        $headers = ['Class', 'Exists', 'Name', 'Group', 'Valid', 'Reasons'];
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
            CLI::error('One or more registered commands are invalid. See reasons above.');
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
