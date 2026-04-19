<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMarketingPageSeoTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id'               => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'page_name'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'page_title'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'page_description' => ['type' => 'TEXT', 'null' => true],
            'page_url'         => ['type' => 'VARCHAR', 'constraint' => 500, 'null' => true],
            'page_internal_url'=> ['type' => 'VARCHAR', 'constraint' => 500, 'null' => true],
            'page_image'       => ['type' => 'VARCHAR', 'constraint' => 500, 'null' => true],
            'status'           => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'Active', 'null' => true],
            'source'           => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'created_at'       => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'       => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('page_name');
        $this->forge->addKey('page_internal_url');
        $this->forge->createTable('bf_marketing_page_seo', true);
    }

    public function down(): void
    {
        $this->forge->dropTable('bf_marketing_page_seo', true);
    }
}
