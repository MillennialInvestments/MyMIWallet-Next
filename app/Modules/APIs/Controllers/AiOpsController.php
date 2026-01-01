<?php namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseController;
use App\Libraries\AiOps\AiOpsManager;
use CodeIgniter\API\ResponseTrait;
use Config\Services;

class AiOpsController extends BaseController
{
    use ResponseTrait;

    protected AiOpsManager $manager;

    public function __construct()
    {
        $this->manager = new AiOpsManager();
    }

    public function status()
    {
        $monthKey = $this->request->getGet('month') ?? $this->manager->getMonthKey();
        $summary  = $this->manager->getUsageSummary($monthKey);
        $caps     = db_connect()->table('bf_ai_ops_caps')->get()->getResultArray();
        $settings = config('SiteSettings');

        return $this->respond([
            'month'    => $monthKey,
            'summary'  => $summary,
            'caps'     => $caps,
            'settings' => [
                'aiOpsEnabled'         => $settings->aiOpsEnabled,
                'aiOpsAllowOverride'   => $settings->aiOpsAllowOverride,
                'alertThresholdPct'    => $settings->aiOpsAlertThresholdPct,
                'alertEmail'           => $settings->aiOpsAlertEmail,
            ],
        ]);
    }

    public function checkCapsAndAlert()
    {
        $monthKey = $this->request->getGet('month') ?? $this->manager->getMonthKey();
        $this->manager->checkAndSendAlerts($monthKey);

        return $this->respond(['status' => 'ok', 'month' => $monthKey]);
    }

    public function runMarketingDaily()
    {
        return $this->handleRun('chatgpt_marketing', 'Marketing daily job triggered');
    }

    public function runAlertsDigest()
    {
        return $this->handleRun('chatgpt_alerts', 'Alerts digest job triggered');
    }

    public function runAnalyticsWeekly()
    {
        return $this->handleRun('chatgpt_analytics', 'Analytics weekly job triggered');
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
            'aiChatgptApiEnabled',
            'aiCodexApiEnabled',
            'aiGithubReviewsEnabled',
            'aiAutoMarketingEnabled',
            'aiAutoAlertsEnabled',
            'aiAutoAnalyticsEnabled',
            'aiDocsAlignmentEnabled',
        ];

        if (! in_array($key, $allowedKeys, true)) {
            return $this->failValidationErrors('Unsupported toggle');
        }

        $settings = config('SiteSettings');
        $settings->$key = filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? $value;
        cache()->save('aiops:' . $key, $settings->$key, 60 * 60 * 24 * 30); // 30 days cache persistence

        $auth = function_exists('auth') ? auth() : service('authentication');
        $meta = [
            'user_id' => $auth?->id() ?? null,
            'ip'      => $this->request->getIPAddress(),
            'ua'      => $this->request->getUserAgent()->getAgentString(),
            'key'     => $key,
            'value'   => $settings->$key,
        ];
        $this->manager->recordUsage('ai_github_reviews', 0, 0, 0, false, true, ['event_type' => 'TOGGLE_CHANGED', 'message' => 'AI Ops toggle changed', 'meta' => $meta]);

        return $this->respond(['status' => 'ok', 'key' => $key, 'value' => $settings->$key]);
    }

    public function setCaps()
    {
        if (! $this->request->is('post')) {
            return $this->fail('Invalid method', 405);
        }

        $caps = $this->request->getPost('caps');
        if (! is_array($caps)) {
            return $this->failValidationErrors('caps payload required');
        }

        $builder = db_connect()->table('bf_ai_ops_caps');
        foreach ($caps as $row) {
            if (empty($row['subsystem'])) {
                continue;
            }
            $data = [
                'cap_usd'    => isset($row['cap_usd']) ? (float) $row['cap_usd'] : 0,
                'cap_tokens' => $row['cap_tokens'] ?? null,
                'is_enabled' => isset($row['is_enabled']) ? (int) $row['is_enabled'] : 1,
                'reset_period' => 'monthly',
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $existing = $builder->where('subsystem', $row['subsystem'])->get()->getFirstRow();
            if ($existing) {
                $builder->where('id', $existing->id)->update($data);
            } else {
                $data['subsystem'] = $row['subsystem'];
                $data['created_at'] = date('Y-m-d H:i:s');
                $builder->insert($data);
            }
        }

        return $this->respond(['status' => 'ok']);
    }

    public function events()
    {
        $limit = (int) ($this->request->getGet('limit') ?? 200);
        $events = db_connect()->table('bf_ai_ops_events')
            ->orderBy('id', 'DESC')
            ->limit($limit)
            ->get()->getResultArray();

        return $this->respond(['events' => $events]);
    }

    protected function handleRun(string $subsystem, string $message)
    {
        if (! config('SiteSettings')->aiOpsEnabled) {
            return $this->respond(['status' => 'error', 'message' => 'AI Ops disabled'], 200);
        }

        $gate = $this->manager->assertCanRun($subsystem);
        if (! $gate['allowed']) {
            return $this->respond(['status' => 'error', 'message' => $gate['reason']], 200);
        }

        // Stub for real job wiring; integrate actual job dispatchers here.
        $this->manager->recordUsage($subsystem, 0, 0, 0, false, true, ['event_type' => 'JOB_TRIGGERED', 'message' => $message]);

        return $this->respond(['status' => 'ok', 'message' => $message, 'subsystem' => $subsystem]);
    }
}
