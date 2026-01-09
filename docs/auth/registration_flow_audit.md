# Registration + Activation Flow Audit (Myth/Auth)

## Scope
This audit covers the registration and activation flow currently implemented in the CI4 Myth/Auth stack for MyMI Wallet, including routing, controller logic, and redirects.

## Current flow (as implemented)
1. **GET /register** renders the registration form.
   - Route: `app/Config/Routes.php` (`AuthController::register`).
   - View: `app/Views/Auth/register.php`.

2. **POST /register** attempts to create a new user.
   - Controller: `app/Controllers/AuthController.php::attemptRegister()`.
   - Logging:
     - Records audit success/failure in `AuthAuditService`.
     - Emits `Registration created user_id=...` and success redirect logs.

3. **After successful registration** the user is redirected to the new success guide.
   - Redirect: `/register/success`.
   - Controller: `app/Controllers/AuthController.php::registerSuccess()`.
   - View: `app/Views/Auth/register_success.php`.

4. **Activation link** (if activation required)
   - Route: `/activate-account` (`AuthController::activateAccount`).
   - Redirect after activation: `/login` (with `Auth.registerSuccess`).
   - Logging: activation attempts and throttling in `AuthController::activateAccount()`.

5. **Login**
   - Route: `/login` (`AuthController::attemptLogin`).
   - Redirect after login: `/Dashboard` (via `AuthController::redirectAfterLogin`).

## Current redirects
| Event | Redirect | Source |
| --- | --- | --- |
| Registration success (activation required or not) | `/register/success` | `app/Controllers/AuthController.php::attemptRegister()` and `app/Config/Auth.php::$redirects['register']` |
| Activation success | `/login` | `app/Controllers/AuthController.php::activateAccount()` |
| Login success | `/Dashboard` | `app/Controllers/AuthController.php::redirectAfterLogin()` + `app/Config/Auth.php` |
| Logout | `/` | `app/Config/Auth.php::$redirects['logout']` |

## Proposed redirect plan
**Goal:** Standardize the onboarding path and keep activation friction low.

1. **Register → Success guide**
   - Keep `POST /register` redirecting to `GET /register/success`.
   - Success page explains email verification and next steps.

2. **Activation → Login**
   - Keep activation redirect to `/login` so the user can authenticate immediately.

3. **Login → Dashboard (with onboarding modal)**
   - Keep landing on `/Dashboard`, while automatically opening the onboarding modal on first verified login.

## File paths touched / reviewed
- Routing: `app/Config/Routes.php`
- Auth config: `app/Config/Auth.php`
- Auth controller: `app/Controllers/AuthController.php`
- Registration view: `app/Views/Auth/register.php`
- Registration success view: `app/Views/Auth/register_success.php`

## Code placement notes
- **Registration redirect + onboarding record creation**: `AuthController::attemptRegister()` now creates the onboarding record and redirects to `/register/success` before returning.
- **Success page**: `AuthController::registerSuccess()` renders `App\\Views\\Auth\\register_success` and logs each render.
- **Resend verification email**: `AuthController::resendRegistrationActivation()` uses a rate-limited POST endpoint (`/register/resend-activation`) with generic responses.
- **Activation**: remains in `AuthController::activateAccount()` with throttling and redirect to `/login`.

## Logging expectations
Each transition is logged in the controller layer:
- Registration success/failure (and redirect) in `AuthController::attemptRegister()`.
- Success page render in `AuthController::registerSuccess()`.
- Activation resend requests in `AuthController::resendRegistrationActivation()`.
- Activation attempt logging remains in `AuthController::activateAccount()`.
