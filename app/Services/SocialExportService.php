<?php

namespace App\Services;

use Config\Database;

class SocialExportService
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function buildPayload(array $post, string $destinationType): array
    {
        return [
            'source_app' => 'mymiwallet',
            'destination_type' => $destinationType,
            'generated_post_id' => (int) ($post['id'] ?? 0),
            'platform_id' => (int) ($post['platform_id'] ?? 0),
            'community_id' => isset($post['community_id']) ? (int) $post['community_id'] : null,
            'template_id' => isset($post['template_id']) ? (int) $post['template_id'] : null,
            'post_title' => $post['post_title'] ?? '',
            'post_body' => $post['post_body'] ?? '',
            'hashtags' => $post['hashtags'] ?? '',
            'tickers' => $post['tickers'] ?? '',
            'cta_link' => $post['cta_link'] ?? '',
            'status' => $post['status'] ?? 'draft',
            'approval_required' => true,
            'external_posting' => false,
            'funnel' => [
                'platform_post',
                'platform_community',
                'discord',
                'website',
                'free_tools',
                'membership',
                'premium_tools',
            ],
            'created_at' => date('c'),
        ];
    }

    public function createExportJobFromGeneratedPost(int $generatedPostId, string $destinationType = 'manual_json'): array
    {
        $post = $this->db->table('bf_social_generated_posts')
            ->where('id', $generatedPostId)
            ->get()
            ->getRowArray();

        if (! $post) {
            return ['status' => 'failed', 'error' => 'Generated post not found'];
        }

        if (! in_array($post['status'] ?? 'draft', ['approved', 'scheduled', 'draft'], true)) {
            return ['status' => 'skipped', 'error' => 'Generated post status is not exportable'];
        }

        $payload = $this->buildPayload($post, $destinationType);

        $this->db->table('bf_social_export_jobs')->insert([
            'generated_post_id' => $generatedPostId,
            'destination_type' => $destinationType,
            'destination_key' => $destinationType,
            'payload_json' => json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES),
            'status' => 'draft',
            'attempts' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return [
            'status' => 'success',
            'export_job_id' => $this->db->insertID(),
            'payload' => $payload,
        ];
    }

    public function queueApprovedDrafts(int $limit = 25, string $destinationType = 'zapier'): array
    {
        $posts = $this->db->table('bf_social_generated_posts')
            ->whereIn('status', ['approved', 'scheduled'])
            ->limit($limit)
            ->get()
            ->getResultArray();

        $created = 0;
        $skipped = 0;

        foreach ($posts as $post) {
            $exists = $this->db->table('bf_social_export_jobs')
                ->where('generated_post_id', $post['id'])
                ->where('destination_type', $destinationType)
                ->countAllResults();

            if ($exists > 0) {
                $skipped++;
                continue;
            }

            $result = $this->createExportJobFromGeneratedPost((int) $post['id'], $destinationType);
            if (($result['status'] ?? '') === 'success') {
                $created++;
            }
        }

        return ['status' => 'success', 'created' => $created, 'skipped' => $skipped];
    }

    public function logDelivery(array $data): void
    {
        $this->db->table('bf_social_delivery_logs')->insert([
            'export_job_id' => $data['export_job_id'] ?? null,
            'generated_post_id' => $data['generated_post_id'] ?? null,
            'platform_key' => $data['platform_key'] ?? null,
            'destination_type' => $data['destination_type'] ?? null,
            'status' => $data['status'] ?? 'pending',
            'request_payload_hash' => $data['request_payload_hash'] ?? null,
            'response_code' => $data['response_code'] ?? null,
            'response_body_excerpt' => isset($data['response_body_excerpt']) ? substr((string) $data['response_body_excerpt'], 0, 1000) : null,
            'error' => $data['error'] ?? null,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function getExportJobs(int $limit = 100): array
    {
        return $this->db->table('bf_social_export_jobs')
            ->orderBy('id', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    public function getDeliveryLogs(int $limit = 100): array
    {
        return $this->db->table('bf_social_delivery_logs')
            ->orderBy('id', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    public function recordPerformanceEvent(array $data): array
    {
        $allowed = ['impression', 'click', 'join', 'registration', 'upgrade', 'revenue'];

        $eventType = (string) ($data['event_type'] ?? '');
        if (! in_array($eventType, $allowed, true)) {
            return ['status' => 'failed', 'error' => 'Invalid event_type'];
        }

        $this->db->table('bf_social_performance_events')->insert([
            'generated_post_id' => $data['generated_post_id'] ?? null,
            'platform_key' => $data['platform_key'] ?? null,
            'event_type' => $eventType,
            'event_value' => $data['event_value'] ?? null,
            'metadata_json' => isset($data['metadata']) ? json_encode($data['metadata']) : ($data['metadata_json'] ?? null),
            'occurred_at' => $data['occurred_at'] ?? date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return ['status' => 'success', 'id' => $this->db->insertID()];
    }

    public function approveExportJob(int $jobId): array
    {
        $job = $this->db->table('bf_social_export_jobs')->where('id', $jobId)->get()->getRowArray();
        if (! $job) {
            return ['status' => 'failed', 'error' => 'Export job not found'];
        }

        $this->db->table('bf_social_export_jobs')->where('id', $jobId)->update([
            'status' => 'approved',
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return ['status' => 'success', 'export_job_id' => $jobId];
    }

}
