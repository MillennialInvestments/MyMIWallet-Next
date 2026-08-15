<?php

declare(strict_types=1);

namespace App\Services\Marketing\MarketFeed\Transport;

interface PublicIpv4ResolverInterface
{
    public function resolvePublicIpv4(
        string $hostname
    ): string;
}
