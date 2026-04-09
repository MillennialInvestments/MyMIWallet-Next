<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EnhanceMarketingGenerationPipeline extends Migration
{
    public function up()
    {
        $fields = [
            'source_type' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true, 'after' => 'notification_id'],
            'source_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true, 'after' => 'source_type'],
            'status' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'pending_generation', 'after' => 'content_json'],
            'approval_status' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'pending_review', 'after' => 'status'],
            'distribution_status' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'pending', 'after' => 'approval_status'],
            'version' => ['type' => 'INT', 'constraint' => 11, 'default' => 1, 'after' => 'distribution_status'],
            'content_hash' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true, 'after' => 'version'],
            'title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true, 'after' => 'story_id'],
            'summary' => ['type' => 'LONGTEXT', 'null' => true, 'after' => 'title'],
            'keywords' => ['type' => 'LONGTEXT', 'null' => true, 'after' => 'summary'],
        ];

        foreach ($fields as $name => $definition) {
            if (! $this->db->fieldExists($name, 'bf_marketing_generated_content')) {
                $this->forge->addColumn('bf_marketing_generated_content', [$name => $definition]);
            }
        }

        if (! $this->db->tableExists('bf_marketing_distribution_log')) {
            $this->forge->addField([
                'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'generated_content_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
                'platform' => ['type' => 'VARCHAR', 'constraint' => 80],
                'status' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'queued'],
                'response_payload' => ['type' => 'LONGTEXT', 'null' => true],
                'error_message' => ['type' => 'LONGTEXT', 'null' => true],
                'attempted_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('generated_content_id');
            $this->forge->createTable('bf_marketing_distribution_log', true);
        }

        if (! $this->db->tableExists('bf_marketing_generated_content_versions')) {
            $this->forge->addField([
                'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'generated_content_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
                'version' => ['type' => 'INT', 'constraint' => 11, 'default' => 1],
                'content_json' => ['type' => 'LONGTEXT'],
                'edited_by' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('generated_content_id');
            $this->forge->createTable('bf_marketing_generated_content_versions', true);
        }
    }

    public function down()
    {
        $this->forge->dropTable('bf_marketing_generated_content_versions', true);
        $this->forge->dropTable('bf_marketing_distribution_log', true);

        foreach (['source_type', 'source_id', 'status', 'approval_status', 'distribution_status', 'version', 'content_hash', 'title', 'summary', 'keywords'] as $field) {
            if ($this->db->fieldExists($field, 'bf_marketing_generated_content')) {
                $this->forge->dropColumn('bf_marketing_generated_content', $field);
            }
        }
    }
}
