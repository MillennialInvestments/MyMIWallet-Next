<?php

namespace App\Libraries;

class AiOpsGuard
{
    public function flagPath(): string
    {
        return WRITEPATH . 'audit/aiops_disabled.flag';
    }

    public function isDisabled(): bool
    {
        return is_file($this->flagPath());
    }

    public function disable(string $reason): void
    {
        @is_dir(dirname($this->flagPath())) || @mkdir(dirname($this->flagPath()), 0775, true);
        file_put_contents($this->flagPath(), date('c') . " | " . $reason . "\n", FILE_APPEND | LOCK_EX);
    }

    public function enable(): void
    {
        if ($this->isDisabled()) {
            @unlink($this->flagPath());
        }
    }

    public function todayCostUsd(): float
    {
        $costPath = WRITEPATH . 'audit/cost_log.jsonl';
        if (!is_file($costPath)) {
            return 0.0;
        }

        $today = date('Y-m-d');
        $sum = 0.0;

        foreach (file($costPath, FILE_IGNORE_NEW_LINES) as $line) {
            $row = json_decode($line, true);
            if (!is_array($row)) continue;
            if (!isset($row['ts'])) continue;

            if (str_starts_with((string)$row['ts'], $today)) {
                $sum += (float)($row['cost_estimate_usd'] ?? 0.0);
            }
        }

        return $sum;
    }
}
