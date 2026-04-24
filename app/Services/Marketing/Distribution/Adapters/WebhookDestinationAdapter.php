<?php

declare(strict_types=1);

namespace App\Services\Marketing\Distribution\Adapters;

use App\Services\Marketing\Distribution\DestinationSendResult;
use App\Services\Marketing\Distribution\WebhookDistributionService;

final class WebhookDestinationAdapter implements DestinationAdapterInterface
{
    public function __construct(private WebhookDistributionService $service)
    {
    }

    public function send(array $target, array $payload): DestinationSendResult
    {
        $response = $this->service->publish($payload);
        $success = ($response['status'] ?? 'failed') === 'sent';

        return new DestinationSendResult(
            $success,
            null,
            !$success,
            $success ? null : 'webhook_delivery_failed',
            $response['external_id'] ?? null,
            $response['error'] ?? 'webhook_result',
            $success ? date('Y-m-d H:i:s') : null,
            $success ? null : date('Y-m-d H:i:s', strtotime('+5 minutes')),
        );
    }
}
