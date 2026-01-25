<?php

namespace App\Libraries;

defined('BASEPATH') || exit('No direct script access allowed');

class MyMISqueeze
{
    public function computeScorecard(array $row)
    {
        $flags = [];
        $inputs = [
            'float_shares' => $row['float_shares'] ?? null,
            'short_interest_pct' => $row['short_interest_pct'] ?? null,
            'volume_today' => $row['volume_today'] ?? null,
            'cost_to_borrow' => $row['cost_to_borrow'] ?? null,
            'days_to_cover' => $row['days_to_cover'] ?? null,
            'price' => $row['price'] ?? null,
            'prev_close' => $row['prev_close'] ?? null,
        ];

        $floatShares = $inputs['float_shares'];
        $floatScore = 0;
        if ($floatShares === null) {
            $flags['missingFloat'] = true;
        } elseif ($floatShares <= 2000000) {
            $floatScore = 20;
            $flags['lowFloat'] = true;
        } elseif ($floatShares <= 5000000) {
            $floatScore = 15;
        } elseif ($floatShares <= 15000000) {
            $floatScore = 10;
        } elseif ($floatShares <= 50000000) {
            $floatScore = 5;
        }

        $siPct = $inputs['short_interest_pct'];
        $siScore = 0;
        if ($siPct === null) {
            $flags['missingShortInterest'] = true;
        } elseif ($siPct >= 200) {
            $siScore = 25;
            $flags['extremeSI'] = true;
        } elseif ($siPct >= 100) {
            $siScore = 20;
        } elseif ($siPct >= 50) {
            $siScore = 15;
        } elseif ($siPct >= 20) {
            $siScore = 8;
        }

        $turnoverScore = 0;
        $turnover = null;
        if ($inputs['volume_today'] === null || $floatShares === null || $floatShares <= 0) {
            $flags['missingVolume'] = true;
        } else {
            $turnover = $inputs['volume_today'] / $floatShares;
            if ($turnover >= 20) {
                $turnoverScore = 20;
                $flags['insaneTurnover'] = true;
            } elseif ($turnover >= 10) {
                $turnoverScore = 15;
            } elseif ($turnover >= 5) {
                $turnoverScore = 10;
            } elseif ($turnover >= 2) {
                $turnoverScore = 5;
            }
        }

        $borrowScore = 0;
        $ctb = $inputs['cost_to_borrow'];
        if ($ctb === null) {
            $flags['missingBorrow'] = true;
        } elseif ($ctb >= 150) {
            $borrowScore = 15;
            $flags['ctbExtreme'] = true;
        } elseif ($ctb >= 80) {
            $borrowScore = 12;
        } elseif ($ctb >= 40) {
            $borrowScore = 8;
        } elseif ($ctb >= 10) {
            $borrowScore = 3;
        }

        $dtcScore = 0;
        $dtc = $inputs['days_to_cover'];
        if ($dtc === null) {
            $flags['missingDTC'] = true;
        } elseif ($dtc >= 5) {
            $dtcScore = 10;
        } elseif ($dtc >= 2) {
            $dtcScore = 7;
        } elseif ($dtc >= 1) {
            $dtcScore = 4;
        } elseif ($dtc < 1) {
            $dtcScore = 1;
            if ($dtc < 0.5) {
                $flags['daysToCoverLow'] = true;
            }
        }

        $riskAdjust = 0;
        $trendState = $row['trend_state'] ?? null;
        $dilutionRisk = $row['dilution_risk'] ?? null;
        $fundamentalsState = $row['fundamentals_state'] ?? null;

        if ($trendState === 'downtrend') {
            $riskAdjust -= 6;
            $flags['downtrend'] = true;
        }

        if ($dilutionRisk === 'high') {
            $riskAdjust -= 8;
            $flags['highDilution'] = true;
        }

        if ($fundamentalsState === 'weak') {
            $riskAdjust -= 6;
            $flags['weakFundamentals'] = true;
        }

        $positive = $floatScore + $siScore + $turnoverScore + $borrowScore + $dtcScore;
        $scoreTotal = max(0, min(100, $positive + $riskAdjust));

        return [
            'score_total' => $scoreTotal,
            'score_squeeze' => $floatScore + $siScore + $turnoverScore + $borrowScore,
            'score_sustainability' => max(0, $dtcScore + $riskAdjust),
            'score_risk' => max(0, 20 + $riskAdjust),
            'flags' => $flags,
            'inputs' => array_merge($inputs, [
                'turnover' => $turnover,
                'breakdown' => [
                    'float' => $floatScore,
                    'si' => $siScore,
                    'turnover' => $turnoverScore,
                    'borrow' => $borrowScore,
                    'dtc' => $dtcScore,
                    'riskAdjust' => $riskAdjust,
                ],
            ]),
        ];
    }

    public function computeZoomOut(array $dailyBars, array $fundamentals, array $dilutionSignals)
    {
        $closes = array_column($dailyBars, 'close');
        $current = end($closes);
        $ma20 = $this->movingAverage($closes, 20);
        $ma50 = $this->movingAverage($closes, 50);
        $ma200 = $this->movingAverage($closes, 200);
        $ma50Slope = $this->movingAverageSlope($closes, 50);

        $trendState = 'range';
        if ($current !== null && $ma50 !== null && $ma200 !== null) {
            if ($current < $ma50 && $ma50 < $ma200 && $ma50Slope < 0) {
                $trendState = 'downtrend';
            } elseif ($current > $ma50 && $ma50 > $ma200 && $ma50Slope > 0) {
                $trendState = 'uptrend';
            }
        }

        $dilutionRisk = 'med';
        $dilutionEvidence = $dilutionSignals;
        if (!empty($dilutionSignals['repeated_offerings']) || !empty($dilutionSignals['cash_poor'])) {
            $dilutionRisk = 'high';
        } elseif (!empty($dilutionSignals['microcap']) && !empty($dilutionSignals['spike_history'])) {
            $dilutionRisk = 'high';
            $dilutionEvidence['inferred'] = true;
        } elseif (!empty($dilutionSignals['microcap'])) {
            $dilutionRisk = 'med';
            $dilutionEvidence['inferred'] = true;
        }

        $fundamentalsState = 'mixed';
        $fundamentalFlags = [];
        if (empty($fundamentals)) {
            $fundamentalsState = 'weak';
            $fundamentalFlags['missing'] = true;
        } else {
            if (!empty($fundamentals['eps']) && $fundamentals['eps'] < 0) {
                $fundamentalsState = 'weak';
                $fundamentalFlags['negative_eps'] = true;
            }
            if (!empty($fundamentals['margins']) && $fundamentals['margins'] < 0) {
                $fundamentalsState = 'weak';
                $fundamentalFlags['shrinking_margins'] = true;
            }
            if (!empty($fundamentals['cash']) && !empty($fundamentals['debt']) && $fundamentals['cash'] < $fundamentals['debt']) {
                $fundamentalsState = 'weak';
                $fundamentalFlags['cash_poor'] = true;
            }
        }

        $narrative = 'This move is likely a mechanical unwind rather than a long-term reversal. ';
        if ($trendState === 'downtrend') {
            $narrative .= 'The daily chart indicates a long-term downtrend with weakening momentum. ';
        } elseif ($trendState === 'uptrend') {
            $narrative .= 'The broader trend is supportive, but squeezes remain volatile. ';
        } else {
            $narrative .= 'The chart is range-bound, suggesting limited structural support. ';
        }
        if ($dilutionRisk === 'high') {
            $narrative .= 'Dilution risk appears elevated based on recent behavior. ';
        }
        if ($fundamentalsState === 'weak') {
            $narrative .= 'Fundamentals appear weak without clear catalysts. ';
        }
        $narrative .= 'High short interest can squeeze but sustainability is low without catalysts.';

        return [
            'trend_state' => $trendState,
            'dilution_risk' => $dilutionRisk,
            'fundamentals_state' => $fundamentalsState,
            'narrative' => $narrative,
            'evidence' => [
                'ma20' => $ma20,
                'ma50' => $ma50,
                'ma200' => $ma200,
                'ma50_slope' => $ma50Slope,
                'dilution' => $dilutionEvidence,
                'fundamentals' => $fundamentalFlags,
            ],
        ];
    }

    public function computeFadeSetup(array $intraday, array $levels)
    {
        $setups = [];
        $vwap = $levels['vwap'] ?? null;
        $hod = $levels['hod'] ?? null;
        $prevClose = $levels['prev_close'] ?? null;

        $setups[] = [
            'setup_grade' => 'A',
            'entry_type' => 'VWAP fail',
            'entry_price' => $vwap !== null ? $vwap * 0.995 : null,
            'stop_price' => $vwap !== null ? $vwap * 1.015 : null,
            'target1' => $vwap !== null ? $vwap : null,
            'target2' => $prevClose,
            'risk_notes' => 'Avoid on strong trend days; watch halts and liquidity.',
            'logic' => [
                'condition' => 'Failed VWAP reclaim after early strength',
                'filters' => ['no_trend_day', 'avoid_halts'],
            ],
        ];

        $setups[] = [
            'setup_grade' => 'A',
            'entry_type' => 'HOD reclaim fail',
            'entry_price' => $hod !== null ? $hod * 0.99 : null,
            'stop_price' => $hod !== null ? $hod * 1.02 : null,
            'target1' => $vwap,
            'target2' => $prevClose,
            'risk_notes' => 'Confirm rejection near HOD. Avoid if trend is stair-stepping higher.',
            'logic' => [
                'condition' => 'Reclaim attempt fails near HOD pivot',
                'filters' => ['lower_high', 'volume_fade'],
            ],
        ];

        $setups[] = [
            'setup_grade' => 'B',
            'entry_type' => 'Gap fill',
            'entry_price' => $prevClose !== null ? $prevClose * 1.05 : null,
            'stop_price' => $prevClose !== null ? $prevClose * 1.12 : null,
            'target1' => $prevClose !== null ? $prevClose * 1.02 : null,
            'target2' => $prevClose,
            'risk_notes' => 'Best when opening range breaks down and VWAP is lost.',
            'logic' => [
                'condition' => 'Large gap fails to hold key levels',
                'filters' => ['loss_of_vwap'],
            ],
        ];

        $setups[] = [
            'setup_grade' => 'A',
            'entry_type' => 'Volume collapse day 2',
            'entry_price' => $vwap !== null ? $vwap * 0.99 : null,
            'stop_price' => $vwap !== null ? $vwap * 1.02 : null,
            'target1' => $prevClose,
            'target2' => $levels['base_support'] ?? null,
            'risk_notes' => 'Only when volume is <25% of squeeze day by mid-session.',
            'logic' => [
                'condition' => 'Lower high below VWAP on day after squeeze',
                'filters' => ['volume_collapse'],
            ],
        ];

        return $setups;
    }

    public function detectSqueezeEvent(array $row)
    {
        $float = $row['float_shares'] ?? null;
        $si = $row['short_interest_pct'] ?? null;
        $volume = $row['volume_today'] ?? null;
        $price = $row['price'] ?? null;
        $prevClose = $row['prev_close'] ?? null;

        if ($float === null || $si === null || $volume === null || $price === null || $prevClose === null) {
            return false;
        }

        $turnover = $float > 0 ? $volume / $float : 0;
        $priceSpike = $prevClose > 0 ? ($price / $prevClose) : 1;

        return ($float <= 5000000 && $si >= 50 && $turnover >= 5 && $priceSpike >= 1.5);
    }

    private function movingAverage(array $values, $period)
    {
        if (count($values) < $period || $period <= 0) {
            return null;
        }
        $slice = array_slice($values, -$period);
        return array_sum($slice) / $period;
    }

    private function movingAverageSlope(array $values, $period)
    {
        if (count($values) < $period + 1 || $period <= 1) {
            return 0;
        }
        $prev = array_sum(array_slice($values, -$period - 1, $period)) / $period;
        $current = array_sum(array_slice($values, -$period)) / $period;
        return $current - $prev;
    }
}
