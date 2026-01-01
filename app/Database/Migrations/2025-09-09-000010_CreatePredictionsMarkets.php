<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePredictionsMarkets extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'slug'              => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'title'             => ['type' => 'VARCHAR', 'constraint' => 255],
            'description'       => ['type' => 'TEXT', 'null' => true],
            'category'          => ['type' => 'VARCHAR', 'constraint' => 100, 'default' => 'General'],
            'resolution_source' => ['type' => 'VARCHAR', 'constraint' => 150, 'default' => 'Admin/Oracle'],
            'currency_mode'     => ['type' => 'ENUM', 'constraint' => ['GOLD_CENTRIC', 'MULTI_ASSET'], 'default' => 'GOLD_CENTRIC'],
            'state'             => ['type' => 'ENUM', 'constraint' => ['DRAFT', 'OPEN', 'LOCKED', 'RESOLVED', 'CANCELED'], 'default' => 'OPEN'],
            'open_at'           => ['type' => 'DATETIME', 'null' => true],
            'lock_at'           => ['type' => 'DATETIME', 'null' => true],
            'resolve_at'        => ['type' => 'DATETIME', 'null' => true],
            'created_by'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'created_at'        => ['type' => 'DATETIME', 'null' => true],
            'updated_at'        => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('slug', false, true);
        $this->forge->addKey('state');
        $this->forge->addKey('category');
        $this->forge->addKey('lock_at');
        $this->forge->addKey('created_by');
        $this->forge->addForeignKey('created_by', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('bf_predictions_markets', true);
    }

    public function down(): void
    {
        $this->forge->dropTable('bf_predictions_markets', true);
    }
}
