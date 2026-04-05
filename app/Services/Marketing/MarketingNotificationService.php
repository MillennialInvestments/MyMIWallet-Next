<?php

namespace App\Services\Marketing;

use App\Libraries\MyMIMarketing;
use Config\Database;

class MarketingNotificationService
{
    private MyMIMarketing $marketing;
    private SourceFinderService $sourceFinder;

    public function __construct(MyMIMarketing $marketing, ?SourceFinderService $sourceFinder = null)
    {
        $this->marketing = $marketing;
        $this->sourceFinder = $sourceFinder ?? new SourceFinderService();
    }

    public function attachToStory(array $notification): int
    {
        $db = Database::connect();
        $keywords = $this->decodeKeywords($notification['keywords'] ?? '[]');

        $stories = $db->table('bf_marketing_stories')
            ->orderBy('updated_at', 'DESC')
            ->limit(50)
            ->get()
            ->getResultArray();

        $bestStory = null;
        $bestScore = 0;

        foreach ($stories as $story) {
            $storyKeywords = $this->decodeKeywords($story['keywords'] ?? '[]');
            $score = $this->keywordOverlapScore($keywords, $storyKeywords);
            if ($score > $bestScore) {
                $bestScore = $score;
                $bestStory = $story;
            }
        }

        $source = $this->sourceFinder->findSource((string) ($notification['translated_text'] ?? $notification['raw_text'] ?? ''));

        if ($bestStory && $bestScore >= 0.3) {
            $storyId = (int) $bestStory['id'];
            $db->table('bf_marketing_story_updates')->insert([
                'story_id' => $storyId,
                'notification_id' => (int) $notification['id'],
                'update_text' => $notification['translated_text'] ?? '',
                'update_summary' => $notification['summary'] ?? '',
                'update_keywords' => json_encode($keywords),
                'update_source_url' => $source['source_url'] ?? null,
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            $db->table('bf_marketing_stories')->where('id', $storyId)->update([
                'updated_at' => date('Y-m-d H:i:s'),
                'source_url' => $source['source_url'] ?? ($bestStory['source_url'] ?? null),
            ]);

            return $storyId;
        }

        $title = $source['source_title'] ?? ('Story ' . date('Y-m-d H:i'));
        $db->table('bf_marketing_stories')->insert([
            'title' => $title,
            'summary' => $notification['summary'] ?? '',
            'keywords' => json_encode($keywords),
            'source_url' => $source['source_url'] ?? null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $storyId = (int) $db->insertID();

        $db->table('bf_marketing_story_updates')->insert([
            'story_id' => $storyId,
            'notification_id' => (int) $notification['id'],
            'update_text' => $notification['translated_text'] ?? '',
            'update_summary' => $notification['summary'] ?? '',
            'update_keywords' => json_encode($keywords),
            'update_source_url' => $source['source_url'] ?? null,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return $storyId;
    }

    public function generateMarketingPackage(array $notification, int $storyId): array
    {
        $summary = (string) ($notification['summary'] ?? '');
        $keywords = $this->decodeKeywords($notification['keywords'] ?? '[]');

        $voiceScript = $this->marketing->generateVoiceoverScriptFromSummary($summary);
        $audioUrl = $this->marketing->generateVoiceoverAudio($voiceScript);
        $imageUrl = method_exists($this->marketing, 'generateBrandedImage')
            ? $this->marketing->generateBrandedImage($summary, $keywords)
            : null;

        return [
            'social_posts' => $this->marketing->generateUnifiedSocialPosts($summary, $keywords),
            'voice_script' => $voiceScript,
            'audio_url' => $audioUrl,
            'video_scripts' => [
                'tiktok' => $this->marketing->generateTikTokScript($summary),
                'youtube' => $this->marketing->generateYouTubeScript($summary),
            ],
            'image_url' => $imageUrl,
            'source_url' => $notification['source_url'] ?? null,
            'story_id' => $storyId,
        ];
    }

    private function decodeKeywords(string|array $keywords): array
    {
        if (is_array($keywords)) {
            return array_values($keywords);
        }

        $decoded = json_decode($keywords, true);
        if (is_array($decoded)) {
            return array_values(array_map('strval', $decoded));
        }

        return array_values(array_filter(array_map('trim', explode(',', $keywords))));
    }

    private function keywordOverlapScore(array $a, array $b): float
    {
        $a = array_unique(array_filter(array_map('strtolower', $a)));
        $b = array_unique(array_filter(array_map('strtolower', $b)));

        if ($a === [] || $b === []) {
            return 0.0;
        }

        $intersection = array_intersect($a, $b);
        $union = array_unique(array_merge($a, $b));

        return count($intersection) / max(count($union), 1);
    }
}
