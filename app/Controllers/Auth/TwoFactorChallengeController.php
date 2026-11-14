<?php

declare(strict_types=1);

namespace App\Controllers\Auth;

use App\Services\TwoFactorService;
use CodeIgniter\Controller;

/**
 * Second step of login for users with two-factor turned on (GTM-020).
 */
class TwoFactorChallengeController extends Controller
{
    protected $helpers = ['form', 'url'];

    public function show()
    {
        $userId = $this->userId();
        if ($userId <= 0) {
            return redirect()->to(site_url('login'));
        }
        $service = new TwoFactorService();
        if (! $service->isEnabled($userId) || $service->isVerifiedInSession($userId)) {
            return redirect()->to($this->destination());
        }

        return view('App\Views\Auth\two_factor_challenge', [
            'config' => config(\App\Legacy\Auth\Config\Auth::class),
            'error'  => session()->getFlashdata('two_factor_error'),
        ]);
    }

    public function verify()
    {
        $userId = $this->userId();
        if ($userId <= 0) {
            return redirect()->to(site_url('login'));
        }

        $attempts = (int) session('2fa_attempts');
        if ($attempts >= 5) {
            if (function_exists('audit')) {
                audit('2fa.challenge.locked', ['user_id' => $userId], 'user');
            }
            session()->destroy();

            return redirect()->to(site_url('login'))->with('error', 'Too many incorrect codes. Please sign in again.');
        }

        $service = new TwoFactorService();
        $code    = (string) $this->request->getPost('code');

        if (! $service->verifyCode($userId, $code)) {
            session()->set('2fa_attempts', $attempts + 1);
            if (function_exists('audit')) {
                audit('2fa.challenge.failed', ['user_id' => $userId], 'user');
            }

            return redirect()->to(site_url('Auth/Two-Factor'))->with('two_factor_error', 'That code did not work. Try again.');
        }

        session()->remove('2fa_attempts');
        $service->markVerified($userId);
        session()->regenerate(true);
        if (function_exists('audit')) {
            audit('2fa.challenge.passed', ['user_id' => $userId], 'user');
        }

        return redirect()->to($this->destination());
    }

    private function userId(): int
    {
        return (int) (session('user_id') ?: session('cuID') ?: 0);
    }

    private function destination(): string
    {
        $url = (string) (session('redirect_url') ?? '');
        session()->remove('redirect_url');
        $local = str_starts_with($url, base_url()) || (str_starts_with($url, '/') && ! str_starts_with($url, '//'));
        if ($url === '' || $url === '*' || $url === '/*' || ! $local) {
            return site_url('Dashboard');
        }

        return $url;
    }
}
