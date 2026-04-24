<?php

declare(strict_types=1);

namespace App\Services\Marketing\Distribution;

use App\Services\Marketing\Distribution\Adapters\DestinationAdapterInterface;

final class DestinationDispatcher
{
    /** @param array<string,DestinationAdapterInterface> $adapters */
    public function __construct(private array $adapters)
    {
    }

    /** @param array<string,mixed> $target @param array<string,mixed> $payload */
    public function dispatch(array $target, array $payload): DestinationSendResult
    {
        $destination = (string) ($target['destination'] ?? '');
        $channel = (string) ($target['channel'] ?? 'marketing');
        $key = $channel === 'discord' ? 'discord' : $destination;

        $adapter = $this->adapters[$key] ?? null;
        if ($adapter === null) {
            return new DestinationSendResult(false, null, false, 'destination_unknown', null, 'No adapter for destination: ' . $key);
        }

        return $adapter->send($target, $payload);
    }
}
