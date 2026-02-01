# bf_user_tax_return_jurisdictions

## Source
- Migration: 2025-01-01-000100_CreateTaxModuleTables.php
- Model:
- Code references: app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:123, app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:143, app/Modules/User/Tax/Models/TaxJurisdictionModel.php:20, app/Modules/User/Tax/Models/TaxReturnModel.php:67, app/Modules/User/Tax/Models/TaxReturnModel.php:187, app/Modules/User/Tax/Models/TaxReturnModel.php:209, app/Modules/User/Tax/Models/TaxReturnModel.php:224, docs/sql/tax_module_schema.sql:90, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:207, docs/_aiops/doc-change-log.md:1850

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_user_tax_return_jurisdictions` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `return_id` INT(11) UNSIGNED NOT NULL,
  `jurisdiction_id` INT(11) UNSIGNED NOT NULL,
  `taxable_amount` DECIMAL(12,2) NOT NULL DEFAULT 0.00,
  `tax_due` DECIMAL(12,2) NOT NULL DEFAULT 0.00,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`return_id`) REFERENCES `bf_user_tax_returns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`jurisdiction_id`) REFERENCES `bf_tax_jurisdictions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- return_id INT(11) UNSIGNED NOT NULL
- jurisdiction_id INT(11) UNSIGNED NOT NULL
- taxable_amount DECIMAL(12,2) NOT NULL
- tax_due DECIMAL(12,2) NOT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)

## Verification
```sql
SHOW CREATE TABLE `bf_user_tax_return_jurisdictions`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_return_jurisdictions'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_return_jurisdictions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

