# bf_tax_jurisdictions

## Source
- Migration: 2025-01-01-000100_CreateTaxModuleTables.php
- Model:
- Code references: app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:28, app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:42, app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:122, app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:149, app/Modules/Management/TaxAdmin/Controllers/TaxConfig.php:158, app/Modules/Management/TaxAdmin/Controllers/TaxConfig.php:158, app/Modules/Management/TaxAdmin/Controllers/TaxConfig.php:159, app/Modules/Management/TaxAdmin/Controllers/TaxConfig.php:159, app/Modules/Management/TaxAdmin/Models/TaxJurisdictionsModel.php:11, app/Modules/Management/TaxAdmin/Models/TaxJurisdictionsModel.php:20, app/Modules/Management/TaxAdmin/Models/TaxJurisdictionsModel.php:21, app/Modules/Management/TaxAdmin/Models/TaxJurisdictionsModel.php:22, app/Modules/Management/TaxAdmin/Models/TaxJurisdictionsModel.php:23, app/Modules/User/Tax/Models/TaxJurisdictionModel.php:12, app/Modules/User/Tax/Models/TaxJurisdictionModel.php:22, docs/sql/tax_module_schema.sql:3, docs/sql/tax_module_schema.sql:26, docs/sql/tax_module_schema.sql:102, docs/sql/tax_seed_bossier_parish.sql:26, docs/sql/tax_seed_bossier_parish.sql:37, docs/sql/tax_seed_bossier_parish.sql:38, docs/sql/tax_seed_bossier_parish.sql:39, docs/sql/tax_seed_bossier_parish.sql:40, docs/sql/tax_seed_bossier_parish.sql:41, docs/sql/tax_seed_bossier_parish.sql:42, docs/sql/tax_seed_bossier_parish.sql:43

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_tax_jurisdictions` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `state` VARCHAR(2) NOT NULL DEFAULT 'LA',
  `parish` VARCHAR(100) NOT NULL,
  `name` VARCHAR(150) NOT NULL,
  `code` VARCHAR(10) NOT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- state VARCHAR(2) NOT NULL
- parish VARCHAR(100) NOT NULL
- name VARCHAR(150) NOT NULL
- code VARCHAR(10) NOT NULL
- active TINYINT(1) NOT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)

## Verification
```sql
SHOW CREATE TABLE `bf_tax_jurisdictions`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_tax_jurisdictions'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_tax_jurisdictions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

