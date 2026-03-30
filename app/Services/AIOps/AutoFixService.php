<?php

declare(strict_types=1);

namespace App\Services\AIOps;

class AutoFixService
{
    public function suggestFix(string $error): array
    {
        return [
            'fix' => 'Check view variables or route mapping',
            'confidence' => 0.6,
            'input' => $error,
        ];
    }
}
