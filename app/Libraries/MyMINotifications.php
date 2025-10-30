<?php

namespace App\Libraries;

use App\Libraries\{BaseLoader};
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;
use Config\Notifications;
use Config\Services;

#[\AllowDynamicProperties]
class MyMINotifications
{

    protected $auth;
    protected $session;

    public function __construct()
    {
        $config = new Notifications();
        $this->auth = [
            'VAPID' => [
                'subject' => $config->vapid['subject'],
                'publicKey' => $config->vapid['publicKey'],
                'privateKey' => $config->vapid['privateKey'],
            ]
        ];
        $this->session = Services::session();
    }

    public function subscribe($subscriptionData)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('bf_users_notification_subscriptions');
        $builder->insert([
            'endpoint' => $subscriptionData['endpoint'],
            'public_key' => $subscriptionData['keys']['p256dh'],
            'auth_token' => $subscriptionData['keys']['auth'],
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function sendNotification($title, $body, $image = null)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('bf_users_notification_subscriptions');
        $subscriptions = $builder->get()->getResultArray();
        $webPush = new WebPush($this->auth);

        foreach ($subscriptions as $subscription) {
            $subscriptionObj = Subscription::create([
                'endpoint' => $subscription['endpoint'],
                'keys' => [
                    'p256dh' => $subscription['public_key'],
                    'auth' => $subscription['auth_token']
                ]
            ]);
            $notificationPayload = [
                'title' => $title,
                'body' => $body,
                'image' => $image, // Add the image URL here
            ];
            $payload = json_encode($notificationPayload);
            if (strlen($payload) <= 4096) {
                $webPush->queueNotification(
                    $subscriptionObj,
                    $payload
                );
            } else {
                // Handle the case where the payload exceeds the limit
                error_log("Notification payload exceeds 4096 bytes: " . strlen($payload) . " bytes");
            }
        }
        $webPush->flush();
    }

    public function sendWebSocketNotification($message, $category = null)
    {
        $loop = \React\EventLoop\Factory::create();
        $connector = new \Ratchet\Client\Connector($loop);

        $connector('ws://localhost:8080')->then(function (\Ratchet\Client\WebSocket $conn) use ($message, $category) {
            $notification = ['message' => $message, 'category' => $category];
            $conn->send(json_encode($notification));
            $conn->close();
        }, function ($e) {
            echo "Could not connect: {$e->getMessage()}\n";
        });

        $loop->run();
    }

    public function unsubscribe($endpoint)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('bf_users_notification_subscriptions');
        $builder->delete(['endpoint' => $endpoint]);
    }

    /**
     * Retrieve deduplicated notifications for a user.
     */
    public function forUser(int $userId): array
    {
        $items = $this->session->get('notifications_' . $userId) ?? [];
        $seen = [];
        $out = [];
        foreach ($items as $n) {
            $key = ($n['title'] ?? '') . '|' . ($n['description'] ?? '');
            if (!isset($seen[$key])) {
                $seen[$key] = true;
                $out[] = $n;
            }
        }
        return $out;
    }

    public function forChain(int $userId, string $chain): array
    {
        return $this->forUser($userId);
    }
}
?>
