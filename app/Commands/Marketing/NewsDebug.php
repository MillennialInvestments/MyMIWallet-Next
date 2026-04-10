<?php

namespace App\Commands\Marketing;

use App\Services\MarketingNewsScrapeService;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class NewsDebug extends BaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:news:debug';
    protected $description = 'Diagnose marketing IMAP connectivity, folder counts, subject samples, and filter matches.';
    protected $usage = 'marketing:news:debug [--mailbox=news@mymiwallet.com] [--folders=INBOX,Alerts] [--subject-limit=10] [--search=ALL]';

    public function run(array $params)
    {
        $service = service('marketingNewsScrapeService');
        if (! $service instanceof MarketingNewsScrapeService) {
            $service = new MarketingNewsScrapeService();
        }

        $foldersOpt = CLI::getOption('folders');
        $mailbox = CLI::getOption('mailbox');
        $subjectLimit = max(1, (int) (CLI::getOption('subject-limit') ?: 10));
        $search = CLI::getOption('search') ?: null;
        $folders = null;
        if (is_string($foldersOpt) && trim($foldersOpt) !== '') {
            $folders = array_values(array_filter(array_map('trim', explode(',', $foldersOpt))));
        }

        $diag = $service->mailboxDiagnostics([
            'folders' => $folders,
            'mailbox' => $mailbox,
            'subject_limit' => $subjectLimit,
            'search_criteria' => $search,
        ]);

        CLI::write((string) json_encode([
            'status' => 'success',
            'command' => 'marketing:news:debug',
            'diagnostics' => $diag,
        ], JSON_PRETTY_PRINT));
    }
}
