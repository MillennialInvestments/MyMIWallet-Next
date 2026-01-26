# bf_squeeze_scorecards

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/MyMIInvestments.php:704, app/Libraries/MyMIInvestments.php:749, app/Libraries/MyMIInvestments.php:786, app/Libraries/MyMIInvestments.php:789, app/Models/SqueezeModel.php:75, app/Models/SqueezeModel.php:111, app/Models/SqueezeModel.php:178, app/Models/SqueezeModel.php:206, app/Models/SqueezeModel.php:209

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_squeeze_scorecards` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL

## Required indexes
- PRIMARY (id)

## Verification
```sql
SHOW CREATE TABLE `bf_squeeze_scorecards`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_squeeze_scorecards'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_squeeze_scorecards'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

