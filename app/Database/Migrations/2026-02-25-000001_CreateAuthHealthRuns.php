<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAuthHealthRuns extends Migration
{
    public function up(): void
    {
        $tableAttributes = [
            'ENGINE'  => 'InnoDB',
            'DEFAULT CHARSET' => 'utf8mb4',
            'COLLATE' => 'utf8mb4_unicode_ci',
        ];

        $this->forge->addField([
            'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'run_at' => ['type' => 'DATETIME'],
            'status' => ['type' => 'VARCHAR', 'constraint' => 10],
            'score' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'summary' => ['type' => 'VARCHAR', 'constraint' => 255],
            'details_json' => ['type' => 'LONGTEXT', 'null' => true],
            'duration_ms' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'server' => ['type' => 'VARCHAR', 'constraint' => 64],
            'build_tag' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('run_at');
        $this->forge->createTable('bf_auth_health_runs', true, $tableAttributes);
    }

    public function down(): void
    {
        $this->forge->dropTable('bf_auth_health_runs', true);
    }
}
