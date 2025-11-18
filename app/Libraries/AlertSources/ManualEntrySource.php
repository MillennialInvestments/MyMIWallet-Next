<?php
namespace App\Libraries\AlertSources;

use App\Libraries\AlertSourceInterface;
use App\Models\AlertsModel;

class ManualEntrySource implements AlertSourceInterface
{
    public function __construct(private ?AlertsModel $alertsModel = null)
    {
        $this->alertsModel = $alertsModel ?? new AlertsModel();
    }

    public function fetch(): array
    {
        $pending = $this->alertsModel->getPendingTradeAlerts();
        return array_map(static function ($row): array {
            return [
                'alert_id'    => $row['id'],
                'symbol'      => $row['ticker'] ?? null,
                'summary'     => $row['trade_description'] ?? '',
                'source'      => 'manual_entry',
                'detected_at' => $row['created_on'] ?? date('Y-m-d H:i:s'),
            ];
        }, $pending ?? []);
    }
}
