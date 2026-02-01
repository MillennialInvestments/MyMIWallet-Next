# bf_onboarding_steps

## Source
- Migration: _None_
- Model:
- Code references: app/Services/OnboardingService.php:8, docs/_aiops/doc-change-log.md:1595

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_onboarding_steps` (
  `code` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- code TEXT NULL
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_onboarding_steps`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_onboarding_steps'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_onboarding_steps'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

