<?php

namespace App\Commands\Docs;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class ScanOrphanViews extends SafeBaseCommand
{
    protected $group = 'Docs';
    protected $name = 'docs:scan-orphan-views';
    protected $description = 'Detect views that are not referenced by controllers.';

    public function run(array $params)
    {
        $views = $this->scanViews();
        $referenced = $this->scanReferencedViews();

        $orphans = [];
        foreach ($views as $view) {
            $needleA = str_replace('.php', '', $view['path']);
            $needleB = str_replace('.php', '', basename($view['path']));
            if (! in_array($needleA, $referenced, true) && ! in_array($needleB, $referenced, true)) {
                $orphans[] = $view;
            }
        }

        $out = [
            'generated_at' => date(DATE_ATOM),
            'orphanViews' => $orphans,
        ];

        file_put_contents(ROOTPATH . 'docs/_orphan_views.json', json_encode($out, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        CLI::write('Orphan views report: docs/_orphan_views.json', 'green');
        CLI::write('Orphan views found: ' . count($orphans));
    }

    private function scanViews(): array
    {
        $roots = [APPPATH . 'Views', APPPATH . 'Modules'];
        $views = [];

        foreach ($roots as $root) {
            if (! is_dir($root)) {
                continue;
            }

            $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root));
            foreach ($it as $file) {
                if (! $file->isFile() || strtolower($file->getExtension()) !== 'php') {
                    continue;
                }

                if (strpos(str_replace('\\', '/', $file->getPathname()), '/Views/') === false) {
                    continue;
                }

                $views[] = ['path' => $this->relativePath($file->getPathname())];
            }
        }

        return $views;
    }

    private function scanReferencedViews(): array
    {
        $references = [];
        $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(APPPATH . 'Modules'));
        foreach ($it as $file) {
            if (! $file->isFile() || strtolower($file->getExtension()) !== 'php') {
                continue;
            }
            if (strpos(str_replace('\\', '/', $file->getPathname()), '/Controllers/') === false) {
                continue;
            }

            $content = file_get_contents($file->getPathname()) ?: '';
            preg_match_all('/(?:view|renderTheme|respondWithRendered)\(\s*[\'\"]([^\'\"]+)[\'\"]/m', $content, $matches);
            foreach ($matches[1] ?? [] as $m) {
                $references[] = trim(str_replace('\\', '/', $m), '/');
                $references[] = basename(str_replace('\\', '/', $m));
            }
        }

        return array_values(array_unique($references));
    }

    private function relativePath(string $path): string
    {
        $path = str_replace('\\', '/', $path);
        $root = rtrim(str_replace('\\', '/', ROOTPATH), '/');

        return str_starts_with($path, $root . '/') ? substr($path, strlen($root) + 1) : $path;
    }
}
