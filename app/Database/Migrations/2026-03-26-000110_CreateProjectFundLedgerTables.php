<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProjectFundLedgerTables extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_projects_fund_holders')) {
            $this->forge->addField([
                'id' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'auto_increment' => true],
                'project_id' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true],
                'user_id' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true],
                'units_owned' => ['type' => 'DECIMAL', 'constraint' => '20,8', 'default' => '0.00000000'],
                'capital_contributed' => ['type' => 'DECIMAL', 'constraint' => '18,2', 'default' => '0.00'],
                'average_nav' => ['type' => 'DECIMAL', 'constraint' => '18,8', 'default' => '0.00000000'],
                'holder_status' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'active'],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey(['project_id', 'user_id'], false, false, 'idx_project_user');
            $this->forge->addKey('project_id', false, false, 'idx_project');
            $this->forge->addKey('user_id', false, false, 'idx_user');
            $this->forge->createTable('bf_projects_fund_holders');
        }

        if (! $this->db->tableExists('bf_projects_fund_transactions')) {
            $this->forge->addField([
                'id' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'auto_increment' => true],
                'project_id' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true],
                'user_id' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
                'transaction_type' => ['type' => 'VARCHAR', 'constraint' => 50],
                'reference_type' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
                'reference_id' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
                'units' => ['type' => 'DECIMAL', 'constraint' => '20,8', 'default' => '0.00000000'],
                'nav_price' => ['type' => 'DECIMAL', 'constraint' => '18,8', 'default' => '0.00000000'],
                'gross_amount' => ['type' => 'DECIMAL', 'constraint' => '18,2', 'default' => '0.00'],
                'fee_amount' => ['type' => 'DECIMAL', 'constraint' => '18,2', 'default' => '0.00'],
                'net_amount' => ['type' => 'DECIMAL', 'constraint' => '18,2', 'default' => '0.00'],
                'notes' => ['type' => 'TEXT', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('project_id', false, false, 'idx_project');
            $this->forge->addKey('user_id', false, false, 'idx_user');
            $this->forge->addKey('transaction_type', false, false, 'idx_type');
            $this->forge->createTable('bf_projects_fund_transactions');
        }

        if (! $this->db->tableExists('bf_projects_fund_nav_history')) {
            $this->forge->addField([
                'id' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'auto_increment' => true],
                'project_id' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true],
                'nav_per_unit' => ['type' => 'DECIMAL', 'constraint' => '18,8', 'default' => '0.00000000'],
                'total_fund_value' => ['type' => 'DECIMAL', 'constraint' => '18,2', 'default' => '0.00'],
                'total_units_issued' => ['type' => 'DECIMAL', 'constraint' => '20,8', 'default' => '0.00000000'],
                'source_note' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('project_id', false, false, 'idx_project');
            $this->forge->addKey('created_at', false, false, 'idx_created');
            $this->forge->createTable('bf_projects_fund_nav_history');
        }

        if (! $this->db->tableExists('bf_projects_fund_distributions')) {
            $this->forge->addField([
                'id' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'auto_increment' => true],
                'project_id' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true],
                'distribution_type' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'profit_distribution'],
                'total_amount' => ['type' => 'DECIMAL', 'constraint' => '18,2', 'default' => '0.00'],
                'amount_per_unit' => ['type' => 'DECIMAL', 'constraint' => '18,8', 'default' => '0.00000000'],
                'status' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'pending'],
                'notes' => ['type' => 'TEXT', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('project_id', false, false, 'idx_project');
            $this->forge->addKey('status', false, false, 'idx_status');
            $this->forge->createTable('bf_projects_fund_distributions');
        }
    }

    public function down()
    {
        foreach (['bf_projects_fund_distributions', 'bf_projects_fund_nav_history', 'bf_projects_fund_transactions', 'bf_projects_fund_holders'] as $table) {
            if ($this->db->tableExists($table)) {
                $this->forge->dropTable($table);
            }
        }
    }
}
