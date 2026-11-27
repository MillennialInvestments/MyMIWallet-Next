<?php

namespace App\Services\MDIT;

use App\Models\MDIT\MditDepositModel;
use App\Models\MDIT\MditTokenLedgerModel;
use CodeIgniter\Database\BaseConnection;
use Config\Database;
use RuntimeException;

/**
 * Service for MyMI Coin offering under MDIT Reg D 506(c).
 *
 * Core Guarantees:
 * 1. Accredited-only: Non-accredited users are strictly blocked from deposit and minting.
 * 2. Zero public purchase button; zero exchange listing; no guaranteed return claims.
 * 3. Ledger anchoring: Mints accredited units into MDIT ledger (token symbol MYMIC).
 */
class MyMICoinOfferingService
{
    protected BaseConnection $db;
    protected MditInvestorService $investorService;
    protected MditDepositService $depositService;
    protected MditIssuanceService $issuanceService;

    public function __construct(
        ?BaseConnection $db = null,
        ?MditInvestorService $investorService = null,
        ?MditDepositService $depositService = null,
        ?MditIssuanceService $issuanceService = null
    ) {
        $this->db = $db ?? Database::connect();
        $this->investorService = $investorService ?? new MditInvestorService();
        $this->depositService = $depositService ?? new MditDepositService();
        $this->issuanceService = $issuanceService ?? new MditIssuanceService();
    }

    public function getOfferingDetails(): array
    {
        return [
            'offering_name'          => 'MyMI Coin (Reg D 506(c) Private Placement)',
            'token_symbol'           => 'MYMIC',
            'regulatory_framework'   => 'SEC Regulation D Rule 506(c)',
            'investor_eligibility'   => 'Accredited Investors Only',
            'minimum_investment_usd' => 5000.00,
            'is_exchange_traded'     => false,
            'liquidity_restriction'  => 'Restricted securities under Rule 144. No secondary exchange trading.',
            'devnet_spl_mint'        => 'MYMICtestnetDevnetSPLAnchor1111111111111111',
            'return_disclaimer'      => 'Investments in private offerings involve significant risk of loss. No returns or dividends are guaranteed.',
        ];
    }

    public function isAccredited(int $userId): bool
    {
        if ($userId <= 0) {
            return false;
        }

        return $this->investorService->isVerifiedAndAccredited($userId);
    }

    public function registerInterest(int $userId, string $email, bool $attestation, float $intendedUsd, string $notes = ''): array
    {
        if ($userId <= 0) {
            return ['ok' => false, 'error' => 'unauthorized', 'message' => 'Valid user session required.'];
        }

        $table = $this->db->table('bf_mymicoin_interest_list');
        $existing = $table->where('user_id', $userId)->get()->getRowArray();

        $data = [
            'user_id'                   => $userId,
            'email'                     => trim($email),
            'accreditation_attestation' => $attestation ? 1 : 0,
            'intended_investment_usd'   => number_format($intendedUsd, 2, '.', ''),
            'notes'                     => trim($notes),
            'created_at'                => date('Y-m-d H:i:s'),
        ];

        if ($existing !== null) {
            $table->where('id', $existing['id'])->update($data);
        } else {
            $table->insert($data);
        }

        return [
            'ok'        => true,
            'message'   => 'Interest registered successfully. Compliance will contact you for accredited verification.',
            'user_id'   => $userId,
            'attested'  => $attestation,
        ];
    }

    public function initiateAccreditedDeposit(int $userId, array $payload): array
    {
        if (! $this->isAccredited($userId)) {
            return [
                'ok'      => false,
                'error'   => 'accreditation_required',
                'code'    => 'ACCREDITED_INVESTOR_ONLY',
                'message' => 'Accredited investor certification under Reg D 506(c) is required to participate.',
            ];
        }

        $amount = (float) ($payload['amount'] ?? 0);
        $min = 5000.00;
        if ($amount < $min) {
            return [
                'ok'      => false,
                'error'   => 'below_minimum',
                'message' => sprintf('Minimum accredited investment for MyMI Coin is $%.2f.', $min),
            ];
        }

        $depositPayload = [
            'user_id'         => $userId,
            'chain'           => strtoupper(trim((string) ($payload['chain'] ?? 'SOLANA'))),
            'asset_symbol'    => 'USDC',
            'wallet_address'  => trim((string) ($payload['wallet_address'] ?? '')),
            'amount'          => number_format($amount, 2, '.', ''),
            'status'          => 'PENDING_ONCHAIN',
            'idempotency_key' => $payload['idempotency_key'] ?? ('dep_' . bin2hex(random_bytes(16))),
            'created_on'      => date('Y-m-d H:i:s'),
            'updated_on'      => date('Y-m-d H:i:s'),
        ];

        $deposit = $this->depositService->initiateDeposit($depositPayload);

        return [
            'ok'         => true,
            'deposit_id' => $deposit['id'] ?? null,
            'status'     => 'PENDING_ONCHAIN',
            'deposit'    => $deposit,
        ];
    }

    public function mintMyMICoin(int $userId, int $depositId): array
    {
        if (! $this->isAccredited($userId)) {
            return [
                'ok'      => false,
                'error'   => 'accreditation_required',
                'code'    => 'ACCREDITED_INVESTOR_ONLY',
                'message' => 'Accredited investor certification under Reg D 506(c) is required to mint token units.',
            ];
        }

        // The deposit must be this investor's own MyMI Coin deposit: otherwise an
        // accredited user could mint units from someone else's (or an MDIT) deposit.
        $deposit = $this->depositService->find($depositId);
        if ($deposit === null || (int) ($deposit['user_id'] ?? 0) !== $userId) {
            return ['ok' => false, 'error' => 'deposit_not_found', 'message' => 'Deposit not found.'];
        }

        try {
            $ledgerEntry = $this->issuanceService->mintForDeposit($depositId, 'MYMIC');
            return [
                'ok'           => true,
                'ledger_entry' => $ledgerEntry,
                'token_symbol' => 'MYMIC',
                'status'       => 'MINTED',
            ];
        } catch (RuntimeException $e) {
            return [
                'ok'      => false,
                'error'   => 'mint_failed',
                'message' => $e->getMessage(),
            ];
        }
    }
}
