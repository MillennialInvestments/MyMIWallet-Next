<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateApiResearchDiffs extends Migration
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
            'old_run_id' => [
                'type'       => 'BIGINT',
                'constraint' => 20,
                'unsigned'   => true,
            ],
            'new_run_id' => [
                'type'       => 'BIGINT',
                'constraint' => 20,
                'unsigned'   => true,
            ],
            'diff_summary' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'new_endpoints_json' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'removed_endpoints_json' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'changed_endpoints_json' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'auth_changes_json' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'rate_limit_changes_json' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('provider_slug');
        $this->forge->createTable('bf_api_research_diffs', true);
    }

    public function down()
    {
        $this->forge->dropTable('bf_api_research_diffs', true);
    }
}