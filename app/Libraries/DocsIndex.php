<?php

namespace App\Libraries;

class DocsIndex
{
    private string $baseDir;

    public function __construct(?string $baseDir = null)
    {
        $this->baseDir = rtrim($baseDir ?? (ROOTPATH . 'docs'), '/');
    }

    /**
     * Recursively scan for markdown docs and return structured metadata.
     *
     * @return array<int,array<string,string|null>>
     */
    public function scan(): array
    {
        if (! is_dir($this->baseDir)) {
            return [];
        }

        $files = [];
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($this->baseDir, \FilesystemIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            if (strtolower($file->getExtension()) !== 'md') {
                continue;
            }

            $path = $file->getPathname();
            $relPath = ltrim(str_replace($this->baseDir, '', $path), '/');
            $title = $this->extractTitle($path) ?? basename($relPath);
            $snippet = $this->extractSnippet($path);

            $files[] = [
                'path'    => $relPath,
                'title'   => $title,
                'snippet' => $snippet,
            ];
        }

        return $files;
    }

    public function getContents(string $relativePath): string
    {
        $path = realpath($this->baseDir . '/' . ltrim($relativePath, '/'));
        if ($path === false || ! str_starts_with($path, realpath($this->baseDir))) {
            return '';
        }

        if (! is_file($path)) {
            return '';
        }

        return file_get_contents($path) ?: '';
    }

    private function extractTitle(string $path): ?string
    {
        $handle = @fopen($path, 'r');
        if (! $handle) {
            return null;
        }

        while (($line = fgets($handle)) !== false) {
            $line = trim($line);
            if (str_starts_with($line, '#')) {
                fclose($handle);
                return ltrim($line, "# \t");
            }
        }

        fclose($handle);
        return null;
    }

    private function extractSnippet(string $path): string
    {
        $handle = @fopen($path, 'r');
        if (! $handle) {
            return '';
        }

        $lines = [];
        while (($line = fgets($handle)) !== false && count($lines) < 5) {
            $trimmed = trim($line);
            if ($trimmed === '' || str_starts_with($trimmed, '#')) {
                continue;
            }
            $lines[] = $trimmed;
        }

        fclose($handle);

        return implode(' ', $lines);
    }
}
