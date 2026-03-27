<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProjectExchangeBridgeFlags extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_projects')) {
            return;
        }

        $fields = $this->db->getFieldNames('bf_projects');

        $columns = [
            'linked_token_id' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
            'exchange_asset_id' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
            'exchange_enabled' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0, 'null' => false],
            'primary_issuance_enabled' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1, 'null' => false],
            'secondary_trading_enabled' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0, 'null' => false],
            'compliance_required' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1, 'null' => false],
            'fund_issuance_status' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'active', 'null' => false],
        ];

        foreach ($columns as $name => $meta) {
            if (! in_array($name, $fields, true)) {
                $this->forge->addColumn('bf_projects', [$name => $meta]);
            }
        }
    }

    public function down()
    {
        if (! $this->db->tableExists('bf_projects')) {
            return;
        }

        foreach (['fund_issuance_status', 'compliance_required', 'secondary_trading_enabled', 'primary_issuance_enabled', 'exchange_enabled', 'exchange_asset_id', 'linked_token_id'] as $field) {
            if (in_array($field, $this->db->getFieldNames('bf_projects'), true)) {
                $this->forge->dropColumn('bf_projects', $field);
            }
        }
    }
}
