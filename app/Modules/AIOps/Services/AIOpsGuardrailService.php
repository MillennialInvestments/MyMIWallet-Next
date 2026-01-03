<?php

namespace App\Modules\AIOps\Services;

use App\Config\SiteSettings;
use App\Libraries\SiteSettingsOverride;
use App\Modules\AIOps\Models\AIOpsBudgetModel;
use App\Modules\AIOps\Models\AIOpsCacheModel;
use App\Modules\AIOps\Models\AIOpsDedupeModel;
use App\Modules\AIOps\Models\AIOpsUsageModel;
use App\Modules\AIOps\Models\AIOpsWorkflowsModel;
use CodeIgniter\Database\BaseConnection;
use CodeIgniter\I18n\Time;
use Config\Services;

class AIOpsGuardrailService
{
    protected BaseConnection $db;
    protected AIOpsUsageModel $usageModel;
    protected AIOpsBudgetModel $budgetModel;
    protected AIOpsWorkflowsModel $workflowsModel;
    protected AIOpsCacheModel $cacheModel;
    protected AIOpsDedupeModel $dedupeModel;
    protected SiteSettings $settings;

    public function __construct()
    {
        $this->db             = db_connect();
        $this->usageModel     = new AIOpsUsageModel($this->db);
        $this->budgetModel    = new AIOpsBudgetModel($this->db);
        $this->workflowsModel = new AIOpsWorkflowsModel($this->db);
        $this->cacheModel     = new AIOpsCacheModel($this->db);
        $this->dedupeModel    = new AIOpsDedupeModel($this->db);
        $this->settings       = (new SiteSettingsOverride())->apply(config('SiteSettings'));
    }

    public function tablesAvailable(): bool
    {
        $required = [
            $this->usageModel->getTable(),
            $this->budgetModel->getTable(),
            $this->workflowsModel->getTable(),
            $this->cacheModel->getTable(),
            $this->dedupeModel->getTable(),
        ];

        foreach ($required as $table) {
            if (! $this->db->tableExists($table)) {
                return false;
            }
        }

        return true;
    }

    public function validateRecord(?string $title, ?string $content): array
    {
        $cleanTitle   = trim(strip_tags((string) $title));
        $cleanContent = trim(strip_tags((string) $content));

        if (mb_strlen($cleanTitle) < 4 || mb_strlen($cleanContent) < 12) {
            return ['valid' => false, 'reason' => 'VALIDATION_FAIL'];
        }

        return ['valid' => true, 'title' => $cleanTitle, 'content' => $cleanContent];
    }

    public function hashContent(string $title, string $content, string $sourceType = '', string $sourceId = ''): string
    {
        $normalized = mb_strtolower(trim($title)) . '|' . mb_strtolower(trim($content)) . '|' . trim($sourceType) . '|' . trim((string) $sourceId);

        return hash('sha256', $normalized);
    }

    public function generateCacheKey(string $scope, string $contentHash): string
    {
        return hash('sha256', $scope . '|' . $contentHash);
    }

    public function getTodayBudgetSummary(): array
    {
        $today = date('Y-m-d');
        $row   = $this->budgetModel->findByDate($today);

        if ($row === null) {
            $row = [
                'date'              => $today,
                'cap_usd'           => $this->settings->aiops_daily_cap_usd,
                'used_usd'          => 0,
                'hard_stop_percent' => $this->settings->aiops_hard_stop_percent,
                'is_enabled'        => 1,
                'alerted_at_80'     => null,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ];
            $this->budgetModel->insert($row);
        }

        $cap     = (float) ($row['cap_usd'] ?? 0);
        $used    = (float) ($row['used_usd'] ?? 0);
        $percent = $cap > 0 ? (int) floor(($used / $cap) * 100) : 100;

        return [
            'id'                => $row['id'] ?? $this->budgetModel->getInsertID(),
            'cap'               => round($cap, 2),
            'used'              => round($used, 2),
            'percent'           => $percent,
            'hard_stop_percent' => (int) ($row['hard_stop_percent'] ?? $this->settings->aiops_hard_stop_percent),
            'alerted_at_80'     => $row['alerted_at_80'] ?? null,
        ];
    }

    public function isHardStopReached(array $budget): bool
    {
        $hardStopPercent = (int) ($budget['hard_stop_percent'] ?? 80);

        return ($budget['percent'] ?? 0) >= $hardStopPercent;
    }

    public function maybeSend80PercentAlert(array $budget, ?string $subsystem = null): void
    {
        if (! empty($budget['alerted_at_80'])) {
            return;
        }

        $threshold = min(80, (int) ($budget['hard_stop_percent'] ?? 80));
        if (($budget['percent'] ?? 0) < $threshold) {
            return;
        }

        $email = Services::email();
        $email->setTo($this->settings->aiops_alert_email);
        $email->setSubject('MyMI Wallet AIOps budget at 80%');

        $message = "AIOps budget alert\n\n";
        $message .= "Cap: \${$budget['cap']}\nUsed: \${$budget['used']}\nPercent: {$budget['percent']}%\n";
        $message .= "Hard stop at: {$budget['hard_stop_percent']}%\n";
        if ($subsystem) {
            $message .= "Subsystem: {$subsystem}\n";
        }

        $recent = $this->usageModel->orderBy('created_at', 'desc')->limit(10)->findAll();
        if (! empty($recent)) {
            $message .= "\nRecent usage:\n";
            foreach ($recent as $row) {
                $message .= "- {$row['date']} {$row['provider']} {$row['model']} \${$row['cost_est']} ({$row['subsystem']})\n";
            }
        }

        $email->setMessage($message);
        $email->send();

        if (! empty($budget['id'])) {
            $this->budgetModel->update($budget['id'], ['alerted_at_80' => Time::now()->toDateTimeString()]);
        }
    }

    public function checkCache(string $cacheKey): ?array
    {
        return $this->cacheModel->findValidCache($cacheKey);
    }

    public function storeCache(string $cacheKey, string $scope, string $sourceHash, array $payload, ?int $ttlSeconds = null): bool
    {
        $expiresAt = $ttlSeconds ? Time::now()->addSeconds($ttlSeconds)->toDateTimeString() : null;
        $existing  = $this->cacheModel->where('cache_key', $cacheKey)->first();

        $data = [
            'cache_key'    => $cacheKey,
            'scope'        => $scope,
            'source_hash'  => $sourceHash,
            'payload_json' => json_encode($payload),
            'expires_at'   => $expiresAt,
            'created_at'   => $existing['created_at'] ?? Time::now()->toDateTimeString(),
        ];

        if ($existing !== null) {
            return (bool) $this->cacheModel->update($existing['id'], $data);
        }

        return (bool) $this->cacheModel->insert($data);
    }

    public function checkDedupe(string $hash): ?array
    {
        return $this->dedupeModel->findByHash($hash);
    }

    public function touchDedupe(string $hash, string $sourceType, $sourceId = null): void
    {
        $existing = $this->dedupeModel->findByHash($hash);
        $now      = Time::now()->toDateTimeString();

        if ($existing) {
            $this->dedupeModel->update($existing['id'], [
                'last_seen_at' => $now,
                'seen_count'   => ($existing['seen_count'] ?? 1) + 1,
            ]);

            return;
        }

        $this->dedupeModel->insert([
            'source_type'  => $sourceType,
            'source_id'    => $sourceId,
            'content_hash' => $hash,
            'first_seen_at'=> $now,
            'last_seen_at' => $now,
            'seen_count'   => 1,
        ]);
    }

    public function logUsage(array $payload): array
    {
        $now = Time::now()->toDateTimeString();

        $data = [
            'date'          => date('Y-m-d'),
            'provider'      => $payload['provider'] ?? '',
            'model'         => $payload['model'] ?? '',
            'tokens_in'     => (int) ($payload['tokens_in'] ?? 0),
            'tokens_out'    => (int) ($payload['tokens_out'] ?? 0),
            'cost_est'      => (float) ($payload['cost_est'] ?? 0),
            'subsystem'     => $payload['subsystem'] ?? '',
            'request_id'    => $payload['request_id'] ?? '',
            'workflow_slug' => $payload['workflow_slug'] ?? null,
            'user_id'       => $payload['user_id'] ?? null,
            'meta_json'     => isset($payload['meta']) ? json_encode($payload['meta']) : null,
            'created_at'    => $now,
        ];

        $this->usageModel->insertUsage($data);

        $budget = $this->getTodayBudgetSummary();
        $updatedUsed = round(($budget['used'] ?? 0) + $data['cost_est'], 4);
        $this->budgetModel->update($budget['id'], [
            'used_usd'  => $updatedUsed,
            'updated_at'=> $now,
        ]);

        $budget['used']    = $updatedUsed;
        $budget['percent'] = ($budget['cap'] ?? 0) > 0 ? (int) floor(($updatedUsed / $budget['cap']) * 100) : 100;

        return $budget;
    }
}
