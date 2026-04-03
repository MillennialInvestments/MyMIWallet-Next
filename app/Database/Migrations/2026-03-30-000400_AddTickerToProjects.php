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
            $afterColumn = in_array('exchange_symbol', $fields, true)
                ? 'exchange_symbol'
                : (in_array('coin_ticker', $fields, true) ? 'coin_ticker' : null);
            $this->forge->addColumn('bf_projects', [
                'ticker' => [
                    'type' => 'VARCHAR',
                    'constraint' => 20,
                    'null' => true,
                ],
            ]);
            if ($afterColumn !== null) {
                $this->db->query(sprintf(
                    "ALTER TABLE bf_projects MODIFY COLUMN ticker VARCHAR(20) NULL AFTER %s",
                    $afterColumn
                ));
            }
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
