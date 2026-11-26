<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migration creating paper exchange order and balance tables.
 *
 * MYMI-XCHAIN-001 Wave W6.
 */
class CreatePaperExchangeTables extends Migration
{
    public function up(): void
    {
        // 1. Paper exchange balances table
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
                'unsigned'   => true,
            ],
            'asset' => [
                'type'       => 'VARCHAR',
                'constraint' => 32,
            ],
            'balance' => [
                'type'       => 'DECIMAL',
                'constraint' => '24,8',
                'default'    => '0.00000000',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['user_id', 'asset'], false, true); // unique user_id + asset
        $this->forge->createTable('bf_paper_exchange_balances', true);

        // 2. Paper exchange orders table
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
                'unsigned'   => true,
            ],
            'order_id' => [
                'type'       => 'VARCHAR',
                'constraint' => 64,
            ],
            'symbol' => [
                'type'       => 'VARCHAR',
                'constraint' => 32,
            ],
            'side' => [
                'type'       => 'VARCHAR',
                'constraint' => 16, // 'buy' or 'sell'
            ],
            'order_type' => [
                'type'       => 'VARCHAR',
                'constraint' => 16, // 'market' or 'limit'
                'default'    => 'market',
            ],
            'quantity' => [
                'type'       => 'DECIMAL',
                'constraint' => '24,8',
            ],
            'price' => [
                'type'       => 'DECIMAL',
                'constraint' => '24,8',
            ],
            'filled_quantity' => [
                'type'       => 'DECIMAL',
                'constraint' => '24,8',
                'default'    => '0.00000000',
            ],
            'total_cost' => [
                'type'       => 'DECIMAL',
                'constraint' => '24,8',
                'default'    => '0.00000000',
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => 32, // 'pending', 'filled', 'cancelled', 'rejected'
                'default'    => 'pending',
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
        $this->forge->addUniqueKey('order_id');
        $this->forge->addKey(['user_id', 'status']);
        $this->forge->createTable('bf_paper_exchange_orders', true);
    }

    public function down(): void
    {
        $this->forge->dropTable('bf_paper_exchange_orders', true);
        $this->forge->dropTable('bf_paper_exchange_balances', true);
    }
}
