<?php

namespace App\Services;

use App\Models\{AccountsModel, InvestmentModel, MgmtBudgetModel, WalletModel};
use CodeIgniter\Cache\CacheInterface;
use CodeIgniter\Session\Session;
use Psr\Log\LoggerInterface;
use CodeIgniter\HTTP\CURLRequest;
use Config\{APIs, SiteSettings};
use App\Libraries\{BaseLoader, FRED, MyMICoin, MyMIDashboard, MyMIFractalAnalyzer, MyMIGold, MyMIInvestments, MyMIMarketing, MyMIWallet};

class InvestmentService
{

    protected $accountsModel; // Add this line to hold the AccountsModel instance
    protected $investmentModel;
    protected $MyMIInvestments;
    public function __construct() {
    
        // Set up all the injected services
        $this->accountsModel = new AccountsModel(); // Initialize AccountsModel
        $this->investmentModel = new InvestmentModel();

        // Initialize the MyMIInvestments library with all the dependencies
        $this->MyMIInvestments = new MyMIInvestments();
    }  

    // Internal function to analyze risk
    private function analyzeRisk($portfolio)
    {
        $riskExposure = 0;
        foreach ($portfolio as $investment) {
            $riskExposure += $investment['value'] * $investment['risk_factor'];
        }
        return $riskExposure;
    }

    // Calculate risk exposure for a user portfolio
    public function calculateRiskExposure($userId)
    {
        $portfolio = $this->investmentModel->getUserPortfolio($userId);
        // Add logic here for calculating risk exposure
        return $this->analyzeRisk($portfolio);
    }

    // Fetch real-time data for a given symbol
    public function fetchRealTimeData($symbol)
    {
        return $this->MyMIInvestments->fetchRealTimeData($symbol);
    }

    // Get custom alerts for a user
    public function getCustomAlerts($userId)
    {
        return $this->investmentModel->getCustomAlerts($userId);
    }

    public function getInvestmentDashboard($cuID) {
        $getUpcomingEconomicCalendar = $this->investmentModel->getUpcomingEconomicEvents();

        $investDashboard = [
            'economicData' => [],
            'economicCalendar' => $getUpcomingEconomicCalendar,
            'investmentTools' => [],
        ];

        return $investDashboard;
    }

    public function getInvestmentData($cuID)
    {
        $data = [];
    
        // Fetch the user investment accounts
        $data['userInvestmentWallets'] = $this->accountsModel->getUserInvestAccounts($cuID);
    
        // Fetch all user investments, including overview and performance metrics
        $allUserInvestments = $this->MyMIInvestments->allUserInvestmentsInfo($cuID);
    
        // Fetch all Investment Dashboard Supplementary Information
        $investDashboard = $this->getInvestmentDashboard($cuID); 

        // Populate the data array with the necessary keys from $allUserInvestments
        $data = array_merge($data, [
            'investmentOverview' => $allUserInvestments['investmentOverview'] ?? [],
            'userInvestmentRecords' => $allUserInvestments['userInvestmentRecords'] ?? [],
            'activeInvestments' => $allUserInvestments['activeInvestments'] ?? [],
            'totalUserInvestments' => $allUserInvestments['activeInvestments'] ?? [],
            'totalTradeValue' => $allUserInvestments['totalTradeValue'] ?? 0,
            'totalTradeValueSum' => $allUserInvestments['totalTradeValueSum'] ?? 0,
            'totalAssetValueSum' => $allUserInvestments['totalAssetValueSum'] ?? 0,
            'totalLastTradeValueSum' => $allUserInvestments['totalLastTradeValueSum'] ?? 0,
            'totalAnnualTradeValueSum' => $allUserInvestments['totalAnnualTradeValueSum'] ?? 0,
            'totalAnnualTradePerformance' => $allUserInvestments['totalGrowth'] ?? 0,
            'thisMonthTradePerformance' => $allUserInvestments['totalMonthlyTradesCount'] ?? 0,
            'totalTradeCount' => $allUserInvestments['totalTradeCount'] ?? 0,
            'totalActiveTradeCount' => $allUserInvestments['totalActiveTradeCount'] ?? 0,
            'totalUserAssetsValue' => $allUserInvestments['totalUserAssetsValue'] ?? 0,
            'totalUserAssetsCount' => $allUserInvestments['totalUserAssetsCount'] ?? 0,
            'totalUserAssetPerformance' => $allUserInvestments['totalUserAssetPerformance'] ?? 0,
            'totalMonthlyTradesCount' => $allUserInvestments['totalMonthlyTradesCount'] ?? 0,
            'totalAssetCount' => $allUserInvestments['totalAssetCount'] ?? 0,
            'totalGrowth' => $allUserInvestments['totalGrowth'] ?? 0,
            'userCurrentAnnualValue' => $allUserInvestments['userCurrentAnnualValue'] ?? 0,
            'userCurrentAnnualPerformance' => $allUserInvestments['userCurrentAnnualPerformance'] ?? 0,
            'userCurrentAnnualTarget' => $allUserInvestments['userCurrentAnnualTarget'] ?? 0,
            'userTopGainers' => $allUserInvestments['userTopGainers'] ?? [],
            'userTopGainer' => $allUserInvestments['userTopGainer'] ?? [],
            'userTopLosers' => $allUserInvestments['userTopLosers'] ?? [],
            'userTopLoser' => $allUserInvestments['userTopLoser'] ?? [],
            'userWatchlist' => $allUserInvestments['userWatchlist'] ?? [],
            'topPerformers' => $allUserInvestments['investmentOverview']['topInvestmentPerformers'] ?? [],
            'topLosers' => $allUserInvestments['investmentOverview']['topInvestmentLosers'] ?? [],
            'economicData' => $investDashboard['economicData'] ?? [],
            'economicCalendar' => $investDashboard['economicCalendar'] ?? [],
            'investmentTools' => $investDashboard['investmentTools'] ?? [],
        ]);
    
        return $data;
    }  

    // Get market news for the user
    public function getMarketNews($cuID)
    {
        return $this->MyMIMarketData->fetchNews($cuID);
    }

    // Get symbols based on trade type
    public function getSymbolsByTradeType($tradeType)
    {
        return $this->MyMIInvestments->getSymbolsByTradeType($tradeType);
    }

    public function getUserInvestments($userId)
    {
        // Assuming $this->investmentModel is already defined and retrieves investments
        $userInvestments = $this->investmentModel->getUserInvestments($userId);
        log_message('debug', 'InvestmentService L32 - $userInvestments Array: ' . (print_r($userInvestments, true)));
    } 

    // Get user investment summary
    public function getUserInvestmentSummary($userId)
    {
        return $this->investmentModel->getInvestmentSummary($userId);
    }

    // Set custom alerts for a user
    public function setCustomAlert($userId, $alertData)
    {
        return $this->investmentModel->setCustomAlert($userId, $alertData);
    }

    // Track the returns on a specific investment
    public function trackInvestmentReturns($userId, $investmentId)
    {
        return $this->investmentModel->getInvestmentReturns($userId, $investmentId);
    }

    /**
     * Replay the approved MyMI strategy against deterministic historical events.
     *
     * Canonical stages:
     * ema_liquidity_1h
     * ema_stack_bullish_30m
     * volume_breakout_15m
     * execution_5m
     */
    public function replayStrategyValidation(array $events, array $options = []): array
    {
        $oneHourMaxAgeSeconds =
            (int) ($options['one_hour_max_age_seconds'] ?? 172800);

        $thirtyMinuteMaxAgeSeconds =
            (int) ($options['thirty_minute_max_age_seconds'] ?? 43200);

        if (
            $oneHourMaxAgeSeconds < 1
            || $thirtyMinuteMaxAgeSeconds < 1
        ) {
            throw new \InvalidArgumentException(
                'Strategy validation age limits must be positive integers.'
            );
        }

        $allowedStages = [
            'ema_liquidity_1h',
            'ema_stack_bullish_30m',
            'volume_breakout_15m',
            'execution_5m',
        ];

        $normalized = [];
        $rejected = [];

        foreach ($events as $sourceIndex => $event) {
            if (! is_array($event)) {
                $rejected[] = [
                    'source_index' => $sourceIndex,
                    'reason' => 'event_not_array',
                ];
                continue;
            }

            $symbolValue =
                $event['symbol']
                ?? $event['ticker']
                ?? '';

            if (! is_scalar($symbolValue)) {
                $rejected[] = [
                    'source_index' => $sourceIndex,
                    'reason' => 'symbol_invalid',
                ];
                continue;
            }

            $symbol = strtoupper(
                trim((string) $symbolValue)
            );

            $stage = strtolower(
                trim((string) ($event['stage'] ?? ''))
            );

            $timestampParts =
                $this->normalizeStrategyValidationTimestamp(
                    $event['timestamp']
                    ?? $event['occurred_at']
                    ?? $event['event_at']
                    ?? null
                );

            if ($symbol === '') {
                $rejected[] = [
                    'source_index' => $sourceIndex,
                    'reason' => 'symbol_missing',
                ];
                continue;
            }

            if (! in_array($stage, $allowedStages, true)) {
                $rejected[] = [
                    'source_index' => $sourceIndex,
                    'symbol' => $symbol,
                    'stage' => $stage,
                    'reason' => 'stage_invalid',
                ];
                continue;
            }

            if ($timestampParts === null) {
                $rejected[] = [
                    'source_index' => $sourceIndex,
                    'symbol' => $symbol,
                    'stage' => $stage,
                    'reason' =>
                        'timestamp_invalid_or_timezone_missing',
                ];
                continue;
            }

            $timestamp =
                $timestampParts['seconds'];

            $timestampMicroseconds =
                $timestampParts['microseconds'];

            $price =
                $event['price']
                ?? $event['close']
                ?? null;

            $normalized[] = [
                'source_index' => $sourceIndex,
                'symbol' => $symbol,
                'stage' => $stage,
                'timestamp' => $timestamp,
                'timestamp_microseconds' =>
                    $timestampMicroseconds,
                'price' =>
                    is_numeric($price)
                        ? (float) $price
                        : null,
            ];
        }

        usort(
            $normalized,
            static function (
                array $left,
                array $right
            ): int {
                $symbolCompare = strcmp(
                    $left['symbol'],
                    $right['symbol']
                );

                if ($symbolCompare !== 0) {
                    return $symbolCompare;
                }

                $timeCompare =
                    $left['timestamp_microseconds']
                    <=> $right['timestamp_microseconds'];

                if ($timeCompare !== 0) {
                    return $timeCompare;
                }

                $leftSourceIndex =
                    $left['source_index'];

                $rightSourceIndex =
                    $right['source_index'];

                if (
                    is_int($leftSourceIndex)
                    && is_int($rightSourceIndex)
                ) {
                    return
                        $leftSourceIndex
                        <=> $rightSourceIndex;
                }

                return strcmp(
                    (string) $leftSourceIndex,
                    (string) $rightSourceIndex
                );
            }
        );

        $stateBySymbol = [];
        $matches = [];
        $alignmentRejections = [];

        foreach ($normalized as $event) {
            $symbol = $event['symbol'];
            $stage = $event['stage'];
            $timestamp = $event['timestamp'];

            if (! isset($stateBySymbol[$symbol])) {
                $stateBySymbol[$symbol] = [
                    'one_hour' => null,
                    'thirty_minute' => null,
                    'fifteen_minute' => null,
                ];
            }

            $state = &$stateBySymbol[$symbol];

            if ($stage === 'ema_liquidity_1h') {
                $state['one_hour'] = $event;
                $state['thirty_minute'] = null;
                $state['fifteen_minute'] = null;
                unset($state);
                continue;
            }

            if ($stage === 'ema_stack_bullish_30m') {
                $oneHour = $state['one_hour'];

                if (
                    ! is_array($oneHour)
                    || $timestamp < $oneHour['timestamp']
                    || (
                        $timestamp
                        - $oneHour['timestamp']
                    ) > $oneHourMaxAgeSeconds
                ) {
                    $alignmentRejections[] =
                        $this->strategyValidationRejection(
                            $event,
                            'one_hour_confirmation_missing_or_expired'
                        );

                    $state['thirty_minute'] = null;
                    $state['fifteen_minute'] = null;
                    unset($state);
                    continue;
                }

                $state['thirty_minute'] = $event;
                $state['fifteen_minute'] = null;
                unset($state);
                continue;
            }

            if ($stage === 'volume_breakout_15m') {
                $oneHour = $state['one_hour'];
                $thirtyMinute =
                    $state['thirty_minute'];

                if (
                    ! is_array($oneHour)
                    || ! is_array($thirtyMinute)
                    || $timestamp
                        < $thirtyMinute['timestamp']
                    || (
                        $timestamp
                        - $oneHour['timestamp']
                    ) > $oneHourMaxAgeSeconds
                    || (
                        $timestamp
                        - $thirtyMinute['timestamp']
                    ) > $thirtyMinuteMaxAgeSeconds
                ) {
                    $alignmentRejections[] =
                        $this->strategyValidationRejection(
                            $event,
                            'confirmation_chain_missing_or_expired'
                        );

                    $state['fifteen_minute'] = null;
                    unset($state);
                    continue;
                }

                $state['fifteen_minute'] = $event;
                unset($state);
                continue;
            }

            $oneHour = $state['one_hour'];
            $thirtyMinute =
                $state['thirty_minute'];
            $fifteenMinute =
                $state['fifteen_minute'];

            if (
                ! is_array($oneHour)
                || ! is_array($thirtyMinute)
                || ! is_array($fifteenMinute)
                || $timestamp
                    < $fifteenMinute['timestamp']
                || (
                    $timestamp
                    - $oneHour['timestamp']
                ) > $oneHourMaxAgeSeconds
                || (
                    $timestamp
                    - $thirtyMinute['timestamp']
                ) > $thirtyMinuteMaxAgeSeconds
            ) {
                $alignmentRejections[] =
                    $this->strategyValidationRejection(
                        $event,
                        'execution_chain_missing_or_expired'
                    );

                unset($state);
                continue;
            }

            $matches[] = [
                'symbol' => $symbol,
                'strategy' =>
                    'ema_liquidity_1h__'
                    . 'ema_stack_bullish_30m__'
                    . 'volume_breakout_15m__'
                    . 'execution_5m',

                'ema_liquidity_1h_timestamp' =>
                    $oneHour['timestamp'],

                'ema_stack_bullish_30m_timestamp' =>
                    $thirtyMinute['timestamp'],

                'volume_breakout_15m_timestamp' =>
                    $fifteenMinute['timestamp'],

                'execution_5m_timestamp' =>
                    $timestamp,

                'one_hour_age_seconds' =>
                    $timestamp
                    - $oneHour['timestamp'],

                'thirty_minute_age_seconds' =>
                    $timestamp
                    - $thirtyMinute['timestamp'],

                'entry_price' => $event['price'],

                'source_indexes' => [
                    'ema_liquidity_1h' =>
                        $oneHour['source_index'],

                    'ema_stack_bullish_30m' =>
                        $thirtyMinute['source_index'],

                    'volume_breakout_15m' =>
                        $fifteenMinute['source_index'],

                    'execution_5m' =>
                        $event['source_index'],
                ],
            ];

            unset($state);
        }

        return [
            'strategy' =>
                'ema_liquidity_1h__'
                . 'ema_stack_bullish_30m__'
                . 'volume_breakout_15m__'
                . 'execution_5m',

            'constraints' => [
                'one_hour_max_age_seconds' =>
                    $oneHourMaxAgeSeconds,

                'thirty_minute_max_age_seconds' =>
                    $thirtyMinuteMaxAgeSeconds,
            ],

            'input_event_count' =>
                count($events),

            'normalized_event_count' =>
                count($normalized),

            'rejected_event_count' =>
                count($rejected),

            'alignment_rejection_count' =>
                count($alignmentRejections),

            'match_count' =>
                count($matches),

            'matches' =>
                $matches,

            'rejected_events' =>
                $rejected,

            'alignment_rejections' =>
                $alignmentRejections,
        ];
    }

    /**
     * @return array{seconds:int,microseconds:int}|null
     */
    private function normalizeStrategyValidationTimestamp($value): ?array
    {
        if (is_int($value)) {
            if ($value < 1) {
                return null;
            }

            return [
                'seconds' => $value,
                'microseconds' =>
                    $value * 1000000,
            ];
        }

        if (! is_string($value)) {
            return null;
        }

        $value = trim($value);

        if ($value === '') {
            return null;
        }

        if (ctype_digit($value)) {
            $timestamp = (int) $value;

            if ($timestamp < 1) {
                return null;
            }

            return [
                'seconds' => $timestamp,
                'microseconds' =>
                    $timestamp * 1000000,
            ];
        }

        /*
         * Require a fixed absolute RFC 3339-style timestamp so
         * historical replay cannot depend on wall-clock-relative
         * DateTime parsing.
         */
        if (
            preg_match(
                '/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}(?:\.\d{1,6})?(?:Z|[+-]\d{2}:\d{2})$/i',
                $value
            ) !== 1
        ) {
            return null;
        }

        try {
            $parsed =
                new \DateTimeImmutable($value);

            $parseErrors =
                \DateTimeImmutable::getLastErrors();

            if (
                is_array($parseErrors)
                && (
                    (int) (
                        $parseErrors['warning_count']
                        ?? 0
                    ) > 0
                    || (int) (
                        $parseErrors['error_count']
                        ?? 0
                    ) > 0
                )
            ) {
                return null;
            }

            $seconds =
                $parsed->getTimestamp();

            $fractionalMicroseconds =
                (int) $parsed->format('u');

            return [
                'seconds' => $seconds,
                'microseconds' =>
                    ($seconds * 1000000)
                    + $fractionalMicroseconds,
            ];
        } catch (\Throwable $exception) {
            return null;
        }
    }

    private function strategyValidationRejection(
        array $event,
        string $reason
    ): array {
        return [
            'source_index' =>
                $event['source_index'],

            'symbol' =>
                $event['symbol'],

            'stage' =>
                $event['stage'],

            'timestamp' =>
                $event['timestamp'],

            'reason' =>
                $reason,
        ];
    }
}
