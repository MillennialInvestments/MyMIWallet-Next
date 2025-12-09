<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddEmailIdentifierIndexes extends Migration
{
    public function up()
    {
        $db = $this->db;

        // Ensure bf_investment_scraper has an email_identifier with a unique index
        if (! $db->fieldExists('email_identifier', 'bf_investment_scraper')) {
            $this->forge->addColumn('bf_investment_scraper', [
                'email_identifier' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                    'after'      => 'email_body',
                ],
            ]);
        }

        $exists = $db->query("SHOW INDEX FROM bf_investment_scraper WHERE Key_name = 'uniq_email_identifier'")
            ->getNumRows() > 0;
        if (! $exists) {
            $db->query('ALTER TABLE bf_investment_scraper ADD UNIQUE KEY uniq_email_identifier (email_identifier)');
        }

        // Ensure bf_marketing_temp_scraper has an email_identifier with a unique index
        if (! $db->fieldExists('email_identifier', 'bf_marketing_temp_scraper')) {
            $this->forge->addColumn('bf_marketing_temp_scraper', [
                'email_identifier' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                    'after'      => 'email_body',
                ],
            ]);
        }

        $marketingIndexExists = $db->query("SHOW INDEX FROM bf_marketing_temp_scraper WHERE Key_name = 'uniq_email_identifier'")
            ->getNumRows() > 0;
        if (! $marketingIndexExists) {
            $db->query('ALTER TABLE bf_marketing_temp_scraper ADD UNIQUE KEY uniq_email_identifier (email_identifier)');
        }
    }

    public function down()
    {
        $db = $this->db;

        $hasInvestmentIndex = $db->query("SHOW INDEX FROM bf_investment_scraper WHERE Key_name = 'uniq_email_identifier'")
            ->getNumRows() > 0;
        if ($hasInvestmentIndex) {
            $db->query('ALTER TABLE bf_investment_scraper DROP INDEX uniq_email_identifier');
        }
        if ($db->fieldExists('email_identifier', 'bf_investment_scraper')) {
            $this->forge->dropColumn('bf_investment_scraper', 'email_identifier');
        }

        $hasMarketingIndex = $db->query("SHOW INDEX FROM bf_marketing_temp_scraper WHERE Key_name = 'uniq_email_identifier'")
            ->getNumRows() > 0;
        if ($hasMarketingIndex) {
            $db->query('ALTER TABLE bf_marketing_temp_scraper DROP INDEX uniq_email_identifier');
        }
        if ($db->fieldExists('email_identifier', 'bf_marketing_temp_scraper')) {
            $this->forge->dropColumn('bf_marketing_temp_scraper', 'email_identifier');
        }
    }
}
