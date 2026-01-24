<?php

namespace App\Services\Spark;

use DateInterval;
use DateTimeImmutable;

class AuthFunnelCheckService
{
    public function run(DateTimeImmutable $start, DateTimeImmutable $end): array
    {
        $db = db_connect();
        if (! $db->tableExists('bf_user_events')) {
            return [
                'ok' => false,
                'message' => 'bf_user_events table missing.',
            ];
        }

        $counts = $this->fetchCounts($start, $end);
        $alerts = [];

        if ($counts['auth.activation_email_sent'] > 0 && $counts['auth.activate_success'] === 0) {
            $alerts[] = 'Activation email sent but no activation success in 24h.';
        }

        if ($counts['auth.register_success'] > 0 && $counts['auth.login_success'] === 0) {
            $alerts[] = 'Register success but no login success in 24h.';
        }

        if ($this->resendSpikeDetected($end, $counts['auth.resend_activation_requested'])) {
            $alerts[] = 'Resend activation requests spiking in last 24h.';
        }

        return [
            'ok' => true,
            'counts' => $counts,
            'alerts' => $alerts,
        ];
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
