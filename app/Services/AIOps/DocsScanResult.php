<?php

declare(strict_types=1);

namespace App\Services\AIOps;

class DocsScanResult
{
    public array $readLog;
    public array $gapItems;

    public function __construct(array $readLog, array $gapItems)
    {
        $this->readLog = $readLog;
        $this->gapItems = $gapItems;
    }
}
