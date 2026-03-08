<?php

namespace App\Commands\Docs;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class ScanUndocumentedControllers extends SafeBaseCommand
{
    protected $group = 'Docs';
    protected $name = 'docs:scan-undocumented-controllers';
    protected $description = 'Detect controllers with no docs markdown references.';

    public function run(array $params)
    {
        $controllers = $this->scanControllers();
        $docsText = $this->loadDocsText();

        $undocumented = [];
        foreach ($controllers as $controller) {
            $name = strtolower($controller['name']);
            if (! str_contains($docsText, $name)) {
                $undocumented[] = $controller;
            }
        }

        $out = [
            'generated_at' => date(DATE_ATOM),
            'undocumentedControllers' => $undocumented,
        ];

        file_put_contents(ROOTPATH . 'docs/_undocumented_controllers.json', json_encode($out, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        CLI::write('Undocumented controllers report: docs/_undocumented_controllers.json', 'green');
        CLI::write('Undocumented controllers found: ' . count($undocumented));
    }

    private function scanControllers(): array
    {
        $controllers = [];
        $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(APPPATH . 'Modules'));
        foreach ($it as $file) {
            if (! $file->isFile() || strtolower($file->getExtension()) !== 'php') {
                continue;
            }
            if (strpos(str_replace('\\', '/', $file->getPathname()), '/Controllers/') === false) {
                continue;
            }

            $controllers[] = [
                'name' => basename($file->getPathname(), '.php'),
                'path' => $this->relativePath($file->getPathname()),
            ];
        }

        return $controllers;
    }

    private function loadDocsText(): string
    {
        $text = '';
        $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(ROOTPATH . 'docs'));
        foreach ($it as $file) {
            if (! $file->isFile() || strtolower($file->getExtension()) !== 'md') {
                continue;
            }
            $text .= "\n" . strtolower(file_get_contents($file->getPathname()) ?: '');
        }

        return $text;
    }

    private function relativePath(string $path): string
    {
        $path = str_replace('\\', '/', $path);
        $root = rtrim(str_replace('\\', '/', ROOTPATH), '/');

        return str_starts_with($path, $root . '/') ? substr($path, strlen($root) + 1) : $path;
    }
}
