<?php

declare(strict_types=1);

namespace App\Filters;

use App\Services\Payments\PayPalSubscriptionClient;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Guards the PayPal webhook route: the request reaches the controller only
 * when PayPal itself confirms the delivery's signature for our webhook id.
 *
 * Off by default: without PAYPAL_WEBHOOK_ID and the PayPal REST keys every
 * request is refused with 503 and nothing is read or written.
 */
final class PayPalWebhookFilter implements FilterInterface
{
    private const MAX_BYTES = 262144;

    /** @var PayPalSubscriptionClient|null lets tests supply a client */
    public static ?PayPalSubscriptionClient $client = null;

    public function before(RequestInterface $request, $arguments = null)
    {
        if (! PayPalSubscriptionClient::webhookConfigured()) {
            return $this->reject(503, 'PayPal webhooks are not turned on.');
        }

        $body = (string) $request->getBody();
        if ($body === '' || strlen($body) > self::MAX_BYTES) {
            return $this->reject(400, 'Bad webhook payload.');
        }

        $headers = [];
        foreach (['paypal-auth-algo', 'paypal-cert-url', 'paypal-transmission-id', 'paypal-transmission-sig', 'paypal-transmission-time'] as $name) {
            $headers[$name] = $request->getHeaderLine($name);
        }

        if (! (self::$client ?? new PayPalSubscriptionClient())->verifyWebhook($headers, $body)) {
            log_message('warning', 'PayPal webhook refused: signature not verified');

            return $this->reject(401, 'Webhook signature not verified.');
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return null;
    }

    private function reject(int $status, string $message): ResponseInterface
    {
        return service('response')->setStatusCode($status)->setJSON(['status' => 'error', 'message' => $message]);
    }
}
