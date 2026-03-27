<?php

declare(strict_types=1);

namespace App\Services;

class PatchGeneratorService
{
    public function generatePatchSummary(string $target, string $reason): string
    {
        return sprintf('Patch requested for %s: %s', $target, trim($reason));
    }
}
