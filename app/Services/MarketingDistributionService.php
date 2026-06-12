<?php

namespace App\Services;

use App\Libraries\MyMIDiscord;
use App\Models\MarketingDistributionTargetModel;
use App\Models\MarketingModel;
use App\Services\Marketing\Distribution\Adapters\BlogDestinationAdapter;
use App\Services\Marketing\Distribution\Adapters\DiscordDestinationAdapter;
use App\Services\Marketing\Distribution\Adapters\EmailDestinationAdapter;
use App\Services\Marketing\Distribution\Adapters\InAppDestinationAdapter;
use App\Services\Marketing\Distribution\Adapters\WebhookDestinationAdapter;
use App\Services\Marketing\Distribution\BlueskyDistributionService;
use App\Services\Marketing\Distribution\DestinationDispatcher;
use App\Services\Marketing\Distribution\DiscordMessageBuilder;
use App\Services\Marketing\Distribution\LinkedInDistributionService;
use App\Services\Marketing\Distribution\MastodonDistributionService;
use App\Services\Marketing\Distribution\WebhookDistributionService;
use Config\Database;
use Config\MarketingDistribution;

class MarketingDistributionService
{
    private const PROCESSABLE_STATUSES = ['pending', 'sending', 'failed_retryable'];
    private const VALID_CATEGORIES = [
        'community_news',
        'announcements',
        'mymi_news',
        'crypto_news',
        'financial_news',
        'stock_news',
    ];
    private DestinationDispatcher $dispatcher;

    public function __construct(
        private ?MarketingModel $marketingModel = null,
        private ?MarketingDistributionTargetModel $targetModel = null,
        private ?MarketingDistribution $distributionConfig = null,
        private ?BlueskyDistributionService $blueskyService = null,
        private ?MastodonDistributionService $mastodonService = null,
        private ?LinkedInDistributionService $linkedinService = null,
        private ?WebhookDistributionService $webhookService = null,
        private ?MyMIDiscord $discordService = null,
        private ?DiscordMessageBuilder $discordMessageBuilder = null,
    ) {
        $this->marketingModel ??= new MarketingModel();
        $this->targetModel ??= new MarketingDistributionTargetModel();
        $this->distributionConfig ??= config('MarketingDistribution');
        $this->blueskyService ??= new BlueskyDistributionService($this->distributionConfig);
        $this->mastodonService ??= new MastodonDistributionService($this->distributionConfig);
        $this->linkedinService ??= new LinkedInDistributionService($this->distributionConfig);
        $this->webhookService ??= new WebhookDistributionService($this->distributionConfig);
        $this->discordService ??= new MyMIDiscord();
        $this->discordMessageBuilder ??= new DiscordMessageBuilder($this->distributionConfig);
        $this->dispatcher = new DestinationDispatcher([
            'discord' => new DiscordDestinationAdapter($this->discordService, $this->distributionConfig),
            'blog' => new BlogDestinationAdapter($this->marketingModel),
            'in_app' => new InAppDestinationAdapter(),
            'email' => new EmailDestinationAdapter($this->distributionConfig),
            'webhook' => new WebhookDestinationAdapter($this->webhookService),
        ]);
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
        $builder = $this->targetModel->builder()->where('status', 'failed_retryable');
        if ($generatedContentId !== null) {
            $builder->where('generated_content_id', $generatedContentId);
        }

        $rows = $builder->orderBy('id', 'ASC')->limit($limit)->get()->getResultArray();
        $results = [];

        foreach ($rows as $row) {
            if ((int) ($row['retry_count'] ?? 0) >= $this->distributionConfig->maxRetries) {
                $this->targetModel->update((int) $row['id'], ['status' => 'dead_letter', 'failed_at' => date('Y-m-d H:i:s'), 'modified_on' => date('Y-m-d H:i:s')]);
                $results[] = ['id' => (int) $row['id'], 'status' => 'skipped', 'reason' => 'max_retries_reached'];
                continue;
            }

            $this->targetModel->update((int) $row['id'], [
                'status' => 'failed_retryable',
                'modified_on' => date('Y-m-d H:i:s'),
            ]);

            $results[] = $this->processTarget(array_merge($row, ['status' => 'failed_retryable']));
        }

        if ($generatedContentId !== null) {
            $this->updateGeneratedContentStatus($generatedContentId);
        }

        return ['count' => count($results), 'items' => $results];
    }

    /** @return array<string,mixed> */
    public function getDistributionSummary(int $limit = 100): array
    {
        $db = Database::connect();

        $recentTargets = $this->targetModel
            ->orderBy('id', 'DESC')
            ->limit(max(1, $limit))
            ->findAll();

        return [
            'totals' => $this->getChannelStatusTotals(),
            'failed_retryable' => $this->getFailedRetryableSummary(),
            'recent_targets' => $recentTargets,
            'sql_assertions' => $this->getSqlAssertions(),
            'generated_backlog' => [
                'pending_review' => $db->table('bf_marketing_generated_content')
                    ->groupStart()->whereIn('approval_status', ['pending_review', 'pending', ''])->orWhere('approval_status IS NULL', null, false)->groupEnd()
                    ->countAllResults(),
                'approved_not_distributed' => $db->table('bf_marketing_generated_content')
                    ->whereIn('approval_status', ['approved', 'auto_approved'])
                    ->groupStart()->whereIn('distribution_status', ['pending', 'scheduled', 'partial_failed', ''])->orWhere('distribution_status IS NULL', null, false)->groupEnd()
                    ->countAllResults(),
            ],
        ];
    }

    /** @return array<int,array<string,mixed>> */
    public function getContentDestinationHistory(int $generatedContentId): array
    {
        return $this->targetModel
            ->where('generated_content_id', $generatedContentId)
            ->orderBy('id', 'ASC')
            ->findAll();
    }

    /** @return array<string,mixed> */
    public function getFailedRetryableSummary(): array
    {
        $rows = $this->targetModel->whereIn('status', ['failed_retryable', 'failed_permanent', 'dead_letter'])->findAll();
        $maxRetries = max(0, (int) $this->distributionConfig->maxRetries);
        $retryable = array_filter($rows, static fn(array $row): bool => (int) ($row['retry_count'] ?? 0) < $maxRetries);

        return [
            'max_retries' => $maxRetries,
            'failed_or_retrying' => count($rows),
            'retryable' => count($retryable),
            'by_destination' => $this->buildCountByDestination($rows),
        ];
    }

    /** @return array<string,array<string,int>> */
    public function getChannelStatusTotals(): array
    {
        $rows = $this->targetModel->select('destination, status, COUNT(*) AS total')->groupBy('destination, status')->findAll();
        $totals = [];
        foreach ($rows as $row) {
            $destination = (string) ($row['destination'] ?? 'unknown');
            $status = (string) ($row['status'] ?? 'unknown');
            $totals[$destination] ??= [];
            $totals[$destination][$status] = (int) ($row['total'] ?? 0);
        }

        return $totals;
    }

    /** @return array<string,mixed> */
    public function getSqlAssertions(): array
    {
        $db = Database::connect();
        $assertions = [
            'duplicate_story_hash_groups' => 0,
            'pending_review_backlog' => 0,
            'approved_never_distributed' => 0,
            'failed_target_accumulation' => 0,
            'duplicate_distribution_targets' => 0,
        ];

        if ($db->tableExists('bf_marketing_generated_content')) {
            $assertions['pending_review_backlog'] = $db->table('bf_marketing_generated_content')
                ->groupStart()->whereIn('approval_status', ['pending_review', 'pending', ''])->orWhere('approval_status IS NULL', null, false)->groupEnd()
                ->countAllResults();

            $assertions['approved_never_distributed'] = $db->table('bf_marketing_generated_content')
                ->whereIn('approval_status', ['approved', 'auto_approved'])
                ->groupStart()->whereIn('distribution_status', ['pending', 'scheduled', 'partial_failed', ''])->orWhere('distribution_status IS NULL', null, false)->groupEnd()
                ->countAllResults();
        }

        if ($db->tableExists('bf_marketing_distribution_targets')) {
            $assertions['failed_target_accumulation'] = $db->table('bf_marketing_distribution_targets')
                ->whereIn('status', ['failed_retryable', 'failed_permanent', 'dead_letter'])
                ->groupStart()
                    ->where('channel !=', 'discord')
                    ->orWhere('destination !=', 'community_news')
                ->groupEnd()
                ->countAllResults();

            $assertions['duplicate_distribution_targets'] = (int) $db->query(
                "SELECT COUNT(*) AS total FROM (
                    SELECT generated_content_id, channel, destination
                    FROM bf_marketing_distribution_targets
                    GROUP BY generated_content_id, channel, destination
                    HAVING COUNT(*) > 1
                ) duplicate_targets"
            )->getRow('total');
        }

        return $assertions;
    }

    /** @return array<string,mixed> */
    public function skipOptionalDiscordCommunityPending(bool $approve = false, int $limit = 500): array
    {
        $now = date("Y-m-d H:i:s");
        $builder = $this->targetModel
            ->where("channel", "discord")
            ->where("destination", "community_news")
            ->where("status", "pending")
            ->orderBy("id", "ASC")
            ->limit(max(1, $limit));

        $rows = $builder->findAll();
        $ids = array_map(static fn(array $row): int => (int) ($row["id"] ?? 0), $rows);
        $ids = array_values(array_filter($ids, static fn(int $id): bool => $id > 0));

        if (! $approve || $ids === []) {
            return [
                "approved" => $approve,
                "matched" => count($rows),
                "updated" => 0,
                "ids" => $ids,
            ];
        }

        $this->targetModel
            ->whereIn("id", $ids)
            ->set([
                "status" => "skipped",
                "error_message" => "Skipped optional Discord community target because no marketing Discord channel is configured.",
                "failure_class" => null,
                "failed_at" => null,
                "next_retry_at" => null,
                "modified_on" => $now,
            ])
            ->update();

        return [
            "approved" => true,
            "matched" => count($rows),
            "updated" => count($ids),
            "ids" => $ids,
        ];
    }

    /** @return array<string,mixed> */
    public function repairApprovedPendingGenerationWithTargets(bool $approve = false, int $limit = 500): array
    {
        $db = Database::connect();
        $rows = $db->table("bf_marketing_generated_content gc")
            ->select("gc.id, gc.status, COUNT(dt.id) AS pending_target_count")
            ->join("bf_marketing_distribution_targets dt", "dt.generated_content_id = gc.id", "inner")
            ->whereIn("gc.approval_status", ["approved", "auto_approved"])
            ->where("gc.distribution_status", "pending_generation")
            ->where("dt.channel", "marketing")
            ->whereIn("dt.destination", ["blog", "in_app", "email"])
            ->where("dt.status", "pending")
            ->groupBy("gc.id, gc.status")
            ->orderBy("gc.id", "ASC")
            ->limit(max(1, $limit))
            ->get()
            ->getResultArray();

        $ids = array_map(static fn(array $row): int => (int) ($row["id"] ?? 0), $rows);
        $ids = array_values(array_filter($ids, static fn(int $id): bool => $id > 0));

        if (! $approve || $ids === []) {
            return [
                "approved" => $approve,
                "matched" => count($rows),
                "updated" => 0,
                "ids" => $ids,
            ];
        }

        $updated = 0;
        $now = date("Y-m-d H:i:s");
        foreach ($rows as $row) {
            $id = (int) ($row["id"] ?? 0);
            if ($id < 1) {
                continue;
            }

            $status = trim((string) ($row["status"] ?? ""));
            $db->table("bf_marketing_generated_content")
                ->where("id", $id)
                ->update([
                    "distribution_status" => "pending",
                    "status" => $status !== "" ? $status : "generated",
                    "updated_at" => $now,
                ]);
            $updated++;
        }

        return [
            "approved" => true,
            "matched" => count($rows),
            "updated" => $updated,
            "ids" => $ids,
        ];
    }

    private function ensureTargetsForRecord(array $record, array $destinations = []): array
    {
        $generatedContentId = (int) ($record['id'] ?? 0);
        $record = $this->normalizeCategoryMeta($record);

        $targets = [];
        foreach ($this->resolveDestinations($record, $destinations) as $destination) {
            $targets[] = ['channel' => 'marketing', 'destination' => $destination];
        }

        foreach ($this->resolveDiscordTargets($record) as $channelKey) {
            $targets[] = ['channel' => 'discord', 'destination' => $channelKey];
        }

        $created = 0;
        $existing = 0;
        $skipped = 0;

        foreach ($targets as $targetDef) {
            $destination = $targetDef['destination'];
            $channel = $targetDef['channel'];

            if ($channel === 'marketing' && ! $this->isDestinationEnabled($destination)) {
                $skipped++;
                continue;
            }

            if ($channel === 'discord' && ! $this->isDiscordStreamEnabled()) {
                $skipped++;
                continue;
            }

            $existingRow = $this->targetModel
                ->where('generated_content_id', $generatedContentId)
                ->where('channel', $channel)
                ->where('destination', $destination)
                ->first();

            if ($existingRow) {
                if (in_array((string) ($existingRow['status'] ?? ''), ['failed_retryable'], true)) {
                    $this->targetModel->update((int) $existingRow['id'], [
                        'payload_json' => json_encode($this->buildPayload($record, $destination, $channel)),
                        'status' => 'pending',
                        'error_message' => null,
                        'failed_at' => null,
                        'modified_on' => date('Y-m-d H:i:s'),
                    ]);
                }
                $existing++;
                continue;
            }

            $inserted = $this->targetModel->insert([
                'generated_content_id' => $generatedContentId,
                'story_id' => $record['story_id'] ?? null,
                'channel' => $channel,
                'destination' => $destination,
                'payload_json' => json_encode($this->buildPayload($record, $destination, $channel)),
                'status' => 'pending',
                'retry_count' => 0,
                'attempt_count' => 0,
                'max_attempts' => max(1, (int) $this->distributionConfig->maxRetries),
                'idempotency_key' => $this->buildIdempotencyKey($generatedContentId, $destination, $channel, $this->buildPayload($record, $destination, $channel)),
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
        $channel = (string) ($target['channel'] ?? 'marketing');
        $payload = json_decode((string) ($target['payload_json'] ?? '{}'), true);
        if (! is_array($payload)) {
            $payload = [];
        }

        $retryCount = (int) ($target['retry_count'] ?? 0);

        $attempt = ((int) ($target['attempt_count'] ?? 0)) + 1;
        $this->targetModel->update($targetId, [
            'status' => 'sending',
            'queued_at' => date('Y-m-d H:i:s'),
            'attempt_count' => $attempt,
            'last_attempt_at' => date('Y-m-d H:i:s'),
            'modified_on' => date('Y-m-d H:i:s'),
        ]);
        if (!empty($target['idempotency_key'])) {
            $sent = $this->targetModel->where('idempotency_key', (string) $target['idempotency_key'])->where('status', 'sent')->first();
            if ($sent) {
                return ['id' => $targetId, 'generated_content_id' => (int) ($target['generated_content_id'] ?? 0), 'destination' => $destination, 'channel' => $channel, 'status' => 'sent', 'retry_count' => (int) ($target['retry_count'] ?? 0), 'error' => null];
            }
        }

        $result = $this->dispatcher->dispatch($target, $payload);
        $newRetryCount = $result->success ? $retryCount : ($retryCount + 1);
        $terminalStatus = $result->success
            ? 'sent'
            : ($result->retryable ? 'failed_retryable' : 'failed_permanent');
        if ($terminalStatus === 'failed_retryable' && $newRetryCount >= max(1, (int) ($target['max_attempts'] ?? $this->distributionConfig->maxRetries))) {
            $terminalStatus = 'dead_letter';
        }
        $update = [
            'status' => $terminalStatus,
            'response_json' => $result->responseBody ? json_encode(['body' => $result->responseBody, 'headers' => $result->responseHeaders]) : null,
            'external_id' => $result->externalId,
            'error_message' => $result->responseExcerpt,
            'retry_count' => $newRetryCount,
            'http_status' => $result->httpStatus,
            'failure_class' => $result->failureClass,
            'response_excerpt' => $result->responseExcerpt,
            'response_headers' => $result->responseHeaders ? json_encode($result->responseHeaders) : null,
            'response_body' => $result->responseBody,
            'next_retry_at' => $result->nextRetryAt,
            'modified_on' => date('Y-m-d H:i:s'),
        ];

        if ($terminalStatus === 'sent') {
            $update['sent_at'] = date('Y-m-d H:i:s');
        }

        if (in_array($terminalStatus, ['failed_retryable', 'failed_permanent', 'dead_letter'], true)) {
            $update['failed_at'] = date('Y-m-d H:i:s');
        }

        $this->targetModel->update($targetId, $update);

        return [
            'id' => $targetId,
            'generated_content_id' => (int) ($target['generated_content_id'] ?? 0),
            'destination' => $destination,
            'channel' => $channel,
            'status' => $terminalStatus,
            'retry_count' => $newRetryCount,
            'error' => $update['error_message'] ?? null,
        ];
    }

    private function hasOnlyOptionalDiscordCommunityFailuresWithSentTargets(int $generatedContentId, array $statuses): bool
    {
        if (! in_array('sent', $statuses, true)) {
            return false;
        }

        if (
            ! in_array('failed_permanent', $statuses, true)
            && ! in_array('failed_retryable', $statuses, true)
            && ! in_array('dead_letter', $statuses, true)
        ) {
            return false;
        }

        $rows = $this->targetModel
            ->where('generated_content_id', $generatedContentId)
            ->findAll();

        if ($rows === []) {
            return false;
        }

        foreach ($rows as $row) {
            $status = (string) ($row['status'] ?? 'pending');
            $channel = (string) ($row['channel'] ?? '');
            $destination = (string) ($row['destination'] ?? '');

            if (in_array($status, ['sent', 'skipped'], true)) {
                continue;
            }

            $isFailure = in_array($status, ['failed_permanent', 'failed_retryable', 'dead_letter'], true);
            $isOptionalDiscordCommunity = $channel === 'discord' && $destination === 'community_news';

            if (! ($isOptionalDiscordCommunity && $isFailure)) {
                return false;
            }
        }

        return true;
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
            $contentStatus = 'posted';
        } elseif ($this->hasOnlyOptionalDiscordCommunityFailuresWithSentTargets($generatedContentId, $statuses)) {
            $distributionStatus = 'distributed';
            $contentStatus = 'posted';
        } elseif (in_array('failed_permanent', $statuses, true) || in_array('failed_retryable', $statuses, true) || in_array('dead_letter', $statuses, true)) {
            $distributionStatus = 'partial_failed';
            $contentStatus = 'distribution_failed';
        } elseif (in_array('sending', $statuses, true)) {
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
            ?? ['blog', 'in_app', 'email'];

        return array_values(array_filter(array_unique($routing), static fn(string $destination): bool => $destination !== 'discord'));
    }

    /** @return list<string> */
    private function resolveDiscordTargets(array $record): array
    {
        if (! $this->isDiscordStreamEnabled()) {
            return [];
        }

        $map = $this->distributionConfig->discord['category_channel_map'] ?? [];
        $primary = (string) ($record['primary_category'] ?? 'community_news');
        $channels = (array) ($map[$primary] ?? []);

        foreach ($this->normalizeSecondaryTags($record['secondary_tags'] ?? []) as $tag) {
            $channels = array_merge($channels, (array) ($map[$tag] ?? []));
        }

        if ($channels === []) {
            $channels = [(string) ($this->distributionConfig->discord['fallback_channel'] ?? 'community_news')];
        }

        $channels = array_values(array_unique(array_map(static fn($item): string => trim((string) $item), $channels)));

        return array_values(array_filter($channels, fn(string $channelKey): bool => $this->isMarketingDiscordChannelConfigured($channelKey)));
    }


    private function isMarketingDiscordChannelConfigured(string $channelKey): bool
    {
        $channelKey = trim($channelKey);
        if ($channelKey === "") {
            return false;
        }

        $channels = (array) ($this->distributionConfig->discord["channels"] ?? []);

        return trim((string) ($channels[$channelKey] ?? "")) !== "";
    }

    private function isDestinationEnabled(string $destination): bool
    {
        return (bool) ($this->distributionConfig->enabledDestinations[$destination] ?? false);
    }

    /** @return array<string,mixed> */
    private function buildPayload(array $record, string $destination, string $channel = 'marketing'): array
    {
        $content = json_decode((string) ($record['content_json'] ?? '{}'), true);
        if (! is_array($content)) {
            $content = [];
        }

        $record = $this->normalizeCategoryMeta(array_merge($record, ['content_json' => $content]));

        $base = [
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
            'primary_category' => (string) $record['primary_category'],
            'secondary_tags' => $record['secondary_tags'],
            'source_type' => (string) ($record['source_type'] ?? 'marketing'),
            'content_type' => (string) ($record['content_type'] ?? 'generated_summary'),
        ];

        if ($channel === 'discord') {
            $message = $this->discordMessageBuilder->build($record, $destination);
            $base['discord_channel_key'] = $destination;
            $base['message'] = $message['content'];
            $base['allowed_mentions'] = $this->discordMessageBuilder->buildAllowedMentions($record);
        }

        return $base;
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
        $record = Database::connect()->table('bf_marketing_generated_content')->where('id', $generatedContentId)->get()->getRowArray();

        return is_array($record) ? $record : null;
    }

    private function shouldInjectFailureForDestination(string $destination): bool
    {
        $inject = array_map('strtolower', $this->distributionConfig->failureInjectionDestinations);

        return in_array(strtolower($destination), $inject, true);
    }

    /** @param list<array<string,mixed>> $rows */
    private function buildCountByDestination(array $rows): array
    {
        $result = [];
        foreach ($rows as $row) {
            $destination = (string) ($row['destination'] ?? 'unknown');
            $result[$destination] = (int) (($result[$destination] ?? 0) + 1);
        }

        return $result;
    }

    /** @return array<string,mixed> */
    private function normalizeCategoryMeta(array $record): array
    {
        $primary = strtolower(trim((string) ($record['primary_category'] ?? $record['category'] ?? 'community_news')));
        if (! in_array($primary, self::VALID_CATEGORIES, true)) {
            $primary = 'community_news';
        }

        $record['primary_category'] = $primary;
        $record['secondary_tags'] = $this->normalizeSecondaryTags($record['secondary_tags'] ?? $record['keywords'] ?? []);
        $record['source_type'] = (string) ($record['source_type'] ?? 'marketing_scraper');
        $record['content_type'] = (string) ($record['content_type'] ?? 'generated_summary');

        return $record;
    }

    /** @return list<string> */
    private function normalizeSecondaryTags(mixed $raw): array
    {
        if (is_string($raw)) {
            $decoded = json_decode($raw, true);
            $raw = is_array($decoded) ? $decoded : explode(',', $raw);
        }

        if (! is_array($raw)) {
            return [];
        }

        $normalized = [];
        foreach ($raw as $item) {
            $value = strtolower(trim((string) $item));
            if ($value !== '') {
                $normalized[] = str_replace(' ', '_', $value);
            }
        }

        return array_values(array_unique($normalized));
    }

    /** @param array<string,mixed> $payload */
    private function buildIdempotencyKey(int $generatedContentId, string $destination, string $channel, array $payload): string
    {
        $normalizedPayload = json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        return hash('sha256', implode('|', [$generatedContentId, $destination, $channel, (string) $normalizedPayload]));
    }

    private function isDiscordStreamEnabled(): bool
    {
        return (bool) ($this->distributionConfig->discord['enabled'] ?? false)
            && (bool) ($this->distributionConfig->discord['stream_enabled'] ?? false)
            && (bool) ($this->distributionConfig->enabledDestinations['discord'] ?? true);
    }

    /** @return array<string,mixed> */
    public function sendActivationAnnouncement(bool $withEveryone = false): array
    {
        $record = [
            'primary_category' => 'announcements',
            'allow_everyone' => $withEveryone,
            'title' => 'Discord Streaming Activation',
            'summary' => 'Good morning all, I will be turning on Discord Streaming Messages for #community-news, #announcements, #mymi-news, #crypto-news, #financial-news, and #stock-news.',
            'source_type' => 'admin',
            'content_type' => 'activation_announcement',
        ];

        $payload = $this->discordMessageBuilder->build($record, 'announcements');
        if ($withEveryone) {
            $payload['content'] = "@everyone\n\n" . ltrim((string) ($payload['content'] ?? ''));
            $payload['allow_mass_mentions'] = true;
        }
        $payload['allowed_mentions'] = $this->discordMessageBuilder->buildAllowedMentions($record);

        $channelKey = 'announcements';
        $channelId = (string) ($this->distributionConfig->discord['channels'][$channelKey] ?? '');
        $result = $this->discordService->sendToChannel($channelKey, $payload, $channelId !== '' ? $channelId : null);

        return ['channel' => $channelKey, 'result' => $result];
    }
}
