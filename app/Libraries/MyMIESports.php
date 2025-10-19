<?php
namespace App\Libraries;

use App\Services\SolanaService;
use Config\Services;

class MyMIESports
{
    private MyMIGold $gold;
    private MyMISolana $solana;
    private SolanaService $solanaService;
    private MyMIRaydium $raydium;
    private MyMIEsportsStartGG $startgg;

    public function __construct(
        ?MyMIGold $gold = null,
        ?MyMISolana $solana = null,
        ?SolanaService $solanaService = null,
        ?MyMIRaydium $raydium = null,
        ?MyMIEsportsStartGG $startgg = null
    ) {
        $this->gold          = $gold          ?? Services::myMIGold(false);
        $this->solana        = $solana        ?? new MyMISolana();
        $this->solanaService = $solanaService ?? new SolanaService();
        $this->raydium       = $raydium       ?? new MyMIRaydium();
        $this->startgg       = $startgg       ?? new MyMIEsportsStartGG();
    }

    public function initEscrowOnSolana(array $event): array
    {
        if ($this->isDryRun()) {
            log_message('info', 'Esports::initEscrowOnSolana dry-run placeholder triggered for event {event}', [
                'event' => $event['id'] ?? null,
            ]);
            return [
                'status'  => 'dry-run',
                'message' => 'Escrow initialization skipped (dry run)',
            ];
        }

        // TODO: Wire to Solana program initialization via $this->solana / $this->solanaService.
        log_message('info', 'Esports::initEscrowOnSolana real execution pending integration for event {event}', [
            'event' => $event['id'] ?? null,
        ]);

        return [
            'status'  => 'pending',
            'message' => 'Solana escrow initialization scheduled',
        ];
    }

    public function lockEntryEscrow(array $entry): array
    {
        if ($this->isDryRun()) {
            log_message('info', 'Esports::lockEntryEscrow dry-run for entry {entry}', [
                'entry' => $entry['id'] ?? null,
            ]);
            return [
                'status'  => 'dry-run',
                'message' => 'Entry escrow lock skipped (dry run)',
            ];
        }

        // TODO: Call MyMIGold transfer + Solana escrow deposit.
        log_message('info', 'Esports::lockEntryEscrow transfer pending implementation for entry {entry}', [
            'entry' => $entry['id'] ?? null,
        ]);

        return [
            'status'  => 'pending',
            'message' => 'Entry escrow lock scheduled',
        ];
    }

    public function releaseEscrowOnSettle(array $event, array $winners): array
    {
        if ($this->isDryRun()) {
            log_message('info', 'Esports::releaseEscrowOnSettle dry-run for event {event}', [
                'event' => $event['id'] ?? null,
            ]);
            return [
                'status'  => 'dry-run',
                'message' => 'Escrow settlement skipped (dry run)',
            ];
        }

        // TODO: Trigger Solana program settle + Raydium swaps if sponsor payouts require conversions.
        log_message('info', 'Esports::releaseEscrowOnSettle pending integration for event {event}', [
            'event'      => $event['id'] ?? null,
            'winner_cnt' => count($winners),
        ]);

        return [
            'status'  => 'pending',
            'message' => 'Escrow release queued',
        ];
    }

    public function computeFeeSplit(array $event): array
    {
        $rake    = (int) ($event['rake_bps'] ?? env('ESPORTS_DEFAULT_RAKE_BPS', 1000));
        $creator = (int) ($event['creator_bps'] ?? env('ESPORTS_DEFAULT_CREATOR_BPS', 7000));
        $sponsor = (int) ($event['sponsor_bps'] ?? env('ESPORTS_DEFAULT_SPONSOR_BPS', 0));

        $net = $rake + $creator + $sponsor;
        if ($net > 10000) {
            // Normalize to prevent negative pools.
            $scale = 10000 / max($net, 1);
            $rake    = (int) floor($rake * $scale);
            $creator = (int) floor($creator * $scale);
            $sponsor = max(0, 10000 - $rake - $creator);
        }

        return [
            'rake_bps'    => $rake,
            'creator_bps' => $creator,
            'sponsor_bps' => $sponsor,
        ];
    }

    public function verifyWebhookSignature(array $headers, string $rawBody): bool
    {
        $source = strtolower((string) env('ESPORTS_WEBHOOK_SOURCE', 'startgg'));

        if ($source === 'startgg') {
            return $this->startgg->verifySignature($headers, $rawBody);
        }

        if ($source === 'nexusarena') {
            $secret = env('ESPORTS_WEBHOOK_SECRET', '');
            if ($secret === '') {
                return false;
            }

            $provided = $headers['X-Nexusarena-Signature']
                ?? $headers['x-nexusarena-signature']
                ?? $headers['X-Esports-Signature']
                ?? $headers['x-esports-signature']
                ?? null;

            if (! is_string($provided)) {
                return false;
            }

            $expected = hash_hmac('sha256', $rawBody, $secret);
            return hash_equals($expected, trim($provided));
        }

        // Fallback generic secret check
        $secret = env('ESPORTS_WEBHOOK_SECRET', '');
        if ($secret === '') {
            return false;
        }

        $provided = $headers['X-Esports-Signature'] ?? $headers['x-esports-signature'] ?? null;
        if (! is_string($provided)) {
            return false;
        }

        $expected = hash_hmac('sha256', $rawBody, $secret);
        return hash_equals($expected, trim($provided));
    }

    public function applyDisputeFreeze(int $eventId, string $reason): bool
    {
        // TODO: Wire into compliance notifier + pool freeze routine.
        log_message('warning', 'Esports::applyDisputeFreeze invoked for event {event}: {reason}', [
            'event'  => $eventId,
            'reason' => $reason,
        ]);

        return true;
    }

    private function isDryRun(): bool
    {
        return (bool) env('ESPORTS_DRY_RUN', true);
    }
}