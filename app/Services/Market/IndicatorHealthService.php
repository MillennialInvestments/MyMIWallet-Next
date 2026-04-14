<?php

declare(strict_types=1);

namespace App\Services\Market;

class IndicatorHealthService
{
    /** @param array<string,mixed> $quote */
    public function evaluate(string $symbol, array $quote): array
    {
        $price = (float) ($quote['price'] ?? 0.0);
        $change = (float) ($quote['change_percent'] ?? 0.0);
        $high = (float) ($quote['high'] ?? $price);
        $low = (float) ($quote['low'] ?? $price);
        $open = (float) ($quote['open'] ?? $price);
        $volume = (float) ($quote['volume'] ?? 0.0);

        $emaState = $price >= $open ? 'ema_bias_up' : 'ema_bias_down';
        $stochState = $change >= 1.5 ? 'stoch_overbought' : ($change <= -1.5 ? 'stoch_oversold' : 'stoch_neutral');
        $momentum = $change >= 0.5 ? 'positive' : ($change <= -0.5 ? 'negative' : 'flat');

        $range = max(0.0001, abs($high - $low));
        $volatilityFlag = ($price > 0 && ($range / $price) > 0.05) ? 'high_volatility' : 'normal_volatility';
        $liquidityFlag = $volume > 250000 ? 'liquid' : 'thin_liquidity';

        $score = 0;
        $score += $emaState === 'ema_bias_up' ? 1 : -1;
        $score += $momentum === 'positive' ? 1 : ($momentum === 'negative' ? -1 : 0);
        $score += $liquidityFlag === 'liquid' ? 1 : -1;

        $summary = $score >= 2 ? 'bullish' : ($score <= -2 ? 'bearish' : 'neutral');

        return [
            'symbol' => strtoupper($symbol),
            'ema_state' => $emaState,
            'stochastic_state' => $stochState,
            'momentum_state' => $momentum,
            'volatility_flag' => $volatilityFlag,
            'liquidity_flag' => $liquidityFlag,
            'summary' => $summary,
        ];
    }
}
