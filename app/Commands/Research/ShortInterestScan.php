<?php

declare(strict_types=1);

namespace App\Commands\Research;

class ShortInterestScan extends BaseResearchTaskCommand
{
    protected $group = 'research';
    protected $name = 'research:short-interest:scan';
    protected $description = 'Scan short-interest candidates';
    protected string $taskKey = 'short_interest_scan';
}