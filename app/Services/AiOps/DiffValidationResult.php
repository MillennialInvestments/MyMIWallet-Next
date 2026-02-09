<?php

declare(strict_types=1);

namespace App\Services\AiOps;

final class DiffValidationResult
{
    /** @param array<int,string> $filesTouched @param array<int,string> $violations */
    public function __construct(
        public bool $valid,
        public array $filesTouched,
        public array $violations,
        public string $status,
    ) {
    }
}
