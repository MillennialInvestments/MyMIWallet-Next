<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOpsFoundation extends Migration
{
    public function up(): void
    {
        // bf_ops_jobs
        $this->forge->addField([
            'id'           => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'job_key'      => ['type' => 'VARCHAR', 'constraint' => 150],
            'name'         => ['type' => 'VARCHAR', 'constraint' => 255],
            'description'  => ['type' => 'TEXT', 'null' => true],
            'handler'      => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'max_attempts' => ['type' => 'INT', 'constraint' => 11, 'default' => 3],
            'is_enabled'   => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'last_run_at'  => ['type' => 'DATETIME', 'null' => true],
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
            'updated_at'   => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('job_key', true); // unique
        $this->forge->createTable('bf_ops_jobs', true);

        // bf_ops_queue
        $this->forge->addField([
            'id'            => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'job_key'       => ['type' => 'VARCHAR', 'constraint' => 150],
            'payload_json'  => ['type' => 'LONGTEXT', 'null' => true],
            'status'        => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'pending'],
            'attempts'      => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'locked_until'  => ['type' => 'DATETIME', 'null' => true],
            'last_error'    => ['type' => 'LONGTEXT', 'null' => true],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('status');
        $this->forge->addKey('job_key');
        $this->forge->addKey('locked_until');
        $this->forge->createTable('bf_ops_queue', true);

        // bf_ops_job_runs
        $this->forge->addField([
            'id'          => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'job_id'      => ['type' => 'BIGINT', 'unsigned' => true],
            'queue_id'    => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'status'      => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'running'],
            'attempts'    => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'payload_json'=> ['type' => 'LONGTEXT', 'null' => true],
            'result_json' => ['type' => 'LONGTEXT', 'null' => true],
            'last_error'  => ['type' => 'LONGTEXT', 'null' => true],
            'started_at'  => ['type' => 'DATETIME', 'null' => true],
            'finished_at' => ['type' => 'DATETIME', 'null' => true],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('job_id');
        $this->forge->addKey('status');
        $this->forge->createTable('bf_ops_job_runs', true);

        // bf_runtime_config
        $this->forge->addField([
            'id'           => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'config_key'   => ['type' => 'VARCHAR', 'constraint' => 191],
            'config_value' => ['type' => 'LONGTEXT', 'null' => true],
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
            'updated_at'   => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('config_key');
        $this->forge->createTable('bf_runtime_config', true);

        // bf_ai_usage
        $this->forge->addField([
            'id'               => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'subsystem'        => ['type' => 'VARCHAR', 'constraint' => 150],
            'action'           => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'user_id'          => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'tokens_prompt'    => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'tokens_completion'=> ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'cost_usd'         => ['type' => 'DECIMAL', 'constraint' => '10,4', 'default' => '0.0000'],
            'meta_json'        => ['type' => 'LONGTEXT', 'null' => true],
            'created_at'       => ['type' => 'DATETIME', 'null' => true],
            'updated_at'       => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('subsystem');
        $this->forge->createTable('bf_ai_usage', true);
    }

    public function down(): void
    {
        $this->forge->dropTable('bf_ai_usage', true);
        $this->forge->dropTable('bf_runtime_config', true);
        $this->forge->dropTable('bf_ops_job_runs', true);
        $this->forge->dropTable('bf_ops_queue', true);
        $this->forge->dropTable('bf_ops_jobs', true);
    }
}
