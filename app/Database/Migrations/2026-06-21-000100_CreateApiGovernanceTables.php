<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateApiGovernanceTables extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_api_endpoints')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'uri' => ['type' => 'VARCHAR', 'constraint' => 255],
                'http_methods' => ['type' => 'VARCHAR', 'constraint' => 32],
                'controller' => ['type' => 'VARCHAR', 'constraint' => 255],
                'action' => ['type' => 'VARCHAR', 'constraint' => 128],
                'module' => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => true],
                'is_api' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
                'version' => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'none'],
                'discovered_at' => ['type' => 'DATETIME'],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey(['uri', 'http_methods', 'controller', 'action'], 'uq_endpoint_signature');
            $this->forge->createTable('bf_api_endpoints');
        }

        if (! $this->db->tableExists('bf_api_endpoint_rules')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'endpoint_id' => ['type' => 'BIGINT', 'unsigned' => true],
                'requires_auth' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
                'required_group' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
                'required_permission' => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => true],
                'filters_expected' => ['type' => 'TEXT', 'null' => true],
                'rate_limit_policy' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
                'is_cli_only' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
                'internal_token_required' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
                'is_manual_override' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('endpoint_id');
            $this->forge->createTable('bf_api_endpoint_rules');
        }

        if (! $this->db->tableExists('bf_api_audit_runs')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'run_uuid' => ['type' => 'VARCHAR', 'constraint' => 64],
                'started_at' => ['type' => 'DATETIME', 'null' => true],
                'finished_at' => ['type' => 'DATETIME', 'null' => true],
                'environment' => ['type' => 'VARCHAR', 'constraint' => 64],
                'git_commit' => ['type' => 'VARCHAR', 'constraint' => 40, 'null' => true],
                'summary_json' => ['type' => 'LONGTEXT', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('run_uuid');
            $this->forge->createTable('bf_api_audit_runs');
        }

        if (! $this->db->tableExists('bf_api_audit_findings')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'run_id' => ['type' => 'BIGINT', 'unsigned' => true],
                'endpoint_id' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
                'severity' => ['type' => 'VARCHAR', 'constraint' => 16],
                'category' => ['type' => 'VARCHAR', 'constraint' => 64],
                'finding' => ['type' => 'TEXT'],
                'remediation' => ['type' => 'TEXT', 'null' => true],
                'evidence_json' => ['type' => 'LONGTEXT', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('run_id');
            $this->forge->addKey('endpoint_id');
            $this->forge->createTable('bf_api_audit_findings');
        }
    }

    public function down()
    {
        foreach (['bf_api_audit_findings', 'bf_api_audit_runs', 'bf_api_endpoint_rules', 'bf_api_endpoints'] as $table) {
            if ($this->db->tableExists($table)) {
                $this->forge->dropTable($table);
            }
        }
    }
}
