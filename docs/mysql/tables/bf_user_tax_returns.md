# bf_user_tax_returns

## Source
- Migration: 2025-01-01-000100_CreateTaxModuleTables.php
- Model:
- Code references: app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:93, app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:106, app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:121, app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:145, app/Modules/User/Tax/Models/TaxReturnModel.php:15, docs/sql/tax_module_schema.sql:57, docs/sql/tax_module_schema.sql:86, docs/sql/tax_module_schema.sql:101

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_user_tax_returns` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `template_id` INT(11) UNSIGNED NOT NULL,
  `filing_period_start` DATE NOT NULL,
  `filing_period_end` DATE NOT NULL,
  `due_date` DATE NOT NULL,
  `file_date` DATE NULL,
  `status` ENUM('draft','ready','filed','paid','delinquent','void') NOT NULL DEFAULT 'draft',
  `total_remitted` DECIMAL(12,2) NOT NULL DEFAULT 0.00,
  `notes` TEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`template_id`) REFERENCES `bf_tax_return_templates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- user_id INT(11) UNSIGNED NOT NULL
- template_id INT(11) UNSIGNED NOT NULL
- filing_period_start DATE NOT NULL
- filing_period_end DATE NOT NULL
- due_date DATE NOT NULL
- file_date DATE NULL
- status ENUM(draft,ready,filed,paid,delinquent,void) NOT NULL
- total_remitted DECIMAL(12,2) NOT NULL
- notes TEXT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)

## Verification
```sql
SHOW CREATE TABLE `bf_user_tax_returns`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_returns'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_returns'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

