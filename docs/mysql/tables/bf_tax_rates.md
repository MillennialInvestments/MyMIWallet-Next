# bf_tax_rates

## Source
- Migration: 2025-01-01-000100_CreateTaxModuleTables.php
- Model:
- Code references: app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:43, app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:148, app/Modules/Management/TaxAdmin/Controllers/TaxConfig.php:158, app/Modules/Management/TaxAdmin/Controllers/TaxConfig.php:159, app/Modules/Management/TaxAdmin/Models/TaxJurisdictionsModel.php:21, app/Modules/Management/TaxAdmin/Models/TaxRatesModel.php:11, app/Modules/User/Tax/Models/TaxJurisdictionModel.php:32, docs/sql/tax_module_schema.sql:15, docs/sql/tax_seed_bossier_parish.sql:36, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:199, docs/_aiops/doc-change-log.md:1787

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_tax_rates` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `jurisdiction_id` INT(11) UNSIGNED NOT NULL,
  `rate_total` DECIMAL(7,4) NOT NULL,
  `rate_components` JSON NULL,
  `effective_start` DATE NOT NULL,
  `effective_end` DATE NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`jurisdiction_id`) REFERENCES `bf_tax_jurisdictions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- jurisdiction_id INT(11) UNSIGNED NOT NULL
- rate_total DECIMAL(7,4) NOT NULL
- rate_components JSON NULL
- effective_start DATE NOT NULL
- effective_end DATE NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)

## Verification
```sql
SHOW CREATE TABLE `bf_tax_rates`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_tax_rates'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_tax_rates'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

