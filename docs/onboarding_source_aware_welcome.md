# Source-Aware Welcome Onboarding

## Overview

MyMI Wallet now supports a **source-aware first-login welcome experience** for newly registered users.

- Users whose `bf_users.source_channel` is `discord` receive a prominent welcome card on the dashboard after their first verified login.
- The card is optional (dismissable) and does not block existing onboarding modal/checklist behavior.
- Non-Discord users continue to use the standard onboarding experience only.

## Eligibility logic

The Discord-specific welcome card is shown only when all of the following are true:

1. The user has a `source_channel` of `discord` in `bf_users`.
2. `first_verified_login_at` exists in `bf_user_onboarding` (set during successful login).
3. The source-aware welcome card has not already been completed/dismissed.

The completion/dismiss state is stored in `bf_user_onboarding.steps_json` under:

- `meta.source_welcome_completed_at`
- `meta.source_welcome_completion_action` (`completed` or `dismissed`)

## User experience

When displayed, the Discord welcome card presents up to 5 next actions:

1. Start your budget (`/Budget`)
2. Explore investments (`/Investments`)
3. Set up your watchlist (`/Investments/Watchlist`)
4. Learn about wallets/exchange (`/Exchange`)
5. Upgrade for premium tools (`/Billing`)

The user can:

- Click **Done** (marks completed)
- Click **Dismiss** (marks dismissed)

Either action tracks first-login source-aware onboarding completion and hides the card going forward.

## Key implementation points

- Source-aware state lookup and completion tracking: `App\Services\OnboardingProgressService`
- Dashboard view model hydration: `App\Modules\User\Controllers\DashboardController::index()`
- Dashboard UI card + completion/dismiss requests: `app/Modules/User/Views/Dashboard/index.php`
- Completion endpoint: `POST /Dashboard/onboarding/source-welcome/complete`
- Route definition: `app/Config/Routes.php`

## Backward compatibility

- Existing onboarding walkthrough modal and setup banner remain unchanged.
- Non-Discord onboarding behavior is preserved.
- If source data is unavailable, behavior gracefully defaults to standard onboarding only.
