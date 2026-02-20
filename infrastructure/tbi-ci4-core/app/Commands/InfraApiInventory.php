<?php

declare(strict_types=1);

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class InfraApiInventory extends BaseCommand
{
    protected $group = 'Infrastructure';
    protected $name = 'infra:api-inventory';
    protected $description = 'Writes API integration inventory artifacts for portable extraction.';

    public function run(array $params): void
    {
        $inventory = [
            'generated_at' => date(DATE_ATOM),
            'providers' => [
                ['name' => 'alphavantage', 'classification' => 'CORE_REUSABLE'],
                ['name' => 'marketaux', 'classification' => 'NEEDS_REFACTOR'],
                ['name' => 'discord', 'classification' => 'CORE_REUSABLE'],
                ['name' => 'zapier', 'classification' => 'CORE_REUSABLE'],
                ['name' => 'imap', 'classification' => 'NEEDS_REFACTOR'],
                ['name' => 'coingecko', 'classification' => 'NEEDS_REFACTOR'],
            ],
        ];

        $base = ROOTPATH . 'infrastructure/tbi-ci4-core/docs/_infrastructure';
        if (! is_dir($base)) {
            mkdir($base, 0775, true);
        }

        file_put_contents($base . '/api-inventory.json', json_encode($inventory, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        file_put_contents($base . '/api-inventory.md', "# API Inventory\n\nGenerated: {$inventory['generated_at']}\n");

        CLI::write('API inventory written to docs/_infrastructure.', 'green');
    }
}
