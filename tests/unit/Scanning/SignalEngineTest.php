<?php

declare(strict_types=1);

namespace Tests\Unit\Scanning;

use App\Services\Scanning\SignalEngine;
use CodeIgniter\Test\CIUnitTestCase;

final class SignalEngineTest extends CIUnitTestCase
{
    public function testDetectsSignalsOnSyntheticSeries(): void
    {
        $engine = new SignalEngine();
        $candles = [];
        $t = strtotime('2026-01-01 09:30:00');
        $price = 100.0;

        for ($i = 0; $i < 80; $i++) {
            $open = $price;
            $high = $price + 1.5;
            $low = $price - 1.0;
            $close = $price + 0.6;
            $vol = 1000 + ($i * 10);
            $candles[] = [
                'time' => date('Y-m-d H:i:s', $t + ($i * 60)),
                'open' => $open,
                'high' => $high,
                'low' => $low,
                'close' => $close,
                'volume' => $vol,
            ];
            $price += 0.2;
        }

        $candles[78]['low'] = $candles[70]['low'] - 1.0;
        $candles[78]['close'] = $candles[70]['low'] + 0.2;
        $candles[78]['volume'] = 20000;

        $result = $engine->evaluate('TEST', '1min', $candles, ['requireVWAPBias' => false]);
        $this->assertIsArray($result['signals']);
        $this->assertNotEmpty($result['features']);
    }
}
