<?php

namespace App\Libraries;

class KimiSuggestions
{
    private string $baseDir;

    public function __construct(?string $baseDir = null)
    {
        $this->baseDir = rtrim($baseDir ?? (ROOTPATH . 'docs/Kimi/suggestions'), '/');
        if (! is_dir($this->baseDir)) {
            @mkdir($this->baseDir, 0755, true);
        }
    }

    public function saveSuggestion(string $title, string $body, ?string $category = null): string
    {
        $slug = $this->slugify($title);
        $timestamp = date('Y-m-d_His');
        $categoryPath = $category ? '/' . $this->slugify($category) : '';
        $dir = $this->baseDir . $categoryPath;

        if (! is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }

        $filename = sprintf('%s_%s.md', $timestamp, $slug);
        $path = $dir . '/' . $filename;

        $contents = "# {$title}\n\n" . $body . "\n";
        file_put_contents($path, $contents);

        return ltrim(str_replace(ROOTPATH, '', $path), '/');
    }

    private function slugify(string $value): string
    {
        $slug = strtolower(trim($value));
        $slug = preg_replace('/[^a-z0-9]+/i', '-', $slug) ?? '';
        return trim($slug, '-') ?: 'suggestion';
    }
}