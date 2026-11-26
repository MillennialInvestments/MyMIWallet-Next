<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migration creating MyMI Coin accredited investor interest table.
 *
 * MYMI-XCHAIN-001 Wave W7.
 */
class CreateMyMICoinInterestTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'accreditation_attestation' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'intended_investment_usd' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'default'    => '0.00',
            ],
            'notes' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('user_id');
        $this->forge->createTable('bf_mymicoin_interest_list', true);
    }

    public function down(): void
    {
        $this->forge->dropTable('bf_mymicoin_interest_list', true);
    }
}
