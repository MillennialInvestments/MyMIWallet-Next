<?php
namespace App\Services;

use App\Models\AlertsModel;

class TradeAlertsIngest
{
    /**
     * Ingest a quick trade alert into the existing alerts flow.
     */
    public function ingestQuick(string $symbol, string $side, array $meta = []): bool
    {
        $model = model(AlertsModel::class);
        $data = [
            'ticker'        => strtoupper($symbol),
            'trade_type'    => strtoupper($side),
            'status'        => 'queued',
            'email_subject' => $meta['subject'] ?? null,
            'email_body'    => $meta['note'] ?? null,
            'source'        => $meta['source'] ?? 'email-intake',
            'created_on'    => date('Y-m-d H:i:s'),
        ];
        return (bool) $model->addTrade($data);
    }
}
?>