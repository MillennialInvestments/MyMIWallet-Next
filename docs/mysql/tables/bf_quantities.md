# bf_quantities

## Source
- Migration: _None_
- Model:
- Code references: app/Modules/Management/Views/Web_Design/Forms/quantity_fields.php:2, app/Modules/User/Views/Referral_Program/Apply.php:11, app/Modules/User/Views/Referral_Program/New_Affiliate_Information.php:11, docs/_aiops/doc-change-log.md:1898

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_quantities` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_quantities`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_quantities'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_quantities'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

