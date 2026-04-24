<?php

declare(strict_types=1);

namespace App\Services\Marketing\Distribution\Adapters;

use App\Services\Marketing\Distribution\DestinationSendResult;

interface DestinationAdapterInterface
{
    /** @param array<string,mixed> $target @param array<string,mixed> $payload */
    public function send(array $target, array $payload): DestinationSendResult;
}
