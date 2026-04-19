<?php

declare(strict_types=1);

namespace App\Services;

class MobileAuthContext
{
    private ?int $userId = null;

    public function setUserId(?int $userId): void
    {
        $this->userId = $userId !== null ? (int) $userId : null;
    }

    public function userId(): ?int
    {
        return $this->userId;
    }

    public function clear(): void
    {
        $this->userId = null;
    }
}
