# Auth Migration: Myth/Auth to Shield

This project now supports a staged migration from Myth/Auth to CodeIgniter Shield.

## Toggle Strategy

Use `app/Config/Auth.php`:

- `public bool $useShield = false;` → use **Myth/Auth** (current production behavior)
- `public bool $useShield = true;` → use **Shield** through the service override

`app/Config/Services.php` now routes `service('authentication')` to either:

- `\Myth\Auth\Config\Services::authentication(false)` when `useShield=false`
- `\CodeIgniter\Shield\Config\Services::auth(false)` when `useShield=true`

## Folder Structure

### Active implementation

- `app/Controllers/AuthController.php`
- `app/Models/UserModel.php`
- `app/Entities/User.php`
- `app/Authentication/*`

### Archived Myth/Auth snapshot

- `app/Legacy/Auth/Controllers/AuthController.php`
- `app/Legacy/Auth/Models/UserModel.php`
- `app/Legacy/Auth/Entities/User.php`
- `app/Legacy/Auth/Authentication/Activators/EmailActivator.php`
- `app/Legacy/Auth/Authentication/Resetters/EmailResetter.php`
- `app/Legacy/Auth/Config/Auth.php`

All archived classes were moved under `App\Legacy\Auth\...` namespaces so they do not conflict with active runtime classes.

## Shield Test Routes

Parallel routes were added so Shield can be tested safely:

- `GET /login-shield`
- `POST /login-shield`
- `GET /register-shield`
- `POST /register-shield`

Controllers:

- `app/Controllers/ShieldAuth/Login.php`
- `app/Controllers/ShieldAuth/Register.php`

## Unified `user_id()` Helper

`app/Helpers/auth_helper.php` now resolves the current user id in this order:

1. `auth()->user()->id` (Shield)
2. `service('authentication')->id()` (Myth/Auth)
3. `session('user_id')` fallback

This prevents `undefined method id()` errors during mixed-mode migration.

## Composer + Setup Commands

Run these commands in an environment with Packagist access:

```bash
composer remove myth/auth
composer require codeigniter4/shield
composer require codeigniter4/settings
composer require deployed/myth-to-shield
php spark shield:setup
```

In this environment, the `require` commands failed with a network `curl error 56` (HTTP 403 tunnel) while fetching Packagist metadata.
