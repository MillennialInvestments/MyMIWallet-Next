<?php

namespace App\Commands\Marketing;

use App\Services\MarketingNewsScrapeService;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class NewsDebug extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:news:debug';
    protected $description = 'Diagnose marketing IMAP connectivity, folder counts, subject samples, and filter matches.';
    protected $usage = 'marketing:news:debug [--username=tradealerts@mymiwallet.com] [--folder=INBOX] [--subject="Press Release"] [--subject-limit=10] [--search=ALL]';

    public function run(array $params)
    {
        $service = service('marketingNewsScrapeService');
        if (! $service instanceof MarketingNewsScrapeService) {
            $service = new MarketingNewsScrapeService();
        }

        $foldersOpt = CLI::getOption('folders');
        $username = CLI::getOption('username');
        $folder = CLI::getOption('folder');
        $mailbox = CLI::getOption('mailbox');
        if ((! is_string($username) || trim($username) === '') && is_string($mailbox) && str_contains($mailbox, '@')) {
            $username = $mailbox;
        }
        $subjectLimit = max(1, (int) (CLI::getOption('subject-limit') ?: 10));
        $search = CLI::getOption('search') ?: null;
        $folders = null;
        if (is_string($foldersOpt) && trim($foldersOpt) !== '') {
            $folders = array_values(array_filter(array_map('trim', explode(',', $foldersOpt))));
        }

        $diag = $service->mailboxDiagnostics([
            'folders' => $folders,
            'username' => $username,
            'folder' => $folder,
            'mailbox' => $mailbox,
            'subject' => CLI::getOption('subject') ?: null,
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
