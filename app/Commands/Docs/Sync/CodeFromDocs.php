<?php

namespace App\Commands\Docs\Sync;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Throwable;

class CodeFromDocs extends SafeBaseCommand
{
    protected $group = 'Docs';
    protected $name = 'docs:sync-code';
    protected $description = 'Analyze /docs and execute DocsSyncEngine safely.';
    protected $usage = 'docs:sync-code';

    public function run(array $params)
    {
        CLI::write('Starting Docs → Code synchronization...', 'yellow');

        try {
            $engine = null;

            if (function_exists('service')) {
                $engine = service('docsSyncEngine');
            }

            if ($engine === null && class_exists(\App\Services\Docs\DocsSyncEngine::class)) {
                $engine = new \App\Services\Docs\DocsSyncEngine();
            }

            if ($engine === null) {
                throw new \RuntimeException('DocsSyncEngine service could not be resolved.');
            }

            if (! method_exists($engine, 'execute')) {
                throw new \RuntimeException('DocsSyncEngine does not expose execute().');
            }

            $result = $engine->execute([
                'source' => ROOTPATH . 'docs',
                'dry_run' => false,
            ]);

            CLI::write(json_encode([
                'status' => 'success',
                'command' => 'docs:sync-code',
                'result' => $result,
            ], JSON_PRETTY_PRINT), 'green');

            return EXIT_SUCCESS;
        } catch (Throwable $e) {
            CLI::error($e->getMessage());

            log_message('error', 'docs:sync-code failed: {message}', [
                'message' => $e->getMessage(),
            ]);

            return EXIT_ERROR;
        }
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}