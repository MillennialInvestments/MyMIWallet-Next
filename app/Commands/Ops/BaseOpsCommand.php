<?php

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

abstract class BaseOpsCommand extends SafeBaseCommand
{
    protected function writeJson(array $payload): void
    {
        CLI::write(json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?: '{}');
    }

    protected function respond(array $payload): int
    {
        $ok = (bool) ($payload['ok'] ?? true);
        $this->writeJson($payload);

        return $ok ? EXIT_SUCCESS : EXIT_ERROR;
    }
}
