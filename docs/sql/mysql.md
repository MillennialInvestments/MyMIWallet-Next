# MySQL Patches – 2025-11-29 URI/Wallet fixes

## Fix 1 – Unknown column `symbols` in `bf_marketing_scraper`

Error surfaced while fetching dashboard news (`DashboardController::index`). Add the missing column so queries selecting `symbols` succeed.

```sql
ALTER TABLE `bf_marketing_scraper`
ADD COLUMN `symbols` TEXT NULL AFTER `source`;
```

## Fix 2 – Soft-delete support for referrals (`deleted_on` missing)

Referral lookups expect a `deleted_on` datetime column for soft deletes (`ReferralModel` and related controllers). Add the column and index it for filtering.

```sql
ALTER TABLE `bf_users_referrals`
ADD COLUMN `deleted_on` DATETIME NULL AFTER `modified_on`,
ADD INDEX `idx_users_referrals_deleted_on` (`deleted_on`);
```
