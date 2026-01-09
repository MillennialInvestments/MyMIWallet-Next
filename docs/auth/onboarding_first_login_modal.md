# Onboarding Modal (First Verified Login)

## Overview
On first verified login, users are guided through a Bootstrap modal walkthrough that captures profile info and quick setup data for budgets and investments.

## Trigger logic
- **Auth entry point:** `app/Controllers/AuthController.php::attemptLogin()`
- When login succeeds for an active user:
  - `OnboardingProgressService::markVerifiedLogin()` persists `first_verified_login_at`.
  - `OnboardingProgressService::shouldTriggerWalkthrough()` checks if the walkthrough should open.
  - Session flag `onboarding_show_modal` is set and logged.

## Modal rendering
- **View:** `app/Modules/User/Views/Dashboard/modals/onboarding.php`
- **Layout include:** `app/Views/themes/dashboard/partials/custom-js/modals.php`
- **Data source:** `DashboardController::commonData()` injects `onboardingProgress` and `onboardingShowModal` into layout data.

## Steps covered
1. Profile basics (name, phone).
2. Employment selection (works for company / owns business / both).
3. Monthly income.
4. Credit & debt overview.
5. Recurring expenses.
6. Starter watchlist symbol.

## Code placement notes
- **Session flag removal** occurs in `DashboardController::commonData()` after the modal is queued.
- **Modal auto-open** is triggered by JS in the onboarding modal view when `onboardingShowModal` is true.

## Logging
- Login transition and modal queueing are logged in `AuthController::attemptLogin()`.
- Dashboard log entry confirms modal trigger in `DashboardController::commonData()`.
