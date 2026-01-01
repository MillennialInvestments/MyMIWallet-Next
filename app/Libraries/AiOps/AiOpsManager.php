<?php

namespace App\Libraries\AiOps;

use App\Config\SiteSettings;
use CodeIgniter\Database\BaseConnection;
use Config\Services;
use DateTime;
use DateTimeZone;

class AiOpsManager
{
    protected BaseConnection $db;
    protected $cache;
    protected SiteSettings $settings;
    protected DateTimeZone $tz;

    public function __construct(?BaseConnection $db = null, ?SiteSettings $settings = null)
    {
        $this->db       = $db ?? db_connect();
        $this->settings = $settings ?? config('SiteSettings');
        $this->cache    = cache();
        $this->tz       = new DateTimeZone('America/Chicago');
    }

    public function isEnabled(string $subsystem): bool
    {
        if (! $this->settings->aiOpsEnabled) {
            return false;
        }

        $map = [
            'chatgpt_marketing'     => $this->settings->aiChatgptApiEnabled && $this->settings->aiAutoMarketingEnabled,
            'chatgpt_alerts'        => $this->settings->aiChatgptApiEnabled && $this->settings->aiAutoAlertsEnabled,
            'chatgpt_analytics'     => $this->settings->aiChatgptApiEnabled && $this->settings->aiAutoAnalyticsEnabled,
            'codex_codegen'         => $this->settings->aiCodexApiEnabled,
            'codex_docs_alignment'  => $this->settings->aiCodexApiEnabled && $this->settings->aiDocsAlignmentEnabled,
            'ai_github_reviews'     => $this->settings->aiGithubReviewsEnabled,
        ];

        return $map[$subsystem] ?? false;
    }

    /**
     * @return array{allowed:bool,reason:string}
     */
    public function assertCanRun(string $subsystem, array $context = []): array
    {
        if (! $this->settings->aiOpsEnabled) {
            return ['allowed' => false, 'reason' => 'ai_ops_disabled'];
        }

        if (! $this->isEnabled($subsystem)) {
            return ['allowed' => false, 'reason' => 'subsystem_disabled'];
        }

        $cap = $this->getCap($subsystem);
        if (! $cap || (int) $cap['is_enabled'] === 0) {
            return ['allowed' => false, 'reason' => 'cap_disabled'];
        }

        $monthKey = $context['monthKey'] ?? $this->getMonthKey();
        $usage    = $this->getUsageRow($subsystem, $monthKey);
        $used     = $usage['cost_usd'] ?? 0;
        $capUsd   = $cap['cap_usd'] ?? 0;

        if ($capUsd > 0 && $used >= $capUsd && ! $this->settings->aiOpsAllowOverride) {
            $this->logEvent($subsystem, 'CAP_REACHED_STOPPED', 'Cap reached; request denied', ['monthKey' => $monthKey, 'used' => $used, 'cap' => $capUsd]);

            return ['allowed' => false, 'reason' => 'cap_reached'];
        }

        return ['allowed' => true, 'reason' => 'ok'];
    }

    public function recordUsage(
        string $subsystem,
        int $tokensIn,
        int $tokensOut,
        float $costUsd,
        bool $cacheHit,
        bool $success,
        array $meta = []
    ): void {
        $now      = new DateTime('now', $this->tz);
        $dateKey  = $now->format('Y-m-d');
        $monthKey = $now->format('Y-m');

        $builder = $this->db->table('bf_ai_ops_usage');
        $existing = $builder->where('subsystem', $subsystem)->where('date_key', $dateKey)->get()->getFirstRowArray();

        $data = [
            'subsystem'      => $subsystem,
            'date_key'       => $dateKey,
            'month_key'      => $monthKey,
            'requests'       => ($existing['requests'] ?? 0) + 1,
            'tokens_in'      => ($existing['tokens_in'] ?? 0) + $tokensIn,
            'tokens_out'     => ($existing['tokens_out'] ?? 0) + $tokensOut,
            'cost_usd'       => ($existing['cost_usd'] ?? 0) + $costUsd,
            'cache_hits'     => ($existing['cache_hits'] ?? 0) + ($cacheHit ? 1 : 0),
            'status_success' => ($existing['status_success'] ?? 0) + ($success ? 1 : 0),
            'status_error'   => ($existing['status_error'] ?? 0) + ($success ? 0 : 1),
            'updated_at'     => $now->format('Y-m-d H:i:s'),
        ];

        if ($existing) {
            $builder->where('id', $existing['id'])->update($data);
        } else {
            $data['created_at'] = $now->format('Y-m-d H:i:s');
            $builder->insert($data);
        }

        if (! empty($meta)) {
            $this->logEvent($subsystem, $meta['event_type'] ?? 'USAGE_RECORDED', $meta['message'] ?? '', $meta);
        }
    }

    public function getUsageSummary(?string $monthKey = null): array
    {
        $monthKey = $monthKey ?? $this->getMonthKey();
        $caps     = $this->db->table('bf_ai_ops_caps')->get()->getResultArray();
        $usage    = $this->db->table('bf_ai_ops_usage')
            ->select('subsystem, SUM(cost_usd) as cost_usd, SUM(requests) as requests, SUM(cache_hits) as cache_hits, SUM(status_error) as status_error, SUM(status_success) as status_success')
            ->where('month_key', $monthKey)
            ->groupBy('subsystem')
            ->get()->getResultArray();

        $usageBySubsystem = [];
        foreach ($usage as $row) {
            $usageBySubsystem[$row['subsystem']] = $row;
        }

        $summary = [];
        foreach ($caps as $cap) {
            $subsystem = $cap['subsystem'];
            $used      = $usageBySubsystem[$subsystem]['cost_usd'] ?? 0;
            $capUsd    = $cap['cap_usd'] ?? 0;
            $pct       = $capUsd > 0 ? round(($used / $capUsd) * 100, 2) : 0;

            $summary[$subsystem] = [
                'cap_usd'       => (float) $capUsd,
                'used_usd'      => (float) $used,
                'percent_used'  => $pct,
                'requests'      => (int) ($usageBySubsystem[$subsystem]['requests'] ?? 0),
                'cache_hits'    => (int) ($usageBySubsystem[$subsystem]['cache_hits'] ?? 0),
                'status_error'  => (int) ($usageBySubsystem[$subsystem]['status_error'] ?? 0),
                'status_success'=> (int) ($usageBySubsystem[$subsystem]['status_success'] ?? 0),
                'is_enabled'    => (int) $cap['is_enabled'],
            ];
        }

        return $summary;
    }

    public function checkAndSendAlerts(?string $monthKey = null): void
    {
        $monthKey  = $monthKey ?? $this->getMonthKey();
        $threshold = $this->settings->aiOpsAlertThresholdPct;
        $emailTo   = $this->settings->aiOpsAlertEmail;
        $caps      = $this->db->table('bf_ai_ops_caps')->where('is_enabled', 1)->get()->getResultArray();
        $summary   = $this->getUsageSummary($monthKey);

        foreach ($caps as $cap) {
            $subsystem = $cap['subsystem'];
            $capUsd    = $cap['cap_usd'] ?? 0;
            $used      = $summary[$subsystem]['used_usd'] ?? 0;
            if ($capUsd <= 0) {
                continue;
            }

            $pct = $capUsd > 0 ? ($used / $capUsd) * 100 : 0;
            if ($pct < $threshold) {
                continue;
            }

            if ($this->hasAlertEvent($subsystem, $monthKey)) {
                continue;
            }

            $subject = sprintf('MyMI Wallet AI Ops Alert: %s at %s%% of monthly cap', $subsystem, round($pct, 1));
            $message = view('emails/ai_ops_alert', [
                'subsystem' => $subsystem,
                'cap'       => $capUsd,
                'used'      => $used,
                'pct'       => round($pct, 1),
                'actions'   => [
                    'Disable subsystem toggle',
                    'Reduce token ceiling',
                    'Increase cache TTL',
                    'Postpone heavy CRON jobs',
                ],
            ]);

            $email = Services::email();
            $email->setTo($emailTo);
            $email->setSubject($subject);
            $email->setMessage($message);
            $sent = $email->send();

            $this->logEvent(
                $subsystem,
                'ALERT_80_SENT',
                $sent ? 'Alert email sent' : 'Alert email failed to send',
                [
                    'monthKey' => $monthKey,
                    'pct'      => round($pct, 1),
                    'cap'      => $capUsd,
                    'used'     => $used,
                    'email'    => $emailTo,
                    'sent'     => $sent,
                ]
            );
        }
    }

    public function getMonthKey(): string
    {
        return (new DateTime('now', $this->tz))->format('Y-m');
    }

    protected function getCap(string $subsystem): ?array
    {
        return $this->db->table('bf_ai_ops_caps')->where('subsystem', $subsystem)->get()->getFirstRowArray() ?: null;
    }

    protected function getUsageRow(string $subsystem, string $monthKey): array
    {
        return $this->db->table('bf_ai_ops_usage')
            ->select('subsystem, SUM(cost_usd) as cost_usd')
            ->where('subsystem', $subsystem)
            ->where('month_key', $monthKey)
            ->groupBy('subsystem')
            ->get()->getFirstRowArray() ?? ['cost_usd' => 0];
    }

    protected function hasAlertEvent(string $subsystem, string $monthKey): bool
    {
        $row = $this->db->table('bf_ai_ops_events')
            ->like('meta_json', $monthKey, 'both')
            ->where('subsystem', $subsystem)
            ->where('event_type', 'ALERT_80_SENT')
            ->get()->getFirstRow();

        return (bool) $row;
    }

    protected function logEvent(string $subsystem, string $eventType, string $message = '', array $meta = []): void
    {
        $this->db->table('bf_ai_ops_events')->insert([
            'subsystem'  => $subsystem,
            'event_type' => $eventType,
            'message'    => $message,
            'meta_json'  => ! empty($meta) ? json_encode($meta) : null,
            'created_at' => (new DateTime('now', $this->tz))->format('Y-m-d H:i:s'),
        ]);
    }
}
