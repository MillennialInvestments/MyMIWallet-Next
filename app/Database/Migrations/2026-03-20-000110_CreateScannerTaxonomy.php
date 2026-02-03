<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateScannerTaxonomy extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_scanner_taxonomy')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'scanner_name_raw' => ['type' => 'VARCHAR', 'constraint' => 255],
                'scanner_key' => ['type' => 'VARCHAR', 'constraint' => 191],
                'scanner_family' => ['type' => 'VARCHAR', 'constraint' => 191, 'null' => true],
                'default_timeframe' => ['type' => 'VARCHAR', 'constraint' => 32, 'null' => true],
                'created_at' => ['type' => 'DATETIME'],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('scanner_key');
            $this->forge->addUniqueKey('scanner_name_raw');
            $this->forge->createTable('bf_scanner_taxonomy');
        }
    }

    public function down()
    {
        if ($this->db->tableExists('bf_scanner_taxonomy')) {
            $this->forge->dropTable('bf_scanner_taxonomy');
        }
    }
}
