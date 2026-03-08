<?php

declare(strict_types=1);

namespace App\Commands\Master\Health;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class Commands extends SafeBaseCommand
{
    protected $group = 'master';
    protected $name = 'master:health:commands';
    protected $description = 'Inspect Spark command inventory and metadata.';

    public function run(array $params)
    {
        $commandsPath = APPPATH . 'Commands';
        $report = [
            'generated_at' => date('Y-m-d H:i:s'),
            'commands'     => [],
        ];

        if (is_dir($commandsPath)) {
            $iterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($commandsPath, RecursiveDirectoryIterator::SKIP_DOTS)
            );

            foreach ($iterator as $file) {
                if ($file->isDir() || $file->getExtension() !== 'php') {
                    continue;
                }

                $content = file_get_contents($file->getPathname());

                $report['commands'][] = [
                    'path'        => str_replace(ROOTPATH, '', $file->getPathname()),
                    'group'       => $this->extractProtectedProperty($content, 'group'),
                    'name'        => $this->extractProtectedProperty($content, 'name'),
                    'description' => $this->extractProtectedProperty($content, 'description'),
                ];
            }
        }

        file_put_contents(
            ROOTPATH . 'docs/_health_commands.json',
            json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );

        CLI::write('Command health report written: docs/_health_commands.json', 'green');
    }

    protected function extractProtectedProperty(string $content, string $property): ?string
    {
        $pattern = '/protected\s+\$' . preg_quote($property, '/') . '\s*=\s*[\'"]([^\'"]+)[\'"]\s*;/';
        return preg_match($pattern, $content, $m) ? trim($m[1]) : null;
    }
}