<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStockFundamentalsTable extends Migration
{
    public function up()
    {
        if ($this->db->tableExists('bf_stock_fundamentals')) {
            return;
        }

        $this->forge->addField([
            'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'ticker' => ['type' => 'VARCHAR', 'constraint' => 10],
            'data' => ['type' => 'LONGTEXT', 'null' => true],
            'created_on' => ['type' => 'DATETIME'],
            'last_refreshed' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('ticker');
        $this->forge->createTable('bf_stock_fundamentals');
    }

    public function down()
    {
        if ($this->db->tableExists('bf_stock_fundamentals')) {
            $this->forge->dropTable('bf_stock_fundamentals');
        }
    }
}

