<?php

declare(strict_types=1);

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\SecurityHeaders;

/**
 * Adds security headers and a CSP (report-only by default) to every response (GTM-030).
 * Replaces CspOff, which stripped every CSP header.
 */
class SecurityHeadersFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $cfg = config(SecurityHeaders::class);

        // Keep the framework's own CSP out of the way; this filter owns the header.
        $response->removeHeader('Content-Security-Policy');
        $response->removeHeader('Content-Security-Policy-Report-Only');

        foreach ($cfg->headers as $name => $value) {
            if (! $response->hasHeader($name)) {
                $response->setHeader($name, $value);
            }
        }

        if ($request instanceof \CodeIgniter\HTTP\IncomingRequest && $request->isSecure() && $cfg->hsts !== '') {
            $response->setHeader('Strict-Transport-Security', $cfg->hsts);
        }

        if ($cfg->cspEnabled && $this->isHtml($response)) {
            $header = $cfg->cspEnforce ? 'Content-Security-Policy' : 'Content-Security-Policy-Report-Only';
            $response->setHeader($header, self::buildPolicy($cfg, $this->nonce()));
        }

        return null;
    }

    public static function buildPolicy(SecurityHeaders $cfg, ?string $nonce): string
    {
        $parts = [];
        foreach ($cfg->csp as $directive => $sources) {
            $list = [];
            foreach ($sources as $src) {
                if ($src === 'nonce') {
                    if ($nonce !== null && preg_match('/^[A-Za-z0-9+\/=_-]{8,}$/', $nonce)) {
                        $list[] = "'nonce-{$nonce}'";
                    }
                    continue;
                }
                $list[] = $src;
            }
            $parts[] = $directive . ' ' . implode(' ', $list);
        }
        if ($cfg->reportUri !== '') {
            $parts[] = 'report-uri ' . $cfg->reportUri;
        }

        return implode('; ', $parts);
    }

    private function isHtml(ResponseInterface $response): bool
    {
        $type = strtolower($response->getHeaderLine('Content-Type'));

        return $type === '' || str_contains($type, 'text/html');
    }

    private function nonce(): ?string
    {
        try {
            $data = service('renderer')->getData();
            $nonce = $data['cspNonce'] ?? null;

            return is_string($nonce) && $nonce !== '' ? $nonce : null;
        } catch (\Throwable $e) {
            return null;
        }
    }
}
