<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAiOpsTaskPipelineTables extends Migration
{
    public function up(): void
    {
        $tableAttributes = [
            'ENGINE'  => 'InnoDB',
            'DEFAULT CHARSET' => 'utf8mb4',
            'COLLATE' => 'utf8mb4_unicode_ci',
        ];

        $jsonType = $this->resolveJsonType();

        // bf_aiops_tasks
        if (! $this->db->tableExists('bf_aiops_tasks')) {
            $this->forge->addField([
                'id'           => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'task_key'     => ['type' => 'VARCHAR', 'constraint' => 190],
                'title'        => ['type' => 'VARCHAR', 'constraint' => 255],
                'severity'     => ['type' => 'VARCHAR', 'constraint' => 8, 'default' => 'P2'],
                'domain'       => ['type' => 'VARCHAR', 'constraint' => 64],
                'prompt'       => ['type' => 'TEXT', 'null' => true],
                'context_json' => ['type' => $jsonType, 'null' => true],
                'status'       => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'open'],
                'assigned_to'  => ['type' => 'VARCHAR', 'constraint' => 64, 'default' => 'human'],
                'locked_at'    => ['type' => 'DATETIME', 'null' => true],
                'locked_by'    => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
                'last_error'   => ['type' => 'LONGTEXT', 'null' => true],
                'created_at'   => ['type' => 'DATETIME', 'null' => true],
                'updated_at'   => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('task_key', false, true);
            $this->forge->addKey('status');
            $this->forge->addKey('locked_at');
            $this->forge->addKey('assigned_to');
            $this->forge->createTable('bf_aiops_tasks', true, $tableAttributes);
        }

        // bf_aiops_task_runs
        if (! $this->db->tableExists('bf_aiops_task_runs')) {
            $this->forge->addField([
                'id'          => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'task_id'     => ['type' => 'BIGINT', 'unsigned' => true],
                'status'      => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'running'],
                'stdout'      => ['type' => 'LONGTEXT', 'null' => true],
                'stderr'      => ['type' => 'LONGTEXT', 'null' => true],
                'exit_code'   => ['type' => 'INT', 'null' => true],
                'result_json' => ['type' => $jsonType, 'null' => true],
                'created_at'  => ['type' => 'DATETIME', 'null' => true],
                'updated_at'  => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('task_id');
            $this->forge->addKey('status');
            $this->forge->addKey('created_at');
            $this->forge->createTable('bf_aiops_task_runs', true, $tableAttributes);
        }

        // bf_aiops_registry (optional)
        if (! $this->db->tableExists('bf_aiops_registry')) {
            $this->forge->addField([
                'id'               => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'task_key'         => ['type' => 'VARCHAR', 'constraint' => 190],
                'handler'          => ['type' => 'VARCHAR', 'constraint' => 190],
                'description'      => ['type' => 'TEXT', 'null' => true],
                'safe_mode_allowed'=> ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
                'created_at'       => ['type' => 'DATETIME', 'null' => true],
                'updated_at'       => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('task_key', false, true);
            $this->forge->createTable('bf_aiops_registry', true, $tableAttributes);
        }

        // bf_aiops_settings (optional)
        if (! $this->db->tableExists('bf_aiops_settings')) {
            $this->forge->addField([
                'setting_key'   => ['type' => 'VARCHAR', 'constraint' => 64],
                'setting_value' => ['type' => 'VARCHAR', 'constraint' => 255],
                'updated_at'    => ['type' => 'DATETIME', 'null' => true],
                'updated_by'    => ['type' => 'BIGINT', 'null' => true],
            ]);
            $this->forge->addKey('setting_key', true);
            $this->forge->createTable('bf_aiops_settings', true, $tableAttributes);
        }

        // bf_ops_command_inbox (only if missing)
        if (! $this->db->tableExists('bf_ops_command_inbox')) {
            $this->forge->addField([
                'id'            => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'message_id'    => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'from_email'    => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'subject'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'raw_body'      => ['type' => 'LONGTEXT', 'null' => true],
                'parsed_json'   => ['type' => $jsonType, 'null' => true],
                'ai_plan_json'  => ['type' => $jsonType, 'null' => true],
                'ai_summary'    => ['type' => 'TEXT', 'null' => true],
                'security_flags'=> ['type' => $jsonType, 'null' => true],
                'status'        => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'New'],
                'meta_json'     => ['type' => $jsonType, 'null' => true],
                'received_at'   => ['type' => 'DATETIME', 'null' => true],
                'created_at'    => ['type' => 'DATETIME', 'null' => true],
                'updated_at'    => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('status');
            $this->forge->addKey('received_at');
            $this->forge->createTable('bf_ops_command_inbox', true, $tableAttributes);
        }
    }

    public function down(): void
    {
        $this->forge->dropTable('bf_ops_command_inbox', true);
        $this->forge->dropTable('bf_aiops_settings', true);
        $this->forge->dropTable('bf_aiops_registry', true);
        $this->forge->dropTable('bf_aiops_task_runs', true);
        $this->forge->dropTable('bf_aiops_tasks', true);
    }

    private function resolveJsonType(): string
    {
        $driver = $this->db->DBDriver ?? '';
        if (! in_array($driver, ['MySQLi', 'PDO'], true)) {
            return 'LONGTEXT';
        }

        $version = $this->db->getVersion();
        if ($version === null || $version === '') {
            return 'LONGTEXT';
        }

        if (stripos($version, 'mariadb') !== false) {
            return 'LONGTEXT';
        }

        return version_compare($version, '5.7.8', '>=') ? 'JSON' : 'LONGTEXT';
    }
}
