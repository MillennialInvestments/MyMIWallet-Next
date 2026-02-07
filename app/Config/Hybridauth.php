<?php
declare(strict_types=1);

namespace Config;

use CodeIgniter\Config\BaseConfig;

final class Hybridauth extends BaseConfig
{
    /**
     * Provider configuration keyed by provider name.
     *
     * @var array<string, array<string, mixed>>
     */
    public array $providers = [
        'Google' => [
            'enabled' => true,
            'keys'    => [
                'id'     => '',
                'secret' => '',
            ],
            'scope'   => 'email profile',
        ],
        'GitHub' => [
            'enabled' => true,
            'keys'    => [
                'id'     => '',
                'secret' => '',
            ],
            'scope'   => 'user:email',
        ],
        'LinkedIn' => [
            'enabled' => false,
            'keys'    => [
                'id'     => '',
                'secret' => '',
            ],
            'scope'   => 'r_liteprofile r_emailaddress',
        ],
    ];

    public function __construct()
    {
        parent::__construct();

        $this->providers['Google']['keys']['id'] = (string) env('hybridauth.google.client_id', '');
        $this->providers['Google']['keys']['secret'] = (string) env('hybridauth.google.client_secret', '');
        $this->providers['GitHub']['keys']['id'] = (string) env('hybridauth.github.client_id', '');
        $this->providers['GitHub']['keys']['secret'] = (string) env('hybridauth.github.client_secret', '');
        $this->providers['LinkedIn']['keys']['id'] = (string) env('hybridauth.linkedin.client_id', '');
        $this->providers['LinkedIn']['keys']['secret'] = (string) env('hybridauth.linkedin.client_secret', '');
    }
}
