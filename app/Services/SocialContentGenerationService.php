<?php

namespace App\Services;

use Config\Database;

class SocialContentGenerationService
{
    protected $db;
    protected SocialPostFormatter $formatter;

    public function __construct()
    {
        $this->db = Database::connect();
        $this->formatter = new SocialPostFormatter();
    }

    public function generateFromManualInput(string $topic, string $audience = 'beginner', string $ctaType = 'join_discord'): array
    {
        $source = [
            'topic' => trim($topic),
            'audience' => $audience,
            'cta_type' => $ctaType,
            'hook' => $this->makeHook($topic, $audience),
            'value' => $this->makeValue($topic, $audience),
            'cta' => $this->makeCta($ctaType),
            'links' => [],
            'hashtags' => $this->makeHashtags($topic),
            'tickers' => $this->extractTickers($topic),
        ];

        return $this->generatePack($source);
    }

    public function generatePack(array $source): array
    {
        $platforms = $this->db->table('bf_social_platforms')
            ->orderBy('id', 'ASC')
            ->get()
            ->getResultArray();

        $items = [];

        foreach ($platforms as $platform) {
            $items[] = $this->generateForPlatform((string) $platform['platform_key'], $source, (int) $platform['id']);
        }

        return [
            'status' => 'success',
            'source' => $source,
            'items' => $items,
        ];
    }

    public function generateForPlatform(string $platformKey, array $source, int $platformId = 0): array
    {
        $platformRules = $this->getRulesForPlatform($platformKey);

        $hook = $source['hook'] ?? $this->makeHook($source['topic'] ?? 'financial wellness', $source['audience'] ?? 'beginner');
        $value = $source['value'] ?? $this->makeValue($source['topic'] ?? 'financial wellness', $source['audience'] ?? 'beginner');
        $cta = $source['cta'] ?? $this->makeCta($source['cta_type'] ?? 'join_discord');

        $input = [
            'hook' => $hook,
            'value' => $value,
            'cta' => $cta,
            'links' => $source['links'] ?? [],
            'hashtags' => $source['hashtags'] ?? [],
            'tickers' => $source['tickers'] ?? [],
            'max_chars' => $platformRules['max_chars'],
            'hashtag_limit' => $platformRules['hashtag_limit'],
        ];

        $formatted = method_exists($this->formatter, 'format')
            ? $this->formatter->format($platformKey, $input)
            : $this->fallbackFormat($platformKey, $input);

        return [
            'platform_key' => $platformKey,
            'platform_id' => $platformId,
            'template_key' => 'manual_generation',
            'post_title' => $this->makeTitle($platformKey, $source['topic'] ?? 'Financial Wellness'),
            'post_body' => $formatted['post_body'] ?? $formatted['body'] ?? $this->fallbackFormat($platformKey, $input)['post_body'],
            'hashtags' => is_array($source['hashtags'] ?? null) ? implode(' ', $source['hashtags']) : ($source['hashtags'] ?? ''),
            'tickers' => is_array($source['tickers'] ?? null) ? implode(' ', $source['tickers']) : ($source['tickers'] ?? ''),
            'cta_link' => $source['cta_link'] ?? '',
            'status' => 'draft',
        ];
    }

    public function saveGeneratedPack(array $pack, string $sourceType = 'manual', int $sourceId = 0): array
    {
        $created = 0;

        foreach (($pack['items'] ?? []) as $item) {
            $this->db->table('bf_social_generated_posts')->insert([
                'source_type' => $sourceType,
                'source_id' => $sourceId,
                'platform_id' => $item['platform_id'] ?? 0,
                'community_id' => null,
                'template_id' => null,
                'post_title' => $item['post_title'] ?? null,
                'post_body' => $item['post_body'] ?? '',
                'hashtags' => $item['hashtags'] ?? null,
                'tickers' => $item['tickers'] ?? null,
                'cta_link' => $item['cta_link'] ?? null,
                'status' => 'draft',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            $created++;
        }

        return ['status' => 'success', 'created' => $created];
    }

    public function getGeneratedPosts(int $limit = 100): array
    {
        return $this->db->table('bf_social_generated_posts')
            ->orderBy('id', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    protected function getRulesForPlatform(string $platformKey): array
    {
        return match ($platformKey) {
            'x' => ['max_chars' => 280, 'hashtag_limit' => 3],
            'stocktwits' => ['max_chars' => 1000, 'hashtag_limit' => 5],
            'tiktok' => ['max_chars' => 2200, 'hashtag_limit' => 8],
            'linkedin' => ['max_chars' => 3000, 'hashtag_limit' => 5],
            'facebook', 'youtube' => ['max_chars' => 5000, 'hashtag_limit' => 8],
            'discord' => ['max_chars' => 2000, 'hashtag_limit' => 8],
            default => ['max_chars' => 2000, 'hashtag_limit' => 6],
        };
    }

    protected function makeHook(string $topic, string $audience): string
    {
        return match ($audience) {
            'advanced' => "Advanced insight: {$topic}",
            'business' => "Business growth angle: {$topic}",
            default => "Start here: {$topic}",
        };
    }

    protected function makeValue(string $topic, string $audience): string
    {
        return "Educational breakdown:\n"
            . "- Why this matters: {$topic}\n"
            . "- What to watch next: risk, timing, and goals\n"
            . "- Action step: compare this against your budget, portfolio, or plan\n\n"
            . "Educational content only. Not financial advice.";
    }

    protected function makeCta(string $ctaType): string
    {
        return match ($ctaType) {
            'free_tools' => 'Try the free MyMI Wallet tools and start tracking your financial goals.',
            'membership' => 'Upgrade when you are ready for premium insights, alerts, and portfolio tools.',
            'website' => 'Visit MyMI Wallet to explore budgeting, investing, crypto, and project tools.',
            default => 'Join the Discord community for daily discussion, tools, and updates.',
        };
    }

    protected function makeHashtags(string $topic): array
    {
        $tags = ['#MyMIWallet', '#FinancialWellness', '#Budgeting', '#Investing'];
        if (stripos($topic, 'crypto') !== false) {
            $tags[] = '#Crypto';
        }
        if (stripos($topic, 'stock') !== false || preg_match('/\$[A-Z]{1,6}/', $topic)) {
            $tags[] = '#Stocks';
        }
        return $tags;
    }

    protected function extractTickers(string $topic): array
    {
        preg_match_all('/\$[A-Z]{1,6}\b/', strtoupper($topic), $matches);
        return array_values(array_unique($matches[0] ?? []));
    }

    protected function makeTitle(string $platformKey, string $topic): string
    {
        return strtoupper($platformKey) . ': ' . mb_substr($topic, 0, 80);
    }

    protected function fallbackFormat(string $platformKey, array $input): array
    {
        $hashtags = array_slice($input['hashtags'] ?? [], 0, (int) ($input['hashtag_limit'] ?? 6));
        $tickers = $input['tickers'] ?? [];

        if ($platformKey === 'stocktwits') {
            $tickers = array_map(function ($ticker) {
                $ticker = strtoupper(trim((string) $ticker));
                return str_starts_with($ticker, '$') ? $ticker : '$' . $ticker;
            }, $tickers);
        }

        $body = trim(($input['hook'] ?? '') . "\n\n" . ($input['value'] ?? '') . "\n\n" . ($input['cta'] ?? '') . "\n\n" . implode(' ', $tickers) . "\n" . implode(' ', $hashtags));
        $max = (int) ($input['max_chars'] ?? 2000);

        if (mb_strlen($body) > $max) {
            $body = mb_substr($body, 0, max(0, $max - 3)) . '...';
        }

        return ['post_body' => $body];
    }
}
