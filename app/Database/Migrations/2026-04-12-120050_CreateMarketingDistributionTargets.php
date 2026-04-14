<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMarketingDistributionTargets extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_marketing_distribution_targets')) {
            $this->forge->addField([
                'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'generated_content_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
                'story_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
                'channel' => ['type' => 'VARCHAR', 'constraint' => 60],
                'destination' => ['type' => 'VARCHAR', 'constraint' => 60],
                'payload_json' => ['type' => 'LONGTEXT', 'null' => true],
                'status' => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'pending'],
                'queued_at' => ['type' => 'DATETIME', 'null' => true],
                'sent_at' => ['type' => 'DATETIME', 'null' => true],
                'failed_at' => ['type' => 'DATETIME', 'null' => true],
                'response_json' => ['type' => 'LONGTEXT', 'null' => true],
                'error_message' => ['type' => 'LONGTEXT', 'null' => true],
                'retry_count' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
                'created_on' => ['type' => 'DATETIME', 'null' => true],
                'modified_on' => ['type' => 'DATETIME', 'null' => true],
            ]);

            $this->forge->addKey('id', true);
            $this->forge->addKey('generated_content_id');
            $this->forge->addKey('status');
            $this->forge->addUniqueKey(['generated_content_id', 'channel', 'destination'], 'uniq_distribution_target');
            $this->forge->createTable('bf_marketing_distribution_targets', true);
        }

        if ($this->db->tableExists('bf_marketing_blog_posts') && ! $this->db->fieldExists('generated_content_id', 'bf_marketing_blog_posts')) {
            $this->forge->addColumn('bf_marketing_blog_posts', [
                'generated_content_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true, 'after' => 'id'],
            ]);
        }

        if (! $this->db->tableExists('bf_marketing_in_app_notifications')) {
            $this->forge->addField([
                'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'generated_content_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
                'target_group' => ['type' => 'VARCHAR', 'constraint' => 80, 'default' => 'internal_team'],
                'title' => ['type' => 'VARCHAR', 'constraint' => 255],
                'message' => ['type' => 'LONGTEXT', 'null' => true],
                'status' => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'sent'],
                'created_on' => ['type' => 'DATETIME', 'null' => true],
                'modified_on' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('generated_content_id');
            $this->forge->createTable('bf_marketing_in_app_notifications', true);
        }
    }

    public function down()
    {
        if ($this->db->tableExists('bf_marketing_in_app_notifications')) {
            $this->forge->dropTable('bf_marketing_in_app_notifications', true);
        }

        if ($this->db->tableExists('bf_marketing_blog_posts') && $this->db->fieldExists('generated_content_id', 'bf_marketing_blog_posts')) {
            $this->forge->dropColumn('bf_marketing_blog_posts', 'generated_content_id');
        }

        if ($this->db->tableExists('bf_marketing_distribution_targets')) {
            $this->forge->dropTable('bf_marketing_distribution_targets', true);
        }
    }
}
