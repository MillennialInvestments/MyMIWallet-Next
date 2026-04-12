<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;
use Throwable;

class PromotionsGenerate extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:promotions:generate';
    protected $description = 'Generate promotion campaign rows from finalized marketing summaries.';
    protected $usage = 'marketing:promotions:generate [--limit=5] [--execute] [--created-by=1]';
    protected $arguments = [];
    protected $options = [
        '--limit'      => 'Number of summary records to process. Default: 5',
        '--execute'    => 'Actually insert campaign rows. Without this flag, the command runs in dry-run mode.',
        '--created-by' => 'User ID to store as created_by. Default: 1',
    ];

    public function run(array $params)
    {
        $limit = (int) (CLI::getOption('limit') ?? 5);
        $createdBy = (int) (CLI::getOption('created-by') ?? 1);
        $execute = CLI::getOption('execute') !== null;

        if ($limit <= 0) {
            $limit = 5;
        }

        if ($createdBy <= 0) {
            $createdBy = 1;
        }

        CLI::write(
            $execute
                ? 'Running promotions generation in EXECUTE mode...'
                : 'Running promotions generation in DRY-RUN mode...',
            'yellow'
        );

        try {
            $db = Database::connect();

            $this->assertTableExists($db, 'bf_marketing_scraper');
            $this->assertTableExists($db, 'bf_marketing_campaigns');

            $rows = $db->table('bf_marketing_scraper')
                ->select('id, title, summary, keywords, created_on')
                ->where('title IS NOT NULL', null, false)
                ->where('title !=', '')
                ->orderBy('id', 'DESC')
                ->get($limit)
                ->getResultArray();

            if (empty($rows)) {
                CLI::write('No eligible summary rows found.', 'red');
                return EXIT_SUCCESS;
            }

            $inserted = 0;

            foreach ($rows as $row) {
                $campaignName = $this->buildCampaignName($row);
                $description = $this->buildCampaignDescription($row);

                $payload = [
                    'sched_id'                      => null,
                    'status'                        => 'Draft',
                    'beta'                          => 0,
                    'config_mode'                   => 'auto',
                    'form_mode'                     => 'system',
                    'escalated'                     => 0,
                    'type'                          => 'promotion',
                    'audience_type'                 => 'public',
                    'stage'                         => 'generated',
                    'is_draft'                      => 1,
                    'name'                          => $campaignName,
                    'created_on'                    => date('Y-m-d H:i:s'),
                    'created_by'                    => $createdBy,
                    'description'                   => $description,
                    'overall_campaign_description'  => $description,
                    'primary_content'               => $row['summary'] ?? '',
                    'secondary_content'             => $row['keywords'] ?? '',
                    'html_content'                  => null,
                    'voice_script'                  => null,
                    'shared'                        => 0,
                    'blog'                          => 1,
                    'in_app'                        => 1,
                    'email'                         => 1,
                    'discord'                       => 1,
                    'facebook'                      => 1,
                    'linkedin'                      => 1,
                    'telegram'                      => 0,
                    'twitter'                       => 1,
                    'website'                       => 1,
                    'scheduled_at'                  => null,
                    'auto_schedule_at'              => null,
                ];

                CLI::write('--------------------------------');
                CLI::write('Source Summary ID: ' . ($row['id'] ?? 'n/a'));
                CLI::write('Campaign Name: ' . $campaignName);
                CLI::write('Preview: ' . mb_substr($description, 0, 180));

                if ($execute) {
                    $db->table('bf_marketing_campaigns')->insert($payload);
                    $inserted++;
                    CLI::write('Inserted campaign row.', 'green');
                } else {
                    CLI::write('Dry-run only. No insert performed.', 'yellow');
                }
            }

            CLI::newLine();
            CLI::write(
                $execute
                    ? 'Promotions generation complete. Inserted: ' . $inserted
                    : 'Promotions dry-run complete. No inserts performed.',
                'green'
            );

            return EXIT_SUCCESS;
        } catch (Throwable $e) {
            CLI::error('Promotions generation failed: ' . $e->getMessage());
            log_message('error', 'Marketing PromotionsGenerate failed: {message}', [
                'message' => $e->getMessage(),
            ]);

            return EXIT_ERROR;
        }
    }

    protected function buildCampaignName(array $row): string
    {
        $title = trim((string) ($row['title'] ?? 'Untitled Promotion'));
        return 'Promotion - ' . mb_substr($title, 0, 120);
    }

    protected function buildCampaignDescription(array $row): string
    {
        $title = trim((string) ($row['title'] ?? 'Untitled'));
        $summary = trim((string) ($row['summary'] ?? ''));
        $keywords = trim((string) ($row['keywords'] ?? ''));

        $parts = [
            'Promotional campaign generated from marketing summary: ' . $title,
        ];

        if ($summary !== '') {
            $parts[] = 'Summary: ' . mb_substr($summary, 0, 1000);
        }

        if ($keywords !== '') {
            $parts[] = 'Keywords: ' . $keywords;
        }

        return implode(' ', $parts);
    }

    protected function assertTableExists($db, string $table): void
    {
        if (! $db->tableExists($table)) {
            throw new \RuntimeException("Required table missing: {$table}");
        }
    }

    protected function isDestructive(): bool
    {
        return CLI::getOption('execute') !== null;
    }
}