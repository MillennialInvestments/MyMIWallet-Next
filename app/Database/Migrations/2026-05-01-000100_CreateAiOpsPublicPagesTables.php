<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAiOpsPublicPagesTables extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_public_pages_catalog')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'page_id' => ['type' => 'VARCHAR', 'constraint' => 120],
                'slug' => ['type' => 'VARCHAR', 'constraint' => 180],
                'title' => ['type' => 'VARCHAR', 'constraint' => 255],
                'module' => ['type' => 'VARCHAR', 'constraint' => 50],
                'type' => ['type' => 'VARCHAR', 'constraint' => 50],
                'topic_keywords' => ['type' => 'TEXT', 'null' => true],
                'source_mode' => ['type' => 'VARCHAR', 'constraint' => 20],
                'db_query_key' => ['type' => 'VARCHAR', 'constraint' => 120, 'null' => true],
                'google_query' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'refresh_days' => ['type' => 'INT', 'constraint' => 11, 'default' => 14],
                'status' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'active'],
                'last_run_at' => ['type' => 'DATETIME', 'null' => true],
                'next_run_at' => ['type' => 'DATETIME', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('page_id');
            $this->forge->addUniqueKey('slug');
            $this->forge->createTable('bf_public_pages_catalog');
        }

        if (! $this->db->tableExists('bf_public_pages_runs')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'run_uuid' => ['type' => 'VARCHAR', 'constraint' => 40],
                'started_at' => ['type' => 'DATETIME', 'null' => false],
                'ended_at' => ['type' => 'DATETIME', 'null' => true],
                'mode' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'manual'],
                'summary_json' => ['type' => 'LONGTEXT', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('run_uuid');
            $this->forge->createTable('bf_public_pages_runs');
        }

        if (! $this->db->tableExists('bf_public_pages_sources')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'run_id' => ['type' => 'BIGINT', 'unsigned' => true],
                'page_id' => ['type' => 'BIGINT', 'unsigned' => true],
                'source_type' => ['type' => 'VARCHAR', 'constraint' => 20],
                'source_ref' => ['type' => 'VARCHAR', 'constraint' => 255],
                'title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'content_raw' => ['type' => 'LONGTEXT', 'null' => true],
                'content_clean' => ['type' => 'LONGTEXT', 'null' => true],
                'meta_json' => ['type' => 'LONGTEXT', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey(['run_id', 'page_id']);
            $this->forge->createTable('bf_public_pages_sources');
        }

        if (! $this->db->tableExists('bf_public_pages_drafts')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'page_id' => ['type' => 'BIGINT', 'unsigned' => true],
                'run_id' => ['type' => 'BIGINT', 'unsigned' => true],
                'draft_title' => ['type' => 'VARCHAR', 'constraint' => 255],
                'draft_html' => ['type' => 'LONGTEXT', 'null' => true],
                'draft_summary' => ['type' => 'LONGTEXT', 'null' => true],
                'draft_keywords' => ['type' => 'TEXT', 'null' => true],
                'draft_faq_json' => ['type' => 'LONGTEXT', 'null' => true],
                'draft_pros_cons_json' => ['type' => 'LONGTEXT', 'null' => true],
                'status' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'generated'],
                'editor_notes' => ['type' => 'TEXT', 'null' => true],
                'approved_by' => ['type' => 'VARCHAR', 'constraint' => 120, 'null' => true],
                'approved_at' => ['type' => 'DATETIME', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey(['page_id', 'run_id']);
            $this->forge->createTable('bf_public_pages_drafts');
        }

        if (! $this->db->tableExists('bf_public_pages_published')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'page_id' => ['type' => 'BIGINT', 'unsigned' => true],
                'published_title' => ['type' => 'VARCHAR', 'constraint' => 255],
                'published_html' => ['type' => 'LONGTEXT', 'null' => true],
                'published_meta_json' => ['type' => 'LONGTEXT', 'null' => true],
                'version' => ['type' => 'INT', 'constraint' => 11, 'default' => 1],
                'published_at' => ['type' => 'DATETIME', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('page_id');
            $this->forge->createTable('bf_public_pages_published');
        }

        if (! $this->db->tableExists('bf_public_pages_query_presets')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'query_key' => ['type' => 'VARCHAR', 'constraint' => 120],
                'label' => ['type' => 'VARCHAR', 'constraint' => 255],
                'sql_template' => ['type' => 'LONGTEXT'],
                'enabled' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('query_key');
            $this->forge->createTable('bf_public_pages_query_presets');
        }
    }

    public function down()
    {
        foreach (['bf_public_pages_published', 'bf_public_pages_drafts', 'bf_public_pages_sources', 'bf_public_pages_runs', 'bf_public_pages_catalog', 'bf_public_pages_query_presets'] as $table) {
            if ($this->db->tableExists($table)) {
                $this->forge->dropTable($table);
            }
        }
    }
}
