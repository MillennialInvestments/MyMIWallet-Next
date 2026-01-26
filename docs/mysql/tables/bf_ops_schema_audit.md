# bf_ops_schema_audit

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/DbInventory/InventoryScanner.php:17, app/Libraries/DbInventory/SqlGenerator.php:13, app/Libraries/DbInventory/SqlGenerator.php:329, app/Services/Spark/DbApplyDocsService.php:285, app/Services/Spark/DbApplyDocsService.php:292, app/Services/Spark/DbApplyDocsService.php:314, docs/spark/categories/database/db-apply-docs.md:14

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_ops_schema_audit` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `operation` VARCHAR(16) NOT NULL,
  `table_name` VARCHAR(64) NOT NULL,
  `sql_hash` CHAR(64) NOT NULL,
  `applied_by` VARCHAR(64) NOT NULL,
  `applied_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `source` VARCHAR(64) NULL DEFAULT 'db:apply-docs',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT(20) UNSIGNED NOT NULL
- operation VARCHAR(16) NOT NULL
- table_name VARCHAR(64) NOT NULL
- sql_hash CHAR(64) NOT NULL
- applied_by VARCHAR(64) NOT NULL
- applied_at DATETIME NOT NULL
- source VARCHAR(64) NULL

## Required indexes
- PRIMARY (id)

## Verification
```sql
SHOW CREATE TABLE `bf_ops_schema_audit`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_ops_schema_audit'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_ops_schema_audit'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

