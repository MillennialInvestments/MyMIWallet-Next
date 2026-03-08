<?php

namespace App\Services\Docs;

class DocsRendererService
{
    protected $docsBasePath;

    public function __construct(?string $docsBasePath = null)
    {
        $this->docsBasePath = $docsBasePath ?: ROOTPATH . 'docs/how-it-works';
    }

    public function renderDocBySlug(string $slug): ?array
    {
        $slug = $this->normalizeSlug($slug);

        foreach ($this->listHowItWorksDocs() as $doc) {
            if ($doc['slug'] !== $slug) {
                continue;
            }

            $markdown = file_get_contents($doc['path']) ?: '';
            $parsed = $this->parseFrontMatter($markdown);

            return [
                'title' => $parsed['meta']['title'] ?? $this->slugToTitle($doc['slug']),
                'slug' => $doc['slug'],
                'category' => $parsed['meta']['category'] ?? null,
                'contentHtml' => $this->parseMarkdownToHtml($parsed['content']),
                'file' => $doc['file'],
                'source' => 'docs/how-it-works',
            ];
        }

        return null;
    }

    public function listHowItWorksDocs(): array
    {
        if (! is_dir($this->docsBasePath)) {
            return [];
        }

        $docs = [];
        foreach (glob($this->docsBasePath . '/*.md') ?: [] as $path) {
            $markdown = file_get_contents($path) ?: '';
            $parsed = $this->parseFrontMatter($markdown);
            $fileSlug = $this->normalizeSlug(pathinfo($path, PATHINFO_FILENAME));
            $slug = $this->normalizeSlug((string) ($parsed['meta']['slug'] ?? $fileSlug));

            $docs[] = [
                'slug' => $slug,
                'title' => $parsed['meta']['title'] ?? $this->slugToTitle($slug),
                'category' => $parsed['meta']['category'] ?? null,
                'path' => $path,
                'file' => $this->relativePath($path),
            ];
        }

        usort($docs, static fn (array $a, array $b): int => strcmp($a['title'], $b['title']));

        return $docs;
    }

    public function parseFrontMatter(string $markdown): array
    {
        $meta = [];
        $content = $markdown;

        if (preg_match('/^---\R(.*?)\R---\R?/s', $markdown, $match)) {
            $frontMatter = trim($match[1]);
            $content = (string) substr($markdown, strlen($match[0]));

            foreach (preg_split('/\R/', $frontMatter) ?: [] as $line) {
                if (! str_contains($line, ':')) {
                    continue;
                }

                [$key, $value] = explode(':', $line, 2);
                $key = trim(strtolower($key));
                $value = trim($value, " \t\n\r\0\x0B\"'");

                if ($key !== '') {
                    $meta[$key] = $value;
                }
            }
        }

        return ['meta' => $meta, 'content' => $content];
    }

    public function parseMarkdownToHtml(string $markdown): string
    {
        if (class_exists(\Parsedown::class)) {
            $parsedown = new \Parsedown();
            $parsedown->setSafeMode(true);
            return $parsedown->text($markdown);
        }

        return nl2br(esc($markdown));
    }

    public function normalizeSlug(string $slug): string
    {
        $slug = str_replace('_', '-', trim($slug));
        $slug = preg_replace('/[^a-zA-Z0-9-]+/', '-', $slug);
        $slug = preg_replace('/-+/', '-', $slug);

        return strtolower(trim((string) $slug, '-'));
    }

    protected function slugToTitle(string $slug): string
    {
        return ucwords(str_replace('-', ' ', $slug));
    }

    protected function relativePath(string $path): string
    {
        $normalized = str_replace('\\', '/', $path);
        $root = rtrim(str_replace('\\', '/', ROOTPATH), '/');

        if (strpos($normalized, $root . '/') === 0) {
            return substr($normalized, strlen($root) + 1);
        }

        return $normalized;
    }
}
