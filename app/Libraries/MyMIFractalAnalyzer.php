<?php

namespace App\Libraries;

use App\Libraries\{BaseLoader};
use App\Models\{InvestmentModel};
use CodeIgniter\HTTP\CURLRequest;
use Psr\Log\LoggerInterface;

#[\AllowDynamicProperties]
class MyMIFractalAnalyzer
{
    protected $investmentModel;
    protected $curlRequest;
    protected $logger;

    public function __construct() 
    {
        $this->investmentModel = new InvestmentModel();
        $this->curlRequest = service('curlrequest');
        $this->logger = service('logger');
    }

    // Analyze fractal patterns in the market data for a given symbol
    public function analyzeFractalPatterns($symbol)
    {
        $data = $this->fetchMarketData($symbol);
        if (empty($data)) {
            $this->logger->error("No market data available for symbol: $symbol");
            return [];
        }

        $fractals = $this->findFractalPatterns($data);
        $fractalAnalysis = $this->analyzeFractalBehavior($fractals, $data);

        return $fractalAnalysis;
    }

    // The general analyze method used by MyMIInvestments
    public function analyze($symbol)
    {
        // Generalized fractal analysis for any market symbol
        return $this->analyzeFractalPatterns($symbol);
    }

    // Analyze growth metrics for a portfolio
    public function analyzeGrowthMetrics($portfolio)
    {
        $growthMetrics = [
            'totalGrowth' => 0,
            'averageGrowthRate' => 0,
            'investmentCount' => count($portfolio),
        ];

        if (!empty($portfolio)) {
            $totalGrowth = 0;
            $validInvestments = 0;

            foreach ($portfolio as $investment) {
                // Ensure required keys exist and are numeric
                if (
                    isset($investment['total_trade_cost'], $investment['current_price'], $investment['shares']) &&
                    is_numeric($investment['total_trade_cost']) &&
                    is_numeric($investment['current_price']) &&
                    is_numeric($investment['shares']) &&
                    $investment['total_trade_cost'] > 0
                ) {
                    $initialValue = $investment['total_trade_cost'];
                    $currentValue = $investment['current_price'] * $investment['shares'];
                    $growth = (($currentValue - $initialValue) / $initialValue) * 100;

                    $totalGrowth += $growth;
                    $validInvestments++;
                }
            }

            // Update growth metrics if there are valid investments
            if ($validInvestments > 0) {
                $growthMetrics['totalGrowth'] = $totalGrowth;
                $growthMetrics['averageGrowthRate'] = $totalGrowth / $validInvestments;
            }
        }

        return $growthMetrics;
    }

    // Analyze risk based on fractal patterns for a given symbol
    public function analyzeFractalRisk($symbol)
    {
        $data = $this->fetchMarketData($symbol);
        $volatility = $this->calculateFractalVolatility($data);

        return [
            'symbol' => $symbol,
            'volatility' => $volatility,
            'riskLevel' => $this->determineRiskLevel($volatility),
        ];
    }

    // Fetch market data for a given symbol (dummy implementation) // !! FIX THIS
    private function fetchMarketData($symbol)
    {
        // Placeholder array to simulate market data
        $dummyData = [
            'timeSeries' => [
                '2024-09-10' => 100,
                '2024-09-11' => 102,
                '2024-09-12' => 101,
                '2024-09-13' => 105,
                '2024-09-14' => 107,
                '2024-09-15' => 110
            ]
        ];

        // Log that a dummy data is being used for testing purposes
        log_message('info', 'Using dummy market data for symbol: {symbol}', ['symbol' => $symbol]);

        return $dummyData['timeSeries'];
    }


    // Identify fractal patterns in the time series data
    private function findFractalPatterns(array $timeSeriesData)
    {
        $fractals = [];
        foreach ($timeSeriesData as $time => $price) {
            if ($this->isFractalPoint($price)) {
                $fractals[] = ['time' => $time, 'price' => $price];
            }
        }

        return $fractals;
    }

    // Determine if a price point is a fractal point
    private function isFractalPoint($price)
    {
        // Example heuristic for fractal point detection
        return rand(0, 1) === 1;
    }

    // Analyze fractal behavior based on detected fractals and market data
    private function analyzeFractalBehavior($fractals, $data)
    {
        $volatility = $this->calculateFractalVolatility($fractals);
        $riskLevel = $this->determineRiskLevel($volatility);
        $trendPrediction = $this->predictMarketTrends($fractals, $data);

        return [
            'volatility' => $volatility,
            'riskLevel' => $riskLevel,
            'trendPrediction' => $trendPrediction,
        ];
    }

    // Calculate volatility based on fractal patterns
    private function calculateFractalVolatility($fractals)
    {
        // Example volatility calculation
        return rand(1, 100);
    }

    // Determine risk level based on volatility
    private function determineRiskLevel($volatility)
    {
        if ($volatility > 75) {
            return 'High';
        } elseif ($volatility > 50) {
            return 'Medium';
        }

        return 'Low';
    }

    // Predict market trends based on fractal data
    private function predictMarketTrends($fractals, $data)
    {
        $trend = [];
        foreach ($fractals as $fractal) {
            $patternStrength = $this->evaluateFractalStrength($fractal, $data);
            $trend[] = ['time' => $fractal['time'], 'strength' => $patternStrength];
        }

        return $trend;
    }

    // Evaluate the strength of a fractal pattern
    private function evaluateFractalStrength($fractal, $data)
    {
        // Example evaluation of fractal strength
        return rand(1, 100);
    }

    // Analyze cross-asset fractal risk for a list of symbols
    public function analyzeCrossAssetFractalRisk($symbols)
    {
        $crossAssetRisk = [];
        foreach ($symbols as $symbol) {
            $riskAnalysis = $this->analyzeFractalRisk($symbol);
            $crossAssetRisk[$symbol] = $riskAnalysis;
        }

        return $crossAssetRisk;
    }

    // Fetch historical fractal data for a symbol
    public function fetchHistoricalFractalData($symbol)
    {
        $historicalData = $this->fetchMarketData($symbol);
        $fractalHistory = $this->findFractalPatterns($historicalData);

        return $fractalHistory;
    }

    // Compare fractal patterns between two symbols
    public function compareFractalPatterns($symbol1, $symbol2)
    {
        $symbol1Fractals = $this->analyzeFractalPatterns($symbol1);
        $symbol2Fractals = $this->analyzeFractalPatterns($symbol2);

        return $this->comparePatterns($symbol1Fractals, $symbol2Fractals);
    }

    // Compare two fractal patterns to determine similarity
    private function comparePatterns($pattern1, $pattern2)
    {
        $similarity = 0;
        foreach ($pattern1 as $key => $value) {
            if (isset($pattern2[$key]) && $pattern2[$key] === $value) {
                $similarity++;
            }
        }

        return $similarity / max(count($pattern1), count($pattern2));
    }
}
