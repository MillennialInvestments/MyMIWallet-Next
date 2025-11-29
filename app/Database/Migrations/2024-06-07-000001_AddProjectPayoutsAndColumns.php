<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddProjectPayoutsAndColumns extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_project_payouts')) {
            $this->forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'constraint'     => 10,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'user_id' => [
                    'type'       => 'INT',
                    'constraint' => 10,
                    'unsigned'   => true,
                    'null'       => false,
                ],
                'project_id' => [
                    'type'       => 'INT',
                    'constraint' => 10,
                    'unsigned'   => true,
                    'null'       => false,
                ],
                'amount' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '15,2',
                    'default'    => '0.00',
                ],
                'payout_date' => [
                    'type' => 'DATE',
                    'null' => true,
                ],
                'status' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 32,
                    'default'    => 'completed',
                ],
                'notes' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
                'created_at' => [
                    'type'    => 'DATETIME',
                    'null'    => false,
                    'default' => new RawSql('CURRENT_TIMESTAMP'),
                ],
                'updated_at' => [
                    'type'    => 'DATETIME',
                    'null'    => true,
                    'default' => null,
                ],
            ]);

            $this->forge->addKey('id', true);
            $this->forge->addKey('user_id');
            $this->forge->addKey('project_id');
            $this->forge->createTable('bf_project_payouts', true, ['ENGINE' => 'InnoDB']);
        }

        if (! $this->db->fieldExists('created_on', 'bf_investment_trade_alerts')) {
            $this->forge->addColumn('bf_investment_trade_alerts', [
                'created_on' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
            ]);
        }

        if (! $this->db->fieldExists('modified_on', 'bf_investment_trade_alerts')) {
            $this->forge->addColumn('bf_investment_trade_alerts', [
                'modified_on' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
            ]);
        }

        if (! $this->db->fieldExists('source', 'bf_marketing_scraper')) {
            $this->forge->addColumn('bf_marketing_scraper', [
                'source' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 64,
                    'null'       => true,
                ],
            ]);
        }

        if (! $this->db->fieldExists('first_name', 'bf_users_referrals')) {
            $this->forge->addColumn('bf_users_referrals', [
                'first_name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                    'null'       => true,
                ],
            ]);
        }

        if (! $this->db->fieldExists('last_name', 'bf_users_referrals')) {
            $this->forge->addColumn('bf_users_referrals', [
                'last_name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                    'null'       => true,
                ],
            ]);
        }
    }

    public function down()
    {
        if ($this->db->tableExists('bf_project_payouts')) {
            $this->forge->dropTable('bf_project_payouts', true);
        }

        if ($this->db->fieldExists('created_on', 'bf_investment_trade_alerts')) {
            $this->forge->dropColumn('bf_investment_trade_alerts', 'created_on');
        }

        if ($this->db->fieldExists('modified_on', 'bf_investment_trade_alerts')) {
            $this->forge->dropColumn('bf_investment_trade_alerts', 'modified_on');
        }

        if ($this->db->fieldExists('source', 'bf_marketing_scraper')) {
            $this->forge->dropColumn('bf_marketing_scraper', 'source');
        }

        if ($this->db->fieldExists('first_name', 'bf_users_referrals')) {
            $this->forge->dropColumn('bf_users_referrals', 'first_name');
        }

        if ($this->db->fieldExists('last_name', 'bf_users_referrals')) {
            $this->forge->dropColumn('bf_users_referrals', 'last_name');
        }
    }
}
