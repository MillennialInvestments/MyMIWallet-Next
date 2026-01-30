<?php

namespace App\Services\MDIT\Providers\Kyc;

class SandboxKycProvider
{
    public function startKyc(int $userId): array
    {
        return [
            'session_id' => 'sandbox-' . $userId . '-' . time(),
            'redirect_url' => '/dashboard/kyc/sandbox?user=' . $userId,
        ];
    }

    public function getKycStatus(int $userId): string
    {
        return strtoupper((string) (env('mdit.sandboxKycStatus') ?? 'PENDING'));
    }

    public function getAccreditationStatus(int $userId): string
    {
        return strtoupper((string) (env('mdit.sandboxAccreditationStatus') ?? 'PENDING'));
    }
}
