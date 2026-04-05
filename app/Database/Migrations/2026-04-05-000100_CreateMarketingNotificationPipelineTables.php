<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMarketingNotificationPipelineTables extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'source_name' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'file_path' => ['type' => 'VARCHAR', 'constraint' => 500],
            'raw_text' => ['type' => 'LONGTEXT', 'null' => true],
            'translated_text' => ['type' => 'LONGTEXT', 'null' => true],
            'summary' => ['type' => 'LONGTEXT', 'null' => true],
            'keywords' => ['type' => 'LONGTEXT', 'null' => true],
            'source_url' => ['type' => 'VARCHAR', 'constraint' => 500, 'null' => true],
            'status' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'pending'],
            'processed_at' => ['type' => 'DATETIME', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('user_id');
        $this->forge->createTable('bf_marketing_notifications', true);

        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 255],
            'summary' => ['type' => 'LONGTEXT', 'null' => true],
            'keywords' => ['type' => 'LONGTEXT', 'null' => true],
            'source_url' => ['type' => 'VARCHAR', 'constraint' => 500, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('bf_marketing_stories', true);

        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'story_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'notification_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'update_text' => ['type' => 'LONGTEXT', 'null' => true],
            'update_summary' => ['type' => 'LONGTEXT', 'null' => true],
            'update_keywords' => ['type' => 'LONGTEXT', 'null' => true],
            'update_source_url' => ['type' => 'VARCHAR', 'constraint' => 500, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('story_id');
        $this->forge->addKey('notification_id');
        $this->forge->createTable('bf_marketing_story_updates', true);

        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'notification_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'story_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'content_json' => ['type' => 'LONGTEXT'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('notification_id');
        $this->forge->addKey('story_id');
        $this->forge->createTable('bf_marketing_generated_content', true);
    }

    public function down()
    {
        $this->forge->dropTable('bf_marketing_generated_content', true);
        $this->forge->dropTable('bf_marketing_story_updates', true);
        $this->forge->dropTable('bf_marketing_stories', true);
        $this->forge->dropTable('bf_marketing_notifications', true);
    }
}
