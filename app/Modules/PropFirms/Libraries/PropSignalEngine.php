<?php

namespace App\Modules\PropFirms\Libraries;

use App\Libraries\MyMIAlphaVantage;
use App\Modules\PropFirms\Models\PropSignalModel;
use App\Modules\PropFirms\Models\UserPropAccountModel;

class PropSignalEngine
{
    private MyMIAlphaVantage $alpha;
    private PropFirmEngine $firmEngine;
    private PropSignalModel $signals;
    private UserPropAccountModel $accounts;
    private PropNotificationService $notifications;

    public function __construct(
        ?MyMIAlphaVantage $alpha = null,
        ?PropFirmEngine $firmEngine = null,
        ?PropSignalModel $signals = null,
        ?UserPropAccountModel $accounts = null,
        ?PropNotificationService $notifications = null
    ) {
        $this->alpha = $alpha ?? new MyMIAlphaVantage();
        $this->firmEngine = $firmEngine ?? new PropFirmEngine();
        $this->signals = $signals ?? new PropSignalModel();
        $this->accounts = $accounts ?? new UserPropAccountModel();
        $this->notifications = $notifications ?? new PropNotificationService();
    }

    public function scanWatchlist(int $userPropAccountId, array $watchlist): array
    {
        $results = [];
        foreach ($watchlist as $symbol) {
            $results[] = $this->scanSymbolForAccount($userPropAccountId, (string) $symbol);
        }

        return $results;
    }

    public function scanSymbolForAccount(int $userPropAccountId, string $symbol): array
    {
        $symbol = strtoupper(trim($symbol));
        if ($symbol === '') {
            return ['status' => 'skipped', 'reason' => 'missing_symbol'];
        }

        $entitlement = $this->firmEngine->getAllowedSymbols($userPropAccountId);
        $isEntitled = $entitlement === [] || in_array($symbol, $entitlement, true);

        $candles = $this->alpha->getCandlesForSignalEngine($symbol, '5min', 120);
        $stochSeries = $this->alpha->getStochasticSeries($symbol, '5min', 30);

        $liquidity = $this->detectLiquiditySweep($candles);
        $stochCross = $this->detectStochasticCross($stochSeries);

        $technicalSetup = $liquidity['confirmed'] && $stochCross['confirmed'];
        $tradeEligibility = $this->firmEngine->checkTradeEligibility($userPropAccountId, ['symbol' => $symbol]);
        $isTradeEligible = (bool) ($tradeEligibility['can_trade'] ?? false);

        $signalType = 'NO_SIGNAL';
        if ($technicalSetup && $isEntitled && $isTradeEligible) {
            $signalType = 'TRADE_SIGNAL_CONFIRMED';
        } elseif ($technicalSetup && (! $isEntitled || ! $isTradeEligible)) {
            $signalType = 'NO_TRADE_RISK_BLOCKED';
        }

        $payload = $this->buildSignalPayload([
            'user_prop_account_id' => $userPropAccountId,
            'symbol' => $symbol,
            'signal_type' => $signalType,
            'liquidity' => $liquidity,
            'stochastic' => $stochCross,
            'is_entitled' => $isEntitled,
            'trade_eligibility' => $tradeEligibility,
            'candles' => array_slice($candles, 0, 20),
        ]);

        if ($signalType !== 'NO_SIGNAL') {
            $signalId = $this->persistSignal($payload);
            $this->emitNotificationForSignal($payload, $signalId);
            $payload['signal_id'] = $signalId;
        }

        return $payload;
    }

    public function detectLiquiditySweep(array $candles): array
    {
        if (count($candles) < 3) {
            return ['confirmed' => false, 'direction' => 'none'];
        }

        $latest = $candles[0];
        $prev = $candles[1];
        $prev2 = $candles[2];

        $sweptHigh = ($latest['high'] ?? 0) > max((float) ($prev['high'] ?? 0), (float) ($prev2['high'] ?? 0))
            && (float) ($latest['close'] ?? 0) < (float) ($latest['high'] ?? 0);

        $sweptLow = ($latest['low'] ?? 0) < min((float) ($prev['low'] ?? 0), (float) ($prev2['low'] ?? 0))
            && (float) ($latest['close'] ?? 0) > (float) ($latest['low'] ?? 0);

        return [
            'confirmed' => $sweptHigh || $sweptLow,
            'direction' => $sweptHigh ? 'bearish' : ($sweptLow ? 'bullish' : 'none'),
        ];
    }

    public function detectStochasticCross(array $series): array
    {
        if (count($series) < 2) {
            return ['confirmed' => false, 'direction' => 'none'];
        }

        $latest = $series[0];
        $prev = $series[1];

        $bullish = (float) ($prev['k'] ?? 0) < (float) ($prev['d'] ?? 0) && (float) ($latest['k'] ?? 0) > (float) ($latest['d'] ?? 0);
        $bearish = (float) ($prev['k'] ?? 0) > (float) ($prev['d'] ?? 0) && (float) ($latest['k'] ?? 0) < (float) ($latest['d'] ?? 0);

        return [
            'confirmed' => $bullish || $bearish,
            'direction' => $bullish ? 'bullish' : ($bearish ? 'bearish' : 'none'),
            'k' => (float) ($latest['k'] ?? 0),
            'd' => (float) ($latest['d'] ?? 0),
        ];
    }

    public function buildSignalPayload(array $context): array
    {
        $strength = 0;
        $strength += !empty($context['liquidity']['confirmed']) ? 0.5 : 0;
        $strength += !empty($context['stochastic']['confirmed']) ? 0.35 : 0;
        $strength += !empty($context['is_entitled']) ? 0.1 : 0;
        $strength += !empty($context['trade_eligibility']['can_trade']) ? 0.05 : 0;

        return [
            'user_prop_account_id' => (int) ($context['user_prop_account_id'] ?? 0),
            'symbol' => (string) ($context['symbol'] ?? ''),
            'signal_type' => (string) ($context['signal_type'] ?? 'NO_SIGNAL'),
            'signal_strength' => min(1, max(0, $strength)),
            'triggered_at' => date('Y-m-d H:i:s'),
            'payload' => $context,
        ];
    }

    public function persistSignal(array $payload): int
    {
        $id = $this->signals->insert([
            'user_prop_account_id' => (int) ($payload['user_prop_account_id'] ?? 0) ?: null,
            'symbol' => (string) ($payload['symbol'] ?? ''),
            'signal_type' => (string) ($payload['signal_type'] ?? 'NO_SIGNAL'),
            'signal_strength' => (float) ($payload['signal_strength'] ?? 0),
            'payload_json' => json_encode((array) ($payload['payload'] ?? []), JSON_UNESCAPED_SLASHES),
            'triggered_at' => (string) ($payload['triggered_at'] ?? date('Y-m-d H:i:s')),
        ], true);

        return (int) $id;
    }

    private function emitNotificationForSignal(array $payload, int $signalId): void
    {
        $type = (string) ($payload['signal_type'] ?? 'TRADE_SIGNAL_CONFIRMED');

        $subjectMap = [
            'TRADE_SIGNAL_CONFIRMED' => 'New Prop Signal',
            'NO_TRADE_RISK_BLOCKED' => 'Trade Blocked by Risk Rules',
        ];

        $this->notifications->notify([
            'user_prop_account_id' => (int) ($payload['user_prop_account_id'] ?? 0),
            'type' => $type,
            'symbol' => (string) ($payload['symbol'] ?? ''),
            'subject' => $subjectMap[$type] ?? 'Prop Signal Event',
            'body' => sprintf('%s for %s.', $type, (string) ($payload['symbol'] ?? 'N/A')),
            'data' => ['signal_id' => $signalId, 'payload' => $payload['payload'] ?? []],
        ]);
    }
}
