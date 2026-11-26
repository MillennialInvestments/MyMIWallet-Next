<?php

declare(strict_types=1);

namespace App\Services\Options;

use App\Models\Options\OptionsScanCandidateModel;
use App\Services\Scanning\Providers\ProviderRouter;
use Config\OptionsStrategy;

class OptionsScannerEngine
{
    /**
     * Default high-liquidity weekly options universe.
     */
    public const DEFAULT_UNIVERSE = [
        'NVDA',
        'TSLA',
        'AMD',
        'COIN',
        'SPY',
        'QQQ',
        'IWM',
    ];

    public function __construct(
        private readonly ?OptionsScanCandidateModel $candidateModel = null,
        private readonly ?ProviderRouter $providerRouter = null,
        private ?AlphaVantageCatalystService $catalystService = null,
    ) {
        $this->catalystService = $this->catalystService ?? new AlphaVantageCatalystService();
    }

    /**
     * Resolve configuration instance (with fallback defaults).
     */
    private function resolveConfig(): OptionsStrategy
    {
        if (function_exists('config')) {
            try {
                $cfg = config('OptionsStrategy');
                if ($cfg instanceof OptionsStrategy) {
                    return $cfg;
                }
            } catch (\Throwable) {
                // fall through
            }
        }

        return new OptionsStrategy();
    }

    /**
     * Run the Weekly Options Opportunity Scanner.
     *
     * @param array $options [
     *   'universe' => list<string>,
     *   'strategy' => string ('strangle'|'straddle', default 'strangle'),
     *   'otm_offset_pct' => float (default from config: 4.0),
     *   'target_profit' => float (default from config: 200.0),
     *   'call_debit' => float (default from config: 0.95),
     *   'put_debit' => float (default from config: 0.95),
     *   'call_target_balance' => float (default from config: 100.0),
     *   'put_target_balance' => float (default from config: 100.0),
     *   'call_strike' => float|null,
     *   'put_strike' => float|null,
     *   'dte' => int (default from config: 5),
     *   'min_rvol' => float (default from config: 1.2),
     *   'max_iv_rv' => float (default from config: 1.8),
     *   'dry_run' => bool (default false),
     * ]
     * @return array Summary of scanned and qualified candidates.
     */
    public function scan(array $options = []): array
    {
        $cfg = $this->resolveConfig();

        $universe = ! empty($options['universe']) ? (array) $options['universe'] : $cfg->universe;
        $universe = array_values(array_unique(array_map('strtoupper', $universe)));

        $strategy = (string) ($options['strategy'] ?? $cfg->defaultStrategy ?? 'strangle');
        $otmOffsetPct = (float) ($options['otm_offset_pct'] ?? $cfg->defaultOtmOffsetPct ?? 4.0);
        $avKey = isset($options['alphavantage_key']) ? (string) $options['alphavantage_key'] : null;
        if ($avKey !== null && $this->catalystService !== null) {
            $this->catalystService = new AlphaVantageCatalystService($avKey);
        }
        $skipCatalyst = (bool) ($options['skip_catalyst'] ?? false);
        $macroCatalysts = (! $skipCatalyst && $this->catalystService !== null)
            ? $this->catalystService->getMacroEconomicUpdates()
            : ['available' => false, 'macro_sentiment_score' => 0.0, 'macro_sentiment_label' => 'Neutral', 'top_macro_headlines' => [], 'key_topics' => []];

        $targetProfit = (float) ($options['target_profit'] ?? $cfg->targetNetProfit);
        $callDebit = (float) ($options['call_debit'] ?? $cfg->defaultCallDebit);
        $putDebit = (float) ($options['put_debit'] ?? $cfg->defaultPutDebit);
        $callTargetBalance = (float) ($options['call_target_balance'] ?? $options['call_balance'] ?? $cfg->callTargetBalance);
        $putTargetBalance = (float) ($options['put_target_balance'] ?? $options['put_balance'] ?? $cfg->putTargetBalance);
        $totalTargetBalance = $callTargetBalance + $putTargetBalance; // e.g. $200.00

        $combinedDebit = $callDebit + $putDebit; // $1.90
        $requiredExitValue = $combinedDebit + ($targetProfit / 100.0); // $3.90
        $dte = (int) ($options['dte'] ?? $cfg->defaultDte);
        $minRvol = (float) ($options['min_rvol'] ?? $cfg->minRvol);
        $maxIvRv = (float) ($options['max_iv_rv'] ?? $cfg->maxIvRv);
        $dryRun = (bool) ($options['dry_run'] ?? false);

        $now = date('Y-m-d H:i:s');
        $expiry = date('Y-m-d', strtotime("+{$dte} days"));
        $results = [];

        foreach ($universe as $ticker) {
            $evalParams = array_merge($options, [
                'strategy' => $strategy,
                'otm_offset_pct' => $otmOffsetPct,
                'target_profit' => $targetProfit,
                'call_debit' => $callDebit,
                'put_debit' => $putDebit,
                'call_target_balance' => $callTargetBalance,
                'put_target_balance' => $putTargetBalance,
                'total_target_balance' => $totalTargetBalance,
                'call_strike' => $options['call_strike'] ?? null,
                'put_strike' => $options['put_strike'] ?? null,
                'combined_debit' => $combinedDebit,
                'required_exit_value' => $requiredExitValue,
                'dte' => $dte,
                'min_rvol' => $minRvol,
                'max_iv_rv' => $maxIvRv,
                'expiry' => $expiry,
                'now' => $now,
            ]);
            $candidate = $this->evaluateTicker($ticker, $evalParams);

            if (! $dryRun && $this->candidateModel !== null) {
                try {
                    $this->candidateModel->insert($candidate);
                } catch (\Throwable $e) {
                    log_message('warning', 'OPTIONS: failed to insert candidate {t}: {m}', ['t' => $ticker, 'm' => $e->getMessage()]);
                }
            }
            $results[] = $candidate;
        }

        // Sort descending by ranking_score
        usort($results, fn($a, $b) => $b['ranking_score'] <=> $a['ranking_score']);

        $qualified = array_filter($results, fn($r) => $r['scan_status'] === 'qualified');

        $topRecommendation = (! empty($qualified) && ($qualified[array_key_first($qualified)]['ranking_score'] ?? 0) >= 70.0)
            ? 'TRADE'
            : 'NO TRADE';

        return [
            'scanned_at' => $now,
            'universe_count' => count($universe),
            'scanned_count' => count($results),
            'qualified_count' => count($qualified),
            'recommendation' => $topRecommendation,
            'strategy' => $strategy,
            'target_balance_call' => $callTargetBalance,
            'target_balance_put' => $putTargetBalance,
            'total_target_balance' => $totalTargetBalance,
            'macro_catalysts' => $macroCatalysts,
            'top_ranked' => array_slice($results, 0, 5),
            'all_results' => $results,
        ];
    }

    /**
     * Evaluate a single ticker for the two-sided options strategy.
     */
    public function evaluateTicker(string $ticker, array $params): array
    {
        $candles = $this->fetchCandles($ticker);
        $price = $this->extractCurrentPrice($ticker, $candles);

        $cfg = $this->resolveConfig();
        $strategy = (string) ($params['strategy'] ?? 'strangle');
        $otmOffsetPct = (float) ($params['otm_offset_pct'] ?? $cfg->defaultOtmOffsetPct ?? 2.6);
        $strikesOtm = (int) ($params['strikes_otm'] ?? $cfg->defaultStrikesOtm ?? 2);

        // Strike Step Size ($0.50, $1.00, $2.50, or $5.00 for price > 250)
        // Check for ticker-specific strike intervals (e.g. $2.50 for BA, AAPL, DIS)
        $stepOverrides = $cfg->strikeStepOverrides ?? ['BA' => 2.50, 'AAPL' => 2.50, 'DIS' => 2.50];
        $stepSize = (float) ($params['strike_step'] ?? ($stepOverrides[$ticker] ?? ($price > 250.0 ? 5.0 : ($price > 50.0 ? 1.0 : 0.5))));
        $atmStrike = round($price / $stepSize) * $stepSize;

        // Derive Strikes based on Strategy
        if ($strategy === 'straddle') {
            $callStrike = isset($params['call_strike']) && (float) $params['call_strike'] > 0
                ? (float) $params['call_strike']
                : (float) $atmStrike;
            $putStrike = isset($params['put_strike']) && (float) $params['put_strike'] > 0
                ? (float) $params['put_strike']
                : (float) $atmStrike;
            $strategyName = 'long_straddle';
        } else {
            // Default: OTM Strangle (Brent Sweet Spot: 2 strikes out from ATM)
            if ($strikesOtm > 0 && (! isset($params['otm_offset_pct']) || (float) $params['otm_offset_pct'] === 2.6 || (float) $params['otm_offset_pct'] === 4.0)) {
                $defaultCallStrike = $atmStrike + ($strikesOtm * $stepSize);
                $defaultPutStrike  = $atmStrike - ($strikesOtm * $stepSize);
            } else {
                $defaultCallStrike = round(($price * (1.0 + ($otmOffsetPct / 100.0))) / $stepSize) * $stepSize;
                $defaultPutStrike  = round(($price * (1.0 - ($otmOffsetPct / 100.0))) / $stepSize) * $stepSize;
            }

            $callStrike = isset($params['call_strike']) && (float) $params['call_strike'] > 0
                ? (float) $params['call_strike']
                : (float) $defaultCallStrike;

            $putStrike = isset($params['put_strike']) && (float) $params['put_strike'] > 0
                ? (float) $params['put_strike']
                : (float) $defaultPutStrike;

            $strategyName = 'long_strangle';
        }

        // Position sizing based on target balance entry ($100 Call / $100 Put)
        $callDebit = (float) $params['call_debit'];
        $putDebit = (float) $params['put_debit'];
        $callTargetBalance = (float) ($params['call_target_balance'] ?? 100.00);
        $putTargetBalance = (float) ($params['put_target_balance'] ?? 100.00);
        $totalTargetBalance = $callTargetBalance + $putTargetBalance;

        $contractsCall = max(1, (int) round($callTargetBalance / ($callDebit * 100.0)));
        $contractsPut = max(1, (int) round($putTargetBalance / ($putDebit * 100.0)));
        $actualOutlayCall = $contractsCall * $callDebit * 100.0;
        $actualOutlayPut = $contractsPut * $putDebit * 100.0;
        $totalEntryDebit = $actualOutlayCall + $actualOutlayPut;

        $atr14 = $this->calculateATR($candles, 14, $price);
        $historical5dRange = $this->calculate5DayRange($candles, $atr14);
        $rvol = $this->calculateRVOL($candles);

        // Price Displacement Efficiency
        $displacementEfficiency = $this->calculateDisplacementEfficiency($candles, $price);
        $turnoverEfficiency = $this->calculateTurnoverEfficiency($candles, $price);

        // Volume Acceleration
        $volAccel1m = $this->calculateVolumeAcceleration($candles, 1);
        $volAccel5m = $this->calculateVolumeAcceleration($candles, 5);
        $volAccel15m = $this->calculateVolumeAcceleration($candles, 15);

        // Range Expansion
        $sessionRange = $this->calculateCurrentSessionRange($candles, $atr14);
        $rangeExpansionRatio = $atr14 > 0 ? round($sessionRange / $atr14, 4) : 1.0;

        // Volatility metrics
        $realizedVol20d = $this->calculateRealizedVol($candles, 20);
        $ivCall = $this->estimateImpliedVol($ticker, $realizedVol20d, 'call');
        $ivPut = $this->estimateImpliedVol($ticker, $realizedVol20d, 'put');
        $avgIv = ($ivCall + $ivPut) / 2.0;
        $ivRvRatio = $realizedVol20d > 0 ? round($avgIv / $realizedVol20d, 4) : 1.0;

        $spreadPct = (float) ($params['spread_pct'] ?? 0.025); // 2.5% typical spread on liquid weekly strikes

        // Required price moves
        $combinedDebit = (float) $params['combined_debit'];
        $requiredExitValue = (float) $params['required_exit_value'];
        $targetProfit = (float) ($params['target_profit'] ?? 200.0);
        $breakevenMove = $combinedDebit;
        $breakevenMovePct = $price > 0 ? round(($breakevenMove / $price) * 100, 4) : 0.0;
        $targetMove = $requiredExitValue;
        $targetMovePct = $price > 0 ? round(($targetMove / $price) * 100, 4) : 0.0;

        // Profit-Reachability Engine
        $reachabilityScore = $this->calculateReachabilityScore([
            'stock_price' => $price,
            'target_move' => $targetMove,
            'historical_5d_range' => $historical5dRange,
            'atr_14' => $atr14,
            'rvol' => $rvol,
            'vol_accel' => $volAccel5m,
            'iv_rv_ratio' => $ivRvRatio,
            'dte' => (int) $params['dte'],
        ]);

        // AlphaVantage News & Ticker Catalyst Analysis
        $skipCatalyst = (bool) ($params['skip_catalyst'] ?? false);
        $catalystData = (! $skipCatalyst && $this->catalystService !== null)
            ? $this->catalystService->getTickerCatalyst($ticker)
            : [
                'available' => false,
                'sentiment_score' => 0.0,
                'sentiment_label' => 'Neutral',
                'catalyst_detected' => false,
                'catalyst_type' => 'none',
                'catalyst_momentum_boost' => 0.0,
                'top_headline' => '',
            ];

        // Composite Ranking Score (0 - 100) using 5-part research breakdown
        $rankingBreakdown = $this->calculate5PartRankingScore([
            'reachability_score' => $reachabilityScore,
            'displacement_efficiency' => $displacementEfficiency,
            'turnover_efficiency' => $turnoverEfficiency,
            'rvol' => $rvol,
            'vol_accel_5m' => $volAccel5m,
            'range_expansion' => $rangeExpansionRatio,
            'catalyst_detected' => (bool) ($catalystData['catalyst_detected'] ?? false),
            'sentiment_score' => (float) ($catalystData['sentiment_score'] ?? 0.0),
            'catalyst_boost' => (float) ($catalystData['catalyst_momentum_boost'] ?? 0.0),
            'spread_pct' => $spreadPct,
            'iv_rv_ratio' => $ivRvRatio,
            'combined_debit' => $combinedDebit,
            'target_profit' => $targetProfit,
        ]);
        $rankingScore = $rankingBreakdown['total_score'];

        // Screening decisions & exclusion codes
        $rejectionReason = null;
        $exclusionCode = null;
        $status = 'qualified';

        $maxSpreadPct = (float) ($params['max_spread_pct'] ?? 0.05);
        $minScore = (float) ($params['min_score'] ?? 70.0);

        if ($rvol < (float) $params['min_rvol']) {
            $status = 'rejected';
            $exclusionCode = 'RVOL_INSUFFICIENT';
            $rejectionReason = sprintf('RVOL %.2f below required %.2f baseline.', $rvol, (float) $params['min_rvol']);
        } elseif ($spreadPct > $maxSpreadPct) {
            $status = 'rejected';
            $exclusionCode = 'SPREAD_TOO_WIDE';
            $rejectionReason = sprintf('Bid-ask spread %.2f%% exceeds maximum allowed %.2f%%.', $spreadPct * 100, $maxSpreadPct * 100);
        } elseif ($ivRvRatio > (float) $params['max_iv_rv']) {
            $status = 'rejected';
            $exclusionCode = 'IV_RV_OVERPRICED';
            $rejectionReason = sprintf('IV/RV ratio %.2f exceeds max %.2f (options overpriced).', $ivRvRatio, (float) $params['max_iv_rv']);
        } elseif ($reachabilityScore < 45.0) {
            $status = 'rejected';
            $exclusionCode = 'INSUFFICIENT_RANGE_CAPACITY';
            $rejectionReason = 'Insufficient 5-day movement capacity relative to required exit target.';
        } elseif (! empty($params['require_catalyst']) && empty($catalystData['catalyst_detected'])) {
            $status = 'rejected';
            $exclusionCode = 'NO_CATALYST';
            $rejectionReason = 'No verifiable news or earnings catalyst detected.';
        } elseif ($rankingScore < $minScore) {
            $status = 'rejected';
            $exclusionCode = 'SCORE_BELOW_THRESHOLD';
            $rejectionReason = sprintf('Composite ranking score %.1f is below required %.1f threshold.', $rankingScore, $minScore);
        }

        $recommendation = ($status === 'qualified' && $rankingScore >= $minScore) ? 'TRADE' : 'NO TRADE';

        return [
            'ticker' => $ticker,
            'strategy' => $strategyName,
            'expiry' => $params['expiry'],
            'dte' => (int) $params['dte'],
            'stock_price' => round($price, 4),
            'call_strike' => round($callStrike, 4),
            'put_strike' => round($putStrike, 4),
            'call_target_balance' => round($callTargetBalance, 2),
            'put_target_balance' => round($putTargetBalance, 2),
            'total_target_balance' => round($totalTargetBalance, 2),
            'contracts_call' => $contractsCall,
            'contracts_put' => $contractsPut,
            'total_entry_debit' => round($totalEntryDebit, 2),
            'call_bid' => round((float) $params['call_debit'] * 0.98, 4),
            'call_ask' => round((float) $params['call_debit'] * 1.02, 4),
            'put_bid' => round((float) $params['put_debit'] * 0.98, 4),
            'put_ask' => round((float) $params['put_debit'] * 1.02, 4),
            'combined_debit' => round($combinedDebit, 4),
            'target_profit' => round((float) $params['target_profit'], 4),
            'required_exit_value' => round($requiredExitValue, 4),
            'breakeven_move' => round($breakevenMove, 4),
            'breakeven_move_pct' => $breakevenMovePct,
            'target_move' => round($targetMove, 4),
            'target_move_pct' => $targetMovePct,
            'atr_14' => round($atr14, 4),
            'historical_5d_range' => round($historical5dRange, 4),
            'rvol_20d' => round($rvol, 4),
            'price_displacement_efficiency' => round($displacementEfficiency, 6),
            'turnover_efficiency_pct' => round($turnoverEfficiency, 6),
            'vol_accel_1m' => round($volAccel1m, 4),
            'vol_accel_5m' => round($volAccel5m, 4),
            'vol_accel_15m' => round($volAccel15m, 4),
            'range_expansion_ratio' => round($rangeExpansionRatio, 4),
            'iv_call' => round($ivCall, 4),
            'iv_put' => round($ivPut, 4),
            'realized_vol_20d' => round($realizedVol20d, 4),
            'iv_rv_ratio' => round($ivRvRatio, 4),
            'spread_pct' => round($spreadPct, 4),
            'reachability_score' => round($reachabilityScore, 2),
            'ranking_score' => round($rankingScore, 2),
            'ranking_breakdown' => $rankingBreakdown,
            'recommendation' => $recommendation,
            'exclusion_code' => $exclusionCode,
            'news_catalyst_detected' => $catalystData['catalyst_detected'] ?? false,
            'news_catalyst_type' => $catalystData['catalyst_type'] ?? 'none',
            'news_sentiment_label' => $catalystData['sentiment_label'] ?? 'Neutral',
            'news_sentiment_score' => $catalystData['sentiment_score'] ?? 0.0,
            'news_top_headline' => $catalystData['top_headline'] ?? '',
            'news_catalyst_boost' => $catalystData['catalyst_momentum_boost'] ?? 0.0,
            'scan_status' => $status,
            'rejection_reason' => $rejectionReason,
            'scanned_at' => $params['now'],
            'created_at' => $params['now'],
        ];
    }

    /**
     * Calculate 5-part research ranking score (0 - 100 points).
     *
     * Breakdown:
     * - Technical setup: max 25 pts
     * - Catalyst quality: max 20 pts
     * - Execution liquidity: max 20 pts
     * - Risk / reward: max 25 pts
     * - Capital suitability: max 10 pts
     */
    public function calculate5PartRankingScore(array $data): array
    {
        $reachability = (float) ($data['reachability_score'] ?? 50.0);
        $rvol = (float) ($data['rvol'] ?? 1.0);
        $volAccel = (float) ($data['vol_accel_5m'] ?? 1.0);
        $rangeExpansion = (float) ($data['range_expansion'] ?? 1.0);
        $displacement = (float) ($data['displacement_efficiency'] ?? 0.35);
        $catalystDetected = (bool) ($data['catalyst_detected'] ?? false);
        $sentimentScore = (float) ($data['sentiment_score'] ?? 0.0);
        $catalystBoost = (float) ($data['catalyst_boost'] ?? 0.0);
        $spreadPct = (float) ($data['spread_pct'] ?? 0.025);
        $ivRvRatio = (float) ($data['iv_rv_ratio'] ?? 1.0);
        $combinedDebit = (float) ($data['combined_debit'] ?? 1.90);
        $targetProfit = (float) ($data['target_profit'] ?? 200.0);

        // 1. Technical Setup (max 25)
        $dispPts = min(8.0, max(0.0, $displacement * 15.0));
        $accelPts = min(8.0, max(0.0, ($volAccel - 0.8) * 10.0));
        $rangePts = min(9.0, max(0.0, ($rangeExpansion - 0.6) * 12.0));
        $technicalSetup = min(25.0, max(0.0, round($dispPts + $accelPts + $rangePts, 2)));

        // 2. Catalyst Quality (max 20)
        if ($catalystDetected) {
            $catBase = 10.0;
            $catSentiment = min(7.0, max(0.0, abs($sentimentScore) * 10.0));
            $catBoostPts = min(3.0, max(0.0, $catalystBoost * 1.5));
            $catalystQuality = min(20.0, max(0.0, round($catBase + $catSentiment + $catBoostPts, 2)));
        } else {
            $catalystQuality = 0.0;
        }

        // 3. Execution Liquidity (max 20)
        $rvolPts = min(10.0, max(0.0, ($rvol / 1.8) * 10.0));
        $spreadPts = min(10.0, max(0.0, (1.0 - ($spreadPct / 0.05)) * 10.0));
        $executionLiquidity = min(20.0, max(0.0, round($rvolPts + $spreadPts, 2)));

        // 4. Risk / Reward (max 25)
        $reachPts = min(18.0, max(0.0, ($reachability / 100.0) * 18.0));
        $ivRvPts = min(7.0, max(0.0, (1.6 - $ivRvRatio) * 7.0));
        $riskReward = min(25.0, max(0.0, round($reachPts + $ivRvPts, 2)));

        // 5. Capital Suitability (max 10)
        $debitPts = min(6.0, max(0.0, (3.50 - $combinedDebit) * 3.0));
        $profitMultiple = $combinedDebit > 0 ? ($targetProfit / ($combinedDebit * 100.0)) : 1.0;
        $profitPts = min(4.0, max(0.0, $profitMultiple * 3.5));
        $capitalSuitability = min(10.0, max(0.0, round($debitPts + $profitPts, 2)));

        $totalScore = min(100.0, max(5.0, round(
            $technicalSetup + $catalystQuality + $executionLiquidity + $riskReward + $capitalSuitability,
            2
        )));

        return [
            'technical_setup' => $technicalSetup,
            'catalyst_quality' => $catalystQuality,
            'execution_liquidity' => $executionLiquidity,
            'risk_reward' => $riskReward,
            'capital_suitability' => $capitalSuitability,
            'total_score' => $totalScore,
        ];
    }

    private function calculateReachabilityScore(array $data): float
    {
        $targetMove = (float) $data['target_move'];
        $histRange = max(0.01, (float) $data['historical_5d_range']);
        $atr = max(0.01, (float) $data['atr_14']);
        $rvol = (float) $data['rvol'];
        $volAccel = (float) $data['vol_accel'];
        $ivRv = max(0.1, (float) $data['iv_rv_ratio']);

        $rangeRatio = $targetMove / $histRange;
        $rangeCapacity = max(0.0, 1.0 - ($rangeRatio * 0.45));

        $atrRatio = $targetMove / ($atr * 3.0);
        $atrCapacity = max(0.0, 1.0 - ($atrRatio * 0.35));

        $momentumBoost = min(1.35, max(0.8, ($rvol * 0.4) + ($volAccel * 0.6)));
        $volDiscount = min(1.15, max(0.7, 1.0 / $ivRv));

        $raw = (($rangeCapacity * 0.60) + ($atrCapacity * 0.40)) * $momentumBoost * $volDiscount * 100.0;
        return max(5.0, min(95.0, round($raw, 2)));
    }

    private function calculateRankingScore(array $data): float
    {
        $reachability = (float) $data['reachability_score'];
        $rvol = (float) $data['rvol'];
        $volAccel = (float) $data['vol_accel_5m'];
        $rangeExpansion = (float) $data['range_expansion'];
        $displacement = (float) $data['displacement_efficiency'];

        $reachComponent = $reachability * 0.40;
        $rvolComponent = min(20.0, max(0.0, ($rvol - 0.8) * 10.0));
        $accelComponent = min(20.0, max(0.0, ($volAccel - 0.8) * 12.0));
        $rangeComponent = min(10.0, max(0.0, ($rangeExpansion - 0.5) * 8.0));
        $dispComponent = min(10.0, max(0.0, $displacement * 5.0));

        $catalystBoost = (float) ($data['catalyst_boost'] ?? 0.0);
        $total = $reachComponent + $rvolComponent + $accelComponent + $rangeComponent + $dispComponent + $catalystBoost;
        return max(5.0, min(99.0, $total));
    }

    private function fetchCandles(string $ticker): array
    {
        if ($this->providerRouter !== null) {
            try {
                $resp = $this->providerRouter->fetchCandles($ticker, '1day', 30);
                if (! empty($resp['candles'])) {
                    return $resp['candles'];
                }
            } catch (\Throwable) {
                // fall through to synthetic baseline
            }
        }

        return $this->generateBaselineCandles($ticker);
    }

    private function extractCurrentPrice(string $ticker, array $candles): float
    {
        if (! empty($candles)) {
            $last = end($candles);
            if (isset($last['close']) && (float) $last['close'] > 0) {
                return (float) $last['close'];
            }
        }

        return match ($ticker) {
            'NVDA' => 142.50,
            'TSLA' => 220.00,
            'AMD' => 156.00,
            'COIN' => 215.00,
            'BA' => 187.50,
            'SPY' => 580.00,
            'QQQ' => 495.00,
            'IWM' => 222.00,
            default => 100.00,
        };
    }

    private function calculateATR(array $candles, int $period, float $fallbackPrice): float
    {
        if (count($candles) < $period) {
            return round($fallbackPrice * 0.028, 4);
        }

        $trs = [];
        $count = count($candles);
        for ($i = 1; $i < $count; $i++) {
            $h = (float) ($candles[$i]['high'] ?? $candles[$i]['close']);
            $l = (float) ($candles[$i]['low'] ?? $candles[$i]['close']);
            $prevC = (float) ($candles[$i - 1]['close'] ?? $h);
            $tr = max($h - $l, abs($h - $prevC), abs($l - $prevC));
            $trs[] = $tr;
        }

        $slice = array_slice($trs, -$period);
        return count($slice) > 0 ? (array_sum($slice) / count($slice)) : ($fallbackPrice * 0.028);
    }

    private function calculate5DayRange(array $candles, float $fallbackAtr): float
    {
        if (count($candles) >= 5) {
            $last5 = array_slice($candles, -5);
            $highs = array_column($last5, 'high');
            $lows = array_column($last5, 'low');
            if (! empty($highs) && ! empty($lows)) {
                return max($highs) - min($lows);
            }
        }

        return $fallbackAtr * 2.3;
    }

    private function calculateRVOL(array $candles): float
    {
        if (count($candles) >= 20) {
            $volumes = array_column($candles, 'volume');
            $recent = (float) end($volumes);
            $slice = array_slice($volumes, -20);
            $avg = array_sum($slice) / count($slice);
            if ($avg > 0) {
                return round($recent / $avg, 4);
            }
        }
        return 1.65;
    }

    private function calculateDisplacementEfficiency(array $candles, float $price): float
    {
        if (count($candles) >= 2) {
            $last = end($candles);
            $prev = prev($candles);
            $deltaPrice = abs((float) ($last['close'] ?? $price) - (float) ($prev['close'] ?? $price));
            $volMillions = max(0.1, ((float) ($last['volume'] ?? 10000000)) / 1000000.0);
            return round($deltaPrice / $volMillions, 6);
        }
        return 0.350000;
    }

    private function calculateTurnoverEfficiency(array $candles, float $price): float
    {
        if (count($candles) >= 2) {
            $last = end($candles);
            $prev = prev($candles);
            $close = (float) ($last['close'] ?? $price);
            $prevClose = (float) ($prev['close'] ?? $price);
            $pctMove = $prevClose > 0 ? (abs($close - $prevClose) / $prevClose) * 100.0 : 1.0;
            $turnoverMillions = max(1.0, ((float) ($last['volume'] ?? 10000000) * $close) / 1000000.0);
            return round($pctMove / $turnoverMillions, 6);
        }
        return 0.005000;
    }

    private function calculateVolumeAcceleration(array $candles, int $minutes): float
    {
        return match ($minutes) {
            1 => 1.45,
            5 => 1.55,
            15 => 1.40,
            default => 1.25,
        };
    }

    private function calculateCurrentSessionRange(array $candles, float $atr14): float
    {
        if (! empty($candles)) {
            $last = end($candles);
            $high = (float) ($last['high'] ?? 0);
            $low = (float) ($last['low'] ?? 0);
            if ($high > $low) {
                return $high - $low;
            }
        }
        return $atr14 * 1.15;
    }

    private function calculateRealizedVol(array $candles, int $lookback = 20): float
    {
        if (count($candles) >= $lookback) {
            $returns = [];
            $count = count($candles);
            for ($i = $count - $lookback; $i < $count - 1; $i++) {
                $c1 = (float) ($candles[$i]['close'] ?? 0);
                $c2 = (float) ($candles[$i + 1]['close'] ?? 0);
                if ($c1 > 0) {
                    $returns[] = log($c2 / $c1);
                }
            }
            if (count($returns) > 1) {
                $mean = array_sum($returns) / count($returns);
                $sqDiffs = array_map(fn($r) => pow($r - $mean, 2), $returns);
                $std = sqrt(array_sum($sqDiffs) / (count($returns) - 1));
                return round($std * sqrt(252), 4);
            }
        }
        return 0.3850;
    }

    private function estimateImpliedVol(string $ticker, float $realizedVol, string $type): float
    {
        $multiplier = match ($ticker) {
            'NVDA', 'TSLA', 'COIN', 'AMD' => 1.12,
            'SPY', 'QQQ', 'IWM' => 1.05,
            default => 1.10,
        };
        return round($realizedVol * $multiplier, 4);
    }

    private function generateBaselineCandles(string $ticker): array
    {
        $basePrice = $this->extractCurrentPrice($ticker, []);
        $candles = [];
        $price = $basePrice * 0.95;
        $volBase = match ($ticker) {
            'NVDA', 'TSLA' => 45000000,
            'SPY', 'QQQ' => 60000000,
            default => 25000000,
        };

        for ($i = 25; $i >= 0; $i--) {
            $change = (sin($i * 0.5) * 0.02) + (cos($i * 0.3) * 0.015);
            $open = $price;
            $close = $open * (1.0 + $change);
            $high = max($open, $close) * 1.012;
            $low = min($open, $close) * 0.988;
            $volume = (int) ($volBase * (1.0 + (abs(sin($i)) * 0.5)));

            $candles[] = [
                'timestamp' => date('Y-m-d', strtotime("-{$i} days")),
                'open' => round($open, 2),
                'high' => round($high, 2),
                'low' => round($low, 2),
                'close' => round($close, 2),
                'volume' => $volume,
            ];
            $price = $close;
        }

        return $candles;
    }
}
