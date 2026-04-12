<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateApiResearchEndpoints extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'run_id' => [
                'type'       => 'BIGINT',
                'constraint' => 20,
                'unsigned'   => true,
            ],
            'spec_id' => [
                'type'       => 'BIGINT',
                'constraint' => 20,
                'unsigned'   => true,
                'null'       => true,
            ],
            'method' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
            'path' => [
                'type' => 'TEXT',
            ],
            'operation_id' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'summary' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'description' => [
                'type' => 'MEDIUMTEXT',
                'null' => true,
            ],
            'tags_json' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'parameters_json' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'request_body_json' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'responses_json' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'security_json' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'rate_limit_notes' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'example_request' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'example_response' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('run_id');
        $this->forge->addKey('method');
        $this->forge->addKey('spec_id');
        $this->forge->createTable('bf_api_research_endpoints', true);
    }

    public function down()
    {
        $this->forge->dropTable('bf_api_research_endpoints', true);
    }
}