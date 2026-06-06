<?php

namespace App\Services;

use Config\Database;

class ZapierWebhookService
{
    protected $db;
    protected SocialExportService $exportService;

    public function __construct()
    {
        $this->db = Database::connect();
        $this->exportService = new SocialExportService();
    }

    public function send(int $exportJobId): array
    {
        $enabled = filter_var(env('MYMI_ZAPIER_EXPORT_ENABLED', false), FILTER_VALIDATE_BOOLEAN);
        $url = env('ZAPIER_COMMUNITY_WEBHOOK_URL');

        $job = $this->db->table('bf_social_export_jobs')->where('id', $exportJobId)->get()->getRowArray();

        if (! $job) {
            return ['status' => 'failed', 'error' => 'Export job not found'];
        }

        if (! $enabled) {
            $this->markSkipped($job, 'Zapier export disabled');
            return ['status' => 'skipped', 'error' => 'Zapier export disabled'];
        }

        if (empty($url)) {
            $this->markFailed($job, 'Missing ZAPIER_COMMUNITY_WEBHOOK_URL');
            return ['status' => 'failed', 'error' => 'Missing ZAPIER_COMMUNITY_WEBHOOK_URL'];
        }

        if (! in_array($job['status'], ['approved', 'queued'], true)) {
            $this->markSkipped($job, 'Job status is not approved/queued');
            return ['status' => 'skipped', 'error' => 'Job status is not approved/queued'];
        }

        $payload = $job['payload_json'] ?: '{}';

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 20,
        ]);

        $response = curl_exec($ch);
        $code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error || $code < 200 || $code >= 300) {
            $this->markFailed($job, $error ?: 'HTTP ' . $code, $code, $response);
            return ['status' => 'failed', 'response_code' => $code, 'error' => $error ?: $response];
        }

        $this->db->table('bf_social_export_jobs')->where('id', $exportJobId)->update([
            'status' => 'sent',
            'attempts' => ((int) $job['attempts']) + 1,
            'sent_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $this->exportService->logDelivery([
            'export_job_id' => $exportJobId,
            'generated_post_id' => $job['generated_post_id'],
            'destination_type' => 'zapier',
            'status' => 'sent',
            'request_payload_hash' => hash('sha256', $payload),
            'response_code' => $code,
            'response_body_excerpt' => $response,
        ]);

        return ['status' => 'sent', 'response_code' => $code];
    }

    protected function markSkipped(array $job, string $reason): void
    {
        $this->exportService->logDelivery([
            'export_job_id' => $job['id'] ?? null,
            'generated_post_id' => $job['generated_post_id'] ?? null,
            'destination_type' => 'zapier',
            'status' => 'skipped',
            'error' => $reason,
            'request_payload_hash' => hash('sha256', $job['payload_json'] ?? ''),
        ]);
    }

    protected function markFailed(array $job, string $error, ?int $code = null, ?string $response = null): void
    {
        $this->db->table('bf_social_export_jobs')->where('id', $job['id'])->update([
            'status' => 'failed',
            'attempts' => ((int) ($job['attempts'] ?? 0)) + 1,
            'last_error' => $error,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $this->exportService->logDelivery([
            'export_job_id' => $job['id'] ?? null,
            'generated_post_id' => $job['generated_post_id'] ?? null,
            'destination_type' => 'zapier',
            'status' => 'failed',
            'error' => $error,
            'response_code' => $code,
            'response_body_excerpt' => $response,
            'request_payload_hash' => hash('sha256', $job['payload_json'] ?? ''),
        ]);
    }
}
