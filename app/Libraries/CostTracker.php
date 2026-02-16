<?php

namespace App\Libraries;

class CostTracker
{
    protected string $path;

    public function __construct()
    {
        $this->path = WRITEPATH . 'audit/cost_log.jsonl';
    }

    public function log(array $usage, string $model): void
    {
        $costPer1k = [
            'gpt-4o' => 0.005, // example pricing (adjust)
        ];

        $tokens = $usage['total_tokens'] ?? 0;
        $cost = ($tokens / 1000) * ($costPer1k[$model] ?? 0.005);

        $entry = [
            'ts' => date('c'),
            'model' => $model,
            'tokens' => $tokens,
            'cost_estimate_usd' => round($cost, 6),
        ];

        file_put_contents($this->path, json_encode($entry) . "\n", FILE_APPEND);
    }
}
