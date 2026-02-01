# bf_mdit_nav_snapshots

## Source
- Migration: 2026-04-01-000100_CreateMditPhase1Tables.php
- Model:
- Code references: app/Database/Migrations/2026-04-01-000100_CreateMditPhase1Tables.php:115, app/Database/Migrations/2026-04-01-000100_CreateMditPhase1Tables.php:129, app/Database/Migrations/2026-04-01-000100_CreateMditPhase1Tables.php:172, app/Models/MDIT/MditNavSnapshotModel.php:10, docs/aiops/migration_model_audit.md:127, docs/aiops/migration_model_audit.md:234, docs/_aiops/doc-change-log.md:1562

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_mdit_nav_snapshots` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `as_of_date` DATE NOT NULL,
  `nav_total` DECIMAL(18,8) NOT NULL,
  `token_supply` DECIMAL(18,8) NOT NULL,
  `nav_per_unit` DECIMAL(18,8) NOT NULL,
  `cash_value` DECIMAL(18,8) NOT NULL,
  `equities_value` DECIMAL(18,8) NOT NULL,
  `created_on` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `as_of_date` (`as_of_date`),
  KEY `created_on` (`created_on`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- as_of_date DATE NOT NULL
- nav_total DECIMAL(18,8) NOT NULL
- token_supply DECIMAL(18,8) NOT NULL
- nav_per_unit DECIMAL(18,8) NOT NULL
- cash_value DECIMAL(18,8) NOT NULL
- equities_value DECIMAL(18,8) NOT NULL
- created_on DATETIME NULL

## Required indexes
- PRIMARY (id)
- as_of_date (as_of_date) [UNIQUE]
- created_on (created_on)

## Verification
```sql
SHOW CREATE TABLE `bf_mdit_nav_snapshots`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_mdit_nav_snapshots'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_mdit_nav_snapshots'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

