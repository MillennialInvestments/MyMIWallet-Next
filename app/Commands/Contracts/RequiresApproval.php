<?php

namespace App\Commands\Contracts;

interface RequiresApproval
{
    public function requiresApproval(): bool;
}
