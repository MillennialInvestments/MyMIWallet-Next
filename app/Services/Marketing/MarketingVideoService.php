<?php

declare(strict_types=1);

namespace App\Services\Marketing;

use App\Libraries\MyMIMarketing;
use App\Models\Marketing\MarketingPublishQueueModel;
use App\Models\Marketing\MarketingVideoAssetModel;
use App\Models\Marketing\MarketingVideoContentModel;
use App\Models\Marketing\MarketingVideoTemplateModel;
use App\Models\Marketing\MarketingVideoVersionModel;
use App\Models\MarketingModel;
use Config\Database;
use RuntimeException;
use Throwable;

class MarketingVideoService
{
    private const VALID_STATUSES = [
        'Draft', 'Generated', 'Needs Review', 'Approved', 'Needs Assets', 'Ready to Record',
        'Ready to Post', 'Scheduled', 'Posted', 'Archived', 'Failed',
    ];

    private MarketingModel $marketingModel;
    private MarketingVideoContentModel $contentModel;
    private MarketingVideoAssetModel $assetModel;
    private MarketingVideoVersionModel $versionModel;
    private MarketingVideoTemplateModel $templateModel;
    private MarketingPublishQueueModel $publishQueueModel;
    private ?MyMIMarketing $marketingLibrary;

    public function __construct()
    {
        $this->marketingModel = new MarketingModel();
        $this->contentModel = new MarketingVideoContentModel();
        $this->assetModel = new MarketingVideoAssetModel();
        $this->versionModel = new MarketingVideoVersionModel();
        $this->templateModel = new MarketingVideoTemplateModel();
        $this->publishQueueModel = new MarketingPublishQueueModel();
        $library = service('MyMIMarketing');
        $this->marketingLibrary = $library instanceof MyMIMarketing ? $library : null;
    }

    public function implementationMap(): array
    {
        return [
            'reusable_services' => [
                'MarketingService',
                'MyMIMarketing',
                'SocialPostFormatter',
                'MarketingScraper',
            ],
            'reusable_ui_components' => [
                'Management marketing card blocks',
                'dynamicModalLoader modal pattern',
                'AJAX fetch blocks in marketing/index.php',
                'platform-library resource view',
            ],
            'reusable_controller_patterns' => [
                'Management/Marketing route group',
                'API/Marketing JSON endpoints',
                'renderTheme dashboard layout',
            ],
            'reusable_ajax_endpoints' => [
                'fetchGeneratedSummariesJson',
                'getRecentScrapes',
                'generatePlatformPosts',
                'updateInsight',
            ],
            'reusable_db_tables' => [
                'bf_marketing_scraper',
                'bf_marketing_temp_scraper',
                'bf_social_generated_posts',
                'bf_social_post_templates',
                'bf_social_distribution_queue',
            ],
            'gaps' => [
                'normalized short-form video content storage',
                'video-specific template definitions',
                'version history for editable generated scripts',
                'export packages for video workflows',
                'platform adaptation persistence for one-to-many variants',
            ],
        ];
    }

    public function ensureDefaultTemplates(): array
    {
        $defaults = $this->defaultTemplates();
        $saved = [];

        foreach ($defaults as $template) {
            $existing = $this->templateModel
                ->where('platform', $template['platform'])
                ->where('video_type', $template['video_type'])
                ->where('template_name', $template['template_name'])
                ->first();

            if ($existing) {
                $this->templateModel->update((int) $existing['id'], $template);
                $saved[] = $this->templateModel->find((int) $existing['id']);
                continue;
            }

            $this->templateModel->insert($template);
            $saved[] = $this->templateModel->find($this->templateModel->getInsertID());
        }

        if ($this->contentModel->countAllResults() === 0) {
            foreach ($this->defaultDemoContent() as $demo) {
                $this->saveGeneratedVideoContent($demo + ['seed_demo' => true]);
            }
        }

        return $saved;
    }

    public function generateVideoContent(array $input): array
    {
        $normalized = $this->normalizeInput($input);
        $sourcePayload = $this->resolveSourceContent($normalized);
        $sanitized = $this->sanitizeSourceText($sourcePayload['content'] ?? '');
        $summary = $this->buildSummary($sanitized, $normalized);
        $keywords = $this->extractKeywords($summary . ' ' . ($normalized['topic'] ?? '') . ' ' . ($normalized['symbol'] ?? ''));
        $videoType = $normalized['video_type'] ?: $this->determineVideoType($normalized, $keywords, $summary);
        $template = $this->resolveTemplate((string) $normalized['target_platform'], $videoType);

        log_message('info', 'MarketingVideoService generateVideoContent request', [
            'source_type' => $normalized['content_source_type'],
            'platform' => $normalized['target_platform'],
            'video_type' => $videoType,
            'symbol' => $normalized['symbol'],
            'topic' => $normalized['topic'],
        ]);

        $hook = $this->generateShortFormHook($normalized + ['summary' => $summary, 'keywords' => $keywords, 'video_type' => $videoType], $template);
        $bodyParts = $this->buildNarrativeParts($normalized, $summary, $keywords, $hook);
        $cta = $this->generateCtaText($normalized, $videoType, $keywords);
        $caption = $this->generateCaption($normalized + ['summary' => $summary, 'hook' => $hook, 'cta' => $cta], $template);
        $hashtags = $this->generateHashtags($normalized + ['keywords' => $keywords, 'video_type' => $videoType]);
        $voiceover = $this->generateVoiceoverScript($normalized + $bodyParts + ['hook' => $hook, 'cta' => $cta]);
        $scenePlan = $this->generateScenePlan($normalized + $bodyParts + ['hook' => $hook]);
        $overlay = $this->generateOverlayText($normalized + $bodyParts + ['hook' => $hook]);
        $thumbnail = $this->generateThumbnailText($normalized + ['hook' => $hook, 'summary' => $summary]);
        $assets = $this->generateAssetPlan($normalized, $keywords, $scenePlan);
        $adaptations = $this->buildPlatformAdaptationPayload($normalized, $hook, $caption, $voiceover, $hashtags, $cta);

        return [
            'source_type' => $normalized['content_source_type'],
            'source_id' => $normalized['source_id'],
            'platform' => $normalized['target_platform'],
            'video_type' => $videoType,
            'content_category' => $normalized['niche_category'],
            'topic' => $normalized['topic'] ?: ($sourcePayload['title'] ?? 'Untitled topic'),
            'symbol' => $normalized['symbol'],
            'title' => $this->generateTitle($normalized, $videoType, $hook),
            'hook' => $hook,
            'intro_text' => $bodyParts['context'],
            'body_text' => implode("\n\n", [$bodyParts['context'], $bodyParts['insight'], $bodyParts['takeaway']]),
            'insight_text' => $bodyParts['insight'],
            'cta_text' => $cta,
            'caption' => $caption,
            'hashtags' => implode(' ', $hashtags),
            'voiceover_script' => $voiceover,
            'overlay_text_json' => json_encode($overlay, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            'scene_plan_json' => json_encode($scenePlan, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            'asset_plan_json' => json_encode($assets, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            'platform_adaptations_json' => json_encode($adaptations, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            'thumbnail_text' => $thumbnail,
            'promo_link' => $normalized['promo_link'],
            'audience' => $normalized['target_audience'],
            'tone' => $normalized['tone'],
            'duration_target' => $normalized['duration_target'],
            'target_publish_window' => $normalized['target_publish_window'],
            'creator_editor' => $normalized['creator_editor'],
            'status' => 'Generated',
            'debug_meta' => [
                'summary' => $summary,
                'keywords' => $keywords,
                'template' => $template['template_name'] ?? null,
            ],
        ];
    }

    public function generateTikTokVideo(array $input): array
    {
        $input['target_platform'] = $input['target_platform'] ?? 'tiktok';
        return $this->generateVideoContent($input);
    }

    public function generateShortFormHook(array $input, ?array $template = null): string
    {
        $subject = trim((string) ($input['topic'] ?? $input['summary'] ?? 'market update'));
        $symbol = trim((string) ($input['symbol'] ?? ''));
        $lead = $symbol !== '' ? $symbol . ': ' : '';

        if ($template && ! empty($template['hook_template'])) {
            return $this->renderTemplateString($template['hook_template'], [
                'symbol' => $symbol,
                'topic' => $subject,
                'summary' => (string) ($input['summary'] ?? ''),
            ]);
        }

        return trim($lead . match ((string) ($input['video_type'] ?? '')) {
            'breakout_alert_video', 'trade_alert_explainer' => 'This breakout setup could change your watchlist today.',
            'crypto_update_short' => 'Crypto just gave traders a fresh clue.',
            'budgeting_tip', 'retirement_tip', 'beginner_explainer' => 'Most people miss this simple money move.',
            'community_promo', 'discord_community_promo' => 'If you want smarter market updates, watch this.',
            default => 'Here\'s the market move everyone is about to talk about.',
        });
    }

    public function generateCaption(array $input, ?array $template = null): string
    {
        $caption = trim((string) ($input['hook'] ?? '')) . ' ' . trim((string) ($input['summary'] ?? ''));
        $cta = trim((string) ($input['cta'] ?? ''));
        if ($template && ! empty($template['caption_template'])) {
            return trim($this->renderTemplateString($template['caption_template'], [
                'hook' => (string) ($input['hook'] ?? ''),
                'summary' => (string) ($input['summary'] ?? ''),
                'cta' => $cta,
                'symbol' => (string) ($input['symbol'] ?? ''),
            ]));
        }

        return trim($caption . ' ' . $cta);
    }

    public function generateHashtags(array $input): array
    {
        $keywords = $input['keywords'] ?? [];
        $base = ['tiktokfinance', 'mymiwallet', 'stocktok'];
        if (($input['target_platform'] ?? '') === 'youtube_shorts') {
            $base = ['youtubeshorts', 'financetok', 'mymiwallet'];
        }
        foreach ((array) $keywords as $keyword) {
            $keyword = strtolower(preg_replace('/[^a-z0-9]+/i', '', (string) $keyword));
            if ($keyword !== '') {
                $base[] = $keyword;
            }
        }
        if (! empty($input['symbol'])) {
            $base[] = strtolower((string) $input['symbol']);
        }

        $formatted = array_map(static fn (string $tag): string => '#' . ltrim($tag, '#'), array_values(array_unique($base)));
        return array_slice($formatted, 0, 10);
    }

    public function generateVoiceoverScript(array $input): string
    {
        return trim(implode("\n\n", array_filter([
            $input['hook'] ?? null,
            $input['context'] ?? null,
            $input['insight'] ?? null,
            $input['takeaway'] ?? null,
            $input['cta'] ?? null,
        ])));
    }

    public function generateScenePlan(array $input): array
    {
        $hook = (string) ($input['hook'] ?? 'Watch this market update');
        $context = (string) ($input['context'] ?? 'Quick context for the move.');
        $insight = (string) ($input['insight'] ?? 'Why the move matters.');
        $takeaway = (string) ($input['takeaway'] ?? 'What to do next.');
        $symbol = (string) ($input['symbol'] ?? 'market');

        return [
            ['scene' => 1, 'duration' => '0-2s', 'text' => $hook, 'visual' => 'bold animated hook text', 'asset_type' => 'text_overlay'],
            ['scene' => 2, 'duration' => '2-6s', 'text' => $context, 'visual' => 'headline card + market source snippet', 'asset_type' => 'source_clip'],
            ['scene' => 3, 'duration' => '6-11s', 'text' => $insight, 'visual' => 'chart zoom with ' . $symbol . ' highlights', 'asset_type' => 'chart'],
            ['scene' => 4, 'duration' => '11-15s', 'text' => $takeaway, 'visual' => 'callout bullets and CTA banner', 'asset_type' => 'broll'],
        ];
    }

    public function generateOverlayText(array $input): array
    {
        return array_values(array_filter([
            ['text' => (string) ($input['hook'] ?? ''), 'style' => 'hook'],
            ['text' => (string) ($input['context'] ?? ''), 'style' => 'context'],
            ['text' => (string) ($input['insight'] ?? ''), 'style' => 'insight'],
            ['text' => (string) ($input['takeaway'] ?? ''), 'style' => 'takeaway'],
        ], static fn (array $row): bool => trim($row['text']) !== ''));
    }

    public function generateThumbnailText(array $input): string
    {
        $symbol = trim((string) ($input['symbol'] ?? ''));
        $hook = trim((string) ($input['hook'] ?? 'Market update'));
        return substr(trim(($symbol !== '' ? $symbol . ' ' : '') . $hook), 0, 80);
    }

    public function generatePlatformAdaptations(int $contentId): array
    {
        $content = $this->getVideoContentWithRelations($contentId);
        if (! $content) {
            throw new RuntimeException('Invalid content ID.');
        }

        $hashtags = $this->decodeFlexibleJson($content['hashtags'] ?? '') ?: preg_split('/\s+/', trim((string) ($content['hashtags'] ?? '')));
        $adaptations = $this->buildPlatformAdaptationPayload([
            'target_platform' => $content['platform'],
            'symbol' => $content['symbol'],
            'topic' => $content['topic'],
            'tone' => $content['tone'],
            'target_audience' => $content['audience'],
        ], (string) $content['hook'], (string) $content['caption'], (string) $content['voiceover_script'], (array) $hashtags, (string) $content['cta_text']);

        $this->contentModel->update($contentId, [
            'platform_adaptations_json' => json_encode($adaptations, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
        ]);

        return $adaptations;
    }

    public function saveGeneratedVideoContent(array $data): array
    {
        $payload = $this->preparePersistableContent($data);
        $db = Database::connect();
        $db->transStart();

        $id = isset($data['id']) ? (int) $data['id'] : 0;
        if ($id > 0) {
            $existing = $this->contentModel->find($id);
            if (! $existing) {
                throw new RuntimeException('Invalid content ID.');
            }
            $this->versionModel->insert([
                'video_content_id' => $id,
                'version_data_json' => json_encode($existing, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
                'edited_by' => $data['generated_by'] ?? null,
                'edit_note' => $data['edit_note'] ?? 'Updated from content studio',
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            $this->contentModel->update($id, $payload);
        } else {
            $this->contentModel->insert($payload);
            $id = (int) $this->contentModel->getInsertID();
        }

        $this->replaceAssets($id, $data['assets'] ?? $this->decodeFlexibleJson($payload['asset_plan_json'] ?? '[]'));
        $db->transComplete();

        if (! $db->transStatus()) {
            log_message('error', 'MarketingVideoService saveGeneratedVideoContent failed', ['title' => $payload['title'] ?? null]);
            throw new RuntimeException('Failed to save video content.');
        }

        log_message('info', 'MarketingVideoService saved content', ['generated_content_id' => $id, 'platform' => $payload['platform']]);
        return $this->getVideoContentWithRelations($id) ?? [];
    }

    public function updateVideoContent(int $id, array $data): array
    {
        $data['id'] = $id;
        return $this->saveGeneratedVideoContent($data);
    }

    public function cloneVideoContent(int $id): array
    {
        $content = $this->getVideoContentWithRelations($id);
        if (! $content) {
            throw new RuntimeException('Invalid content ID.');
        }

        unset($content['id']);
        $content['title'] = trim((string) $content['title']) . ' (Copy)';
        $content['status'] = 'Draft';
        $content['generated_by'] = $content['generated_by'] ?? null;

        return $this->saveGeneratedVideoContent($content);
    }

    public function approveVideoContent(int $id, int $userId): array
    {
        return $this->transitionStatus($id, 'Approved', $userId);
    }

    public function archiveVideoContent(int $id): array
    {
        return $this->transitionStatus($id, 'Archived', null);
    }

    public function buildFromScrapedSource(int $sourceId, array $options = []): array
    {
        return $this->generateVideoContent($options + [
            'content_source_type' => 'marketing_scraper',
            'source_id' => $sourceId,
        ]);
    }

    public function buildFromTicker(string $symbol, array $options = []): array
    {
        return $this->generateVideoContent($options + [
            'content_source_type' => 'ticker',
            'symbol' => strtoupper($symbol),
            'topic' => $options['topic'] ?? strtoupper($symbol) . ' market update',
        ]);
    }

    public function buildFromTopic(string $topic, array $options = []): array
    {
        return $this->generateVideoContent($options + [
            'content_source_type' => 'manual_topic',
            'topic' => $topic,
        ]);
    }

    public function exportVideoPackage(int $id): array
    {
        $content = $this->getVideoContentWithRelations($id);
        if (! $content) {
            throw new RuntimeException('Invalid content ID.');
        }

        $plainText = implode("\n", [
            'TITLE: ' . $content['title'],
            'PLATFORM: ' . $content['platform'],
            'VIDEO TYPE: ' . $content['video_type'],
            'HOOK: ' . $content['hook'],
            'INTRO: ' . $content['intro_text'],
            'BODY: ' . $content['body_text'],
            'CTA: ' . $content['cta_text'],
            'CAPTION: ' . $content['caption'],
            'HASHTAGS: ' . $content['hashtags'],
            'VOICEOVER: ' . $content['voiceover_script'],
            'THUMBNAIL: ' . $content['thumbnail_text'],
        ]);

        return [
            'id' => $id,
            'json' => $content,
            'plain_text' => $plainText,
            'csv_row' => [
                'id' => $id,
                'title' => $content['title'],
                'platform' => $content['platform'],
                'video_type' => $content['video_type'],
                'status' => $content['status'],
                'publish_window' => $content['target_publish_window'],
            ],
            'capcut_json' => [
                'title' => $content['title'],
                'voiceover_script' => $content['voiceover_script'],
                'scenes' => $this->decodeFlexibleJson($content['scene_plan_json'] ?? '[]'),
                'overlays' => $this->decodeFlexibleJson($content['overlay_text_json'] ?? '[]'),
                'assets' => $content['assets'],
            ],
        ];
    }

    public function getVideoContentWithRelations(int $id): ?array
    {
        $content = $this->contentModel->find($id);
        if (! $content) {
            return null;
        }
        $content['assets'] = $this->assetModel->forContent($id);
        $content['versions'] = $this->versionModel->where('video_content_id', $id)->orderBy('id', 'DESC')->findAll(20);
        return $content;
    }

    public function getQueue(array $filters = [], int $limit = 50): array
    {
        return $this->contentModel->getQueue($filters, $limit);
    }

    public function getTemplates(?string $platform = null): array
    {
        return $this->templateModel->activeForPlatform($platform);
    }

    public function saveTemplate(array $data): array
    {
        $payload = [
            'template_name' => trim((string) ($data['template_name'] ?? '')),
            'platform' => strtolower(trim((string) ($data['platform'] ?? 'tiktok'))),
            'video_type' => $this->slug((string) ($data['video_type'] ?? 'generic_short')),
            'hook_template' => trim((string) ($data['hook_template'] ?? '')),
            'body_template' => trim((string) ($data['body_template'] ?? '')),
            'cta_template' => trim((string) ($data['cta_template'] ?? '')),
            'caption_template' => trim((string) ($data['caption_template'] ?? '')),
            'overlay_template_json' => $this->encodeJsonField($data['overlay_template_json'] ?? $data['overlay_template'] ?? []),
            'scene_template_json' => $this->encodeJsonField($data['scene_template_json'] ?? $data['scene_template'] ?? []),
            'meta_json' => $this->encodeJsonField($data['meta_json'] ?? $data['meta'] ?? []),
            'is_active' => (int) ($data['is_active'] ?? 1),
        ];

        if ($payload['template_name'] === '' || $payload['video_type'] === '') {
            throw new RuntimeException('template_name and video_type are required.');
        }

        if (! empty($data['id'])) {
            $this->templateModel->update((int) $data['id'], $payload);
            return $this->templateModel->find((int) $data['id']) ?? [];
        }

        $this->templateModel->insert($payload);
        return $this->templateModel->find($this->templateModel->getInsertID()) ?? [];
    }

    public function deleteTemplate(int $id): bool
    {
        return $this->templateModel->delete($id);
    }

    public function queueForPublish(int $contentId, ?string $platform = null, ?string $scheduledFor = null): array
    {
        $content = $this->getVideoContentWithRelations($contentId);
        if (! $content) {
            throw new RuntimeException('Invalid content ID.');
        }

        $platform = $platform ?: (string) $content['platform'];
        $payload = $this->exportVideoPackage($contentId);
        $this->publishQueueModel->insert([
            'video_content_id' => $contentId,
            'platform' => $platform,
            'payload_json' => json_encode($payload['json'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            'scheduled_for' => $scheduledFor,
            'status' => 'queued',
        ]);

        if ($scheduledFor) {
            $this->contentModel->update($contentId, ['status' => 'Scheduled', 'scheduled_for' => $scheduledFor]);
        }

        return $this->publishQueueModel->find($this->publishQueueModel->getInsertID()) ?? [];
    }

    private function normalizeInput(array $input): array
    {
        return [
            'content_source_type' => strtolower(trim((string) ($input['content_source_type'] ?? $input['source_type'] ?? 'manual_topic'))),
            'source_id' => isset($input['source_id']) ? (int) $input['source_id'] : null,
            'symbol' => strtoupper(trim((string) ($input['symbol'] ?? $input['ticker'] ?? ''))),
            'topic' => trim((string) ($input['topic'] ?? '')),
            'niche_category' => trim((string) ($input['niche_category'] ?? $input['content_category'] ?? 'finance_news')),
            'target_platform' => strtolower(trim((string) ($input['target_platform'] ?? $input['platform'] ?? 'tiktok'))),
            'target_audience' => trim((string) ($input['target_audience'] ?? $input['audience'] ?? 'retail investors')),
            'tone' => trim((string) ($input['tone'] ?? 'confident')),
            'cta_objective' => trim((string) ($input['cta_objective'] ?? 'drive engagement')),
            'video_type' => $this->slug((string) ($input['video_type'] ?? '')),
            'duration_target' => trim((string) ($input['duration_target'] ?? '15-30s')),
            'promo_link' => trim((string) ($input['promo_link'] ?? $input['optional_promotional_link'] ?? '')),
            'notes' => trim((string) ($input['notes'] ?? $input['optional_notes'] ?? $input['manual_text'] ?? '')),
            'target_publish_window' => trim((string) ($input['target_publish_window'] ?? 'Weekday 11AM-2PM ET')),
            'creator_editor' => trim((string) ($input['creator_editor'] ?? 'Marketing Team')),
            'generated_by' => isset($input['generated_by']) ? (int) $input['generated_by'] : null,
        ];
    }

    private function resolveSourceContent(array $input): array
    {
        $fallbackContent = $input['notes'] ?: ($input['topic'] ?: 'Market update');
        $payload = ['title' => $input['topic'], 'content' => $fallbackContent];

        if (($input['content_source_type'] ?? '') === 'marketing_scraper' && ! empty($input['source_id'])) {
            $record = $this->marketingModel->find((int) $input['source_id']);
            if ($record) {
                return [
                    'title' => $record['title'] ?? $input['topic'],
                    'content' => $record['summary'] ?? $record['content'] ?? $fallbackContent,
                    'record' => $record,
                ];
            }
            log_message('error', 'MarketingVideoService source fetch failure', ['source_id' => $input['source_id']]);
        }

        if ($input['symbol'] !== '' && $input['topic'] === '') {
            $payload['title'] = $input['symbol'] . ' market update';
        }

        return $payload;
    }

    private function sanitizeSourceText(string $content): string
    {
        $clean = $this->marketingModel->cleanHtmlEmailContent($content);
        $clean = preg_replace('/\s+/', ' ', strip_tags($clean));
        $clean = trim((string) $clean);

        if ($clean === '') {
            log_message('error', 'MarketingVideoService summary failure: empty sanitized content');
            throw new RuntimeException('Missing source content.');
        }

        return mb_substr($clean, 0, 2000);
    }

    private function buildSummary(string $text, array $input): string
    {
        try {
            if ($this->marketingLibrary instanceof MyMIMarketing && method_exists($this->marketingLibrary, 'summarizeText')) {
                $summary = trim((string) $this->marketingLibrary->summarizeText($text));
                if ($summary !== '') {
                    return mb_substr($summary, 0, 500);
                }
            }
        } catch (Throwable $e) {
            log_message('error', 'MarketingVideoService summary failure: ' . $e->getMessage());
        }

        $pieces = preg_split('/(?<=[.!?])\s+/', $text) ?: [$text];
        $seed = implode(' ', array_slice($pieces, 0, 2));
        return trim($seed !== '' ? $seed : ($input['topic'] ?: $text));
    }

    private function extractKeywords(string $text): array
    {
        try {
            $keywords = $this->marketingModel->extractKeywords($text);
            if (is_array($keywords) && $keywords !== []) {
                return array_slice(array_values(array_unique(array_map('strtolower', $keywords))), 0, 8);
            }
        } catch (Throwable $e) {
            log_message('error', 'MarketingVideoService keyword extraction failure: ' . $e->getMessage());
        }

        preg_match_all('/\b[A-Za-z]{4,}\b/', strtolower($text), $matches);
        return array_slice(array_values(array_unique($matches[0] ?? [])), 0, 8);
    }

    private function determineVideoType(array $input, array $keywords, string $summary): string
    {
        $topic = strtolower($input['topic'] . ' ' . $summary . ' ' . implode(' ', $keywords));
        return match (true) {
            str_contains($topic, 'breakout') || str_contains($topic, 'alert') => 'breakout_alert_video',
            str_contains($topic, 'crypto') || str_contains($topic, 'bitcoin') => 'crypto_update_short',
            str_contains($topic, 'budget') => 'budgeting_tip',
            str_contains($topic, 'retire') => 'retirement_tip',
            str_contains($topic, 'discord') || str_contains($topic, 'community') => 'discord_community_promo',
            str_contains($topic, 'faq') => 'faq_style_response_short',
            str_contains($topic, 'beginner') => 'beginner_explainer',
            default => 'fast_hook_stock_update',
        };
    }

    private function resolveTemplate(string $platform, string $videoType): ?array
    {
        try {
            $template = $this->templateModel
                ->where('platform', $platform)
                ->where('video_type', $videoType)
                ->where('is_active', 1)
                ->first();

            if ($template) {
                log_message('debug', 'MarketingVideoService selected template', ['template' => $template['template_name']]);
                return $template;
            }

            return $this->templateModel->where('platform', $platform)->where('is_active', 1)->first();
        } catch (Throwable $e) {
            log_message('error', 'MarketingVideoService template resolution failure: ' . $e->getMessage());
            foreach ($this->defaultTemplates() as $template) {
                if ($template['platform'] === $platform && $template['video_type'] === $videoType) {
                    return $template;
                }
            }
            foreach ($this->defaultTemplates() as $template) {
                if ($template['platform'] === $platform) {
                    return $template;
                }
            }
            return null;
        }
    }

    private function buildNarrativeParts(array $input, string $summary, array $keywords, string $hook): array
    {
        $context = $summary;
        $insight = match ($input['video_type'] ?: $this->determineVideoType($input, $keywords, $summary)) {
            'breakout_alert_video' => 'Momentum, volume, and trader attention are lining up at the same time.',
            'crypto_update_short' => 'Crypto sentiment is rotating fast, so volatility matters more than headlines alone.',
            'budgeting_tip', 'retirement_tip' => 'A small system change today can create repeatable gains over time.',
            'discord_community_promo' => 'The value comes from faster context, shared watchlists, and timely alerts.',
            default => 'The move matters because traders care about the reason behind the price action, not just the candle.',
        };
        $takeaway = 'Watch the next catalyst, confirm the trend, and decide whether this fits your plan.';
        if ($input['promo_link'] !== '') {
            $takeaway .= ' Save the link so you can act when the setup confirms.';
        }

        return [
            'hook' => $hook,
            'context' => $context,
            'insight' => $insight,
            'takeaway' => $takeaway,
            'cta' => $this->generateCtaText($input, $input['video_type'] ?: 'fast_hook_stock_update', $keywords),
        ];
    }

    private function generateCtaText(array $input, string $videoType, array $keywords): string
    {
        $objective = strtolower((string) ($input['cta_objective'] ?? 'drive engagement'));
        return match (true) {
            str_contains($objective, 'discord') || $videoType === 'discord_community_promo' => 'Join the MyMI Wallet Discord for the full breakdown and live alerts.',
            str_contains($objective, 'signup'), str_contains($objective, 'referral') => 'Use the link to sign up and grab the next market-ready update.',
            str_contains($objective, 'membership') => 'Tap the promo link to unlock the premium tools behind this workflow.',
            in_array('budget', $keywords, true) => 'Follow for more budgeting systems you can use this week.',
            default => 'Follow MyMI Wallet for more fast market breakdowns and actionable finance shorts.',
        };
    }

    private function generateTitle(array $input, string $videoType, string $hook): string
    {
        $topic = $input['topic'] ?: ($input['symbol'] ?: 'Market Update');
        $prefix = ucwords(str_replace('_', ' ', $videoType));
        return substr(trim($prefix . ': ' . $topic . ' — ' . $hook), 0, 255);
    }

    private function generateAssetPlan(array $input, array $keywords, array $scenePlan): array
    {
        $assets = [
            ['asset_type' => 'chart', 'asset_label' => ($input['symbol'] ?: 'market') . ' chart screenshot', 'sort_order' => 1],
            ['asset_type' => 'broll', 'asset_label' => 'Financial news B-roll', 'sort_order' => 2],
            ['asset_type' => 'logo', 'asset_label' => 'MyMI Wallet logo / CTA lockup', 'sort_order' => 3],
        ];

        foreach ($scenePlan as $index => $scene) {
            $assets[] = [
                'asset_type' => $scene['asset_type'] ?? 'visual',
                'asset_label' => ($scene['visual'] ?? 'scene asset') . ' (' . (($keywords[$index] ?? 'general')) . ')',
                'sort_order' => $index + 10,
            ];
        }

        return $assets;
    }

    private function buildPlatformAdaptationPayload(array $input, string $hook, string $caption, string $voiceover, array $hashtags, string $cta): array
    {
        $baseCaption = trim($caption . ' ' . implode(' ', $hashtags));
        return [
            'tiktok' => ['caption' => $baseCaption, 'voiceover' => $voiceover],
            'youtube_shorts' => ['caption' => substr($baseCaption, 0, 180), 'script' => $voiceover],
            'instagram_reels' => ['caption' => substr($baseCaption, 0, 220), 'script' => $voiceover],
            'facebook_reels' => ['caption' => substr($baseCaption, 0, 220), 'script' => $voiceover],
            'linkedin_video' => ['caption' => $hook . ' ' . $cta, 'script' => $voiceover],
            'discord_teaser' => ['message' => $hook . ' ' . $cta],
            'x_teaser' => ['message' => substr($hook . ' ' . $cta, 0, 240)],
        ];
    }

    private function transitionStatus(int $id, string $status, ?int $userId): array
    {
        if (! in_array($status, self::VALID_STATUSES, true)) {
            throw new RuntimeException('Invalid status transition.');
        }

        $content = $this->contentModel->find($id);
        if (! $content) {
            throw new RuntimeException('Invalid content ID.');
        }

        $data = ['status' => $status];
        if ($status === 'Approved') {
            $data['approved_by'] = $userId;
        }
        if ($status === 'Archived') {
            $data['deleted_at'] = null;
        }

        $this->contentModel->update($id, $data);
        log_message('info', 'MarketingVideoService approval/archive action', ['id' => $id, 'status' => $status]);
        return $this->getVideoContentWithRelations($id) ?? [];
    }

    private function preparePersistableContent(array $data): array
    {
        $status = (string) ($data['status'] ?? 'Draft');
        if (! in_array($status, self::VALID_STATUSES, true)) {
            throw new RuntimeException('Invalid status value.');
        }

        $payload = [
            'source_type' => $data['source_type'] ?? $data['content_source_type'] ?? null,
            'source_id' => isset($data['source_id']) ? (int) $data['source_id'] : null,
            'platform' => strtolower((string) ($data['platform'] ?? $data['target_platform'] ?? 'tiktok')),
            'video_type' => $this->slug((string) ($data['video_type'] ?? 'fast_hook_stock_update')),
            'content_category' => $data['content_category'] ?? $data['niche_category'] ?? null,
            'topic' => trim((string) ($data['topic'] ?? '')),
            'symbol' => strtoupper(trim((string) ($data['symbol'] ?? ''))),
            'title' => trim((string) ($data['title'] ?? 'Untitled Video Content')),
            'hook' => trim((string) ($data['hook'] ?? '')),
            'intro_text' => trim((string) ($data['intro_text'] ?? '')),
            'body_text' => trim((string) ($data['body_text'] ?? '')),
            'insight_text' => trim((string) ($data['insight_text'] ?? '')),
            'cta_text' => trim((string) ($data['cta_text'] ?? '')),
            'caption' => trim((string) ($data['caption'] ?? '')),
            'hashtags' => is_array($data['hashtags'] ?? null) ? implode(' ', $data['hashtags']) : trim((string) ($data['hashtags'] ?? '')),
            'voiceover_script' => trim((string) ($data['voiceover_script'] ?? '')),
            'overlay_text_json' => $this->encodeJsonField($data['overlay_text_json'] ?? $data['overlay_text'] ?? []),
            'scene_plan_json' => $this->encodeJsonField($data['scene_plan_json'] ?? $data['scene_plan'] ?? []),
            'asset_plan_json' => $this->encodeJsonField($data['asset_plan_json'] ?? $data['asset_plan'] ?? $data['assets'] ?? []),
            'platform_adaptations_json' => $this->encodeJsonField($data['platform_adaptations_json'] ?? $data['platform_adaptations'] ?? []),
            'thumbnail_text' => trim((string) ($data['thumbnail_text'] ?? '')),
            'promo_link' => trim((string) ($data['promo_link'] ?? '')),
            'audience' => trim((string) ($data['audience'] ?? $data['target_audience'] ?? '')),
            'tone' => trim((string) ($data['tone'] ?? '')),
            'duration_target' => trim((string) ($data['duration_target'] ?? '')),
            'target_publish_window' => trim((string) ($data['target_publish_window'] ?? '')),
            'creator_editor' => trim((string) ($data['creator_editor'] ?? '')),
            'status' => $status,
            'generated_by' => isset($data['generated_by']) ? (int) $data['generated_by'] : null,
            'approved_by' => isset($data['approved_by']) ? (int) $data['approved_by'] : null,
            'scheduled_for' => $data['scheduled_for'] ?? null,
            'posted_at' => $data['posted_at'] ?? null,
        ];

        if ($payload['topic'] === '' && $payload['symbol'] === '') {
            throw new RuntimeException('Missing symbol/topic.');
        }

        return $payload;
    }

    private function replaceAssets(int $contentId, mixed $assets): void
    {
        $rows = is_array($assets) ? $assets : $this->decodeFlexibleJson((string) $assets);
        $rows = is_array($rows) ? $rows : [];
        $this->assetModel->where('video_content_id', $contentId)->delete();
        foreach ($rows as $index => $asset) {
            if (! is_array($asset)) {
                continue;
            }
            $this->assetModel->insert([
                'video_content_id' => $contentId,
                'asset_type' => $asset['asset_type'] ?? 'reference',
                'asset_path' => $asset['asset_path'] ?? null,
                'asset_url' => $asset['asset_url'] ?? null,
                'asset_label' => $asset['asset_label'] ?? ($asset['label'] ?? 'Asset ' . ($index + 1)),
                'sort_order' => (int) ($asset['sort_order'] ?? $index),
            ]);
        }
    }

    private function encodeJsonField(mixed $value): string
    {
        if (is_string($value)) {
            $decoded = json_decode($value, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                return json_encode($decoded, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?: '[]';
            }
            return json_encode([$value], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?: '[]';
        }

        return json_encode($value, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?: '[]';
    }

    private function decodeFlexibleJson(string $value): mixed
    {
        $value = trim($value);
        if ($value === '') {
            return [];
        }
        $decoded = json_decode($value, true);
        return json_last_error() === JSON_ERROR_NONE ? $decoded : [];
    }

    private function renderTemplateString(string $template, array $data): string
    {
        $replacements = [];
        foreach ($data as $key => $value) {
            $replacements['{' . $key . '}'] = (string) $value;
        }
        return strtr($template, $replacements);
    }

    private function slug(string $value): string
    {
        $value = strtolower(trim($value));
        $value = preg_replace('/[^a-z0-9]+/', '_', $value) ?? '';
        return trim($value, '_');
    }

    private function defaultTemplates(): array
    {
        $sceneTemplate = json_encode([
            ['scene' => 1, 'duration' => '0-2s', 'text' => '{hook}', 'visual' => 'Hook card', 'asset_type' => 'text_overlay'],
            ['scene' => 2, 'duration' => '2-5s', 'text' => '{summary}', 'visual' => 'Context visual', 'asset_type' => 'source_clip'],
            ['scene' => 3, 'duration' => '5-10s', 'text' => '{cta}', 'visual' => 'CTA panel', 'asset_type' => 'cta'],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        $overlayTemplate = json_encode([
            ['text' => '{hook}', 'style' => 'hook'],
            ['text' => '{summary}', 'style' => 'summary'],
            ['text' => '{cta}', 'style' => 'cta'],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        $meta = fn (string $ctaStyle, string $tone, string $duration, array $hashtags): string => json_encode([
            'cta_style' => $ctaStyle,
            'preferred_tone' => $tone,
            'recommended_duration' => $duration,
            'hashtag_groups' => $hashtags,
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        return [
            ['template_name' => 'Stock Breakout Alert', 'platform' => 'tiktok', 'video_type' => 'breakout_alert_video', 'hook_template' => '{symbol} just flashed a breakout setup.', 'body_template' => 'Quick context: {summary}', 'cta_template' => 'Follow for the next setup.', 'caption_template' => '{hook} {summary} {cta}', 'overlay_template_json' => $overlayTemplate, 'scene_template_json' => $sceneTemplate, 'meta_json' => $meta('urgency', 'bold', '15-30s', ['stocks', 'alerts']), 'is_active' => 1],
            ['template_name' => 'Weekly Top Movers', 'platform' => 'tiktok', 'video_type' => 'top_movers_recap', 'hook_template' => 'These names led the tape this week.', 'body_template' => '{summary}', 'cta_template' => 'Save this recap for next week.', 'caption_template' => '{hook} {summary} {cta}', 'overlay_template_json' => $overlayTemplate, 'scene_template_json' => $sceneTemplate, 'meta_json' => $meta('save', 'fast', '20-35s', ['recap', 'movers']), 'is_active' => 1],
            ['template_name' => 'Why This Stock Moved', 'platform' => 'tiktok', 'video_type' => 'news_reaction_why_it_moved', 'hook_template' => 'Why did {symbol} move today?', 'body_template' => '{summary}', 'cta_template' => 'Comment the next ticker you want covered.', 'caption_template' => '{hook} {summary} {cta}', 'overlay_template_json' => $overlayTemplate, 'scene_template_json' => $sceneTemplate, 'meta_json' => $meta('comment', 'newsroom', '15-30s', ['news', 'stocks']), 'is_active' => 1],
            ['template_name' => 'Crypto Rally Update', 'platform' => 'tiktok', 'video_type' => 'crypto_update_short', 'hook_template' => 'Crypto just gave traders another signal.', 'body_template' => '{summary}', 'cta_template' => 'Follow for the next crypto pulse.', 'caption_template' => '{hook} {summary} {cta}', 'overlay_template_json' => $overlayTemplate, 'scene_template_json' => $sceneTemplate, 'meta_json' => $meta('follow', 'energetic', '15-25s', ['crypto', 'momentum']), 'is_active' => 1],
            ['template_name' => 'Budgeting Tip', 'platform' => 'tiktok', 'video_type' => 'budgeting_tip', 'hook_template' => 'Use this budgeting move this week.', 'body_template' => '{summary}', 'cta_template' => 'Try it in MyMI Wallet today.', 'caption_template' => '{hook} {summary} {cta}', 'overlay_template_json' => $overlayTemplate, 'scene_template_json' => $sceneTemplate, 'meta_json' => $meta('product', 'helpful', '20-30s', ['budgeting', 'tips']), 'is_active' => 1],
            ['template_name' => 'Retirement Tip', 'platform' => 'tiktok', 'video_type' => 'retirement_tip', 'hook_template' => 'One retirement habit worth starting now.', 'body_template' => '{summary}', 'cta_template' => 'Follow for more long-term money systems.', 'caption_template' => '{hook} {summary} {cta}', 'overlay_template_json' => $overlayTemplate, 'scene_template_json' => $sceneTemplate, 'meta_json' => $meta('follow', 'steady', '20-35s', ['retirement', 'planning']), 'is_active' => 1],
            ['template_name' => 'Finance FAQ', 'platform' => 'tiktok', 'video_type' => 'faq_style_response_short', 'hook_template' => 'Quick answer to a common finance question.', 'body_template' => '{summary}', 'cta_template' => 'Drop your next question below.', 'caption_template' => '{hook} {summary} {cta}', 'overlay_template_json' => $overlayTemplate, 'scene_template_json' => $sceneTemplate, 'meta_json' => $meta('comment', 'friendly', '15-25s', ['faq', 'finance']), 'is_active' => 1],
            ['template_name' => 'MyMI Wallet Promo', 'platform' => 'tiktok', 'video_type' => 'product_service_promo_video_for_mymi_wallet', 'hook_template' => 'This is how MyMI Wallet simplifies your finance workflow.', 'body_template' => '{summary}', 'cta_template' => 'Tap the link to start free.', 'caption_template' => '{hook} {summary} {cta}', 'overlay_template_json' => $overlayTemplate, 'scene_template_json' => $sceneTemplate, 'meta_json' => $meta('signup', 'product', '20-30s', ['product', 'mymiwallet']), 'is_active' => 1],
            ['template_name' => 'Membership Discount Promo', 'platform' => 'tiktok', 'video_type' => 'membership_discount_promo', 'hook_template' => 'A faster way to get premium market context.', 'body_template' => '{summary}', 'cta_template' => 'Use the promo link before it closes.', 'caption_template' => '{hook} {summary} {cta}', 'overlay_template_json' => $overlayTemplate, 'scene_template_json' => $sceneTemplate, 'meta_json' => $meta('offer', 'promo', '15-25s', ['membership', 'promo']), 'is_active' => 1],
            ['template_name' => 'Free Tool Promo', 'platform' => 'tiktok', 'video_type' => 'free_tool_promo', 'hook_template' => 'Free tool, faster decisions.', 'body_template' => '{summary}', 'cta_template' => 'Try the free tool today.', 'caption_template' => '{hook} {summary} {cta}', 'overlay_template_json' => $overlayTemplate, 'scene_template_json' => $sceneTemplate, 'meta_json' => $meta('signup', 'promo', '15-25s', ['free', 'tool']), 'is_active' => 1],
            ['template_name' => 'Community Invite Promo', 'platform' => 'tiktok', 'video_type' => 'discord_community_promo', 'hook_template' => 'Want the full breakdown before the crowd?', 'body_template' => '{summary}', 'cta_template' => 'Join the community for live alerts.', 'caption_template' => '{hook} {summary} {cta}', 'overlay_template_json' => $overlayTemplate, 'scene_template_json' => $sceneTemplate, 'meta_json' => $meta('community', 'social', '15-20s', ['discord', 'community']), 'is_active' => 1],
            ['template_name' => 'Referral Reward Promo', 'platform' => 'tiktok', 'video_type' => 'referral_signup_promo', 'hook_template' => 'Share this and unlock referral rewards.', 'body_template' => '{summary}', 'cta_template' => 'Use your referral link today.', 'caption_template' => '{hook} {summary} {cta}', 'overlay_template_json' => $overlayTemplate, 'scene_template_json' => $sceneTemplate, 'meta_json' => $meta('referral', 'promo', '15-20s', ['referral', 'reward']), 'is_active' => 1],
            ['template_name' => 'Daily Market Recap', 'platform' => 'tiktok', 'video_type' => 'fast_hook_stock_update', 'hook_template' => 'Here is the market move that matters most today.', 'body_template' => '{summary}', 'cta_template' => 'Follow for tomorrow\'s recap.', 'caption_template' => '{hook} {summary} {cta}', 'overlay_template_json' => $overlayTemplate, 'scene_template_json' => $sceneTemplate, 'meta_json' => $meta('follow', 'newsroom', '15-25s', ['recap', 'markets']), 'is_active' => 1],
            ['template_name' => 'Beginner Investing Tip', 'platform' => 'tiktok', 'video_type' => 'beginner_explainer', 'hook_template' => 'New to investing? Start with this.', 'body_template' => '{summary}', 'cta_template' => 'Save this before your next trade.', 'caption_template' => '{hook} {summary} {cta}', 'overlay_template_json' => $overlayTemplate, 'scene_template_json' => $sceneTemplate, 'meta_json' => $meta('save', 'helpful', '20-35s', ['beginner', 'investing']), 'is_active' => 1],
            ['template_name' => 'Trade Alert Breakdown', 'platform' => 'tiktok', 'video_type' => 'trade_alert_explainer', 'hook_template' => 'This trade alert needs context fast.', 'body_template' => '{summary}', 'cta_template' => 'Comment if you want more alert breakdowns.', 'caption_template' => '{hook} {summary} {cta}', 'overlay_template_json' => $overlayTemplate, 'scene_template_json' => $sceneTemplate, 'meta_json' => $meta('comment', 'urgent', '15-25s', ['tradealert', 'breakdown']), 'is_active' => 1],
        ];
    }

    private function defaultDemoContent(): array
    {
        return [
            [
                'source_type' => 'manual_topic',
                'platform' => 'tiktok',
                'video_type' => 'fast_hook_stock_update',
                'content_category' => 'finance_news',
                'topic' => 'NVDA breakout watch',
                'symbol' => 'NVDA',
                'title' => 'Fast Hook Stock Update: NVDA breakout watch',
                'hook' => 'NVDA just flashed a move traders should not ignore.',
                'intro_text' => 'Volume and headline momentum are both picking up.',
                'body_text' => 'Context: momentum is building. Insight: traders want confirmation above resistance. Takeaway: keep the plan tight.',
                'insight_text' => 'The move matters because momentum and narrative are aligning.',
                'cta_text' => 'Follow MyMI Wallet for the next alert-ready update.',
                'caption' => 'NVDA breakout watch with a fast market-ready recap.',
                'hashtags' => '#nvda #stocktok #mymiwallet',
                'voiceover_script' => 'NVDA just flashed a move traders should not ignore. Volume and headline momentum are both picking up. Watch confirmation above resistance. Follow MyMI Wallet for more.',
                'overlay_text_json' => [['text' => 'NVDA Watch', 'style' => 'hook']],
                'scene_plan_json' => [['scene' => 1, 'duration' => '0-2s', 'text' => 'NVDA Watch', 'visual' => 'chart zoom', 'asset_type' => 'chart']],
                'asset_plan_json' => [['asset_type' => 'chart', 'asset_label' => 'NVDA chart', 'sort_order' => 1]],
                'platform_adaptations_json' => ['x_teaser' => ['message' => 'NVDA breakout watch.']],
                'thumbnail_text' => 'NVDA Breakout?',
                'audience' => 'retail investors',
                'tone' => 'confident',
                'duration_target' => '20s',
                'target_publish_window' => 'Weekday 12PM ET',
                'creator_editor' => 'Seed Fixture',
                'status' => 'Needs Review',
            ],
            [
                'source_type' => 'manual_topic',
                'platform' => 'tiktok',
                'video_type' => 'budgeting_tip',
                'content_category' => 'education',
                'topic' => 'Zero-based budget habit',
                'title' => 'Budgeting Tip: zero-based budget habit',
                'hook' => 'Most people never name every dollar before the month starts.',
                'intro_text' => 'A zero-based budget removes friction and surprise spending.',
                'body_text' => 'Context: every dollar gets a job. Insight: clarity lowers impulse spend. Takeaway: review it weekly.',
                'insight_text' => 'Consistency beats intensity when it comes to personal finance.',
                'cta_text' => 'Try it in MyMI Wallet today.',
                'caption' => 'A budgeting habit you can start this week.',
                'hashtags' => '#budgeting #moneytips #mymiwallet',
                'voiceover_script' => 'Most people never name every dollar before the month starts. A zero-based budget removes friction and surprise spending. Try it in MyMI Wallet today.',
                'overlay_text_json' => [['text' => 'Zero-Based Budget', 'style' => 'hook']],
                'scene_plan_json' => [['scene' => 1, 'duration' => '0-3s', 'text' => 'Zero-Based Budget', 'visual' => 'budget dashboard', 'asset_type' => 'app_ui']],
                'asset_plan_json' => [['asset_type' => 'app_ui', 'asset_label' => 'Budget dashboard screenshot', 'sort_order' => 1]],
                'platform_adaptations_json' => ['linkedin_video' => ['caption' => 'A budgeting habit your team can use.']],
                'thumbnail_text' => 'Budget Better',
                'audience' => 'budget-focused users',
                'tone' => 'helpful',
                'duration_target' => '25s',
                'target_publish_window' => 'Sunday 6PM ET',
                'creator_editor' => 'Seed Fixture',
                'status' => 'Ready to Record',
            ],
        ];
    }
}
