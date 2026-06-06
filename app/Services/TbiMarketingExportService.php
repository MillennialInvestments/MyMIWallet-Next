<?php

namespace App\Services;

class TbiMarketingExportService
{
    protected SocialExportService $exportService;

    public function __construct()
    {
        $this->exportService = new SocialExportService();
    }

    public function send(int $exportJobId): array
    {
        $enabled = filter_var(env('MYMI_MARKETING_EXPORT_ENABLED', false), FILTER_VALIDATE_BOOLEAN);
        $baseUrl = rtrim((string) env('TBI_MARKETING_API_BASE', ''), '/');
        $apiKey  = (string) env('TBI_MARKETING_API_KEY', '');

        $job = $this->exportService->getExportJob($exportJobId);

        if (! $job) {
            return ['status' => 'failed', 'error' => 'Export job not found'];
        }

        if (! $enabled) {
            $this->logSkipped($job, 'MYMI_MARKETING_EXPORT_ENABLED is false');
            return ['status' => 'skipped', 'reason' => 'MYMI_MARKETING_EXPORT_ENABLED is false'];
        }

        if ($baseUrl === '' || $apiKey === '') {
            $this->logFailed($job, 'Missing TBI_MARKETING_API_BASE or TBI_MARKETING_API_KEY');
            return ['status' => 'failed', 'error' => 'Missing TBI Marketing API config'];
        }

        if (! in_array((string) $job['status'], ['approved', 'queued'], true)) {
            $this->logSkipped($job, 'Job status is not approved/queued');
            return ['status' => 'skipped', 'reason' => 'Job status is not approved/queued'];
        }

        $payload = $job['payload_json'] ?: '{}';
        $endpoint = $baseUrl . '/API/Marketing/importDraft';

        $this->exportService->incrementExportJobAttempts((int) $job['id']);

        $ch = curl_init($endpoint);
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $apiKey,
                'X-Source-App: mymiwallet',
            ],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 20,
        ]);

        $response = curl_exec($ch);
        $code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error || $code < 200 || $code >= 300) {
            $message = $error ?: 'HTTP ' . $code;
            $this->logFailed($job, $message, $code, $response);
            $this->exportService->updateExportJobStatus((int) $job['id'], 'failed', $message);
            return ['status' => 'failed', 'response_code' => $code, 'error' => $message];
        }

        $this->exportService->updateExportJobStatus((int) $job['id'], 'sent');

        $this->exportService->logDelivery([
            'export_job_id' => $job['id'],
            'generated_post_id' => $job['generated_post_id'],
            'destination_type' => 'tbi_marketing',
            'status' => 'sent',
            'request_payload_hash' => hash('sha256', $payload),
            'response_code' => $code,
            'response_body_excerpt' => $response,
        ]);

        return ['status' => 'sent', 'response_code' => $code];
    }

    public function batchSend(int $limit = 10): array
    {
        $db = \Config\Database::connect();

        $jobs = $db->table('bf_social_export_jobs')
            ->where('destination_type', 'tbi_marketing')
            ->whereIn('status', ['approved', 'queued'])
            ->limit($limit)
            ->get()
            ->getResultArray();

        $results = [];

        foreach ($jobs as $job) {
            $results[] = $this->send((int) $job['id']);
        }

        return [
            'status' => 'success',
            'processed' => count($results),
            'results' => $results,
        ];
    }

    protected function logSkipped(array $job, string $reason): void
    {
        $this->exportService->logDelivery([
            'export_job_id' => $job['id'] ?? null,
            'generated_post_id' => $job['generated_post_id'] ?? null,
            'destination_type' => 'tbi_marketing',
            'status' => 'skipped',
            'error' => $reason,
            'request_payload_hash' => hash('sha256', $job['payload_json'] ?? ''),
        ]);
    }

    protected function logFailed(array $job, string $error, ?int $code = null, ?string $response = null): void
    {
        $this->exportService->logDelivery([
            'export_job_id' => $job['id'] ?? null,
            'generated_post_id' => $job['generated_post_id'] ?? null,
            'destination_type' => 'tbi_marketing',
            'status' => 'failed',
            'error' => $error,
            'response_code' => $code,
            'response_body_excerpt' => $response,
            'request_payload_hash' => hash('sha256', $job['payload_json'] ?? ''),
        ]);
    }
}
