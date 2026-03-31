<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTickerToProjects extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_projects')) {
            return;
        }

        $fields = $this->db->getFieldNames('bf_projects');

        if (! in_array('ticker', $fields, true)) {
            $this->forge->addColumn('bf_projects', [
                'ticker' => [
                    'type' => 'VARCHAR',
                    'constraint' => 20,
                    'null' => true,
                    'after' => 'exchange_symbol',
                ],
            ]);
        }

        if (! in_array('exchange_asset_id', $fields, true)) {
            $this->forge->addColumn('bf_projects', [
                'exchange_asset_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'null' => true,
                ],
            ]);
        }
    }

    public function down()
    {
        if (! $this->db->tableExists('bf_projects')) {
            return;
        }

        $fields = $this->db->getFieldNames('bf_projects');
        if (in_array('ticker', $fields, true)) {
            $this->forge->dropColumn('bf_projects', 'ticker');
        }
    }
}
