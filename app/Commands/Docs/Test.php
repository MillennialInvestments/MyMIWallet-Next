<?php

namespace App\Commands\Docs;

use App\Commands\BaseCommand;
use CodeIgniter\CLI\CLI;

class DocsTest extends SafeBaseCommand
{
    protected $group       = 'Docs';
    protected $name        = 'docs:test';
    protected $description = 'Test DocsService loading and navigation';

    public function run(array $params)
    {
        $docs = service('docs');

        CLI::write('Testing DocsService...', 'yellow');

        $doc = $docs->getDoc('overview');

        if (!$doc) {
            CLI::error('Failed to load overview document.');
            return;
        }

        CLI::write('Overview doc loaded successfully', 'green');

        $nav = $docs->getNavigation('how-it-works');

        CLI::write('Navigation items found: ' . count($nav), 'green');

        foreach ($nav as $item) {
            CLI::write('- ' . $item['slug']);
        }

        CLI::write('DocsService test complete.', 'green');
    }
}