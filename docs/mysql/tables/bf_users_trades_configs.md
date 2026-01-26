# bf_users_trades_configs

## Source
- Migration: _None_
- Model:
- Code references: app/Models/TrackerModel.php:251, app/Models/InvestmentModel.php:370

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_trades_configs` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT NULL,
  `config_name` varchar(255) NULL DEFAULT NULL,
  `config_value` varchar(255) NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 1,
  `created_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `modified_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- user_id int NOT NULL
- config_name varchar(255) NULL
- config_value varchar(255) NULL
- status tinyint(1) NULL
- created_on datetime NULL
- modified_on datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_trades_configs`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_trades_configs'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_trades_configs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

