<?php

declare(strict_types=1);

namespace App\Commands\Traits;

trait CiRuntimeCheck
{
    protected function isCiRuntime(): bool
    {
        return PHP_SAPI === 'cli';
    }
}
