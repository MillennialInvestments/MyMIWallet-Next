<?php

declare(strict_types=1);

namespace App\Libraries\ContentEngine;

use App\Config\ContentEngine as ContentEngineConfig;
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
    public function scoreIngest(int $ingestId): array
    {
        $ingest = $this->ingestModel->find($ingestId);
        if (! $ingest) {
            throw new RuntimeException('Ingest not found');
        }

        $rows = $this->rowModel->where('ingest_id', $ingestId)->findAll();
        $ideas = [];

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

        return $ideas;
    }

    protected function computeScores(array $row): array
    {
        $weights = $this->config->scoring['weights'];
        $caps = $this->config->scoring['caps'];
        $penalties = $this->config->scoring['penalties'];

        $reasons = [];
        $total = 0.0;

        $dollarScore = $this->scale($row['dollar_vol_m'] ?? 0, $caps['dollar_volume']) * ($weights['dollar_volume'] * 100);
        $total += $dollarScore;
        $reasons[] = sprintf('Dollar volume score: %.1f/%.1f', $dollarScore, $weights['dollar_volume'] * 100);

        $capScore = $this->scale($row['market_cap_m'] ?? 0, $caps['market_cap']) * ($weights['market_cap'] * 100);
        $total += $capScore;
        $reasons[] = sprintf('Market cap score: %.1f/%.1f', $capScore, $weights['market_cap'] * 100);

        $momentumScore = $this->scale($row['mark_pct_change'] ?? 0, $caps['mark_change']) * ($weights['mark_change'] * 100);
        $total += $momentumScore;
        $reasons[] = sprintf('Day momentum score: %.1f/%.1f', $momentumScore, $weights['mark_change'] * 100);

        $abvScore = $this->scale($row['abvvol'] ?? 0, $caps['abvvol']) * ($weights['abvvol'] * 100);
        $total += $abvScore;
        $reasons[] = sprintf('Above-average volume score: %.1f/%.1f', $abvScore, $weights['abvvol'] * 100);

        $fiveDayScore = $this->scale($row['pct_chng_5d'] ?? 0, $caps['five_day']) * ($weights['five_day'] * 100);
        $total += $fiveDayScore;
        $reasons[] = sprintf('5D change score: %.1f/%.1f', $fiveDayScore, $weights['five_day'] * 100);

        // Penalties
        if (! empty($row['market_cap_m']) && $row['market_cap_m'] < $penalties['microcap_threshold']) {
            $total += $penalties['microcap_hit'];
            $reasons[] = sprintf('Penalty: microcap below $%.0fm', $penalties['microcap_threshold']);
        }

        if (! empty($row['mark_pct_change']) && $row['mark_pct_change'] > $penalties['extreme_move']) {
            $total += $penalties['extreme_hit'];
            $reasons[] = sprintf('Penalty: extreme move over %.0f%%', $penalties['extreme_move']);
        }

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
}