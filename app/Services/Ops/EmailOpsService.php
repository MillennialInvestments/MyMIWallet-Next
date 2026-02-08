<?php

namespace App\Services\Ops;

class EmailOpsService
{
    public function healthcheck(): array
    {
        return ['ok' => true, 'smtp' => 'up', 'imap' => 'up'];
    }

    public function queueScan(): array
    {
        return ['ok' => true, 'queued_messages' => 0];
    }

    public function sendTest(string $to): array
    {
        return ['ok' => true, 'recipient' => $to, 'message' => 'Test dispatch simulated'];
    }
}
