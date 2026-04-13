<?php

namespace App\Services\Marketing\Distribution;

use Config\MarketingDistribution;

class DiscordMessageBuilder
{
    public function __construct(private ?MarketingDistribution $config = null)
    {
        $this->config ??= config('MarketingDistribution');
    }

    /** @return array<string,mixed> */
    public function build(array $record, string $channelKey): array
    {
        $title = trim((string) ($record['title'] ?? 'Marketing Update'));
        $summary = trim((string) ($record['summary'] ?? ''));
        $primaryCategory = (string) ($record['primary_category'] ?? 'community_news');
        $whyItMatters = trim((string) ($record['why_it_matters'] ?? $record['why'] ?? ''));
        $sourceContext = trim((string) ($record['source_context'] ?? $record['source_url'] ?? ''));

        $tags = $this->normalizeTags($record['secondary_tags'] ?? $record['keywords'] ?? []);
        $emoji = $this->categoryEmoji($primaryCategory);
        $label = strtoupper(str_replace('_', ' ', $primaryCategory));

        $sections = [
            sprintf('%s **%s**', $emoji, $label),
            '**' . $title . '**',
        ];

        if ($summary !== '') {
            $sections[] = $summary;
        }

        if ($whyItMatters !== '') {
            $sections[] = '💡 **Why it matters:** ' . $whyItMatters;
        }

        if ($sourceContext !== '') {
            $sections[] = '🔎 ' . $sourceContext;
        }

        if ($tags !== []) {
            $sections[] = implode(' ', array_map(static fn(string $tag): string => '#' . $tag, $tags));
        }

        $content = $this->truncate(implode("\n", $sections));

        return [
            'content' => $content,
            'channel_key' => $channelKey,
            'primary_category' => $primaryCategory,
            'secondary_tags' => $tags,
            'source_type' => (string) ($record['source_type'] ?? 'marketing'),
            'content_type' => (string) ($record['content_type'] ?? 'generated_summary'),
        ];
    }

    /** @return array<string,mixed> */
    public function buildAllowedMentions(array $record): array
    {
        $discord = $this->config->discord;
        $isAnnouncement = (string) ($record['primary_category'] ?? '') === 'announcements';
        $explicitEveryone = (bool) ($record['allow_everyone'] ?? false);

        if (($discord['default_mentions_disabled'] ?? true) === true) {
            if ($isAnnouncement && $explicitEveryone && ($discord['allow_everyone_for_announcement_only'] ?? true)) {
                return ['parse' => $discord['mention_policy']['announcement_parse'] ?? ['everyone']];
            }

            return ['parse' => $discord['mention_policy']['routine_parse'] ?? []];
        }

        return ['parse' => []];
    }

    private function truncate(string $content): string
    {
        $max = max(280, (int) ($this->config->discord['max_length'] ?? 1800));
        if (mb_strlen($content) <= $max) {
            return $content;
        }

        $suffix = (string) ($this->config->discord['truncate_suffix'] ?? '…');

        return mb_substr($content, 0, max(0, $max - mb_strlen($suffix))) . $suffix;
    }

    /** @return list<string> */
    private function normalizeTags(mixed $raw): array
    {
        if (is_string($raw)) {
            $raw = explode(',', $raw);
        }

        if (! is_array($raw)) {
            return [];
        }

        $tags = [];
        foreach ($raw as $tag) {
            $value = strtolower(trim((string) $tag));
            $value = preg_replace('/[^a-z0-9_]/', '', $value ?? '') ?? '';
            if ($value !== '') {
                $tags[] = $value;
            }
        }

        return array_values(array_unique($tags));
    }

    private function categoryEmoji(string $category): string
    {
        return match ($category) {
            'announcements' => '📣',
            'mymi_news' => '🟦',
            'crypto_news' => '🪙',
            'financial_news' => '💵',
            'stock_news' => '📈',
            default => '📰',
        };
    }
}
