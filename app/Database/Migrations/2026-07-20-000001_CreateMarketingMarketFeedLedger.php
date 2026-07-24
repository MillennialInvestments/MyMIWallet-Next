<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

final class CreateMarketingMarketFeedLedger extends Migration
{
    public function up(): void
    {
        if (! $this->db->tableExists('bf_marketing_market_sources')) {
            $this->forge->addField([
                'id' => [
                    'type'           => 'BIGINT',
                    'constraint'     => 20,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'source_key' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                ],
                'source_name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 191,
                ],
                'source_url' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 500,
                    'null'       => true,
                ],
                'adapter_class' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                ],
                'enabled' => [
                    'type'       => 'TINYINT',
                    'constraint' => 1,
                    'default'    => 0,
                ],
                'configuration_json' => [
                    'type' => 'TEXT',
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
            $this->forge->addUniqueKey(
                'source_key',
                'uq_market_sources_source_key'
            );
            $this->forge->addKey(
                'enabled',
                false,
                false,
                'idx_market_sources_enabled'
            );

            $this->forge->createTable(
                'bf_marketing_market_sources',
                true
            );
        }

        if (! $this->db->tableExists('bf_marketing_market_feed_items')) {
            $this->forge->addField([
                'id' => [
                    'type'           => 'BIGINT',
                    'constraint'     => 20,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'identity_sha256' => [
                    'type'       => 'CHAR',
                    'constraint' => 64,
                ],
                'source_key' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                ],
                'external_item_id' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                ],
                'title' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 500,
                ],
                'summary' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
                'canonical_url' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 1000,
                    'null'       => true,
                ],
                'published_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
                'collected_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
                'payload_sha256' => [
                    'type'       => 'CHAR',
                    'constraint' => 64,
                    'null'       => true,
                ],
                'normalized_metadata_json' => [
                    'type' => 'TEXT',
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
            $this->forge->addUniqueKey(
                'identity_sha256',
                'uq_market_feed_identity'
            );
            $this->forge->addKey(
                'source_key',
                false,
                false,
                'idx_market_feed_source'
            );
            $this->forge->addKey(
                'published_at',
                false,
                false,
                'idx_market_feed_published'
            );
            $this->forge->addKey(
                'collected_at',
                false,
                false,
                'idx_market_feed_collected'
            );

            $this->forge->createTable(
                'bf_marketing_market_feed_items',
                true
            );
        }
    }

    public function down(): void
    {
        // Forward-only: collected source and feed records are preserved.
    }
}
