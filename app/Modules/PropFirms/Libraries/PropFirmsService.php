<?php

namespace App\Modules\PropFirms\Libraries;

use Config\Database;

class PropFirmsService
{
    public function dashboardSummary(int $userId): array
    {
        $db = Database::connect();

        $accounts = $db->table('bf_user_prop_accounts')
            ->select('id, current_balance, updated_at')
            ->where('user_id', $userId)
            ->get()
            ->getResultArray();

        $accountIds = array_map(static fn (array $row): int => (int) $row['id'], $accounts);

        $openPositions = 0;
        $todayPnl = 0.0;
        $latestSignals = [];
        $signalHistory = [];
        $notifications = [];

        if ($accountIds !== []) {
            $openPositions = $db->table('bf_prop_positions')
                ->whereIn('user_prop_account_id', $accountIds)
                ->where('closed_at', null)
                ->countAllResults();

            $todayRows = $db->table('bf_prop_signals')
                ->select('signal_type, signal_strength')
                ->whereIn('user_prop_account_id', $accountIds)
                ->where('DATE(triggered_at)', date('Y-m-d'))
                ->get()
                ->getResultArray();

            foreach ($todayRows as $row) {
                $todayPnl += ((string) $row['signal_type'] === 'TRADE_SIGNAL_CONFIRMED' ? 1 : -0.5) * (float) ($row['signal_strength'] ?? 0);
            }

            $latestSignals = $db->table('bf_prop_signals')
                ->select('id, user_prop_account_id, symbol, signal_type, signal_strength, triggered_at')
                ->whereIn('user_prop_account_id', $accountIds)
                ->orderBy('triggered_at', 'DESC')
                ->limit(4)
                ->get()
                ->getResultArray();

            $signalHistory = $db->table('bf_prop_signals')
                ->select('id, user_prop_account_id, symbol, signal_type, signal_strength, triggered_at')
                ->whereIn('user_prop_account_id', $accountIds)
                ->orderBy('triggered_at', 'DESC')
                ->limit(50)
                ->get()
                ->getResultArray();

            $notifications = $db->table('bf_prop_notifications')
                ->select('id, user_prop_account_id, symbol, type, subject, body, status, created_at, read_at')
                ->whereIn('user_prop_account_id', $accountIds)
                ->orderBy('created_at', 'DESC')
                ->limit(20)
                ->get()
                ->getResultArray();
        }

        $lastSyncAt = null;
        foreach ($accounts as $account) {
            $updatedAt = $account['updated_at'] ?? null;
            if ($updatedAt !== null && ($lastSyncAt === null || strtotime((string) $updatedAt) > strtotime((string) $lastSyncAt))) {
                $lastSyncAt = (string) $updatedAt;
            }
        }

        return [
            'user_id' => $userId,
            'active_accounts' => count($accounts),
            'open_positions' => $openPositions,
            'today_pnl' => $todayPnl,
            'last_sync_at' => $lastSyncAt,
            'latest_signals' => $latestSignals,
            'signal_history' => $signalHistory,
            'notifications' => $notifications,
            'unread_notifications' => count(array_filter($notifications, static fn (array $item): bool => empty($item['read_at']))),
        ];
    }
}
