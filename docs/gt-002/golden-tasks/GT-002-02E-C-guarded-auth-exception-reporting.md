# GT-002-02E-C Guarded Auth Exception Reporting

## Objective

Ensure `AuthController::attemptLogin()` never throws a second exception from inside the catch block while handling an auth exception.

## Scope

Guard support ticket creation, user notification, support notification, Discord notification, and auth exception logging independently.

## Acceptance

- Original auth exception message, file, and line are logged safely.
- Ticket creation failure is logged without crashing login.
- Email/Discord notification failure is logged without crashing login.
- User-facing login error remains safe and generic.
- No live email/Discord delivery is introduced by default beyond existing behavior.
