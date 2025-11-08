# Phase 4 — Controller Takeover Design
- **Timestamp:** 2025-10-09 19:00 UTC
- **Environment:** DreamHost VPS (Nginx, PHP 8.2, MySQL)

## Exposed Methods & Myth/Auth Dependencies
| Method | Purpose | Key Service Calls | Notes |
| --- | --- | --- | --- |
| `login()` | Render login form | Inherited `parent::login()` → `service('authentication')` | Adds marketing banner via `$this->viewData` |
| `attemptLogin()` | Validate credentials | Parent handles validation/auth; App override currently logs additional info in vendor base | Routes explicitly wired |
| `logout()` | End session | `service('authentication')->logout()` | GET/POST accessible |
| `register()` | Render registration form | Parent uses `Config\\Auth::$views['register']` | Referral detection handled in view |
| `attemptRegister()` | Create new user | `model(Myth\\Auth\\Models\\UserModel::class)`, validators | Provided by parent; App routes call parent implementation |
| `resendActivation()` | Display resend form | Parent `_render()` with `Auth/resend_activation` | Newly routed to App controller |
| `resendActivationCode()` | Trigger resend email | `service('activator')->send()` via parent logic | POST guarded by CSRF |
| `activateAccount()` | Activate user | `model(UserModel::class)`, `service('throttler')` | Handles GET token and POST payload |
| `forgotPassword()` | Render reset request | Parent view logic | |
| `attemptForgot()` | Issue reset token | `service('resetter')` | |
| `resetPassword()` | Render reset form | Parent view logic | |
| `attemptReset()` | Apply password change | `model(UserModel::class)` | |
| `get2FAQRCode()` | Provision 2FA | **Current stub** returns static JSON | Needs integration with Myth/Auth TOTP services |
| `verify2FACode()` | Validate TOTP | **Current stub** returns success | Must call Myth/Auth TOTP validator |
| `redirectToProvider($provider)` | Social redirect | `Hybridauth`, `Config\\Hybridauth`, `HybridSession` | Returns redirect to callback route |
| `handleProviderCallback($provider)` | Social callback | `Hybridauth`, `service('authentication')`, `db_connect()` | Creates/links user and logs in |
| `linkProvider($provider)` | Link provider to account | Requires `auth()->user()`, `Hybridauth` | Persists to `auth_identities` |
| `unlinkProvider($provider)` | Remove link | `db_connect()->table('auth_identities')->delete()` | Returns flash message |
| `linkRobinhood()` / `linkSnapTrade()` | Placeholder API hooks | Return JSON stubs | Expand when provider integrations ready |
| `createTempUser()` | Test helper | `model(UserModel::class)->save()` | Creates active user with random credentials |

## View Contracts
| Flow | View | Expected Data |
| --- | --- | --- |
| Login | `Auth/login` | `config`, `errors`, `old('login')`, CSRF token, `marketingBanner` (from controller) |
| Register | `Auth/register` → `register_form` | `uri`, `siteSettings`, `socialMedia`, `referralPlatform`, `referralLink`, `referralCode`; CSRF token generated via helper |
| Forgot Password | `Auth/forgot` | `config`, CSRF token, validation errors |
| Reset Password | `Auth/reset` | `config`, `hash` token, CSRF token |
| Resend Activation | `Auth/resend_activation` | `config`, `errors`, CSRF token |
| 2FA Provisioning | JSON response currently; future view should provide `qr`, `secret`, `backupCodes` |
| OAuth Callback | No dedicated view; redirects with flash `message`/`error` |

## Flash Messaging Strategy
- Controller relies on parent Myth/Auth methods which use `session()->setFlashdata('message'|'error')`. DashLite theme reads from `Auth/_message_block` partial (already included in login/register views).
- Social linking/unlinking uses `redirect()->back()->with('message', ...)`. Ensure layout renders `session('message')` consistently.

## Outstanding Work
1. Replace 2FA stubs with calls to Myth/Auth TOTP service or dedicated `TwoFactorAuth` library, ensuring secrets stored in `bf_user_2fa` using configured encryption key.
2. Harden `createTempUser()` behind feature flags or remove in production.
3. Ensure vendor base controller (`myth/auth/src/Controllers/AuthController`) does not diverge from upstream requirements; consider re-namespacing custom logic into App layer to avoid vendor drift.
