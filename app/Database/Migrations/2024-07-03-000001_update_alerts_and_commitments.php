<?php

namespace App\Database\Migrations;

use CodeIgniter\Migration;

class UpdateAlertsAndCommitments extends Migration
{
    public function up()
    {
        if ($this->db->tableExists('bf_investment_trade_alerts') && ! $this->db->fieldExists('direction', 'bf_investment_trade_alerts')) {
            $this->forge->addColumn('bf_investment_trade_alerts', [
                'direction' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 16,
                    'null'       => true,
                    'after'      => 'ticker',
                    'default'    => 'Long',
                ],
            ]);
        }

        if ($this->db->tableExists('bf_project_commitments') && ! $this->db->fieldExists('deleted_at', 'bf_project_commitments')) {
            $this->forge->addColumn('bf_project_commitments', [
                'deleted_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                    'after' => 'updated_at',
                ],
            ]);
        }
    }

    public function down()
    {
        if ($this->db->tableExists('bf_investment_trade_alerts') && $this->db->fieldExists('direction', 'bf_investment_trade_alerts')) {
            $this->forge->dropColumn('bf_investment_trade_alerts', 'direction');
        }

        if ($this->db->tableExists('bf_project_commitments') && $this->db->fieldExists('deleted_at', 'bf_project_commitments')) {
            $this->forge->dropColumn('bf_project_commitments', 'deleted_at');
        }
    }
}
