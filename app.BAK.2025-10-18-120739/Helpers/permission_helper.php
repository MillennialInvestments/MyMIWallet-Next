<?php
use App\Libraries\Auth\Gate;

if (! function_exists('can')) {
    function can(string $capability, ?int $userId = null): bool
    {
        return Gate::allows($capability, $userId);
    }
}
