<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Shield\Config\Auth as ShieldAuth;

/**
 * Primary auth config for Shield.
 *
 * Legacy Myth/Auth config remains at App\Legacy\Auth\Config\Auth and must be
 * resolved explicitly where still required.
 */
class Auth extends ShieldAuth
{
    /**
     * Backward-compatibility runtime flag consumed by app services.
     */
    public bool $useShield = true;

    /**
     * Enables verbose auth diagnostics for login/register flows.
     */
    public bool $debug = false;

    /**
     * Keep Shield migration routes rendering existing app templates.
     *
     * @var array<string, string>
     */
    public array $shieldViews = [
        'login'    => 'Auth/login',
        'register' => 'Auth/register',
    ];

    /**
     * Route redirects tuned for MyMI Wallet UX.
     *
     * @var array<string, string>
     */
    public array $redirects = [
        'register'          => '/register/success',
        'login'             => '/Dashboard',
        'logout'            => '/',
        'force_reset'       => '/',
        'permission_denied' => '/',
        'group_denied'      => '/',
    ];

    /**
     * Reuse existing auth screens while running Shield.
     *
     * @var array<string, string>
     */
    public array $views = [
        'login'                       => 'Auth/login',
        'register'                    => 'Auth/register',
        'layout'                      => 'Auth/layout',
        'action_email_2fa'            => '\\CodeIgniter\\Shield\\Views\\email_2fa_show',
        'action_email_2fa_verify'     => '\\CodeIgniter\\Shield\\Views\\email_2fa_verify',
        'action_email_2fa_email'      => '\\CodeIgniter\\Shield\\Views\\Email\\email_2fa_email',
        'action_email_activate_show'  => '\\CodeIgniter\\Shield\\Views\\email_activate_show',
        'action_email_activate_email' => '\\CodeIgniter\\Shield\\Views\\Email\\email_activate_email',
        'magic-link-login'            => '\\CodeIgniter\\Shield\\Views\\magic_link_form',
        'magic-link-message'          => '\\CodeIgniter\\Shield\\Views\\magic_link_message',
        'magic-link-email'            => '\\CodeIgniter\\Shield\\Views\\Email\\magic_link_email',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->debug = (bool) env('auth.debug', false);
        $this->useShield = (bool) env('auth.useShield', true);
    }
}
