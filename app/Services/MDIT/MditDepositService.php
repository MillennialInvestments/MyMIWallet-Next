<?php

namespace App\Services\MDIT;

use App\Models\MDIT\MditDepositModel;
use App\Models\MDIT\MditWalletModel;
use App\Models\MDIT\MditWebhookEventModel;

class MditDepositService
{
    private MditDepositModel $deposits;
    private MditWalletModel $wallets;
    private MditWebhookEventModel $webhookEvents;

    public function __construct(
        ?MditDepositModel $deposits = null,
        ?MditWalletModel $wallets = null,
        ?MditWebhookEventModel $webhookEvents = null
    ) {
        $this->deposits = $deposits ?? new MditDepositModel();
        $this->wallets = $wallets ?? new MditWalletModel();
        $this->webhookEvents = $webhookEvents ?? new MditWebhookEventModel();
    }

    public function initiateDeposit(array $payload): array
    {
        $idempotencyKey = $payload['idempotency_key'];
        $existing = $this->deposits->where('idempotency_key', $idempotencyKey)->first();
        if ($existing) {
            return $existing;
        }

        $id = $this->deposits->insert($payload, true);

        return $this->deposits->find($id);
    }

    public function ensureWalletOwned(int $userId, string $walletAddress, string $chain): bool
    {
        $wallet = $this->wallets
            ->where('user_id', $userId)
            ->where('wallet_address', $walletAddress)
            ->where('chain', $chain)
            ->first();

        return ! empty($wallet);
    }

    public function confirmDeposit(int $depositId, string $txHash): array
    {
        $deposit = $this->deposits->find($depositId);
        if (! $deposit) {
            throw new \RuntimeException('Deposit not found.');
        }

        if (! empty($deposit['tx_hash']) && $deposit['tx_hash'] !== $txHash) {
            throw new \RuntimeException('Deposit already confirmed with a different transaction hash.');
        }

        $existingTx = $this->deposits->where('tx_hash', $txHash)->first();
        if ($existingTx && (int) $existingTx['id'] !== (int) $depositId) {
            throw new \RuntimeException('Transaction hash already used.');
        }

        $this->deposits->update($depositId, [
            'tx_hash' => $txHash,
            'status' => 'CONFIRMED_ONCHAIN',
            'confirmations' => max((int) ($deposit['confirmations'] ?? 0), 1),
            'updated_on' => date('Y-m-d H:i:s'),
        ]);

        return $this->deposits->find($depositId);
    }

    public function logWebhookEvent(array $payload): array
    {
        $existing = $this->webhookEvents
            ->where('provider', $payload['provider'])
            ->where('event_id', $payload['event_id'])
            ->first();

        if ($existing) {
            return $existing;
        }

        $id = $this->webhookEvents->insert($payload, true);

        return $this->webhookEvents->find($id);
    }
}
