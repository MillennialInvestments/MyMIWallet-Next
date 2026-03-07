<?php

declare(strict_types=1);

namespace App\Commands\Repo;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

final class DiffSplit extends SafeBaseCommand
{
    protected $group = 'Repo';
    protected $name = 'repo:diff-split';
    protected $description = 'Split large git diffs into smaller review batches.';
    protected $usage = 'repo:diff-split [--size=25]';

    public function run(array $params)
    {
        $size = (int) ($this->getOptionValue($params, '--size', '25'));

        $diff = shell_exec('git diff --name-only');

        if (!$diff) {
            CLI::write('No diff detected.', 'yellow');
            return;
        }

        $files = array_values(array_filter(explode("\n", trim($diff))));
        $chunks = array_chunk($files, $size);

        $dir = ROOTPATH . 'docs/_repo/diff_batches';

        if (!is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        $i = 1;

        foreach ($chunks as $chunk) {

            $file = $dir . '/batch_' . str_pad((string)$i, 2, '0', STR_PAD_LEFT) . '.md';

            $md = [];
            $md[] = '# Diff Batch ' . $i;
            $md[] = '';
            $md[] = 'Files:';
            $md[] = '';

            foreach ($chunk as $f) {
                $md[] = '- ' . $f;
            }

            file_put_contents($file, implode("\n", $md));

            $i++;
        }

        CLI::write('Diff batches written to docs/_repo/diff_batches/', 'green');
    }

    private function getOptionValue(array $params, string $key, string $default): string
    {
        foreach ($params as $p) {

            if (strpos($p, $key . '=') === 0) {
                return substr($p, strlen($key) + 1);
            }
        }

        return $default;
    }
}