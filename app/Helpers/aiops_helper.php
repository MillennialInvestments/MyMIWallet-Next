<?php

declare(strict_types=1);

if (! function_exists('aiops_now')) {
    function aiops_now(): string
    {
        return date(DATE_ATOM);
    }
}
