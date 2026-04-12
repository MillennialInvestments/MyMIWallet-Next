<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateApiResearchRuns extends Migration
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
            'provider_slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'provider_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'start_url' => [
                'type' => 'TEXT',
            ],
            'docs_domain' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => 'queued',
            ],
            'pages_scraped' => [
                'type'    => 'INT',
                'default' => 0,
            ],
            'specs_found' => [
                'type'    => 'INT',
                'default' => 0,
            ],
            'endpoints_found' => [
                'type'    => 'INT',
                'default' => 0,
            ],
            'auth_confidence' => [
                'type'       => 'DECIMAL',
                'constraint' => '5,2',
                'default'    => 0.00,
            ],
            'integration_score' => [
                'type'       => 'DECIMAL',
                'constraint' => '5,2',
                'default'    => 0.00,
            ],
            'raw_snapshot_path' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'markdown_report_path' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'json_snapshot_path' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'ai_summary_path' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'error_message' => [
                'type' => 'MEDIUMTEXT',
                'null' => true,
            ],
            'started_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'completed_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => false,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('provider_slug');
        $this->forge->addKey('status');
        $this->forge->createTable('bf_api_research_runs', true);
    }

    public function down()
    {
        $this->forge->dropTable('bf_api_research_runs', true);
    }
}