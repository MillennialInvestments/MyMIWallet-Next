<?php

namespace App\Services\Triage;

class CommandRunner
{
    public function run(string $command): array
    {
        $output = [];
        $exitCode = 0;

        exec($command . ' 2>&1', $output, $exitCode);

        return [
            'command' => $command,
            'output' => $output,
            'exit_code' => $exitCode,
        ];
    }
}
