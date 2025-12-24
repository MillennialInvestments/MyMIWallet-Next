<?php

namespace App\Services;

use App\Config\SocialPlatforms;
use App\Models\SocialPlatformModel;
use App\Models\SocialPostTemplateModel;
use CodeIgniter\I18n\Time;

class SocialPostFormatter
{
    protected SocialPlatformModel $platformModel;
    protected SocialPostTemplateModel $templateModel;
    protected SocialPlatforms $config;

    public function __construct()
    {
        $this->platformModel = new SocialPlatformModel();
        $this->templateModel = new SocialPostTemplateModel();
        $this->config        = config('SocialPlatforms');
    }

    /**
     * Format a post for a specific platform with constraints applied.
     *
     * @param string $platformKey
     * @param array  $input ['hook','value','cta','links'=>[],'hashtags'=>[],'tickers'=>[],'template_key'=>?,'cta_link'?,'constraints'=>[]]
     */
    public function format(string $platformKey, array $input): array
    {
        $platform = $this->platformModel->findByKey($platformKey) ?? $this->config->platforms[$platformKey] ?? null;
        if (! $platform) {
            throw new \InvalidArgumentException('Unknown platform: ' . $platformKey);
        }

        $constraints = $input['constraints'] ?? [];
        $template    = $this->resolveTemplate($platformKey, $input['template_key'] ?? null);

        $hashtags = $this->enforceHashtags($input['hashtags'] ?? [], $constraints['hashtag_limit'] ?? ($template['hashtag_limit'] ?? null));
        $tickers  = $this->formatTickers($platformKey, $input['tickers'] ?? []);

        $body = $this->injectTemplate($template['body_template'] ?? '{HOOK} {VALUE} {CTA} {LINKS} {HASHTAGS} {TICKERS}', [
            '{HOOK}'     => trim((string) ($input['hook'] ?? '')),
            '{VALUE}'    => trim((string) ($input['value'] ?? '')),
            '{CTA}'      => trim((string) ($input['cta'] ?? '')),
            '{LINKS}'    => $this->formatLinks($input['links'] ?? []),
            '{HASHTAGS}' => implode(' ', $hashtags),
            '{TICKERS}'  => implode(' ', $tickers),
        ]);

        $ctaLink = $input['cta_link'] ?? ($input['links'][0] ?? null);

        $body = $this->applyPlatformFlavor($platformKey, $body, $input, $ctaLink);
        $body = $this->truncateBody($platformKey, $body, $constraints['max_chars'] ?? ($template['max_chars'] ?? null));

        return [
            'post_title' => $this->buildTitle($platformKey, $input),
            'post_body'  => $body,
            'hashtags'   => implode(' ', $hashtags),
            'tickers'    => implode(' ', $tickers),
            'cta_link'   => $ctaLink,
        ];
    }

    protected function resolveTemplate(string $platformKey, ?string $templateKey): array
    {
        $platform = $this->platformModel->findByKey($platformKey);
        if ($platform && $templateKey) {
            $existing = $this->templateModel->findByPlatformAndKey((int) $platform['id'], $templateKey);
            if ($existing) {
                return $existing;
            }
        }

        $body = $this->config->defaultTemplates[$templateKey ?? 'daily_news_digest'] ?? $this->config->defaultTemplates['daily_news_digest'];
        return [
            'body_template' => $body,
            'max_chars'     => null,
            'hashtag_limit' => null,
        ];
    }

    protected function enforceHashtags(array $hashtags, ?int $limit): array
    {
        $cleaned = array_values(array_filter(array_map(static fn ($tag) => ltrim(trim((string) $tag), '#'), $hashtags)));
        if ($limit !== null) {
            $cleaned = array_slice($cleaned, 0, $limit);
        }
        return array_map(static fn ($tag) => '#' . $tag, $cleaned);
    }

    protected function formatTickers(string $platformKey, array $tickers): array
    {
        $cleaned = array_values(array_filter(array_map(static fn ($t) => strtoupper(trim((string) $t)), $tickers)));
        if ($platformKey === 'stocktwits' || $platformKey === 'x') {
            return array_map(static fn ($t) => '$' . ltrim($t, '$'), $cleaned);
        }
        return $cleaned;
    }

    protected function formatLinks(array $links): string
    {
        $cleaned = array_values(array_filter(array_map('trim', $links)));
        return implode(' ', array_slice($cleaned, 0, 3));
    }

    protected function applyPlatformFlavor(string $platformKey, string $body, array $input, ?string $ctaLink): string
    {
        switch ($platformKey) {
            case 'x':
                return $this->splitThread($body);
            case 'youtube':
                $pinned = "\n\n---\nPinned: Discord → {{discord}} | Website → {{website}} | Free Tool → {{budget_tool}}";
                return trim($body) . $pinned;
            case 'discord':
                $channel = $input['channel'] ?? '#announcements';
                return "**{$input['hook']}**\n" . $body . "\n\n{$channel} | CTA: {$ctaLink}";
            case 'stocktwits':
                return $body . "\n\n#StockTwits focus";
            default:
                return $body;
        }
    }

    protected function truncateBody(string $platformKey, string $body, ?int $maxChars): string
    {
        if (! $maxChars) {
            $maxChars = $this->guessMax($platformKey);
        }
        if ($maxChars && mb_strlen($body) > $maxChars) {
            return mb_substr($body, 0, max(0, $maxChars - 3)) . '...';
        }
        return $body;
    }

    protected function guessMax(string $platformKey): int
    {
        return match ($platformKey) {
            'x' => 280,
            'stocktwits' => 1000,
            'discord' => 2000,
            'tiktok' => 2200,
            default => 2000,
        };
    }

    protected function splitThread(string $body): string
    {
        $limit = 240;
        if (mb_strlen($body) <= $limit) {
            return $body;
        }

        $parts = [];
        $segment = '';
        $words = preg_split('/\\s+/', $body);
        $index = 1;

        foreach ($words as $word) {
            if (mb_strlen($segment . ' ' . $word) > $limit) {
                $parts[] = trim($segment) . " ({$index})";
                $segment = $word;
                $index++;
                continue;
            }
            $segment .= ' ' . $word;
        }
        if (! empty($segment)) {
            $parts[] = trim($segment) . " ({$index})";
        }

        return implode("\n---\n", $parts);
    }

    protected function buildTitle(string $platformKey, array $input): ?string
    {
        $hook = trim((string) ($input['hook'] ?? ''));
        if ($platformKey === 'youtube') {
            return mb_substr($hook, 0, 100);
        }
        if ($platformKey === 'twitch') {
            return mb_substr($hook, 0, 140);
        }
        return null;
    }
}
