# STATEFUL_PUBLIC Review Routes

- Total routes: 16

| Method | Route | Handler | Class | Status | Recommended GT-001C Action |
|---|---|---|---|---|---|
| POST | `resend-activation` | `\App\Controllers\AuthController::resendActivationCode` | STATEFUL_PUBLIC | REVIEW_REQUIRED | owner_review_before_launch |
| POST | `login` | `\App\Controllers\AuthController::attemptLogin` | STATEFUL_PUBLIC | REVIEW_REQUIRED | owner_review_before_launch |
| POST | `logout` | `\App\Controllers\AuthController::logout` | STATEFUL_PUBLIC | REVIEW_REQUIRED | owner_review_before_launch |
| POST | `register` | `\App\Controllers\AuthController::attemptRegister` | STATEFUL_PUBLIC | REVIEW_REQUIRED | owner_review_before_launch |
| POST | `login-shield` | `\App\Controllers\ShieldAuth\Login::attempt` | STATEFUL_PUBLIC | REVIEW_REQUIRED | owner_review_before_launch |
| POST | `register-shield` | `\App\Controllers\ShieldAuth\Register::attempt` | STATEFUL_PUBLIC | REVIEW_REQUIRED | owner_review_before_launch |
| POST | `Discord/register` | `\App\Controllers\AuthController::attemptRegister` | STATEFUL_PUBLIC | REVIEW_REQUIRED | owner_review_before_launch |
| POST | `Discord/register/([^/]+)` | `\App\Controllers\AuthController::attemptRegister` | STATEFUL_PUBLIC | REVIEW_REQUIRED | owner_review_before_launch |
| POST | `activate-account` | `\App\Controllers\AuthController::activateAccount` | STATEFUL_PUBLIC | REVIEW_REQUIRED | owner_review_before_launch |
| POST | `reset-password` | `\App\Controllers\AuthController::attemptReset` | STATEFUL_PUBLIC | REVIEW_REQUIRED | owner_review_before_launch |
| POST | `API/v1/Status` | `\App\Modules\APIs\Controllers\APIController::status` | STATEFUL_PUBLIC | MISSING_GUARD | add_or_confirm_csrf_for_public_lifecycle_route |
| POST | `API/Status` | `\App\Modules\APIs\Controllers\APIController::status` | STATEFUL_PUBLIC | MISSING_GUARD | add_or_confirm_csrf_for_public_lifecycle_route |
| POST | `index.php` | `/` | STATEFUL_PUBLIC | MISSING_GUARD | add_or_confirm_csrf_for_public_lifecycle_route |
| PATCH | `index.php` | `/` | STATEFUL_PUBLIC | MISSING_GUARD | add_or_confirm_csrf_for_public_lifecycle_route |
| PUT | `index.php` | `/` | STATEFUL_PUBLIC | MISSING_GUARD | add_or_confirm_csrf_for_public_lifecycle_route |
| DELETE | `index.php` | `/` | STATEFUL_PUBLIC | MISSING_GUARD | add_or_confirm_csrf_for_public_lifecycle_route |
