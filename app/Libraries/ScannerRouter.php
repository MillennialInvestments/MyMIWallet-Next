<?php namespace App\Libraries;

class ScannerRouter
{
    public const SCANNER_EVENT_MAP = [
        'Daily Top Gainers'                => 'scanner.momentum',
        'Weekly Top Performing'            => 'scanner.momentum',
        'Volume Breakout GapUp'            => 'scanner.momentum',
        'High Dollar Volume'               => 'scanner.momentum',
        'Penny Swing Scanner'              => 'scanner.momentum',

        'Super Ultron - Short'             => 'scanner.ai_ultron',
        'Super Ultron'                     => 'scanner.ai_ultron',
        'AI Ultron Scanner'                => 'scanner.ai_ultron',
        'AI Precision Scanner'             => 'scanner.ai_ultron',

        'EMA Stack Bullish'                => 'scanner.ema_trend',
        'Golden Cross'                     => 'scanner.ema_trend',
        'EMA Whale Analyzer - Penny'       => 'scanner.ema_trend',
        'EMA Whale Analyzer - <$25'        => 'scanner.ema_trend',
        'APEX EMA Analyzer'                => 'scanner.ema_trend',
        'EMA Penny Stocks - 1Hr'           => 'scanner.ema_trend',
        'EMA Penny Stocks - 4Hr'           => 'scanner.ema_trend',

        'EMA Liquidity 1Hr'                => 'scanner.liquidity',
        'EMA Liquidity 4Hr'                => 'scanner.liquidity',
        'EMA Liquidity 1Hr - $50M'         => 'scanner.liquidity',
        'EMA Liquidity 4Hr - $50M'         => 'scanner.liquidity',
        'EMA Liquidity 30Min'              => 'scanner.liquidity',
        'AI Liquidity Stock Scanner'       => 'scanner.liquidity',

        'All News from All news providers' => 'scanner.news',
    ];

    public static function resolveScannerEventKey(string $scannerName): string
    {
        foreach (self::SCANNER_EVENT_MAP as $needle => $eventKey) {
            if (stripos($scannerName, $needle) !== false) {
                return $eventKey;
            }
        }

        return 'scanner.generic';
    }
}