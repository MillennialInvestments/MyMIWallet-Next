<?php

namespace App\Services;

use App\Libraries\MyMIDiscord;
use App\Models\MarketingDistributionTargetModel;
use App\Models\MarketingModel;
use App\Services\Marketing\Distribution\BlueskyDistributionService;
use App\Services\Marketing\Distribution\LinkedInDistributionService;
use App\Services\Marketing\Distribution\MastodonDistributionService;
use App\Services\Marketing\Distribution\WebhookDistributionService;
use Config\Database;
use Config\MarketingDistribution;

class MarketingDistributionService
{
    private const PROCESSABLE_STATUSES = ['pending', 'queued', 'retrying'];

    public function __construct(
        private ?MarketingModel $marketingModel = null,
        private ?MarketingDistributionTargetModel $targetModel = null,
        private ?MarketingDistribution $distributionConfig = null,
        private ?BlueskyDistributionService $blueskyService = null,
        private ?MastodonDistributionService $mastodonService = null,
        private ?LinkedInDistributionService $linkedinService = null,
        private ?WebhookDistributionService $webhookService = null,
    ) {
        $this->marketingModel ??= new MarketingModel();
        $this->targetModel ??= new MarketingDistributionTargetModel();
        $this->distributionConfig ??= config('MarketingDistribution');
        $this->blueskyService ??= new BlueskyDistributionService($this->distributionConfig);
        $this->mastodonService ??= new MastodonDistributionService($this->distributionConfig);
        $this->linkedinService ??= new LinkedInDistributionService($this->distributionConfig);
        $this->webhookService ??= new WebhookDistributionService($this->distributionConfig);
    }

    public function queueDistribution(int $generatedContentId, array $destinations = []): array
    {
        $record = $this->fetchGeneratedContent($generatedContentId);
        if ($record === null) {
            return ['status' => 'error', 'message' => 'Generated content not found'];
        }

        if (! in_array((string) ($record['approval_status'] ?? ''), ['approved', 'auto_approved'], true)) {
            return ['status' => 'skipped', 'message' => 'Content not approved'];
        }

        $expanded = $this->ensureTargetsForRecord($record, $destinations);

        Database::connect()->table('bf_marketing_generated_content')->where('id', $generatedContentId)->update([
            'distribution_status' => 'scheduled',
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return ['status' => 'success', 'queued' => $expanded];
    }

    public function distributeGeneratedContent(array $record): array
    {
        $generatedContentId = (int) ($record['id'] ?? 0);
        if ($generatedContentId < 1) {
            return ['status' => 'failed', 'message' => 'Invalid generated content record'];
        }

        $this->ensureTargetsForRecord($record);

        $targets = $this->targetModel
            ->where('generated_content_id', $generatedContentId)
            ->whereIn('status', self::PROCESSABLE_STATUSES)
            ->findAll();

        $targetResults = [];
        foreach ($targets as $target) {
            $targetResults[] = $this->processTarget($target);
        }

        $aggregate = $this->updateGeneratedContentStatus($generatedContentId);

        return [
            'generated_content_id' => $generatedContentId,
            'targets_processed' => count($targetResults),
            'target_results' => $targetResults,
            'generated_content_status' => $aggregate,
        ];
    }

    public function ensureTargetsForContentId(int $generatedContentId): array
    {
        $record = $this->fetchGeneratedContent($generatedContentId);
        if ($record === null) {
            return ['created' => 0, 'existing' => 0, 'skipped' => 0];
        }

        return $this->ensureTargetsForRecord($record);
    }

    public function retryFailedTargets(?int $generatedContentId = null, int $limit = 25): array
    {
        $builder = $this->targetModel->builder()->where('status', 'failed');
        if ($generatedContentId !== null) {
            $builder->where('generated_content_id', $generatedContentId);
        }

        $rows = $builder->orderBy('id', 'ASC')->limit($limit)->get()->getResultArray();
        $results = [];

        foreach ($rows as $row) {
            if ((int) ($row['retry_count'] ?? 0) >= $this->distributionConfig->maxRetries) {
                $results[] = ['id' => (int) $row['id'], 'status' => 'skipped', 'reason' => 'max_retries_reached'];
                continue;
            }

            $this->targetModel->update((int) $row['id'], [
                'status' => 'retrying',
                'modified_on' => date('Y-m-d H:i:s'),
            ]);

            $results[] = $this->processTarget(array_merge($row, ['status' => 'retrying']));
        }

        if ($generatedContentId !== null) {
            $this->updateGeneratedContentStatus($generatedContentId);
        }

        return ['count' => count($results), 'items' => $results];
    }

    private function ensureTargetsForRecord(array $record, array $destinations = []): array
    {
        $generatedContentId = (int) ($record['id'] ?? 0);
        $resolved = $this->resolveDestinations($record, $destinations);

        $created = 0;
        $existing = 0;
        $skipped = 0;

        foreach ($resolved as $destination) {
            if (! $this->isDestinationEnabled($destination)) {
                $skipped++;
                continue;
            }

            $existingRow = $this->targetModel
                ->where('generated_content_id', $generatedContentId)
                ->where('channel', 'marketing')
                ->where('destination', $destination)
                ->first();

            if ($existingRow) {
                $existing++;
                continue;
            }

            $inserted = $this->targetModel->insert([
                'generated_content_id' => $generatedContentId,
                'story_id' => $record['story_id'] ?? null,
                'channel' => 'marketing',
                'destination' => $destination,
                'payload_json' => json_encode($this->buildPayload($record, $destination)),
                'status' => 'pending',
                'retry_count' => 0,
                'created_on' => date('Y-m-d H:i:s'),
                'modified_on' => date('Y-m-d H:i:s'),
            ], true);

            if ($inserted !== false) {
                $created++;
            }
        }

        return ['created' => $created, 'existing' => $existing, 'skipped' => $skipped];
    }

    private function processTarget(array $target): array
    {
        $targetId = (int) ($target['id'] ?? 0);
        $destination = (string) ($target['destination'] ?? '');
        $payload = json_decode((string) ($target['payload_json'] ?? '{}'), true);
        if (! is_array($payload)) {
            $payload = [];
        }

        $retryCount = (int) ($target['retry_count'] ?? 0);

        $this->targetModel->update($targetId, [
            'status' => 'queued',
            'queued_at' => date('Y-m-d H:i:s'),
            'modified_on' => date('Y-m-d H:i:s'),
        ]);

        try {
            $result = match ($destination) {
                'blog' => $this->handleBlogDestination($target, $payload),
                'in_app' => $this->handleInAppDestination($target, $payload),
                'email' => $this->handleEmailDestination($target, $payload),
                'discord' => $this->handleDiscordDestination($target, $payload),
                'bluesky' => $this->blueskyService->publish($payload),
                'mastodon' => $this->mastodonService->publish($payload),
                'linkedin' => $this->linkedinService->publish($payload),
                'webhook' => $this->webhookService->publish($this->buildWebhookPayload($target, $payload)),
                default => [
                    'status' => 'failed',
                    'response' => null,
                    'error' => 'Unknown destination: ' . $destination,
                ],
            };
        } catch (\Throwable $e) {
            $result = ['status' => 'failed', 'response' => null, 'error' => $e->getMessage()];
        }

        $nextRetry = $result['status'] === 'failed' ? $retryCount + 1 : $retryCount;

        $update = [
            'status' => $result['status'],
            'response_json' => isset($result['response']) ? json_encode($result['response']) : null,
            'external_id' => $result['external_id'] ?? null,
            'external_uri' => $result['external_uri'] ?? null,
            'error_message' => $result['error'] ?? null,
            'retry_count' => $nextRetry,
            'modified_on' => date('Y-m-d H:i:s'),
        ];

        if (in_array($result['status'], ['sent', 'skipped'], true)) {
            $update['sent_at'] = date('Y-m-d H:i:s');
        }

        if ($result['status'] === 'failed') {
            $update['failed_at'] = date('Y-m-d H:i:s');
            if ($nextRetry < $this->distributionConfig->maxRetries) {
                $update['status'] = 'retrying';
            }
        }

        $this->targetModel->update($targetId, $update);

        return [
            'id' => $targetId,
            'generated_content_id' => (int) ($target['generated_content_id'] ?? 0),
            'destination' => $destination,
            'status' => $update['status'],
            'retry_count' => $nextRetry,
            'error' => $update['error_message'] ?? null,
        ];
    }

    private function handleBlogDestination(array $target, array $payload): array
    {
        $db = Database::connect();
        $generatedContentId = (int) ($target['generated_content_id'] ?? 0);

        $existing = $db->table('bf_marketing_blog_posts')->where('generated_content_id', $generatedContentId)->get()->getRowArray();

        $data = [
            'generated_content_id' => $generatedContentId,
            'title' => (string) ($payload['title'] ?? 'Marketing Update'),
            'content' => (string) ($payload['content'] ?? $payload['summary'] ?? ''),
            'excerpt' => mb_substr((string) ($payload['summary'] ?? ''), 0, 220),
            'status' => 'published',
            'meta_json' => json_encode(['source' => 'distribution_engine', 'generated_content_id' => $generatedContentId]),
            'modified_on' => date('Y-m-d H:i:s'),
        ];

        if (empty($existing)) {
            $data['slug'] = $this->marketingModel->createSlug((string) $data['title']);
            $data['created_on'] = date('Y-m-d H:i:s');
            $db->table('bf_marketing_blog_posts')->insert($data);
            $blogPostId = (int) $db->insertID();
        } else {
            $blogPostId = (int) $existing['id'];
            $db->table('bf_marketing_blog_posts')->where('id', $blogPostId)->update($data);
        }

        return ['status' => 'sent', 'response' => ['blog_post_id' => $blogPostId], 'error' => null];
    }

    private function handleInAppDestination(array $target, array $payload): array
    {
        $db = Database::connect();
        $db->table('bf_marketing_in_app_notifications')->insert([
            'generated_content_id' => (int) ($target['generated_content_id'] ?? 0),
            'target_group' => (string) ($payload['target_group'] ?? 'internal_team'),
            'title' => (string) ($payload['title'] ?? 'Marketing update available'),
            'message' => (string) ($payload['summary'] ?? ''),
            'status' => 'sent',
            'created_on' => date('Y-m-d H:i:s'),
            'modified_on' => date('Y-m-d H:i:s'),
        ]);

        return ['status' => 'sent', 'response' => ['notification_id' => (int) $db->insertID()], 'error' => null];
    }

    private function handleEmailDestination(array $target, array $payload): array
    {
        $db = Database::connect();
        $recipients = $this->distributionConfig->internalEmailRecipients;
        if ($recipients === []) {
            return ['status' => 'failed', 'response' => null, 'error' => 'No internal email recipients configured'];
        }

        $inserted = 0;
        foreach ($recipients as $recipient) {
            $db->table('bf_email_outbox')->insert([
                'user_id' => null,
                'to_email' => $recipient,
                'subject' => (string) ($payload['title'] ?? 'Marketing distribution update'),
                'type' => 'marketing_internal_distribution',
                'status' => 'queued',
                'error_message' => null,
                'provider' => 'smtp',
                'meta_json' => json_encode([
                    'generated_content_id' => (int) ($target['generated_content_id'] ?? 0),
                    'summary' => $payload['summary'] ?? '',
                    'destination' => 'email',
                ]),
                'created_at' => date('Y-m-d H:i:s'),
                'sent_at' => null,
            ]);
            $inserted++;
        }

        return ['status' => 'sent', 'response' => ['queued_emails' => $inserted], 'error' => null];
    }

    private function handleDiscordDestination(array $target, array $payload): array
    {
        $discord = new MyMIDiscord();
        $message = "**" . ($payload['title'] ?? 'Marketing Update') . "**\n" . ($payload['summary'] ?? '');

        $queued = $discord->enqueuePlain('marketing', $message, [
            'priority' => 5,
            'dedupe_key' => 'marketing-distribution-target-' . (int) ($target['id'] ?? 0),
        ]);

        if (! $queued) {
            return ['status' => 'failed', 'response' => null, 'error' => 'Discord queue rejected message'];
        }

        return ['status' => 'sent', 'response' => ['queued' => true], 'error' => null];
    }

    private function updateGeneratedContentStatus(int $generatedContentId): array
    {
        $rows = $this->targetModel->where('generated_content_id', $generatedContentId)->findAll();
        if ($rows === []) {
            return ['distribution_status' => 'pending', 'status' => 'generated'];
        }

        $statuses = array_values(array_unique(array_map(static fn(array $row): string => (string) ($row['status'] ?? 'pending'), $rows)));

        $distributionStatus = 'pending';
        $contentStatus = 'generated';

        if (count(array_diff($statuses, ['sent', 'skipped'])) === 0) {
            $distributionStatus = 'distributed';
            $contentStatus = 'distributed';
        } elseif (in_array('failed', $statuses, true) || in_array('retrying', $statuses, true)) {
            $distributionStatus = 'partial_failed';
            $contentStatus = 'distribution_failed';
        } elseif (in_array('queued', $statuses, true)) {
            $distributionStatus = 'scheduled';
            $contentStatus = 'scheduled';
        }

        Database::connect()->table('bf_marketing_generated_content')
            ->where('id', $generatedContentId)
            ->update([
                'distribution_status' => $distributionStatus,
                'status' => $contentStatus,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        return ['distribution_status' => $distributionStatus, 'status' => $contentStatus, 'statuses' => $statuses];
    }

    /** @return list<string> */
    private function resolveDestinations(array $record, array $destinations = []): array
    {
        if ($destinations !== []) {
            return array_values(array_unique(array_map(static fn($item): string => (string) $item, $destinations)));
        }

        $sourceType = (string) ($record['source_type'] ?? 'default');
        $routing = $this->distributionConfig->routingRulesBySourceType[$sourceType]
            ?? $this->distributionConfig->routingRulesBySourceType['default']
            ?? ['blog', 'in_app', 'email', 'discord'];

        return array_values(array_unique($routing));
    }

    private function isDestinationEnabled(string $destination): bool
    {
        return (bool) ($this->distributionConfig->enabledDestinations[$destination] ?? false);
    }

    /** @return array<string,mixed> */
    private function buildPayload(array $record, string $destination): array
    {
        $content = json_decode((string) ($record['content_json'] ?? '{}'), true);
        if (! is_array($content)) {
            $content = [];
        }

        return [
            'generated_content_id' => (int) ($record['id'] ?? 0),
            'story_id' => (int) ($record['story_id'] ?? 0),
            'approved_at' => (string) ($record['updated_at'] ?? date('Y-m-d H:i:s')),
            'destination' => $destination,
            'title' => (string) ($record['title'] ?? $content['title'] ?? 'Marketing Update'),
            'summary' => (string) ($record['summary'] ?? $content['summary'] ?? ''),
            'content_json' => $content,
            'content' => (string) ($content['blog_post'] ?? $content['summary'] ?? $record['summary'] ?? ''),
            'keywords' => $content['keywords'] ?? $record['keywords'] ?? [],
            'target_group' => 'internal_team',
        ];
    }

    /** @return array<string,mixed> */
    private function buildWebhookPayload(array $target, array $payload): array
    {
        return [
            'generated_content_id' => (int) ($target['generated_content_id'] ?? ($payload['generated_content_id'] ?? 0)),
            'story_id' => (int) ($target['story_id'] ?? ($payload['story_id'] ?? 0)),
            'title' => (string) ($payload['title'] ?? ''),
            'summary' => (string) ($payload['summary'] ?? ''),
            'keywords' => $payload['keywords'] ?? [],
            'content_json' => $payload['content_json'] ?? [],
            'destination' => (string) ($target['destination'] ?? 'webhook'),
            'approved_at' => (string) ($payload['approved_at'] ?? date('Y-m-d H:i:s')),
        ];
    }

    private function fetchGeneratedContent(int $generatedContentId): ?array
    {
        $record = Database::connect()->table('bf_marketing_generated_content')
            ->where('id', $generatedContentId)
            ->get()
            ->getRowArray();

        return is_array($record) ? $record : null;
    }
}
