<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDiscordCategoryFieldsToMarketingGeneratedContent extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_marketing_generated_content')) {
            return;
        }

        $fields = [
            'primary_category' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true, 'after' => 'source_id'],
            'secondary_tags' => ['type' => 'LONGTEXT', 'null' => true, 'after' => 'primary_category'],
            'content_type' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true, 'after' => 'source_type'],
        ];

        foreach ($fields as $name => $definition) {
            if (! $this->db->fieldExists($name, 'bf_marketing_generated_content')) {
                $this->forge->addColumn('bf_marketing_generated_content', [$name => $definition]);
            }
        }
    }

    public function down()
    {
        if (! $this->db->tableExists('bf_marketing_generated_content')) {
            return;
        }

        foreach (['primary_category', 'secondary_tags', 'content_type'] as $field) {
            if ($this->db->fieldExists($field, 'bf_marketing_generated_content')) {
                $this->forge->dropColumn('bf_marketing_generated_content', $field);
            }
        }
    }
}
