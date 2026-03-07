<?php

declare(strict_types=1);

namespace App\Commands\Docs;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class InventoryDocs extends SafeBaseCommand
{
    protected $group = 'Docs';
    protected $name = 'docs:inventory';
    protected $description = 'Scan /docs directory and generate docs/_inventory.md';

    protected $usage = 'php spark docs:inventory';

    public function run(array $params)
    {

        $docsPath = ROOTPATH . 'docs';
        $outputFile = $docsPath . '/_inventory.md';

        CLI::write('Scanning documentation directory...', 'yellow');

        if (!is_dir($docsPath)) {

            CLI::error('Docs directory not found: ' . $docsPath);

            log_message('error', 'Docs inventory failed. Directory missing: {path}', [
                'path' => $docsPath
            ]);

            return;
        }

        $files = $this->scanDocs($docsPath);

        $markdown = $this->generateMarkdown($files);

        file_put_contents($outputFile, $markdown);

        CLI::write('Inventory generated: docs/_inventory.md', 'green');
        CLI::write('Files scanned: ' . count($files), 'cyan');

        log_message('info', 'Docs inventory generated: {count} files', [
            'count' => count($files)
        ]);
    }

    /**
     * Recursively scan docs directory
     */
    private function scanDocs(string $path): array
    {
        $rii = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path)
        );

        $files = [];

        foreach ($rii as $file) {

            if ($file->isDir()) {
                continue;
            }

            if ($file->getExtension() !== 'md') {
                continue;
            }

            $files[] = str_replace(ROOTPATH, '', $file->getPathname());
        }

        sort($files);

        return $files;
    }

    /**
     * Build markdown inventory
     */
    private function generateMarkdown(array $files): string
    {

        $markdown = "# MyMI Wallet Documentation Inventory\n\n";
        $markdown .= "Generated: " . date('Y-m-d H:i:s') . "\n\n";

        foreach ($files as $file) {
            $markdown .= "- {$file}\n";
        }

        $markdown .= "\n---\n";
        $markdown .= "Total Files: " . count($files) . "\n";

        return $markdown;
    }
}