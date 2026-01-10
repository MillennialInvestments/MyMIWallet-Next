# Auth & Account Health Tests

This module focuses on authentication, account lifecycle, and session safety. Refer to `docs/health/health_test_checklist.md` for the full prioritized list.

✅ Health Test: `php spark auth:health-registration`
Priority: P0
Feature: Registration & onboarding bootstrap
Primary Entry Point(s):
- `app/Controllers/AuthController.php::attemptRegister()`
- `app/Models/UserModel.php::_provisionDefaultSolana()`
Dependencies:
- DB: `users`, `bf_role_user`
- Services: `AuthAuditService`, `OnboardingProgressService`
- Email: activation via `service('activator')`
What it should verify (checklist):
- Step 1: Validate registration rules for a test payload.
- Step 2: Insert user and verify default group assignment.
- Step 3: Ensure onboarding record exists.
What it should log: user_id, email hash, activation required flag.
Failure modes to detect: validation errors, insert failures, activation email failures.
Where to implement: `app/Commands/AuthRegistrationHealth.php` (new).
Suggested command name: `auth:health-registration`
Expected log file: `writable/logs/health_auth.log`

✅ Health Test: `php spark auth:health-activation`
Priority: P0
Feature: Activation / verification
Primary Entry Point(s):
- `app/Controllers/AuthController.php::activateAccount()`
- `app/Controllers/AuthController.php::resendRegistrationActivation()`
Dependencies:
- DB: `users`
- Email: activation email dispatch
What it should verify (checklist):
- Step 1: Activate a known inactive user.
- Step 2: Confirm `users.active` changes.
- Step 3: Resend activation email and confirm no errors.
What it should log: activation outcome, resend outcome.
Failure modes to detect: missing activation hash, mail send failures.
Where to implement: `app/Commands/AuthActivationHealth.php` (new).
Suggested command name: `auth:health-activation`
Expected log file: `writable/logs/health_auth.log`

✅ Health Test: `php spark auth:health-login`
Priority: P0
Feature: Login + session setup
Primary Entry Point(s):
- `app/Controllers/AuthController.php::attemptLogin()`
Dependencies:
- DB: `users`
- Session: CodeIgniter session service
What it should verify (checklist):
- Step 1: Login with a test user.
- Step 2: Validate `session('user_id')` and `logged_in()`.
- Step 3: Confirm onboarding login mark is invoked.
What it should log: login identifier, session flags.
Failure modes to detect: invalid credentials, missing session data.
Where to implement: `app/Commands/AuthLoginHealth.php` (new).
Suggested command name: `auth:health-login`
Expected log file: `writable/logs/health_auth.log`

✅ Health Test: `php spark auth:health-password-reset`
Priority: P1
Feature: Password reset flow
Primary Entry Point(s):
- `app/Controllers/AuthController.php::attemptForgot()`
- `app/Controllers/AuthController.php::attemptReset()`
- `app/Models/UserModel.php::logResetAttempt()`
Dependencies:
- DB: `users`, `bf_password_reset_attempts`
What it should verify (checklist):
- Step 1: Generate reset token.
- Step 2: Verify reset attempt logged.
- Step 3: Apply reset and validate password hash change.
What it should log: reset token creation, result status.
Failure modes to detect: token not stored, reset failures.
Where to implement: `app/Commands/AuthPasswordResetHealth.php` (new).
Suggested command name: `auth:health-password-reset`
Expected log file: `writable/logs/health_auth.log`

✅ Health Test: `php spark auth:health-sessions`
Priority: P1
Feature: Session persistence + revoke flow
Primary Entry Point(s):
- `app/Modules/User/Controllers/AccountController.php::sessions()`
- `app/Modules/User/Controllers/AccountController.php::revokeSession()`
- `app/Models/UserSessionModel.php::isRevoked()`
Dependencies:
- DB: `bf_user_sessions`
What it should verify (checklist):
- Step 1: List sessions for a user.
- Step 2: Revoke session and confirm `revoked` flag.
What it should log: session_id, revoke status.
Failure modes to detect: missing session rows, revoke failures.
Where to implement: `app/Commands/AuthSessionHealth.php` (new).
Suggested command name: `auth:health-sessions`
Expected log file: `writable/logs/health_auth.log`

✅ Health Test: `php spark auth:health-permissions`
Priority: P1
Feature: Role/permission integrity
Primary Entry Point(s):
- `app/Models/RoleModel.php`
- `app/Models/PermissionModel.php`
- `app/Models/RoleUserModel.php`
- `app/Models/PermissionRoleModel.php`
Dependencies:
- DB: `bf_roles`, `bf_permissions`, `bf_role_user`, `bf_permission_role`
What it should verify (checklist):
- Step 1: Fetch role/permission by slug.
- Step 2: Validate role-user and permission-role joins.
What it should log: role slug, permission slug, join counts.
Failure modes to detect: missing slugs, broken joins.
Where to implement: `app/Commands/AuthPermissionHealth.php` (new).
Suggested command name: `auth:health-permissions`
Expected log file: `writable/logs/health_auth.log`

✅ Health Test: `php spark auth:health-spam-check`
Priority: P2
Feature: Spam/suspicious account detection
Primary Entry Point(s):
- `app/Libraries/MyMIUser.php::findPotentialSpamUsers()`
- `app/Modules/APIs/Controllers/ManagementController.php::checkForSpamUsers()`
Dependencies:
- DB: `users`
What it should verify (checklist):
- Step 1: Run spam detection and collect results.
- Step 2: Validate response payload shape.
What it should log: flagged count, sample IDs (masked).
Failure modes to detect: scan errors, empty responses.
Where to implement: `app/Commands/AuthSpamHealth.php` (new).
Suggested command name: `auth:health-spam-check`
Expected log file: `writable/logs/health_auth.log`
