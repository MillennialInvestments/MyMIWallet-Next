<?php

namespace App\Services\AIOps;

class GapItem
{
    public string $type;
    public string $file;
    public string $description;
    public int $priority = 0;

    public function __construct(
        string $type,
        string $file,
        string $description,
        int $priority = 0
    ) {
        $this->type = $type;
        $this->file = $file;
        $this->description = $description;
        $this->priority = $priority;
    }
}