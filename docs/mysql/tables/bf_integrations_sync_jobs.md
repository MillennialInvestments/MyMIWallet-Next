# bf_integrations_sync_jobs

## Source
- Migration: _None_
- Model:
- Code references: docs/integrations/technology_investor_integrations.md:81, docs/integrations/technology_investor_integrations.md:316

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_integrations_sync_jobs` (
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
SHOW CREATE TABLE `bf_integrations_sync_jobs`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_integrations_sync_jobs'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_integrations_sync_jobs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

