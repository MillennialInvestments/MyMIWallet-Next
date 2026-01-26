# bf_squeeze_fade_setups

## Source
- Migration: _None_
- Model:
- Code references: app/Models/SqueezeModel.php:91, app/Models/SqueezeModel.php:157

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_squeeze_fade_setups` (
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
SHOW CREATE TABLE `bf_squeeze_fade_setups`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_squeeze_fade_setups'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_squeeze_fade_setups'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

