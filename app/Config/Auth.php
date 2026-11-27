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
     * GTM-018: Myth/Auth's User::generateResetHash() reads config('Auth')->resetTime,
     * and config('Auth') is this Shield config. Without it, every password reset
     * request for a real account threw "Undefined property". Keep in step with
     * App\Legacy\Auth\Config\Auth::$resetTime.
     */
    public int $resetTime = 3600;

    /**
     * Auth/login and Auth/resend_activation read $config->activeResetter to show
     * the "Forgot password" link. Shield's config has no such property, so a
     * login page rendered with this config (e.g. Shield's own login view) threw "Undefined property:
     * Config\Auth::$activeResetter". Keep in step with
     * App\Legacy\Auth\Config\Auth::$activeResetter.
     */
    public ?string $activeResetter = 'App\Legacy\Auth\Authentication\Resetters\EmailResetter';

    /**
     * AUTH-LOGIN-006: Myth's LoginModel reads config('Auth')->allowRemembering
     * in purgeOldRememberTokens(), which Myth runs on about 1 in 5 logins, and
     * config('Auth')->rememberLength when it refreshes a remember-me token.
     * config('Auth') is this Shield config, so without these that login threw
     * "Undefined property" after the session was already set. Keep in step with
     * App\Legacy\Auth\Config\Auth.
     */
    public bool $allowRemembering = true;

    public int $rememberLength = 30 * DAY;

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
