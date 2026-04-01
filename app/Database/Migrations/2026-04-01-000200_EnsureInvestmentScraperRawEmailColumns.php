<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EnsureInvestmentScraperRawEmailColumns extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_investment_scraper')) {
            return;
        }

        $fields = [];

        if (! $this->db->fieldExists('email_identifier', 'bf_investment_scraper')) {
            $fields['email_identifier'] = ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true];
        }
        if (! $this->db->fieldExists('email_sender', 'bf_investment_scraper')) {
            $fields['email_sender'] = ['type' => 'TEXT', 'null' => true];
        }
        if (! $this->db->fieldExists('source', 'bf_investment_scraper')) {
            $fields['source'] = ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true];
        }
        if (! $this->db->fieldExists('account_type', 'bf_investment_scraper')) {
            $fields['account_type'] = ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true];
        }
        if (! $this->db->fieldExists('email_type', 'bf_investment_scraper')) {
            $fields['email_type'] = ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true];
        }
        if (! $this->db->fieldExists('metadata', 'bf_investment_scraper')) {
            $fields['metadata'] = ['type' => 'LONGTEXT', 'null' => true];
        }
        if (! $this->db->fieldExists('created_on', 'bf_investment_scraper')) {
            $fields['created_on'] = ['type' => 'DATETIME', 'null' => true];
        }
        if (! $this->db->fieldExists('updated_at', 'bf_investment_scraper')) {
            $fields['updated_at'] = ['type' => 'DATETIME', 'null' => true];
        }

        if ($fields !== []) {
            $this->forge->addColumn('bf_investment_scraper', $fields);
        }

        $this->addIndexIfMissing('bf_investment_scraper', 'idx_email_identifier', ['email_identifier']);
        $this->addIndexIfMissing('bf_investment_scraper', 'idx_status', ['status']);
        $this->addIndexIfMissing('bf_investment_scraper', 'idx_email_date', ['email_date']);
    }

    public function down()
    {
        if (! $this->db->tableExists('bf_investment_scraper')) {
            return;
        }

        $this->dropIndexIfExists('bf_investment_scraper', 'idx_email_identifier');
        $this->dropIndexIfExists('bf_investment_scraper', 'idx_status');
        $this->dropIndexIfExists('bf_investment_scraper', 'idx_email_date');
    }

    private function addIndexIfMissing(string $table, string $indexName, array $columns): void
    {
        if ($this->indexExists($table, $indexName)) {
            return;
        }

        $columnList = implode(', ', array_map(static fn (string $column): string => "`{$column}`", $columns));
        $this->db->query("CREATE INDEX `{$indexName}` ON `{$table}` ({$columnList})");
    }

    private function dropIndexIfExists(string $table, string $indexName): void
    {
        if (! $this->indexExists($table, $indexName)) {
            return;
        }

        $this->db->query("DROP INDEX `{$indexName}` ON `{$table}`");
    }

    private function indexExists(string $table, string $indexName): bool
    {
        $result = $this->db->query("SHOW INDEX FROM `{$table}` WHERE Key_name = ?", [$indexName]);

        return ! empty($result->getResultArray());
    }
}
