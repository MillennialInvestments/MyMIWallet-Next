<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateResearchInsights extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'insight_type' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'symbol' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
            'headline' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'score' => [
                'type'       => 'DECIMAL',
                'constraint' => '12,4',
                'default'    => 0,
            ],
            'source' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'payload_json' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'insight_date' => [
                'type' => 'DATETIME',
                'null' => true,
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
        $this->forge->addKey(['insight_type', 'symbol']);
        $this->forge->addKey('insight_date');
        $this->forge->createTable('bf_research_insights', true);
    }

    public function down()
    {
        $this->forge->dropTable('bf_research_insights', true);
    }
}