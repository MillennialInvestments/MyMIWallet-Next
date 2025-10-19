<?php
namespace App\Modules\Notifications\Controllers;

use App\Controllers\BaseController;
use App\Models\PushSubscriptionModel;
use App\Libraries\Notifications\PushService;
use App\Libraries\Flags;

class PushController extends BaseController
{
    public function publicKey()
    {
        return $this->response->setJSON([
            'status' => 'success',
            'data'   => ['vapidPublicKey' => getenv('VAPID_PUBLIC_KEY') ?: ''],
            'csrf'   => csrf_hash(),
        ]);
    }

    public function subscribe()
    {
        if (! can('notifications.subscribe')) {
            return $this->forbid();
        }
        $uid = (int) (session('cuID') ?? 0);
        $sub = $this->request->getJSON(true) ?: $this->request->getPost();
        if (!isset($sub['endpoint'], $sub['keys']['p256dh'], $sub['keys']['auth'])) {
            return $this->fail('Invalid subscription');
        }
        $sub['ua'] = (string) $this->request->getUserAgent()->getAgentString();
        (new PushSubscriptionModel())->upsertForUser($uid, $sub);
        audit('push.subscribe', ['endpoint'=>'…'.substr(sha1($sub['endpoint']), -8)], 'push');
        return $this->ok('Subscribed');
    }

    public function unsubscribe()
    {
        if (! can('notifications.subscribe')) {
            return $this->forbid();
        }
        $payload = $this->request->getJSON(true) ?: $this->request->getPost();
        $endpoint = $payload['endpoint'] ?? '';
        if ($endpoint === '') {
            return $this->fail('endpoint required');
        }
        (new PushSubscriptionModel())->revokeByEndpoint($endpoint);
        audit('push.unsubscribe', ['endpoint'=>'…'.substr(sha1($endpoint), -8)], 'push');
        return $this->ok('Unsubscribed');
    }

    public function testSend()
    {
        if (! can('notifications.send')) {
            return $this->forbid();
        }
        if (! Flags::enabled('ops.push')) {
            return $this->fail('Push disabled');
        }
        $uid   = (int) ($this->request->getPost('user_id') ?? session('cuID') ?? 0);
        $title = (string) ($this->request->getPost('title') ?? 'Test Notification');
        $body  = (string) ($this->request->getPost('body') ?? 'Hello from MyMI');
        $url   = (string) ($this->request->getPost('url') ?? site_url('/'));
        PushService::enqueueToUser($uid, [
            'title'=>$title,'body'=>$body,'url'=>$url,'icon'=>'/icons/icon-192.svg','tag'=>'test'
        ]);
        audit('push.enqueue', ['user_id'=>$uid,'title'=>$title], 'push');
        return $this->ok('Queued');
    }

    private function ok(string $msg, array $data = [])
    {
        return $this->response->setJSON(['status' => 'success', 'message' => $msg, 'data' => $data, 'csrf' => csrf_hash()]);
    }
    private function fail(string $msg)
    {
        return $this->response->setJSON(['status' => 'error', 'message' => $msg, 'csrf' => csrf_hash()]);
    }
    private function forbid()
    {
        return $this->response->setStatusCode(403)->setJSON(['status' => 'error', 'message' => 'Forbidden', 'csrf' => csrf_hash()]);
    }
}
