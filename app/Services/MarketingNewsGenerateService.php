<?php

namespace App\Services;

use App\Libraries\MyMIMarketing;
use App\Models\MarketingModel;
use Config\Database;

class MarketingNewsGenerateService
{
    public function __construct(
        private ?MarketingModel $marketingModel = null,
        private ?MyMIMarketing $marketingLibrary = null,
    ) {
        $this->marketingModel ??= new MarketingModel();
        $this->marketingLibrary ??= service('MyMIMarketing');
    }

    public function processPending(int $limit = 25, array $filters = []): array
    {
        $db = Database::connect();
        $columns = array_flip($db->getFieldNames('bf_marketing_temp_scraper'));
        $builder = $db->table('bf_marketing_temp_scraper');

        $limit = max(1, $limit);

        $type = isset($filters['type']) && is_string($filters['type']) && trim($filters['type']) !== ''
            ? trim($filters['type'])
            : 'marketing_news';

        $ticker = isset($filters['ticker']) && is_string($filters['ticker']) && trim($filters['ticker']) !== ''
            ? strtoupper(trim($filters['ticker']))
            : null;

        $force = !empty($filters['force']);

        // Title must exist
        if (isset($columns['title'])) {
            $builder->where('title IS NOT NULL', null, false);
            $builder->where('title !=', '');
        }

        // Content should exist if available
        if (isset($columns['content'])) {
            $builder->where('content IS NOT NULL', null, false);
            $builder->where('content !=', '');
        }

        // Only process pending/unprocessed rows unless forced
        if (! $force) {
            $builder->groupStart();

            $hasPendingGuard = false;

            if (isset($columns['status'])) {
                $builder->where('status', 'pending');
                $builder->orWhere('status IS NULL', null, false);
                $builder->orWhere('status', '');
                $hasPendingGuard = true;
            }

            if (isset($columns['processed'])) {
                if ($hasPendingGuard) {
                    $builder->orWhere('processed', 0);
                    $builder->orWhere('processed IS NULL', null, false);
                } else {
                    $builder->where('processed', 0);
                    $builder->orWhere('processed IS NULL', null, false);
                }
            }

            $builder->groupEnd();
        }

        // Route/type guard for marketing-news rows only
        $builder->groupStart();
        $hasRouteGuard = false;

        if (isset($columns['type'])) {
            $builder->where('type', $type);
            $hasRouteGuard = true;
        }

        if (isset($columns['source_type'])) {
            if ($hasRouteGuard) {
                $builder->orWhere('source_type', 'email_alert');
            } else {
                $builder->where('source_type', 'email_alert');
                $hasRouteGuard = true;
            }
        }

        if (isset($columns['metadata'])) {
            if ($hasRouteGuard) {
                $builder->orLike('metadata', '"route_category":"marketing_news"');
                $builder->orLike('metadata', '"type":"marketing_news"');
                $builder->orLike('metadata', '"category":"marketing_news"');
            } else {
                $builder->like('metadata', '"route_category":"marketing_news"');
                $builder->orLike('metadata', '"type":"marketing_news"');
                $builder->orLike('metadata', '"category":"marketing_news"');
                $hasRouteGuard = true;
            }
        }

        $builder->groupEnd();

        // Optional ticker filter
        if ($ticker !== null) {
            $builder->groupStart();

            $hasTickerGuard = false;

            if (isset($columns['ticker'])) {
                $builder->where('UPPER(ticker)', $ticker);
                $hasTickerGuard = true;
            }

            if (isset($columns['title'])) {
                if ($hasTickerGuard) {
                    $builder->orLike('title', $ticker);
                } else {
                    $builder->like('title', $ticker);
                    $hasTickerGuard = true;
                }
            }

            if (isset($columns['content'])) {
                if ($hasTickerGuard) {
                    $builder->orLike('content', $ticker);
                } else {
                    $builder->like('content', $ticker);
                    $hasTickerGuard = true;
                }
            }

            $builder->groupEnd();
        }

        $orderColumn = isset($columns['date_scraped']) ? 'date_scraped' : 'id';

        $records = $builder
            ->orderBy($orderColumn, 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();

        $result = [
            'processed' => 0,
            'stored'    => 0,
            'skipped'   => 0,
            'items'     => [],
        ];

        foreach ($records as $record) {
            $processed = $this->processRecord($record);
            $result['items'][] = $processed;
            $result['processed']++;

            if (($processed['status'] ?? '') === 'stored') {
                $result['stored']++;
                $this->markTempProcessed((int) ($record['id'] ?? 0));
            } else {
                $result['skipped']++;
            }
        }

        return $result;
    }

    public function processRecord(array $record): array
    {
        if (! $this->isMarketingNewsRecord($record)) {
            $this->markTempSkipped((int) ($record['id'] ?? 0), 'skipped_non_marketing_route');
            return ['status' => 'skipped', 'reason' => 'non_marketing_route', 'id' => $record['id'] ?? null];
        }

        $content = $this->sanitizeForGeneration((string) ($record['content'] ?? ''));
        if ($content === '') {
            $this->markTempSkipped((int) ($record['id'] ?? 0), 'empty_content');
            return ['status' => 'skipped', 'reason' => 'empty_content', 'id' => $record['id'] ?? null];
        }

        $summary = $this->marketingLibrary->summarizeText($content);
        if (is_array($summary)) {
            $summary = (string) ($summary['summary'] ?? implode(' ', $summary));
        }
        $summary = trim((string) $summary);

        $sentences = $this->marketingLibrary->splitIntoSentences($content);
        $keywords = $this->marketingLibrary->extractKeywords($sentences, [], [
            'ticker' => $record['ticker'] ?? '',
            'company' => $record['company_name'] ?? '',
            'summary' => $summary,
            'category' => 'marketing_news',
        ]);
        if (!is_array($keywords)) {
            $keywords = array_filter(array_map('trim', explode(',', (string) $keywords)));
        }
        $keywords = array_values(array_unique(array_filter(array_map('strtolower', $keywords))));

        $existingStory = $this->detectStoryMatch($record, $summary, $keywords);
        $payload = $this->buildStoryboardPayload($record, $summary, $keywords);
        if ($existingStory !== null) {
            $payload['story_hash'] = $existingStory['story_hash'] ?? $payload['story_hash'];
            $payload['timeline_json'] = $this->mergeTimeline($existingStory['timeline_json'] ?? null, $payload['timeline_json'] ?? '[]');
        }

        $id = $this->persistStoryboard($record, $payload);
        if ($id <= 0) {
            $this->markTempSkipped((int) ($record['id'] ?? 0), 'persist_failed');
            return ['status' => 'skipped', 'reason' => 'persist_failed', 'id' => $record['id'] ?? null];
        }

        return ['status' => 'stored', 'id' => $record['id'] ?? null, 'story_id' => $id, 'story_hash' => $payload['story_hash'] ?? null];
    }

    public function detectStoryMatch(array $record, string $summary, array $keywords): ?array
    {
        $db = Database::connect();
        $candidates = $db->table('bf_marketing_scraper')
            ->select('id, title, summary, ticker, company_name, source, story_hash, timeline_json, type')
            ->orderBy('created_on', 'DESC')
            ->limit(75)
            ->get()
            ->getResultArray();

        $best = null;
        $bestScore = 0.0;

        foreach ($candidates as $candidate) {
            $score = 0.0;

            if (!empty($record['ticker']) && !empty($candidate['ticker']) && strtoupper((string) $record['ticker']) === strtoupper((string) $candidate['ticker'])) {
                $score += 0.30;
            }
            if (!empty($record['company_name']) && !empty($candidate['company_name']) && mb_strtolower((string) $record['company_name']) === mb_strtolower((string) $candidate['company_name'])) {
                $score += 0.20;
            }
            if (!empty($record['source_provider']) && !empty($candidate['source']) && mb_strtolower((string) $record['source_provider']) === mb_strtolower((string) $candidate['source'])) {
                $score += 0.10;
            }
            if (!empty($record['alert_type']) && !empty($candidate['type']) && mb_strtolower((string) $record['alert_type']) === mb_strtolower((string) $candidate['type'])) {
                $score += 0.10;
            }

            $candidateKeywords = $this->extractKeywordsFromRow($candidate);
            $score += 0.15 * $this->jaccard($keywords, $candidateKeywords);

            similar_text(mb_strtolower((string) ($record['title'] ?? '')), mb_strtolower((string) ($candidate['title'] ?? '')), $titlePct);
            $score += 0.05 * ($titlePct / 100);

            $score += 0.10 * $this->cosineSimilarity($summary, (string) ($candidate['summary'] ?? ''));

            if ($score > $bestScore) {
                $bestScore = $score;
                $best = $candidate;
            }
        }

        return $bestScore >= 0.40 ? $best : null;
    }

    public function buildStoryboardPayload(array $record, string $summary, array $keywords): array
    {
        $title = trim((string) ($record['title'] ?? 'Untitled Alert'));
        $short = mb_substr($summary !== '' ? $summary : strip_tags((string) ($record['content'] ?? '')), 0, 220);
        $long = $summary !== '' ? $summary : trim(strip_tags((string) ($record['content'] ?? '')));
        $hashtags = array_map(static fn($kw) => '#' . preg_replace('/\s+/', '', ucwords($kw)), array_slice($keywords, 0, 8));
        $storyHashBase = strtoupper((string) ($record['ticker'] ?? '')) . '|' . mb_strtolower((string) ($record['company_name'] ?? '')) . '|' . mb_strtolower($title);

        $timeline = [[
            'at' => date('c'),
            'title' => $title,
            'summary' => $short,
            'source_message_id' => $record['source_message_id'] ?? null,
            'source_provider' => $record['source_provider'] ?? null,
            'alert_type' => $record['alert_type'] ?? null,
        ]];

        return [
            'title' => $title,
            'story_title' => $title,
            'short_summary' => $short,
            'summary' => $long,
            'long_summary' => $long,
            'why_it_matters' => $this->buildWhyItMatters($record, $keywords),
            'keywords' => implode(', ', $keywords),
            'hashtags' => implode(' ', $hashtags),
            'ticker' => strtoupper((string) ($record['ticker'] ?? '')) ?: null,
            'company_name' => $record['company_name'] ?? null,
            'provider' => $record['source_provider'] ?? null,
            'source' => $record['source_provider'] ?? null,
            'alert_type' => $record['alert_type'] ?? null,
            'story_type' => $record['alert_type'] ?? 'news',
            'story_hash' => hash('sha256', $storyHashBase),
            'timeline_json' => json_encode($timeline),
            'story_status' => 'generated',
            'generated_payload' => json_encode([
                'suggested_short_form_scripts' => $this->buildShortFormScripts($title, $short),
                'suggested_cta' => 'Follow MyMI Wallet for live market alerts and deeper analysis.',
                'suggested_platforms' => ['discord', 'linkedin', 'email', 'x'],
                'status_flow' => ['pending_generation', 'generated', 'pending_review', 'approved', 'scheduled', 'distributed', 'failed'],
            ]),
        ];
    }

    public function persistStoryboard(array $record, array $payload): int
    {
        $db = Database::connect();

        $sourceIds = json_encode([(int) ($record['id'] ?? 0)]);
        $finalRow = [
            'source_id' => $record['id'] ?? null,
            'source' => $payload['source'] ?? null,
            'type' => $payload['story_type'] ?? null,
            'title' => $payload['title'] ?? null,
            'summary' => $payload['short_summary'] ?? null,
            'content' => $payload['long_summary'] ?? null,
            'keywords' => $payload['keywords'] ?? null,
            'status' => $payload['story_status'] ?? 'generated',
            'story_hash' => $payload['story_hash'] ?? null,
            'story_title' => $payload['story_title'] ?? null,
            'story_type' => $payload['story_type'] ?? null,
            'ticker' => $payload['ticker'] ?? null,
            'company_name' => $payload['company_name'] ?? null,
            'source_ids' => $sourceIds,
            'source_count' => 1,
            'latest_source_at' => date('Y-m-d H:i:s'),
            'timeline_json' => $payload['timeline_json'] ?? null,
            'story_status' => $payload['story_status'] ?? 'generated',
            'generated_payload' => $payload['generated_payload'] ?? null,
            'date_scraped' => date('Y-m-d H:i:s'),
            'created_on' => date('Y-m-d H:i:s'),
            'modified_on' => date('Y-m-d H:i:s'),
        ];

        $db->table('bf_marketing_scraper')->insert($finalRow);
        $storyId = (int) $db->insertID();
        if ($storyId <= 0) {
            return 0;
        }

        $generatedRow = [
            'source_type' => 'temp_scraper',
            'source_id' => $record['id'] ?? null,
            'story_id' => $storyId,
            'title' => $payload['title'] ?? null,
            'summary' => $payload['short_summary'] ?? null,
            'keywords' => $payload['keywords'] ?? null,
            'content_json' => $payload['generated_payload'] ?? null,
            'status' => 'generated',
            'approval_status' => 'pending_review',
            'distribution_status' => 'pending_generation',
            'version' => 1,
            'content_hash' => hash('sha256', ($payload['story_hash'] ?? '') . '|' . ($payload['short_summary'] ?? '')),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->marketingModel->insertGeneratedContent($generatedRow);

        return $storyId;
    }

    public function markTempProcessed(int $id): bool
    {
        $db = Database::connect();

        return (bool) $db->table('bf_marketing_temp_scraper')
            ->where('id', $id)
            ->update([
                'status' => 'processed',
                'processed' => 1,
                'processed_at' => date('Y-m-d H:i:s'),
                'modified_on' => date('Y-m-d H:i:s'),
            ]);
    }

    public function markTempSkipped(int $id, string $reason): bool
    {
        if ($id <= 0) {
            return false;
        }

        $db = Database::connect();

        return (bool) $db->table('bf_marketing_temp_scraper')
            ->where('id', $id)
            ->update([
                'status' => $reason,
                'processed' => 0,
                'processed_at' => date('Y-m-d H:i:s'),
                'modified_on' => date('Y-m-d H:i:s'),
            ]);
    }

    private function buildWhyItMatters(array $record, array $keywords): string
    {
        $ticker = strtoupper((string) ($record['ticker'] ?? ''));
        $company = (string) ($record['company_name'] ?? 'the company');
        $keywordText = implode(', ', array_slice($keywords, 0, 4));

        return trim("{$company} {$ticker} developments can affect investor sentiment, sector momentum, and short-term trading setups. Signals: {$keywordText}.");
    }

    private function buildShortFormScripts(string $title, string $summary): array
    {
        return [
            'hook' => "Market alert: {$title}",
            '15s' => mb_substr($summary, 0, 120),
            '30s' => mb_substr($summary, 0, 240),
        ];
    }

    private function isMarketingNewsRecord(array $record): bool
    {
        $type = strtolower(trim((string) ($record['type'] ?? '')));
        if ($type === 'marketing_news') {
            return true;
        }

        $sourceType = strtolower(trim((string) ($record['source_type'] ?? '')));
        if ($sourceType === 'email_alert') {
            return true;
        }

        $metadata = strtolower((string) ($record['metadata'] ?? ''));

        return str_contains($metadata, '"route_category":"marketing_news"')
            || str_contains($metadata, '"type":"marketing_news"')
            || str_contains($metadata, '"category":"marketing_news"');
    }

    private function sanitizeForGeneration(string $content): string
    {
        $decoded = quoted_printable_decode($content);
        $decoded = html_entity_decode($decoded, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $cleaned = $this->marketingLibrary->sanitizeRawEmailContent($decoded);
        $cleaned = preg_replace('/\b(this email.+?unsubscribe.*)$/is', '', $cleaned) ?? $cleaned;
        $cleaned = preg_replace('/\s+/', ' ', strip_tags($cleaned)) ?? $cleaned;
        return trim($cleaned);
    }

    private function extractKeywordsFromRow(array $row): array
    {
        $raw = $row['keywords'] ?? '';
        if (is_array($raw)) {
            return array_values(array_filter(array_map('strtolower', $raw)));
        }

        $decoded = json_decode((string) $raw, true);
        if (is_array($decoded)) {
            return array_values(array_filter(array_map('strtolower', $decoded)));
        }

        return array_values(array_filter(array_map('strtolower', array_map('trim', explode(',', (string) $raw)))));
    }

    private function cosineSimilarity(string $a, string $b): float
    {
        $tokensA = array_count_values($this->tokenize($a));
        $tokensB = array_count_values($this->tokenize($b));
        if ($tokensA === [] || $tokensB === []) {
            return 0.0;
        }

        $all = array_unique(array_merge(array_keys($tokensA), array_keys($tokensB)));
        $dot = 0.0;
        $magA = 0.0;
        $magB = 0.0;
        foreach ($all as $token) {
            $v1 = (float) ($tokensA[$token] ?? 0);
            $v2 = (float) ($tokensB[$token] ?? 0);
            $dot += $v1 * $v2;
            $magA += $v1 * $v1;
            $magB += $v2 * $v2;
        }

        if ($magA <= 0 || $magB <= 0) {
            return 0.0;
        }

        return $dot / (sqrt($magA) * sqrt($magB));
    }

    private function tokenize(string $text): array
    {
        $text = mb_strtolower(strip_tags($text));
        $parts = preg_split('/[^a-z0-9]+/i', $text) ?: [];

        return array_values(array_filter($parts, static fn($part) => mb_strlen($part) > 2));
    }

    private function jaccard(array $left, array $right): float
    {
        $left = array_values(array_unique(array_filter($left)));
        $right = array_values(array_unique(array_filter($right)));
        if ($left === [] || $right === []) {
            return 0.0;
        }

        $intersection = count(array_intersect($left, $right));
        $union = count(array_unique(array_merge($left, $right)));

        return $union > 0 ? ($intersection / $union) : 0.0;
    }

    private function mergeTimeline(?string $existingJson, string $currentJson): string
    {
        $existing = json_decode((string) $existingJson, true);
        $current = json_decode($currentJson, true);

        $existing = is_array($existing) ? $existing : [];
        $current = is_array($current) ? $current : [];

        return json_encode(array_values(array_merge($existing, $current)));
    }
}
