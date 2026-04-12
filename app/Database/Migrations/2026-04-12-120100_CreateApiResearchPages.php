<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateApiResearchPages extends Migration
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
            'url' => [
                'type' => 'TEXT',
            ],
            'url_hash' => [
                'type'       => 'CHAR',
                'constraint' => 64,
            ],
            'depth' => [
                'type'    => 'INT',
                'default' => 0,
            ],
            'status_code' => [
                'type' => 'INT',
                'null' => true,
            ],
            'content_type' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'null'       => true,
            ],
            'text_excerpt' => [
                'type' => 'MEDIUMTEXT',
                'null' => true,
            ],
            'raw_text' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'html_hash' => [
                'type'       => 'CHAR',
                'constraint' => 64,
                'null'       => true,
            ],
            'is_spec_candidate' => [
                'type'    => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
            ],
            'is_reference_page' => [
                'type'    => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('run_id');
        $this->forge->addKey('url_hash');
        $this->forge->createTable('bf_api_research_pages', true);
    }

    public function down()
    {
        $this->forge->dropTable('bf_api_research_pages', true);
    }
}