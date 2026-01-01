<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePredictionsOptions extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'market_id'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'label'          => ['type' => 'VARCHAR', 'constraint' => 150],
            'odds_bips'      => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'liquidity_gold' => ['type' => 'DECIMAL', 'constraint' => '20,8', 'default' => '0.00000000'],
            'is_winner'      => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
            'updated_at'     => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['market_id', 'label']);
        $this->forge->addKey('is_winner');
        $this->forge->addForeignKey('market_id', 'bf_predictions_markets', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bf_predictions_options', true);
    }

    public function down(): void
    {
        $this->forge->dropTable('bf_predictions_options', true);
    }
}
