# bf_mdit_disclosures_acceptance

## Source
- Migration: 2026-04-01-000100_CreateMditPhase1Tables.php
- Model:
- Code references: app/Database/Migrations/2026-04-01-000100_CreateMditPhase1Tables.php:132, app/Database/Migrations/2026-04-01-000100_CreateMditPhase1Tables.php:144, app/Database/Migrations/2026-04-01-000100_CreateMditPhase1Tables.php:171, app/Models/MDIT/MditDisclosureAcceptanceModel.php:10, docs/codex/reviews/Spark-Analysis-2026-02-01.md:596, docs/aiops/migration_model_audit.md:125, docs/aiops/migration_model_audit.md:232, docs/_aiops/doc-change-log.md:1709

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_mdit_disclosures_acceptance` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `disclosure_version` VARCHAR(32) NOT NULL,
  `accepted_on` DATETIME NULL,
  `ip_address` VARCHAR(64) NULL,
  `user_agent` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `accepted_on` (`accepted_on`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- user_id INT(11) UNSIGNED NOT NULL
- disclosure_version VARCHAR(32) NOT NULL
- accepted_on DATETIME NULL
- ip_address VARCHAR(64) NULL
- user_agent VARCHAR(255) NULL

## Required indexes
- PRIMARY (id)
- user_id (user_id)
- accepted_on (accepted_on)

## Verification
```sql
SHOW CREATE TABLE `bf_mdit_disclosures_acceptance`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_mdit_disclosures_acceptance'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_mdit_disclosures_acceptance'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

