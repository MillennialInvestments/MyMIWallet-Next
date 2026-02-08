<?php

declare(strict_types=1);

namespace App\Services\Ops;

class SparkRunnerService
{
    /** @var list<string> */
    private array $allowPrefixes = [
        'ops:',
        'aiops:',
        'logs:',
        'runtime:',
        'security:',
        'contentengine:',
        'chat:',
        'app:',
    ];

    public function run(string $command, array $args = [], array $opts = []): array
    {
        $command = trim($command);
        if (! $this->isAllowed($command)) {
            return [
                'ok' => false,
                'command' => $command,
                'output' => 'Command prefix not allowed.',
                'ran_at' => date('c'),
            ];
        }

        $parts = [$command];
        foreach ($args as $arg) {
            $parts[] = escapeshellarg((string) $arg);
        }
        foreach ($opts as $key => $value) {
            $parts[] = '--' . $key . '=' . escapeshellarg((string) $value);
        }

        $cliCommand = implode(' ', $parts);
        $output = '';

        if (function_exists('command')) {
            $output = (string) command($cliCommand);
        }

        return [
            'ok' => true,
            'command' => $cliCommand,
            'output' => $output,
            'ran_at' => date('c'),
        ];
    }

    private function isAllowed(string $command): bool
    {
        foreach ($this->allowPrefixes as $prefix) {
            if (str_starts_with($command, $prefix)) {
                return true;
            }
        }

        return false;
    }
}
