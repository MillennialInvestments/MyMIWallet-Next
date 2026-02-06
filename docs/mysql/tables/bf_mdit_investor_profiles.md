# bf_mdit_investor_profiles

## Source
- Migration: 2026-04-01-000100_CreateMditPhase1Tables.php
- Model:
- Code references: app/Database/Migrations/2026-04-01-000100_CreateMditPhase1Tables.php:11, app/Database/Migrations/2026-04-01-000100_CreateMditPhase1Tables.php:26, app/Database/Migrations/2026-04-01-000100_CreateMditPhase1Tables.php:177, app/Models/MDIT/MditInvestorProfileModel.php:10, docs/codex/reviews/Spark-Analysis-2026-02-01.md:596, docs/aiops/migration_model_audit.md:126, docs/aiops/migration_model_audit.md:233, docs/_aiops/doc-change-log.md:1712, docs/mdit/phase1_implementation_notes.md:6

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_mdit_investor_profiles` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `kyc_status` VARCHAR(32) NOT NULL DEFAULT 'PENDING',
  `accreditation_status` VARCHAR(32) NOT NULL DEFAULT 'PENDING',
  `risk_ack_on` DATETIME NULL,
  `created_on` DATETIME NULL,
  `updated_on` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `created_on` (`created_on`),
  KEY `kyc_status` (`kyc_status`),
  KEY `accreditation_status` (`accreditation_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- user_id INT(11) UNSIGNED NOT NULL
- kyc_status VARCHAR(32) NOT NULL
- accreditation_status VARCHAR(32) NOT NULL
- risk_ack_on DATETIME NULL
- created_on DATETIME NULL
- updated_on DATETIME NULL

## Required indexes
- PRIMARY (id)
- user_id (user_id) [UNIQUE]
- created_on (created_on)
- kyc_status (kyc_status)
- accreditation_status (accreditation_status)

## Verification
```sql
SHOW CREATE TABLE `bf_mdit_investor_profiles`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_mdit_investor_profiles'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_mdit_investor_profiles'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

