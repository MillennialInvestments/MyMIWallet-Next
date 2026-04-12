<?php

namespace App\Modules\PropFirms\Libraries;

use App\Modules\PropFirms\Models\PropNotificationModel;

class PropNotificationService
{
    private PropNotificationModel $notifications;

    public function __construct(?PropNotificationModel $notifications = null)
    {
        $this->notifications = $notifications ?? new PropNotificationModel();
    }

    public function notify(array $payload, int $rollingWindowSeconds = 600): ?int
    {
        $accountId = (int) ($payload['user_prop_account_id'] ?? 0);
        $symbol = strtoupper((string) ($payload['symbol'] ?? ''));
        $type = strtoupper((string) ($payload['type'] ?? 'INFO'));
        $eventKey = sha1(implode('|', [$accountId, $symbol, $type, (string) ($payload['subject'] ?? '')]));

        $since = date('Y-m-d H:i:s', time() - $rollingWindowSeconds);
        $duplicate = $this->notifications
            ->where('event_key', $eventKey)
            ->where('created_at >=', $since)
            ->first();

        if ($duplicate !== null) {
            return null;
        }

        $insert = [
            'user_prop_account_id' => $accountId > 0 ? $accountId : null,
            'channel' => (string) ($payload['channel'] ?? 'dashboard'),
            'type' => $type,
            'symbol' => $symbol !== '' ? $symbol : null,
            'subject' => (string) ($payload['subject'] ?? 'Prop Firms Alert'),
            'body' => (string) ($payload['body'] ?? ''),
            'status' => (string) ($payload['status'] ?? 'queued'),
            'event_key' => $eventKey,
            'payload_json' => json_encode((array) ($payload['data'] ?? []), JSON_UNESCAPED_SLASHES),
            'sent_at' => isset($payload['sent_at']) ? (string) $payload['sent_at'] : null,
            'read_at' => null,
        ];

        $id = $this->notifications->insert($insert, true);

        return $id ? (int) $id : null;
    }

    public function markAsRead(int $notificationId): bool
    {
        return $this->notifications->update($notificationId, [
            'status' => 'read',
            'read_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
