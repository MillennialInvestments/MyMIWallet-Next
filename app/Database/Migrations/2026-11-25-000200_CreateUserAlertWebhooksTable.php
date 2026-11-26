<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserAlertWebhooksTable extends Migration
{
    public function up()
    {
        // 1. Webhook configurations per user
        if (! $this->db->tableExists('bf_user_alert_webhooks')) {
            $this->forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'user_id' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                    'unsigned'   => true,
                ],
                'webhook_token' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 64,
                ],
                'name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                    'default'    => 'Default Webhook',
                ],
                'provider' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 50,
                    'default'    => 'tradingview',
                ],
                'status' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 20,
                    'default'    => 'active',
                ],
                'secret_key' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 64,
                    'null'       => true,
                ],
                'alert_count' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                    'unsigned'   => true,
                    'default'    => 0,
                ],
                'last_received_at' => [
                    'type' => 'DATETIME',
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
            $this->forge->addKey('user_id');
            $this->forge->addUniqueKey('webhook_token');
            $this->forge->createTable('bf_user_alert_webhooks', true);
        }

        // 2. Inbound trade alerts received for users
        if (! $this->db->tableExists('bf_user_incoming_alerts')) {
            $this->forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'user_id' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                    'unsigned'   => true,
                ],
                'webhook_id' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                    'unsigned'   => true,
                    'null'       => true,
                ],
                'provider' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 50,
                    'default'    => 'tradingview',
                ],
                'ticker' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 20,
                ],
                'action' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 20,
                    'default'    => 'ALERT',
                ],
                'price' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '18,4',
                    'null'       => true,
                ],
                'entry_price' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '18,4',
                    'null'       => true,
                ],
                'target_price' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '18,4',
                    'null'       => true,
                ],
                'stop_loss' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '18,4',
                    'null'       => true,
                ],
                'strategy' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                    'null'       => true,
                ],
                'timeframe' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 20,
                    'null'       => true,
                ],
                'message' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
                'raw_payload' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
                'status' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 20,
                    'default'    => 'active',
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
            $this->forge->addKey('user_id');
            $this->forge->addKey('ticker');
            $this->forge->addKey('provider');
            $this->forge->addKey('created_at');
            $this->forge->createTable('bf_user_incoming_alerts', true);
        }
    }

    public function down()
    {
        $this->forge->dropTable('bf_user_incoming_alerts', true);
        $this->forge->dropTable('bf_user_alert_webhooks', true);
    }
}
