<?php
namespace App\Libraries;

interface AlertSourceInterface
{
    /**
     * Fetch canonical alert DTOs.
     *
     * @return array<int,array<string,mixed>>
     */
    public function fetch(): array;
}