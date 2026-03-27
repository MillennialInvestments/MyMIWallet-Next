<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFundComplianceAndOpsTables extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_projects_fund_investor_profiles')) {
            $this->forge->addField([
                'id' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'auto_increment' => true],
                'project_id' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true],
                'user_id' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true],
                'kyc_status' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'pending'],
                'investor_eligibility' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'pending'],
                'agreement_signed' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
                'agreement_signed_at' => ['type' => 'DATETIME', 'null' => true],
                'reviewed_by' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
                'notes' => ['type' => 'TEXT', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey(['project_id', 'user_id']);
            $this->forge->addKey('kyc_status');
            $this->forge->addKey('investor_eligibility');
            $this->forge->createTable('bf_projects_fund_investor_profiles');
        }

        if (! $this->db->tableExists('bf_projects_fund_capital_flows')) {
            $this->forge->addField([
                'id' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'auto_increment' => true],
                'project_id' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true],
                'flow_type' => ['type' => 'VARCHAR', 'constraint' => 50],
                'amount' => ['type' => 'DECIMAL', 'constraint' => '18,2', 'default' => '0.00'],
                'units_delta' => ['type' => 'DECIMAL', 'constraint' => '20,8', 'default' => '0.00000000'],
                'reference' => ['type' => 'VARCHAR', 'constraint' => 120, 'null' => true],
                'notes' => ['type' => 'TEXT', 'null' => true],
                'created_by' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('project_id');
            $this->forge->addKey('flow_type');
            $this->forge->addKey('created_at');
            $this->forge->createTable('bf_projects_fund_capital_flows');
        }

        if (! $this->db->tableExists('bf_projects_fund_audit_logs')) {
            $this->forge->addField([
                'id' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'auto_increment' => true],
                'project_id' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true],
                'actor_user_id' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
                'action_type' => ['type' => 'VARCHAR', 'constraint' => 60],
                'context_json' => ['type' => 'LONGTEXT', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('project_id');
            $this->forge->addKey('actor_user_id');
            $this->forge->addKey('action_type');
            $this->forge->createTable('bf_projects_fund_audit_logs');
        }
    }

    public function down()
    {
        foreach (['bf_projects_fund_audit_logs', 'bf_projects_fund_capital_flows', 'bf_projects_fund_investor_profiles'] as $table) {
            if ($this->db->tableExists($table)) {
                $this->forge->dropTable($table);
            }
        }
    }
}
