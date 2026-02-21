<?php

declare(strict_types=1);

namespace App\Services\AiOps;

class OllamaPatchResult
{
    public string $status;
    public array $data;

    public function __construct(string $status, array $data = [])
    {
        $this->status = $status;
        $this->data   = $data;
    }

    public static function success(string $status, array $data = []): self
    {
        return new self($status, $data);
    }

    public static function failed(string $status, string $message): self
    {
        return new self($status, ['error' => $message]);
    }

    public function toArray(): array
    {
        return [
            'status' => $this->status,
            'data'   => $this->data,
        ];
    }
}