<?php

declare(strict_types=1);

namespace App\Services\Research;

use Config\Database;
use Config\Research;
use Config\Services;

class InstitutionalResearchService
{
    protected $db;
    protected Research $config;
    protected $http;

    public function __construct()
    {
        $this->db = Database::connect();
        $this->config = config('Research');
        $this->http = Services::curlrequest([
            'timeout' => $this->config->httpTimeout,
            'headers' => [
                'User-Agent' => $this->config->secUserAgent,
                'Accept'     => 'application/json, text/xml, application/xml;q=0.9, text/html;q=0.8',
            ],
        ]);
    }

    public function runTask(string $task): array
    {
        $startedAt = date('Y-m-d H:i:s');
        $runId = $this->startRun($task, $startedAt);

        try {
            $result = match ($task) {
                'earnings_calendar'  => $this->collectEarningsCalendar(),
                'short_interest_scan'=> $this->scanShortInterest(),
                'insider_trades'     => $this->scanInsiderTrades(),
                'macro_economic'     => $this->collectMacroEconomic(),
                'sector_rotation'    => $this->scanSectorRotation(),
                'sentiment_analyze'  => $this->analyzeSentiment(),
                'momentum_scan'      => $this->scanMomentum(),
                'liquidity_scan'     => $this->scanLiquidity(),
                'volatility_scan'    => $this->scanVolatility(),
                'options_flow'       => $this->scanOptionsFlow(),
                'etf_flows'          => $this->scanEtfFlows(),
                'fed_monitor'        => $this->monitorFed(),
                'commodities_monitor'=> $this->monitorCommodities(),
                'crypto_market'      => $this->monitorCryptoMarket(),
                'news_sentiment'     => $this->scoreNewsSentiment(),
                'news_rank'          => $this->rankNews(),
                'alerts_rank'        => $this->rankAlerts(),
                'research_publish'   => $this->publishResearch(),
                'knowledge_update'   => $this->buildFinancialKnowledgeGraph(),
                'pipeline_institutional' => $this->runInstitutionalPipeline(),
                default => throw new \RuntimeException('Unknown research task: ' . $task),
            };

            $this->finishRun($runId, 'success', 'Completed', $result);
            return [
                'status' => 'success',
                'task'   => $task,
                'result' => $result,
            ];
        } catch (\Throwable $e) {
            log_message('error', 'Research task failed: {task} => {message}', [
                'task'    => $task,
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);

            $this->finishRun($runId, 'failed', $e->getMessage(), []);
            return [
                'status'  => 'failed',
                'task'    => $task,
                'message' => $e->getMessage(),
            ];
        }
    }

    protected function startRun(string $task, string $startedAt): int
    {
        $this->db->table('bf_research_runs')->insert([
            'task_name'   => $task,
            'status'      => 'running',
            'started_at'  => $startedAt,
            'payload_json'=> null,
        ]);

        return (int) $this->db->insertID();
    }

    protected function finishRun(int $runId, string $status, string $message, array $payload): void
    {
        $this->db->table('bf_research_runs')
            ->where('id', $runId)
            ->update([
                'status'       => $status,
                'message'      => $message,
                'payload_json' => json_encode($payload),
                'finished_at'  => date('Y-m-d H:i:s'),
            ]);
    }

    protected function requestJson(string $url, array $options = []): array
    {
        $response = $this->http->get($url, $options);
        $json = json_decode((string) $response->getBody(), true);

        return is_array($json) ? $json : [];
    }

    protected function scoreTitleSentiment(string $title): float
    {
        $title = strtolower($title);
        $score = 0.0;

        foreach ($this->config->sentimentPositive as $word) {
            if (str_contains($title, strtolower($word))) {
                $score += 1;
            }
        }

        foreach ($this->config->sentimentNegative as $word) {
            if (str_contains($title, strtolower($word))) {
                $score -= 1;
            }
        }

        return $score;
    }

    protected function insertResearchItem(array $data): void
    {
        $builder = $this->db->table('bf_research_items');

        if (!empty($data['url'])) {
            $exists = $builder->where('item_type', $data['item_type'])
                ->where('url', $data['url'])
                ->countAllResults();

            if ($exists > 0) {
                return;
            }
        }

        $builder->insert([
            'item_type'    => $data['item_type'],
            'category'     => $data['category'] ?? null,
            'symbol'       => $data['symbol'] ?? null,
            'source'       => $data['source'],
            'title'        => $data['title'] ?? null,
            'url'          => $data['url'] ?? null,
            'summary'      => $data['summary'] ?? null,
            'score'        => $data['score'] ?? 0,
            'payload_json' => isset($data['payload_json']) ? json_encode($data['payload_json']) : null,
            'published_at' => $data['published_at'] ?? null,
            'created_at'   => date('Y-m-d H:i:s'),
            'updated_at'   => null,
        ]);
    }

    protected function insertMetric(array $data): void
    {
        $exists = $this->db->table('bf_research_metrics')
            ->where('metric_type', $data['metric_type'])
            ->where('metric_key', $data['metric_key'])
            ->where('symbol', $data['symbol'] ?? null)
            ->where('metric_at', $data['metric_at'])
            ->countAllResults();

        if ($exists > 0) {
            return;
        }

        $this->db->table('bf_research_metrics')->insert([
            'metric_type'  => $data['metric_type'],
            'metric_key'   => $data['metric_key'],
            'symbol'       => $data['symbol'] ?? null,
            'source'       => $data['source'],
            'metric_value' => $data['metric_value'] ?? null,
            'payload_json' => isset($data['payload_json']) ? json_encode($data['payload_json']) : null,
            'metric_at'    => $data['metric_at'],
            'created_at'   => date('Y-m-d H:i:s'),
        ]);
    }

    protected function discoverCategoryLinks(string $category): array
    {
        $results = [];

        if (!empty($this->config->googleApiKey) && !empty($this->config->googleCx)) {
            $queries = $this->config->googleCategories[$category] ?? [];

            foreach ($queries as $query) {
                $url = 'https://customsearch.googleapis.com/customsearch/v1?key='
                    . urlencode($this->config->googleApiKey)
                    . '&cx=' . urlencode($this->config->googleCx)
                    . '&q=' . urlencode($query)
                    . '&num=10';

                $json = $this->requestJson($url);
                foreach (($json['items'] ?? []) as $item) {
                    $results[] = [
                        'query'   => $query,
                        'title'   => $item['title'] ?? null,
                        'url'     => $item['link'] ?? null,
                        'summary' => $item['snippet'] ?? null,
                    ];
                }
            }
        } else {
            foreach (($this->config->fallbackDiscoveryLinks[$category] ?? []) as $url) {
                $results[] = [
                    'query'   => $category,
                    'title'   => ucfirst(str_replace('_', ' ', $category)) . ' source link',
                    'url'     => $url,
                    'summary' => 'Fallback source link for category discovery.',
                ];
            }
        }

        foreach ($results as $item) {
            $this->insertResearchItem([
                'item_type'    => 'link',
                'category'     => $category,
                'source'       => 'discovery',
                'title'        => $item['title'],
                'url'          => $item['url'],
                'summary'      => $item['summary'],
                'score'        => $this->scoreTitleSentiment((string) ($item['title'] ?? '')),
                'payload_json' => $item,
            ]);
        }

        return $results;
    }

    protected function collectEarningsCalendar(): array
    {
        return $this->discoverCategoryLinks('earnings');
    }

    protected function scanShortInterest(): array
    {
        $links = $this->discoverCategoryLinks('short_interest');

        $rows = $this->db->table('bf_investment_trade_alerts')
            ->select('symbol, COUNT(*) AS alert_count, MAX(created_at) AS last_seen')
            ->groupBy('symbol')
            ->orderBy('alert_count', 'DESC')
            ->limit(50)
            ->get()
            ->getResultArray();

        foreach ($rows as $row) {
            $score = (float) $row['alert_count'];
            $this->insertResearchItem([
                'item_type'    => 'signal',
                'category'     => 'short_interest',
                'symbol'       => $row['symbol'],
                'source'       => 'internal_alerts',
                'title'        => $row['symbol'] . ' short-interest watch candidate',
                'summary'      => 'Internal alert density score: ' . $score,
                'score'        => $score,
                'payload_json' => $row,
            ]);
        }

        return [
            'links' => count($links),
            'signals' => count($rows),
        ];
    }

    protected function scanInsiderTrades(): array
    {
        $links = $this->discoverCategoryLinks('insider_trades');

        $watchSymbols = $this->db->table('bf_investment_trade_alerts')
            ->select('symbol')
            ->distinct()
            ->limit(25)
            ->get()
            ->getResultArray();

        foreach ($watchSymbols as $row) {
            $symbol = trim((string) ($row['symbol'] ?? ''));
            if ($symbol === '') {
                continue;
            }

            $this->insertResearchItem([
                'item_type' => 'link',
                'category'  => 'insider_trades',
                'symbol'    => $symbol,
                'source'    => 'sec_search',
                'title'     => $symbol . ' Form 4 / insider trading lookup',
                'url'       => 'https://www.sec.gov/search-filings',
                'summary'   => 'Manual / downstream SEC lookup entry for ' . $symbol,
                'score'     => 0,
            ]);
        }

        return [
            'links' => count($links),
            'symbols_indexed' => count($watchSymbols),
        ];
    }

    protected function collectMacroEconomic(): array
    {
        $results = [];

        if (empty($this->config->fredApiKey)) {
            return [
                'warning' => 'FRED API key not configured',
                'stored'  => 0,
            ];
        }

        foreach ($this->config->fredSeries as $seriesId => $label) {
            $url = 'https://api.stlouisfed.org/fred/series/observations?series_id='
                . urlencode($seriesId)
                . '&api_key=' . urlencode($this->config->fredApiKey)
                . '&file_type=json&sort_order=desc&limit=5';

            $json = $this->requestJson($url);

            foreach (($json['observations'] ?? []) as $obs) {
                $value = is_numeric($obs['value'] ?? null) ? (float) $obs['value'] : null;

                $this->insertMetric([
                    'metric_type'  => 'macro',
                    'metric_key'   => $seriesId,
                    'symbol'       => null,
                    'source'       => 'fred',
                    'metric_value' => $value,
                    'payload_json' => $obs,
                    'metric_at'    => (($obs['date'] ?? date('Y-m-d')) . ' 00:00:00'),
                ]);

                $results[] = [
                    'series' => $seriesId,
                    'label'  => $label,
                    'date'   => $obs['date'] ?? null,
                    'value'  => $value,
                ];
            }
        }

        $this->discoverCategoryLinks('macro');

        return [
            'stored' => count($results),
            'series' => array_keys($this->config->fredSeries),
        ];
    }

    protected function scanSectorRotation(): array
    {
        $ranked = [];

        foreach ($this->config->sectorEtfs as $symbol) {
            $recent = $this->db->table('bf_market_snapshots')
                ->where('symbol', $symbol)
                ->orderBy('created_at', 'DESC')
                ->limit(2)
                ->get()
                ->getResultArray();

            $score = 0.0;
            if (count($recent) >= 2) {
                $latest = (float) ($recent[0]['price'] ?? 0);
                $prior  = (float) ($recent[1]['price'] ?? 0);
                if ($prior > 0) {
                    $score = (($latest - $prior) / $prior) * 100;
                }
            }

            $ranked[] = [
                'symbol' => $symbol,
                'score'  => $score,
            ];

            $this->insertResearchItem([
                'item_type' => 'signal',
                'category'  => 'sector_rotation',
                'symbol'    => $symbol,
                'source'    => 'market_snapshots',
                'title'     => $symbol . ' sector rotation score',
                'summary'   => 'Percent change score',
                'score'     => $score,
                'payload_json' => ['symbol' => $symbol, 'score' => $score],
            ]);
        }

        usort($ranked, fn ($a, $b) => $b['score'] <=> $a['score']);

        return $ranked;
    }

    protected function analyzeSentiment(): array
    {
        $items = $this->db->table('bf_financial_news')
            ->orderBy('created_at', 'DESC')
            ->limit(200)
            ->get()
            ->getResultArray();

        $updated = 0;

        foreach ($items as $item) {
            $score = $this->scoreTitleSentiment((string) ($item['title'] ?? ''));

            $this->insertResearchItem([
                'item_type' => 'sentiment',
                'category'  => 'news_sentiment',
                'source'    => 'title_lexicon',
                'title'     => $item['title'] ?? null,
                'url'       => $item['url'] ?? null,
                'summary'   => 'Lexicon score for news title',
                'score'     => $score,
                'payload_json' => $item,
            ]);

            $updated++;
        }

        return ['items_scored' => $updated];
    }

    protected function scanMomentum(): array
    {
        $rows = $this->db->table('bf_market_snapshots')
            ->select('symbol, price, created_at')
            ->orderBy('created_at', 'DESC')
            ->get()
            ->getResultArray();

        $grouped = [];
        foreach ($rows as $row) {
            $grouped[$row['symbol']][] = $row;
        }

        $signals = [];
        foreach ($grouped as $symbol => $series) {
            if (count($series) < 3) {
                continue;
            }

            $p1 = (float) ($series[0]['price'] ?? 0);
            $p3 = (float) ($series[2]['price'] ?? 0);
            $score = $p3 > 0 ? (($p1 - $p3) / $p3) * 100 : 0;

            $signals[] = ['symbol' => $symbol, 'score' => $score];

            $this->insertResearchItem([
                'item_type' => 'signal',
                'category'  => 'momentum',
                'symbol'    => $symbol,
                'source'    => 'market_snapshots',
                'title'     => $symbol . ' momentum score',
                'summary'   => '3-point price change momentum',
                'score'     => $score,
                'payload_json' => ['symbol' => $symbol, 'score' => $score],
            ]);
        }

        usort($signals, fn ($a, $b) => $b['score'] <=> $a['score']);

        return array_slice($signals, 0, 25);
    }

    protected function scanLiquidity(): array
    {
        $alerts = $this->db->table('bf_investment_trade_alerts')
            ->select('symbol, COUNT(*) AS alert_count')
            ->groupBy('symbol')
            ->orderBy('alert_count', 'DESC')
            ->limit(50)
            ->get()
            ->getResultArray();

        foreach ($alerts as $row) {
            $score = (float) $row['alert_count'];

            $this->insertResearchItem([
                'item_type' => 'signal',
                'category'  => 'liquidity',
                'symbol'    => $row['symbol'],
                'source'    => 'alert_frequency',
                'title'     => $row['symbol'] . ' liquidity proxy score',
                'summary'   => 'Alert-frequency proxy score',
                'score'     => $score,
                'payload_json' => $row,
            ]);
        }

        return $alerts;
    }

    protected function scanVolatility(): array
    {
        $rows = $this->db->table('bf_market_snapshots')
            ->select('symbol, price')
            ->orderBy('created_at', 'DESC')
            ->get()
            ->getResultArray();

        $grouped = [];
        foreach ($rows as $row) {
            $grouped[$row['symbol']][] = (float) ($row['price'] ?? 0);
        }

        $out = [];
        foreach ($grouped as $symbol => $values) {
            if (count($values) < 5) {
                continue;
            }

            $values = array_slice($values, 0, 10);
            $avg = array_sum($values) / count($values);
            $variance = 0.0;

            foreach ($values as $value) {
                $variance += pow($value - $avg, 2);
            }

            $stdev = sqrt($variance / count($values));

            $out[] = ['symbol' => $symbol, 'score' => $stdev];

            $this->insertResearchItem([
                'item_type' => 'signal',
                'category'  => 'volatility',
                'symbol'    => $symbol,
                'source'    => 'market_snapshots',
                'title'     => $symbol . ' volatility score',
                'summary'   => 'Standard deviation of recent snapshot prices',
                'score'     => $stdev,
                'payload_json' => ['symbol' => $symbol, 'stdev' => $stdev],
            ]);
        }

        usort($out, fn ($a, $b) => $b['score'] <=> $a['score']);

        return array_slice($out, 0, 25);
    }

    protected function scanOptionsFlow(): array
    {
        $links = $this->discoverCategoryLinks('market_news');

        $this->insertResearchItem([
            'item_type' => 'note',
            'category'  => 'options_flow',
            'source'    => 'system',
            'title'     => 'Options flow placeholder',
            'summary'   => 'Free/public data path defaults to discovery links and internal scoring until a dedicated options dataset is integrated.',
            'score'     => 0,
        ]);

        return [
            'links' => count($links),
            'status' => 'link-discovery mode',
        ];
    }

    protected function scanEtfFlows(): array
    {
        $links = $this->discoverCategoryLinks('etf_flows');
        $sector = $this->scanSectorRotation();

        return [
            'links' => count($links),
            'rotation' => array_slice($sector, 0, 10),
        ];
    }

    protected function monitorFed(): array
    {
        $macro = $this->collectMacroEconomic();
        $links = $this->discoverCategoryLinks('macro');

        return [
            'macro' => $macro,
            'links' => count($links),
        ];
    }

    protected function monitorCommodities(): array
    {
        $links = $this->discoverCategoryLinks('commodities');

        foreach (['GLD', 'SLV', 'USO'] as $symbol) {
            $recent = $this->db->table('bf_market_snapshots')
                ->where('symbol', $symbol)
                ->orderBy('created_at', 'DESC')
                ->limit(1)
                ->get()
                ->getRowArray();

            $this->insertResearchItem([
                'item_type' => 'signal',
                'category'  => 'commodities',
                'symbol'    => $symbol,
                'source'    => 'market_snapshots',
                'title'     => $symbol . ' commodity proxy snapshot',
                'summary'   => 'Latest tracked commodity ETF proxy',
                'score'     => (float) ($recent['price'] ?? 0),
                'payload_json' => $recent ?? [],
            ]);
        }

        return ['links' => count($links)];
    }

    protected function monitorCryptoMarket(): array
    {
        $stored = 0;

        $ids = implode(',', $this->config->cryptoIds);
        $url = 'https://api.coingecko.com/api/v3/simple/price?ids='
            . urlencode($ids)
            . '&vs_currencies=usd&include_24hr_change=true';

        $json = $this->requestJson($url);

        foreach ($this->config->cryptoIds as $id) {
            if (!isset($json[$id])) {
                continue;
            }

            $price = (float) ($json[$id]['usd'] ?? 0);
            $change = (float) ($json[$id]['usd_24h_change'] ?? 0);

            $this->insertMetric([
                'metric_type'  => 'crypto',
                'metric_key'   => $id,
                'symbol'       => strtoupper($id),
                'source'       => 'coingecko',
                'metric_value' => $price,
                'payload_json' => $json[$id],
                'metric_at'    => date('Y-m-d H:i:s'),
            ]);

            $this->insertResearchItem([
                'item_type' => 'signal',
                'category'  => 'crypto',
                'symbol'    => strtoupper($id),
                'source'    => 'coingecko',
                'title'     => strtoupper($id) . ' crypto market score',
                'summary'   => 'Price with 24h change',
                'score'     => $change,
                'payload_json' => $json[$id],
            ]);

            $stored++;
        }

        $this->discoverCategoryLinks('crypto');

        return ['stored' => $stored];
    }

    protected function scoreNewsSentiment(): array
    {
        return $this->analyzeSentiment();
    }

    protected function rankNews(): array
    {
        $news = $this->db->table('bf_financial_news')
            ->orderBy('created_at', 'DESC')
            ->limit(200)
            ->get()
            ->getResultArray();

        $ranked = [];
        foreach ($news as $item) {
            $sentiment = $this->scoreTitleSentiment((string) ($item['title'] ?? ''));
            $ageHours = max(1, (time() - strtotime((string) ($item['created_at'] ?? date('Y-m-d H:i:s')))) / 3600);
            $score = ($sentiment * 10) + (24 / $ageHours);

            $ranked[] = [
                'title' => $item['title'] ?? '',
                'url'   => $item['url'] ?? '',
                'score' => round($score, 4),
            ];

            $this->insertResearchItem([
                'item_type' => 'ranking',
                'category'  => 'news_rank',
                'source'    => 'news_ranker',
                'title'     => $item['title'] ?? null,
                'url'       => $item['url'] ?? null,
                'summary'   => 'Recency + sentiment rank',
                'score'     => $score,
                'payload_json' => $item,
            ]);
        }

        usort($ranked, fn ($a, $b) => $b['score'] <=> $a['score']);

        return array_slice($ranked, 0, 25);
    }

    protected function rankAlerts(): array
    {
        $rows = $this->db->table('bf_investment_trade_alerts')
            ->select('symbol, COUNT(*) AS occurrences, MAX(created_at) AS last_seen')
            ->groupBy('symbol')
            ->orderBy('occurrences', 'DESC')
            ->limit(100)
            ->get()
            ->getResultArray();

        $ranked = [];
        foreach ($rows as $row) {
            $ageHours = max(1, (time() - strtotime((string) ($row['last_seen'] ?? date('Y-m-d H:i:s')))) / 3600);
            $score = ((float) $row['occurrences'] * 5) + (24 / $ageHours);

            $ranked[] = [
                'symbol' => $row['symbol'],
                'score'  => round($score, 4),
            ];

            $this->insertResearchItem([
                'item_type' => 'ranking',
                'category'  => 'alerts_rank',
                'symbol'    => $row['symbol'],
                'source'    => 'alert_ranker',
                'title'     => $row['symbol'] . ' alert rank',
                'summary'   => 'Occurrence + recency rank',
                'score'     => $score,
                'payload_json' => $row,
            ]);
        }

        usort($ranked, fn ($a, $b) => $b['score'] <=> $a['score']);

        return array_slice($ranked, 0, 25);
    }

    protected function publishResearch(): array
    {
        $topNews = $this->rankNews();
        $topAlerts = $this->rankAlerts();
        $momentum = $this->scanMomentum();

        if (!is_dir($this->config->reportsPath)) {
            mkdir($this->config->reportsPath, 0755, true);
        }

        $dailyFile = $this->config->reportsPath . 'institutional_daily_brief.md';
        $weeklyFile = $this->config->reportsPath . 'institutional_weekly_brief.md';

        $daily = "# Institutional Daily Brief\n\n";
        $daily .= "Generated: " . date('Y-m-d H:i:s') . "\n\n";
        $daily .= "## Top Ranked News\n\n";
        foreach (array_slice($topNews, 0, 10) as $item) {
            $daily .= "- [{$item['title']}]({$item['url']}) — Score: {$item['score']}\n";
        }
        $daily .= "\n## Top Ranked Alerts\n\n";
        foreach (array_slice($topAlerts, 0, 10) as $item) {
            $daily .= "- {$item['symbol']} — Score: {$item['score']}\n";
        }
        $daily .= "\n## Momentum Leaders\n\n";
        foreach (array_slice($momentum, 0, 10) as $item) {
            $daily .= "- {$item['symbol']} — Momentum: {$item['score']}\n";
        }

        $weekly = "# Institutional Weekly Brief\n\n";
        $weekly .= "Generated: " . date('Y-m-d H:i:s') . "\n\n";
        $weekly .= "## Highlights\n\n";
        $weekly .= "- Research items stored this week: " . $this->db->table('bf_research_items')
            ->where('created_at >=', date('Y-m-d', strtotime('-7 days')))
            ->countAllResults() . "\n";
        $weekly .= "- Metrics stored this week: " . $this->db->table('bf_research_metrics')
            ->where('created_at >=', date('Y-m-d', strtotime('-7 days')))
            ->countAllResults() . "\n";

        file_put_contents($dailyFile, $daily);
        file_put_contents($weeklyFile, $weekly);

        return [
            'daily_file' => str_replace(ROOTPATH, '', $dailyFile),
            'weekly_file' => str_replace(ROOTPATH, '', $weeklyFile),
        ];
    }

    protected function buildFinancialKnowledgeGraph(): array
    {
        $tickers = $this->db->table('bf_investment_trade_alerts')
            ->select('symbol')
            ->distinct()
            ->get()
            ->getResultArray();

        $graph = [];

        foreach ($tickers as $ticker) {
            $symbol = (string) ($ticker['symbol'] ?? '');
            if ($symbol === '') {
                continue;
            }

            $news = $this->db->table('bf_financial_news')
                ->groupStart()
                    ->like('title', $symbol)
                    ->orLike('description', $symbol)
                ->groupEnd()
                ->orderBy('created_at', 'DESC')
                ->limit(10)
                ->get()
                ->getResultArray();

            $alerts = $this->db->table('bf_investment_trade_alerts')
                ->where('symbol', $symbol)
                ->orderBy('created_at', 'DESC')
                ->limit(25)
                ->get()
                ->getResultArray();

            $priceData = $this->db->table('bf_market_snapshots')
                ->where('symbol', $symbol)
                ->orderBy('created_at', 'DESC')
                ->limit(25)
                ->get()
                ->getResultArray();

            $researchScores = $this->db->table('bf_research_items')
                ->where('symbol', $symbol)
                ->orderBy('created_at', 'DESC')
                ->limit(25)
                ->get()
                ->getResultArray();

            $graph[$symbol] = [
                'ticker' => $symbol,
                'news' => $news,
                'alerts' => $alerts,
                'economic_indicators' => $this->db->table('bf_research_metrics')
                    ->where('metric_type', 'macro')
                    ->orderBy('metric_at', 'DESC')
                    ->limit(10)
                    ->get()
                    ->getResultArray(),
                'price_data' => $priceData,
                'sentiment' => array_values(array_filter(array_map(function ($row) {
                    return [
                        'title' => $row['title'] ?? null,
                        'score' => $row['score'] ?? 0,
                        'category' => $row['category'] ?? null,
                    ];
                }, $researchScores))),
            ];
        }

        file_put_contents(
            $this->config->knowledgeGraphPath,
            json_encode($graph, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );

        return [
            'file' => str_replace(ROOTPATH, '', $this->config->knowledgeGraphPath),
            'tickers' => count($graph),
        ];
    }

    protected function runInstitutionalPipeline(): array
    {
        $tasks = [
            'earnings_calendar',
            'short_interest_scan',
            'insider_trades',
            'macro_economic',
            'sector_rotation',
            'sentiment_analyze',
            'momentum_scan',
            'liquidity_scan',
            'volatility_scan',
            'options_flow',
            'etf_flows',
            'fed_monitor',
            'commodities_monitor',
            'crypto_market',
            'news_sentiment',
            'news_rank',
            'alerts_rank',
            'research_publish',
            'knowledge_update',
        ];

        $results = [];
        foreach ($tasks as $task) {
            $results[$task] = $this->runTask($task);
        }

        return $results;
    }
}