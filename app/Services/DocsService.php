<?php

namespace App\Services;

use Parsedown;

class DocsService
{
    protected string $docsRoot;
    protected Parsedown $parsedown;

    public function __construct()
    {
        $this->docsRoot = ROOTPATH . 'docs/';
        $this->parsedown = new Parsedown();
        $this->parsedown->setSafeMode(true);
    }

    /**
     * Load a documentation page
     */
    public function getDoc(string $slug, string $section = 'how-it-works'): ?array
    {
        $slug = $this->sanitizeSlug($slug);

        $file = $this->docsRoot . "{$section}/{$slug}.md";

        if (!file_exists($file)) {
            return null;
        }

        $content = file_get_contents($file);

        $parsed = $this->parseFrontMatter($content);

        $html = $this->parsedown->text($parsed['content']);

        return [
            'title'       => $parsed['meta']['title'] ?? ucwords(str_replace('-', ' ', $slug)),
            'slug'        => $slug,
            'description' => $parsed['meta']['description'] ?? '',
            'keywords'    => $parsed['meta']['keywords'] ?? [],
            'category'    => $parsed['meta']['category'] ?? $section,
            'cta_primary' => $parsed['meta']['cta_primary'] ?? '',
            'cta_url'     => $parsed['meta']['cta_url'] ?? '',
            'updated'     => $parsed['meta']['updated'] ?? '',
            'html'        => $html
        ];
    }

    /**
     * Generate navigation for a docs section
     */
    public function getNavigation(string $section = 'how-it-works'): array
    {
        $dir = $this->docsRoot . $section;

        if (!is_dir($dir)) {
            return [];
        }

        $files = glob($dir . '/*.md');

        $nav = [];

        foreach ($files as $file) {

            $slug = basename($file, '.md');

            $meta = $this->parseFrontMatter(file_get_contents($file));

            $nav[] = [
                'slug'  => $slug,
                'title' => $meta['meta']['title'] ?? ucwords(str_replace('-', ' ', $slug)),
                'url'   => site_url("How-It-Works/{$slug}")
            ];
        }

        usort($nav, function ($a, $b) {
            return strcmp($a['title'], $b['title']);
        });

        return $nav;
    }

    /**
     * Parse YAML front-matter from markdown
     */
    protected function parseFrontMatter(string $content): array
    {
        $meta = [];
        $body = $content;

        if (preg_match('/^---(.*?)---(.*)$/s', $content, $matches)) {

            $yaml = trim($matches[1]);
            $body = trim($matches[2]);

            $meta = $this->parseYaml($yaml);
        }

        return [
            'meta' => $meta,
            'content' => $body
        ];
    }

    /**
     * Simple YAML parser (safe for small metadata blocks)
     */
    protected function parseYaml(string $yaml): array
    {
        $meta = [];

        $lines = explode("\n", $yaml);

        $currentKey = null;

        foreach ($lines as $line) {

            $line = trim($line);

            if ($line === '') {
                continue;
            }

            if (preg_match('/^([a-zA-Z0-9_]+):(.*)$/', $line, $matches)) {

                $key = trim($matches[1]);
                $value = trim($matches[2]);

                if ($value === '') {
                    $currentKey = $key;
                    $meta[$key] = [];
                } else {
                    $meta[$key] = $this->cleanYamlValue($value);
                    $currentKey = null;
                }

                continue;
            }

            if ($currentKey && str_starts_with($line, '-')) {

                $meta[$currentKey][] = $this->cleanYamlValue(substr($line, 1));
            }
        }

        return $meta;
    }

    /**
     * Clean YAML values
     */
    protected function cleanYamlValue(string $value): string
    {
        return trim($value, "\"' ");
    }

    /**
     * Sanitize slug
     */
    protected function sanitizeSlug(string $slug): string
    {
        return preg_replace('/[^a-z0-9\-]/', '', strtolower($slug));
    }

    /**
     * Get all docs in a section
     */
    public function listDocs(string $section = 'how-it-works'): array
    {
        $dir = $this->docsRoot . $section;

        if (!is_dir($dir)) {
            return [];
        }

        $files = glob($dir . '/*.md');

        $docs = [];

        foreach ($files as $file) {

            $slug = basename($file, '.md');

            $doc = $this->getDoc($slug, $section);

            if ($doc) {
                $docs[] = $doc;
            }
        }

        return $docs;
    }

    /**
     * Check if a document exists
     */
    public function exists(string $slug, string $section = 'how-it-works'): bool
    {
        $slug = $this->sanitizeSlug($slug);

        return file_exists($this->docsRoot . "{$section}/{$slug}.md");
    }
}