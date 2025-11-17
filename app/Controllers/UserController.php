<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;

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
}
