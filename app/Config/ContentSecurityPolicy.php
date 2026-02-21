<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class ContentSecurityPolicy extends BaseConfig
{
    public bool $reportOnly = false;
    public ?string $reportURI = null;
    public bool $upgradeInsecureRequests = true;

    public $defaultSrc = ['self'];

    public $scriptSrc = [
        'self',
        'https://code.jquery.com',
        'https://cdn.jsdelivr.net',
        'https://cdn.datatables.net',
        'https://cdnjs.cloudflare.com',
        'https://unpkg.com',
        'https://www.googletagmanager.com',
        'https://www.google-analytics.com',
        'https://www.google.com',
        'https://www.gstatic.com',
        'https://s3.tradingview.com',
        'https://www.tradingview.com',
        'https://connect.facebook.net',
        'https://www.clarity.ms',
        'https://scripts.clarity.ms',
    ];

    public $styleSrc = [
        'self',
        'https://cdn.jsdelivr.net',
        'https://cdnjs.cloudflare.com',
        'https://fonts.googleapis.com',
        'https://maxcdn.bootstrapcdn.com',
        'https://stackpath.bootstrapcdn.com',
    ];

    public $imageSrc = [
        'self',
        'data:',
        'https://www.google-analytics.com',
        'https://www.googletagmanager.com',
        'https://www.facebook.com',
    ];

    public $connectSrc = [
        'self',
        'https://www.google-analytics.com',
        'https://www.googletagmanager.com',
        'https://www.facebook.com',
        'https://s3.tradingview.com',
        'https://www.tradingview.com',
    ];

    public $fontSrc = [
        'self',
        'https://fonts.gstatic.com',
        'https://fonts.googleapis.com',
    ];

    public $frameSrc = [
        'self',
        'https://s3.tradingview.com',
        'https://www.tradingview.com',
    ];

    public $objectSrc = 'none';
    public $baseURI = ['self'];
    public $formAction = ['self'];

    public string $styleNonceTag = '{csp-style-nonce}';
    public string $scriptNonceTag = '{csp-script-nonce}';
    public bool $autoNonce = true;

    public function __construct()
    {
        parent::__construct();

        if (getenv('CSP_STRICT_MODE') !== 'true') {
            $this->scriptSrc[] = 'unsafe-inline';
            $this->styleSrc[]  = 'unsafe-inline';
        }
        if (ENVIRONMENT === 'development') {
            $this->scriptSrc[] = 'unsafe-inline';
            $this->styleSrc[]  = 'unsafe-inline';
        }
        if (ENVIRONMENT === 'production') {
            $this->scriptSrc[] = 'unsafe-inline';
            $this->styleSrc[]  = 'unsafe-inline';
        }
    }
}
