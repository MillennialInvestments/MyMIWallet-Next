# Auth + Onboarding Test Plan

## Registration + activation
1. **Register** with a new email.
   - Expect redirect to `/register/success` with success message.
   - Verify onboarding record created in `bf_user_onboarding`.
2. **Resend verification email** from success page.
   - Submit a valid email, verify generic response.
   - Submit invalid/non-existent email, verify same response.
   - Trigger throttling by resubmitting twice within 1 minute; verify response remains generic.
3. **Activate account** via activation link.
   - Expect redirect to `/login` with activation success message.

## Login + modal
1. Login with newly activated account.
   - Expect dashboard load and onboarding modal auto-open.
2. Close modal and reload dashboard.
   - Modal should not auto-open again (session flag removed).
3. If onboarding is incomplete, confirm “Continue setup” banner appears on dashboard.

## Walkthrough Stage A (Profile Setup)
1. Submit profile form with first/last name + employment type.
   - Verify rows created/updated in `bf_user_profiles` and `bf_user_employment`.
   - Confirm onboarding step badges update to “Done”.

## Walkthrough Stage B (Budget + Investments Quick Setup)
1. **Monthly income**: submit amount and source.
   - Expect insert into `bf_users_budgeting` (income).
2. **Credit/debt**: submit credit or debt balance.
   - Expect insert into `bf_users_credit_accounts` and/or `bf_users_debt_accounts`.
3. **Recurring expense**: submit recurring expense amount.
   - Expect insert into `bf_users_budgeting` (expense, recurring).
4. **Watchlist**: submit symbol.
   - Expect insert into `bf_users_watchlist`.
5. Completion: modal should display final completion screen and onboarding record should mark completed.

## Logging validation
- Confirm logs for registration success, resend activation, onboarding modal trigger, and each onboarding endpoint error/success.
