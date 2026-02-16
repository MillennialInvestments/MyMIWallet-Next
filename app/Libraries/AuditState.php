<?php

namespace App\Libraries;

class AuditState
{
    protected string $path;

    public function __construct()
    {
        $this->path = WRITEPATH . 'audit/state.json';

        if (!file_exists($this->path)) {
            $this->initialize();
        }
    }

    protected function initialize(): void
    {
        $data = [
            'total_files'   => 0,
            'current_index' => 0,
            'completed'     => [],
            'high_issues'   => 0,
            'medium_issues' => 0,
            'status'        => 'idle',
            'last_file'     => null,
        ];

        file_put_contents($this->path, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function get(): array
    {
        return json_decode(file_get_contents($this->path), true);
    }

    public function save(array $data): void
    {
        file_put_contents($this->path, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function reset(): void
    {
        $this->initialize();
    }
}
