<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Session\Session;
use Myth\Auth\Config\Auth as AuthConfig;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;

class AuthController extends Controller
{
    protected $auth;

    /**
     * @var AuthConfig
     */
    protected $config;

    /**
     * @var Session
     */
    protected $session;

    public function __construct()
    {
        // Most services in this controller require
        // the session to be started - so fire it up!
        $this->session = service('session');

        $this->config = config('Auth');
        $this->auth   = service('authentication');
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

        if (! $this->session->has('redirect_url')) {
            $this->rememberRedirectUrl(previous_url());
        }

        return $this->_render($this->config->views['login'], ['config' => $this->config]);
    }

    /**
     * Attempts to verify the user's credentials
     * through a POST request.
     */
    public function attemptLogin()
    {
        helper('auth');

        $rules = [
            'login'    => 'required',
            'password' => 'required',
        ];

        if ($this->config->validFields === ['email']) {
            $rules['login'] .= '|valid_email';
        }

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $login    = $this->request->getPost('login');
        $password = $this->request->getPost('password');
        $remember = (bool) $this->request->getPost('remember');

        log_message(
            'debug',
            sprintf(
                'Auth attemptLogin() called with login identifier: %s, remember: %s',
                $login ?? 'N/A',
                $remember ? 'true' : 'false'
            )
        );

        $this->rememberRedirectUrl($this->request->getPost('redirect_url'));
        $this->rememberRedirectUrl($this->request->getPost('next'));

        log_message('debug', 'Auth attemptLogin() called. redirect_url in session: ' . (session('redirect_url') ?? 'none'));

        $type        = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $credentials = [
            $type      => $login,
            'password' => $password,
        ];

        log_message('debug', sprintf('Auth credentials normalised for attempt using key "%s"', $type));

        if (! $this->auth->attempt($credentials, $remember)) {
            log_message('debug', 'Auth attempt failed. Errors: ' . json_encode($this->auth->errors() ?? []));
            $errors = $this->auth->errors() ?? [];
            log_message(
                'debug',
                sprintf(
                    'Auth attempt failed for identifier %s. Errors: %s',
                    $login ?? 'N/A',
                    json_encode($errors)
                )
            );

            if ($errors === []) {
                $errors = [$this->auth->error() ?? lang('Auth.badAttempt')];
            }

            return redirect()->back()
                ->withInput()
                ->with('error', $this->auth->error() ?? lang('Auth.badAttempt'))
                ->with('errors', $errors);
        }

        // ✅ SUCCESS: secure the user identity for the rest of the app
        $loggedIn = function_exists('logged_in') ? logged_in() : $this->auth->check();
        $userId   = null;

        if (function_exists('user_id')) {
            $userId = user_id();
        } elseif ($this->auth->user()) {
            $userId = $this->auth->user()->id ?? null;
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

        // 🔐 CRITICAL: expose the user ID in the session for cuID resolution
        if ($userId !== null && $userId > 0) {
            $this->session->set('user_id', (int) $userId);

            // Optional but often handy:
            $user = $this->auth->user();
            if ($user) {
                $this->session->set('user_email', $user->email ?? null);
                $this->session->set('username', $user->username ?? null);
            }

            log_message('debug', 'Auth attemptLogin() - session user_id set to: ' . $userId);
        } else {
            log_message('error', 'Auth attemptLogin() - login succeeded but userId could not be resolved.');
        }

        if ($this->auth->user()->force_pass_reset === true) {
            return redirect()
                ->to(route_to('reset-password') . '?token=' . $this->auth->user()->reset_hash)
                ->withCookies();
        }

        return $this->redirectAfterLogin()
            ->withCookies()
            ->with('message', lang('Auth.loginSuccess'));
    }


    /**
     * Log the user out.
     */
    public function logout()
    {
        if ($this->auth->check()) {
            $this->auth->logout();
        }

        return redirect()->to(site_url('/'));
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
            return redirect()->back()
                ->withInput()
                ->with('error', lang('Auth.registerDisabled'));
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
    public function attemptRegister()
    {
        // Check if registration is allowed
        if (! $this->config->allowRegistration) {
            return redirect()->back()->withInput()->with('error', lang('Auth.registerDisabled'));
        }

        $users = model(UserModel::class);

        // Validate basics first since some password rules rely on these fields
        $rules = config('Validation')->registrationRules ?? [
            'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Validate passwords since they can only be validated properly here
        $rules = [
            'password'     => 'required|strong_password',
            'pass_confirm' => 'required|matches[password]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Save the user
        $allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);
        $user              = new User($this->request->getPost($allowedPostFields));

        $this->config->requireActivation === null ? $user->activate() : $user->generateActivateHash();

        // Ensure default group gets assigned if set
        if (! empty($this->config->defaultUserGroup)) {
            $users = $users->withGroup($this->config->defaultUserGroup);
        }

        if (! $users->save($user)) {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        if ($this->config->requireActivation !== null) {
            $activator = service('activator');
            $sent      = $activator->send($user);

            if (! $sent) {
                return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
            }

            // Success!
            return redirect()->route('login')->with('message', lang('Auth.activationSuccess'));
        }

        // Success!
        return redirect()->route('login')->with('message', lang('Auth.registerSuccess'));
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
            return redirect()->route('login')->with('error', lang('Auth.forgotDisabled'));
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
            return redirect()->route('login')->with('error', lang('Auth.forgotDisabled'));
        }

        $rules = [
            'email' => [
                'label' => lang('Auth.emailAddress'),
                'rules' => 'required|valid_email',
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $users = model(UserModel::class);

        $user = $users->where('email', $this->request->getPost('email'))->first();

        if (null === $user) {
            return redirect()->back()->with('error', lang('Auth.forgotNoUser'));
        }

        // Save the reset hash /
        $user->generateResetHash();
        $users->save($user);

        $resetter = service('resetter');
        $sent     = $resetter->send($user);

        if (! $sent) {
            return redirect()->back()->withInput()->with('error', $resetter->error() ?? lang('Auth.unknownError'));
        }

        return redirect()->route('reset-password')->with('message', lang('Auth.forgotEmailSent'));
    }

    /**
     * Displays the Reset Password form.
     */
    public function resetPassword()
    {
        if ($this->config->activeResetter === null) {
            return redirect()->route('login')->with('error', lang('Auth.forgotDisabled'));
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
            return redirect()->route('login')->with('error', lang('Auth.forgotDisabled'));
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
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $user = $users->where('email', $this->request->getPost('email'))
            ->where('reset_hash', $this->request->getPost('token'))
            ->first();

        if (null === $user) {
            return redirect()->back()->with('error', lang('Auth.forgotNoUser'));
        }

        // Reset token still valid?
        if (! empty($user->reset_expires) && time() > $user->reset_expires->getTimestamp()) {
            return redirect()->back()->withInput()->with('error', lang('Auth.resetTokenExpired'));
        }

        // Success! Save the new password, and cleanup the reset hash.
        $user->password         = $this->request->getPost('password');
        $user->reset_hash       = null;
        $user->reset_at         = date('Y-m-d H:i:s');
        $user->reset_expires    = null;
        $user->force_pass_reset = false;
        $users->save($user);

        return redirect()->route('login')->with('message', lang('Auth.resetSuccess'));
    }

    /**
     * Activate account.
     *
     * @return mixed
     */
    public function activateAccount()
    {
        $users = model(UserModel::class);

        // First things first - log the activation attempt.
        $users->logActivationAttempt(
            $this->request->getGet('token'),
            $this->request->getIPAddress(),
            (string) $this->request->getUserAgent()
        );

        $throttler = service('throttler');

        if ($throttler->check(md5($this->request->getIPAddress()), 2, MINUTE) === false) {
            return service('response')->setStatusCode(429)->setBody(lang('Auth.tooManyRequests', [$throttler->getTokentime()]));
        }

        $user = $users->where('activate_hash', $this->request->getGet('token'))
            ->where('active', 0)
            ->first();

        if (null === $user) {
            return redirect()->route('login')->with('error', lang('Auth.activationNoUser'));
        }

        $user->activate();

        $users->save($user);

        return redirect()->route('login')->with('message', lang('Auth.registerSuccess'));
    }

    /**
     * Resend activation account.
     *
     * @return mixed
     */
    public function resendActivateAccount()
    {
        if ($this->config->requireActivation === null) {
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
            return redirect()->route('login')->with('error', lang('Auth.activationNoUser'));
        }

        $activator = service('activator');
        $sent      = $activator->send($user);

        if (! $sent) {
            return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
        }

        // Success!
        return redirect()->route('login')->with('message', lang('Auth.activationSuccess'));
    }

    private function redirectAfterLogin(): RedirectResponse
    {
        $destination = $this->determineRedirectDestination();

        return redirect()->to($destination);
    }

    private function determineRedirectDestination(): string
    {
        $redirectURL = $this->session->get('redirect_url');

        if (! $this->isValidRedirectTarget($redirectURL)) {
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

        if ($this->isRootDestination($url) || $this->isLoginDestination($url)) {
            return false;
        }

        return true;
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
}
