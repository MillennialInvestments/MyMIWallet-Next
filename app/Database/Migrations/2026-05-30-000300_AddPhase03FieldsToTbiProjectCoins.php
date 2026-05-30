<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPhase03FieldsToTbiProjectCoins extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_tbi_project_coins')) {
            return;
        }

        $fields = $this->db->getFieldNames('bf_tbi_project_coins');
        $add = [];
        if (! in_array('network', $fields, true)) {
            $add['network'] = ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'devnet', 'after' => 'coin_type'];
        }
        if (! in_array('decimals', $fields, true)) {
            $add['decimals'] = ['type' => 'INT', 'constraint' => 2, 'default' => 6, 'after' => 'network'];
        }
        if (! in_array('initial_supply', $fields, true)) {
            $add['initial_supply'] = ['type' => 'DECIMAL', 'constraint' => '24,6', 'default' => '0.000000', 'after' => 'decimals'];
        }
        if (! in_array('metadata_uri', $fields, true)) {
            $add['metadata_uri'] = ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true, 'after' => 'solana_mint_address'];
        }
        if (! in_array('created_by', $fields, true)) {
            $add['created_by'] = ['type' => 'BIGINT', 'unsigned' => true, 'null' => true, 'after' => 'metadata_json'];
        }

        if ($add !== []) {
            $this->forge->addColumn('bf_tbi_project_coins', $add);
        }
    }

    public function down()
    {
        if (! $this->db->tableExists('bf_tbi_project_coins')) {
            return;
        }

        foreach (['created_by', 'metadata_uri', 'initial_supply', 'decimals', 'network'] as $field) {
            if (in_array($field, $this->db->getFieldNames('bf_tbi_project_coins'), true)) {
                $this->forge->dropColumn('bf_tbi_project_coins', $field);
            }
        }
    }
}
