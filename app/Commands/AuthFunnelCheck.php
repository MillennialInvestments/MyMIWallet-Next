<?php

declare(strict_types=1);

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use DateInterval;
use DateTimeImmutable;

class AuthFunnelCheck extends BaseCommand
{
    protected $group       = 'maintenance';
    protected $name        = 'auth:funnel-check';
    protected $description = 'Check auth funnel sanity and alert on drop-offs.';

    public function run(array $params)
    {
        $db = db_connect();
        if (! $db->tableExists('bf_user_events')) {
            CLI::write('bf_user_events table missing.');
            return EXIT_ERROR;
        }

        $end = new DateTimeImmutable('now');
        $start = $end->sub(new DateInterval('P1D'));

        $counts = $this->fetchCounts($start, $end);

        CLI::write('Auth funnel check (last 24h)');
        CLI::write('----------------------------------------');
        CLI::write('activation_email_sent: ' . $counts['auth.activation_email_sent']);
        CLI::write('activate_success: ' . $counts['auth.activate_success']);
        CLI::write('register_success: ' . $counts['auth.register_success']);
        CLI::write('login_success: ' . $counts['auth.login_success']);
        CLI::write('resend_activation_requested: ' . $counts['auth.resend_activation_requested']);

        if ($counts['auth.activation_email_sent'] > 0 && $counts['auth.activate_success'] === 0) {
            log_message('error', '[FUNNEL] Activation email sent but no activation success in 24h.');
            CLI::write('ALERT: activation sent > 0 but activation success = 0');
        }

        if ($counts['auth.register_success'] > 0 && $counts['auth.login_success'] === 0) {
            log_message('error', '[FUNNEL] Register success but no login success in 24h.');
            CLI::write('ALERT: register success > 0 but login success = 0');
        }

        $resendSpike = $this->resendSpikeDetected($end, $counts['auth.resend_activation_requested']);
        if ($resendSpike) {
            log_message('warning', '[FUNNEL] Resend activation requests spiking in last 24h.');
            CLI::write('WARN: resend activation spike detected');
        }

        return EXIT_SUCCESS;
    }

    private function fetchCounts(DateTimeImmutable $start, DateTimeImmutable $end): array
    {
        $db = db_connect();
        $eventKeys = [
            'auth.activation_email_sent',
            'auth.activate_success',
            'auth.register_success',
            'auth.login_success',
            'auth.resend_activation_requested',
        ];
        $counts = array_fill_keys($eventKeys, 0);

        $rows = $db->table('bf_user_events')
            ->select('event_key, COUNT(*) AS total')
            ->where('created_at >=', $start->format('Y-m-d H:i:s'))
            ->where('created_at <=', $end->format('Y-m-d H:i:s'))
            ->whereIn('event_key', $eventKeys)
            ->groupBy('event_key')
            ->get()
            ->getResultArray();

        foreach ($rows as $row) {
            $key = $row['event_key'] ?? '';
            if (array_key_exists($key, $counts)) {
                $counts[$key] = (int) $row['total'];
            }
        }

        return $counts;
    }

    private function resendSpikeDetected(DateTimeImmutable $end, int $recentCount): bool
    {
        $db = db_connect();
        $lookbackStart = $end->sub(new DateInterval('P8D'));
        $lookbackEnd = $end->sub(new DateInterval('P1D'));

        $row = $db->table('bf_user_events')
            ->select('COUNT(*) AS total')
            ->where('created_at >=', $lookbackStart->format('Y-m-d H:i:s'))
            ->where('created_at <', $lookbackEnd->format('Y-m-d H:i:s'))
            ->where('event_key', 'auth.resend_activation_requested')
            ->get()
            ->getRowArray();

        $priorTotal = (int) ($row['total'] ?? 0);
        $average = $priorTotal / 7;

        if ($average === 0.0) {
            return $recentCount >= 5;
        }

        return $recentCount >= ($average * 3);
    }
}
