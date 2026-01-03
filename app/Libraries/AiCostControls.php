<?php

namespace App\Libraries;

use App\Models\ChatUsageModel;
use App\Modules\AIOps\Models\AIOpsWorkflowUsageModel;
use CodeIgniter\Database\BaseConnection;
use CodeIgniter\I18n\Time;

class AiCostControls
{
    protected BaseConnection $db;
    protected ChatUsageModel $chatUsage;
    protected AIOpsWorkflowUsageModel $workflowUsage;
    protected array $config;

    public function __construct(?BaseConnection $db = null)
    {
        $this->db             = $db ?? db_connect();
        $this->chatUsage      = new ChatUsageModel($this->db);
        $this->workflowUsage  = new AIOpsWorkflowUsageModel($this->db);
        $this->config         = $this->loadConfig();
    }

    public function monthKey(?string $date = null): string
    {
        $time = $date ? Time::parse($date) : Time::now('UTC');

        return $time->format('Y-m');
    }

    public function getChatPlanLimit(?string $plan): ?float
    {
        $key = $plan ? strtolower($plan) : null;

        if (! $key || empty($this->config['chat']['plans'][$key]['monthlyUsd'])) {
            return null;
        }

        return (float) $this->config['chat']['plans'][$key]['monthlyUsd'];
    }

    public function getWorkflowLimit(?string $workflowIdOrSlug): ?float
    {
        if (! $workflowIdOrSlug) {
            return null;
        }

        $key = strtolower((string) $workflowIdOrSlug);

        if (! empty($this->config['aiops']['workflows'][$key]['monthlyUsd'])) {
            return (float) $this->config['aiops']['workflows'][$key]['monthlyUsd'];
        }

        return null;
    }

    public function fetchChatUsage(int $userId, ?string $month = null): array
    {
        $month = $month ?? $this->monthKey();

        $row = $this->chatUsage
            ->where('user_id', $userId)
            ->where('month', $month)
            ->first();

        if ($row) {
            $row['__exists'] = true;

            return $row;
        }

        return [
            'user_id'    => $userId,
            'month'      => $month,
            'tokens_used'=> 0,
            'usd_used'   => 0.0,
            'last_plan'  => null,
            'last_email' => null,
            '__exists'   => false,
        ];
    }

    public function incrementChatUsage(int $userId, int $tokens, float $usd, ?string $plan = null, ?string $email = null, ?string $month = null): array
    {
        $month     = $month ?? $this->monthKey();
        $timestamp = Time::now()->toDateTimeString();

        $existing = $this->fetchChatUsage($userId, $month);

        $data = [
            'tokens_used' => ($existing['tokens_used'] ?? 0) + $tokens,
            'usd_used'    => round(($existing['usd_used'] ?? 0) + $usd, 4),
            'last_plan'   => $plan ?: ($existing['last_plan'] ?? null),
            'last_email'  => $email ?: ($existing['last_email'] ?? null),
            'updated_at'  => $timestamp,
        ];

        $builder = $this->db->table($this->chatUsage->getTable());

        if (! empty($existing['__exists'])) {
            $builder
                ->where('user_id', $userId)
                ->where('month', $month)
                ->update($data);
        } else {
            $builder->insert(array_merge($data, [
                'user_id' => $userId,
                'month'   => $month,
            ]));
        }

        return $this->fetchChatUsage($userId, $month);
    }

    public function resetChatUsage(int $userId, ?string $month = null): bool
    {
        $month = $month ?? $this->monthKey();
        $existing = $this->fetchChatUsage($userId, $month);
        $builder  = $this->db->table($this->chatUsage->getTable());
        $data = [
            'tokens_used' => 0,
            'usd_used'    => 0,
            'updated_at'  => Time::now()->toDateTimeString(),
        ];

        if (! empty($existing['__exists'])) {
            return (bool) $builder
                ->where('user_id', $userId)
                ->where('month', $month)
                ->update($data);
        }

        return (bool) $builder->insert(array_merge($data, [
            'user_id' => $userId,
            'month'   => $month,
        ]));
    }

    public function getChatUsageSummary(?string $month = null): array
    {
        $month        = $month ?? $this->monthKey();
        $chatConfig   = $this->readChatRuntimeConfig();
        $globalBudget = (float) ($chatConfig['monthlyBudgetUsd'] ?? 0);

        $global = $this->db->table($this->chatUsage->getTable())
            ->selectSum('usd_used')
            ->where('month', $month)
            ->get()
            ->getRowArray();

        $totalUsd = (float) ($global['usd_used'] ?? 0);
        $percent  = $globalBudget > 0 ? (int) floor(($totalUsd / $globalBudget) * 100) : null;

        $rows = $this->db->table($this->chatUsage->getTable() . ' cu')
            ->select('cu.user_id, cu.month, cu.tokens_used, cu.usd_used, cu.last_plan, cu.last_email, u.email')
            ->join('users u', 'u.id = cu.user_id', 'left')
            ->where('cu.month', $month)
            ->orderBy('cu.usd_used', 'DESC')
            ->get()
            ->getResultArray();

        $users = [];
        foreach ($rows as $row) {
            $plan     = $row['last_plan'] ?: 'free';
            $planCap  = $this->getChatPlanLimit($plan);
            $userPerc = $planCap ? (int) floor(((float) $row['usd_used'] / $planCap) * 100) : null;

            $users[] = [
                'user_id' => (int) $row['user_id'],
                'email'   => $row['email'] ?: $row['last_email'],
                'plan'    => $plan,
                'usd_used'=> (float) $row['usd_used'],
                'tokens'  => (int) $row['tokens_used'],
                'percent'=> $userPerc,
            ];
        }

        return [
            'month'  => $month,
            'global' => [
                'usd_used' => $totalUsd,
                'budget'   => $globalBudget,
                'percent'  => $percent,
            ],
            'users'  => $users,
            'alert'  => [
                'percent' => (int) ($this->config['chat']['alertPercent'] ?? 80),
            ],
        ];
    }

    public function fetchWorkflowUsage($workflowId, ?string $month = null): array
    {
        $month = $month ?? $this->monthKey();

        $row = $this->workflowUsage
            ->where('workflow_id', $workflowId)
            ->where('month', $month)
            ->first();

        if ($row) {
            $row['__exists'] = true;

            return $row;
        }

        return [
            'workflow_id'   => $workflowId,
            'workflow_slug' => null,
            'month'         => $month,
            'usd_used'      => 0.0,
            '__exists'      => false,
        ];
    }

    public function incrementWorkflowUsage($workflowId, ?string $workflowSlug, float $usd, ?string $month = null): array
    {
        $month     = $month ?? $this->monthKey();
        $timestamp = Time::now()->toDateTimeString();
        $existing  = $this->fetchWorkflowUsage($workflowId, $month);

        $data = [
            'workflow_slug' => $workflowSlug ?: ($existing['workflow_slug'] ?? null),
            'usd_used'      => round(($existing['usd_used'] ?? 0) + $usd, 4),
            'updated_at'    => $timestamp,
        ];

        $builder = $this->db->table($this->workflowUsage->getTable());
        if (! empty($existing['__exists'])) {
            $builder
                ->where('workflow_id', $workflowId)
                ->where('month', $month)
                ->update($data);
        } else {
            $builder->insert(array_merge($data, [
                'workflow_id' => $workflowId,
                'month'       => $month,
            ]));
        }

        return $this->fetchWorkflowUsage($workflowId, $month);
    }

    protected function loadConfig(): array
    {
        $path = ROOTPATH . 'config/ai-cost-controls.json';

        if (is_file($path)) {
            $json = json_decode(file_get_contents($path), true);
            if (is_array($json)) {
                return $json;
            }
        }

        return [
            'chat' => [
                'plans' => [
                    'free'    => ['monthlyUsd' => 1],
                    'basic'   => ['monthlyUsd' => 5],
                    'pro'     => ['monthlyUsd' => 20],
                    'premium' => ['monthlyUsd' => 50],
                ],
                'alertPercent' => 80,
            ],
            'aiops' => [
                'workflows' => [
                    'gap_analysis'  => ['monthlyUsd' => 5],
                    'doc_generation'=> ['monthlyUsd' => 10],
                    'code_review'   => ['monthlyUsd' => 15],
                ],
            ],
        ];
    }

    public function chatRuntimeConfig(): array
    {
        return $this->readChatRuntimeConfig();
    }

    public function persistChatRuntimeConfig(array $config): bool
    {
        $path = ROOTPATH . 'chat/config.runtime.json';
        $payload = json_encode($config, JSON_PRETTY_PRINT);

        if ($path === false || $payload === false) {
            return false;
        }

        return (bool) file_put_contents($path, $payload);
    }

    protected function readChatRuntimeConfig(): array
    {
        $path = ROOTPATH . 'chat/config.runtime.json';

        if (is_file($path)) {
            $json = json_decode(file_get_contents($path), true);
            if (is_array($json)) {
                return $json;
            }
        }

        return [];
    }
}
