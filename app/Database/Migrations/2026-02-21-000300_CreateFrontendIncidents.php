<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFrontendIncidents extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'incident_type' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
                'comment' => 'csp_style, csp_script, api_404, json_parse, duplicate_pixel, other',
            ],
            'source_file' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
            ],
            'endpoint' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'message' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'severity' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
                'default' => 'LOW',
            ],
            'raw_blob' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'processed_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
                'default' => 'new',
                'comment' => 'new, triaged, resolved',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey(['incident_type', 'severity']);
        $this->forge->addKey(['status', 'created_at']);
        $this->forge->addKey(['endpoint']);
        $this->forge->createTable('bf_frontend_incidents', true);
    }

    public function down()
    {
        $this->forge->dropTable('bf_frontend_incidents', true);
    }
}
