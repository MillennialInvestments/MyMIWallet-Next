<?php

declare(strict_types=1);

namespace App\Libraries;

use InvalidArgumentException;
use RuntimeException;

final class SafeProcess
{
    /**
     * Execute a command without invoking a shell.
     *
     * @param array<int, string> $command
     * @param list<string>       $allowList
     * @param string|null        $input
     */
    public static function run(array $command, array $allowList = [], ?string $input = null, ?string $workingDir = null): array
    {
        if ($command === [] || $command[0] === '') {
            throw new InvalidArgumentException('Command must not be empty.');
        }

        $binary = $command[0];
        if ($allowList !== [] && !in_array($binary, $allowList, true)) {
            throw new InvalidArgumentException(sprintf('Command "%s" is not permitted.', $binary));
        }

        $descriptorSpec = [
            0 => ['pipe', 'w'],
            1 => ['pipe', 'r'],
            2 => ['pipe', 'r'],
        ];

        $process = proc_open($command, $descriptorSpec, $pipes, $workingDir, null, ['bypass_shell' => true]);
        if (!is_resource($process)) {
            throw new RuntimeException('Failed to open process.');
        }

        [$stdin, $stdout, $stderr] = $pipes;

        if ($input !== null) {
            fwrite($stdin, $input);
        }
        fclose($stdin);

        $out = stream_get_contents($stdout) ?: '';
        $err = stream_get_contents($stderr) ?: '';

        fclose($stdout);
        fclose($stderr);

        $exitCode = proc_close($process);

        return [
            'exitCode' => $exitCode,
            'stdout'   => $out,
            'stderr'   => $err,
        ];
    }
}
