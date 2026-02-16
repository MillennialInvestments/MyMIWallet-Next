<?php

namespace App\Commands\AiOps\Observe;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use App\Libraries\ErrorFingerprint;

class Hash extends SafeBaseCommand
{
    protected $group = 'AiOps';
    protected $name = 'aiops:observe:hash';
    protected $description = 'Fingerprint recurring errors into stable hashes';

    public function run(array $params)
    {
        $statePath = WRITEPATH . 'audit/observability_state.json';
        $outPath   = WRITEPATH . 'audit/observability_fingerprints.json';

        if (!file_exists($statePath)) {
            CLI::error('Run aiops:observe:scan first.');
            return;
        }

        $state = json_decode(file_get_contents($statePath), true);
        $errors = $state['errors'] ?? [];

        $fp = new ErrorFingerprint();
        $map = [];

        foreach ($errors as $line => $count) {
            $hash = $fp->fingerprint($line);
            $map[$hash] = ($map[$hash] ?? 0) + (int)$count;
        }

        arsort($map);

        file_put_contents($outPath, json_encode([
            'timestamp' => date('c'),
            'fingerprints' => $map
        ], JSON_PRETTY_PRINT));

        CLI::write("Wrote: {$outPath}");
    }
}
