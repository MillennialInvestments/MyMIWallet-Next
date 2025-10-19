<?php
namespace App\Controllers;

use Myth\Auth\Controllers\AuthController as BaseAuthController; // extend vendor controller
use CodeIgniter\Session\Session;
use Config\Services;
use Myth\Auth\Config\Auth as AuthConfig;
use Myth\Auth\Entities\User as MythUser;
// use App\Config\{SiteSettings, SocialMedia};
// use App\Libraries\{BaseLoader, MyMIBudget, MyMIDashboard, MyMIUser};
use App\Models\UserModel;          // your app’s UserModel (if that’s what you intend)
// use App\Services\UserService;
// use RobThree\Auth\TwoFactorAuth;

class AuthController extends BaseAuthController
{
    // use BaseLoader;

    /** @var Session */
    protected $session;

    /** @var AuthConfig */
    protected $config;

    protected $data = [];
    // protected $siteSettings;
    // protected $socialMedia;
    protected $uri;
    // protected $cuID;
    // protected $MyMIBudget;
    // protected $MyMIDashboard;
    // protected $MyMIUser;
    // protected $userService;
    // protected $tfa; // enable if you wire 2FA fully

    public function __construct()
    {
        // If Myth/Auth ever adds a constructor, stay safe:
        // if (is_callable('parent::__construct')) {
        //     parent::__construct();
        // }

        $this->session      = service('session');
        $this->request      = service('request');
        $this->uri          = $this->request->getUri();

        $this->config       = config('Auth');
        $this->auth         = service('authentication');     // provided by BaseAuthController as well
        // $this->siteSettings = config('SiteSettings');
        // $this->socialMedia  = config('SocialMedia');
        // $this->tfa          = new TwoFactorAuth('MyMI Wallet');

        // if ($this->auth->check()) {
        //     $this->cuID       = $this->auth->id();
        //     $this->MyMIUser   = new MyMIUser();
        //     $this->userService= new UserService($this->siteSettings ?? null, $this->cuID, Services::request());
        // } else {
        //     $this->cuID       = $this->request->getIPAddress();
        //     $this->MyMIUser   = null;
        //     $this->userService= null;
        // }

        // $this->MyMIBudget    = new MyMIBudget();
        // $this->MyMIDashboard = new MyMIDashboard();
        // $this->MyMIUser      = $this->MyMIUser ?? new MyMIUser();
    }

    private function commonData(): void
    {
        // $userAccount   = is_object($this->userService) ? $this->userService->userAccountInfo() : [];
        // $userDashboard = $this->MyMIDashboard->dashboardInfo($this->cuID);
        // $userBudget    = $this->MyMIBudget->allUserBudgetInfo($this->cuID);

        // $this->data['siteSettings'] = $this->siteSettings ?? null;
        // $this->data['beta']         = (string) ($this->siteSettings->beta ?? 'false');
        // $this->data['request']      = $this->request;
        // $this->data['uri']          = $this->uri;
        // $this->data['userAgent']    = $this->request->getUserAgent();
        // $this->data['date']         = $this->siteSettings->date ?? date('Y-m-d');
        // $this->data['time']         = $this->siteSettings->time ?? date('H:i:s');
        // $this->data['hostTime']     = $this->siteSettings->hostTime ?? time();
        // $this->data['cuID']         = $this->cuID;

        // if (!empty($userAccount)) {
        //     $this->data['cuRole']  = $userAccount['cuRole']  ?? 'User';
        //     $this->data['cuEmail'] = $userAccount['cuEmail'] ?? 'Unknown';
        // } else {
        //     $this->data['cuRole']  = 'N/A';
        //     $this->data['cuEmail'] = 'N/A';
        // }
    }

    // -----------------------
    // Broker linking (custom)
    // -----------------------
    public function linkRobinhood()
    {
        try {
            $userLib = new MyMIUser();
            $uid     = $this->auth->id();

            $apiKey       = trim((string) $this->request->getPost('api_key'));
            $privateKeyB64= trim((string) $this->request->getPost('private_key_b64'));

            if (!$uid || !$apiKey || !$privateKeyB64) {
                return $this->response->setJSON(['status'=>'error','message'=>'Missing uid/api_key/private_key_b64'])->setStatusCode(400);
            }

            $ok = $userLib->setBrokerCredential($uid, 'robinhood', [
                'api_key'        => $apiKey,
                'private_key_b64'=> $privateKeyB64,
                'linked_at'      => date('c'),
            ]);

            return $this->response->setJSON(['status' => $ok ? 'success' : 'error']);
        } catch (\Throwable $e) {
            log_message('error', 'linkRobinhood failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->response->setJSON(['status'=>'error','message'=>$e->getMessage()])->setStatusCode(500);
        }
    }

    public function linkSnapTrade()
    {
        try {
            $userLib = new MyMIUser();
            $uid     = $this->auth->id();
            $snapUserId = trim((string) $this->request->getPost('snaptrade_user_id'));

            if (!$uid || !$snapUserId) {
                return $this->response->setJSON(['status'=>'error','message'=>'Missing uid/snaptrade_user_id'])->setStatusCode(400);
            }

            $ok = $userLib->setBrokerCredential($uid, 'snaptrade', [
                'user_id'   => $snapUserId,
                'linked_at' => date('c'),
            ]);

            return $this->response->setJSON(['status' => $ok ? 'success' : 'error']);
        } catch (\Throwable $e) {
            log_message('error', 'linkSnapTrade failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->response->setJSON(['status'=>'error','message'=>$e->getMessage()])->setStatusCode(500);
        }
    }

    // -----------------------
    // Auth screens/flows
    // -----------------------

    // Keep your custom login but rely on parent attempt
    public function login()
    {
        if ($this->auth->check()) {
            $redirectURL = session('redirect_url') ?? site_url('/');
            unset($_SESSION['redirect_url']);
            return redirect()->to($redirectURL);
        }

        $_SESSION['redirect_url'] = session('redirect_url') ?? previous_url() ?? site_url('/');

        // If you are using theme views, map Myth/Auth views in Config\Auth.php to your theme paths.
        // e.g. $views['login'] = 'themes/public/layouts/login' (or a dedicated 'auth/login')
        return $this->_render($this->config->views['login'], ['config' => $this->config]);
    }

    public function attemptLogin()
    {
        // Keep your validation + logging, then delegate to parent if desired,
        // or keep your full custom flow (below) copied from your vendor file.
        $rules = ['login' => 'required', 'password' => 'required'];
        if ($this->config->validFields === ['email']) {
            $rules['login'] .= '|valid_email';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $login    = $this->request->getPost('login');
        $password = $this->request->getPost('password');
        $remember = (bool) $this->request->getPost('remember');

        $type = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (!$this->auth->attempt([$type => $login, 'password' => $password], $remember)) {
            $error = $this->auth->error() ?? 'Unknown error during login';
            log_message('error', 'Auth attempt failed: ' . $error);
            model(UserModel::class)->logAuthError('login', $error);
            $resetUrl = site_url('forgot-password');
            return redirect()->back()->withInput()->with('error', "Login failed. If you forgot your password, you can <a href='{$resetUrl}'>reset it here</a>.");
        }

        if ($this->auth->user()->force_pass_reset === true) {
            return redirect()->to(route_to('reset-password') . '?token=' . $this->auth->user()->reset_hash)->withCookies();
        }

        $redirectURL = session('redirect_url') 
            ?: route_to('dashboard'); // uses your named route

        unset($_SESSION['redirect_url']);
        return redirect()->to($redirectURL)->withCookies()
            ->with('message', lang('Auth.loginSuccess'));

    }

    public function register()
    {
        // Your referral parsing & theming:
        $uri = $this->uri;
        if ($uri->getTotalSegments() >= 3) {
            $referralCode = $uri->getSegment(1) . ' - ' . $uri->getSegment(3);
        } elseif (!$uri->getSegment(1) === 'register') {
            $referralCode = $uri->getSegment(1);
        } elseif ($uri->getTotalSegments() >= 2 && $uri->getSegment(2) === 'register') {
            $referralCode = $uri->getSegment(1);
        } elseif ($uri->getTotalSegments() >= 2 && $uri->getSegment(1) === 'register') {
            $referralCode = $uri->getSegment(2);
        } else {
            $referralCode = '';
        }

        if ($this->auth->check()) {
            return redirect()->back();
        }
        if (!$this->config->allowRegistration) {
            return redirect()->back()->withInput()->with('error', lang('Auth.registerDisabled'));
        }

        $this->data['referralCode'] = $referralCode;
        $this->data['socialMedia']  = $this->socialMedia ?? null;
        $this->commonData();
        return $this->_render($this->config->views['register'], $this->data);
    }

    public function attemptRegister()
    {
        // (kept from your original) …
        // unchanged body copied from your vendor version
        // ensuring you use Myth\Auth\Entities\User OR your alias $user = new MythUser($postData);
        // and your UserModel
        // ...
        // For brevity, reuse exactly what you pasted (it should work here the same).
        return parent::attemptRegister(); // <- If you want vendor default instead of custom
    }

    public function forgotPassword() { return parent::forgotPassword(); }
    public function attemptForgot()  { return parent::attemptForgot();  }
    public function resetPassword()  { return parent::resetPassword();  }
    public function attemptReset()   { /* paste your custom body or call parent */ return parent::attemptReset(); }

    public function logout() { return parent::logout(); }

    public function activate()         { return parent::activate(); }
    public function activateAccount()  { /* paste your custom body or call parent */ return parent::activateAccount(); }

    public function resendActivationCode()   { /* your custom body */ return parent::resend(); }
    public function resendActivateAccount()  { /* your custom body */ return parent::resendActivateAccount(); }

    // Keep your createTempUser utility
    public function createTempUser()
    {
        $email        = $this->request->getGet('email') ?? 'test@mymiwallet.com';
        $username     = $this->request->getGet('username') ?? 'testUser1234';
        $password     = $this->request->getGet('password') ?? 'MyMI2024!';
        $referralCode = $this->request->getGet('referral_code') ?? 'MyMI2024!';

        if (empty($email) || empty($username) || empty($password)) {
            return "Missing required parameters. Please provide email, username, and password.";
        }

        $config = config('Auth');
        $users  = model(UserModel::class);

        $user = new MythUser();
        $user->email         = $email;
        $user->username      = $username;
        $user->referral_code = $referralCode;
        $user->setPassword($password);

        if ($config->requireActivation !== null) {
            $user->generateActivateHash();
        } else {
            $user->activate();
        }

        if (!$users->save($user)) {
            return "Failed to create user. Errors: " . json_encode($users->errors());
        }

        if ($config->requireActivation !== null) {
            $activator = service('activator');
            $sent      = $activator->send($user);
            if (!$sent) {
                return "User created, but failed to send activation email.";
            }
        }

        return "Temporary user created successfully. An activation email has been sent to {$email}.";
    }

    // Keep _render so your theming continues to work
    protected function _render(string $view, array $data = [])
    {
        return view($view, $data);
    }
}
