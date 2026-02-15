<?php

declare(strict_types=1);

namespace App\Libraries\ContentEngine;

use Config\ContentEngine as ContentEngineConfig;
use App\Models\ContentIdeaModel;
use App\Models\ContentScannerIngestModel;
use App\Models\ContentScannerRowModel;
use RuntimeException;

class ScannerScoringService
{
    protected ContentEngineConfig $config;
    protected ContentScannerRowModel $rowModel;
    protected ContentIdeaModel $ideaModel;
    protected ContentScannerIngestModel $ingestModel;

    public function __construct(?ContentEngineConfig $config = null)
    {
        $this->config = $config ?? config(ContentEngineConfig::class);
        $this->rowModel = model(ContentScannerRowModel::class);
        $this->ideaModel = model(ContentIdeaModel::class);
        $this->ingestModel = model(ContentScannerIngestModel::class);
    }

    /**
     * Score rows for an ingest and persist ideas.
     */
    public function scoreIngest(int $ingestId, bool $force = false): array
    {
        $ingest = $this->ingestModel->find($ingestId);
        if (! $ingest) {
            throw new RuntimeException('Ingest not found');
        }

        $previousIdeas = [];
        if (! $force && ($ingest['status'] ?? '') === 'processed') {
            $previousIdeas = $this->loadExistingIdeas($ingestId);
            if ($previousIdeas !== []) {
                return $previousIdeas;
            }
        }

        $rows = $this->rowModel->where('ingest_id', $ingestId)->findAll();
        $ideas = [];

        log_message('info', sprintf('ContentEngine scoring start ingest=%d rows=%d', $ingestId, count($rows)));

        foreach ($rows as $row) {
            $scores = $this->computeScores($row);
            $total = $scores['total'];
            $tier = $this->resolveTier($total, $row);
            $reasons = $scores['reasons'];
            $recommendations = $this->config->recommendedPlatforms[$tier] ?? [];

            $ideaId = $this->upsertIdea($ingestId, $row['symbol'], $total, $tier, $reasons, $recommendations);
            $ideas[] = [
                'id'          => $ideaId,
                'symbol'      => $row['symbol'],
                'score_total' => $total,
                'tier'        => $tier,
                'reasons'     => $reasons,
                'platforms'   => $recommendations,
            ];
        }

        $this->ingestModel->update($ingestId, ['status' => 'processed']);

        usort($ideas, static fn ($a, $b) => $b['score_total'] <=> $a['score_total']);

        log_message('info', sprintf('ContentEngine scoring done ingest=%d tier1=%d tier2=%d tier3=%d avoid=%d',
            $ingestId,
            count(array_filter($ideas, static fn ($i) => $i['tier'] === 'tier1')),
            count(array_filter($ideas, static fn ($i) => $i['tier'] === 'tier2')),
            count(array_filter($ideas, static fn ($i) => $i['tier'] === 'tier3')),
            count(array_filter($ideas, static fn ($i) => $i['tier'] === 'avoid'))
        ));

        return $ideas;
    }

    protected function computeScores(array $row): array
    {
        $weights = $this->config->scoring['weights'];
        $caps = $this->config->scoring['caps'];
        $penalties = $this->config->scoring['penalties'];

        $total = 0.0;

        $signals = [];

        $dollarScore = $this->scale($row['dollar_vol_m'] ?? 0, $caps['dollar_volume']) * ($weights['dollar_volume'] * 100);
        $total += $dollarScore;
        $signals[] = ['type' => 'signal', 'label' => 'Dollar volume', 'score' => round($dollarScore, 1), 'weight' => $weights['dollar_volume'] * 100];

        $capScore = $this->scale($row['market_cap_m'] ?? 0, $caps['market_cap']) * ($weights['market_cap'] * 100);
        $total += $capScore;
        $signals[] = ['type' => 'signal', 'label' => 'Market cap', 'score' => round($capScore, 1), 'weight' => $weights['market_cap'] * 100];

        $momentumScore = $this->scale($row['mark_pct_change'] ?? 0, $caps['mark_change']) * ($weights['mark_change'] * 100);
        $total += $momentumScore;
        $signals[] = ['type' => 'signal', 'label' => 'Day momentum', 'score' => round($momentumScore, 1), 'weight' => $weights['mark_change'] * 100];

        $abvScore = $this->scale($row['abvvol'] ?? 0, $caps['abvvol']) * ($weights['abvvol'] * 100);
        $total += $abvScore;
        $signals[] = ['type' => 'signal', 'label' => 'Above-average volume', 'score' => round($abvScore, 1), 'weight' => $weights['abvvol'] * 100];

        $fiveDayScore = $this->scale($row['pct_chng_5d'] ?? 0, $caps['five_day']) * ($weights['five_day'] * 100);
        $total += $fiveDayScore;
        $signals[] = ['type' => 'signal', 'label' => '5D change', 'score' => round($fiveDayScore, 1), 'weight' => $weights['five_day'] * 100];

        // Penalties
        if (! empty($row['market_cap_m']) && $row['market_cap_m'] < $penalties['microcap_threshold']) {
            $total += $penalties['microcap_hit'];
            $signals[] = ['type' => 'penalty', 'label' => 'Microcap', 'score' => $penalties['microcap_hit'], 'weight' => $penalties['microcap_threshold']];
        }

        if (! empty($row['mark_pct_change']) && $row['mark_pct_change'] > $penalties['extreme_move']) {
            $total += $penalties['extreme_hit'];
            $signals[] = ['type' => 'penalty', 'label' => 'Parabolic move', 'score' => $penalties['extreme_hit'], 'weight' => $penalties['extreme_move']];
        }

        usort($signals, static fn ($a, $b) => ($b['score'] ?? 0) <=> ($a['score'] ?? 0));
        $topSignals = array_slice(array_filter($signals, static fn ($s) => $s['type'] === 'signal'), 0, 3);
        $penaltySignals = array_values(array_filter($signals, static fn ($s) => $s['type'] === 'penalty'));

        $reasons = array_merge($topSignals, $penaltySignals);

        return [
            'total'   => round($total, 2),
            'reasons' => $reasons,
        ];
    }

    protected function resolveTier(float $score, array $row): string
    {
        $tiers = $this->config->scoring['tiers'];
        if ($score >= $tiers['tier1']) {
            return 'tier1';
        }
        if ($score >= $tiers['tier2']) {
            return 'tier2';
        }
        if ($score >= $tiers['tier3']) {
            return 'tier3';
        }
        return 'avoid';
    }

    protected function scale($value, float $cap): float
    {
        $numeric = is_numeric($value) ? (float) $value : 0.0;
        if ($cap <= 0) {
            return 0.0;
        }
        return min(max($numeric, 0.0), $cap) / $cap;
    }

    protected function upsertIdea(int $ingestId, string $symbol, float $score, string $tier, array $reasons, array $platforms): int
    {
        $existing = $this->ideaModel
            ->where('ingest_id', $ingestId)
            ->where('symbol', $symbol)
            ->first();

        $payload = [
            'ingest_id'                 => $ingestId,
            'symbol'                    => $symbol,
            'score_total'               => $score,
            'tier'                      => $tier,
            'reasons_json'              => json_encode($reasons),
            'recommended_platforms_json'=> json_encode($platforms),
            'status'                    => 'draft',
        ];

        if ($existing) {
            $this->ideaModel->update($existing['id'], $payload);
            return (int) $existing['id'];
        }

        return (int) $this->ideaModel->insert($payload);
    }

    protected function loadExistingIdeas(int $ingestId): array
    {
        $records = $this->ideaModel->where('ingest_id', $ingestId)->orderBy('score_total', 'DESC')->findAll();
        $ideas = [];
        foreach ($records as $record) {
            $ideas[] = [
                'id' => (int) $record['id'],
                'symbol' => $record['symbol'],
                'score_total' => (float) $record['score_total'],
                'tier' => $record['tier'],
                'reasons' => json_decode($record['reasons_json'] ?? '[]', true) ?? [],
                'platforms' => json_decode($record['recommended_platforms_json'] ?? '[]', true) ?? [],
            ];
        }

        return $ideas;
    }
}