<?php

declare(strict_types=1);

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use App\Models\AiOpsScanStateModel;
use App\Services\AiOps\CellDiscoveryScanner;
use CodeIgniter\CLI\CLI;

class ScanCells extends SafeBaseCommand
{
    protected $aiOpsRunnable = true;
    protected $group = 'AiOps';
    protected $name = 'aiops:scan:cells';
    protected $description = 'Stateful scanner for repeated UI blocks and Cell candidates.';
    protected $usage = 'php spark aiops:scan:cells [--dry-run=1] [--sleep=900] [--batch=5] [--max-prs=1] [--write-pr=0] [--once=0] [--reset=0]';
    protected $options = [
        '--dry-run' => '1|0 default 1',
        '--sleep' => 'seconds between cycles (default 900)',
        '--batch' => 'queue items per cycle (default 5)',
        '--max-prs' => 'max PR actions per cycle (default 1)',
        '--write-pr' => '1|0 enable phase 2 patching/PR fallback write',
        '--once' => '1|0 run single cycle then exit',
        '--reset' => '1|0 reset scanner queue and state before running',
    ];

    public function run(array $params)
    {
        $scanner = new CellDiscoveryScanner();
        $scannerName = $scanner->scannerName();

        $dryRun = $this->optionInt($params, 'dry-run', 1) === 1;
        $sleep = max(1, $this->optionInt($params, 'sleep', 900));
        $batch = max(1, $this->optionInt($params, 'batch', 5));
        $maxPrs = max(1, $this->optionInt($params, 'max-prs', 1));
        $writePr = $this->optionInt($params, 'write-pr', 0) === 1;
        $once = $this->optionInt($params, 'once', 0) === 1;
        $reset = $this->optionInt($params, 'reset', 0) === 1;

        $stateModel = new AiOpsScanStateModel();
        $state = $stateModel->getOrCreateScannerState($scannerName);

        if ($reset) {
            $scanner->reset();
            CLI::write('Scanner queue/state reset complete.', 'yellow');
            $state = $stateModel->getOrCreateScannerState($scannerName);
        }

        $lastRunAt = $state['last_run_at'] ?? null;
        if (($state['status'] ?? 'idle') === 'running' && $lastRunAt !== null) {
            $seconds = time() - strtotime((string) $lastRunAt);
            if ($seconds < 600) {
                CLI::write('already running', 'red');
                return EXIT_SUCCESS;
            }

            CLI::write('Detected stale running lock; taking over scanner.', 'yellow');
            log_message('warning', 'AiOps scanner stale lock takeover', ['scanner' => $scannerName, 'seconds_since_last_run' => $seconds]);
        }

        $stateModel->update((int) $state['id'], [
            'status' => 'running',
            'sleep_seconds' => $sleep,
            'batch_size' => $batch,
            'max_prs_per_run' => $maxPrs,
            'last_run_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'notes' => 'Scanner active',
        ]);

        while (true) {
            $runDir = ROOTPATH . 'docs/_aiops/scans/cell_discovery/run-' . date('Ymd-His');
            if (! is_dir($runDir)) {
                mkdir($runDir, 0775, true);
            }

            $result = $scanner->runCycle([
                'dry_run' => $dryRun,
                'batch_size' => $batch,
                'max_prs_per_run' => $maxPrs,
                'write_pr' => $writePr,
                'run_dir' => $runDir,
            ]);

            $state = $stateModel->getOrCreateScannerState($scannerName);
            $stateModel->update((int) $state['id'], [
                'last_cursor' => $result['processed'] > 0 ? ('processed:' . $result['processed']) : ($state['last_cursor'] ?? null),
                'cycle_count' => (int) ($state['cycle_count'] ?? 0) + 1,
                'last_run_at' => date('Y-m-d H:i:s'),
                'status' => ((int) ($result['pending_left'] ?? 0) > 0 || (int) ($result['processed'] ?? 0) > 0) ? 'running' : 'completed',
                'updated_at' => date('Y-m-d H:i:s'),
                'notes' => 'Last run dir: ' . str_replace(ROOTPATH, '', (string) $result['run_dir']),
            ]);

            CLI::write(sprintf(
                'Cycle complete. processed=%d candidates=%d pending_left=%d run_dir=%s',
                (int) ($result['processed'] ?? 0),
                (int) ($result['candidates_found'] ?? 0),
                (int) ($result['pending_left'] ?? 0),
                (string) ($result['run_dir'] ?? '-')
            ), 'green');

            log_message('info', 'AiOps cell discovery cycle complete', $result);

            if ($once) {
                CLI::write('--once=1 detected; exiting after single cycle.', 'yellow');
                break;
            }

            if ((int) ($result['pending_left'] ?? 0) === 0 && (int) ($result['processed'] ?? 0) === 0) {
                CLI::write('No pending queue items remain. Scanner completed.', 'green');
                break;
            }

            sleep($sleep);
        }

        $state = $stateModel->getOrCreateScannerState($scannerName);
        $stateModel->update((int) $state['id'], [
            'status' => 'completed',
            'last_run_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'notes' => 'Scanner loop exited cleanly',
        ]);

        return EXIT_SUCCESS;
    }

    private function optionInt(array $params, string $key, int $default): int
    {
        $needle = '--' . $key;
        foreach ($params as $idx => $param) {
            if ($param === $needle && isset($params[$idx + 1])) {
                return (int) $params[$idx + 1];
            }
            if (is_string($param) && str_starts_with($param, $needle . '=')) {
                return (int) substr($param, strlen($needle . '='));
            }
        }

        return $default;
    }
}
