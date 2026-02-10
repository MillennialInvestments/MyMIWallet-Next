# Auth Flow Hardening

## What changed

- Added `App\Filters\NoCacheFilter` and registered it as `no-cache`.
- Applied the `no-cache` filter to auth/login route group so login/logout and related auth endpoints always return no-cache headers.
- Removed direct response header mutations from `AuthController` login/logout methods to centralize cache behavior in the filter.
- Hardened redirect destination logic in `AuthController::determineRedirectDestination()` to force fallback to `/Dashboard` when redirect URLs resolve to root, login, or logout loops.
- Added consistent auth flash rendering for `auth_message` in:
  - `app/Views/Auth/login.php`
  - `app/Views/Auth/register.php`
  - `app/Views/Auth/forgot.php`
  - `app/Views/Auth/reset.php`
  - `app/Views/Auth/activate.php`

## Filters configuration

- `app/Config/Filters.php`
  - Alias: `'no-cache' => \App\Filters\NoCacheFilter::class`
  - Route filter mapping under `$filters['no-cache']['after']` includes login/auth paths.
  - Added explicit `login` before-filter mapping for core authenticated paths such as `Dashboard/*`, `Budget/*`, `Investments/*`, `Wallets/*`.

## Manual verification checklist

1. Open `/login`, authenticate, and confirm redirect to `/Dashboard`.
2. Use browser devtools on `/login` and verify response headers:
   - `Cache-Control: no-store, no-cache, must-revalidate, max-age=0`
   - `Pragma: no-cache`
   - `Expires: 0`
3. While logged in, open `/login` and confirm immediate redirect to `/Dashboard`.
4. Attempt invalid credentials and confirm you remain in auth flow with an `auth_message` error alert.
