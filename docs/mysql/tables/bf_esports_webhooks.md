# bf_esports_webhooks

## Source
- Migration: _None_
- Model:
- Code references: app/Models/EsportsModel.php:138, app/Models/EsportsModel.php:143, app/Models/EsportsModel.php:148, app/Models/EsportsModel.php:154, app/Models/EsportsModel.php:170, docs/exports_schema.md:144, docs/functional_inventory/docs_to_code_map.md:50, docs/functional_inventory/docs_to_code_map.md:51

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_esports_webhooks` (
  `payload_digest` TEXT NULL,
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- payload_digest TEXT NULL
- id INT(11) UNSIGNED NOT NULL

## Required indexes
- PRIMARY (id)

## Verification
```sql
SHOW CREATE TABLE `bf_esports_webhooks`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_esports_webhooks'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_esports_webhooks'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

