# Auth + Support Ticket Automation (CI4.7)

## What was fixed
- Hardened login exception handling to auto-create support tickets and notify user/support/Discord.
- Added IP history tracking on register/login/forgot/reset flows.
- Added safe email rendering helper to avoid null template rendering issues.
- Updated auth audit seeder execution path to avoid null seeder command context.
- Added auth-focused logger service for attempts/failures/exceptions.

## Files changed
- `app/Controllers/AuthController.php`
- `app/Services/Auth/AuthLogger.php`
- `app/Helpers/email_helper.php`
- `app/Libraries/MailService.php`
- `app/Config/Logger.php`
- `app/Services/Spark/AuthAuditRunner.php`
- `app/Models/UserIpHistoryModel.php`
- `app/Modules/Support/Services/SupportTicketService.php`
- `app/Modules/Support/Libraries/DiscordSupportNotifier.php`
- `app/Modules/Support/Models/SupportTicketModel.php`
- `app/Modules/Support/Models/SupportTicketEventModel.php`
- `app/Database/Migrations/2026-02-09-000001_create_support_tickets.php`
- `app/Database/Migrations/2026-02-09-000002_create_user_ip_history.php`
- `app/Views/Auth/login.php`
- `app/Views/emails/support/auth_login_error_user.php`
- `app/Views/emails/support/auth_login_error_support.php`

## New environment variables
- `AUTH_DEBUG_LOGGING=true`
- `logger.threshold=4`
- `support.email=support@mymiwallet.com`
- `SUPPORT_DISCORD_WEBHOOK_URL=`

## Flow summary
1. Login attempt starts and IP history is recorded.
2. Invalid credentials return normal auth message (no ticket).
3. Login exception creates support ticket + event rows.
4. User email (if valid), support email, and Discord webhook are attempted.
5. Failures in notifier channels are logged but do not stop ticketing.

## How to test
1. `php spark migrate`
2. `php spark cache:clear`
3. `php spark auth:audit`
4. Manually verify register/login/logout.
5. Verify forgot/reset password flow with valid token.
6. Force a login exception and confirm:
   - `bf_support_tickets` row exists
   - support events captured
   - flash message includes ticket id
   - IP history row updated

## Verification notes
- Do not log raw passwords/reset tokens.
- User identifiers in logs are masked when possible.
