<?php

namespace App\Modules\APIs\Controllers;

use App\Models\MDIT\MditWebhookEventModel;
use App\Services\MDIT\MditDepositService;
use CodeIgniter\HTTP\ResponseInterface;

#[\AllowDynamicProperties]
class MditWebhookAPIController extends MditBaseController
{
    private MditDepositService $depositService;
    private MditWebhookEventModel $events;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->depositService = new MditDepositService();
        $this->events = new MditWebhookEventModel();
    }

    public function onramp(): ResponseInterface
    {
        $rawPayload = $this->request->getBody();
        if (! $this->isValidSignature($rawPayload)) {
            return $this->failUnauthorized('Invalid webhook signature.');
        }

        $payload = $this->request->getJSON(true) ?? [];
        $provider = $payload['provider'] ?? 'sandbox';
        $eventId = $payload['event_id'] ?? null;
        $eventType = $payload['event_type'] ?? 'unknown';

        if (! $eventId) {
            return $this->failValidationErrors('Missing event_id.');
        }

        $eventPayload = [
            'provider' => $provider,
            'event_id' => $eventId,
            'event_type' => $eventType,
            'payload_json' => json_encode($payload),
            'payload_hash' => hash('sha256', $rawPayload),
            'received_on' => date('Y-m-d H:i:s'),
            'status' => 'RECEIVED',
            'error_message' => null,
        ];

        $event = $this->depositService->logWebhookEvent($eventPayload);

        try {
            if ($eventType === 'deposit.confirmed') {
                $depositId = (int) ($payload['deposit_id'] ?? 0);
                $txHash = trim((string) ($payload['tx_hash'] ?? ''));

                if ($depositId > 0 && $txHash !== '') {
                    $this->depositService->confirmDeposit($depositId, $txHash);
                }
            }

            $this->events->update($event['id'], [
                'processed_on' => date('Y-m-d H:i:s'),
                'status' => 'PROCESSED',
            ]);
        } catch (\Throwable $e) {
            $this->events->update($event['id'], [
                'processed_on' => date('Y-m-d H:i:s'),
                'status' => 'FAILED',
                'error_message' => $e->getMessage(),
            ]);

            log_message('error', 'MDIT webhook processing failed: {msg}', ['msg' => $e->getMessage()]);
        }

        return $this->respond([
            'status' => 'success',
            'data' => ['event_id' => $eventId],
        ]);
    }

    private function isValidSignature(string $payload): bool
    {
        $secret = env('mdit.webhookSecret');
        if (! $secret) {
            return true;
        }

        $signature = $this->request->getHeaderLine('X-Webhook-Signature');
        if ($signature === '') {
            return false;
        }

        $expected = hash_hmac('sha256', $payload, $secret);
        $normalized = str_replace('sha256=', '', $signature);

        return hash_equals($expected, $normalized);
    }
}
