<?php

namespace App\Commands\Codex;

use CodeIgniter\CLI\CLI;

class ReviewList extends SafeBaseCommand
{
    protected $group       = 'codex';
    protected $name        = 'codex:review:list';
    protected $description = 'List available Codex review artifacts stored under docs.';
    protected $usage       = 'codex:review:list [--limit=5] [--latest]';
    protected $options     = [
        '--limit=5' => 'Limit the number of review files shown',
        '--latest' => 'Show only the latest review file',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        $dir = rtrim(ROOTPATH, '/') . '/docs/codex/reviews';

        if (! is_dir($dir)) {
            CLI::error('No review directory found: ' . $dir);
            return EXIT_ERROR;
        }

        $files = glob($dir . '/review-*.md') ?: [];
        $files = array_values(array_filter($files, static function ($file) {
            return preg_match('/review-\d{4}-\d{2}-\d{2}\.md$/', $file) === 1;
        }));
        rsort($files);

        if (empty($files)) {
            CLI::write('No review artifacts found.', 'yellow');
            return EXIT_SUCCESS;
        }

        $latest = isset($flags['latest']);
        $limit = $this->parseLimit($flags);

        if ($latest) {
            $limit = 1;
        }

        if ($limit !== null) {
            $files = array_slice($files, 0, $limit);
        }

        foreach ($files as $index => $file) {
            CLI::write(sprintf('[%d] %s', $index + 1, basename($file)));
        }

        return EXIT_SUCCESS;
    }

    private function parseLimit(array $flags): ?int
    {
        foreach (array_keys($flags) as $flag) {
            if (! str_starts_with($flag, 'limit=')) {
                continue;
            }

            $value = (int) substr($flag, strlen('limit='));
            if ($value > 0) {
                return $value;
            }
        }

        return null;
    }
}
