<?php

namespace App\Commands\Env;

use App\Commands\SafeBaseCommand;
use App\Libraries\DiscordAlert;
use App\Services\Ops\EnvDoctorService;
use CodeIgniter\CLI\CLI;

class EnvDoctor extends SafeBaseCommand
{
    protected $group       = 'env';
    protected $name        = 'env:doctor';
    protected $description = 'Environment diagnostics and snapshot.';
    protected $options     = [
        '--notify=discord' => 'Send summary to Discord.',
        '--pack' => 'Bundle JSON/Markdown into a tar.gz for sharing.',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $pack = isset($flags['pack']);
        $cron = isset($flags['cron']);
        $notifyDiscord = isset($flags['notify=discord']) || isset($flags['notify-discord']);

        $doctor = new EnvDoctorService();
        $previousPayload = $doctor->loadLatestReport();
        $previous = $previousPayload['report'] ?? null;

        $result = $doctor->run($pack && ! $cron);
        $report = $result['report'];
        $paths = $result['paths'];

        if (! $cron) {
            $summary = $report['summary'] ?? ['counts' => ['ok' => 0, 'warning' => 0, 'critical' => 0]];
            $counts = $summary['counts'];
            CLI::write('Env Doctor completed.', 'green');
            CLI::write(sprintf(
                'Status: %s | Score: %d | ok:%d warning:%d critical:%d',
                strtoupper($report['status'] ?? 'unknown'),
                $summary['score'] ?? 0,
                $counts['ok'] ?? 0,
                $counts['warning'] ?? 0,
                $counts['critical'] ?? 0
            ));
            CLI::newLine();
            CLI::write('JSON: ' . ($paths['json'] ?? 'n/a'));
            CLI::write('Markdown: ' . ($paths['markdown'] ?? 'n/a'));
            if (! empty($paths['pack'])) {
                CLI::write('Pack: ' . $paths['pack']);
            }
        }

        if ($cron || $notifyDiscord) {
            $this->notifyDiscordIfNeeded($report, $previous);
        }

        return ($report['status'] ?? 'ok') === 'critical' ? EXIT_ERROR : EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }

    private function notifyDiscordIfNeeded(array $report, ?array $previous): void
    {
        $status = $report['status'] ?? 'ok';
        $currentCritical = $this->extractCriticalKeys($report);
        $previousCritical = $this->extractCriticalKeys($previous ?? []);
        $newCritical = array_values(array_diff($currentCritical, $previousCritical));

        if ($status === 'ok' && $newCritical === []) {
            return;
        }

        $summary = $report['summary'] ?? ['counts' => ['ok' => 0, 'warning' => 0, 'critical' => 0], 'score' => 0];
        $counts = $summary['counts'] ?? ['ok' => 0, 'warning' => 0, 'critical' => 0];

        $message = implode("\n", array_filter([
            'Env Doctor CRON summary',
            'Status: ' . strtoupper($status) . ' | Score: ' . ($summary['score'] ?? 0),
            sprintf('Checks: ok=%d warning=%d critical=%d', $counts['ok'] ?? 0, $counts['warning'] ?? 0, $counts['critical'] ?? 0),
            $newCritical !== [] ? ('New critical: ' . implode(', ', $newCritical)) : null,
        ]));

        DiscordAlert::send($message);
    }

    private function extractCriticalKeys(array $report): array
    {
        $findings = $report['findings'] ?? [];
        $critical = [];
        foreach ($findings as $finding) {
            if (($finding['status'] ?? '') === 'critical') {
                $critical[] = $finding['key'] ?? 'unknown';
            }
        }

        return array_values(array_unique(array_filter($critical)));
    }
}
