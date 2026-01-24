<?php

declare(strict_types=1);

namespace App\Commands\Auth;

use App\Services\Spark\AuthFunnelCheckService;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use DateInterval;
use DateTimeImmutable;

class FunnelCheck extends BaseCommand
{
    protected $group       = 'auth';
    protected $name        = 'auth:funnel-check';
    protected $description = 'Check auth funnel sanity using recent user events and emit alerts on drop-offs.';

    protected $arguments = [];
    protected $options = [
        '--dry-run' => 'Preview actions without writing data',
        '--force'   => 'Required for destructive actions',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:auth:funnel-check] Started');
        CLI::write('Starting auth:funnel-check', 'yellow');

        $dryRun = $this->option('dry-run') !== null || ! $this->option('force');
        if ($dryRun) {
            CLI::write('Dry-run enabled (read-only checks will still run).', 'yellow');
        }

        $end = new DateTimeImmutable('now');
        $start = $end->sub(new DateInterval('P1D'));

        $service = new AuthFunnelCheckService();
        $result = $service->run($start, $end);

        if (! $result['ok']) {
            CLI::error($result['message'] ?? 'Unable to run funnel check.');
            log_message('error', '[spark:auth:funnel-check] Failed', ['message' => $result['message'] ?? null]);
            return EXIT_ERROR;
        }

        $counts = $result['counts'] ?? [];

        CLI::write('Auth funnel check (last 24h)');
        CLI::write('----------------------------------------');
        CLI::write('activation_email_sent: ' . ($counts['auth.activation_email_sent'] ?? 0));
        CLI::write('activate_success: ' . ($counts['auth.activate_success'] ?? 0));
        CLI::write('register_success: ' . ($counts['auth.register_success'] ?? 0));
        CLI::write('login_success: ' . ($counts['auth.login_success'] ?? 0));
        CLI::write('resend_activation_requested: ' . ($counts['auth.resend_activation_requested'] ?? 0));

        foreach ($result['alerts'] ?? [] as $alert) {
            if (str_contains($alert, 'spiking')) {
                log_message('warning', '[FUNNEL] ' . $alert);
                CLI::write('WARN: ' . $alert);
            } else {
                log_message('error', '[FUNNEL] ' . $alert);
                CLI::write('ALERT: ' . $alert);
            }
        }

        log_message('info', '[spark:auth:funnel-check] Completed', [
            'total_events' => array_sum($counts),
            'dry_run' => $dryRun,
        ]);

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
