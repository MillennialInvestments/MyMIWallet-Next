<?php

namespace App\Modules\PropFirms\Libraries;

use CodeIgniter\Database\BaseConnection;
use Config\Database;

class PropFirmDefaultsSeeder
{
    private BaseConnection $db;

    public function __construct(?BaseConnection $db = null)
    {
        $this->db = $db ?? Database::connect();
    }

    public function seedDefaults(): array
    {
        $firms = $this->defaultFirms();
        $ruleTemplates = $this->defaultRuleSets();

        $insertedFirms = 0;
        $insertedRuleSets = 0;

        foreach ($firms as $firm) {
            $firmId = $this->findFirmIdBySlug($firm['slug']);
            if ($firmId === null) {
                $this->db->table('bf_prop_firms')->insert($firm);
                $firmId = (int) $this->db->insertID();
                $insertedFirms++;
            }

            foreach ($ruleTemplates[$firm['slug']] ?? [] as $rule) {
                $exists = $this->db->table('bf_prop_rule_sets')
                    ->select('id')
                    ->where('prop_firm_id', $firmId)
                    ->where('rule_version', $rule['rule_version'])
                    ->where('account_type', $rule['account_type'])
                    ->where('platform', $rule['platform'])
                    ->get()
                    ->getRowArray();

                if ($exists !== null) {
                    continue;
                }

                $rule['prop_firm_id'] = $firmId;
                $this->db->table('bf_prop_rule_sets')->insert($rule);
                $insertedRuleSets++;
            }
        }

        return [
            'inserted_firms' => $insertedFirms,
            'inserted_rule_sets' => $insertedRuleSets,
        ];
    }

    private function findFirmIdBySlug(string $slug): ?int
    {
        $row = $this->db->table('bf_prop_firms')
            ->select('id')
            ->where('slug', $slug)
            ->get()
            ->getRowArray();

        return $row === null ? null : (int) $row['id'];
    }

    private function defaultFirms(): array
    {
        return [
            [
                'name' => 'Apex Trader Funding',
                'slug' => 'apex',
                'status' => 'active',
                'meta_json' => json_encode(['website' => 'https://apextraderfunding.com'], JSON_UNESCAPED_SLASHES),
            ],
            [
                'name' => 'Topstep',
                'slug' => 'topstep',
                'status' => 'active',
                'meta_json' => json_encode(['website' => 'https://www.topstep.com'], JSON_UNESCAPED_SLASHES),
            ],
        ];
    }

    private function defaultRuleSets(): array
    {
        return [
            'apex' => [
                $this->buildRule('Apex Eval 50k (Tradovate)', 'v1', 'eval', 'tradovate', 50000, 2500, 3000, 3000, 'eod', 'trails_to_max_balance_eod', false, 7, 30),
                $this->buildRule('Apex Eval 100k (Rithmic)', 'v1', 'eval', 'rithmic', 100000, 3000, 6000, 6000, 'eod', 'trails_to_max_balance_eod', false, 7, 30),
                $this->buildRule('Apex PA 50k (Tradovate)', 'v1', 'pa', 'tradovate', 50000, 2500, 2600, 2600, 'eod', 'trails_then_locks_after_threshold', true, 0, 0),
            ],
            'topstep' => [
                $this->buildRule('Topstep Combine 50k (TopstepX)', 'v1', 'combine', 'topstepx', 50000, 1000, 2000, 2000, 'intraday', 'real_time_trailing_net_liq', false, 2, 50),
                $this->buildRule('Topstep Combine 100k (TopstepX)', 'v1', 'combine', 'topstepx', 100000, 2000, 3000, 3000, 'intraday', 'real_time_trailing_net_liq', false, 2, 50),
                $this->buildRule('Topstep Funded (TopstepX)', 'v1', 'funded', 'topstepx', 50000, 1000, 2000, 2000, 'intraday', 'real_time_trailing_net_liq', true, 0, 0),
            ],
        ];
    }

    private function buildRule(
        string $name,
        string $version,
        string $accountType,
        string $platform,
        float $startingBalance,
        float $dailyLossLimit,
        float $drawdownLimit,
        float $maxDrawdown,
        string $trailingMode,
        string $trailingStopBehavior,
        bool $stopLossRequired,
        int $qualifyingDays,
        float $consistencyPercent
    ): array {
        $config = [
            'starting_balance' => $startingBalance,
            'drawdown_limit' => $drawdownLimit,
            'daily_loss_limit' => $dailyLossLimit,
            'trailing_mode' => $trailingMode,
            'trailing_stop_behavior' => $trailingStopBehavior,
            'stop_loss_required' => $stopLossRequired,
            'qualifying_days' => $qualifyingDays,
            'consistency_percent' => $consistencyPercent,
        ];

        return [
            'name' => $name,
            'rule_version' => $version,
            'account_type' => $accountType,
            'platform' => $platform,
            'starting_balance' => $startingBalance,
            'daily_loss_limit' => $dailyLossLimit,
            'drawdown_limit' => $drawdownLimit,
            'max_drawdown' => $maxDrawdown,
            'trailing_mode' => $trailingMode,
            'trailing_stop_behavior' => $trailingStopBehavior,
            'stop_loss_required' => $stopLossRequired ? 1 : 0,
            'qualifying_days' => $qualifyingDays,
            'consistency_percent' => $consistencyPercent,
            'max_position_size' => 0,
            'config_json' => json_encode($config, JSON_UNESCAPED_SLASHES),
            'rules_json' => json_encode(['seeded_default' => true], JSON_UNESCAPED_SLASHES),
        ];
    }
}
