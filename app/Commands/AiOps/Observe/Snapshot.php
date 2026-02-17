<?php

namespace App\Commands\AiOps\Observe;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Snapshot extends SafeBaseCommand
{
    protected $group = 'AIOps - Observe';
    protected $name = 'aiops:observe:snapshot';
    protected $description = 'Snapshot fingerprint map for regression detection';

    public function run(array $params)
    {
        $fpPath = WRITEPATH . 'audit/observability_fingerprints.json';
        if (!is_file($fpPath)) {
            CLI::error('Missing fingerprints file. Run: php spark aiops:observe:hash');
            return;
        }

        $dir = WRITEPATH . 'audit/fingerprints_history';
        @is_dir($dir) || @mkdir($dir, 0775, true);

        $ts = date('Ymd_His');
        $out = $dir . "/fingerprints_{$ts}.json";

        copy($fpPath, $out);

        CLI::write("Snapshot saved: {$out}");
    }
}
