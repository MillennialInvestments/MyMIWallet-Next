# bf_password_reset_attempts

## Source
- Migration: _None_
- Model:
- Code references: docs/health/health_test_checklist.md:73, docs/health/modules/auth.md:70

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_password_reset_attempts` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL

## Required indexes
- PRIMARY (id)

## Verification
```sql
SHOW CREATE TABLE `bf_password_reset_attempts`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_password_reset_attempts'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_password_reset_attempts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

