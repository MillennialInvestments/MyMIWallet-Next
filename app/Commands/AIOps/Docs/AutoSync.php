<?php

declare(strict_types=1);

namespace App\Commands\AIOps\Docs;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class AutoSync extends SafeBaseCommand
{
    protected $group = 'AIOps - Docs';
    protected $name = 'aiops:docs-sync';
    protected $description = 'Run documentation sync pipeline using DocsSyncEngine';

    protected $usage = 'php spark aiops:docs-sync';

    public function run(array $params)
    {
        CLI::write('Starting Docs → Code synchronization pipeline...', 'yellow');

        try {

            $engine = service('docsSyncEngine');

            $result = $engine->execute([
                'createPR' => true,
                'dryRun' => false
            ]);

            CLI::write('Docs sync completed.', 'green');
            CLI::write(json_encode($result, JSON_PRETTY_PRINT));

            log_message('info', 'DocsAutoSync completed: {result}', [
                'result' => json_encode($result)
            ]);

        } catch (\Throwable $e) {

            CLI::error('DocsAutoSync failed: ' . $e->getMessage());

            log_message('error', 'DocsAutoSync failure: {error}', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

        }
    }
}