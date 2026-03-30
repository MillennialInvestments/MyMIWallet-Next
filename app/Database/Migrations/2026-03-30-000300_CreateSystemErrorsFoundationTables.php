<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSystemErrorsFoundationTables extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'level' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'default' => 'error',
            ],
            'message' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'file' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'line' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'route' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'classification' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'default' => 'UNKNOWN',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('route');
        $this->forge->addKey('classification');
        $this->forge->createTable('system_errors', true);

        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'route' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'error_count' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
            ],
            'last_error' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('route', 'uniq_route');
        $this->forge->createTable('error_heatmap', true);
    }

    public function down()
    {
        $this->forge->dropTable('error_heatmap', true);
        $this->forge->dropTable('system_errors', true);
    }
}
