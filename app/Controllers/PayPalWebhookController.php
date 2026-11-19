<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\Payments\MembershipLifecycleService;
use App\Services\Payments\MembershipSubscriptionService;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Receives PayPal webhooks for auto-renewing memberships.
 *
 * The paypalWebhook route filter has already had PayPal confirm the
 * signature, so everything here is a genuine PayPal event.
 */
final class PayPalWebhookController extends Controller
{
    public function receive(): ResponseInterface
    {
        $event = json_decode((string) $this->request->getBody(), true);
        if (! is_array($event)) {
            return $this->response->setStatusCode(400)->setJSON(['status' => 'error']);
        }

        try {
            $result = (new MembershipSubscriptionService())->handleEvent($event);
        } catch (\Throwable $e) {
            log_message('error', 'PayPal webhook {type} failed: {m}', ['type' => (string) ($event['event_type'] ?? ''), 'm' => $e->getMessage()]);

            // 500 makes PayPal deliver the event again later.
            return $this->response->setStatusCode(500)->setJSON(['status' => 'error']);
        }

        if ($result['reason'] === 'renewed') {
            (new MembershipLifecycleService())->sendReceipt(
                (int) $result['user_id'],
                (string) $result['plan'],
                (float) $result['amount'],
                (string) $result['expires_at'],
                (string) $result['sale_id']
            );
        }
        log_message('info', 'PayPal webhook {type}: {reason}', ['type' => (string) ($event['event_type'] ?? ''), 'reason' => $result['reason']]);

        // A write that failed should be retried; anything else is final.
        $retry = in_array($result['reason'], ['schema_error', 'schema_missing', 'not_configured'], true);

        return $this->response->setStatusCode($retry ? 500 : 200)->setJSON(['status' => $retry ? 'error' : 'ok', 'result' => $result['reason']]);
    }
}
