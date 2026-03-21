<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EnsureInvestmentScraperEmailDedupe extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_investment_scraper')) {
            return;
        }

        if (! $this->db->fieldExists('email_identifier', 'bf_investment_scraper')) {
            $this->forge->addColumn('bf_investment_scraper', [
                'email_identifier' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                    'default'    => null,
                    'after'      => 'content',
                ],
            ]);
        }

        if (! $this->indexExists('bf_investment_scraper', 'idx_scraper_email_identifier')) {
            $this->db->query('CREATE INDEX `idx_scraper_email_identifier` ON `bf_investment_scraper` (`email_identifier`)');
        }

        $sourceHashUnique = $this->indexExists('bf_investment_scraper', 'uq_scraper_source_hash');
        if (! $sourceHashUnique && $this->db->fieldExists('source', 'bf_investment_scraper') && $this->db->fieldExists('message_hash', 'bf_investment_scraper')) {
            if (! $this->hasDuplicateSourceHashes()) {
                if ($this->indexExists('bf_investment_scraper', 'idx_scraper_source_hash')) {
                    $this->db->query('DROP INDEX `idx_scraper_source_hash` ON `bf_investment_scraper`');
                }

                $this->db->query('CREATE UNIQUE INDEX `uq_scraper_source_hash` ON `bf_investment_scraper` (`source`, `message_hash`)');
            }
        }
    }

    public function down()
    {
        if (! $this->db->tableExists('bf_investment_scraper')) {
            return;
        }

        if ($this->indexExists('bf_investment_scraper', 'uq_scraper_source_hash')) {
            $this->db->query('DROP INDEX `uq_scraper_source_hash` ON `bf_investment_scraper`');
        }

        if ($this->indexExists('bf_investment_scraper', 'idx_scraper_email_identifier')) {
            $this->db->query('DROP INDEX `idx_scraper_email_identifier` ON `bf_investment_scraper`');
        }
    }

    private function hasDuplicateSourceHashes(): bool
    {
        $sql = <<<'SQL'
SELECT 1
FROM `bf_investment_scraper`
WHERE `source` IS NOT NULL
  AND `message_hash` IS NOT NULL
GROUP BY `source`, `message_hash`
HAVING COUNT(*) > 1
LIMIT 1
SQL;

        return ! empty($this->db->query($sql)->getResultArray());
    }

    private function indexExists(string $table, string $indexName): bool
    {
        $result = $this->db->query("SHOW INDEX FROM `{$table}` WHERE Key_name = ?", [$indexName]);

        return ! empty($result->getResultArray());
    }
}
