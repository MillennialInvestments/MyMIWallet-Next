<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMarketingVideoStudioTables extends Migration
{
    public function up(): void
    {
        $tableAttributes = ['ENGINE' => 'InnoDB', 'DEFAULT CHARSET' => 'utf8mb4', 'COLLATE' => 'utf8mb4_unicode_ci'];

        if (! $this->db->tableExists('bf_marketing_video_content')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'source_type' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
                'source_id' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
                'platform' => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'tiktok'],
                'video_type' => ['type' => 'VARCHAR', 'constraint' => 64],
                'content_category' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
                'topic' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'symbol' => ['type' => 'VARCHAR', 'constraint' => 32, 'null' => true],
                'title' => ['type' => 'VARCHAR', 'constraint' => 255],
                'hook' => ['type' => 'TEXT', 'null' => true],
                'intro_text' => ['type' => 'TEXT', 'null' => true],
                'body_text' => ['type' => 'LONGTEXT', 'null' => true],
                'insight_text' => ['type' => 'TEXT', 'null' => true],
                'cta_text' => ['type' => 'TEXT', 'null' => true],
                'caption' => ['type' => 'LONGTEXT', 'null' => true],
                'hashtags' => ['type' => 'TEXT', 'null' => true],
                'voiceover_script' => ['type' => 'LONGTEXT', 'null' => true],
                'overlay_text_json' => ['type' => 'LONGTEXT', 'null' => true],
                'scene_plan_json' => ['type' => 'LONGTEXT', 'null' => true],
                'asset_plan_json' => ['type' => 'LONGTEXT', 'null' => true],
                'platform_adaptations_json' => ['type' => 'LONGTEXT', 'null' => true],
                'thumbnail_text' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'promo_link' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'audience' => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => true],
                'tone' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
                'duration_target' => ['type' => 'VARCHAR', 'constraint' => 32, 'null' => true],
                'target_publish_window' => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => true],
                'creator_editor' => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => true],
                'status' => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'Draft'],
                'generated_by' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
                'approved_by' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
                'scheduled_for' => ['type' => 'DATETIME', 'null' => true],
                'posted_at' => ['type' => 'DATETIME', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
                'deleted_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey(['platform', 'status']);
            $this->forge->addKey(['source_type', 'source_id']);
            $this->forge->addKey(['symbol', 'topic']);
            $this->forge->createTable('bf_marketing_video_content', true, $tableAttributes);
        }

        if (! $this->db->tableExists('bf_marketing_video_assets')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'video_content_id' => ['type' => 'BIGINT', 'unsigned' => true],
                'asset_type' => ['type' => 'VARCHAR', 'constraint' => 64],
                'asset_path' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'asset_url' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'asset_label' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'sort_order' => ['type' => 'INT', 'unsigned' => true, 'default' => 0],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('video_content_id');
            $this->forge->addForeignKey('video_content_id', 'bf_marketing_video_content', 'id', 'CASCADE', 'CASCADE');
            $this->forge->createTable('bf_marketing_video_assets', true, $tableAttributes);
        }

        if (! $this->db->tableExists('bf_marketing_video_versions')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'video_content_id' => ['type' => 'BIGINT', 'unsigned' => true],
                'version_data_json' => ['type' => 'LONGTEXT'],
                'edited_by' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
                'edit_note' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('video_content_id');
            $this->forge->addForeignKey('video_content_id', 'bf_marketing_video_content', 'id', 'CASCADE', 'CASCADE');
            $this->forge->createTable('bf_marketing_video_versions', true, $tableAttributes);
        }

        if (! $this->db->tableExists('bf_marketing_video_templates')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'template_name' => ['type' => 'VARCHAR', 'constraint' => 255],
                'platform' => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'tiktok'],
                'video_type' => ['type' => 'VARCHAR', 'constraint' => 64],
                'hook_template' => ['type' => 'TEXT', 'null' => true],
                'body_template' => ['type' => 'LONGTEXT', 'null' => true],
                'cta_template' => ['type' => 'TEXT', 'null' => true],
                'caption_template' => ['type' => 'LONGTEXT', 'null' => true],
                'overlay_template_json' => ['type' => 'LONGTEXT', 'null' => true],
                'scene_template_json' => ['type' => 'LONGTEXT', 'null' => true],
                'meta_json' => ['type' => 'LONGTEXT', 'null' => true],
                'is_active' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey(['platform', 'video_type']);
            $this->forge->createTable('bf_marketing_video_templates', true, $tableAttributes);
        }

        if (! $this->db->tableExists('bf_marketing_publish_queue')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'video_content_id' => ['type' => 'BIGINT', 'unsigned' => true],
                'platform' => ['type' => 'VARCHAR', 'constraint' => 32],
                'payload_json' => ['type' => 'LONGTEXT', 'null' => true],
                'scheduled_for' => ['type' => 'DATETIME', 'null' => true],
                'status' => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'queued'],
                'error' => ['type' => 'TEXT', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey(['video_content_id', 'status']);
            $this->forge->addForeignKey('video_content_id', 'bf_marketing_video_content', 'id', 'CASCADE', 'CASCADE');
            $this->forge->createTable('bf_marketing_publish_queue', true, $tableAttributes);
        }
    }

    public function down(): void
    {
        $this->forge->dropTable('bf_marketing_publish_queue', true);
        $this->forge->dropTable('bf_marketing_video_versions', true);
        $this->forge->dropTable('bf_marketing_video_assets', true);
        $this->forge->dropTable('bf_marketing_video_templates', true);
        $this->forge->dropTable('bf_marketing_video_content', true);
    }
}
