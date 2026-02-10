<?php

namespace App\Controllers;

class MaintenanceController extends BaseController
{
    public function index(): string
    {
        $appConfig = config('App');

        $sections = [
            'product' => $this->loadDocsSection('docs/product'),
            'marketing' => $this->loadDocsSection('docs/marketing'),
            'mdit' => $this->loadDocsSection('docs/mdit'),
            'discord' => $this->loadDocsSection('docs/discord'),
            'standards' => $this->loadDocsSection('docs/standards/summary.md'),
        ];

        return view('maintenance/index', [
            'maintenanceMessage' => $appConfig->maintenanceMessage ?? 'We’re performing scheduled maintenance.',
            'maintenanceEta' => $appConfig->maintenanceETA ?? '',
            'sections' => $sections,
            'maintenanceMode' => (bool) ($appConfig->maintenanceMode ?? false),
            'isAdmin' => $this->isAdmin(),
        ]);
    }

    /**
     * @return array{title:string,summary:string,headings:list<string>,bullets:list<string>}
     */
    private function loadDocsSection(string $path): array
    {
        $files = [];
        if (is_file(ROOTPATH . $path)) {
            $files[] = ROOTPATH . $path;
        } elseif (is_dir(ROOTPATH . $path)) {
            $matches = glob(ROOTPATH . trim($path, '/') . '/*.md') ?: [];
            sort($matches);
            $files = array_slice($matches, 0, 4);
        }

        $headings = [];
        $bullets = [];
        $summary = '';

        foreach ($files as $file) {
            $content = (string) @file_get_contents($file);
            if ($content === '') {
                continue;
            }

            if ($summary === '') {
                $summary = $this->extractSummary($content);
            }

            foreach (preg_split('/\R/', $content) ?: [] as $line) {
                $trimmed = trim($line);

                if ($trimmed === '') {
                    continue;
                }

                if (preg_match('/^#{1,3}\s+(.+)/', $trimmed, $match) === 1 && count($headings) < 6) {
                    $headings[] = trim($match[1]);
                    continue;
                }

                if (preg_match('/^[-*+]\s+(.+)/', $trimmed, $match) === 1 && count($bullets) < 8) {
                    $bullets[] = trim($match[1]);
                }
            }
        }

        return [
            'title' => ucfirst(basename($path)),
            'summary' => $summary,
            'headings' => array_values(array_unique($headings)),
            'bullets' => array_values(array_unique($bullets)),
        ];
    }

    private function extractSummary(string $content): string
    {
        $paragraphs = preg_split('/\R{2,}/', trim($content)) ?: [];

        foreach ($paragraphs as $paragraph) {
            $text = trim(preg_replace('/\s+/', ' ', strip_tags($paragraph)) ?? '');
            if ($text === '' || str_starts_with($text, '#')) {
                continue;
            }

            return mb_substr($text, 0, 220);
        }

        return '';
    }

    private function isAdmin(): bool
    {
        if (function_exists('has_permission') && has_permission('admin.access')) {
            return true;
        }

        if (function_exists('in_groups') && in_groups(['admin', 'superadmin'])) {
            return true;
        }

        return false;
    }
}
