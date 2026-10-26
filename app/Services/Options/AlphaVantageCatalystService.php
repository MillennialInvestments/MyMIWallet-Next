<?php

declare(strict_types=1);

namespace App\Services\Options;

use Config\OptionsStrategy;
use Config\Services;
use Throwable;

/**
 * AlphaVantage Catalyst & Economic News Service.
 *
 * Ingests and analyzes ticker-specific news sentiment, catalyst events,
 * and macroeconomic updates from AlphaVantage to identify momentum triggers
 * for weekly two-sided options strategies.
 */
class AlphaVantageCatalystService
{
    protected string $apiKey;
    protected bool $enabled;
    protected float $minSentimentThreshold;
    protected ?object $httpClient;

    /**
     * In-memory cache for fast reuse within single request/CLI run.
     */
    protected static array $memoryCache = [];

    public function __construct(?string $apiKey = null, ?object $httpClient = null)
    {
        $cfg = function_exists('config') ? config('OptionsStrategy') : null;
        if (! ($cfg instanceof OptionsStrategy)) {
            $cfg = new OptionsStrategy();
        }

        $resolvedKey = $apiKey
            ?: ($cfg->alphaVantageApiKey ?? '')
            ?: (string) env('ALPHA_VANTAGE_API_KEY')
            ?: (string) env('ALPHAVANTAGE_API_KEY')
            ?: (string) env('ALPHA_VANTAGE_KEY')
            ?: '';

        $this->apiKey = trim($resolvedKey);
        $this->enabled = (bool) ($cfg->enableAlphaVantageCatalyst ?? true);
        $this->minSentimentThreshold = (float) ($cfg->catalystMinSentimentScore ?? 0.15);
        $this->httpClient = $httpClient;
    }

    /**
     * Check if an API key is configured.
     */
    public function isConfigured(): bool
    {
        return $this->apiKey !== '';
    }

    /**
     * Get news catalysts and sentiment for a specific ticker.
     *
     * @return array{
     *   ticker: string,
     *   available: bool,
     *   article_count: int,
     *   sentiment_score: float,
     *   sentiment_label: string,
     *   catalyst_detected: bool,
     *   catalyst_type: string,
     *   catalyst_momentum_boost: float,
     *   top_headline: string,
     *   headlines: list<array>,
     *   cached: bool
     * }
     */
    public function getTickerCatalyst(string $ticker, bool $useCache = true): array
    {
        $ticker = strtoupper(trim($ticker));
        $cacheKey = 'av_catalyst_' . strtolower($ticker);

        if ($useCache && isset(self::$memoryCache[$cacheKey])) {
            $res = self::$memoryCache[$cacheKey];
            $res['cached'] = true;
            return $res;
        }

        if (! $this->isConfigured() || ! $this->enabled) {
            return $this->buildFallbackResponse($ticker, 'API Key not configured or service disabled');
        }

        $url = sprintf(
            'https://www.alphavantage.co/query?function=NEWS_SENTIMENT&tickers=%s&sort=LATEST&limit=10&apikey=%s',
            urlencode($ticker),
            urlencode($this->apiKey)
        );

        $payload = $this->executeHttpRequest($url);

        if ($payload === null) {
            return $this->buildFallbackResponse($ticker, 'API request returned no data');
        }

        $parsed = $this->parseTickerNewsPayload($ticker, $payload);
        self::$memoryCache[$cacheKey] = $parsed;

        return $parsed;
    }

    /**
     * Get macroeconomic updates and market-wide catalysts (e.g. for SPY, QQQ, IWM).
     *
     * @return array{
     *   available: bool,
     *   macro_sentiment_score: float,
     *   macro_sentiment_label: string,
     *   top_macro_headlines: list<string>,
     *   key_topics: list<string>
     * }
     */
    public function getMacroEconomicUpdates(bool $useCache = true): array
    {
        $cacheKey = 'av_macro_catalysts';

        if ($useCache && isset(self::$memoryCache[$cacheKey])) {
            return self::$memoryCache[$cacheKey];
        }

        if (! $this->isConfigured() || ! $this->enabled) {
            return [
                'available' => false,
                'macro_sentiment_score' => 0.0,
                'macro_sentiment_label' => 'Neutral',
                'top_macro_headlines' => [],
                'key_topics' => [],
            ];
        }

        $url = sprintf(
            'https://www.alphavantage.co/query?function=NEWS_SENTIMENT&topics=economy_macro,financial_markets&sort=LATEST&limit=5&apikey=%s',
            urlencode($this->apiKey)
        );

        $payload = $this->executeHttpRequest($url);

        if ($payload === null || empty($payload['feed']) || ! is_array($payload['feed'])) {
            return [
                'available' => false,
                'macro_sentiment_score' => 0.0,
                'macro_sentiment_label' => 'Neutral',
                'top_macro_headlines' => [],
                'key_topics' => [],
            ];
        }

        $headlines = [];
        $totalSentiment = 0.0;
        $count = 0;
        $allTopics = [];

        foreach ($payload['feed'] as $article) {
            if (isset($article['title']) && is_string($article['title'])) {
                $headlines[] = trim($article['title']);
            }
            if (isset($article['overall_sentiment_score'])) {
                $totalSentiment += (float) $article['overall_sentiment_score'];
                $count++;
            }
            if (! empty($article['topics']) && is_array($article['topics'])) {
                foreach ($article['topics'] as $top) {
                    if (isset($top['topic'])) {
                        $allTopics[] = (string) $top['topic'];
                    }
                }
            }
        }

        $avgSentiment = $count > 0 ? round($totalSentiment / $count, 4) : 0.0;
        $sentimentLabel = $this->scoreToLabel($avgSentiment);

        $result = [
            'available' => true,
            'macro_sentiment_score' => $avgSentiment,
            'macro_sentiment_label' => $sentimentLabel,
            'top_macro_headlines' => array_slice($headlines, 0, 5),
            'key_topics' => array_values(array_unique($allTopics)),
        ];

        self::$memoryCache[$cacheKey] = $result;

        return $result;
    }

    /**
     * Parse news sentiment payload for a specific ticker.
     */
    public function parseTickerNewsPayload(string $ticker, array $payload): array
    {
        if (isset($payload['Note']) || isset($payload['Information'])) {
            // AlphaVantage rate limit or information message
            $info = (string) ($payload['Note'] ?? $payload['Information'] ?? '');
            return $this->buildFallbackResponse($ticker, 'AlphaVantage Notice: ' . substr($info, 0, 80));
        }

        if (empty($payload['feed']) || ! is_array($payload['feed'])) {
            return $this->buildFallbackResponse($ticker, 'No recent news articles found for ticker');
        }

        $articles = [];
        $tickerSentiments = [];
        $overallSentiments = [];
        $catalystsFound = [];

        foreach ($payload['feed'] as $item) {
            $title = (string) ($item['title'] ?? '');
            $summary = (string) ($item['summary'] ?? '');
            $url = (string) ($item['url'] ?? '');
            $timePublished = (string) ($item['time_published'] ?? '');
            $overallScore = (float) ($item['overall_sentiment_score'] ?? 0.0);
            $overallLabel = (string) ($item['overall_sentiment_label'] ?? 'Neutral');

            // Find ticker specific sentiment if present
            $tickerScore = $overallScore;
            $relevance = 0.5;

            if (! empty($item['ticker_sentiment']) && is_array($item['ticker_sentiment'])) {
                foreach ($item['ticker_sentiment'] as $ts) {
                    if (strtoupper((string) ($ts['ticker'] ?? '')) === $ticker) {
                        $tickerScore = (float) ($ts['ticker_sentiment_score'] ?? $overallScore);
                        $relevance   = (float) ($ts['relevance_score'] ?? 0.5);
                        break;
                    }
                }
            }

            // Detect Catalysts
            $catalystType = $this->detectCatalystType($title . ' ' . $summary);
            if ($catalystType !== 'general') {
                $catalystsFound[] = $catalystType;
            }

            $articles[] = [
                'title' => $title,
                'summary' => substr($summary, 0, 160) . '...',
                'url' => $url,
                'time_published' => $timePublished,
                'sentiment_score' => $tickerScore,
                'relevance' => $relevance,
                'catalyst' => $catalystType,
            ];

            $tickerSentiments[] = $tickerScore * $relevance;
            $overallSentiments[] = $overallScore;
        }

        $articleCount = count($articles);
        $avgScore = 0.0;
        if ($articleCount > 0) {
            $avgScore = round(array_sum($tickerSentiments) / max(1, count($tickerSentiments)), 4);
        }

        $sentimentLabel = $this->scoreToLabel($avgScore);
        $primaryCatalyst = ! empty($catalystsFound) ? $catalystsFound[0] : 'general';
        $hasCatalyst = $primaryCatalyst !== 'general' || abs($avgScore) >= $this->minSentimentThreshold;

        // Calculate catalyst momentum ranking boost (0 to 20 points)
        // High news volume + strong directional sentiment = high probability of options strike breach
        $intensityBoost = min(12.0, abs($avgScore) * 20.0);
        $volumeBoost    = min(8.0, $articleCount * 0.8);
        $catalystBonus  = $primaryCatalyst !== 'general' ? 5.0 : 0.0;
        $totalBoost     = round($intensityBoost + $volumeBoost + $catalystBonus, 1);

        $topHeadline = ! empty($articles[0]['title']) ? $articles[0]['title'] : '';

        return [
            'ticker' => $ticker,
            'available' => true,
            'article_count' => $articleCount,
            'sentiment_score' => $avgScore,
            'sentiment_label' => $sentimentLabel,
            'catalyst_detected' => $hasCatalyst,
            'catalyst_type' => $primaryCatalyst,
            'catalyst_momentum_boost' => $totalBoost,
            'top_headline' => $topHeadline,
            'headlines' => $articles,
            'cached' => false,
        ];
    }

    /**
     * Detect specific momentum catalyst category from news text.
     */
    protected function detectCatalystType(string $text): string
    {
        $text = strtolower($text);

        if (preg_match('/\b(earnings|revenue|eps|quarterly results|guidance|q[1-4] results)\b/', $text)) {
            return 'earnings_report';
        }
        if (preg_match('/\b(merger|acquisition|buyout|takeover|partnership|deal|contract)\b/', $text)) {
            return 'deal_ma';
        }
        if (preg_match('/\b(fda approval|patent|upgrade|downgrade|price target|analyst)\b/', $text)) {
            return 'analyst_product';
        }
        if (preg_match('/\b(fed|rate cut|rate hike|inflation|cpi|tariff|antitrust|investigation)\b/', $text)) {
            return 'macro_regulatory';
        }

        return 'general';
    }

    /**
     * Map numeric score to sentiment label.
     */
    protected function scoreToLabel(float $score): string
    {
        if ($score >= 0.35) {
            return 'Bullish';
        }
        if ($score >= 0.15) {
            return 'Somewhat-Bullish';
        }
        if ($score <= -0.35) {
            return 'Bearish';
        }
        if ($score <= -0.15) {
            return 'Somewhat-Bearish';
        }

        return 'Neutral';
    }

    /**
     * Execute HTTP GET request using CI4 curlrequest or injected client.
     */
    protected function executeHttpRequest(string $url): ?array
    {
        if ($this->httpClient !== null && method_exists($this->httpClient, 'get')) {
            try {
                $res = $this->httpClient->get($url);
                $body = is_string($res) ? $res : (method_exists($res, 'getBody') ? (string) $res->getBody() : '');
                return json_decode($body, true);
            } catch (Throwable) {
                return null;
            }
        }

        try {
            $client = Services::curlrequest([
                'timeout' => 8,
                'http_errors' => false,
            ]);
            $response = $client->get($url);
            $statusCode = $response->getStatusCode();

            if ($statusCode !== 200) {
                return null;
            }

            return json_decode($response->getBody(), true);
        } catch (Throwable) {
            return null;
        }
    }

    /**
     * Neutral fallback response when API is not available.
     */
    protected function buildFallbackResponse(string $ticker, string $reason): array
    {
        return [
            'ticker' => $ticker,
            'available' => false,
            'article_count' => 0,
            'sentiment_score' => 0.0,
            'sentiment_label' => 'Neutral',
            'catalyst_detected' => false,
            'catalyst_type' => 'none',
            'catalyst_momentum_boost' => 0.0,
            'top_headline' => 'No AlphaVantage data (' . $reason . ')',
            'headlines' => [],
            'cached' => false,
        ];
    }
}
