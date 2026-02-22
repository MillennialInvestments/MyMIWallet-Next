<?php

declare(strict_types=1);

namespace App\Services\Scanning;

class SignalEngine
{
    public function evaluate(string $symbol, string $timeframe, array $candles, array $params = []): array
    {
        $p = array_merge([
            'liqLength' => 20,
            'liqMergeATR' => 0.25,
            'hShiftVolMultiplier' => 1.2,
            'requireVWAPBias' => true,
            'maxLevels' => 40,
        ], $params);

        if (count($candles) < 60) {
            return ['signals' => [], 'features' => ['reason' => 'insufficient_candles']];
        }

        $closes = array_column($candles, 'close');
        $highs = array_column($candles, 'high');
        $lows = array_column($candles, 'low');
        $volumes = array_column($candles, 'volume');
        $idx = count($candles) - 2;

        $ema3 = $this->ema($closes, 3);
        $ema8 = $this->ema($closes, 8);
        $ema13 = $this->ema($closes, 13);
        $ema55 = $this->ema($closes, 55);
        $atr14 = $this->atr($highs, $lows, $closes, 14);
        $volSma20 = $this->sma($volumes, 20);
        $vwap = $this->vwap($candles, $timeframe);

        $lastLiqHigh = max(array_slice($highs, max(0, $idx - (int) $p['liqLength']), (int) $p['liqLength']));
        $lastLiqLow = min(array_slice($lows, max(0, $idx - (int) $p['liqLength']), (int) $p['liqLength']));

        $high = (float) $highs[$idx];
        $low = (float) $lows[$idx];
        $close = (float) $closes[$idx];
        $prevHigh = (float) $highs[$idx - 1];
        $prevLow = (float) $lows[$idx - 1];

        $emaStackLong = $ema3[$idx] > $ema8[$idx] && $ema8[$idx] > $ema13[$idx];
        $emaStackShort = $ema3[$idx] < $ema8[$idx] && $ema8[$idx] < $ema13[$idx];

        $longBias = $emaStackLong && (! $p['requireVWAPBias'] || $close > $vwap[$idx]);
        $shortBias = $emaStackShort && (! $p['requireVWAPBias'] || $close < $vwap[$idx]);

        $liqHighBreak = $high > $lastLiqHigh;
        $liqLowBreak = $low < $lastLiqLow;
        $liqHighSweep = $high > $lastLiqHigh && $close < $lastLiqHigh;
        $liqLowSweep = $low < $lastLiqLow && $close > $lastLiqLow;

        $bearDisp = $close < $prevLow && $close < $ema8[$idx];
        $bullDisp = $close > $prevHigh && $close > $ema8[$idx];
        $volExpansion = $volumes[$idx] > ($volSma20[$idx] * (float) $p['hShiftVolMultiplier']);

        $emaSpread = abs($ema8[$idx] - $ema55[$idx]);
        $spreadContracting = $emaSpread < abs($ema8[$idx - 1] - $ema55[$idx - 1])
            && abs($ema8[$idx - 1] - $ema55[$idx - 1]) < abs($ema8[$idx - 2] - $ema55[$idx - 2]);

        $shiftShort = $liqHighSweep && $bearDisp && $shortBias;
        $shiftLong = $liqLowSweep && $bullDisp && $longBias;

        $strongBear = $close < $ema13[$idx] && $bearDisp && $volExpansion;
        $strongBull = $close > $ema13[$idx] && $bullDisp && $volExpansion;
        $hShiftShort = $strongBear && $shortBias && $spreadContracting;
        $hShiftLong = $strongBull && $longBias && $spreadContracting;

        $signals = [];
        if ($liqHighSweep || $liqLowSweep) {
            $signals[] = ['signal' => 'LIQ_SWEEP', 'direction' => $liqLowSweep ? 'LONG' : 'SHORT'];
        }
        if ($liqHighBreak || $liqLowBreak) {
            $signals[] = ['signal' => 'LIQ_BREAK', 'direction' => $liqHighBreak ? 'LONG' : 'SHORT'];
        }
        if ($shiftLong || $shiftShort) {
            $signals[] = ['signal' => 'SHIFT', 'direction' => $shiftLong ? 'LONG' : 'SHORT'];
        }
        if ($hShiftLong || $hShiftShort) {
            $signals[] = ['signal' => 'H_SHIFT', 'direction' => $hShiftLong ? 'LONG' : 'SHORT'];
        }

        return [
            'signals' => $signals,
            'features' => [
                'symbol' => $symbol,
                'timeframe' => $timeframe,
                'price' => $close,
                'vwap' => $vwap[$idx],
                'ema8' => $ema8[$idx],
                'ema13' => $ema13[$idx],
                'ema55' => $ema55[$idx],
                'last_liq_high' => $lastLiqHigh,
                'last_liq_low' => $lastLiqLow,
                'volume' => $volumes[$idx],
                'vol_sma20' => $volSma20[$idx],
                'atr14' => $atr14[$idx],
                'occurred_on' => $candles[$idx]['time'],
            ],
        ];
    }

    private function sma(array $series, int $len): array { $out=[]; $sum=0.0; foreach($series as $i=>$v){$sum+=$v; if($i>=$len){$sum-=$series[$i-$len];} $out[$i]=$i>=$len-1?$sum/$len:$v;} return $out; }
    private function ema(array $series, int $len): array { $out=[]; $k=2/($len+1); $out[0]=(float)$series[0]; foreach($series as $i=>$v){ if($i===0) continue; $out[$i]=($v*$k)+($out[$i-1]*(1-$k)); } return $out; }
    private function atr(array $h, array $l, array $c, int $len): array { $tr=[]; foreach($h as $i=>$hv){$pc=$c[max(0,$i-1)]; $tr[$i]=max($hv-$l[$i],abs($hv-$pc),abs($l[$i]-$pc));} return $this->ema($tr,$len); }
    private function vwap(array $candles, string $timeframe): array { $out=[]; $cumPV=0.0; $cumV=0.0; foreach($candles as $i=>$c){$tp=((float)$c['high']+(float)$c['low']+(float)$c['close'])/3; if(in_array(strtolower($timeframe),['1d','1day','daily'],true)){$out[$i]=$tp;continue;} $cumPV+=$tp*(float)$c['volume']; $cumV+=(float)$c['volume']; $out[$i]=$cumV>0?$cumPV/$cumV:$tp;} return $out; }
}
