# bf_projects_revenue_distributions_items

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:180

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_projects_revenue_distributions_items` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `distribution_id` int NOT NULL DEFAULT NULL,
  `user_id` int NOT NULL DEFAULT NULL,
  `token_id` int NULL DEFAULT NULL,
  `share_ratio` decimal(12,8) NOT NULL DEFAULT NULL,
  `payout_amount` decimal(15,2) NOT NULL DEFAULT NULL,
  `status` enum('pending','paid','failed') NOT NULL DEFAULT 'pending',
  `tx_ref` varchar(255) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- distribution_id int NOT NULL
- user_id int NOT NULL
- token_id int NULL
- share_ratio decimal(12,8) NOT NULL
- payout_amount decimal(15,2) NOT NULL
- status enum('pending','paid','failed') NOT NULL
- tx_ref varchar(255) NULL
- created_at datetime NULL
- updated_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_projects_revenue_distributions_items`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_projects_revenue_distributions_items'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_projects_revenue_distributions_items'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

