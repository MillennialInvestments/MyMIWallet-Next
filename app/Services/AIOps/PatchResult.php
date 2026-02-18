<?php

declare(strict_types=1);

namespace App\Services\AIOps;

final class PatchResult
{
    /** @param array<string,mixed> $meta */
    public function __construct(
        public string $status,
        public string $jobId,
        public ?string $diffPath,
        public bool $diffValid,
        public array $meta = [],
    ) {
    }

    /** @return array<string,mixed> */
    public function toArray(): array
    {
        return array_merge($this->meta, [
            'status' => $this->status,
            'job_id' => $this->jobId,
            'diff_path' => $this->diffPath,
            'diff_valid' => $this->diffValid,
            'timestamp' => gmdate('c'),
        ]);
    }
}
