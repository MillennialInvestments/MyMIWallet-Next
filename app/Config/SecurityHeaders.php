<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Response security headers (GTM-030). CSP starts in report-only mode: browsers
 * report what would be blocked to /csp-report without blocking anything.
 * Switch $cspEnforce to true (or env security.cspEnforce=true) once reports are clean.
 */
class SecurityHeaders extends BaseConfig
{
    public bool $cspEnabled = true;
    public bool $cspEnforce = false;
    public string $reportUri = '/csp-report';

    /** directive => sources. 'nonce' is replaced with the page's nonce when there is one. */
    public array $csp = [
        'default-src'     => ["'self'"],
        'script-src'      => ["'self'", 'nonce', 'https://cdn.jsdelivr.net', 'https://cdnjs.cloudflare.com', 'https://code.jquery.com',
                              'https://unpkg.com', 'https://cdn.datatables.net', 'https://s3.tradingview.com', 'https://www.googletagmanager.com',
                              'https://connect.facebook.net', 'https://www.clarity.ms', 'https://embed.tawk.to', 'https://cdn.plaid.com',
                              'https://www.google.com', 'https://www.gstatic.com'],
        'style-src'       => ["'self'", "'unsafe-inline'", 'https://cdn.jsdelivr.net', 'https://cdnjs.cloudflare.com', 'https://fonts.googleapis.com',
                              'https://stackpath.bootstrapcdn.com', 'https://cdn.datatables.net', 'https://unpkg.com'],
        'font-src'        => ["'self'", 'data:', 'https://fonts.gstatic.com', 'https://cdn.jsdelivr.net', 'https://cdnjs.cloudflare.com'],
        'img-src'         => ["'self'", 'data:', 'blob:', 'https:'],
        'connect-src'     => ["'self'", 'https://*.plaid.com', 'https://www.google-analytics.com', 'https://*.clarity.ms', 'wss://*.tawk.to', 'https://*.tawk.to'],
        'frame-src'       => ["'self'", 'https://cdn.plaid.com', 'https://www.youtube.com', 'https://s.tradingview.com', 'https://www.tradingview.com',
                              'https://www.google.com', 'https://tawk.to'],
        'object-src'      => ["'none'"],
        'base-uri'        => ["'self'"],
        'form-action'     => ["'self'"],
        'frame-ancestors' => ["'self'"],
    ];

    /** Static headers added to every response. */
    public array $headers = [
        'X-Content-Type-Options' => 'nosniff',
        'Referrer-Policy'        => 'strict-origin-when-cross-origin',
        'X-Frame-Options'        => 'SAMEORIGIN',
        'Permissions-Policy'     => 'camera=(), microphone=(), geolocation=(), payment=()',
    ];

    /** Sent only on HTTPS responses. */
    public string $hsts = 'max-age=31536000; includeSubDomains';

    public function __construct()
    {
        parent::__construct();
        $this->cspEnforce = filter_var(env('security.cspEnforce', $this->cspEnforce), FILTER_VALIDATE_BOOL);
    }
}
