<?php

declare(strict_types=1);

namespace App\Models\Options;

use CodeIgniter\Model;

class OptionsPositionModel extends Model
{
    protected $table = 'bf_options_positions';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'trade_uuid',
        'user_id',
        'ticker',
        'strategy',
        'expiry',
        'contracts_count',
        'call_strike',
        'put_strike',
        'entry_stock_price',
        'entry_debit_per_pair',
        'total_entry_debit',
        'target_net_profit',
        'target_combined_exit',
        'current_combined_bid',
        'current_combined_value',
        'current_unrealized_pnl',
        'peak_unrealized_pnl',
        'status',
        'exit_reason',
        'closed_combined_credit',
        'realized_pnl',
        'entry_at',
        'closed_at',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps = false;

    /**
     * Fetch all open active positions requiring live monitoring.
     *
     * @return array
     */
    public function getActivePositions(): array
    {
        return $this->whereIn('status', [
            'open',
            'warning_momentum',
            'warning_trailing',
            'warning_theta',
            'warning_spread',
            'target_reached',
        ])
        ->orderBy('created_at', 'DESC')
        ->findAll();
    }

    /**
     * Find position by trade UUID.
     *
     * @param string $uuid
     * @return array|null
     */
    public function findByUuid(string $uuid): ?array
    {
        return $this->where('trade_uuid', $uuid)->first();
    }

    /**
     * Calculate summary metrics across all active positions.
     *
     * @return array
     */
    public function getActiveSummary(): array
    {
        $active = $this->getActivePositions();
        $totalCapital = 0.0;
        $totalValue = 0.0;
        $totalUnrealizedPnl = 0.0;
        $targetReachedCount = 0;
        $warningCount = 0;

        foreach ($active as $p) {
            $totalCapital += (float) ($p['total_entry_debit'] ?? 0);
            $totalValue += (float) ($p['current_combined_value'] ?? $p['total_entry_debit'] ?? 0);
            $totalUnrealizedPnl += (float) ($p['current_unrealized_pnl'] ?? 0);
            if (($p['status'] ?? '') === 'target_reached') {
                $targetReachedCount++;
            }
            if (str_starts_with((string) ($p['status'] ?? ''), 'warning_')) {
                $warningCount++;
            }
        }

        return [
            'active_positions_count' => count($active),
            'total_invested_debit' => $totalCapital,
            'current_total_value' => $totalValue,
            'total_unrealized_pnl' => $totalUnrealizedPnl,
            'target_reached_count' => $targetReachedCount,
            'warning_count' => $warningCount,
        ];
    }
}
