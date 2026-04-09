<?php

namespace App\Services;

use App\Models\MarketingModel;
use Config\Database;

class MarketingStoryService
{
    public function __construct(private ?MarketingModel $marketingModel = null)
    {
        $this->marketingModel ??= new MarketingModel();
    }

    public function attachToStory(array $notification): int
    {
        $match = $this->findMatchingStory($notification);
        if ($match !== null) {
            $storyId = (int) $match['id'];
            $this->addStoryUpdate($storyId, $notification);
            Database::connect()->table('bf_marketing_stories')->where('id', $storyId)->update([
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            return $storyId;
        }

        $storyId = $this->createStoryFromNotification($notification);
        $this->addStoryUpdate($storyId, $notification);

        return $storyId;
    }

    public function findMatchingStory(array $notification): ?array
    {
        $db = Database::connect();
        $stories = $db->table('bf_marketing_stories')->orderBy('updated_at', 'DESC')->limit(50)->get()->getResultArray();
        if ($stories === []) {
            return null;
        }

        $title = mb_strtolower((string) ($notification['title'] ?? ''));
        $urlHost = parse_url((string) ($notification['source_url'] ?? ''), PHP_URL_HOST) ?: '';
        $needleKeywords = $this->normalizeKeywords($notification['keywords'] ?? []);
        $createdAt = strtotime((string) ($notification['created_at'] ?? 'now')) ?: time();

        $best = null;
        $bestScore = 0.0;

        foreach ($stories as $story) {
            $storyKeywords = $this->normalizeKeywords($story['keywords'] ?? []);
            $overlap = $this->jaccard($needleKeywords, $storyKeywords);

            $storyTitle = mb_strtolower((string) ($story['title'] ?? ''));
            similar_text($title, $storyTitle, $titlePct);
            $titleScore = $titlePct / 100;

            $storyHost = parse_url((string) ($story['source_url'] ?? ''), PHP_URL_HOST) ?: '';
            $domainScore = ($urlHost !== '' && $urlHost === $storyHost) ? 1.0 : 0.0;

            $storyUpdated = strtotime((string) ($story['updated_at'] ?? 'now')) ?: $createdAt;
            $hoursDiff = abs($createdAt - $storyUpdated) / 3600;
            $timeScore = max(0.0, 1.0 - min($hoursDiff / 72, 1.0));

            $score = ($overlap * 0.45) + ($titleScore * 0.30) + ($domainScore * 0.10) + ($timeScore * 0.15);
            if ($score > $bestScore) {
                $bestScore = $score;
                $best = $story;
            }
        }

        return $bestScore >= 0.35 ? $best : null;
    }

    public function createStoryFromNotification(array $notification): int
    {
        $db = Database::connect();
        $db->table('bf_marketing_stories')->insert([
            'title' => (string) ($notification['title'] ?? 'Untitled Story'),
            'summary' => (string) ($notification['summary'] ?? ''),
            'keywords' => json_encode($this->normalizeKeywords($notification['keywords'] ?? [])),
            'source_url' => (string) ($notification['source_url'] ?? null),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return (int) $db->insertID();
    }

    public function addStoryUpdate(int $storyId, array $notification, array $package = []): int
    {
        return $this->marketingModel->insertStoryUpdate([
            'story_id' => $storyId,
            'notification_id' => $notification['id'] ?? null,
            'update_text' => (string) ($notification['content'] ?? ''),
            'update_summary' => (string) ($package['summary'] ?? $notification['summary'] ?? ''),
            'update_keywords' => json_encode($this->normalizeKeywords($package['keywords'] ?? ($notification['keywords'] ?? []))),
            'update_source_url' => (string) ($notification['source_url'] ?? null),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    private function normalizeKeywords(array|string $keywords): array
    {
        if (! is_array($keywords)) {
            $decoded = json_decode((string) $keywords, true);
            $keywords = is_array($decoded) ? $decoded : explode(',', (string) $keywords);
        }

        return array_values(array_unique(array_filter(array_map(static fn($k) => mb_strtolower(trim((string) $k)), $keywords))));
    }

    private function jaccard(array $a, array $b): float
    {
        if ($a === [] || $b === []) {
            return 0.0;
        }

        $intersection = array_intersect($a, $b);
        $union = array_unique(array_merge($a, $b));

        return count($intersection) / max(count($union), 1);
    }
}
