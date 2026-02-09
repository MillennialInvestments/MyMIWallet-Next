<?php

declare(strict_types=1);

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use App\Services\AiOps\BacklogMetaService;
use CodeIgniter\CLI\CLI;

class Unlock extends SafeBaseCommand
{
    protected $group = 'AI-Ops';
    protected $name = 'aiops:unlock';
    protected $description = 'Manually unlock an AIOPS patch job and reset retries.';
    protected $usage = 'aiops:unlock {jobId}';

    public function run(array $params)
    {
        [$args] = $this->parseParams($params);
        $jobId = trim((string) ($args[0] ?? ''));

        if ($jobId === '') {
            CLI::error('Usage: php spark aiops:unlock {jobId}');

            return EXIT_ERROR;
        }

        $metaService = new BacklogMetaService();
        $meta = $metaService->loadMeta($jobId);
        $meta['locked'] = false;
        $meta['attempts'] = 0;
        $meta['last_run'] = gmdate('c');
        $meta['last_status'] = 'manually_unlocked';
        $metaService->saveMeta($jobId, $meta);

        $unlockDir = ROOTPATH . 'docs/_aiops/unlocks';
        if (! is_dir($unlockDir)) {
            mkdir($unlockDir, 0775, true);
        }

        file_put_contents($unlockDir . '/' . $jobId . '.json', json_encode([
            'job_id' => $jobId,
            'action' => 'manual_unlock',
            'timestamp' => gmdate('c'),
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);

        CLI::write('[AIOPS UNLOCK] Unlocked job: ' . $jobId, 'green');

        return EXIT_SUCCESS;
    }
}
