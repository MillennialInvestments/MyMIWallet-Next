<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddExchangeSymbolToProjects extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_projects')) {
            return;
        }

        $fields = $this->db->getFieldNames('bf_projects');
        if (! in_array('exchange_symbol', $fields, true)) {
            $after = in_array('coin_ticker', $fields, true) ? 'coin_ticker' : null;
            $column = [
                'exchange_symbol' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 50,
                    'null'       => true,
                ],
            ];
            if ($after !== null) {
                $column['exchange_symbol']['after'] = $after;
            }
            $this->forge->addColumn('bf_projects', $column);
        }

        $indexNames = [];
        foreach ($this->db->getIndexData('bf_projects') as $idx) {
            $indexNames[] = strtolower((string) ($idx->name ?? ($idx['Key_name'] ?? '')));
        }
        if (! in_array('idx_bf_projects_exchange_symbol', $indexNames, true)) {
            $this->db->query('CREATE INDEX idx_bf_projects_exchange_symbol ON bf_projects (exchange_symbol)');
        }

        $this->db->query("UPDATE bf_projects
            SET exchange_symbol = coin_ticker
            WHERE (exchange_symbol IS NULL OR exchange_symbol = '')
              AND coin_ticker IS NOT NULL
              AND coin_ticker <> ''");
    }

    public function down()
    {
        if (! $this->db->tableExists('bf_projects')) {
            return;
        }

        $fields = $this->db->getFieldNames('bf_projects');
        if (in_array('exchange_symbol', $fields, true)) {
            $this->forge->dropColumn('bf_projects', 'exchange_symbol');
        }
    }
}
