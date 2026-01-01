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
            ['subsystem' => 'selfhost_gap_sync', 'cap_type' => 'CAPACITY', 'cap_value' => 100, 'is_enabled' => 1],
            ['subsystem' => 'selfhost_marketing_drafts', 'cap_type' => 'CAPACITY', 'cap_value' => 100, 'is_enabled' => 1],
            ['subsystem' => 'selfhost_pr_review', 'cap_type' => 'CAPACITY', 'cap_value' => 100, 'is_enabled' => 1],
        ];

        $db->transStart();
        foreach ($defaults as $row) {
            $row['reset_period'] = 'MONTHLY';
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
