<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class MaintenanceFilter implements FilterInterface
{
    /**
     * Enable/disable maintenance quickly.
     * Recommended: set MAINTENANCE_MODE=true in .env (default false).
     */
    protected bool $enabled;

    public function __construct()
    {
        // env() returns string/bool depending on config; normalize hard.
        $val = env('MAINTENANCE_MODE', false);
        $this->enabled = filter_var($val, FILTER_VALIDATE_BOOLEAN);
    }

    public function before(RequestInterface $request, $arguments = null)
    {
        if (!$this->enabled) {
            return null;
        }

        // Allowlist: CLI always allowed
        if (is_cli()) {
            return null;
        }

        // Allowlist by IP (optional): MAINTENANCE_ALLOW_IPS="1.2.3.4,5.6.7.8"
        $allowIps = trim((string) env('MAINTENANCE_ALLOW_IPS', ''));
        if ($allowIps !== '') {
            $ips = array_filter(array_map('trim', explode(',', $allowIps)));
            $clientIp = (string) $request->getIPAddress();
            if (in_array($clientIp, $ips, true)) {
                return null;
            }
        }

        // Allow specific paths (optional): pass as arguments in Filters config
        // Example: 'maintenance:except[/health,/status]'
        // (We keep it simple: if arguments include paths, allow them.)
        if (is_array($arguments) && !empty($arguments)) {
            $path = '/' . ltrim((string) $request->getPath(), '/');
            foreach ($arguments as $arg) {
                $arg = trim((string) $arg);
                if ($arg === '') continue;

                // support "/health" style args
                if ($arg[0] !== '/') $arg = '/' . $arg;
                if (stripos($path, $arg) === 0) {
                    return null;
                }
            }
        }

        // Serve a maintenance response (no exception thrown)
        return service('response')
            ->setStatusCode(503)
            ->setHeader('Retry-After', '600')
            ->setBody(view('errors/html/error_503', [
                'title'   => 'Maintenance',
                'message' => 'MyMI Wallet is currently undergoing maintenance. Please try again shortly.',
            ]));
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return null;
    }
}
