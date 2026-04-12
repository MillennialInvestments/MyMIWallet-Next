<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use Config\Database;
use CodeIgniter\CLI\CLI;

class NewsSeedTest extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:news:seed-test';
    protected $description = 'Insert synthetic rows into bf_marketing_temp_scraper for non-IMAP pipeline testing.';

    public function run(array $params)
    {
        $count = max(2, min(3, (int) (CLI::getOption('count') ?: 3)));
        $db = Database::connect();

        $inserted = 0;
        $ids = [];
        for ($i = 1; $i <= $count; $i++) {
            $title = 'Press Release Alert Synthetic ' . $i . ' ' . date('YmdHis');
            $content = 'Synthetic pipeline test content for MyMI Wallet marketing generation and distribution verification.';
            $subject = "Press Release: Synthetic Verification {$i}";
            $identifier = 'INBOX:seed:' . uniqid('', true);
            $db->table('bf_marketing_temp_scraper')->insert([
                'status' => 'pending',
                'title' => $title,
                'content' => $content,
                'source_type' => 'seed_test',
                'source_provider' => 'seed',
                'alert_type' => 'press_release',
                'sender_email' => 'tradealerts@mymiwallet.com',
                'source_message_id' => $identifier,
                'email_subject' => $subject,
                'email_sender' => 'tradealerts@mymiwallet.com',
                'email_date' => date('r'),
                'email_identifier' => $identifier,
                'metadata' => json_encode(['source' => 'email', 'category' => 'press_release']),
                'ticker' => 'VSBLTY',
                'company_name' => 'VSBLTY Groupe Technologies Corp.',
                'content_hash' => hash('sha256', strtolower($title . '|' . $content . '|' . $identifier)),
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
