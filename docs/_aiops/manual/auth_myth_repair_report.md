# Myth/Auth Repair Report (CI4.7)

## Root causes
- `CI_ENVIRONMENT` was missing from local runtime, causing inconsistent CLI/service behavior.
- Password hashing drift existed between multiple helpers and auth code paths.
- Email rendering could crash when a null/empty view path reached `view()`.

## Files changed
- `.env` (local-only, not tracked)
- `app/Entities/User.php`
- `app/Config/Auth.php`
- `app/Helpers/email_helper.php`
- `app/Helpers/CryptoHelper.php`
- `app/Libraries/MyMISecurity.php`
- `app/Services/Spark/AuthAuditRunner.php`
- `app/Views/emails/auth/activation.php`
- `app/Views/emails/auth/reset.php`

## Verification output
Run sequence:
1. `php spark cache:clear`
2. `php spark logs:test`
3. `php spark auth:audit`

See command output captured in this change request for current environment status.

## Regression prevention rules
- User authentication passwords must only be set through `App\Entities\User::setPassword()` using `password_hash(..., PASSWORD_DEFAULT)`.
- Crypto helpers (`crypto_hash_password`, `MyMISecurity::hashPassword`) are for non-auth secrets only.
- Email templates must be rendered through `safe_email_view()` (via `render_email_view()`) to prevent null-view crashes.
- Keep explicit auth view mappings (`email_activation`, `email_reset`) in `Config\Auth`.
