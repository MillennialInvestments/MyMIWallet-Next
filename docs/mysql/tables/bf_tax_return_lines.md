# bf_tax_return_lines

## Source
- Migration: 2025-01-01-000100_CreateTaxModuleTables.php
- Model:
- Code references: app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:74, app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:107, app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:146, app/Modules/Management/TaxAdmin/Models/TaxLinesModel.php:11, app/Modules/Management/TaxAdmin/Models/TaxTemplatesModel.php:24, app/Modules/User/Tax/Models/TaxTemplateModel.php:24, app/Modules/User/Tax/Models/TaxTemplateModel.php:33, docs/sql/tax_module_schema.sql:41, docs/sql/tax_module_schema.sql:87, docs/sql/tax_seed_bossier_parish.sql:9, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:200, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:200, docs/_aiops/doc-change-log.md:2006

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_tax_return_lines` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `template_id` INT(11) UNSIGNED NOT NULL,
  `line_number` INT(11) NOT NULL,
  `label` VARCHAR(255) NOT NULL,
  `type` ENUM('input','calc','info') NOT NULL,
  `calc_rule` VARCHAR(255) NULL,
  `requires_explain` TINYINT(1) NOT NULL DEFAULT 0,
  `sort_order` INT(11) NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`template_id`) REFERENCES `bf_tax_return_templates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- template_id INT(11) UNSIGNED NOT NULL
- line_number INT(11) NOT NULL
- label VARCHAR(255) NOT NULL
- type ENUM(input,calc,info) NOT NULL
- calc_rule VARCHAR(255) NULL
- requires_explain TINYINT(1) NOT NULL
- sort_order INT(11) NOT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)

## Verification
```sql
SHOW CREATE TABLE `bf_tax_return_lines`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_tax_return_lines'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_tax_return_lines'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

