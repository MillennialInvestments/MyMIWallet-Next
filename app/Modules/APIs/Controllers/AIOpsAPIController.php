<?php

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseAPIController;
use App\Libraries\SiteSettingsOverride;
use App\Modules\AIOps\Services\AIOpsGuardrailService;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Throwable;

class AIOpsAPIController extends BaseAPIController
{
    use ResponseTrait;

    protected AIOpsGuardrailService $guardrail;
    protected SiteSettingsOverride $settingsOverride;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->guardrail        = new AIOpsGuardrailService();
        $this->settingsOverride = new SiteSettingsOverride();
    }

    public function health(): ResponseInterface
    {
        if ($guard = $this->authorizeInternalEndpoint(false)) {
            return $guard;
        }

        try {
            $settings = $this->settingsOverride->apply(config('SiteSettings'));
            $budget   = $this->guardrail->tablesAvailable() ? $this->guardrail->getTodayBudgetSummary() : null;

            return $this->respond([
                'aiops_enabled'          => $settings->aiops_enabled,
                'aiops_llm_enabled'      => $settings->aiops_llm_enabled,
                'aiops_daily_cap_usd'    => $settings->aiops_daily_cap_usd,
                'aiops_hard_stop_percent'=> $settings->aiops_hard_stop_percent,
                'budget'                 => $budget,
                'tables_available'       => $this->guardrail->tablesAvailable(),
            ]);
        } catch (Throwable $e) {
            log_message('error', '[API] {route} failed: {message}', [
                'route' => current_url(),
                'message' => $e->getMessage(),
            ]);

            return $this->failServerError('Internal processing error');
        }
    }

    public function policyCheck(): ResponseInterface
    {
        if (! $this->request->is('post')) {
            return $this->fail('Invalid method', 405);
        }

        if (! $this->guardrail->tablesAvailable()) {
            return $this->fail('AIOps tables not ready', 500);
        }

        $settings = $this->settingsOverride->apply(config('SiteSettings'));
        $payload  = $this->request->getJSON(true) ?? $this->request->getPost();
        $budget   = $this->guardrail->getTodayBudgetSummary();
        $requestId = $this->generateRequestId();

        if (! $settings->aiops_enabled || ! $settings->aiops_llm_enabled) {
            return $this->respond([
                'allowed'      => false,
                'reason'       => 'DISABLED',
                'request_id'   => $requestId,
                'budget'       => $budget,
            ]);
        }

        $validation = $this->guardrail->validateRecord($payload['title'] ?? '', $payload['content'] ?? '');
        if (! $validation['valid']) {
            return $this->respond([
                'allowed'    => false,
                'reason'     => $validation['reason'],
                'request_id' => $requestId,
                'budget'     => $budget,
            ]);
        }

        $workflowSlug = $payload['workflow_slug'] ?? null;
        $workflowId   = $payload['workflow_id'] ?? $workflowSlug ?? null;
        $estimatedCost= isset($payload['estimated_cost']) ? (float) $payload['estimated_cost'] : null;
        $subsystem    = $payload['subsystem'] ?? null;
        $sourceType   = $payload['source_type'] ?? '';
        $sourceId     = $payload['source_id'] ?? '';
        $scope        = $payload['cache_scope'] ?? 'default';

        if ($workflowId === null || $estimatedCost === null) {
            return $this->failValidationErrors('workflow_id and estimated_cost are required');
        }

        $contentHash  = $this->guardrail->hashContent($validation['title'], $validation['content'], $sourceType, (string) $sourceId);
        $cacheKey     = $this->guardrail->generateCacheKey($scope, $contentHash);

        $dedupeHit = $this->guardrail->checkDedupe($contentHash);
        if ($dedupeHit !== null) {
            $this->guardrail->touchDedupe($contentHash, $sourceType, $sourceId);
            return $this->respond([
                'allowed'      => false,
                'reason'       => 'DEDUPED',
                'request_id'   => $requestId,
                'content_hash' => $contentHash,
                'cache_key'    => $cacheKey,
                'budget'       => $budget,
            ]);
        }

        $cacheHit = $this->guardrail->checkCache($cacheKey);
        if ($cacheHit !== null) {
            $this->guardrail->touchDedupe($contentHash, $sourceType, $sourceId);
            return $this->respond([
                'allowed'      => false,
                'reason'       => 'CACHE_HIT',
                'request_id'   => $requestId,
                'content_hash' => $contentHash,
                'cache_key'    => $cacheKey,
                'cache'        => [
                    'payload'    => json_decode($cacheHit['payload_json'] ?? 'null', true),
                    'expires_at' => $cacheHit['expires_at'] ?? null,
                ],
                'budget'       => $budget,
            ]);
        }

        $this->guardrail->maybeSend80PercentAlert($budget, $subsystem);
        if ($this->guardrail->isHardStopReached($budget)) {
            return $this->respond([
                'allowed'      => false,
                'reason'       => 'HARD_STOP',
                'request_id'   => $requestId,
                'content_hash' => $contentHash,
                'cache_key'    => $cacheKey,
                'budget'       => $budget,
            ]);
        }

        $workflowBudget = $this->guardrail->checkWorkflowBudget((string) $workflowId, $workflowSlug, $estimatedCost);
        if (isset($workflowBudget['usage']['__exists'])) {
            unset($workflowBudget['usage']['__exists']);
        }
        if (! $workflowBudget['allowed']) {
            return $this->respond([
                'allowed'        => false,
                'reason'         => 'WORKFLOW_BUDGET',
                'request_id'     => $requestId,
                'workflow_id'    => $workflowId,
                'workflow_budget'=> $workflowBudget,
                'budget'         => $budget,
            ]);
        }

        // Record dedupe for the new hash.
        $this->guardrail->touchDedupe($contentHash, $sourceType, $sourceId);

        return $this->respond([
            'allowed'      => true,
            'reason'       => 'OK',
            'request_id'   => $requestId,
            'content_hash' => $contentHash,
            'cache_key'    => $cacheKey,
            'workflow_id'  => $workflowId,
            'workflow_slug'=> $workflowSlug,
            'workflow_budget'=> $workflowBudget,
            'budget'       => $budget,
        ]);
    }

    public function logUsage(): ResponseInterface
    {
        if (! $this->request->is('post')) {
            return $this->fail('Invalid method', 405);
        }

        if (! $this->guardrail->tablesAvailable()) {
            return $this->fail('AIOps tables not ready', 500);
        }

        $payload = $this->request->getJSON(true) ?? $this->request->getPost();
        $budget  = $this->guardrail->logUsage($payload);
        $this->guardrail->maybeSend80PercentAlert($budget, $payload['subsystem'] ?? null);

        return $this->respond([
            'status' => 'ok',
            'budget' => $budget,
        ]);
    }

    public function cacheStore(): ResponseInterface
    {
        if (! $this->request->is('post')) {
            return $this->fail('Invalid method', 405);
        }

        if (! $this->guardrail->tablesAvailable()) {
            return $this->fail('AIOps tables not ready', 500);
        }

        $payload = $this->request->getJSON(true) ?? $this->request->getPost();
        if (empty($payload['cache_key']) || empty($payload['scope']) || empty($payload['source_hash'])) {
            return $this->failValidationErrors('cache_key, scope, and source_hash are required');
        }

        $stored = $this->guardrail->storeCache(
            $payload['cache_key'],
            $payload['scope'],
            $payload['source_hash'],
            $payload['payload'] ?? [],
            isset($payload['ttl_seconds']) ? (int) $payload['ttl_seconds'] : null
        );

        if (! $stored) {
            return $this->fail('Unable to store cache payload', 500);
        }

        return $this->respond(['status' => 'ok']);
    }

    public function cacheGet(): ResponseInterface
    {
        if (! $this->guardrail->tablesAvailable()) {
            return $this->fail('AIOps tables not ready', 500);
        }

        $cacheKey = $this->request->getGet('cache_key') ?? '';
        if (! $cacheKey) {
            return $this->failValidationErrors('cache_key is required');
        }

        $cache = $this->guardrail->checkCache($cacheKey);
        if ($cache === null) {
            return $this->failNotFound('Cache miss');
        }

        return $this->respond([
            'cache_key' => $cacheKey,
            'scope'     => $cache['scope'] ?? null,
            'payload'   => json_decode($cache['payload_json'] ?? 'null', true),
            'expires_at'=> $cache['expires_at'] ?? null,
        ]);
    }

    public function toggle(): ResponseInterface
    {
        if (! $this->request->is('post')) {
            return $this->fail('Invalid method', 405);
        }

        $payload   = $this->request->getJSON(true) ?? $this->request->getPost();
        $allowList = [
            'aiops_enabled',
            'aiops_llm_enabled',
            'aiops_daily_cap_usd',
            'aiops_hard_stop_percent',
            'aiops_alert_email',
        ];

        $userId = function_exists('auth') ? auth()->id() : null;
        if ($userId === null) {
            return $this->fail('Unauthorized', 401);
        }

        $settings = $this->settingsOverride->apply(config('SiteSettings'));
        foreach ($payload as $key => $value) {
            if (! in_array($key, $allowList, true)) {
                continue;
            }

            $this->settingsOverride->save($key, (string) $value, $userId);
            $cacheKey = sanitizeCacheKey('aiops_' . $key);
            cache()->save($cacheKey, $this->castSetting($settings->$key ?? $value, $value), 86400);
        }

        return $this->respond(['status' => 'ok']);
    }

    public function testPolicy(): ResponseInterface
    {
        // Developer harness mirrors policy check but never triggers LLM.
        return $this->policyCheck();
    }

    protected function generateRequestId(): string
    {
        return bin2hex(random_bytes(16));
    }

    protected function castSetting($current, $value)
    {
        if (is_bool($current)) {
            return filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? false;
        }
        if (is_int($current)) {
            return (int) $value;
        }
        if (is_float($current)) {
            return (float) $value;
        }

        return $value;
    }
}
