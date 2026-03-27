<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFundTransactionIdempotencyAndNavLock extends Migration
{
    public function up()
    {
        if ($this->db->tableExists('bf_projects_fund_transactions')) {
            $fields = $this->db->getFieldNames('bf_projects_fund_transactions');
            if (! in_array('idempotency_key', $fields, true)) {
                $this->forge->addColumn('bf_projects_fund_transactions', [
                    'idempotency_key' => [
                        'type' => 'VARCHAR',
                        'constraint' => 100,
                        'null' => true,
                    ],
                ]);
                $this->db->query('CREATE INDEX idx_idempotency_key ON bf_projects_fund_transactions (idempotency_key)');
            }
        }

        if ($this->db->tableExists('bf_projects')) {
            $fields = $this->db->getFieldNames('bf_projects');
            if (! in_array('nav_update_in_progress', $fields, true)) {
                $this->forge->addColumn('bf_projects', [
                    'nav_update_in_progress' => [
                        'type' => 'TINYINT',
                        'constraint' => 1,
                        'default' => 0,
                        'null' => false,
                    ],
                ]);
            }
        }
    }

    public function down()
    {
        if ($this->db->tableExists('bf_projects_fund_transactions')) {
            $fields = $this->db->getFieldNames('bf_projects_fund_transactions');
            if (in_array('idempotency_key', $fields, true)) {
                $this->forge->dropColumn('bf_projects_fund_transactions', 'idempotency_key');
            }
        }

        if ($this->db->tableExists('bf_projects')) {
            $fields = $this->db->getFieldNames('bf_projects');
            if (in_array('nav_update_in_progress', $fields, true)) {
                $this->forge->dropColumn('bf_projects', 'nav_update_in_progress');
            }
        }
    }
}
