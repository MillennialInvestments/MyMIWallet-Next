<?php

namespace App\Services;

use App\Libraries\MyMIAlerts;
use App\Models\AlertsModel;

class AlertService
{
    protected MyMIAlerts $alertManager;
    protected AlertsModel $alertsModel;

    public function __construct(?MyMIAlerts $alertManager = null, ?AlertsModel $alertsModel = null)
    {
        $this->alertManager = $alertManager ?? new MyMIAlerts();
        $this->alertsModel  = $alertsModel ?? new AlertsModel();
    }

    public function getAlertManager(): MyMIAlerts
    {
        return $this->alertManager;
    }

    public function getAlertsModel(): AlertsModel
    {
        return $this->alertsModel;
    }

    public function generateAlertCommentary(int $alertId): ?array
    {
        $alert = $this->alertsModel->find($alertId);
        if (! is_array($alert)) {
            return null;
        }

        return $this->alertManager->generateAlertCommentaryWithKimi($alert);
    }

    public function generateAlertSocialCopy(int $alertId): ?array
    {
        $alert = $this->alertsModel->find($alertId);
        if (! is_array($alert)) {
            return null;
        }

        return $this->alertManager->generateAlertSocialCopyWithKimi($alert);
    }

    /**
     * @param int[] $ids
     * @return array<int, mixed>
     */
    public function generateAlertBatchCommentary(array $ids): array
    {
        if ($ids === []) {
            return [];
        }

        $alerts = $this->alertsModel->whereIn('id', $ids)->findAll();
        $responses = [];

        foreach ($alerts as $alert) {
            $alertId = (int) ($alert['id'] ?? 0);
            if ($alertId <= 0) {
                continue;
            }

            $responses[$alertId] = $this->alertManager->generateAlertCommentaryWithKimi((array) $alert);
        }

        return $responses;
    }
}
