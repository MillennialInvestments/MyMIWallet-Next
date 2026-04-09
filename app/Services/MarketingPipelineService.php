<?php

namespace App\Services;

use App\Models\MarketingModel;
use Config\Database;

class MarketingPipelineService
{
    public function __construct(
        private ?MarketingModel $marketingModel = null,
        private ?MarketingPackageService $packageService = null,
        private ?MarketingNotificationService $notificationService = null,
        private ?MarketingStoryService $storyService = null,
        private ?MarketingDistributionService $distributionService = null,
    ) {
        $this->marketingModel ??= new MarketingModel();
        $this->packageService ??= service('marketingPackageService');
        $this->notificationService ??= service('marketingNotificationService');
        $this->storyService ??= service('marketingStoryService');
        $this->distributionService ??= service('marketingDistributionService');
    }

    public function processTempScraperRecord(array $record): array
    {
        $content = trim(strip_tags((string) ($record['content'] ?? '')));
        if (mb_strlen($content) < 80) {
            return ['status' => 'skipped', 'reason' => 'content_too_short', 'id' => $record['id'] ?? null];
        }

        $title = trim((string) ($record['title'] ?? ''));
        if ($title === '') {
            $title = service('MyMIMarketing')->generateHeadline($content);
        }
        if ($title === '') {
            return ['status' => 'skipped', 'reason' => 'title_missing', 'id' => $record['id'] ?? null];
        }

        $result = $this->packageService->generateFromInput([
            'headline' => $title,
            'source_type' => 'temp_scraper',
            'source_id' => (int) ($record['id'] ?? 0),
            'source_url' => $record['url'] ?? $record['link'] ?? null,
        ]);

        if (($result['status'] ?? '') === 'success') {
            $this->marketingModel->markGenerated((int) ($record['id'] ?? 0), 'bf_marketing_scraper');
        }

        return $result;
    }

    public function processNotificationRecord(array $notification): array
    {
        $normalized = $this->notificationService->normalizeNotification($notification);
        if (mb_strlen((string) ($normalized['content'] ?? '')) < 80 && mb_strlen((string) ($normalized['summary'] ?? '')) < 80) {
            return ['status' => 'skipped', 'reason' => 'content_too_short', 'id' => $normalized['id'] ?? null];
        }

        return $this->packageService->generateFromNotificationId((int) $normalized['id']);
    }

    public function processCampaign(array $campaign): array
    {
        $headline = (string) ($campaign['name'] ?? $campaign['title'] ?? 'Campaign Update');

        return $this->packageService->generateFromInput([
            'headline' => $headline,
            'source_type' => 'campaign',
            'source_id' => (int) ($campaign['id'] ?? 0),
        ]);
    }

    public function processPendingTempRecords(int $limit = 5): array
    {
        $records = $this->marketingModel->getPendingGenerationRecords($limit);
        $results = [];
        foreach ($records as $record) {
            if (($record['source_type'] ?? '') !== 'temp_scraper') {
                continue;
            }
            $results[] = $this->processTempScraperRecord($record);
        }

        return ['count' => count($results), 'items' => $results];
    }

    public function processPendingNotifications(int $limit = 5): array
    {
        $rows = Database::connect()->table('bf_marketing_notifications')->where('status', 'pending')->limit($limit)->get()->getResultArray();
        $results = [];
        foreach ($rows as $notification) {
            $results[] = $this->processNotificationRecord($notification);
            Database::connect()->table('bf_marketing_notifications')->where('id', $notification['id'])->update([
                'status' => 'processed',
                'processed_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        return ['count' => count($results), 'items' => $results];
    }

    public function processPendingCampaigns(int $limit = 5): array
    {
        $rows = Database::connect()->table('bf_marketing_campaigns')->where('status', 'queued')->limit($limit)->get()->getResultArray();
        $results = [];
        foreach ($rows as $campaign) {
            $results[] = $this->processCampaign($campaign);
            Database::connect()->table('bf_marketing_campaigns')->where('id', $campaign['id'])->update([
                'status' => 'processed',
                'modified_on' => date('Y-m-d H:i:s'),
            ]);
        }

        return ['count' => count($results), 'items' => $results];
    }

    public function processPendingGeneratedContent(int $limit = 10): array
    {
        $pending = $this->marketingModel->getPendingDistributionRecords($limit);
        $results = [];
        foreach ($pending as $record) {
            $results[] = $this->distributionService->distributeGeneratedContent($record);
        }

        return ['count' => count($results), 'items' => $results];
    }
}
