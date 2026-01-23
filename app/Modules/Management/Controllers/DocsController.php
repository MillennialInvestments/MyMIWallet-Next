<?php

namespace App\Modules\Management\Controllers;

use App\Controllers\BaseController;
use Parsedown;

class DocsController extends BaseController
{
    protected string $docsRoot;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->docsRoot = rtrim(ROOTPATH . 'docs', DIRECTORY_SEPARATOR);
    }

    public function index()
    {
        return $this->renderDirectory('');
    }

    public function browse(string $path = '')
    {
        return $this->renderDirectory($path);
    }

    public function view(string $path = '')
    {
        $safe = $this->sanitizePath($path);

        // Allow shorthand without ".md"
        if (!str_ends_with($safe, '.md')) {
            $safe .= '.md';
        }

        $fullPath = $this->docsRoot . DIRECTORY_SEPARATOR . $safe;

        if (!is_file($fullPath)) {
            return $this->failNotFound("Markdown file not found.");
        }

        $markdown = file_get_contents($fullPath);

        $parser = new Parsedown();
        $parser->setSafeMode(true);

        $html = $parser->text($markdown);

        $data = [
            'title'       => 'Docs Viewer',
            'relativePath'=> $safe,
            'contentHtml' => $html,
            'breadcrumbs' => $this->buildBreadcrumbs($safe, true),
        ];

        return view('App\Modules\Management\Views\docs\view', $data);
    }

    // -------------------------
    // Internal Helpers
    // -------------------------

    protected function renderDirectory(string $path)
    {
        $safe = $this->sanitizePath($path);
        $fullDir = $this->docsRoot . ($safe !== '' ? DIRECTORY_SEPARATOR . $safe : '');

        if (!is_dir($fullDir)) {
            return $this->failNotFound("Docs directory not found.");
        }

        [$folders, $files] = $this->scanDirectory($fullDir);

        $data = [
            'title'       => 'Docs Browser',
            'relativeDir' => $safe,
            'folders'     => $folders, // list of ['name','path']
            'files'       => $files,   // list of ['name','path']
            'breadcrumbs' => $this->buildBreadcrumbs($safe, false),
        ];

        return view('App\Modules\Management\Views\docs\index', $data);
    }

    protected function scanDirectory(string $dir): array
    {
        $items = scandir($dir);
        $folders = [];
        $files = [];

        foreach ($items as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }

            $full = $dir . DIRECTORY_SEPARATOR . $item;

            if (is_dir($full)) {
                $folders[] = [
                    'name' => $item,
                    'path' => $this->relativeFromDocsRoot($full),
                ];
                continue;
            }

            // Only show .md files
            if (is_file($full) && preg_match('/\\.md$/i', $item)) {
                $files[] = [
                    'name' => $item,
                    'path' => $this->relativeFromDocsRoot($full),
                ];
            }
        }

        // Sort alphabetically
        usort($folders, fn($a, $b) => strcasecmp($a['name'], $b['name']));
        usort($files, fn($a, $b) => strcasecmp($a['name'], $b['name']));

        return [$folders, $files];
    }

    protected function sanitizePath(string $path): string
    {
        $path = trim($path);
        $path = str_replace(['\\'], '/', $path);

        // remove leading slashes
        $path = ltrim($path, '/');

        // deny traversal
        if (str_contains($path, '..')) {
            return '';
        }

        // keep only safe characters
        $path = preg_replace('/[^a-zA-Z0-9_\\-\\/\\.]/', '', $path) ?? '';

        // prevent accidental empty segments
        $path = preg_replace('#/+#', '/', $path) ?? '';

        return trim($path, '/');
    }

    protected function relativeFromDocsRoot(string $fullPath): string
    {
        $fullPath = rtrim($fullPath, DIRECTORY_SEPARATOR);
        $rel = str_replace($this->docsRoot . DIRECTORY_SEPARATOR, '', $fullPath);

        return str_replace(DIRECTORY_SEPARATOR, '/', $rel);
    }

    protected function buildBreadcrumbs(string $relative, bool $isFile): array
    {
        $relative = trim($relative, '/');
        if ($relative === '') {
            return [
                ['label' => 'Docs', 'url' => site_url('Management/Docs')]
            ];
        }

        $parts = explode('/', $relative);

        // If file, last part is the filename
        $fileName = null;
        if ($isFile) {
            $fileName = array_pop($parts);
        }

        $crumbs = [];
        $crumbs[] = ['label' => 'Docs', 'url' => site_url('Management/Docs')];

        $accum = '';
        foreach ($parts as $p) {
            $accum = $accum === '' ? $p : ($accum . '/' . $p);
            $crumbs[] = ['label' => $p, 'url' => site_url('Management/Docs/browse/' . $accum)];
        }

        if ($isFile && $fileName) {
            $crumbs[] = ['label' => $fileName, 'url' => site_url('Management/Docs/view/' . $relative)];
        }

        return $crumbs;
    }

    protected function failNotFound(string $message)
    {
        // Use your management error UI patterns if you have them.
        return $this->response->setStatusCode(404)->setBody($message);
    }
}

