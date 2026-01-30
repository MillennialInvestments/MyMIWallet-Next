<?php

namespace App\Services\MDIT;

use App\Models\MDIT\MditRedemptionModel;
use App\Models\MDIT\MditTokenLedgerModel;

class MditRedemptionService
{
    private MditRedemptionModel $redemptions;
    private MditTokenLedgerModel $ledger;

    public function __construct(
        ?MditRedemptionModel $redemptions = null,
        ?MditTokenLedgerModel $ledger = null
    ) {
        $this->redemptions = $redemptions ?? new MditRedemptionModel();
        $this->ledger = $ledger ?? new MditTokenLedgerModel();
    }

    public function userTokenBalance(int $userId): float
    {
        $minted = (float) ($this->ledger->selectSum('units')->where('user_id', $userId)->where('status', 'MINTED')->first()['units'] ?? 0);
        $burned = (float) ($this->ledger->selectSum('units')->where('user_id', $userId)->where('status', 'BURNED')->first()['units'] ?? 0);

        return $minted - $burned;
    }

    public function requestRedemption(array $payload): array
    {
        $balance = $this->userTokenBalance((int) $payload['user_id']);
        if ($balance < (float) $payload['token_units']) {
            throw new \RuntimeException('Insufficient token balance.');
        }

        $id = $this->redemptions->insert($payload, true);

        return $this->redemptions->find($id);
    }

    public function approveRedemption(int $redemptionId, int $adminId, ?string $notes = null): array
    {
        $redemption = $this->redemptions->find($redemptionId);
        if (! $redemption) {
            throw new \RuntimeException('Redemption not found.');
        }

        if (($redemption['status'] ?? '') !== 'REQUESTED') {
            throw new \RuntimeException('Redemption is not pending.');
        }

        $burnId = $this->ledger->insert([
            'user_id' => $redemption['user_id'],
            'wallet_address' => $redemption['wallet_address'],
            'token_symbol' => 'MDIT',
            'units' => $redemption['token_units'],
            'burned_on' => date('Y-m-d H:i:s'),
            'source_redemption_id' => $redemptionId,
            'status' => 'BURNED',
        ], true);

        $this->redemptions->update($redemptionId, [
            'approved_on' => date('Y-m-d H:i:s'),
            'approved_by' => $adminId,
            'status' => 'COMPLETED',
            'notes' => $notes,
        ]);

        $redemption = $this->redemptions->find($redemptionId);
        $redemption['burn_ledger_id'] = $burnId;

        return $redemption;
    }
}
