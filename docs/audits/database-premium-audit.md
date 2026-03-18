# Database Premium Audit

## Scope
- Users table (`users`)
- Subscription table (`bf_users_subscriptions`)
- Feature catalog table (`bf_users_memberships`)
- Referral + attribution surfaces (`users`, `bf_user_events`, `bf_users_referrals`)

## Findings
1. `bf_users_subscriptions` lacked normalized entitlement fields required by the new premium resolver (`membership_tier`, `membership_status`, `expires_at`, `trial_ends_at`) and had no supporting indexes.
2. Attribution fields were not persisted on `users`; registration only logged them in session/event metadata.
3. Existing schema docs show no required indexes on `users`, `bf_users_subscriptions`, `bf_users_memberships`, or `bf_users_referrals`, increasing lookup cost and drift risk.
4. Historical rows could remain `active=1` after expiry because no normalization pass existed.

## Fixes Applied
- Added migration `2026-03-18-130000_HardenPremiumSchema.php` to:
  - add `source_channel` and `campaign_code` to `users`
  - add `membership_tier`, `membership_status`, `expires_at`, `trial_ends_at`, `source_channel`, and `campaign_code` to `bf_users_subscriptions`
  - backfill normalized tier/status values and mark expired rows inactive when possible
  - add indexes on `user_id`, `membership_status`, `expires_at`, `trial_ends_at`, and attribution fields

## Validation Notes
- Live DB verification was not possible in this environment because no deploy-specific database credentials were available in the repo.
- Validation was performed against checked-in schema docs, migrations, and runtime code expectations.

## Remaining Risks
- Production may contain tables named `bf_users` instead of `users` in some legacy environments.
- Old rows may still need manual cleanup if local schema differs from the documented structure.
- `bf_users_memberships` is still acting as a feature catalog rather than a per-user entitlement table.

## Recommended SQL Checks
```sql
SHOW CREATE TABLE users;
SHOW CREATE TABLE bf_users_subscriptions;
SHOW INDEX FROM bf_users_subscriptions;
SELECT user_id, membership_tier, membership_status, expires_at, trial_ends_at
FROM bf_users_subscriptions
ORDER BY updated_on DESC
LIMIT 50;
```
