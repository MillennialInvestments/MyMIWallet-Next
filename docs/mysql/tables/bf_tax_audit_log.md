# bf_tax_audit_log

## Source
- Migration: 2025-01-01-000100_CreateTaxModuleTables.php
- Model:
- Code references: app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:137, app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:142, app/Modules/Management/TaxAdmin/Models/TaxAuditLogModel.php:11, docs/sql/tax_module_schema.sql:105, docs/tax/README.md:16, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:197, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:197, docs/_aiops/doc-change-log.md:1994

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_tax_audit_log` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `action` VARCHAR(50) NOT NULL,
  `entity_type` VARCHAR(50) NOT NULL,
  `entity_id` INT(11) UNSIGNED NOT NULL,
  `before_json` LONGTEXT NULL,
  `after_json` LONGTEXT NULL,
  `created_at` DATETIME NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- user_id INT(11) UNSIGNED NOT NULL
- action VARCHAR(50) NOT NULL
- entity_type VARCHAR(50) NOT NULL
- entity_id INT(11) UNSIGNED NOT NULL
- before_json LONGTEXT NULL
- after_json LONGTEXT NULL
- created_at DATETIME NULL

## Required indexes
- PRIMARY (id)

## Verification
```sql
SHOW CREATE TABLE `bf_tax_audit_log`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_tax_audit_log'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_tax_audit_log'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

