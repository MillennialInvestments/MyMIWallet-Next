<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOverledgerTables extends Migration
{
    public function up()
    {
        // Audit table
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
                'unsigned'   => true,
            ],
            'action' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'request_id' => [
                'type'       => 'VARCHAR',
                'constraint' => 64,
            ],
            'request_payload_hash' => [
                'type'       => 'CHAR',
                'constraint' => 64,
                'null'       => true,
            ],
            'http_status' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
            ],
            'response_time_ms' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
            ],
            'error_message' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => false,
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('request_id');
        $this->forge->addKey('action');
        $this->forge->createTable('bf_overledger_audit', true);

        // Daily usage aggregation
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'date' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'environment' => [
                'type'       => 'VARCHAR',
                'constraint' => 32,
            ],
            'endpoint' => [
                'type'       => 'VARCHAR',
                'constraint' => 64,
            ],
            'calls' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'default'    => 0,
            ],
            'errors' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'default'    => 0,
            ],
            'avg_latency_ms' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'default'    => 0,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => false,
                'default' => 'CURRENT_TIMESTAMP',
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
                'default' => null,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['date', 'environment', 'endpoint']);
        $this->forge->createTable('bf_overledger_usage_daily', true);
    }

    public function down()
    {
        $this->forge->dropTable('bf_overledger_audit', true);
        $this->forge->dropTable('bf_overledger_usage_daily', true);
    }
}
