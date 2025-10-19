<?php
namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;
use Config\Services;

class UserController extends BaseController
{
    protected array $data = [];
    protected bool $stringAsHtml = false;

    /**
     * Render a view (optionally wrapped in a layout).
     * Usage: return $this->render('User/Dashboard', $data, ['layout' => 'layouts/main']);
     */
    public function render(string $view, array $vars = [], ?string $theme = null): string
    {
        // Merge per-request base data
        $this->data = array_merge($this->commonData(), $vars);

        // Allow callers to pass desired layout via $vars['layout'] (back-compat for your old $options['layout'])
        if ($theme === null && isset($this->data['layout'])) {
            $theme = $this->data['layout']; // expects 'public' or 'dashboard'
        }

        // Use the BaseController theming renderer
        return parent::render($view, $this->data, $theme);
    }

    /**
     * Optional helper: render if view exists, else 404.
     */
    protected function tryView(string $view, array $data = [], array $options = []): string
    {
        $file = APPPATH . 'Views/' . str_replace(['\\','/'], DIRECTORY_SEPARATOR, $view) . '.php';
        if (! is_file($file)) {
            return '';
        }
        // Render inline with shared + provided data
        return view($view, $this->commonData() + $data);
    }


    /**
     * Layout-aware renderer.
     *
     * Data keys:
     *   - layout: 'public' | 'dashboard' (default 'dashboard')
     *   - layoutBase: override layout folder (optional)
     */
    public function renderTheme(string $page, array $data = [])
    {
        // If upstream set the flag, pass a hint to the view layer.
        if ($this->stringAsHtml === true) {
            $data['__stringAsHtml'] = true;
        }
        $data  = array_merge($this->commonData(), $data);
        $layout= $data['layout'] ?? 'dashboard';

        // If your public views live under app/Views/themes/public:
        $defaultPublicBase = 'themes/public/layouts';
        // If they live under app/Views/public/themes/public:
        $altPublicBase     = 'public/themes/public/layouts';

        if ($layout === 'public') {
            // Determine the correct layout base
            $layoutBase = $data['layoutBase']
                ?? ($this->resolveView($defaultPublicBase . '/index', [$altPublicBase . '/index'])
                        ? ($this->resolveView($defaultPublicBase . '/index') ? $defaultPublicBase : $altPublicBase)
                        : $defaultPublicBase);

            // Resolve the page path with both layouts in mind
            $resolvedPage = $this->resolveView(
                $page,
                [
                    // allow calling with either path style
                    str_starts_with($page, 'themes/public/') ? str_replace('themes/public/', 'public/themes/public/', $page) : 'public/themes/public/' . ltrim($page, '/'),
                    str_starts_with($page, 'public/themes/public/') ? str_replace('public/themes/public/', 'themes/public/', $page) : 'themes/public/' . ltrim($page, '/'),
                ]
            );

            if (!$resolvedPage) {
                log_message('error', "renderTheme: public page view not found for '{$page}'");
                // As a last resort render raw $page (will throw its own exception if missing)
                $resolvedPage = $page;
            }

            // Optional partials (render only if present)
            $data['header']  = $this->tryView($layoutBase . '/header', $data);
            $data['sitenav'] = $this->tryView($layoutBase . '/_sitenav', $data);
            $data['footer']  = $this->tryView($layoutBase . '/footer', $data);

            // Main page content
            $data['content'] = view($resolvedPage, $data);

            // Layout index (if not present, return content directly)
            $indexPath = $layoutBase . '/index';
            return $this->tryView($indexPath, $data) ?: $data['content'];
        }

        // Default: dashboard layout (backwards compatible)
        $layoutBase = 'themes/dashboard/layouts';
        $data['sitenav'] = $this->tryView($layoutBase . '/_sitenav', $data);
        $data['sidebar'] = $this->tryView($layoutBase . '/sidebar', $data);
        $data['footer']  = $this->tryView($layoutBase . '/footer', $data);
        $data['content'] = view($page, $data);
        return $this->tryView($layoutBase . '/index', $data) ?: $data['content'];
    }

    /**
     * Resolve the correct view path for public/home regardless of whether
     * you keep views under `app/Views/themes/public` or `app/Views/public/themes/public`.
     */
    protected function resolveView(string $candidate, array $alternatives = []): ?string
    {
        $paths = array_merge([$candidate], $alternatives);
        foreach ($paths as $p) {
            $file = APPPATH . 'Views/' . str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $p) . '.php';
            if (is_file($file)) {
                return $p;
            }
        }
        return null;
    }
}