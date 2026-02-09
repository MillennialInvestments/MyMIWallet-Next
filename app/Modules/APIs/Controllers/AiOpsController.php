<?php namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseController;
use App\Libraries\AiOps\AiOpsManager;
use App\Libraries\SiteSettingsOverride;
use CodeIgniter\API\ResponseTrait;
use Config\Services;
use Throwable;

class AiOpsController extends BaseController
{
    use ResponseTrait;

    protected AiOpsManager $manager;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->manager = new AiOpsManager();
    }

    protected function guardInternalOrAuthorized(): ?\CodeIgniter\HTTP\ResponseInterface
    {
        if (is_cli()) {
            return null;
        }

        $userId = function_exists('auth') ? auth()->id() : null;
        if ($userId !== null) {
            return null;
        }

        try {
            $tokenService = service('internalToken');
        } catch (Throwable $e) {
            log_message('error', '[API] internalToken service unavailable for {route}: {message}', [
                'route' => current_url(),
                'message' => $e->getMessage(),
            ]);

            return $this->failServerError('Internal processing error');
        }

        if ($tokenService && method_exists($tokenService, 'allowed') && $tokenService->allowed()) {
            return null;
        }

        log_message('warning', '[API] Internal endpoint blocked: {route}', ['route' => current_url()]);

        return $this->failForbidden('Internal endpoint');
    }

    public function status()
    {
        if ($guard = $this->guardInternalOrAuthorized()) {
            return $guard;
        }

        try {
            $monthKey  = $this->request->getGet('month') ?? $this->manager->getMonthKey();
            $summary   = $this->manager->getUsageSummary($monthKey);
            $settings  = (new SiteSettingsOverride())->apply(config('SiteSettings'));
            $db        = db_connect();
            $caps      = $db->tableExists('bf_ai_ops_caps') ? $db->table('bf_ai_ops_caps')->get()->getResultArray() : [];
            $runs      = $this->manager->getRecentRuns(20);
            $events    = $this->manager->getRecentEvents(50);

            return $this->respond([
                'month'    => $monthKey,
                'settings' => [
                    'aiOpsEnabled'             => $settings->aiOpsEnabled,
                    'aiOpsAllowOverride'       => $settings->aiOpsAllowOverride,
                    'aiSelfHostedEnabled'      => $settings->aiSelfHostedEnabled,
                    'aiChatgptPlusEnabled'     => $settings->aiChatgptPlusEnabled,
                    'aiCodexEnabled'           => $settings->aiCodexEnabled,
                    'aiGithubReviewEnabled'    => $settings->aiGithubReviewEnabled,
                    'aiGapTrackerSyncEnabled'  => $settings->aiGapTrackerSyncEnabled,
                    'aiAutoMarketingDraftsEnabled' => $settings->aiAutoMarketingDraftsEnabled,
                    'aiAutoAlertsDigestEnabled'=> $settings->aiAutoAlertsDigestEnabled,
                    'aiDocsAlignmentEnabled'   => $settings->aiDocsAlignmentEnabled,
                    'aiOpsAlertThresholdPct'   => $settings->aiOpsAlertThresholdPct,
                    'aiOpsAlertEmail'          => $settings->aiOpsAlertEmail,
                    'aiOpsMaxRunsPerHour'      => $settings->aiOpsMaxRunsPerHour,
                    'aiOpsMaxRuntimeSeconds'   => $settings->aiOpsMaxRuntimeSeconds,
                ],
                'caps'     => $caps,
                'usage'    => $summary,
                'runs'     => $runs,
                'events'   => $events,
            ]);
        } catch (Throwable $e) {
            log_message('error', '[API] {route} failed: {message}', [
                'route'   => current_url(),
                'message' => $e->getMessage(),
            ]);

            return $this->failServerError('Internal processing error');
        }
    }

    public function toggle()
    {
        if (! $this->request->is('post')) {
            return $this->fail('Invalid method', 405);
        }

        $key   = $this->request->getPost('key');
        $value = $this->request->getPost('value');

        $allowedKeys = [
            'aiOpsEnabled',
            'aiOpsAllowOverride',
            'aiSelfHostedEnabled',
            'aiChatgptPlusEnabled',
            'aiCodexEnabled',
            'aiGithubReviewEnabled',
            'aiGapTrackerSyncEnabled',
            'aiAutoMarketingDraftsEnabled',
            'aiAutoAlertsDigestEnabled',
            'aiDocsAlignmentEnabled',
        ];

        if (! in_array($key, $allowedKeys, true)) {
            return $this->failValidationErrors('Unsupported toggle');
        }

        $userId    = function_exists('auth') ? auth()->id() : null;
        if ($userId === null) {
            return $this->fail('Unauthorized', 401);
        }
        $override  = new SiteSettingsOverride();
        $override->save($key, (string) $value, $userId);

        cache()->save(sanitizeCacheKey('aiops:' . $key), filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? $value, 60 * 60 * 24 * 30);
        $this->manager->logEvent('ai_ops', 'TOGGLE_CHANGED', 'AI Ops toggle changed', [
            'key'   => $key,
            'value' => $value,
            'user'  => $userId,
        ]);

        return $this->respond(['status' => 'ok', 'key' => $key, 'value' => $value]);
    }

    public function run()
    {
        if (! $this->request->is('post')) {
            return $this->fail('Invalid method', 405);
        }

        $payload    = $this->request->getJSON(true) ?? $this->request->getPost();
        $jobKey     = $payload['jobKey'] ?? '';
        $subsystem  = $payload['subsystem'] ?? $this->mapSubsystem($jobKey);
        $userId     = function_exists('auth') ? auth()->id() : null;
        $webhookUrl = $this->getWebhookUrl($jobKey);
        $signature  = $this->request->getHeaderLine('X-MyMI-Signature');

        $rawBody = $this->request->getBody();
        if ($userId === null && ! $this->isValidSignature($rawBody, $signature)) {
            return $this->fail('Unauthorized', 401);
        }

        if (! $jobKey || ! $subsystem || ! $webhookUrl) {
            return $this->failValidationErrors('jobKey/subsystem/webhook missing');
        }

        $gate = $this->manager->canRun($subsystem, $jobKey, ['requestedBy' => $userId]);
        if (! $gate['allowed']) {
            return $this->respond(['allowed' => false, 'reason' => $gate['reason']], 200);
        }

        $runId   = $this->manager->startRun($jobKey, $subsystem, ['request' => $payload], $userId);
        if ($runId === null) {
            return $this->fail('AI Ops tables missing', 500);
        }
        $body    = [
            'runId'       => $runId,
            'jobKey'      => $jobKey,
            'subsystem'   => $subsystem,
            'userId'      => $userId,
            'requestedAt' => $payload['requestedAt'] ?? gmdate('c'),
            'context'     => $payload['context'] ?? [],
        ];
        $headers = [
            'Content-Type'      => 'application/json',
            'X-MyMI-Signature'  => $this->signPayload($body),
        ];

        $client = Services::curlrequest(['http_errors' => false]);
        $resp   = $client->post($webhookUrl, [
            'headers' => $headers,
            'json'    => $body,
        ]);

        if ($resp->getStatusCode() >= 300) {
            $message = 'Webhook call failed: ' . $resp->getStatusCode();
            $this->manager->finishRun($runId, 'ERROR', $message, ['response' => $resp->getBody()]);

            return $this->respond(['allowed' => false, 'reason' => $message], 500);
        }

        return $this->respond(['allowed' => true, 'runId' => $runId, 'webhook' => $webhookUrl]);
    }

    public function receiveResult()
    {
        $rawBody   = $this->request->getBody();
        $payload   = $this->request->getJSON(true) ?? [];
        $signature = $this->request->getHeaderLine('X-MyMI-Signature');

        if (! $this->isValidSignature($rawBody, $signature)) {
            return $this->fail('Invalid signature', 401);
        }

        $runId           = (int) ($payload['runId'] ?? 0);
        $jobKey          = $payload['jobKey'] ?? '';
        $subsystem       = $payload['subsystem'] ?? '';
        $status          = $payload['status'] ?? 'SUCCESS';
        $message         = $payload['message'] ?? '';
        $runtimeSeconds  = (int) ($payload['runtime_seconds'] ?? 0);
        $requests        = (int) ($payload['requests'] ?? 0);
        $cacheHits       = (int) ($payload['cache_hits'] ?? 0);
        $errors          = $status === 'ERROR' ? 1 : 0;
        $meta            = $payload['meta_json'] ?? $payload['meta'] ?? [];
        if (is_string($meta)) {
            $decoded = json_decode($meta, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $meta = $decoded;
            }
        }

        if (! $runId || ! $jobKey || ! $subsystem) {
            return $this->failValidationErrors('runId/jobKey/subsystem required');
        }

        $this->manager->finishRun($runId, $status, $message, is_array($meta) ? $meta : [], $runtimeSeconds, $requests, $cacheHits, $errors);

        return $this->respond(['status' => 'ok', 'runId' => $runId]);
    }

    protected function mapSubsystem(string $jobKey): ?string
    {
        return match ($jobKey) {
            'gap_sync'          => 'selfhost_gap_sync',
            'marketing_drafts'  => 'selfhost_marketing_drafts',
            'pr_review'         => 'selfhost_pr_review',
            default             => null,
        };
    }

    protected function getWebhookUrl(string $jobKey): ?string
    {
        return match ($jobKey) {
            'gap_sync'         => getenv('AI_N8N_WEBHOOK_GAP_SYNC'),
            'marketing_drafts' => getenv('AI_N8N_WEBHOOK_MARKETING_DRAFTS'),
            'pr_review'        => getenv('AI_N8N_WEBHOOK_PR_REVIEW'),
            default            => null,
        };
    }

    protected function signPayload(array $payload): string
    {
        $secret = getenv('AI_OPS_SHARED_SECRET') ?: '';
        $body   = json_encode($payload);

        return 'sha256=' . hash_hmac('sha256', $body, $secret);
    }

    protected function isValidSignature(string $rawBody, string $headerSignature): bool
    {
        if (! str_starts_with($headerSignature, 'sha256=')) {
            return false;
        }
        $secret = getenv('AI_OPS_SHARED_SECRET') ?: '';
        $expected = 'sha256=' . hash_hmac('sha256', $rawBody, $secret);

        return hash_equals($expected, $headerSignature);
    }
}
