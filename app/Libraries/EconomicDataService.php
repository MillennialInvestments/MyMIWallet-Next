<?php

namespace App\Libraries;

use App\Models\EconomicDataPointModel;
use App\Models\EconomicIndicatorModel;
use CodeIgniter\HTTP\CURLRequest;
use Config\APISettings;

class EconomicDataService
{
    private const FRED_BASE = 'https://api.stlouisfed.org/fred/series/observations';

    private EconomicIndicatorModel $indicatorModel;
    private EconomicDataPointModel $dataPointModel;
    private CURLRequest $http;
    private string $fredApiKey;
    private string $alphaVantageApiKey;

    /** @var array<string,array<string,string>> */
    private array $catalog = [
        'GDP' => ['name' => 'GDP', 'frequency' => 'quarterly', 'unit' => 'billions_usd'],
        'GDPC1' => ['name' => 'Real GDP', 'frequency' => 'quarterly', 'unit' => 'billions_2017_usd'],
        'CPIAUCSL' => ['name' => 'CPI', 'frequency' => 'monthly', 'unit' => 'index'],
        'CPILFESL' => ['name' => 'Core CPI', 'frequency' => 'monthly', 'unit' => 'index'],
        'UNRATE' => ['name' => 'Unemployment Rate', 'frequency' => 'monthly', 'unit' => 'percent'],
        'FEDFUNDS' => ['name' => 'Fed Funds Rate', 'frequency' => 'monthly', 'unit' => 'percent'],
        'DGS10' => ['name' => '10Y Treasury', 'frequency' => 'daily', 'unit' => 'percent'],
        'DGS2' => ['name' => '2Y Treasury', 'frequency' => 'daily', 'unit' => 'percent'],
        'M2SL' => ['name' => 'M2 Money Supply', 'frequency' => 'monthly', 'unit' => 'billions_usd'],
        'INDPRO' => ['name' => 'Industrial Production', 'frequency' => 'monthly', 'unit' => 'index'],
        'UMCSENT' => ['name' => 'Consumer Sentiment', 'frequency' => 'monthly', 'unit' => 'index'],
        'HOUST' => ['name' => 'Housing Starts', 'frequency' => 'monthly', 'unit' => 'thousands'],
        'PAYEMS' => ['name' => 'Nonfarm Payrolls', 'frequency' => 'monthly', 'unit' => 'thousands'],
    ];

    private array $cacheTtlBySeries = [
        'GDP' => 86400,
        'GDPC1' => 86400,
        'CPIAUCSL' => 43200,
        'CPILFESL' => 43200,
        'UNRATE' => 43200,
        'FEDFUNDS' => 3600,
        'DGS10' => 3600,
        'DGS2' => 3600,
    ];

    public function __construct()
    {
        $this->indicatorModel = new EconomicIndicatorModel();
        $this->dataPointModel = new EconomicDataPointModel();
        $this->http = service('curlrequest');
        $cfg = config(APISettings::class);
        $this->fredApiKey = getenv('FRED_API_KEY') ?: ($cfg->fredApiKey ?? '');
        $this->alphaVantageApiKey = getenv('ALPHAVANTAGE_API_KEY') ?: ($cfg->alphaVantageApiKey ?? '');
    }

    public function fetchFredSeries(string $seriesId): array
    {
        $cache = cache();
        $cacheKey = 'econ:fred:' . $seriesId;
        $ttl = $this->cacheTtlBySeries[$seriesId] ?? 3600;

        $cached = $cache->get($cacheKey);
        if (is_array($cached) && $cached !== []) {
            return $cached;
        }

        if ($this->fredApiKey === '') {
            log_message('warning', 'EconomicDataService: FRED_API_KEY missing.');
            return [];
        }

        try {
            $response = $this->http->get(self::FRED_BASE, [
                'query' => [
                    'series_id' => $seriesId,
                    'api_key' => $this->fredApiKey,
                    'file_type' => 'json',
                    'sort_order' => 'asc',
                ],
            ]);
            $data = json_decode((string) $response->getBody(), true);
            if (! is_array($data) || ! isset($data['observations']) || ! is_array($data['observations'])) {
                log_message('error', 'EconomicDataService: invalid FRED response for {series}', ['series' => $seriesId]);
                return [];
            }

            $cache->save($cacheKey, $data, $ttl);

            return $data;
        } catch (\Throwable $e) {
            log_message('error', 'EconomicDataService FRED error: {message}', ['message' => $e->getMessage()]);
            return [];
        }
    }

    public function updateAllIndicators(): array
    {
        $summary = ['updated' => 0, 'errors' => []];

        foreach ($this->catalog as $seriesId => $meta) {
            $payload = $this->fetchFredSeries($seriesId);
            if ($payload === []) {
                $summary['errors'][] = $seriesId;
                continue;
            }

            $indicatorId = $this->upsertIndicator($seriesId, $meta);
            $this->storeObservations($indicatorId, $payload['observations']);
            $summary['updated']++;
        }

        return $summary;
    }

    public function latestSnapshot(): array
    {
        $indicators = $this->indicatorModel->findAll();
        $latest = [];

        foreach ($indicators as $indicator) {
            $point = $this->dataPointModel
                ->where('indicator_id', (int) $indicator['id'])
                ->orderBy('date', 'DESC')
                ->first();
            if ($point) {
                $latest[$indicator['series_id']] = [
                    'name' => $indicator['name'],
                    'value' => (float) $point['value'],
                    'date' => $point['date'],
                ];
            }
        }

        $dgs10 = $latest['DGS10']['value'] ?? null;
        $dgs2 = $latest['DGS2']['value'] ?? null;
        $yieldSpread = is_numeric($dgs10) && is_numeric($dgs2) ? (float) $dgs10 - (float) $dgs2 : null;

        $scoreInputs = [
            'unemployment' => $latest['UNRATE']['value'] ?? null,
            'inflation' => $this->latestInflationYoY(),
            'yield_spread' => $yieldSpread,
            'gdp_growth' => $this->latestGdpGrowth(),
        ];

        return [
            'indicators' => $latest,
            'yield_spread' => $yieldSpread,
            'economic_score' => $this->calculateEconomicScore($scoreInputs),
            'state' => $this->scoreState($this->calculateEconomicScore($scoreInputs)),
        ];
    }

    public function unemploymentSeries(int $limit = 48): array
    {
        $indicator = $this->indicatorModel->where('series_id', 'UNRATE')->first();
        if (! $indicator) {
            return [];
        }

        return $this->dataPointModel
            ->where('indicator_id', (int) $indicator['id'])
            ->orderBy('date', 'DESC')
            ->findAll($limit);
    }

    public function calculateEconomicScore(array $data): int
    {
        $score = 0;

        if (isset($data['unemployment']) && is_numeric($data['unemployment']) && (float) $data['unemployment'] < 5.0) {
            $score += 1;
        }
        if (isset($data['inflation']) && is_numeric($data['inflation']) && (float) $data['inflation'] < 3.0) {
            $score += 1;
        }
        if (isset($data['yield_spread']) && is_numeric($data['yield_spread']) && (float) $data['yield_spread'] > 0.0) {
            $score += 1;
        }
        if (isset($data['gdp_growth']) && is_numeric($data['gdp_growth']) && (float) $data['gdp_growth'] > 2.0) {
            $score += 1;
        }

        return $score;
    }

    private function scoreState(int $score): string
    {
        if ($score <= 1) {
            return 'Contraction';
        }
        if ($score === 2) {
            return 'Neutral';
        }

        return 'Expansion';
    }

    private function upsertIndicator(string $seriesId, array $meta): int
    {
        $existing = $this->indicatorModel->where('series_id', $seriesId)->where('source', 'fred')->first();
        $payload = [
            'name' => $meta['name'],
            'series_id' => $seriesId,
            'source' => 'fred',
            'frequency' => $meta['frequency'] ?? null,
            'unit' => $meta['unit'] ?? null,
            'last_updated' => date('Y-m-d H:i:s'),
        ];

        if ($existing) {
            $this->indicatorModel->update((int) $existing['id'], $payload);
            return (int) $existing['id'];
        }

        $payload['created_on'] = date('Y-m-d H:i:s');
        return (int) $this->indicatorModel->insert($payload, true);
    }

    private function storeObservations(int $indicatorId, array $observations): void
    {
        foreach ($observations as $obs) {
            if (! isset($obs['date'], $obs['value']) || $obs['value'] === '.' || ! is_numeric($obs['value'])) {
                continue;
            }

            $existing = $this->dataPointModel
                ->where('indicator_id', $indicatorId)
                ->where('date', $obs['date'])
                ->first();

            $payload = [
                'indicator_id' => $indicatorId,
                'date' => $obs['date'],
                'value' => (float) $obs['value'],
                'created_on' => date('Y-m-d H:i:s'),
            ];

            if ($existing) {
                $this->dataPointModel->update((int) $existing['id'], $payload);
                continue;
            }

            $this->dataPointModel->insert($payload);
        }
    }


    private function latestInflationYoY(): ?float
    {
        $indicator = $this->indicatorModel->where('series_id', 'CPIAUCSL')->first();
        if (! $indicator) {
            return null;
        }

        $points = $this->dataPointModel
            ->where('indicator_id', (int) $indicator['id'])
            ->orderBy('date', 'DESC')
            ->findAll(13);

        if (count($points) < 13) {
            return null;
        }

        $latest = (float) $points[0]['value'];
        $yearAgo = (float) $points[12]['value'];
        if ($yearAgo == 0.0) {
            return null;
        }

        return (($latest - $yearAgo) / $yearAgo) * 100;
    }
    private function latestGdpGrowth(): ?float
    {
        $indicator = $this->indicatorModel->where('series_id', 'GDP')->first();
        if (! $indicator) {
            return null;
        }

        $points = $this->dataPointModel
            ->where('indicator_id', (int) $indicator['id'])
            ->orderBy('date', 'DESC')
            ->findAll(2);

        if (count($points) < 2) {
            return null;
        }

        $latest = (float) $points[0]['value'];
        $prior = (float) $points[1]['value'];
        if ($prior == 0.0) {
            return null;
        }

        return (($latest - $prior) / $prior) * 100;
    }
}
