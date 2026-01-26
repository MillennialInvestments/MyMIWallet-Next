# bf_user_tax_return_values

## Source
- Migration: 2025-01-01-000100_CreateTaxModuleTables.php
- Model:
- Code references: app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:108, app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:144, app/Modules/User/Tax/Models/TaxReturnModel.php:57, app/Modules/User/Tax/Models/TaxReturnModel.php:87, app/Modules/User/Tax/Models/TaxReturnModel.php:122, app/Modules/User/Tax/Models/TaxReturnModel.php:129, app/Modules/User/Tax/Models/TaxReturnModel.php:136, app/Modules/User/Tax/Models/TaxReturnModel.php:156, app/Modules/User/Tax/Models/TaxReturnModel.php:245, app/Modules/User/Tax/Models/TaxReturnModel.php:252, app/Modules/User/Tax/Models/TaxReturnModel.php:256, docs/sql/tax_module_schema.sql:75

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_user_tax_return_values` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `return_id` INT(11) UNSIGNED NOT NULL,
  `line_id` INT(11) UNSIGNED NOT NULL,
  `amount` DECIMAL(12,2) NOT NULL DEFAULT 0.00,
  `explain_text` VARCHAR(255) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`return_id`) REFERENCES `bf_user_tax_returns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`line_id`) REFERENCES `bf_tax_return_lines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- return_id INT(11) UNSIGNED NOT NULL
- line_id INT(11) UNSIGNED NOT NULL
- amount DECIMAL(12,2) NOT NULL
- explain_text VARCHAR(255) NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)

## Verification
```sql
SHOW CREATE TABLE `bf_user_tax_return_values`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_return_values'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_return_values'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

