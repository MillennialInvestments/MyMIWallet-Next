<?php

declare(strict_types=1);

namespace App\Services\AIOps;

class RegressionEvaluator
{
    public function evaluate(array $baseline, array $current): array
    {
        $changed = [];
        foreach ($current as $path => $hash) {
            if (($baseline[$path] ?? null) !== $hash) {
                $changed[] = $path;
            }
        }

        return [
            'ok' => $changed === [],
            'changed' => $changed,
            'baseline_count' => count($baseline),
            'current_count' => count($current),
        ];
    }
}
