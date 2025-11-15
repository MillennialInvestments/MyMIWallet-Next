<?php
namespace App\DTO;

final class InvoiceDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $status,
        public readonly string $created_at,
        public readonly string $updated_at,
        public readonly array $data = []
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['status'] ?? '',
            $data['created_at'] ?? '',
            $data['updated_at'] ?? '',
            $data['data'] ?? []
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'data' => $this->data,
        ];
    }
}
?>