<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFinancialNewsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'source' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
            'title' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'url' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'summary' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('bf_financial_news', true);
    }

    public function down()
    {
        $this->forge->dropTable('bf_financial_news', true);
    }
}