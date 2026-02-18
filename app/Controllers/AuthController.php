<?php

namespace App\Controllers;

use App\Services\AuthAuditService;
use App\Services\Auth\AuthLogger;
use App\Services\OnboardingProgressService;
use App\Models\UserIpHistoryModel;
use App\Modules\Support\Services\SupportTicketService;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Session\Session;
use Myth\Auth\Config\Auth as AuthConfig;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;
use Throwable;

class AuthController extends Controller
{
    protected $auth;
    protected AuthLogger $authLogger;
    protected UserIpHistoryModel $ipHistoryModel;
    protected SupportTicketService $supportTicketService;

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
        $next    = $request->getGet('next');

        if (! empty($next)) {
            session()->set('redirect_url', $next);
            log_message('debug', 'Auth login() captured next param: ' . $next);
        }

        $this->rememberRedirectUrl($request->getGet('redirect_url'));

        $previous = previous_url();

        if (
            ! $this->session->has('redirect_url')
            && $previous
            && ! str_contains($previous, '/login')
            && ! str_contains($previous, '/logout')
        ) {
            $this->rememberRedirectUrl($previous);
        }

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
        log_message('info', 'AuthController L93: Auth:attemptLogin started.');

        service('eventTracker')->track('auth.login_attempt', [
            'login_type' => $this->config->validFields === ['email'] ? 'email' : 'username',
        ]);

        $rules = [
            'login'    => 'required',
            'password' => 'required',
        ];

        log_message('info', 'AuthController L104: Auth:attemptLogin rules: ' . json_encode($rules));

        if ($this->config->validFields === ['email']) {
            $rules['login'] .= '|valid_email';
        }

        if (! $this->validate($rules)) {
            $errors = $this->validator->getErrors();
            service('eventTracker')->track('auth.login_fail', [
                'reason' => 'validation',
                'summary' => $this->validationSummary($errors),
            ]);
            $this->setAuthMessage('danger', $this->formatValidationErrors($errors));
            log_message('warning', '[AUTH] Login validation failed', [
                'errors' => $errors,
                'ip'     => $this->request->getIPAddress(),
            ]);
            return redirect()->back()
                ->withInput()
                ->with('errors', $errors);
        }

        $login    = $this->request->getPost('login');
        $password = $this->request->getPost('password');
        $remember = (bool) $this->request->getPost('remember');
        $ip = $this->request->getIPAddress();
        $ua = (string) $this->request->getUserAgent();

        log_message('info', 'AuthController L132: Auth:attemptLogin Login Variables: login: ' . $rules['login'] . ', remember: ' . ($remember ? 'true' : 'false') . ', ip: ' . $ip . ', ua: ' . $ua);

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
        $this->rememberRedirectUrl($this->request->getPost('redirect_url'));
        $this->rememberRedirectUrl($this->request->getPost('next'));

        log_message(
            'debug',
            'Auth attemptLogin() called. redirect_url in session: ' . (session('redirect_url') ?? 'none')
        );

        $type        = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
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
            $this->setAuthMessage('danger', 'We hit a system error while signing you in. Ticket #' . $ticketId . ' was created. Support has been notified.');

            return redirect()->back()->withInput();
        }

        // 🔴 AUTH ATTEMPT
        if (! $attempt) {
            // LocalAuthenticator exposes `error()` (single last error message)
            $errorMsg = $this->auth->error() ?? lang('Auth.badAttempt');
            $inactiveMessage = lang('Auth.notActivated');

            log_message(
                'debug',
                sprintf(
                    'Auth attempt failed for identifier %s. Error: %s',
                    $login ?? 'N/A',
                    $errorMsg
                )
            );

            if ($errorMsg === $inactiveMessage || stripos($errorMsg, 'not activated') !== false) {
                service('eventTracker')->track('auth.login_inactive', [
                    'reason' => 'inactive',
                ]);
                $this->setAuthMessage('warning', 'Your account is not activated yet. Please activate it using the email link, or resend the activation email below.');
                $this->session->setFlashdata('auth_show_resend', true);
                log_message('info', '[AUTH] Login inactive', [
                    'login' => $login,
                    'ip'    => $this->request->getIPAddress(),
                ]);
            } else {
                service('eventTracker')->track('auth.login_fail', [
                    'reason' => 'invalid_credentials',
                ]);
                $this->setAuthMessage('danger', 'Login failed. Please check your email and password.');
                $this->authLogger->logLoginFailure('invalid_credentials', ['login' => (string) $login, 'ip' => $ip, 'user_agent' => $ua]);
                log_message('warning', '[AUTH] Login failed', [
                    'login' => $login,
                    'error' => $errorMsg,
                    'ip'    => $this->request->getIPAddress(),
                ]);
            }

            return redirect()->back()
                ->withInput();
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

        $this->setAuthMessage(
            'success',
            lang('Auth.loginSuccess')
        );

        $this->session->regenerate(true);

        return $this->redirectAfterLogin()->withCookies();

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
        // If already logged in, send them away
        if ($this->auth->check()) {
            return redirect()->back();
        }

        // Check if registration is allowed
        if (! $this->config->allowRegistration) {
            $this->setAuthMessage('danger', lang('Auth.registerDisabled'));
            return redirect()->back()
                ->withInput()
                ->with('errors', ['register' => lang('Auth.registerDisabled')]);
        }

        // Use the controller's request instance
        $request = $this->request;

        $referralCode = null;
        $uri          = null;

        if ($request !== null) {
            // Get the URI object safely
            $uri = $request->getUri();

            // 1) Try query string: /register?ref=MYCODE
            $referralCode = $request->getGet('ref');

            // 2) Fallback to a segment if query param not present
            // Adjust `getSegment(2)` based on your real route:
            //   /register/MYCODE        → getSegment(2)
            //   /MYCODE/register        → getSegment(1)
            if (! $referralCode && $uri !== null) {
                $referralCode = $uri->getSegment(2);
            }
        }

        if (! empty($referralCode)) {
            $this->session->set('referral_code', $referralCode);
            service('eventTracker')->track('referral.captured', [
                'source' => $request->getGet('ref') ? 'query' : 'segment',
            ]);
        }

        if (empty($referralCode)) {
            $referralCode = $this->session->get('referral_code');
        }

        log_message('info', '[REGISTRATION] Form loaded', [
            'referral_code' => $referralCode ?: $this->session->get('referral_code'),
            'ip'            => $this->request->getIPAddress(),
        ]);

        service('eventTracker')->track('auth.register_view');

        return $this->_render($this->config->views['register'], [
            'config'       => $this->config,
            'referralCode' => $referralCode,
            'siteSettings' => config('SiteSettings'),
            'socialMedia'  => config('SocialMedia'),
            'uri'          => $uri, // pass the URI object if the view needs it
        ]);
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
        $this->ipHistoryModel->record(null, (string) $this->request->getPost('email'), $this->request->getIPAddress(), (string) $this->request->getUserAgent());
        /** @var AuthAuditService $auditService */
        $auditService = service('authAuditService');
        $request      = $this->request;
        $email        = strtolower(trim((string) ($request->getPost('email') ?? '')));
        /** @var OnboardingProgressService $onboardingProgress */
        $onboardingProgress = service('onboardingProgressService');

        $referralCode = trim((string) ($request->getPost('referralCode') ?? $request->getPost('referral') ?? ''));
        if ($referralCode === '') {
            $referralCode = (string) ($this->session->get('referral_code') ?? '');
        }

        if ($referralCode !== '') {
            $this->session->set('referral_code', $referralCode);
            service('eventTracker')->track('referral.captured', [
                'source' => 'post',
            ]);
        }

        log_message('info', '[REGISTRATION] Submission received', [
            'email'         => $email,
            'referral_code' => $referralCode ?: null,
            'ip'            => $request->getIPAddress(),
        ]);

        service('eventTracker')->track('auth.register_submit');

        $auditContext = $auditService->notifyRegistrationAttempt($email, $request);

        // Check if registration is allowed
        if (! $this->config->allowRegistration) {
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

            $this->setAuthMessage('danger', lang('Auth.registerDisabled'));
            return redirect()->back()->withInput();
        }

        $users = model(UserModel::class);

        try {
            // Validate basics first since some password rules rely on these fields
            $rules = config('Validation')->registrationRules ?? [
                'username' => 'required|regex_match[/^[A-Za-z0-9 _-]+$/]|min_length[3]|max_length[30]|is_unique[users.username]',
                'email'    => 'required|valid_email|is_unique[users.email]',
            ];

            if (! $this->validate($rules)) {
                $auditService->notifyRegistrationResult($email, 'failed', $request, null, $auditContext + [
                    'error' => json_encode($this->validator->getErrors()),
                ]);
                service('eventTracker')->track('auth.register_fail', [
                    'reason' => 'validation_basic',
                    'summary' => $this->validationSummary($this->validator->getErrors()),
                ]);

                log_message('warning', '[REGISTRATION] Validation failed (basic fields)', [
                    'email'  => $email,
                    'errors' => $this->validator->getErrors(),
                ]);

                $errors = $this->validator->getErrors();
                $this->setAuthMessage('danger', $this->formatValidationErrors($errors));
                return redirect()->back()->withInput()->with('errors', $errors);
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
                $this->setAuthMessage('danger', $this->formatValidationErrors($errors));
                return redirect()->back()->withInput()->with('errors', $errors);
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
                $this->setAuthMessage('danger', $this->formatValidationErrors($errors));
                return redirect()->back()->withInput()->with('errors', $errors);
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
            }

            if ($referralCode !== '') {
                log_message('info', '[REFERRAL] Registration attributed', [
                    'new_user_id'   => $newUserId,
                    'referral_code' => $referralCode,
                ]);
                log_message('info', '[REGISTRATION] Referral applied', [
                    'user_id'       => $newUserId,
                    'email'         => $user->email ?? null,
                    'referral_code' => $referralCode,
                ]);
                service('eventTracker')->track('referral.applied', [
                    'source' => 'register',
                ], $newUserId, 'referral');
            }

            if ($this->config->requireActivation !== null) {
                $activator = service('activator');
                $sent      = $activator->send($user);

                if (! $sent) {
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

                    $this->setAuthMessage('danger', $activator->error() ?? lang('Auth.unknownError'));
                    return redirect()->back()->withInput();
                }

                $auditService->notifyRegistrationResult($email, 'success', $request, null, $auditContext);
                service('eventTracker')->track('auth.activation_email_sent', [], $newUserId);

                log_message('info', '[REGISTRATION] Activation email queued', [
                    'user_id' => $newUserId,
                    'email'   => $user->email ?? null,
                ]);

                log_message('info', 'Registration redirecting to success guide for user_id={id}', ['id' => $newUserId]);

                $this->session->remove('referral_code');

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

            log_message('info', 'Registration redirecting to success guide for user_id={id}', ['id' => $newUserId]);

            $this->session->remove('referral_code');

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
            $auditService->notifyRegistrationResult($email, 'failed', $request, $e, $auditContext);
            service('eventTracker')->track('auth.register_fail', [
                'reason' => 'exception',
            ]);

            log_message('error', '[REGISTRATION] Exception during registration', [
                'email' => $email,
                'error' => $e->getMessage(),
            ]);

            $this->setAuthMessage('danger', lang('Auth.unknownError'));
            return redirect()->back()->withInput();
        }
    }

    public function registerSuccess()
    {
        $this->data = [
            'config'       => $this->config,
            'siteSettings' => config('SiteSettings'),
            'socialMedia'  => config('SocialMedia'),
        ];

        log_message('info', 'AuthController::registerSuccess view rendered.');

        return $this->_render('App\\Views\\Auth\\register_success', $this->data);
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
            log_message('warning', '[ACTIVATION] Activation failed: missing token', [
                'ip' => $this->request->getIPAddress(),
            ]);
            return redirect()->to(site_url('Support/Account'));
        }

        $user = $users->where('activate_hash', $token)->first();

        if (null === $user) {
            log_message('error', '[ACTIVATION] Activation failed: user not found', [
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

        return $this->_render($this->config->views['resendActivation'] ?? 'App\\Views\\Auth\\resend_activation', [
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

        if (! $this->isValidRedirectTarget($redirectURL)) {
            $redirectURL = $this->dashboardUrl();
        }

        // Absolute final guard against loop targets
        if ($this->isRootDestination($redirectURL) || $this->isLoginDestination($redirectURL) || $this->isLogoutDestination($redirectURL)) {
            $redirectURL = $this->dashboardUrl();
        }

        $this->session->remove('redirect_url');

        log_message('debug', 'Auth redirect destination: ' . $redirectURL);

        return $redirectURL;
    }


    private function rememberRedirectUrl(?string $url): void
    {
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

    private function isValidRedirectTarget(?string $url): bool
    {
        if ($url === null || $url === '') {
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

        return $path === $loginPath;
    }

    private function isLogoutDestination(?string $url): bool
    {
        if ($url === null) {
            return false;
        }

        return stripos($url, '/logout') !== false;
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

    protected function _render(string $view, array $data = [])
    {
        return view($view, $data);
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
