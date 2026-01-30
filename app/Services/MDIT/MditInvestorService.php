<?php

namespace App\Services\MDIT;

use App\Models\MDIT\MditInvestorProfileModel;
use App\Services\MDIT\Providers\Kyc\SandboxKycProvider;

class MditInvestorService
{
    private MditInvestorProfileModel $profiles;
    private SandboxKycProvider $kycProvider;

    public function __construct(?MditInvestorProfileModel $profiles = null, ?SandboxKycProvider $kycProvider = null)
    {
        $this->profiles = $profiles ?? new MditInvestorProfileModel();
        $this->kycProvider = $kycProvider ?? new SandboxKycProvider();
    }

    public function getOrCreateProfile(int $userId): array
    {
        $profile = $this->profiles->where('user_id', $userId)->first();
        if ($profile) {
            return $profile;
        }

        $id = $this->profiles->insert([
            'user_id' => $userId,
            'kyc_status' => 'PENDING',
            'accreditation_status' => 'PENDING',
            'created_on' => date('Y-m-d H:i:s'),
            'updated_on' => date('Y-m-d H:i:s'),
        ], true);

        return $this->profiles->find($id);
    }

    public function startKyc(int $userId): array
    {
        $this->getOrCreateProfile($userId);

        return $this->kycProvider->startKyc($userId);
    }

    public function refreshKycStatus(int $userId): array
    {
        $profile = $this->getOrCreateProfile($userId);
        $kycStatus = $this->kycProvider->getKycStatus($userId);
        $accreditationStatus = $this->kycProvider->getAccreditationStatus($userId);

        $updates = [
            'kyc_status' => $kycStatus,
            'updated_on' => date('Y-m-d H:i:s'),
        ];

        if (! empty($accreditationStatus) && $accreditationStatus !== 'PENDING') {
            $updates['accreditation_status'] = $accreditationStatus;
        }

        $this->profiles->update($profile['id'], $updates);

        return $this->profiles->find($profile['id']);
    }

    public function attestAccreditation(int $userId, bool $accredited): array
    {
        $profile = $this->getOrCreateProfile($userId);
        $status = $accredited ? 'ACCREDITED' : 'REJECTED';

        $this->profiles->update($profile['id'], [
            'accreditation_status' => $status,
            'updated_on' => date('Y-m-d H:i:s'),
        ]);

        return $this->profiles->find($profile['id']);
    }

    public function isVerifiedAndAccredited(int $userId): bool
    {
        $profile = $this->getOrCreateProfile($userId);

        return ($profile['kyc_status'] ?? '') === 'VERIFIED'
            && ($profile['accreditation_status'] ?? '') === 'ACCREDITED';
    }
}
