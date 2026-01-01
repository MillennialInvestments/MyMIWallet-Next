<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePredictionsTrades extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'order_id'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'user_id'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'market_id'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'option_id'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'stake_asset'    => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'MIMG'],
            'stake_amount'   => ['type' => 'DECIMAL', 'constraint' => '20,8', 'default' => '0.00000000'],
            'fee_amount'     => ['type' => 'DECIMAL', 'constraint' => '20,8', 'default' => '0.00000000'],
            'fill_odds_bips' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('order_id');
        $this->forge->addKey('user_id');
        $this->forge->addKey('market_id');
        $this->forge->addKey('option_id');
        $this->forge->addForeignKey('order_id', 'bf_predictions_orders', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('market_id', 'bf_predictions_markets', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('option_id', 'bf_predictions_options', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bf_predictions_trades', true);
    }

    public function down(): void
    {
        $this->forge->dropTable('bf_predictions_trades', true);
    }
}
