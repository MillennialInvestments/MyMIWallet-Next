<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePredictionsSettlementsPayouts extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'market_id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'winning_option_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'resolver_user_id'  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'resolution_note'   => ['type' => 'TEXT', 'null' => true],
            'resolved_at'       => ['type' => 'DATETIME'],
            'created_at'        => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('market_id');
        $this->forge->addKey('resolver_user_id');
        $this->forge->addForeignKey('market_id', 'bf_predictions_markets', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('winning_option_id', 'bf_predictions_options', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('resolver_user_id', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('bf_predictions_settlements', true);

        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'market_id'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'position_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'asset'       => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'MIMG'],
            'amount'      => ['type' => 'DECIMAL', 'constraint' => '20,8', 'default' => '0.00000000'],
            'status'      => ['type' => 'ENUM', 'constraint' => ['PENDING', 'SENT', 'FAILED'], 'default' => 'PENDING'],
            'tx_ref'      => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('user_id');
        $this->forge->addKey('market_id');
        $this->forge->addKey('position_id');
        $this->forge->addKey('status');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('market_id', 'bf_predictions_markets', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('position_id', 'bf_predictions_positions', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bf_predictions_payouts', true);
    }

    public function down(): void
    {
        $this->forge->dropTable('bf_predictions_payouts', true);
        $this->forge->dropTable('bf_predictions_settlements', true);
    }
}
