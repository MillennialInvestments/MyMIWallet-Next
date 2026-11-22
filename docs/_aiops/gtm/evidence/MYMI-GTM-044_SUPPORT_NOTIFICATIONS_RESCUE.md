# MYMI-GTM-044: Certify Support Tickets, Notifications, and Account Rescue

## Status
READY FOR REVIEW / CERTIFIED.

- **Task ID:** `MYMI-GTM-044`
- **Domain:** Core financial journeys (W3)
- **Completed UTC:** 2026-11-22T15:30:00Z
- **Gate:** None required for code certification (Postmark email sending verification under G12 when ready)

## Summary of Changes

### 1. Support Tickets Certification & IDOR Hardening
- **IDOR Protection (`SupportTicketController`):**
  - Secured `SupportTicketController::show(int $id)` against unauthorized access. Only the verified ticket owner (matching session `user_id` or session email), admin/team members (`cuRole <= 2` or `admin.access`), or a user holding active flashdata `auth_ticket_id` (from auth exception redirects) can view the ticket details and event history.
  - Non-authorized viewers and non-existent tickets strictly throw `PageNotFoundException::forPageNotFound('Ticket not found')` to eliminate IDOR and prevent ticket ID enumeration.
  - Added `reply(int $id)` endpoint with session-user IDOR guard and input validation for follow-up message submission.
  - Bounded event history queries with `limit(100)->findAll()` to prevent unbounded result sets.
- **Support Ticket Lifecycle Service (`SupportTicketService`):**
  - Retained auth login exception ticket generation (`createAuthLoginErrorTicket`) and user/support/Discord notification routing.
  - Added general ticket creation (`createTicket`), ticket retrieval (`getTicket`), user ticket retrieval with bounds (`getTicketsForUser`), follow-up conversation updates (`addFollowUp`), and status transition workflows (`updateStatus`).
  - Added audit event logging (`recordEvent`) tracking event types (`created`, `user_reply`, `staff_reply`, `status_change`, `emailed_user`, `emailed_support`, `discord_notified`).

### 2. Notification Pipeline & Model Implementation
- **Notification Model (`NotificationModel`):**
  - Implemented missing `App\Models\NotificationModel` referenced by `NotificationService`.
  - Added defensive table guards supporting `notification_outbox` and `bf_users_notifications` without throwing database exceptions.
  - Implemented `getGoalById(int $goalId)` for financial goal lookups.
  - Implemented `sendNotification(int $userId, string $message, string $subject, string $type)`.
  - Implemented bounded `getUserNotifications(int $userId, int $limit = 20)`.
  - Implemented `markAsRead(int $notificationId, ?int $userId = null)` and `getUnreadCount(int $userId)`.
- **Notification Service (`NotificationService`):**
  - Hardened `sendGoalCompletionNotification(int $userId, int $goalId)`: verifies goal ownership from `bf_financial_goals`, ensuring user ID matches the goal's owner (IDOR guard) before dispatching completion notifications.
  - Added type-safe methods: `sendBudgetLimitAlert`, `sendUpcomingPaymentReminder`, `sendMonthlySummary`, `getUserNotifications`, `markAsRead`, and `getUnreadCount`.

### 3. Account Rescue & Anti-Enumeration
- **Account Rescue Controller (`AccountRescueAdminController`):**
  - Guarded `unlockAccount()` with defensive table checks for both `login_attempts` and `auth_logins` tables.
  - Audited administrative actions with `AuditLogModel` (`account_rescue.lookup`, `account_rescue.lookup_miss`, `account_rescue.unlock`, `account_rescue.resend_activation`, `account_rescue.manual_activate`, `account_rescue.force_password_reset`).
- **Account Support Help Center (`AccountSupportController`):**
  - Verified rate limiting and generic responses (`If an account exists for that email, we sent instructions.`) to prevent username and email enumeration.

### 4. Test Suite (`tests/unit/Support/SupportNotificationsRescueTest.php`)
- 12 comprehensive unit tests (53 assertions) verifying:
  - Auth login error ticket creation, context storage, and event logging.
  - General support ticket creation, follow-ups, status progression, and event audit trails.
  - User-scoped ticket retrieval with limits.
  - Ticket owner IDOR authorization (owner access, session email access, admin access, flashdata access).
  - Unrelated user IDOR denial (throws `PageNotFoundException`).
  - Non-existent ticket 404 handling.
  - Goal completion notification IDOR scoping (owner passes, imposter denied).
  - Budget alert, payment reminder, and monthly summary dispatches.
  - Notification unread count and read-status updates.
  - Account rescue unlock and audit log persistence.
  - Account support anti-enumeration and active/inactive status handling.

## Test Verification
- Unit Test: `vendor/bin/phpunit tests/unit/Support/SupportNotificationsRescueTest.php` (12 tests, 53 assertions PASS).
- Full Unit Suite: `vendor/bin/phpunit --testsuite unit` (585 tests, 2967 assertions PASS).
- Auth Smoke Suite: `vendor/bin/phpunit --testsuite auth-smoke` (20 tests, 89 assertions PASS).
- Form Certification Smoke: `bash tests/smoke/form-certification-smoke.sh` (293 PASS, 22 FAIL - Ratchet Preserved).
- Spark Command Rules Audit: `php spark ops:commands:audit --json` (0 violations).

## Risks & Rollback
- Risk: Low. Purely additive fixes, defensive SQLite/MySQL compatibility, IDOR hardening, and type safety.
- Rollback: Revert commit on `feature/mymi-gtm-044-support-notifications-rescue` or `main`.
