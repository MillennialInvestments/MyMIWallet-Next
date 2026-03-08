<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateResearchTables extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'item_type' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'category' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'symbol' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
            'source' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'title' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'url' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'summary' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'score' => [
                'type' => 'DECIMAL',
                'constraint' => '12,4',
                'default' => 0,
            ],
            'payload_json' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'published_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['item_type', 'category']);
        $this->forge->addKey(['symbol']);
        $this->forge->createTable('bf_research_items', true);

        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'metric_type' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'metric_key' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'symbol' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
            'source' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'metric_value' => [
                'type' => 'DECIMAL',
                'constraint' => '20,8',
                'null' => true,
            ],
            'payload_json' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'metric_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['metric_type', 'metric_key']);
        $this->forge->addKey(['symbol']);
        $this->forge->createTable('bf_research_metrics', true);

        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'task_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
            ],
            'message' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'payload_json' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'started_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'finished_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['task_name', 'status']);
        $this->forge->createTable('bf_research_runs', true);

        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'file_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'file_hash' => [
                'type'       => 'VARCHAR',
                'constraint' => 64,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
            ],
            'records_imported' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'processed_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['file_name', 'file_hash']);
        $this->forge->createTable('bf_import_files', true);
    }

    public function down()
    {
        $this->forge->dropTable('bf_import_files', true);
        $this->forge->dropTable('bf_research_runs', true);
        $this->forge->dropTable('bf_research_metrics', true);
        $this->forge->dropTable('bf_research_items', true);
    }
}