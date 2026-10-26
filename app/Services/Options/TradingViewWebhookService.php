<?php

declare(strict_types=1);

namespace App\Services\Options;

use App\Models\Options\OptionsPositionModel;
use App\Models\Options\OptionsSignalEventModel;

class TradingViewWebhookService
{
    public function __construct(
        private readonly OptionsSignalEventModel $signalEventModel,
        private readonly OptionsPositionModel $positionModel,
        private readonly OptionsMomentumManager $momentumManager,
    ) {
    }

    /**
     * Ingest and process a TradingView Pine v6 webhook signal.
     *
     * @param array $payload
     * @return array Processing result.
     */
    public function ingest(array $payload): array
    {
        $ticker = strtoupper(trim((string) ($payload['ticker'] ?? $payload['symbol'] ?? '')));
        $signalType = trim((string) ($payload['signal'] ?? $payload['action'] ?? 'momentum_update'));
        $timeframe = (string) ($payload['timeframe'] ?? '5m');
        $price = (float) ($payload['price'] ?? $payload['close'] ?? 0.0);
        $timestamp = (string) ($payload['timestamp'] ?? date('Y-m-d H:i:s'));
        $rawEventUuid = sprintf('tv-%s-%s-%s', strtolower($ticker), date('Ymd-His'), bin2hex(random_bytes(4)));

        if ($ticker === '') {
            return [
                'status' => 'rejected',
                'reason' => 'Missing ticker/symbol in webhook payload',
            ];
        }

        // Generate Idempotency Hash (Replay / Duplicate Protection)
        $idempotencyHash = hash('sha256', sprintf('%s|%s|%s|%.4f|%s', $ticker, $signalType, $timeframe, $price, $timestamp));

        if ($this->signalEventModel->isDuplicate($idempotencyHash)) {
            return [
                'status' => 'deduplicated',
                'message' => 'Duplicate webhook signal ignored by idempotency engine.',
                'hash' => $idempotencyHash,
            ];
        }

        // Link with active position if available
        $positionId = null;
        if (! empty($payload['trade_uuid'])) {
            $pos = $this->positionModel->findByUuid((string) $payload['trade_uuid']);
            if ($pos) {
                $positionId = (int) $pos['id'];
            }
        }
        if ($positionId === null) {
            $activeForTicker = $this->positionModel
                ->where('ticker', $ticker)
                ->whereIn('status', ['open', 'warning_momentum', 'warning_trailing', 'warning_theta', 'target_reached'])
                ->orderBy('created_at', 'DESC')
                ->first();
            if ($activeForTicker) {
                $positionId = (int) $activeForTicker['id'];
            }
        }

        $now = date('Y-m-d H:i:s');
        $eventId = (int) $this->signalEventModel->insert([
            'event_uuid' => $rawEventUuid,
            'position_id' => $positionId,
            'ticker' => $ticker,
            'source' => 'tradingview',
            'signal_type' => $signalType,
            'timeframe' => $timeframe,
            'payload_json' => json_encode($payload, JSON_UNESCAPED_SLASHES),
            'idempotency_hash' => $idempotencyHash,
            'processed' => 1,
            'created_at' => $now,
            'processed_at' => $now,
        ]);

        // Route to Momentum Manager if an active position exists
        $actionResult = null;
        if ($positionId !== null) {
            $actionResult = $this->momentumManager->handleMomentumSignal($positionId, $signalType, $payload);
        }

        return [
            'status' => 'accepted',
            'event_id' => $eventId,
            'ticker' => $ticker,
            'signal_type' => $signalType,
            'position_id' => $positionId,
            'action_result' => $actionResult,
        ];
    }
}
