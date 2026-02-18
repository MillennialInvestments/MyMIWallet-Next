<?php

namespace App\Libraries\AiOps;

use Config\SiteSettings;
use App\Libraries\SiteSettingsOverride;
use CodeIgniter\Database\BaseConnection;
use Config\Services;
use DateTime;
use DateTimeZone;

class AiOpsManager
{
    protected BaseConnection $db;
    protected SiteSettings $settings;
    protected DateTimeZone $tz;

    public function __construct(?BaseConnection $db = null, ?SiteSettings $settings = null)
    {
        $this->db       = $db ?? db_connect();
        $this->tz       = new DateTimeZone('America/Chicago');
        $baseSettings   = $settings ?? config('SiteSettings');
        $this->settings = (new SiteSettingsOverride($this->db))->apply($baseSettings);
    }

    public function getMonthKey(?DateTime $date = null): string
    {
        $date ??= new DateTime('now', $this->tz);

        return $date->format('Y-m');
    }

    /**
     * @return array{allowed:bool,reason:string,monthKey:string,cap:?array,used:float,pct:float}
     */
    public function canRun(string $subsystem, string $jobKey, array $context = []): array
    {
        $monthKey = $context['monthKey'] ?? $this->getMonthKey();

        if (! $this->tablesReady()) {
            return ['allowed' => false, 'reason' => 'ai_ops_tables_missing', 'monthKey' => $monthKey, 'cap' => null, 'used' => 0.0, 'pct' => 0.0];
        }

        if (! $this->settings->aiOpsEnabled) {
            return ['allowed' => false, 'reason' => 'ai_ops_disabled', 'monthKey' => $monthKey, 'cap' => null, 'used' => 0.0, 'pct' => 0.0];
        }

        if (! $this->isSubsystemEnabled($subsystem)) {
            return ['allowed' => false, 'reason' => 'subsystem_disabled', 'monthKey' => $monthKey, 'cap' => null, 'used' => 0.0, 'pct' => 0.0];
        }

        $cap   = $this->getCap($subsystem);
        $usage = $this->getUsageRow($subsystem, $monthKey);
        $used  = (float) ($usage['capacity_used'] ?? (($usage['runtime_seconds'] ?? 0) / 60));

        if (! $cap || (int) $cap['is_enabled'] === 0) {
            return ['allowed' => false, 'reason' => 'cap_disabled', 'monthKey' => $monthKey, 'cap' => $cap, 'used' => $used, 'pct' => 0.0];
        }

        $capValue = (float) $cap['cap_value'];
        $pct      = $capValue > 0 ? round(($used / $capValue) * 100, 2) : 0.0;

        if ($capValue > 0 && $used >= $capValue && ! $this->settings->aiOpsAllowOverride) {
            $this->logEvent($subsystem, 'CAP_REACHED_LOCKOUT', 'Cap reached; request denied', ['monthKey' => $monthKey, 'used' => $used, 'cap' => $capValue, 'jobKey' => $jobKey]);

            return ['allowed' => false, 'reason' => 'cap_reached', 'monthKey' => $monthKey, 'cap' => $cap, 'used' => $used, 'pct' => $pct];
        }

        return ['allowed' => true, 'reason' => 'ok', 'monthKey' => $monthKey, 'cap' => $cap, 'used' => $used, 'pct' => $pct];
    }

    /**
     * Compatibility wrapper for legacy clients.
     *
     * @return array{allowed:bool,reason:string}
     */
    public function assertCanRun(string $subsystem, array $context = []): array
    {
        $jobKey = $context['jobKey'] ?? $subsystem;
        $result = $this->canRun($subsystem, $jobKey, $context);

        return ['allowed' => $result['allowed'], 'reason' => $result['reason']];
    }

    public function startRun(string $jobKey, string $subsystem, array $meta = [], ?int $createdBy = null): ?int
    {
        if (! $this->tablesReady()) {
            return null;
        }

        $now = new DateTime('now', $this->tz);
        $this->db->table('bf_ai_ops_runs')->insert([
            'job_key'     => $jobKey,
            'subsystem'   => $subsystem,
            'status'      => 'STARTED',
            'started_at'  => $now->format('Y-m-d H:i:s'),
            'created_at'  => $now->format('Y-m-d H:i:s'),
            'created_by'  => $createdBy,
            'meta_json'   => ! empty($meta) ? json_encode($meta) : null,
        ]);

        return (int) $this->db->insertID();
    }

    public function finishRun(int $runId, string $status, string $message = '', array $meta = [], ?int $runtimeSeconds = null, int $requests = 0, int $cacheHits = 0, int $errors = 0): void
    {
        if (! $this->tablesReady()) {
            return;
        }

        $run = $this->db->table('bf_ai_ops_runs')->where('id', $runId)->get()->getRowArray();
        if (! $run) {
            return;
        }

        $startedAt = new DateTime($run['started_at'], $this->tz);
        $finished  = new DateTime('now', $this->tz);
        $runtimeSeconds ??= max(0, $finished->getTimestamp() - $startedAt->getTimestamp());
        $monthKey = $this->getMonthKey($finished);

        $this->db->table('bf_ai_ops_runs')->where('id', $runId)->update([
            'status'          => $status,
            'finished_at'     => $finished->format('Y-m-d H:i:s'),
            'runtime_seconds' => $runtimeSeconds,
            'message'         => $message,
            'meta_json'       => ! empty($meta) ? json_encode($meta) : $run['meta_json'],
        ]);

        $this->updateUsage($run['subsystem'], $monthKey, $runtimeSeconds, $requests, $cacheHits, $errors);
        $this->logEvent($run['subsystem'], 'JOB_RESULT', $message, array_merge($meta, [
            'runId'     => $runId,
            'job_key'   => $run['job_key'],
            'status'    => $status,
            'runtime'   => $runtimeSeconds,
            'monthKey'  => $monthKey,
            'requests'  => $requests,
            'cacheHits' => $cacheHits,
            'errors'    => $errors,
        ]));

        $this->maybeSendAlert($run['subsystem'], $monthKey);
    }

    /**
     * Lightweight usage recorder for cached/in-process executions.
     */
    public function recordUsage(
        string $subsystem,
        int $tokensIn,
        int $tokensOut,
        float $costUsd,
        bool $cacheHit,
        bool $success,
        array $meta = []
    ): void {
        if (! $this->tablesReady()) {
            return;
        }

        $monthKey = $this->getMonthKey();
        $runtime  = (int) ($meta['runtime_seconds'] ?? 60);
        $this->updateUsage($subsystem, $monthKey, $runtime, 1, $cacheHit ? 1 : 0, $success ? 0 : 1);
        $this->logEvent($subsystem, $meta['event_type'] ?? 'USAGE_RECORDED', $meta['message'] ?? '', array_merge($meta, [
            'tokens_in'  => $tokensIn,
            'tokens_out' => $tokensOut,
            'cost_usd'   => $costUsd,
            'cache_hit'  => $cacheHit,
            'success'    => $success,
        ]));
        $this->maybeSendAlert($subsystem, $monthKey);
    }

    public function getUsageSummary(?string $monthKey = null): array
    {
        if (! $this->tablesReady()) {
            return [];
        }

        $monthKey = $monthKey ?? $this->getMonthKey();
        $caps     = $this->db->table('bf_ai_ops_caps')->get()->getResultArray();
        $usage    = $this->db->table('bf_ai_ops_usage')->where('month_key', $monthKey)->get()->getResultArray();

        $usageBySubsystem = [];
        foreach ($usage as $row) {
            $usageBySubsystem[$row['subsystem']] = $row;
        }

        $summary = [];
        foreach ($caps as $cap) {
            $subsystem   = $cap['subsystem'];
            $usageRow    = $usageBySubsystem[$subsystem] ?? [];
            $used        = (float) ($usageRow['capacity_used'] ?? ($usageRow['runtime_seconds'] ?? 0) / 60);
            $capValue    = (float) ($cap['cap_value'] ?? 0);
            $pct         = $capValue > 0 ? round(($used / $capValue) * 100, 2) : 0.0;
            $summary[$subsystem] = [
                'cap'             => $cap,
                'usage'           => $usageRow,
                'percent_used'    => $pct,
                'runtime_seconds' => (int) ($usageRow['runtime_seconds'] ?? 0),
                'runs'            => (int) ($usageRow['runs'] ?? 0),
                'requests'        => (int) ($usageRow['requests'] ?? 0),
                'cache_hits'      => (int) ($usageRow['cache_hits'] ?? 0),
                'errors'          => (int) ($usageRow['errors'] ?? 0),
            ];
        }

        return $summary;
    }

    public function getRecentRuns(int $limit = 20): array
    {
        if (! $this->tablesReady()) {
            return [];
        }

        return $this->db->table('bf_ai_ops_runs')
            ->orderBy('started_at', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    public function getRecentEvents(int $limit = 50): array
    {
        if (! $this->tablesReady()) {
            return [];
        }

        return $this->db->table('bf_ai_ops_events')
            ->orderBy('id', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    public function logEvent(string $subsystem, string $eventType, string $message = '', array $meta = []): void
    {
        if (! $this->tablesReady()) {
            return;
        }

        $this->db->table('bf_ai_ops_events')->insert([
            'subsystem'  => $subsystem,
            'event_type' => $eventType,
            'message'    => $message,
            'meta_json'  => ! empty($meta) ? json_encode($meta) : null,
            'created_at' => (new DateTime('now', $this->tz))->format('Y-m-d H:i:s'),
        ]);
    }

    protected function isSubsystemEnabled(string $subsystem): bool
    {
        $map = [
            'selfhost_gap_sync'        => $this->settings->aiSelfHostedEnabled && $this->settings->aiGapTrackerSyncEnabled,
            'selfhost_marketing_drafts'=> $this->settings->aiSelfHostedEnabled && $this->settings->aiAutoMarketingDraftsEnabled,
            'selfhost_pr_review'       => $this->settings->aiSelfHostedEnabled && $this->settings->aiGithubReviewEnabled,
        ];

        return $map[$subsystem] ?? $this->settings->aiSelfHostedEnabled;
    }

    protected function getCap(string $subsystem): ?array
    {
        $db = db_connect();
        $query = $db->table('bf_ai_ops_caps')
                    ->where('subsystem', $subsystem)
                    ->limit(1)
                    ->limit(20)->get();

        $row = $query->getRowArray(); // 
        if (empty($row)) {
            log_message('debug', "AiOpsManager: No cap found for subsystem '{$subsystem}'");
            return null; // or your default structure
        }
        return $row;

    }

    protected function getUsageRow(string $subsystem, string $monthKey): array
    {
        return $this->db->table('bf_ai_ops_usage')
            ->where('subsystem', $subsystem)
            ->where('month_key', $monthKey)
            ->get()
            ->getRowArray() ?? [];
    }

    protected function updateUsage(string $subsystem, string $monthKey, int $runtimeSeconds, int $requests = 0, int $cacheHits = 0, int $errors = 0): void
    {
        $existing = $this->getUsageRow($subsystem, $monthKey);
        $now      = new DateTime('now', $this->tz);

        $cap      = $this->getCap($subsystem);
        $capType  = $cap['cap_type'] ?? 'CAPACITY';
        $capacityIncrement = $capType === 'TOKENS' ? $requests : ($capType === 'USD' ? 0 : ($runtimeSeconds / 60));

        $data = [
            'month_key'       => $monthKey,
            'subsystem'       => $subsystem,
            'runs'            => (int) ($existing['runs'] ?? 0) + 1,
            'runtime_seconds' => (int) ($existing['runtime_seconds'] ?? 0) + $runtimeSeconds,
            'requests'        => (int) ($existing['requests'] ?? 0) + $requests,
            'cache_hits'      => (int) ($existing['cache_hits'] ?? 0) + $cacheHits,
            'errors'          => (int) ($existing['errors'] ?? 0) + $errors,
            'capacity_used'   => (float) ($existing['capacity_used'] ?? 0) + $capacityIncrement,
            'updated_at'      => $now->format('Y-m-d H:i:s'),
        ];

        if ($existing) {
            $this->db->table('bf_ai_ops_usage')
                ->where('month_key', $monthKey)
                ->where('subsystem', $subsystem)
                ->update($data);
        } else {
            $this->db->table('bf_ai_ops_usage')->insert($data);
        }
    }

    protected function maybeSendAlert(string $subsystem, string $monthKey): void
    {
        if (! $this->tablesReady()) {
            return;
        }

        $cap = $this->getCap($subsystem);
        if (! $cap || (int) $cap['is_enabled'] === 0) {
            return;
        }

        $usage = $this->getUsageRow($subsystem, $monthKey);
        $used  = (float) ($usage['capacity_used'] ?? ($usage['runtime_seconds'] ?? 0) / 60);
        $capValue = (float) ($cap['cap_value'] ?? 0);
        if ($capValue <= 0) {
            return;
        }

        $pct      = $capValue > 0 ? ($used / $capValue) * 100 : 0;
        $threshold = $this->settings->aiOpsAlertThresholdPct;
        if ($pct < $threshold) {
            return;
        }

        if ($this->hasAlertEvent($subsystem, $monthKey)) {
            return;
        }

        $email   = Services::email();
        $subject = sprintf('MyMI Wallet AI Ops Alert: %s at %s%% of monthly capacity', $subsystem, round($pct, 1));
        $body    = "Subsystem {$subsystem} reached {$pct}% of capacity for {$monthKey}.";

        try {
            $sent = $email->setTo($this->settings->aiOpsAlertEmail)
                ->setSubject($subject)
                ->setMessage($body)
                ->send();
        } catch (\Throwable $e) {
            $sent = false;
            $this->logEvent($subsystem, 'ALERT_SEND_FAILED', $e->getMessage(), ['monthKey' => $monthKey]);
        }

        $this->logEvent($subsystem, 'ALERT_80_SENT', $sent ? 'Alert email sent' : 'Alert email failed', [
            'monthKey' => $monthKey,
            'pct'      => round($pct, 2),
            'cap'      => $capValue,
            'used'     => $used,
            'email'    => $this->settings->aiOpsAlertEmail,
            'sent'     => $sent,
        ]);
    }

    protected function hasAlertEvent(string $subsystem, string $monthKey): bool
    {
        return (bool) $this->db->table('bf_ai_ops_events')
            ->like('meta_json', $monthKey, 'both')
            ->where('subsystem', $subsystem)
            ->where('event_type', 'ALERT_80_SENT')
            ->get()
            ->getRowArray();
    }

    protected function tablesReady(): bool
    {
        return $this->db->tableExists('bf_ai_ops_caps')
            && $this->db->tableExists('bf_ai_ops_runs')
            && $this->db->tableExists('bf_ai_ops_usage')
            && $this->db->tableExists('bf_ai_ops_events');
    }
}
