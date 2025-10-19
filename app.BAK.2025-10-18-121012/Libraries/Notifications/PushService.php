<?php
namespace App\Libraries\Notifications;

use App\Models\PushSubscriptionModel;
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

class PushService
{
    private WebPush $webPush;

    public function __construct()
    {
        $this->webPush = new WebPush([
            'VAPID' => [
                'subject' => getenv('VAPID_SUBJECT') ?: 'mailto:admin@localhost',
                'publicKey' => getenv('VAPID_PUBLIC_KEY') ?: '',
                'privateKey' => getenv('VAPID_PRIVATE_KEY') ?: '',
            ]
        ]);
        $this->webPush->setDefaultOptions(['TTL' => 60]);
    }

    /**
     * Enqueue a push notification to a user via the queue.
     */
    public static function enqueueToUser(int $userId, array $payload): void
    {
        \App\Libraries\Queue\Queue::push('default', [
            'type' => 'push.send',
            'data' => ['user_id'=>$userId, 'payload'=>$payload],
        ], 0);
    }

    /**
     * Worker entry point: send notification to all active subscriptions.
     */
    public function sendToUser(int $userId, array $payload): bool
    {
        $subs = (new PushSubscriptionModel())->activeByUser($userId);
        if (!$subs) {
            return true; // nothing to do
        }
        $ok = true;
        foreach ($subs as $row) {
            $sub = Subscription::create([
                'endpoint' => $row['endpoint'],
                'publicKey' => $row['p256dh'],
                'authToken' => $row['auth'],
                'contentEncoding' => 'aes128gcm',
            ]);
            $res = $this->webPush->sendOneNotification($sub, json_encode($payload, JSON_UNESCAPED_SLASHES));
            if ($res->isSuccess()) {
                (new PushSubscriptionModel())->update($row['id'], ['last_sent_at'=>date('Y-m-d H:i:s')]);
            } else {
                $ok = false;
                $reason = $res->getReason() ?: 'unknown';
                if ($res->isSubscriptionExpired() || str_contains(strtolower($reason), 'gone')) {
                    (new PushSubscriptionModel())->update($row['id'], ['revoked_at'=>date('Y-m-d H:i:s')]);
                }
                log_message('warning', 'push failed: {reason}', ['reason'=>$reason]);
            }
        }
        return $ok;
    }
}
