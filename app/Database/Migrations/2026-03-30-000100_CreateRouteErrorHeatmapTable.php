<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRouteErrorHeatmapTable extends Migration
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
            'route' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'error_type' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'status_code' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'hit_count' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 1,
            ],
            'last_seen' => [
                'type' => 'DATETIME',
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
        $this->forge->addUniqueKey(['route', 'error_type', 'status_code'], 'uniq_route_error');
        $this->forge->createTable('bf_route_error_heatmap', true);
    }

    public function down()
    {
        $this->forge->dropTable('bf_route_error_heatmap', true);
    }
}
