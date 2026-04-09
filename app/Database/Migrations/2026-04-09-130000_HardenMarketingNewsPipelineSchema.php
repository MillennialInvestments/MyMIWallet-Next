<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HardenMarketingNewsPipelineSchema extends Migration
{
    public function up()
    {
        $this->ensureDistributionLogSchema();
        $this->ensureTempScraperSchema();
        $this->ensureFinalScraperSchema();
        $this->ensureDistributionFkCompatibility();
    }

    public function down()
    {
        // Intentionally non-destructive.
    }

    private function ensureDistributionLogSchema(): void
    {
        if (! $this->db->tableExists('bf_marketing_distribution_log')) {
            $this->forge->addField([
                'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'generated_content_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
                'platform' => ['type' => 'VARCHAR', 'constraint' => 80, 'null' => true],
                'status' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'queued'],
                'response_payload' => ['type' => 'LONGTEXT', 'null' => true],
                'error_message' => ['type' => 'LONGTEXT', 'null' => true],
                'attempted_at' => ['type' => 'DATETIME', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('generated_content_id');
            $this->forge->createTable('bf_marketing_distribution_log', true);

            return;
        }

        $columns = [
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'platform' => ['type' => 'VARCHAR', 'constraint' => 80, 'null' => true],
            'status' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'queued'],
            'response_payload' => ['type' => 'LONGTEXT', 'null' => true],
            'error_message' => ['type' => 'LONGTEXT', 'null' => true],
            'attempted_at' => ['type' => 'DATETIME', 'null' => true],
        ];

        foreach ($columns as $field => $definition) {
            if (! $this->db->fieldExists($field, 'bf_marketing_distribution_log')) {
                $this->forge->addColumn('bf_marketing_distribution_log', [$field => $definition]);
            }
        }
    }

    private function ensureTempScraperSchema(): void
    {
        if (! $this->db->tableExists('bf_marketing_temp_scraper')) {
            return;
        }

        $fields = [
            'source_type' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'source_provider' => ['type' => 'VARCHAR', 'constraint' => 120, 'null' => true],
            'alert_type' => ['type' => 'VARCHAR', 'constraint' => 80, 'null' => true],
            'sender_email' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'source_message_id' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'ticker' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'company_name' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'content_hash' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
            'status' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'processed_at' => ['type' => 'DATETIME', 'null' => true],
            'date_published' => ['type' => 'DATETIME', 'null' => true],
        ];

        foreach ($fields as $field => $definition) {
            if (! $this->db->fieldExists($field, 'bf_marketing_temp_scraper')) {
                $this->forge->addColumn('bf_marketing_temp_scraper', [$field => $definition]);
            }
        }

        $indexNames = array_map('strtolower', array_map(static fn($idx) => (string) ($idx->name ?? ''), $this->db->getIndexData('bf_marketing_temp_scraper')));
        if (! in_array('idx_bf_marketing_temp_scraper_content_hash', $indexNames, true)) {
            $this->db->query('CREATE INDEX idx_bf_marketing_temp_scraper_content_hash ON bf_marketing_temp_scraper (content_hash)');
        }
    }

    private function ensureFinalScraperSchema(): void
    {
        if (! $this->db->tableExists('bf_marketing_scraper')) {
            return;
        }

        $fields = [
            'story_hash' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
            'story_title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'story_type' => ['type' => 'VARCHAR', 'constraint' => 80, 'null' => true],
            'ticker' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'company_name' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'source_ids' => ['type' => 'LONGTEXT', 'null' => true],
            'source_count' => ['type' => 'INT', 'constraint' => 11, 'default' => 1],
            'latest_source_at' => ['type' => 'DATETIME', 'null' => true],
            'timeline_json' => ['type' => 'LONGTEXT', 'null' => true],
            'story_status' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'generated'],
            'generated_payload' => ['type' => 'LONGTEXT', 'null' => true],
        ];

        foreach ($fields as $field => $definition) {
            if (! $this->db->fieldExists($field, 'bf_marketing_scraper')) {
                $this->forge->addColumn('bf_marketing_scraper', [$field => $definition]);
            }
        }
    }

    private function ensureDistributionFkCompatibility(): void
    {
        if (! $this->db->tableExists('bf_marketing_generated_content') || ! $this->db->tableExists('bf_marketing_distribution_log')) {
            return;
        }
        if (! $this->db->fieldExists('id', 'bf_marketing_generated_content') || ! $this->db->fieldExists('generated_content_id', 'bf_marketing_distribution_log')) {
            return;
        }

        $col = $this->db->query("SELECT COLUMN_TYPE, IS_NULLABLE FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_generated_content' AND column_name = 'id'")->getRowArray();
        if (!is_array($col) || empty($col['COLUMN_TYPE'])) {
            return;
        }

        $columnType = strtoupper((string) $col['COLUMN_TYPE']);
        $nullable = strtoupper((string) ($col['IS_NULLABLE'] ?? 'YES')) === 'YES' ? 'NULL' : 'NULL';

        $fks = $this->db->query("SELECT CONSTRAINT_NAME FROM information_schema.KEY_COLUMN_USAGE WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'bf_marketing_distribution_log' AND COLUMN_NAME = 'generated_content_id' AND REFERENCED_TABLE_NAME IS NOT NULL")->getResultArray();
        foreach ($fks as $fk) {
            $name = $fk['CONSTRAINT_NAME'] ?? '';
            if ($name !== '') {
                $this->db->query("ALTER TABLE bf_marketing_distribution_log DROP FOREIGN KEY `{$name}`");
            }
        }

        $this->db->query("ALTER TABLE bf_marketing_distribution_log MODIFY COLUMN generated_content_id {$columnType} {$nullable}");

        $fkExists = $this->db->query("SELECT CONSTRAINT_NAME FROM information_schema.KEY_COLUMN_USAGE WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'bf_marketing_distribution_log' AND COLUMN_NAME = 'generated_content_id' AND REFERENCED_TABLE_NAME = 'bf_marketing_generated_content' LIMIT 1")->getRowArray();

        if (! $fkExists) {
            $this->db->query('ALTER TABLE bf_marketing_distribution_log ADD CONSTRAINT fk_distribution_generated_content FOREIGN KEY (generated_content_id) REFERENCES bf_marketing_generated_content(id) ON DELETE SET NULL ON UPDATE CASCADE');
        }
    }
}
