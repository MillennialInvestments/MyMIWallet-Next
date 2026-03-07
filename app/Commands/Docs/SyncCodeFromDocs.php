<?php

namespace App\Commands\Docs;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use App\Services\Docs\DocsSyncEngine;

class SyncCodeFromDocs extends SafeBaseCommand
{
    protected $group = 'Docs';
    protected $name = 'docs:sync-code';
    protected $description = 'Analyze /docs and generate repository patches to align code with documentation.';

    protected $usage = 'php spark docs:sync-code [--create-pr=1] [--dry-run=0]';

    public function run(array $params)
    {
        CLI::write("Starting Docs → Code synchronization...", 'yellow');

        $createPR = CLI::getOption('create-pr') ?? 0;
        $dryRun   = CLI::getOption('dry-run') ?? 0;

        $engine = service('docsSyncEngine');

        $result = $engine->execute([
            'createPR' => (bool)$createPR,
            'dryRun'   => (bool)$dryRun
        ]);
        
        CLI::write("Docs scanned: " . $result['files_scanned'], 'cyan');
        CLI::write("Files modified: " . $result['files_modified'], 'green');
        CLI::write(json_encode($result, JSON_PRETTY_PRINT), 'green');
    }
}