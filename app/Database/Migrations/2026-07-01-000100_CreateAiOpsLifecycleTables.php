<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAiOpsLifecycleTables extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_aiops_services')) {
            $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'service_name' => ['type' => 'VARCHAR', 'constraint' => 100],
                'status' => ['type' => 'VARCHAR', 'constraint' => 50],
                'pid' => ['type' => 'INT', 'null' => true],
                'port' => ['type' => 'INT', 'null' => true],
                'last_checked_at' => ['type' => 'DATETIME', 'null' => true],
                'health_status' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
                'notes' => ['type' => 'TEXT', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('service_name');
            $this->forge->createTable('bf_aiops_services');

            $this->db->query('ALTER TABLE `bf_aiops_services` MODIFY `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP');
            $this->db->query('ALTER TABLE `bf_aiops_services` MODIFY `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
        }

        if (! $this->db->tableExists('bf_aiops_schema_cache')) {
            $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'table_name' => ['type' => 'VARCHAR', 'constraint' => 100],
                'schema_json' => ['type' => 'LONGTEXT'],
                'last_updated_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('table_name');
            $this->forge->createTable('bf_aiops_schema_cache');
            $this->db->query('ALTER TABLE `bf_aiops_schema_cache` MODIFY `last_updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP');
        }

        if (! $this->db->tableExists('bf_aiops_query_audit')) {
            $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'query_text' => ['type' => 'LONGTEXT'],
                'validated' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
                'executed' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
                'error_message' => ['type' => 'TEXT', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->createTable('bf_aiops_query_audit');
            $this->db->query('ALTER TABLE `bf_aiops_query_audit` MODIFY `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP');
        }
    }

    public function down()
    {
        foreach (['bf_aiops_query_audit', 'bf_aiops_schema_cache', 'bf_aiops_services'] as $table) {
            if ($this->db->tableExists($table)) {
                $this->forge->dropTable($table);
            }
        }
    }
}
