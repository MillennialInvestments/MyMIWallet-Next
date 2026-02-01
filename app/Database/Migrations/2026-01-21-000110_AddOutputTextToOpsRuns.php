<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddOutputTextToOpsRuns extends Migration
{
    public function up(): void
    {
        if (! $this->db->tableExists('bf_ops_job_runs')) {
            return;
        }

        if ($this->db->fieldExists('output_text', 'bf_ops_job_runs')) {
            return;
        }

        $fields = [
            'output_text' => [
                'type' => 'LONGTEXT',
                'null' => true,
                'after' => 'output_json',
            ],
        ];

        $this->forge->addColumn('bf_ops_job_runs', $fields);
    }

    public function down(): void
    {
        if (! $this->db->tableExists('bf_ops_job_runs')) {
            return;
        }

        if ($this->db->fieldExists('output_text', 'bf_ops_job_runs')) {
            $this->forge->dropColumn('bf_ops_job_runs', 'output_text');
        }
    }
}
