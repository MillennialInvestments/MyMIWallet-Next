<?php

declare(strict_types=1);

namespace App\Commands\GitHub;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SearchRepo extends SafeBaseCommand
{
    protected $group       = 'GitHub';
    protected $name        = 'github:search';
    protected $description = 'Search the local git repository for a given string or pattern.';

    protected $usage = 'github:search "search text" [options]';

    protected $options = [
        '--regex' => 'Treat search text as regex',
        '--ext'   => 'Comma-separated file extensions (e.g. php,env,md)',
        '--path'  => 'Limit search to a subdirectory',
    ];

    public function run(array $params)
    {
        $needle = $params[0] ?? null;

        if (!$needle) {
            CLI::error('You must provide text to search for.');
            return;
        }

        $isRegex = CLI::getOption('regex') ?? false;
        $exts    = CLI::getOption('ext');
        $path    = CLI::getOption('path') ?? '.';

        $extensions = [];
        if ($exts) {
            $extensions = array_map('trim', explode(',', $exts));
        }

        CLI::write("🔍 Searching repository for: {$needle}", 'yellow');

        $rii = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path, \FilesystemIterator::SKIP_DOTS)
        );

        $matches = [];

        foreach ($rii as $file) {
            if (!$file->isFile()) {
                continue;
            }

            // Skip vendor, node_modules, .git
            if (preg_match('#/(vendor|node_modules|\.git)/#', $file->getPathname())) {
                continue;
            }

            if ($extensions) {
                $ext = strtolower($file->getExtension());
                if (!in_array($ext, $extensions, true)) {
                    continue;
                }
            }

            $contents = @file_get_contents($file->getPathname());
            if ($contents === false) {
                continue;
            }

            $found = $isRegex
                ? preg_match("/{$needle}/", $contents)
                : str_contains($contents, $needle);

            if ($found) {
                $matches[] = $file->getPathname();
                CLI::write("✔ Found in: {$file->getPathname()}", 'green');
            }
        }

        CLI::newLine();
        CLI::write('Search complete.', 'cyan');
        CLI::write('Files matched: ' . count($matches), 'yellow');

        if (empty($matches)) {
            CLI::write('No matches found.', 'green');
        }
    }
}
