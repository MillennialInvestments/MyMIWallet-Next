<?php

declare(strict_types=1);

namespace App\Services\AIOps;

class ErrorClassifier
{
    public function classify(string $message): string
    {
        if (str_contains($message, 'Undefined variable')) {
            return 'VIEW_ERROR';
        }

        if (str_contains($message, 'Call to undefined method')) {
            return 'CODE_ERROR';
        }

        if (str_contains($message, '404')) {
            return 'ROUTE_ERROR';
        }

        return 'UNKNOWN';
    }
}
