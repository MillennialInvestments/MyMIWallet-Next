<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Exceptions\PageNotFoundException;

class UserController extends BaseController
{
    protected array $data = [];
    protected bool $stringAsHtml = false;

    protected function renderTheme(string $view, array $data = []): string
    {
        $data  = array_merge($this->commonData(), $data);

        // PUBLIC THEME
        if (($data['layout'] ?? 'dashboard') === 'public') {
            $layoutBase      = 'themes/public/layouts';
            $data['content'] = view($view, $data);

            // Optional partials if they exist
            if ($this->viewExists($layoutBase . '/header'))  { $data['header']  = view($layoutBase . '/header',  $data); }
            if ($this->viewExists($layoutBase . '/_sitenav')){ $data['sitenav'] = view($layoutBase . '/_sitenav',$data); }
            if ($this->viewExists($layoutBase . '/footer'))  { $data['footer']  = view($layoutBase . '/footer',  $data); }

            return $this->tryView($layoutBase . '/index', $data);
        }

        // DASHBOARD THEME
        $layoutBase      = 'themes/dashboard/layouts';
        $data['content'] = view($view, $data);

        // ✅ replace renderer->exists() with viewExists()
        if ($this->viewExists($layoutBase . '/_sitenav')) { $data['sitenav'] = view($layoutBase . '/_sitenav', $data); }
        if ($this->viewExists($layoutBase . '/sidebar'))  { $data['sidebar'] = view($layoutBase . '/sidebar',  $data); }
        if ($this->viewExists($layoutBase . '/footer'))   { $data['footer']  = view($layoutBase . '/footer',  $data); }

        return $this->tryView($layoutBase . '/index', $data);
    }

    protected function tryView(string $view, array $data = [], array $alternatives = [])
    {
        $resolved = $this->resolveView($view, $alternatives);
        if (!$resolved) {
            throw PageNotFoundException::forPageNotFound($view);
        }
        return view($resolved, $data);
    }

    protected function resolveView(string $candidate, array $alternatives = []): ?string
    {
        $paths = array_merge([$candidate], $alternatives);
        foreach ($paths as $p) {
            if ($this->viewExists($p)) {
                return $p;
            }
        }
        return null;
    }

    /**
     * ✅ Works on all CI4 versions
     */
    protected function viewExists(string $path): bool
    {
        // Try the FileLocator (preferred)
        $locator = service('locator');
        if ($locator->locateFile($path, 'Views')) {
            return true;
        }
        // Fallback to manual check
        $file = APPPATH . 'Views/' . str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $path) . '.php';
        return is_file($file);
    }
}
