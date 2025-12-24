<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCommunityAndTemplateTables extends Migration
{
    public function up()
    {
        $this->createPlatforms();
        $this->createCommunities();
        $this->createPostTemplates();
        $this->createGeneratedPosts();
        $this->createDistributionQueue();
    }

    public function down()
    {
        $this->forge->dropTable('bf_social_distribution_queue', true);
        $this->forge->dropTable('bf_social_generated_posts', true);
        $this->forge->dropTable('bf_social_post_templates', true);
        $this->forge->dropTable('bf_social_communities', true);
        $this->forge->dropTable('bf_social_platforms', true);
    }

    protected function createPlatforms(): void
    {
        $this->forge->addField([
            'id'                  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'platform_key'        => ['type' => 'VARCHAR', 'constraint' => 32, 'unique' => true],
            'display_name'        => ['type' => 'VARCHAR', 'constraint' => 100],
            'base_url'            => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'supports_groups'     => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'supports_short_video'=> ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'supports_long_video' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'supports_live'       => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'supports_polls'      => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'supports_threads'    => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'created_at'          => ['type' => 'DATETIME', 'null' => true],
            'updated_at'          => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('bf_social_platforms', true);
    }

    protected function createCommunities(): void
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'platform_id'    => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'community_name' => ['type' => 'VARCHAR', 'constraint' => 150],
            'community_type' => ['type' => 'VARCHAR', 'constraint' => 50],
            'community_url'  => ['type' => 'VARCHAR', 'constraint' => 255],
            'join_url'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'invite_code'    => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'is_primary'     => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'status'         => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'active'],
            'notes'          => ['type' => 'TEXT', 'null' => true],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
            'updated_at'     => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('platform_id', 'bf_social_platforms', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bf_social_communities', true);
    }

    protected function createPostTemplates(): void
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'platform_id'    => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'template_key'   => ['type' => 'VARCHAR', 'constraint' => 64],
            'title'          => ['type' => 'VARCHAR', 'constraint' => 255],
            'max_chars'      => ['type' => 'INT', 'constraint' => 11, 'null' => true],
            'hashtag_limit'  => ['type' => 'INT', 'constraint' => 11, 'null' => true],
            'supports_links' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'supports_mentions' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'supports_tickers' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'rules_json'     => ['type' => 'TEXT', 'null' => true],
            'body_template'  => ['type' => 'TEXT'],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
            'updated_at'     => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['platform_id', 'template_key']);
        $this->forge->addForeignKey('platform_id', 'bf_social_platforms', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bf_social_post_templates', true);
    }

    protected function createGeneratedPosts(): void
    {
        $this->forge->addField([
            'id'              => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'source_type'     => ['type' => 'VARCHAR', 'constraint' => 50],
            'source_id'       => ['type' => 'INT', 'constraint' => 11],
            'platform_id'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'community_id'    => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'template_id'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'post_title'      => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'post_body'       => ['type' => 'MEDIUMTEXT'],
            'hashtags'        => ['type' => 'TEXT', 'null' => true],
            'tickers'         => ['type' => 'TEXT', 'null' => true],
            'cta_link'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'status'          => ['type' => 'VARCHAR', 'constraint' => 25, 'default' => 'draft'],
            'posted_at'       => ['type' => 'DATETIME', 'null' => true],
            'external_post_url' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'error'           => ['type' => 'TEXT', 'null' => true],
            'created_at'      => ['type' => 'DATETIME', 'null' => true],
            'updated_at'      => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['source_type', 'source_id']);
        $this->forge->addForeignKey('platform_id', 'bf_social_platforms', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('community_id', 'bf_social_communities', 'id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('template_id', 'bf_social_post_templates', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bf_social_generated_posts', true);
    }

    protected function createDistributionQueue(): void
    {
        $this->forge->addField([
            'id'                 => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'generated_post_id'  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'channel_key'        => ['type' => 'VARCHAR', 'constraint' => 50],
            'payload_json'       => ['type' => 'TEXT'],
            'status'             => ['type' => 'VARCHAR', 'constraint' => 25, 'default' => 'pending'],
            'attempts'           => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'last_error'         => ['type' => 'TEXT', 'null' => true],
            'created_at'         => ['type' => 'DATETIME', 'null' => true],
            'updated_at'         => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('generated_post_id', 'bf_social_generated_posts', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bf_social_distribution_queue', true);
    }
}
