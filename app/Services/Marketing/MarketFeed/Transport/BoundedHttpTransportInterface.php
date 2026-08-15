<?php

declare(strict_types=1);

namespace App\Services\Marketing\MarketFeed\Transport;

interface BoundedHttpTransportInterface
{
    public function request(
        BoundedHttpRequest $request
    ): BoundedHttpResponse;
}
