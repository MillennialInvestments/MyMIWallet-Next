# bf_referrals

## Source
- Migration: _None_
- Model:
- Code references: docs/marketing/01-mymi-gold-and-coin.md:52, docs/marketing/01-mymi-gold-and-coin.md:64, docs/marketing/02-budgeting-and-investments-libraries.md:64, docs/marketing/04-mymialerts-premium.md:41, docs/marketing/04-mymialerts-premium.md:53, docs/marketing/05-memberships-and-custom-plans.md:41, docs/marketing/05-memberships-and-custom-plans.md:54, docs/marketing/06-referrals-rewards.md:36, docs/marketing/06-referrals-rewards.md:41, docs/marketing/06-referrals-rewards.md:98, docs/marketing/07-myprojects-real-estate.md:54, docs/marketing/08-mymi-apis-self-host.md:54, docs/marketing/10-linkedin-groups-guide.md:41, docs/marketing/11-facebook-groups-guide.md:41, docs/marketing/12-discord-no-links-guide.md:41, docs/marketing/13-x-twitter-guide.md:53, docs/marketing/_templates/CAMPAIGN_TEMPLATE.md:26, docs/OVERVIEW.md:176, docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:56, docs/functional_inventory/docs_to_code_map.md:57, docs/functional_inventory/docs_to_code_map.md:59, docs/functional_inventory/docs_to_code_map.md:60, docs/functional_inventory/docs_to_code_map.md:61, docs/functional_inventory/docs_to_code_map.md:62, docs/functional_inventory/docs_to_code_map.md:63, docs/functional_inventory/docs_to_code_map.md:65, docs/functional_inventory/docs_to_code_map.md:66, docs/functional_inventory/docs_to_code_map.md:67, docs/functional_inventory/docs_to_code_map.md:68, docs/functional_inventory/docs_to_code_map.md:75, docs/_aiops/doc-change-log.md:1907

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_referrals` (
  `status` TEXT NULL,
  `reward_days` TEXT NULL,
  `partner_pct` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- status TEXT NULL
- reward_days TEXT NULL
- partner_pct TEXT NULL
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_referrals`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_referrals'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_referrals'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

