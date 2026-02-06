# bf_tax_return_templates

## Source
- Migration: 2025-01-01-000100_CreateTaxModuleTables.php
- Model:
- Code references: app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:57, app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:73, app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:92, app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:147, app/Modules/Management/TaxAdmin/Models/TaxTemplatesModel.php:11, app/Modules/User/Tax/Models/TaxTemplateModel.php:11, docs/sql/tax_module_schema.sql:29, docs/sql/tax_module_schema.sql:54, docs/sql/tax_module_schema.sql:72, docs/sql/tax_seed_bossier_parish.sql:3, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:201, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:201, docs/_aiops/doc-change-log.md:2012

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_tax_return_templates` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  `authority` VARCHAR(150) NOT NULL,
  `frequency` ENUM('monthly','quarterly','annual') NOT NULL,
  `notes` TEXT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- name VARCHAR(150) NOT NULL
- authority VARCHAR(150) NOT NULL
- frequency ENUM(monthly,quarterly,annual) NOT NULL
- notes TEXT NULL
- active TINYINT(1) NOT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)

## Verification
```sql
SHOW CREATE TABLE `bf_tax_return_templates`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_tax_return_templates'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_tax_return_templates'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

