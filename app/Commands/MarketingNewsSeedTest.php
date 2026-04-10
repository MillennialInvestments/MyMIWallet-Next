<?php

namespace App\Commands;

use Config\Database;
use CodeIgniter\CLI\CLI;

class MarketingNewsSeedTest extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:news:seed-test';
    protected $description = 'Insert synthetic rows into bf_marketing_temp_scraper for non-IMAP pipeline testing.';

    public function run(array $params)
    {
        $count = max(1, min(3, (int) (CLI::getOption('count') ?: 1)));
        $db = Database::connect();

        $inserted = 0;
        $ids = [];
        for ($i = 1; $i <= $count; $i++) {
            $title = 'Synthetic News Alert ' . $i . ' ' . date('YmdHis');
            $content = 'Synthetic pipeline test content for MyMI Wallet marketing generation and distribution verification.';
            $db->table('bf_marketing_temp_scraper')->insert([
                'status' => 'pending',
                'title' => $title,
                'content' => $content,
                'source_type' => 'seed_test',
                'source_provider' => 'seed',
                'alert_type' => 'news',
                'sender_email' => 'seed@mymiwallet.com',
                'source_message_id' => 'seed:' . uniqid('', true),
                'ticker' => 'VSBLTY',
                'company_name' => 'VSBLTY Groupe Technologies Corp.',
                'content_hash' => hash('sha256', strtolower($title . '|' . $content)),
                'date_scraped' => date('Y-m-d H:i:s'),
                'created_on' => date('Y-m-d H:i:s'),
                'modified_on' => date('Y-m-d H:i:s'),
                'processed' => 0,
            ]);

            $id = (int) $db->insertID();
            if ($id > 0) {
                $inserted++;
                $ids[] = $id;
            }
        }

        CLI::write((string) json_encode([
            'status' => 'success',
            'command' => 'marketing:news:seed-test',
            'requested' => $count,
            'inserted' => $inserted,
            'ids' => $ids,
        ], JSON_PRETTY_PRINT));
    }
}
