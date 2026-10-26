<?php

declare(strict_types=1);

namespace App\Models\Options;

use CodeIgniter\Model;

class OptionsExitAlertModel extends Model
{
    protected $table = 'bf_options_exit_alerts';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'position_id',
        'ticker',
        'alert_type',
        'severity',
        'recommended_action',
        'current_profit',
        'target_profit',
        'summary',
        'notified_discord',
        'notified_email',
        'status',
        'created_at',
        'dispatched_at',
    ];
    protected $useTimestamps = false;

    public function getPendingAlerts(): array
    {
        return $this->where('status', 'pending')
            ->orderBy('created_at', 'ASC')
            ->findAll();
    }
}
