# MYMI-GTM-043: Certify Referrals, Memberships, Subscriptions, and Entitlements

## Status
READY / CERTIFIED.

- **PR:** (Pending merge)
- **Completed UTC:** 2026-11-17T13:45:00Z
- **Domain:** Core financial journeys (W3)
- **Gate:** None required

## Summary of Changes
- **Entitlement & Membership Certification (`PremiumEntitlementService`):**
  - Verified tier weight progression (`guest`: -1, `free`: 0, `trial`/`tier1`: 1, `tier2`: 2, `tier3`/`premium`: 3).
  - Enforced strict normalization across tier names (`Starter`/`Basic` -> `tier1`, `Pro` -> `tier2`, `Premium`/`Gold` -> `tier3`).
  - Enforced status boundary handling: terminal statuses (`expired`, `canceled`, `inactive`, `unpaid`) strictly deny paid features even when user flags are set.
  - Enforced expiration timestamp boundary: past `expires_at` / `trial_ends_at` automatically transitions membership to `expired`.
  - Added public helper methods: `getUserTier(?int $userId): string`, `getUserStatus(?int $userId): string`, `hasActiveMembership(?int $userId): bool`, and `clearRequestCache(): void`.
- **Referral Lifecycle & Hardening (`ReferralService`, `ReferralModel`, `ReferralController`):**
  - **IDOR Prevention:** Hardened `ReferralController::sendReferralEmail()` to strictly resolve user identity from the active session (`$this->cuID`), rejecting client-spoofed `user_id` inputs with 401 when unauthenticated and ensuring stored records belong to the active user.
  - **Database Agnostic Queries:** Rewrote `ReferralModel::getMonthlyReferralStats()` and `calculateCommission()` to eliminate MySQL-only `MONTH()` and `YEAR()` functions, using sargable date-range comparisons and driver-specific year/month formatting.
  - **Model Limit Audit Compliance:** Added bounded `limit(100)` / `limit(500)` calls on all table queries in `ReferralModel` and `ReferralService`.
  - **Money Switch Protection:** Guarded `ReferralService::processReferralPayments()` and `payoutUser()` with feature checks (`FEATURE_MEMBERSHIP_PURCHASES`). When money switches are OFF (default), live payouts are suppressed with informational log notices and pending claims, ensuring no funds move without human gate authorization.
  - Added missing helper implementations in `ReferralModel`: `getEarningsBreakdown()`, `savePayout()`, and `updatePayoutStatus()`.
  - Created missing email invite template `app/Views/emails/referral_invite.php` with safe fallback rendering in `ReferralController`.
  - Added user routes `Referrals/share`, `Referrals/My_Referrals`, and `Referrals/processPayments` to `app/Config/Routes.php`.
- **Subscriptions & Mailing List Certification (`SubscribeController`, `SubscribeModel`):**
  - Initialized missing `$this->referralModel` property in `SubscribeController::initController()` and corrected `$siteSettings` visibility from `private` to `protected` (fixing inheritance fatal).
  - Enhanced `SubscribeController::Submit()` and `App\Modules\Blog\Controllers\SubscribeController::submit()` to accept both JSON request bodies and standard form POSTs, scoping new subscribers to active session user IDs when logged in.
  - Verified email validation, duplicate email prevention, and unsubscribe token verification flows in `SubscribeModel`.
- **Certification Test Suite (`tests/unit/Entitlements/EntitlementsReferralsPipelineTest.php`):**
  - 15 comprehensive unit tests (72 assertions) verifying guest/free/tier1/tier2/tier3 entitlement resolution, status boundary enforcement, expiration transitions, referral data generation, tiered commission percentages (10%-50%), database-agnostic monthly stats, money switch payout protection, subscriber deduplication, unsubscribe tokens, IDOR session scoping, and JSON/POST submit handlers.

## Test Verification
- Unit Test: `vendor/bin/phpunit tests/unit/Entitlements/EntitlementsReferralsPipelineTest.php` (15 tests, 72 assertions PASS).
- Full Unit Suite: `vendor/bin/phpunit --testsuite unit` (500 tests, 2475 assertions PASS).
- Auth Smoke Suite: `vendor/bin/phpunit --testsuite auth-smoke` (20 tests, 89 assertions PASS).
- Form Certification Smoke: `bash tests/smoke/form-certification-smoke.sh` (293 PASS, 22 FAIL - Ratchet Preserved).
- Spark Command Rules Audit: `php spark ops:commands:audit --json` (0 violations).
- Model Limit Audit: `php spark ops:model-limit:audit` (0 new violations, 0 changed-file findings).

## Risks & Rollback
- Risk: Low. Purely additive fixes, defensive SQLite/MySQL compatibility, IDOR hardening, and strict money switch enforcement.
- Rollback: Revert PR commit on `main`.
