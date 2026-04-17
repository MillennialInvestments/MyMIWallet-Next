<?php

namespace App\Controllers;

use App\Services\AuthAuditService;
use App\Services\Auth\AuthLogger;
use App\Services\OnboardingProgressService;
use App\Services\RegistrationAttributionService;
use App\Services\RegistrationSourceContentService;
use App\Models\UserIpHistoryModel;
use App\Modules\Support\Services\SupportTicketService;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Session\Session;
use Myth\Auth\Config\Auth as AuthConfig;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;
use Throwable;

class AuthController extends BaseController
{
    protected $auth;
    protected AuthLogger $authLogger;
    protected UserIpHistoryModel $ipHistoryModel;
    protected SupportTicketService $supportTicketService;
    protected string $requestId = '';

    /**
     * @var AuthConfig
     */
    protected $config;

    /**
     * @var Session
     */
    protected $session;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        // Most services in this controller require
        // the session to be started - so fire it up!
        $this->session = service('session');

        $this->config = config('Auth');
        $this->auth   = service('authentication');
        $this->authLogger = new AuthLogger();
        $this->ipHistoryModel = model(UserIpHistoryModel::class);
        $this->supportTicketService = new SupportTicketService();
    }

    //--------------------------------------------------------------------
    // Login/out
    //--------------------------------------------------------------------

    /**
     * Displays the login form, or redirects
     * the user to their destination/home if
     * they are already logged in.
     */
    public function login()
    {
        // No need to show a login form if the user
        // is already logged in.
        if ($this->auth->check()) {
            return $this->redirectAfterLogin();
        }

        $request = $this->request;
        $next    = $this->sanitizeRedirectTarget($request->getGet('next'));

        if (! empty($next)) {
            session()->set('redirect_url', $next);
            log_message('debug', 'Auth login() captured next param: ' . $next);
        }

        $this->rememberRedirectUrl($this->sanitizeRedirectTarget($request->getGet('redirect_url')));

        $previous = $this->sanitizeRedirectTarget(previous_url());

        if (
            ! $this->session->has('redirect_url')
            && $previous
            && ! str_contains($previous, '/login')
            && ! str_contains($previous, '/logout')
        ) {
            $this->rememberRedirectUrl($previous);
        }
        $this->authLog('AUTH_VIEW', 'login_view', 'Rendering login view', [
            'redirect_url' => $this->session->get('redirect_url'),
            'is_authenticated' => $this->auth->check(),
        ], 'info', __LINE__);

        service('eventTracker')->track('auth.login_view');

        return $this->_render($this->config->views['login'], ['config' => $this->config]);
    }

    /**
     * Attempts to verify the user's credentials
     * through a POST request.
     */
    public function attemptLogin()
    {
        helper('auth');
        $requestId = $this->ensureAuthRequestId();
        $post = (array) ($this->request->getPost() ?? []);
        $this->authLog('AUTH_LOGIN', 'entry', 'attemptLogin reached', [
            'post_keys' => array_keys($post),
            'has_password_field' => array_key_exists('password', $post),
        ], 'info', __LINE__);

        if (strtoupper($this->request->getMethod()) !== 'POST') {
            $this->authLog('AUTH_FAIL', 'invalid_method', 'Non-POST login attempt blocked', [
                'expected' => 'POST',
                'actual' => strtoupper($this->request->getMethod()),
                'redirect_target' => site_url('login'),
            ], 'warning', __LINE__);
            return redirect()->to(site_url('login'))
                ->withInput()
                ->with('error', 'Your request could not be processed. Please refresh the page and try again.');
        }
        if (! $this->isCsrfPresent()) {
            $this->authLog('AUTH_FAIL', 'csrf_missing', 'Login request missing CSRF token', [
                'redirect_target' => site_url('login'),
            ], 'warning', __LINE__);
            return redirect()->to(site_url('login'))
                ->withInput()
                ->with('error', 'Your request could not be processed. Please refresh the page and try again.');
        }

        service('eventTracker')->track('auth.login_attempt', [
            'login_type' => $this->config->validFields === ['email'] ? 'email' : 'username',
        ]);

        $rules = [
            'login'    => 'required',
            'password' => 'required',
        ];


        if ($this->config->validFields === ['email']) {
            $rules['login'] .= '|valid_email';
        }

        if (! $this->validate($rules)) {
            $errors = $this->validator->getErrors();
            $this->authLog('AUTH_FAIL', 'validation_failed', 'Login validation failed', [
                'identifier' => (string) ($this->request->getPost('login') ?? ''),
                'validation_passed' => false,
                'errors' => $errors,
                'redirect_target' => site_url('login'),
            ], 'notice', __LINE__);
            $this->forceSupportAlert(
                'danger',
                'Login validation failed',
                $this->formatValidationErrors($errors),
                'AUTH-LOGIN-VAL-001',
                null,
                ['errors' => $errors, 'request_id' => $requestId]
            );
            log_message('notice', '[AUTH] Login validation failed', [
                'errors' => $errors,
                'ip'     => $this->request->getIPAddress(),
            ]);
            return redirect()->to(site_url('login'))
                ->withInput()
                ->with('errors', $errors)
                ->with('error', 'Your request could not be processed. Please refresh the page and try again.');
        }

        $login    = $this->request->getPost('login');
        $password = $this->request->getPost('password');
        $remember = (bool) $this->request->getPost('remember');
        $ip = $this->request->getIPAddress();
        $ua = (string) $this->request->getUserAgent();
        $type = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $identifier = (string) $login;
        $users = model(UserModel::class);
        $userRecord = $users->where($type, $identifier)->first();
        $userFound = $userRecord !== null;
        $isInactive = (int) ($userRecord->active ?? 0) !== 1;
        $isBanned = (int) ($userRecord->banned ?? 0) === 1 || (int) ($userRecord->is_banned ?? 0) === 1;
        $hasActivateHash = ! empty($userRecord?->activate_hash);
        $passwordVerifyFailed = false;

        if ($userFound && isset($userRecord->password_hash)) {
            $passwordVerifyFailed = ! password_verify((string) $password, (string) $userRecord->password_hash);
        }

        $this->authLog('AUTH_LOGIN', 'pre_attempt', 'Prepared credentials and user lookup', [
            'identifier' => $identifier,
            'identifier_type' => $type,
            'validation_passed' => true,
            'user_found' => $userFound,
            'user_id' => $userRecord->id ?? null,
            'is_inactive' => $isInactive,
            'is_banned' => $isBanned,
            'has_activation_hash' => $hasActivateHash,
            'password_verify_failed' => $passwordVerifyFailed,
            'remember' => $remember,
        ], 'info', __LINE__);

        $this->authLogger->logLoginAttempt((string) $login, $ip, $ua);
        $this->ipHistoryModel->record(null, filter_var($login, FILTER_VALIDATE_EMAIL) ? (string) $login : null, $ip, $ua);

        log_message(
            'debug',
            sprintf(
                'Auth attemptLogin() called with login identifier: %s, remember: %s',
                $login ?? 'N/A',
                $remember ? 'true' : 'false'
            )
        );

        // Capture redirect targets if provided
        $this->rememberRedirectUrl($this->sanitizeRedirectTarget($this->request->getPost('redirect_url')));
        $this->rememberRedirectUrl($this->sanitizeRedirectTarget($this->request->getPost('next')));

        log_message(
            'debug',
            'Auth attemptLogin() called. redirect_url in session: ' . (session('redirect_url') ?? 'none')
        );

        $credentials = [
            $type      => $login,
            'password' => $password,
        ];

        log_message(
            'debug',
            sprintf('Auth credentials normalised for attempt using key "%s"', $type)
        );

        try {
            $attempt = $this->auth->attempt($credentials, $remember);
        } catch (Throwable $e) {
            $this->authLog('AUTH_FAIL', 'exception', 'Authentication attempt threw exception', [
                'identifier' => $identifier,
                'exception' => $e->getMessage(),
                'redirect_target' => site_url('login'),
            ], 'error', __LINE__);
            $context = [
                'email_entered' => filter_var($login, FILTER_VALIDATE_EMAIL) ? (string) $login : null,
                'user_id' => null,
                'ip_address' => $ip,
                'user_agent' => $ua,
                'error_message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace_id' => bin2hex(random_bytes(6)),
            ];

            $ticketId = $this->supportTicketService->createAuthLoginErrorTicket($context);
            if (! empty($context['email_entered'])) {
                $this->supportTicketService->notifyUser($ticketId, $context['email_entered'], $context);
            }
            $this->supportTicketService->notifySupport($ticketId, $context);
            $this->supportTicketService->notifyDiscord($ticketId, $context);
            $this->authLogger->logAuthException($e, ['login' => (string) $login, 'ip' => $ip]);

            $this->session->setFlashdata('auth_ticket_id', $ticketId);
            $this->forceSupportAlert(
                'danger',
                'Login system error',
                'We hit a system error while signing you in. Please use the support link below.',
                'AUTH-LOGIN-001',
                $e,
                ['ticket_id' => $ticketId, 'login' => (string) $login, 'request_id' => $requestId]
            );

            return redirect()->to(site_url('login'))
                ->withInput()
                ->with('errors', ['login' => 'A login system error occurred.'])
                ->with('error', 'Your request could not be processed. Please refresh the page and try again.');
        }

        // 🔴 AUTH ATTEMPT
        if (! $attempt) {
            $errorMsg = $this->auth->error() ?? lang('Auth.badAttempt');
            $inactiveMessage = lang('Auth.notActivated');
            $message = 'Login failed. Please verify your email/username and password.';
            $branch = 'unknown_failure';
            if (! $userFound) {
                $branch = 'user_not_found';
            } elseif ($passwordVerifyFailed) {
                $branch = 'password_verify_failed';
                $this->authLog('AUTH_FAIL', 'password_verify_failed', 'Password verify failed', [
                    'identifier' => $identifier,
                    'user_id' => $userRecord->id ?? null,
                ], 'notice', __LINE__);
            } elseif ($isBanned) {
                $branch = 'banned';
                $message = 'Your account is currently restricted. Please contact support.';
            } elseif ($isInactive || $errorMsg === $inactiveMessage || stripos($errorMsg, 'not activated') !== false) {
                $branch = 'inactive_or_unactivated';
                $message = 'Your account is not activated yet. Please activate your account to continue.';
            }
            $this->authLog('AUTH_FAIL', $branch, 'Login attempt denied', [
                'identifier' => $identifier,
                'identifier_type' => $type,
                'user_found' => $userFound,
                'password_verify_failed' => $passwordVerifyFailed,
                'is_banned' => $isBanned,
                'is_inactive' => $isInactive,
                'auth_error' => $errorMsg,
                'redirect_target' => site_url('login'),
            ], 'notice', __LINE__);
            log_message('notice', '[AUTH_FAILURE] login attempt denied', [
                'login' => (string) $login,
                'ip' => $ip,
            ]);

            log_message(
                'debug',
                sprintf(
                    'Auth attempt failed for identifier %s. Error: %s',
                    $login ?? 'N/A',
                    $errorMsg
                )
            );

            if ($branch === 'inactive_or_unactivated') {
                service('eventTracker')->track('auth.login_inactive', [
                    'reason' => 'inactive',
                ]);
                $this->forceSupportAlert(
                    'warning',
                    'Account activation required',
                    'Your account is not activated yet. Please activate it using the email link, or resend the activation email below.',
                    'AUTH-LOGIN-002',
                    null,
                    ['login' => (string) $login, 'request_id' => $requestId]
                );
                $this->session->setFlashdata('auth_show_resend', true);
                log_message('notice', '[AUTH] Login inactive', [
                    'login' => $login,
                    'ip'    => $this->request->getIPAddress(),
                ]);
            } else {
                service('eventTracker')->track('auth.login_fail', [
                    'reason' => 'invalid_credentials',
                ]);
                $this->forceSupportAlert(
                    'danger',
                    'Login failed',
                    'Login failed. Please check your email and password.',
                    'AUTH-LOGIN-003',
                    null,
                    ['login' => (string) $login, 'request_id' => $requestId]
                );
                $this->authLogger->logLoginFailure('invalid_credentials', ['login' => (string) $login, 'ip' => $ip, 'user_agent' => $ua]);
                log_message('notice', '[AUTH] Login failed', [
                    'login' => $login,
                    'error' => $errorMsg,
                    'ip'    => $this->request->getIPAddress(),
                ]);
            }

            return redirect()->to(site_url('login'))
                ->withInput()
                ->with('errors', ['login' => $errorMsg ?: $message])
                ->with('error', $message);
        }

        // ✅ SUCCESS: secure the user identity for the rest of the app
        $loggedIn = function_exists('logged_in') ? logged_in() : $this->auth->check();
        $userId   = null;

        if (function_exists('user_id')) {
            $userId = user_id();
        } else {
            $authUser = $this->auth->user();
            $userId = $authUser?->id ?? null;
        }

        log_message(
            'debug',
            sprintf(
                'Auth attempt succeeded for identifier %s. logged_in(): %s, user_id(): %s',
                $login ?? 'N/A',
                $loggedIn ? 'yes' : 'no',
                $userId ?? 'null'
            )
        );
        log_message(
            'debug',
            'Auth attempt succeeded. logged_in(): ' . ($loggedIn ? 'yes' : 'no')
            . ', user_id(): ' . (function_exists('user_id') ? (user_id() ?? 'null') : 'helper-missing')
        );

        // 🔐 Expose the user ID into the session for cuID resolution
        if ($userId !== null && $userId > 0) {
            $this->session->set('user_id', (int) $userId);

            $user = $this->auth->user();
            if ($user) {
                $this->session->set('user_email', $user->email ?? null);
                $this->session->set('username', $user->username ?? null);
            }

            log_message('debug', 'Auth attemptLogin() - session user_id set to: ' . $userId);
        } else {
            log_message('error', 'Auth attemptLogin() - login succeeded but userId could not be resolved.');
        }

        if ($userId !== null && $userId > 0) {
            $authUser = $this->auth->user();
            $this->ipHistoryModel->record((int) $userId, $authUser?->email ?? null, $ip, $ua);
            $this->clearUserCacheKeys((int) $userId);
            service('eventTracker')->track('auth.login_success', [], (int) $userId);
            $this->authLog('AUTH_SUCCESS', 'login_success', 'Login successful', [
                'identifier' => $identifier,
                'user_id' => (int) $userId,
                'redirect_target' => $this->session->get('redirect_url') ?? $this->dashboardUrl(),
            ], 'info', __LINE__);
            log_message('info', '[AUTH] Login success', [
                'user_id'    => (int) $userId,
                'session_id' => session_id(),
                'ip'         => service('request')->getIPAddress(),
            ]);
        }

        $user = $this->auth->user();
        if ($user && (int) ($user->active ?? 0) === 1 && $userId !== null) {
            /** @var OnboardingProgressService $onboardingProgress */
            $onboardingProgress = service('onboardingProgressService');
            $isFirstLogin = $onboardingProgress->markVerifiedLogin((int) $userId);

            if ($isFirstLogin) {
                service('eventTracker')->track('referral.converted', [
                    'source' => 'first_login',
                ], (int) $userId, 'referral');
            }

            if ($onboardingProgress->shouldTriggerWalkthrough((int) $userId)) {
                $onboardingProgress->markWalkthroughStarted((int) $userId);
                $this->session->set('onboarding_show_modal', true);
                log_message('info', 'Auth attemptLogin() onboarding walkthrough queued for user_id={id}', [
                    'id' => (int) $userId,
                ]);
            }
        }

        // Force password reset branch
        $authUser = $this->auth->user();
        if ($authUser && $authUser->force_pass_reset === true) {
            return redirect()
                ->to(route_to('reset-password') . '?token=' . $authUser->reset_hash)
                ->withCookies();
        }

        $postRegistration = $this->session->get('post_registration_source');
        if (is_array($postRegistration) && ($postRegistration['source_channel'] ?? '') === 'discord') {
            $this->session->setFlashdata('auth_message', [
                'type' => 'success',
                'text' => 'Welcome from Discord! Start with Budgeting, then explore Investments and Alerts from your dashboard.',
            ]);
            $this->session->remove('post_registration_source');
        } else {
            $this->setAuthMessage(
                'success',
                lang('Auth.loginSuccess')
            );
        }

        $this->session->regenerate(true);
        $destination = $this->determineRedirectDestination();
        $this->authLog('AUTH_SUCCESS', 'redirect', 'Login redirect resolved', [
            'identifier' => $identifier,
            'user_id' => $userId,
            'redirect_target' => $destination,
        ], 'info', __LINE__);
        return redirect()->to($destination)->withCookies();

    }



    /**
     * Log the user out.
     */
    public function logout()
    {
        $userId = (int) ($this->session->get('user_id') ?? $this->auth->id() ?? 0);
        if ($userId > 0) {
            $this->clearUserCacheKeys($userId);
        }

        if ($this->auth->check()) {
            $this->auth->logout();
        }

        $this->session->destroy();
        $this->session = service('session');
        $this->setAuthMessage('success', 'You have been logged out.');

        service('eventTracker')->track('auth.logout', [], $userId > 0 ? $userId : null);

        log_message('info', '[AUTH] Logout', [
            'user_id' => $userId,
            'ip'      => service('request')->getIPAddress(),
        ]);

        $response = redirect()->route('login');
        $response->deleteCookie('remember');

        return $response;
    }

    private function clearUserCacheKeys(int $userId): void
    {
        if ($userId <= 0) {
            return;
        }

        $safeCache = service('safeCache');
        if (! $safeCache) {
            return;
        }

        $safeCache->clearUserNamespace($userId);
    }

    //--------------------------------------------------------------------
    // Register
    //--------------------------------------------------------------------

    /**
     * Displays the user registration page.
     */
    public function register()
    {
        if ($this->auth->check()) {
            return redirect()->to($this->dashboardUrl());
        }

        if (! $this->config->allowRegistration) {
            $this->setAuthMessage('danger', lang('Auth.registerDisabled'));
            return redirect()->to(site_url('register'))
                ->withInput()
                ->with('errors', ['register' => lang('Auth.registerDisabled')]);
        }

        $request = $this->request;
        $uri = $request->getUri();

        /** @var RegistrationAttributionService $registrationAttribution */
        $registrationAttribution = service('registrationAttributionService');
        $attribution = $registrationAttribution->resolve($request);

        $referralCode = (string) ($attribution['referral_slug'] ?? '');
        if ($referralCode !== '') {
            $this->session->set('referral_code', $referralCode);
            service('eventTracker')->track('referral.captured', [
                'source' => $request->getGet('ref') ? 'query' : (($attribution['source_slug'] ?? null) ? 'dynamic-route' : 'segment'),
                'channel' => $attribution['source_channel'] ?? 'direct',
            ]);
        } else {
            $referralCode = (string) ($this->session->get('referral_code') ?? '');
        }

        $this->session->set('registration_attribution', $attribution);

        /** @var RegistrationSourceContentService $registrationSourceContentService */
        $registrationSourceContentService = service('registrationSourceContentService');
        $registrationSourceContent = $registrationSourceContentService->resolve($attribution);

        log_message('info', '[REGISTRATION] Form loaded', [
            'referral_code' => $referralCode !== '' ? $referralCode : null,
            'source_channel' => $attribution['source_channel'] ?? 'direct',
            'view_slug' => $attribution['view_slug'] ?? 'Free',
            'campaign_code' => $attribution['campaign_code'] ?? null,
            'ip' => $this->request->getIPAddress(),
        ]);

        service('eventTracker')->track('auth.register_view', [
            'source_channel' => $attribution['source_channel'] ?? 'direct',
            'view_slug' => $attribution['view_slug'] ?? 'Free',
            'campaign_code' => $attribution['campaign_code'] ?? null,
        ]);

        $renderData = [
            'config' => $this->config,
            'referralCode' => $referralCode !== '' ? $referralCode : null,
            'siteSettings' => config('SiteSettings'),
            'socialMedia' => config('SocialMedia'),
            'uri' => $uri,
            'registrationAttribution' => $attribution,
            'registrationSourceContent' => $registrationSourceContent,
        ];
        $this->authLog('AUTH_VIEW', 'register_view', 'Rendering register view', [
            'allow_registration' => $this->config->allowRegistration,
            'source_channel' => $attribution['source_channel'] ?? 'direct',
            'view_slug' => $attribution['view_slug'] ?? 'Free',
        ], 'info', __LINE__);

        log_message('debug', '[AUTH_REGISTER] register() render payload prepared', [
            'view' => $this->config->views['register'] ?? 'Auth/register',
            'layout' => $renderData['layout'] ?? null,
            'headerView' => $renderData['headerView'] ?? null,
            'footerView' => $renderData['footerView'] ?? null,
            'intro_view' => $registrationSourceContent['intro_view'] ?? null,
            'source_layout' => $registrationSourceContent['layout'] ?? null,
        ]);

        return $this->_render($this->config->views['register'], $renderData);
    }

    /**
     * Attempt to register a new user.
     */
    // public function attemptRegister()
    // {
    //     // Check if registration is allowed
    //     if (! $this->config->allowRegistration) {
    //         return redirect()->back()->withInput()->with('error', lang('Auth.registerDisabled'));
    //     }

    //     $users = model(UserModel::class);

    //     // Validate basics first since some password rules rely on these fields
    //     $rules = config('Validation')->registrationRules ?? [
    //         'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
    //         'email'    => 'required|valid_email|is_unique[users.email]',
    //     ];

    //     if (! $this->validate($rules)) {
    //         return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    //     }

    //     // Validate passwords since they can only be validated properly here
    //     $rules = [
    //         'password'     => 'required|strong_password',
    //         'pass_confirm' => 'required|matches[password]',
    //     ];

    //     if (! $this->validate($rules)) {
    //         return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    //     }

    //     // Save the user
    //     $allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);
    //     $user              = new User($this->request->getPost($allowedPostFields));

    //     $this->config->requireActivation === null ? $user->activate() : $user->generateActivateHash();

    //     // Ensure default group gets assigned if set
    //     if (! empty($this->config->defaultUserGroup)) {
    //         $users = $users->withGroup($this->config->defaultUserGroup);
    //     }

    //     if (! $users->save($user)) {
    //         return redirect()->back()->withInput()->with('errors', $users->errors());
    //     }

    //     if ($this->config->requireActivation !== null) {
    //         $activator = service('activator');
    //         $sent      = $activator->send($user);

    //         if (! $sent) {
    //             return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
    //         }

    //         // Success!
    //         return redirect()->route('login')->with('message', lang('Auth.activationSuccess'));
    //     }

    //     // Success!
    //     return redirect()->route('login')->with('message', lang('Auth.registerSuccess'));
    // }
    public function attemptRegister()
    {
        $requestId = $this->ensureAuthRequestId();
        if (strtoupper($this->request->getMethod()) !== 'POST') {
            $this->authLog('AUTH_FAIL', 'register_invalid_method', 'Non-POST register attempt blocked', [
                'expected' => 'POST',
                'actual' => strtoupper($this->request->getMethod()),
                'redirect_target' => site_url('register'),
            ], 'warning', __LINE__);
            return redirect()->to(site_url('register'))
                ->withInput()
                ->with('error', 'Your request could not be processed. Please refresh the page and try again.');
        }
        if (! $this->isCsrfPresent()) {
            $this->authLog('AUTH_FAIL', 'register_csrf_missing', 'Register request missing CSRF token', [
                'redirect_target' => site_url('register'),
            ], 'warning', __LINE__);
            return redirect()->to(site_url('register'))
                ->withInput()
                ->with('error', 'Your request could not be processed. Please refresh the page and try again.');
        }

        $this->authLog('AUTH_REGISTER', 'entry', 'attemptRegister reached', [
            'post_keys' => array_keys($this->request->getPost() ?? []),
        ], 'info', __LINE__);

        $this->ipHistoryModel->record(
            null,
            (string) $this->request->getPost('email'),
            $this->request->getIPAddress(),
            (string) $this->request->getUserAgent()
        );

        /** @var AuthAuditService $auditService */
        $auditService = service('authAuditService');
        $request      = $this->request;
        $email        = strtolower(trim((string) ($request->getPost('email') ?? '')));

        /** @var OnboardingProgressService $onboardingProgress */
        $onboardingProgress = service('onboardingProgressService');

        /** @var RegistrationAttributionService $registrationAttribution */
        $registrationAttribution = service('registrationAttributionService');
        $attribution = $registrationAttribution->resolve($request);

        $referralCode = trim((string) ($request->getPost('referralCode') ?? $request->getPost('referral') ?? ($attribution['referral_slug'] ?? '')));
        if ($referralCode === '') {
            $referralCode = (string) ($this->session->get('referral_code') ?? '');
        }

        if ($referralCode !== '') {
            $this->session->set('referral_code', $referralCode);
            service('eventTracker')->track('referral.captured', [
                'source' => 'post',
                'channel' => $attribution['source_channel'] ?? 'direct',
            ]);
        }

        log_message('info', '[REGISTRATION] Submission received', [
            'request_id' => $requestId,
            'email' => $email,
            'referral_code' => $referralCode ?: null,
            'source_channel' => $attribution['source_channel'] ?? 'direct',
            'view_slug' => $attribution['view_slug'] ?? 'Free',
            'campaign_code' => $attribution['campaign_code'] ?? null,
            'ip' => $request->getIPAddress(),
        ]);

        service('eventTracker')->track('auth.register_submit', [
            'source_channel' => $attribution['source_channel'] ?? 'direct',
            'view_slug' => $attribution['view_slug'] ?? 'Free',
            'campaign_code' => $attribution['campaign_code'] ?? null,
        ]);

        $auditContext = $auditService->notifyRegistrationAttempt($email, $request) + [
            'registration_attribution' => $attribution,
        ];

        // Check if registration is allowed
        if (! $this->config->allowRegistration) {
            $this->authLog('AUTH_FAIL', 'register_disabled', 'Registration blocked because registration is disabled', [
                'email' => $email,
                'redirect_target' => site_url('register'),
            ], 'warning', __LINE__);
            $auditService->notifyRegistrationResult($email, 'failed', $request, null, $auditContext + [
                'error' => lang('Auth.registerDisabled'),
            ]);
            service('eventTracker')->track('auth.register_fail', [
                'reason' => 'disabled',
            ]);

            log_message('error', '[REGISTRATION] Registration disabled', [
                'email' => $email,
                'ip'    => $request->getIPAddress(),
            ]);

            $this->forceSupportAlert('danger', 'Registration unavailable', lang('Auth.registerDisabled'), 'AUTH-REG-001', null, ['request_id' => $requestId]);
            return redirect()->to(site_url('register'))->withInput()->with('errors', ['register' => lang('Auth.registerDisabled')])->with('error', 'Your request could not be processed. Please refresh the page and try again.');
        }

        $users = model(UserModel::class);

        try {
            // Validate basics first since some password rules rely on these fields
            $rules = config('Validation')->registrationRules ?? [
                'username' => 'required|regex_match[/^[A-Za-z0-9 _-]+$/]|min_length[3]|max_length[30]|is_unique[users.username]',
                'email'    => 'required|valid_email|is_unique[users.email]',
            ];

            if (! $this->validate($rules)) {
                $this->authLog('AUTH_FAIL', 'register_validation_basic', 'Registration validation failed for basic fields', [
                    'email' => $email,
                    'errors' => $this->validator->getErrors(),
                    'redirect_target' => site_url('register'),
                ], 'notice', __LINE__);
                $auditService->notifyRegistrationResult($email, 'failed', $request, null, $auditContext + [
                    'error' => json_encode($this->validator->getErrors()),
                ]);
                service('eventTracker')->track('auth.register_fail', [
                    'reason' => 'validation_basic',
                    'summary' => $this->validationSummary($this->validator->getErrors()),
                ]);

                $basicErrors = $this->validator->getErrors();
                $isDuplicateEmail = array_key_exists('email', $basicErrors) && str_contains(strtolower((string) $basicErrors['email']), 'taken');
                log_message('warning', '[REGISTRATION] Validation failed (basic fields)', [
                    'request_id' => $requestId,
                    'email'  => $email,
                    'errors' => $basicErrors,
                    'duplicate_email' => $isDuplicateEmail,
                ]);

                $errors = $this->validator->getErrors();
                $this->forceSupportAlert('danger', 'Registration could not be completed', 'Please correct the highlighted fields and try again.', 'AUTH-REG-VALIDATION-001', null, ['errors' => $errors, 'request_id' => $requestId]);
                return redirect()->to(site_url('register'))->withInput()->with('errors', $errors)->with('error', 'Your request could not be processed. Please refresh the page and try again.');
            }

            log_message('info', '[REGISTRATION] Validation passed (basic fields)', [
                'email' => $email,
            ]);

            // Validate passwords since they can only be validated properly here
            $rules = [
                'password'     => 'required|strong_password',
                'pass_confirm' => 'required|matches[password]',
            ];

            if (! $this->validate($rules)) {
                $this->authLog('AUTH_FAIL', 'register_validation_password', 'Registration password validation failed', [
                    'email' => $email,
                    'errors' => $this->validator->getErrors(),
                    'redirect_target' => site_url('register'),
                ], 'notice', __LINE__);
                $auditService->notifyRegistrationResult($email, 'failed', $request, null, $auditContext + [
                    'error' => json_encode($this->validator->getErrors()),
                ]);
                service('eventTracker')->track('auth.register_fail', [
                    'reason' => 'validation_password',
                    'summary' => $this->validationSummary($this->validator->getErrors()),
                ]);

                log_message('warning', '[REGISTRATION] Validation failed (password fields)', [
                    'email'  => $email,
                    'errors' => $this->validator->getErrors(),
                ]);

                $errors = $this->validator->getErrors();
                $this->forceSupportAlert('danger', 'Registration could not be completed', 'Please correct the highlighted fields and try again.', 'AUTH-REG-VALIDATION-001', null, ['errors' => $errors, 'request_id' => $requestId]);
                return redirect()->to(site_url('register'))->withInput()->with('errors', $errors)->with('error', 'Your request could not be processed. Please refresh the page and try again.');
            }

            log_message('info', '[REGISTRATION] Validation passed (password fields)', [
                'email' => $email,
            ]);

            // Save the user
            $allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);
            $postData          = $this->request->getPost($allowedPostFields);
            $postData['email'] = $email;
            if ($referralCode !== '') {
                $postData['referral_code'] = $referralCode;
            }
            $user              = new User($postData);

            $this->config->requireActivation === null ? $user->activate() : $user->generateActivateHash();

            // Ensure default group gets assigned if set
            if (! empty($this->config->defaultUserGroup)) {
                $users = $users->withGroup($this->config->defaultUserGroup);
            }

            if (! $users->save($user)) {
                $this->authLog('AUTH_FAIL', 'register_save_failed', 'User save failed during registration', [
                    'email' => $email,
                    'errors' => $users->errors(),
                    'redirect_target' => site_url('register'),
                ], 'error', __LINE__);
                $auditService->notifyRegistrationResult($email, 'failed', $request, null, $auditContext + [
                    'error' => json_encode($users->errors()),
                ]);
                service('eventTracker')->track('auth.register_fail', [
                    'reason' => 'save_failed',
                    'summary' => $this->validationSummary($users->errors()),
                ]);

                log_message('error', '[REGISTRATION] User record creation failed', [
                    'email'  => $email,
                    'errors' => $users->errors(),
                ]);

                $errors = $users->errors();
                $this->forceSupportAlert('danger', 'Registration failed', 'We could not create your account at this time.', 'AUTH-REG-SAVE-001', null, ['errors' => $errors, 'request_id' => $requestId]);
                return redirect()->to(site_url('register'))->withInput()->with('errors', $errors)->with('error', 'Your request could not be processed. Please refresh the page and try again.');
            }

            $newUserId       = (int) ($users->getInsertID() ?? 0);
            service('eventTracker')->track('auth.register_success', [], $newUserId);
            $loginIdentifier = $this->config->validFields === ['email'] ? 'email' : 'username';
            log_message(
                'info',
                'Registration created user_id={id}, email={email}, username={username}, active={active}, requiresActivation={requiresActivation}, loginIdentifier={loginIdentifier}',
                [
                    'id'                 => $newUserId,
                    'email'              => $user->email ?? null,
                    'username'           => $user->username ?? null,
                    'active'             => $user->active ?? null,
                    'requiresActivation' => $this->config->requireActivation !== null,
                    'loginIdentifier'    => $loginIdentifier,
                ]
            );

            log_message('info', '[REGISTRATION] User record created', [
                'user_id' => $newUserId,
                'email'   => $user->email ?? null,
            ]);

            if ($newUserId > 0) {
                $onboardingProgress->ensureRecord($newUserId);
                $this->persistRegistrationAttribution($newUserId, $referralCode, $attribution);
            }

            if ($referralCode !== '') {
                log_message('info', '[REFERRAL] Registration attributed', [
                    'new_user_id' => $newUserId,
                    'referral_code' => $referralCode,
                    'source_channel' => $attribution['source_channel'] ?? 'direct',
                    'campaign_code' => $attribution['campaign_code'] ?? null,
                ]);
                log_message('info', '[REGISTRATION] Referral applied', [
                    'user_id'       => $newUserId,
                    'email'         => $user->email ?? null,
                    'referral_code' => $referralCode,
                ]);
                service('eventTracker')->track('referral.applied', [
                    'source' => 'register',
                    'channel' => $attribution['source_channel'] ?? 'direct',
                    'campaign_code' => $attribution['campaign_code'] ?? null,
                ], $newUserId, 'referral');
            }

            if ($this->config->requireActivation !== null) {
                $activator = service('activator');
                $sent      = $activator->send($user);

                if (! $sent) {
                    $this->authLog('AUTH_FAIL', 'activation_send_failed', 'Activation email send failed', [
                        'email' => $email,
                        'user_id' => $newUserId,
                        'activator_error' => $activator->error() ?? lang('Auth.unknownError'),
                        'redirect_target' => site_url('register'),
                    ], 'error', __LINE__);
                    $auditService->notifyRegistrationResult($email, 'failed', $request, null, $auditContext + [
                        'error' => $activator->error() ?? lang('Auth.unknownError'),
                    ]);
                    service('eventTracker')->track('auth.register_fail', [
                        'reason' => 'activation_send_failed',
                    ]);

                    log_message('error', '[REGISTRATION] Activation email failed to send', [
                        'user_id' => $newUserId,
                        'email'   => $user->email ?? null,
                        'error'   => $activator->error() ?? lang('Auth.unknownError'),
                    ]);

                    $this->forceSupportAlert(
                        'danger',
                        'Registration failed',
                        'We could not create your account at this time.',
                        'AUTH-REG-SAVE-001',
                        null,
                        ['user_id' => $newUserId, 'request_id' => $requestId]
                    );
                    return redirect()->to(site_url('register'))->withInput()->with('errors', ['activation' => $activator->error() ?? lang('Auth.unknownError')]);
                }
                $this->authLog('AUTH_SUCCESS', 'register_success_activation_required', 'Registration successful with activation required', [
                    'email' => $email,
                    'user_id' => $newUserId,
                    'redirect_target' => site_url('register/success'),
                ], 'info', __LINE__);

                $auditService->notifyRegistrationResult($email, 'success', $request, null, $auditContext);
                service('eventTracker')->track('auth.activation_email_sent', [], $newUserId);

                log_message('info', '[REGISTRATION] Activation email queued', [
                    'user_id' => $newUserId,
                    'email'   => $user->email ?? null,
                ]);

                log_message('info', 'Registration redirecting to success guide for user_id={id}', ['id' => $newUserId]);

                $this->session->set('post_registration_source', [
                    'source_channel' => $attribution['source_channel'] ?? 'direct',
                    'source_slug' => $attribution['source_slug'] ?? null,
                ]);
                $this->session->remove('referral_code');
                $this->session->remove('registration_attribution');

                // Success!
                $message = lang('Auth.activationSuccess');
                if ($referralCode !== '') {
                    $message .= ' Referral applied: ' . $referralCode . '.';
                }
                return redirect()->to(site_url('register/success'))->with('auth_message', [
                    'type' => 'success',
                    'text' => $message,
                ]);
            }

            $auditService->notifyRegistrationResult($email, 'success', $request, null, $auditContext);
            $this->authLog('AUTH_SUCCESS', 'register_success', 'Registration successful', [
                'email' => $email,
                'user_id' => $newUserId,
                'redirect_target' => site_url('register/success'),
            ], 'info', __LINE__);

            log_message('info', 'Registration redirecting to success guide for user_id={id}', ['id' => $newUserId]);

            $this->session->set('post_registration_source', [
                'source_channel' => $attribution['source_channel'] ?? 'direct',
                'source_slug' => $attribution['source_slug'] ?? null,
            ]);
            $this->session->remove('referral_code');
            $this->session->remove('registration_attribution');

            // Success!
            $message = lang('Auth.registerSuccess');
            if ($referralCode !== '') {
                $message .= ' Referral applied: ' . $referralCode . '.';
            }
            return redirect()->to(site_url('register/success'))->with('auth_message', [
                'type' => 'success',
                'text' => $message,
            ]);
        } catch (Throwable $e) {
            $this->authLog('AUTH_FAIL', 'register_exception', 'Exception during registration', [
                'email' => $email,
                'exception' => $e->getMessage(),
                'redirect_target' => site_url('register'),
            ], 'error', __LINE__);
            $auditService->notifyRegistrationResult($email, 'failed', $request, $e, $auditContext);
            service('eventTracker')->track('auth.register_fail', [
                'reason' => 'exception',
            ]);

            log_message('error', '[REGISTRATION] Exception during registration', [
                'email' => $email,
                'error' => $e->getMessage(),
            ]);

            $this->forceSupportAlert(
                'danger',
                'System error during registration',
                'A system error occurred while processing your registration.',
                'AUTH-REG-EXCEPTION-001',
                $e,
                ['email' => $email, 'request_id' => $requestId]
            );
            return redirect()->to(site_url('register'))->withInput()->with('error', 'Your request could not be processed. Please refresh the page and try again.');
        }
    }

    /**
     * @param array<string,mixed> $attribution
     */
    private function persistRegistrationAttribution(int $userId, string $referralCode, array $attribution): void
    {
        if ($userId <= 0) {
            return;
        }

        $db = db_connect();
        if (! $db->tableExists('users')) {
            return;
        }

        $fields = $db->getFieldNames('users');
        $payload = [];

        if (in_array('referral_code', $fields, true) && $referralCode !== '') {
            $payload['referral_code'] = $referralCode;
        }
        if (in_array('source_channel', $fields, true)) {
            $payload['source_channel'] = (string) ($attribution['source_channel'] ?? 'direct');
        }
        if (in_array('campaign_code', $fields, true)) {
            $campaignCode = trim((string) ($attribution['campaign_code'] ?? ''));
            $payload['campaign_code'] = $campaignCode !== '' ? $campaignCode : null;
        }
        if (in_array('source_slug', $fields, true)) {
            $payload['source_slug'] = (string) ($attribution['source_slug'] ?? '') ?: null;
        }
        if (in_array('landing_path', $fields, true)) {
            $payload['landing_path'] = (string) ($attribution['landing_path'] ?? ($attribution['route'] ?? '')) ?: null;
        }
        if (in_array('utm_source', $fields, true)) {
            $payload['utm_source'] = (string) ($attribution['utm']['utm_source'] ?? '') ?: null;
        }
        if (in_array('utm_medium', $fields, true)) {
            $payload['utm_medium'] = (string) ($attribution['utm']['utm_medium'] ?? '') ?: null;
        }
        if (in_array('utm_campaign', $fields, true)) {
            $payload['utm_campaign'] = (string) ($attribution['utm']['utm_campaign'] ?? '') ?: null;
        }

        if ($payload === []) {
            return;
        }

        $db->table('users')->where('id', $userId)->update($payload);
    }

    public function registerSuccess()
    {
        log_message('debug', '[REGISTER_SUCCESS] entered');

        try {
            $this->session->remove('redirect_url');

            $data = [
                'pageTitle'    => 'Registration Successful',
                'config'       => $this->config,
                'siteSettings' => config('SiteSettings'),
                'socialMedia'  => config('SocialMedia'),
                'userRole'     => $this->resolveUserRole(),
                'activationRequired' => $this->config->requireActivation !== null,
            ];

            log_message('debug', '[REGISTER_SUCCESS] data prepared', $data);

            return $this->_render('Auth/register_success', $data);

        } catch (\Throwable $e) {
            log_message('critical', '[REGISTER_SUCCESS_ERROR]', [
                'message' => $e->getMessage(),
                'file'    => $e->getFile(),
                'line'    => $e->getLine(),
            ]);

            throw $e; // allow debug visibility
        }
    }
    
    public function registerSuccessProbe()
    {
        log_message('critical', '[REGISTER_SUCCESS_PROBE] start');

        return view('Auth/register_success_plain');
    }

    public function resendRegistrationActivation()
    {
        service('eventTracker')->track('auth.resend_activation_requested', [
            'source' => 'register_success',
        ]);

        if ($this->config->requireActivation === null) {
            log_message('info', 'Registration resend activation skipped: activation disabled.');
            return redirect()->to(site_url('register/success'))->with('auth_message', [
                'type' => 'info',
                'text' => lang('Auth.activationSuccess'),
            ]);
        }

        $email = strtolower(trim((string) $this->request->getPost('email')));
        $throttler = service('throttler');
        $throttleKey = md5('register-resend:' . ($email ?: 'unknown') . ':' . $this->request->getIPAddress());

        if ($throttler->check($throttleKey, 2, MINUTE) === false) {
            log_message('warning', 'Registration resend activation throttled for {email} from {ip}', [
                'email' => $email ?: 'unknown',
                'ip'    => $this->request->getIPAddress(),
            ]);

            return redirect()->to(site_url('register/success'))
                ->with('auth_message', [
                    'type' => 'info',
                    'text' => 'If an account exists for that email, we sent an activation email.',
                ]);
        }

        if ($email === '') {
            log_message('notice', 'Registration resend activation requested without email.');
            return redirect()->to(site_url('register/success'))
                ->with('auth_message', [
                    'type' => 'info',
                    'text' => 'If an account exists for that email, we sent an activation email.',
                ]);
        }

        $users = model(UserModel::class);
        $user = $users->where('email', $email)->where('active', 0)->first();

        if ($user) {
            $activator = service('activator');
            $sent = $activator->send($user);
            if (! $sent) {
                log_message('error', 'Registration resend activation failed for {email}: {error}', [
                    'email' => $email,
                    'error' => $activator->error() ?? lang('Auth.unknownError'),
                ]);
                return redirect()->to(site_url('register/success'))
                    ->with('auth_message', [
                        'type' => 'danger',
                        'text' => 'We couldn’t send your email right now. Please try again or contact support.',
                    ]);
            } else {
                service('eventTracker')->track('auth.resend_activation_sent', [], (int) ($user->id ?? 0));
                log_message('info', 'Registration resend activation succeeded for {email}', ['email' => $email]);
            }
        } else {
            log_message('notice', 'Registration resend activation request had no matching inactive user for {email}', [
                'email' => $email,
            ]);
        }

        return redirect()->to(site_url('register/success'))
            ->with('auth_message', [
                'type' => 'info',
                'text' => 'If an account exists for that email, we sent an activation email.',
            ]);
    }

    //--------------------------------------------------------------------
    // Forgot Password
    //--------------------------------------------------------------------

    /**
     * Displays the forgot password form.
     */
    public function forgotPassword()
    {
        if ($this->config->activeResetter === null) {
            $this->setAuthMessage('danger', lang('Auth.forgotDisabled'));
            return redirect()->route('login');
        }

        return $this->_render($this->config->views['forgot'], ['config' => $this->config]);
    }

    /**
     * Attempts to find a user account with that password
     * and send password reset instructions to them.
     */
    public function attemptForgot()
    {
        if ($this->config->activeResetter === null) {
            $this->setAuthMessage('danger', lang('Auth.forgotDisabled'));
            return redirect()->route('login');
        }

        $rules = [
            'email' => [
                'label' => lang('Auth.emailAddress'),
                'rules' => 'required|valid_email',
            ],
        ];

        if (! $this->validate($rules)) {
            $errors = $this->validator->getErrors();
            $this->setAuthMessage('danger', $this->formatValidationErrors($errors));
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        $users = model(UserModel::class);

        $email = (string) $this->request->getPost('email');
        $this->ipHistoryModel->record(null, $email, $this->request->getIPAddress(), (string) $this->request->getUserAgent());
        log_message('info', '[AUTH] Password reset requested', [
            'email' => $email,
            'ip'    => $this->request->getIPAddress(),
        ]);

        $user = $users->where('email', $email)->first();

        if (null === $user) {
            $this->setAuthMessage('danger', lang('Auth.forgotNoUser'));
            log_message('warning', '[AUTH] Password reset request: user not found', [
                'email' => $email,
                'ip'    => $this->request->getIPAddress(),
            ]);
            return redirect()->back();
        }

        // Save the reset hash /
        $user->generateResetHash();
        $users->save($user);

        $resetter = service('resetter');
        $sent     = $resetter->send($user);

        if (! $sent) {
            $this->setAuthMessage('danger', $resetter->error() ?? lang('Auth.unknownError'));
            log_message('error', '[AUTH] Password reset email failed', [
                'email' => $email,
                'error' => $resetter->error() ?? lang('Auth.unknownError'),
            ]);
            return redirect()->back()->withInput();
        }

        $this->setAuthMessage('success', lang('Auth.forgotEmailSent'));
        log_message('info', '[AUTH] Password reset email sent', [
            'email' => $email,
        ]);
        return redirect()->route('reset-password');
    }

    /**
     * Resolve User's Role if empty.
     */private function resolveUserRole(): string
    {
        try {
            $user = $this->auth->user();

            if (!$user) {
                return session('role') ?? 'guest';
            }

            // Myth\Auth groups or custom role field
            if (method_exists($user, 'getRoles')) {
                $roles = $user->getRoles();
                return $roles[0] ?? 'user';
            }

            return $user->role ?? 'user';

        } catch (\Throwable $e) {
            log_message('debug', '[ROLE_RESOLVE_FAIL] ' . $e->getMessage());
            return 'guest';
        }
    }

    /**
     * Displays the Reset Password form.
     */
    public function resetPassword()
    {
        if ($this->config->activeResetter === null) {
            $this->setAuthMessage('danger', lang('Auth.forgotDisabled'));
            return redirect()->route('login');
        }

        $token = $this->request->getGet('token');

        return $this->_render($this->config->views['reset'], [
            'config' => $this->config,
            'token'  => $token,
        ]);
    }

    /**
     * Verifies the code with the email and saves the new password,
     * if they all pass validation.
     *
     * @return mixed
     */
    public function attemptReset()
    {
        if ($this->config->activeResetter === null) {
            $this->setAuthMessage('danger', lang('Auth.forgotDisabled'));
            return redirect()->route('login');
        }

        $users = model(UserModel::class);

        // First things first - log the reset attempt.
        $users->logResetAttempt(
            $this->request->getPost('email'),
            $this->request->getPost('token'),
            $this->request->getIPAddress(),
            (string) $this->request->getUserAgent()
        );

        $rules = [
            'token'        => 'required',
            'email'        => 'required|valid_email',
            'password'     => 'required|strong_password',
            'pass_confirm' => 'required|matches[password]',
        ];

        if (! $this->validate($rules)) {
            $errors = $this->validator->getErrors();
            log_message('error', '[AUTH] Reset validation failed', [
                'errors' => $errors,
                'fields_present' => array_keys(array_filter([
                    'token' => $this->request->getPost('token'),
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password') ? '__present__' : null,
                    'pass_confirm' => $this->request->getPost('pass_confirm') ? '__present__' : null,
                ])),
            ]);
            $this->setAuthMessage('danger', $this->formatValidationErrors($errors));
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        $this->ipHistoryModel->record(null, (string) $this->request->getPost('email'), $this->request->getIPAddress(), (string) $this->request->getUserAgent());

        $user = $users->where('email', $this->request->getPost('email'))
            ->where('reset_hash', $this->request->getPost('token'))
            ->first();

        if (null === $user) {
            $this->setAuthMessage('danger', lang('Auth.forgotNoUser'));
            return redirect()->back();
        }

        // Reset token still valid?
        if (! empty($user->reset_expires) && time() > $user->reset_expires->getTimestamp()) {
            $this->setAuthMessage('danger', lang('Auth.resetTokenExpired'));
            return redirect()->back()->withInput();
        }

        // Success! Save the new password, and cleanup the reset hash.
        $user->password         = $this->request->getPost('password');
        $user->reset_hash       = null;
        $user->reset_at         = date('Y-m-d H:i:s');
        $user->reset_expires    = null;
        $user->force_pass_reset = false;
        $users->save($user);

        $this->setAuthMessage('success', lang('Auth.resetSuccess'));
        log_message('info', '[AUTH] Password reset completed', [
            'email' => $this->request->getPost('email'),
        ]);
        return redirect()->route('login');
    }

    /**
     * Activate account.
     *
     * @return mixed
     */
    public function activateAccount()
    {
        $users = model(UserModel::class);
        $token = (string) ($this->request->getPost('activation_code') ?: $this->request->getGet('token'));

        service('eventTracker')->track('auth.activate_click', [
            'has_token' => $token !== '',
        ]);

        $tokenHash = $token !== '' ? sha1($token) : null;

        log_message('info', '[ACTIVATION] Activation link hit', [
            'has_token' => $token !== '',
            'token_hash' => $tokenHash,
            'ip'    => $this->request->getIPAddress(),
        ]);

        // First things first - log the activation attempt.
        $users->logActivationAttempt(
            $token,
            $this->request->getIPAddress(),
            (string) $this->request->getUserAgent()
        );

        $throttler = service('throttler');

        if ($throttler->check(md5($this->request->getIPAddress()), 2, MINUTE) === false) {
            log_message('warning', '[ACTIVATION] Activation throttled', [
                'token_hash' => $tokenHash,
                'ip'    => $this->request->getIPAddress(),
            ]);
            return service('response')->setStatusCode(429)->setBody(lang('Auth.tooManyRequests', [$throttler->getTokentime()]));
        }

        if ($token === '') {
            $this->setAuthMessage('warning', 'That activation link is invalid or expired. Enter your email to send a new one.');
            service('eventTracker')->track('auth.activate_fail', [
                'reason' => 'invalid',
            ]);
            log_message('notice', '[ACTIVATION] Activation failed: missing token', [
                'ip' => $this->request->getIPAddress(),
            ]);
            return redirect()->to(site_url('Support/Account'));
        }

        $user = $users->where('activate_hash', $token)->first();

        if (null === $user) {
            log_message('notice', '[ACTIVATION] Activation failed: user not found', [
                'token_hash' => $tokenHash,
                'ip'    => $this->request->getIPAddress(),
            ]);
            service('eventTracker')->track('auth.activate_fail', [
                'reason' => 'invalid',
            ]);
            $this->setAuthMessage('warning', 'That activation link is invalid or expired. Enter your email to send a new one.');
            return redirect()->to(site_url('Support/Account'));
        }

        if ((int) ($user->active ?? 0) === 1) {
            log_message('info', '[ACTIVATION] Account already active', [
                'user_id' => $user->id ?? null,
                'email'   => $user->email ?? null,
            ]);
            service('eventTracker')->track('auth.activate_fail', [
                'reason' => 'already_active',
            ], (int) ($user->id ?? 0));
            $this->setAuthMessage('info', 'Your account is already activated. Please log in.');
            return redirect()->route('login');
        }

        log_message('debug', '[ACTIVATION] Token validated for user', [
            'user_id' => $user->id ?? null,
            'email'   => $user->email ?? null,
        ]);

        $user->activate();

        $users->save($user);

        log_message('info', '[ACTIVATION] Account activated', [
            'user_id' => $user->id ?? null,
            'email'   => $user->email ?? null,
        ]);
        service('eventTracker')->track('auth.activate_success', [], (int) ($user->id ?? 0));

        log_message('info', '[ACTIVATION] Redirect issued', [
            'destination' => route_to('login'),
            'user_id'     => $user->id ?? null,
        ]);

        return redirect()->route('login')->with('auth_message', [
            'type' => 'success',
            'text' => 'Your account has been successfully activated. You may now log in.',
        ]);
    }

    /**
     * Resend activation account.
     *
     * @return mixed
     */
    public function resendActivateAccount()
    {
        if ($this->config->requireActivation === null) {
            $this->setAuthMessage('info', 'Activation is not required for this account.');
            return redirect()->route('login');
        }

        $throttler = service('throttler');

        if ($throttler->check(md5($this->request->getIPAddress()), 2, MINUTE) === false) {
            return service('response')->setStatusCode(429)->setBody(lang('Auth.tooManyRequests', [$throttler->getTokentime()]));
        }

        $login = urldecode($this->request->getGet('login'));
        $type  = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $users = model(UserModel::class);

        $user = $users->where($type, $login)
            ->where('active', 0)
            ->first();

        if (null === $user) {
            $this->setAuthMessage('danger', lang('Auth.activationNoUser'));
            $this->session->setFlashdata('auth_show_resend', true);
            return redirect()->route('login');
        }

        $activator = service('activator');
        $sent      = $activator->send($user);

        if (! $sent) {
            $this->setAuthMessage('danger', $activator->error() ?? lang('Auth.unknownError'));
            return redirect()->back()->withInput();
        }

        // Success!
        return redirect()->route('login')->with('auth_message', [
            'type' => 'success',
            'text' => lang('Auth.activationSuccess'),
        ]);
    }

    public function resendActivation()
    {
        if ($this->config->requireActivation === null) {
            $this->setAuthMessage('info', 'Activation is not required for this account.');
            return redirect()->route('login');
        }

        return $this->_render($this->config->views['resendActivation'] ?? 'Auth/resend_activation', [
            'config' => $this->config,
            'email'  => '',
        ]);
    }

    public function resendActivationCode()
    {
        $email = strtolower(trim((string) $this->request->getPost('email')));
        $ip    = $this->request->getIPAddress();

        service('eventTracker')->track('auth.resend_activation_requested', [
            'source' => 'login',
        ]);

        log_message('info', '[AUTH] Resend activation requested', [
            'email' => $email ?: 'unknown',
            'ip'    => $ip,
        ]);

        $throttler   = service('throttler');
        $throttleKey = md5('resend-activation:' . ($email ?: 'unknown') . ':' . $ip);

        if ($throttler->check($throttleKey, 3, MINUTE) === false) {
            log_message('warning', '[AUTH] Resend activation throttled', [
                'email' => $email ?: 'unknown',
                'ip'    => $ip,
            ]);
            return redirect()->route('login')->with('auth_message', [
                'type' => 'info',
                'text' => 'If an account exists for that email, we sent an activation email.',
            ]);
        }

        if ($email === '') {
            log_message('notice', '[AUTH] Resend activation missing email', [
                'ip' => $ip,
            ]);
            return redirect()->route('login')->with('auth_message', [
                'type' => 'info',
                'text' => 'If an account exists for that email, we sent an activation email.',
            ]);
        }

        $users = model(UserModel::class);
        $user  = $users->where('email', $email)->first();

        if ($user && (int) ($user->active ?? 0) === 0) {
            $activator = service('activator');
            $sent      = $activator->send($user);

            if ($sent) {
                service('eventTracker')->track('auth.resend_activation_sent', [], (int) ($user->id ?? 0));
                log_message('info', '[AUTH] Resend activation sent', [
                    'email' => $email,
                    'user_id' => $user->id ?? null,
                ]);
            } else {
                log_message('error', '[AUTH] Resend activation send failed', [
                    'email' => $email,
                    'error' => $activator->error() ?? lang('Auth.unknownError'),
                ]);
                return redirect()->route('login')->with('auth_message', [
                    'type' => 'danger',
                    'text' => 'We couldn’t send your email right now. Please try again or contact support.',
                ]);
            }
        } elseif ($user && (int) ($user->active ?? 0) === 1) {
            log_message('info', '[AUTH] Resend activation ignored (already active)', [
                'email' => $email,
                'user_id' => $user->id ?? null,
            ]);
        } else {
            log_message('notice', '[AUTH] Resend activation email not found', [
                'email' => $email,
            ]);
        }

        return redirect()->route('login')->with('auth_message', [
            'type' => 'info',
            'text' => 'If an account exists for that email, we sent an activation email.',
        ]);
    }

    private function redirectAfterLogin(): RedirectResponse
    {
        $destination = $this->determineRedirectDestination();

        return redirect()->to($destination);
    }

    private function determineRedirectDestination(): string
    {
        $redirectURL = (string) ($this->session->get('redirect_url') ?? '');

        log_message('debug', '[REDIRECT_FINAL] ' . ($redirectURL !== '' ? $redirectURL : '[empty]'));

        if ($redirectURL === '') {
            $this->session->remove('redirect_url');
            return $this->dashboardUrl();
        }

        if (! $this->isValidRedirectTarget($redirectURL)) {
            $redirectURL = $this->dashboardUrl();
        }

        // Absolute final guard against loop targets
        if (
            $this->isRootDestination($redirectURL)
            || $this->isLoginDestination($redirectURL)
            || $this->isLogoutDestination($redirectURL)
            || $this->isRegisterSuccessDestination($redirectURL)
        ) {
            $redirectURL = $this->dashboardUrl();
        }

        $this->session->remove('redirect_url');

        log_message('debug', 'Auth redirect destination: ' . $redirectURL);

        return $redirectURL;
    }


    private function rememberRedirectUrl(?string $url): void
    {
        $url = $this->sanitizeRedirectTarget($url);
        if ($url === null || $url === '') {
            return;
        }

        if ($this->session->has('redirect_url')) {
            return;
        }

        if ($this->isValidRedirectTarget($url)) {
            $this->session->set('redirect_url', $url);
        }
    }

    protected function sanitizeRedirectTarget(?string $url): ?string
    {
        $url = is_string($url) ? trim($url) : '';

        if ($url === '') {
            return null;
        }

        $parts = parse_url($url);
        if ($parts === false) {
            return null;
        }

        $path = (string) ($parts['path'] ?? '');
        if ($path === '') {
            return null;
        }

        $query = [];
        if (! empty($parts['query'])) {
            parse_str((string) $parts['query'], $query);
        }

        foreach (array_keys($query) as $key) {
            if (
                in_array($key, ['_gl', '_ga', 'gclid', 'fbclid', 'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'redirect_url', 'next'], true)
                || str_starts_with($key, '_ga_')
            ) {
                unset($query[$key]);
            }
        }

        $clean = $path;
        if (! empty($query)) {
            $clean .= '?' . http_build_query($query);
        }

        return $clean !== '' ? $clean : null;
    }

    private function isValidRedirectTarget(?string $url): bool
    {
        if ($url === null || $url === '') {
            return false;
        }

        if ($this->isRegisterSuccessDestination($url)) {
            return false;
        }

        if (! $this->passesRedirectValidation($url)) {
            return false;
        }

        if ($this->isRootDestination($url) || $this->isLoginDestination($url) || $this->isLogoutDestination($url)) {
            return false;
        }

        if ($this->isExternalDestination($url)) {
            return false;
        }

        return true;
    }

    private function passesRedirectValidation(string $url): bool
    {
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return true;
        }

        $parts = parse_url($url);
        if ($parts === false) {
            return false;
        }

        if (isset($parts['scheme']) || isset($parts['host'])) {
            return false;
        }

        return trim((string) ($parts['path'] ?? '')) !== '';
    }

    private function isRootDestination(?string $url): bool
    {
        if ($url === null) {
            return true;
        }

        if ($url === '/' || $url === '') {
            return true;
        }

        $path = $this->normalisePath($url);
        if ($path === '' || in_array(strtolower($path), ['home', 'index', 'index.php'], true)) {
            return true;
        }

        $normalisedUrl = rtrim($url, '/');
        $baseUrls      = [
            rtrim(site_url('/'), '/'),
            rtrim(base_url('/'), '/'),
        ];

        return in_array($normalisedUrl, $baseUrls, true);
    }

    private function isLoginDestination(?string $url): bool
    {
        if ($url === null) {
            return false;
        }

        $path      = $this->normalisePath($url);
        $loginPath = $this->normalisePath(site_url('login'));

        if ($path === $loginPath || str_ends_with(strtolower($path), '/login') || strtolower($path) === 'login') {
            return true;
        }

        return stripos($url, '/login') !== false;
    }

    private function isLogoutDestination(?string $url): bool
    {
        if ($url === null) {
            return false;
        }

        return stripos($url, '/logout') !== false;
    }

    private function isRegisterSuccessDestination(?string $url): bool
    {
        if ($url === null) {
            return false;
        }

        return stripos($url, '/register/success') !== false;
    }

    private function isExternalDestination(string $url): bool
    {
        $appBase = site_url();
        $appHost = parse_url($appBase, PHP_URL_HOST);

        $parsedHost = parse_url($url, PHP_URL_HOST);
        $scheme     = parse_url($url, PHP_URL_SCHEME);

        if ($scheme !== null && ! in_array(strtolower($scheme), ['http', 'https'], true)) {
            return true;
        }

        // Relative paths are allowed
        if ($parsedHost === null) {
            return false;
        }

        if ($appHost === null) {
            return true;
        }

        return strcasecmp($parsedHost, $appHost) !== 0;
    }

    private function normalisePath(?string $url): string
    {
        if ($url === null) {
            return '';
        }

        $path = parse_url($url, PHP_URL_PATH);

        if ($path === null) {
            $path = $url;
        }

        return trim($path, '/');
    }

    private function dashboardUrl(): string
    {
        return site_url('Dashboard');
    }

    protected function _render($view, array $data = [])
    {
        $this->normalizeAppOverridesFolder();

        $normalizedView = $this->requireValidViewPath($view, 'view', __METHOD__);

        $registrationSourceContent = $data['registrationSourceContent'] ?? [];
        $introView = null;

        if (is_array($registrationSourceContent)) {
            $candidateIntroView = $registrationSourceContent['intro_view'] ?? null;
            if (is_string($candidateIntroView) && trim($candidateIntroView) !== '') {
                $introView = trim($candidateIntroView, "/\\ \t\n\r\0\x0B");
            }
        }

        $data = array_merge([
            'pageTitle'       => 'Register | MyMI Wallet',
            'metaTitle'       => 'Register | MyMI Wallet',
            'metaDescription' => 'Create your MyMI Wallet account.',
        ], $data);

        // Remove optional render-path keys when they are null/empty
        foreach (['layout', 'headerView', 'footerView', 'authLayout', 'contentView', 'introView'] as $key) {
            if (array_key_exists($key, $data) && (! is_string($data[$key]) || trim((string) $data[$key]) === '')) {
                unset($data[$key]);
            }
        }

        if ($introView !== null) {
            $data['introView'] = $introView;
        }

        $resolvedLayout = $this->resolveOptionalViewPath($data['layout'] ?? null, 'layout', 'themes/public/layouts/index');
        $resolvedHeader = $this->resolveOptionalViewPath($data['headerView'] ?? null, 'headerView');
        $resolvedFooter = $this->resolveOptionalViewPath($data['footerView'] ?? null, 'footerView');
        $resolvedAuthLayout = $this->resolveOptionalViewPath($data['authLayout'] ?? null, 'authLayout');
        $resolvedContentView = $this->resolveOptionalViewPath($data['contentView'] ?? null, 'contentView');
        $resolvedIntroView = $this->resolveOptionalViewPath($data['introView'] ?? null, 'introView');

        $this->logRenderDiagnostics($normalizedView, $resolvedLayout, [
            'headerView' => $resolvedHeader,
            'footerView' => $resolvedFooter,
            'authLayout' => $resolvedAuthLayout,
            'contentView' => $resolvedContentView,
            'introView' => $resolvedIntroView,
        ]);

        log_message('debug', '[AUTH_RENDER] Final render config', [
            'route' => (string) $this->request->getUri(),
            'view' => $normalizedView,
            'pageTitle' => $data['pageTitle'] ?? null,
            'metaTitle' => $data['metaTitle'] ?? null,
            'metaDescription' => $data['metaDescription'] ?? null,
            'layout' => $resolvedLayout,
            'headerView' => $resolvedHeader,
            'footerView' => $resolvedFooter,
            'authLayout' => $resolvedAuthLayout,
            'contentView' => $resolvedContentView,
            'introView' => $resolvedIntroView,
        ]);

        return $this->safeView($normalizedView, $data);
    }

    private function setAuthMessage(string $type, string $text, ?string $title = null): void
    {
        $payload = [
            'type' => $type,
            'text' => $text,
        ];

        if ($title) {
            $payload['title'] = $title;
        }

        $this->session->setFlashdata('auth_message', $payload);
    }

    private function ensureAuthRequestId(): string
    {
        $existing = (string) ($this->requestId ?? '');
        if ($existing !== '') {
            return $existing;
        }

        $incoming = (string) $this->request->getHeaderLine('X-Request-Id');
        $this->requestId = $incoming !== '' ? $incoming : bin2hex(random_bytes(6));

        return $this->requestId;
    }

    private function logAuthSubmitDiagnostics(string $handler, string $requestId): void
    {
        $post = $this->request->getPost() ?? [];
        $security = service('security');
        $csrfTokenName = method_exists($security, 'getTokenName') ? $security->getTokenName() : 'csrf_test_name';

        log_message('info', '[AUTH_SUBMIT] {handler} reached', [
            'handler' => $handler,
            'request_id' => $requestId,
            'method' => strtoupper($this->request->getMethod()),
            'uri' => (string) $this->request->getUri(),
            'referer' => $this->request->getHeaderLine('Referer'),
            'post_keys' => array_keys($post),
            'csrf_present' => array_key_exists($csrfTokenName, $post),
            'has_login' => array_key_exists('login', $post),
            'has_username' => array_key_exists('username', $post),
            'has_email' => array_key_exists('email', $post),
            'has_password' => array_key_exists('password', $post),
        ]);
    }

    public function authDiagnostics()
    {
        $auth = service('authentication');
        $authClass = is_object($auth) ? $auth::class : gettype($auth);
        $session = service('session');
        $sessionClass = is_object($session) ? $session::class : gettype($session);
        $authShape = [
            'has_check' => is_object($auth) && method_exists($auth, 'check'),
            'has_attempt' => is_object($auth) && method_exists($auth, 'attempt'),
            'has_id' => is_object($auth) && method_exists($auth, 'id'),
            'has_user' => is_object($auth) && method_exists($auth, 'user'),
        ];
        $csrfTokenName = null;
        try {
            $security = service('security');
            if (is_object($security) && method_exists($security, 'getTokenName')) {
                $csrfTokenName = $security->getTokenName();
            }
        } catch (Throwable $e) {
            $csrfTokenName = null;
        }

        $payload = [
            'ok' => true,
            'request_id' => $this->ensureAuthRequestId(),
            'auth_service_class' => $authClass,
            'session_class' => $sessionClass,
            'csrf_token_name' => $csrfTokenName,
            'session_id' => session_id(),
            'auth_shape' => $authShape,
        ];
        $this->authLog('AUTH_VIEW', 'diagnostic', 'Auth diagnostic endpoint called', $payload, 'info', __LINE__);

        return $this->response->setJSON($payload);
    }

    private function authLog(string $prefix, string $branch, string $message, array $context = [], string $level = 'debug', ?int $line = null): void
    {
        if ($level === 'debug' && ! (bool) ($this->config->debug ?? false)) {
            return;
        }
        $base = [
            'prefix' => $prefix,
            'branch' => $branch,
            'file' => __FILE__,
            'line' => $line,
            'request_id' => $this->ensureAuthRequestId(),
            'method' => strtoupper($this->request->getMethod()),
            'uri' => (string) $this->request->getUri(),
            'identifier' => (string) ($this->request->getPost('login') ?? $this->request->getPost('email') ?? ''),
            'session_status' => session_status(),
            'session_id' => session_id(),
            'csrf_present' => $this->isCsrfPresent(),
        ];
        log_message($level, "[{$prefix}] {$message}", $base + $context);
    }

    private function isCsrfPresent(): bool
    {
        $post = (array) ($this->request->getPost() ?? []);
        try {
            $security = service('security');
            $tokenName = (is_object($security) && method_exists($security, 'getTokenName'))
                ? (string) $security->getTokenName()
                : csrf_token();
        } catch (Throwable $e) {
            $tokenName = csrf_token();
        }

        return $tokenName !== '' && array_key_exists($tokenName, $post);
    }

    private function redirectToAuthFailure(string $context): RedirectResponse
    {
        $route = strtolower($context) === 'register' ? 'register' : 'login';

        return redirect()->to(site_url($route));
    }

    private function formatValidationErrors(array $errors): string
    {
        $messages = array_values(array_filter(array_map('trim', $errors)));
        if ($messages === []) {
            return 'Please check the highlighted fields and try again.';
        }

        if (count($messages) === 1) {
            return $messages[0];
        }

        return implode(' ', $messages);
    }

    private function validationSummary(array $errors): array
    {
        $fields = array_keys(array_filter($errors));

        return [
            'fields' => $fields,
            'count'  => count($fields),
        ];
    }
}
