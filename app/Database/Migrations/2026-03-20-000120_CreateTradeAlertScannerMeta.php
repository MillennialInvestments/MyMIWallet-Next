<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTradeAlertScannerMeta extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_trade_alert_scanner_meta')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'alert_id' => ['type' => 'BIGINT', 'unsigned' => true],
                'scanner_key' => ['type' => 'VARCHAR', 'constraint' => 191],
                'scanner_family' => ['type' => 'VARCHAR', 'constraint' => 191, 'null' => true],
                'timeframe' => ['type' => 'VARCHAR', 'constraint' => 32, 'null' => true],
                'signal' => ['type' => 'VARCHAR', 'constraint' => 16, 'null' => true],
                'tags_json' => ['type' => 'LONGTEXT', 'null' => true],
                'created_at' => ['type' => 'DATETIME'],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('alert_id');
            $this->forge->addKey('scanner_key');
            $this->forge->createTable('bf_trade_alert_scanner_meta');
        }
    }

    public function down()
    {
        if ($this->db->tableExists('bf_trade_alert_scanner_meta')) {
            $this->forge->dropTable('bf_trade_alert_scanner_meta');
        }
    }
}
