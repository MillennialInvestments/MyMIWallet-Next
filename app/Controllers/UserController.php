<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Exceptions\PageNotFoundException;

class UserController extends BaseController
{
    protected array $data = [];
    protected bool $stringAsHtml = false;
    protected ?int $cuID = null;
    // protected bool $cuIdResolutionLogged = false;

    /**
     * Normalize arbitrary render data inputs into a consistent array shape.
     */
    protected function normalizeRenderData(string $view, mixed $data): array|ResponseInterface
    {
        // Allow controllers to pass through a fully-built Response.
        if ($data instanceof ResponseInterface) {
            return $data;
        }

        if (is_array($data)) {
            $viewData = $data;
        } elseif (is_object($data)) {
            // Support DTO/stdClass containers by exposing their public vars.
            $viewData = get_object_vars($data);
        } elseif ($data === null) {
            $viewData = [];
        } else {
            // Fallback: wrap scalars so views can still consume the payload.
            $viewData = ['payload' => $data];
        }

        $this->data = array_merge($this->data ?? [], $viewData);

        return $this->data;
    }

    /**
     * Central way to resolve the current user ID for all UserModule controllers.
     */
    protected function resolveCurrentUserId(): ?int
    {
        if ($this->cuID !== null) {
            return $this->cuID;
        }

        $resolved = parent::resolveCurrentUserId();
        if ($resolved !== null) {
            $this->cuID = (int) $resolved;
            return $this->cuID;
        }

        if (function_exists('getCuID')) {
            $id = getCuID();
            if (!empty($id)) {
                $this->cuID = (int) $id;
                return $this->cuID;
            }
        }

        static $logged = false;
        if (! $logged) {
            log_message('error', 'UserController::resolveCurrentUserId - No current user ID resolved.');
            $logged = true;
        }

        return null;
    }

    protected function renderTheme(string $view, mixed $data = []): ResponseInterface|string
    {
        $data = $this->normalizeRenderData($view, $data);
        // If caller passed a Response, just return it.
        if ($data instanceof ResponseInterface) {
            return $data;
        }

        $base = $this->commonData();
        // If commonData() produced a Response (401/redirect), pass it through.
        if ($base instanceof ResponseInterface) {
            return $base;
        }

        $data = array_merge($base, $data);

        // PUBLIC THEME
        if (($data['layout'] ?? 'dashboard') === 'public') {
            $layoutBase      = 'themes/public/layouts';
            $data['content'] = $this->tryView($view, $data);

            // Optional partials if they exist
            if ($this->viewExists($layoutBase . '/header'))  { $data['header']  = view($layoutBase . '/header',  $data); }
            if ($this->viewExists($layoutBase . '/_sitenav')){ $data['sitenav'] = view($layoutBase . '/_sitenav',$data); }
            if ($this->viewExists($layoutBase . '/footer'))  { $data['footer']  = view($layoutBase . '/footer',  $data); }

            return $this->tryView($layoutBase . '/index', $data);
        }

        // DASHBOARD THEME
        $layoutBase      = 'themes/dashboard/layouts';
        $data['content'] = $this->tryView($view, $data);

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
        $paths = array_merge($this->expandViewCandidates($candidate), $alternatives);

        foreach ($paths as $p) {
            foreach ($this->expandViewCandidates($p) as $option) {
                if ($this->viewExists($option)) {
                    return $option;
                }
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
        $normalized = str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $path);

        $candidates = [
            APPPATH . 'Views' . DIRECTORY_SEPARATOR . $normalized . '.php',
        ];

        $segments = explode(DIRECTORY_SEPARATOR, $normalized);
        if (count($segments) > 1) {
            $module     = array_shift($segments);
            $moduleDir  = str_ends_with($module, 'Module') ? substr($module, 0, -6) : $module;
            $moduleBase = APPPATH . 'Modules' . DIRECTORY_SEPARATOR . $moduleDir . DIRECTORY_SEPARATOR;
            if (!empty($segments)) {
                if ($segments[0] === 'Views') {
                    $moduleCandidates = $moduleBase . implode(DIRECTORY_SEPARATOR, $segments) . '.php';
                } else {
                    $moduleCandidates = $moduleBase . 'Views' . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $segments) . '.php';
                }
                $candidates[] = $moduleCandidates;
            }
        }

        foreach ($candidates as $file) {
            if (is_file($file)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Provide alternate representations of a view path so legacy
     * "Module/View" references can resolve to namespaced module views.
     */
    protected function expandViewCandidates(string $view): array
    {
        $candidates = [$view];

        if (str_contains($view, '\\')) {
            $candidates[] = str_replace('\\', '/', $view);
        } else {
            $normalized = str_replace('\\', '/', $view);
            $segments   = explode('/', $normalized);

            if (count($segments) > 1) {
                $module    = array_shift($segments);
                $namespace = str_ends_with($module, 'Module') ? $module : $module . 'Module';
                $remainder = implode('\\', $segments);
                $namespaced = $namespace . '\\Views\\' . $remainder;

                if ($namespaced !== $view) {
                    array_unshift($candidates, $namespaced);
                }
            }
        }

        return array_values(array_unique(array_filter($candidates)));
    }
}
