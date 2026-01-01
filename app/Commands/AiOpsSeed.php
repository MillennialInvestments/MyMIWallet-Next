<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Services;

class AiOpsSeed extends BaseCommand
{
    protected $group       = 'AiOps';
    protected $name        = 'aiops:seed';
    protected $description = 'Seed default AI Ops caps and pricing configuration.';
    protected $usage       = 'php spark aiops:seed';

    public function run(array $params)
    {
        $db      = db_connect();
        $builder = $db->table('bf_ai_ops_caps');

        $defaults = [
            ['subsystem' => 'chatgpt_marketing',   'cap_usd' => 30, 'cap_tokens' => null, 'is_enabled' => 1],
            ['subsystem' => 'chatgpt_alerts',      'cap_usd' => 25, 'cap_tokens' => null, 'is_enabled' => 1],
            ['subsystem' => 'chatgpt_analytics',   'cap_usd' => 15, 'cap_tokens' => null, 'is_enabled' => 1],
            ['subsystem' => 'codex_codegen',       'cap_usd' => 40, 'cap_tokens' => null, 'is_enabled' => 1],
            ['subsystem' => 'codex_docs_alignment','cap_usd' => 10, 'cap_tokens' => null, 'is_enabled' => 0],
            ['subsystem' => 'ai_github_reviews',   'cap_usd' => 20, 'cap_tokens' => null, 'is_enabled' => 1],
        ];

        $db->transStart();
        foreach ($defaults as $row) {
            $row['reset_period'] = 'monthly';
            $row['updated_at']   = date('Y-m-d H:i:s');
            $existing            = $builder->where('subsystem', $row['subsystem'])->get()->getFirstRow();

            if ($existing) {
                $builder->where('id', $existing->id)->update($row);
            } else {
                $row['created_at'] = date('Y-m-d H:i:s');
                $builder->insert($row);
            }
        }
        $db->transComplete();

        if ($db->transStatus() === false) {
            CLI::error('Failed to seed AI Ops caps.');
            return;
        }

        CLI::write('AI Ops caps seeded successfully.', 'green');
    }
}
