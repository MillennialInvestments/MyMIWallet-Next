<?php

namespace App\Modules\PropFirms\Libraries;

class PropFirmsService
{
    public function dashboardSummary(int $userId): array
    {
        return [
            'user_id' => $userId,
            'active_accounts' => 0,
            'open_positions' => 0,
            'today_pnl' => 0.0,
            'last_sync_at' => null,
        ];
    }
}
