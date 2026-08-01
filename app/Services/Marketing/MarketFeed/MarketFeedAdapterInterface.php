<?php

declare(strict_types=1);

namespace App\Services\Marketing\MarketFeed;

interface MarketFeedAdapterInterface
{
    public function parse(string $input): array;
}
