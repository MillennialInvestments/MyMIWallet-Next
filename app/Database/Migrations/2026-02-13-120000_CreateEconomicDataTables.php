<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEconomicDataTables extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_economic_indicators')) {
            $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'name' => ['type' => 'VARCHAR', 'constraint' => 100],
                'series_id' => ['type' => 'VARCHAR', 'constraint' => 50],
                'source' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'fred'],
                'frequency' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
                'unit' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
                'created_on' => ['type' => 'DATETIME'],
                'last_updated' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey(['series_id', 'source']);
            $this->forge->createTable('bf_economic_indicators');
        }

        if (! $this->db->tableExists('bf_economic_data_points')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'indicator_id' => ['type' => 'INT', 'unsigned' => true],
                'date' => ['type' => 'DATE'],
                'value' => ['type' => 'DECIMAL', 'constraint' => '20,6', 'null' => true],
                'created_on' => ['type' => 'DATETIME'],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('indicator_id');
            $this->forge->addUniqueKey(['indicator_id', 'date'], 'unique_indicator_date');
            $this->forge->createTable('bf_economic_data_points');
        }
    }

    public function down()
    {
        if ($this->db->tableExists('bf_economic_data_points')) {
            $this->forge->dropTable('bf_economic_data_points');
        }
        if ($this->db->tableExists('bf_economic_indicators')) {
            $this->forge->dropTable('bf_economic_indicators');
        }
    }
}
