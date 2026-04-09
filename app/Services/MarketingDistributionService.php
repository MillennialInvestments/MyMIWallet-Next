<?php

namespace App\Services;

use App\Models\MarketingModel;
use Config\Database;

class MarketingDistributionService
{
    public function __construct(private ?MarketingModel $marketingModel = null)
    {
        $this->marketingModel ??= new MarketingModel();
    }

    public function queueDistribution(int $generatedContentId, array $platforms = []): array
    {
        $platforms = $platforms ?: ['social', 'blog', 'newsletter'];

        $record = Database::connect()->table('bf_marketing_generated_content')->where('id', $generatedContentId)->get()->getRowArray();
        if (!$record) {
            return ['status' => 'error', 'message' => 'Generated content not found'];
        }

        if (!in_array((string) ($record['approval_status'] ?? ''), ['approved', 'auto_approved'], true)) {
            return ['status' => 'skipped', 'message' => 'Content not approved'];
        }

        $results = [];
        foreach ($platforms as $platform) {
            $results[$platform] = $this->logDistributionAttempt($generatedContentId, (string) $platform, 'queued');
        }

        Database::connect()->table('bf_marketing_generated_content')->where('id', $generatedContentId)->update([
            'distribution_status' => 'scheduled',
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return ['status' => 'success', 'queued' => $results];
    }

    public function distributeGeneratedContent(array $record): array
    {
        $social = $this->distributeToSocial($record);
        $blog = $this->distributeToBlog($record);
        $newsletter = $this->distributeToNewsletter($record);

        return ['social' => $social, 'blog' => $blog, 'newsletter' => $newsletter];
    }

    public function distributeToSocial(array $record): array
    {
        $id = (int) ($record['id'] ?? 0);
        $this->logDistributionAttempt($id, 'social', 'success', ['message' => 'Stub distributor']);
        $this->marketingModel->markDistributed($id, 'social');

        return ['status' => 'success'];
    }

    public function distributeToBlog(array $record): array
    {
        $id = (int) ($record['id'] ?? 0);
        $this->logDistributionAttempt($id, 'blog', 'success', ['message' => 'Stub distributor']);
        $this->marketingModel->markDistributed($id, 'blog');

        return ['status' => 'success'];
    }

    public function distributeToNewsletter(array $record): array
    {
        $id = (int) ($record['id'] ?? 0);
        $this->logDistributionAttempt($id, 'newsletter', 'success', ['message' => 'Stub distributor']);
        $this->marketingModel->markDistributed($id, 'newsletter');

        return ['status' => 'success'];
    }

    private function logDistributionAttempt(int $generatedContentId, string $platform, string $status, array $payload = [], ?string $error = null): int
    {
        $db = Database::connect();
        $db->table('bf_marketing_distribution_log')->insert([
            'generated_content_id' => $generatedContentId,
            'platform' => $platform,
            'status' => $status,
            'response_payload' => $payload ? json_encode($payload) : null,
            'error_message' => $error,
            'attempted_at' => date('Y-m-d H:i:s'),
        ]);

        return (int) $db->insertID();
    }
}
