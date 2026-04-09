<?php

namespace App\Services;

use App\Libraries\MyMIMarketing;
use App\Models\MarketingModel;
use Config\Database;

class MarketingPackageService
{
    public function __construct(
        private MyMIMarketing $marketing,
        private MarketingModel $marketingModel,
        private ?MarketingNotificationService $notificationService = null,
        private ?MarketingStoryService $storyService = null,
    ) {
        $this->notificationService ??= new MarketingNotificationService();
        $this->storyService ??= new MarketingStoryService($this->marketingModel);
    }

    public function generateFromInput(array $input): array
    {
        if (!empty($input['notification_id'])) {
            return $this->generateFromNotificationId((int) $input['notification_id']);
        }

        if (!empty($input['headline'])) {
            return $this->generateFromHeadline((string) $input['headline'], $input);
        }

        if (!empty($input['headlines']) && is_array($input['headlines'])) {
            return $this->generateFromHeadlines($input['headlines'], $input);
        }

        return [
            'status' => 'error',
            'code' => 422,
            'message' => 'headline(s) or notification_id required',
        ];
    }

    public function generateFromNotificationId(int $notificationId): array
    {
        $notification = $this->notificationService->getNotificationById($notificationId);
        if ($notification === null) {
            return ['status' => 'error', 'code' => 404, 'message' => 'Notification not found'];
        }

        $normalized = $this->notificationService->normalizeNotification($notification);
        $storyId = $this->storyService->attachToStory($normalized);

        $package = $this->marketing->generateFullMarketingPackage(
            $normalized['title'] ?: 'Notification Update',
            $normalized['content'] ?: $normalized['summary'],
            $normalized['keywords'],
            ['source_url' => $normalized['source_url']]
        );

        $generatedContentId = $this->persistPackage($package, [
            'source_type' => 'notification',
            'source_id' => $notificationId,
            'notification_id' => $notificationId,
            'story_id' => $storyId,
            'headline' => $package['title'] ?? ($normalized['title'] ?? ''),
            'summary' => $package['summary'] ?? '',
            'keywords' => $package['keywords'] ?? [],
        ]);

        $this->storyService->addStoryUpdate($storyId, $normalized, $package);

        return $this->normalizeResponse('notification', $package, [
            'status' => 'success',
            'notification_id' => $notificationId,
            'story_id' => $storyId,
            'generated_content_id' => $generatedContentId,
            'headline' => $package['title'] ?? $normalized['title'],
        ]);
    }

    public function generateFromHeadline(string $headline, array $options = []): array
    {
        return $this->generateFromHeadlines([$headline], $options);
    }

    public function generateFromHeadlines(array $headlines, array $options = []): array
    {
        $packages = [];
        foreach ($headlines as $headline) {
            $text = trim((string) $headline);
            if ($text === '') {
                continue;
            }
            $package = $this->marketing->generateFullMarketingPackage($text, $text, [], $options);
            $generatedContentId = $this->persistPackage($package, [
                'source_type' => 'headline',
                'source_id' => null,
                'headline' => $text,
                'summary' => $package['summary'] ?? '',
                'keywords' => $package['keywords'] ?? [],
            ]);

            $packages[] = $this->normalizeResponse('headline', $package, [
                'status' => 'success',
                'notification_id' => null,
                'story_id' => null,
                'generated_content_id' => $generatedContentId,
                'headline' => $text,
            ]);
        }

        if ($packages === []) {
            return ['status' => 'error', 'code' => 422, 'message' => 'No valid headlines were provided.'];
        }

        return [
            'status' => 'success',
            'mode' => 'headline',
            'data' => $packages,
        ];
    }

    public function persistPackage(array $package, array $meta = []): int
    {
        $contentHash = hash('sha256', mb_strtolower(trim((string) ($meta['headline'] ?? $package['title'] ?? ''))) . '|' .
            mb_strtolower(trim((string) ($meta['source_url'] ?? ''))) . '|' .
            mb_strtolower(trim((string) ($meta['summary'] ?? $package['summary'] ?? ''))));

        $existing = Database::connect()
            ->table('bf_marketing_generated_content')
            ->where('source_type', $meta['source_type'] ?? null)
            ->where('source_id', $meta['source_id'] ?? null)
            ->where('content_hash', $contentHash)
            ->get()
            ->getRowArray();

        if (is_array($existing) && !empty($existing['id']) && empty($meta['force'])) {
            return (int) $existing['id'];
        }

        return $this->marketingModel->insertGeneratedPackage([
            'notification_id' => $meta['notification_id'] ?? null,
            'source_type' => $meta['source_type'] ?? 'manual',
            'source_id' => $meta['source_id'] ?? null,
            'story_id' => $meta['story_id'] ?? null,
            'title' => $meta['headline'] ?? ($package['title'] ?? ''),
            'summary' => $package['summary'] ?? '',
            'keywords' => json_encode($package['keywords'] ?? []),
            'content_json' => json_encode($package),
            'status' => $meta['status'] ?? 'generated',
            'approval_status' => $meta['approval_status'] ?? 'pending_review',
            'distribution_status' => $meta['distribution_status'] ?? 'pending',
            'version' => (int) ($meta['version'] ?? 1),
            'content_hash' => $contentHash,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    private function normalizeResponse(string $mode, array $package, array $meta): array
    {
        return [
            'status' => $meta['status'] ?? 'success',
            'mode' => $mode,
            'story_id' => $meta['story_id'] ?? null,
            'notification_id' => $meta['notification_id'] ?? null,
            'headline' => $meta['headline'] ?? ($package['title'] ?? ''),
            'summary' => $package['summary'] ?? '',
            'keywords' => $package['keywords'] ?? [],
            'social_posts' => $package['social_posts'] ?? [],
            'voice_script' => $package['voice_script'] ?? '',
            'audio_url' => $package['audio_url'] ?? null,
            'video_scripts' => $package['video_scripts'] ?? [],
            'image_url' => $package['image_url'] ?? null,
            'source_links' => $package['source_links'] ?? [],
            'generated_content_id' => $meta['generated_content_id'] ?? null,
        ];
    }
}
