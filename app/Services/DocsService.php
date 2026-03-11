<?php

namespace App\Services;

class DocsService
{
    protected string $docsPath;

    public function __construct(?string $docsPath = null)
    {
        $this->docsPath = rtrim($docsPath ?: ROOTPATH . 'docs/', '/\\') . DIRECTORY_SEPARATOR;
    }

    public function getDoc(string $slug, string $section = 'how-it-works'): ?array
    {
        $normalizedSlug = $this->normalizeSlug($slug);
        $file = $this->docsPath . trim($section, '/\\') . DIRECTORY_SEPARATOR . $normalizedSlug . '.md';

        if (!is_file($file)) {
            return null;
        }

        $content = file_get_contents($file);
        if ($content === false) {
            return null;
        }

        $parsed = $this->parseFrontMatter($content);
        $meta = $parsed['meta'];

        return [
            'slug' => $meta['slug'] ?? $normalizedSlug,
            'title' => $meta['title'] ?? $this->slugToTitle($normalizedSlug),
            'description' => $meta['description'] ?? null,
            'keywords' => $meta['keywords'] ?? [],
            'category' => $meta['category'] ?? null,
            'nav_group' => $meta['nav_group'] ?? null,
            'cta_primary' => $meta['cta_primary'] ?? null,
            'cta_url' => $meta['cta_url'] ?? null,
            'updated' => $meta['updated'] ?? null,
            'content' => $parsed['content'],
            'contentHtml' => $this->parseMarkdown($parsed['content']),
            'path' => $file,
        ];
    }

    public function getNavigation(string $section = 'how-it-works'): array
    {
        $directory = $this->docsPath . trim($section, '/\\');
        $items = [];

        foreach (glob($directory . DIRECTORY_SEPARATOR . '*.md') ?: [] as $file) {
            $markdown = file_get_contents($file);
            if ($markdown === false) {
                continue;
            }

            $parsed = $this->parseFrontMatter($markdown);
            $fileSlug = $this->normalizeSlug(pathinfo($file, PATHINFO_FILENAME));
            $slug = $this->normalizeSlug((string)($parsed['meta']['slug'] ?? $fileSlug));
            $title = (string)($parsed['meta']['title'] ?? $this->slugToTitle($slug));

            $items[] = [
                'slug' => $slug,
                'url' => site_url('How-It-Works/' . $slug),
                'title' => $title,
                'label' => $title,
            ];
        }

        usort($items, static fn(array $a, array $b): int => strcmp($a['title'], $b['title']));

        return $items;
    }

    protected function parseMarkdown(string $markdown): string
    {
        if (class_exists(\Parsedown::class)) {
            $parsedown = new \Parsedown();
            $parsedown->setSafeMode(true);

            return $parsedown->text($markdown);
        }

        return nl2br(esc($markdown));
    }

    protected function parseFrontMatter(string $markdown): array
    {
        $meta = [];
        $content = $markdown;

        if (preg_match('/^---\R(.*?)\R---\R?/s', $markdown, $matches)) {
            $frontMatter = trim($matches[1]);
            $content = (string)substr($markdown, strlen($matches[0]));
            $lines = preg_split('/\R/', $frontMatter) ?: [];
            $currentListKey = null;

            foreach ($lines as $line) {
                if (preg_match('/^\s*-\s*(.+)$/', $line, $listItem) && $currentListKey !== null) {
                    $meta[$currentListKey] ??= [];
                    $meta[$currentListKey][] = trim($listItem[1], " \t\n\r\0\x0B\"'");
                    continue;
                }

                $currentListKey = null;
                if (!str_contains($line, ':')) {
                    continue;
                }

                [$key, $value] = explode(':', $line, 2);
                $key = trim(strtolower($key));
                $value = trim($value);

                if ($key === '') {
                    continue;
                }

                if ($value === '') {
                    $meta[$key] = [];
                    $currentListKey = $key;
                    continue;
                }

                $meta[$key] = trim($value, " \t\n\r\0\x0B\"'");
            }
        }

        return ['meta' => $meta, 'content' => $content];
    }

    protected function normalizeSlug(string $slug): string
    {
        $slug = str_replace('_', '-', trim(strtolower($slug)));
        $slug = preg_replace('/[^a-z0-9\-]+/', '-', $slug);
        $slug = preg_replace('/-+/', '-', (string)$slug);

        return trim((string)$slug, '-');
    }

    protected function slugToTitle(string $slug): string
    {
        return ucwords(str_replace('-', ' ', $slug));
    }
}
