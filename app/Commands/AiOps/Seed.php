<?php

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Services;

class Seed extends SafeBaseCommand
{
    protected $group       = 'AI-Ops - PR';
    protected $name        = 'aiops:seed';
    protected $description = 'Seed default AI Ops caps and pricing configuration.';
    protected $usage       = 'php spark aiops:seed';
    protected $options     = [
        '--dry-run' => 'Preview actions without writing to the database',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:aiops:seed] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        $db      = db_connect();
        $builder = $db->table('bf_ai_ops_caps');

        $defaults = [
            ['subsystem' => 'selfhost_gap_sync', 'cap_type' => 'CAPACITY', 'cap_value' => 100, 'is_enabled' => 1],
            ['subsystem' => 'selfhost_marketing_drafts', 'cap_type' => 'CAPACITY', 'cap_value' => 100, 'is_enabled' => 1],
            ['subsystem' => 'selfhost_pr_review', 'cap_type' => 'CAPACITY', 'cap_value' => 100, 'is_enabled' => 1],
        ];

        if ($dryRun) {
            CLI::write('Dry-run enabled. AI Ops caps will not be written.', 'yellow');
            log_message('info', '[spark:aiops:seed] Completed', ['dry_run' => true]);
            return EXIT_SUCCESS;
        }

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
            log_message('error', '[spark:aiops:seed] Failed', ['reason' => 'Transaction failed']);
            return EXIT_ERROR;
        }

        CLI::write('AI Ops caps seeded successfully.', 'green');
        log_message('info', '[spark:aiops:seed] Completed', ['dry_run' => false]);
        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
