<?php

namespace App\Commands\Contracts;

interface DryRunCapable
{
    public function supportsDryRun(): bool;
}
