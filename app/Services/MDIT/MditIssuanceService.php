<?php

namespace App\Services\MDIT;

use App\Models\MDIT\MditDepositModel;
use App\Models\MDIT\MditTokenLedgerModel;

class MditIssuanceService
{
    private MditDepositModel $deposits;
    private MditTokenLedgerModel $ledger;
    private MditNavService $navService;

    public function __construct(
        ?MditDepositModel $deposits = null,
        ?MditTokenLedgerModel $ledger = null,
        ?MditNavService $navService = null
    ) {
        $this->deposits = $deposits ?? new MditDepositModel();
        $this->ledger = $ledger ?? new MditTokenLedgerModel();
        $this->navService = $navService ?? new MditNavService();
    }

    public function mintForDeposit(int $depositId, string $tokenSymbol = 'MDIT'): array
    {
        $deposit = $this->deposits->find($depositId);
        if (! $deposit) {
            throw new \RuntimeException('Deposit not found.');
        }

        if (($deposit['status'] ?? '') !== 'CONFIRMED_ONCHAIN') {
            throw new \RuntimeException('Deposit is not confirmed on-chain.');
        }

        if (strtoupper((string) ($deposit['asset_symbol'] ?? '')) !== 'USDC') {
            throw new \RuntimeException('Only USDC deposits are supported in Phase 1.');
        }

        $existing = $this->ledger->where('source_deposit_id', $depositId)->first();
        if ($existing) {
            return $existing;
        }

        $latestNav = $this->navService->latestSnapshot();
        $navPerUnit = (float) ($latestNav['nav_per_unit'] ?? 1.0);
        if ($navPerUnit <= 0) {
            $navPerUnit = 1.0;
        }

        $amountUsd = (float) $deposit['amount'];
        $units = $amountUsd / $navPerUnit;

        $ledgerId = $this->ledger->insert([
            'user_id' => $deposit['user_id'],
            'wallet_address' => $deposit['wallet_address'],
            'token_symbol' => $tokenSymbol,
            'units' => $units,
            'nav_at_mint' => $navPerUnit,
            'minted_on' => date('Y-m-d H:i:s'),
            'source_deposit_id' => $depositId,
            'status' => 'MINTED',
        ], true);

        $this->deposits->update($depositId, [
            'status' => 'MINTED',
            'updated_on' => date('Y-m-d H:i:s'),
        ]);

        return $this->ledger->find($ledgerId);
    }
}
