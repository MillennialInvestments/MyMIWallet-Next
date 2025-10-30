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
    public array $providers = [];

    public function __construct()
    {
        parent::__construct();

        $this->providers = [
            'Google' => [
                'enabled' => true,
                'keys'    => [
                    'id'     => env('hybridauth.google.client_id'),
                    'secret' => env('hybridauth.google.client_secret'),
                ],
                'scope'   => 'email profile',
            ],
            'GitHub' => [
                'enabled' => true,
                'keys'    => [
                    'id'     => env('hybridauth.github.client_id'),
                    'secret' => env('hybridauth.github.client_secret'),
                ],
                'scope'   => 'user:email',
            ],
            'LinkedIn' => [
                'enabled' => false,
                'keys'    => [
                    'id'     => env('hybridauth.linkedin.client_id'),
                    'secret' => env('hybridauth.linkedin.client_secret'),
                ],
                'scope'   => 'r_liteprofile r_emailaddress',
            ],
        ];
    }
}
