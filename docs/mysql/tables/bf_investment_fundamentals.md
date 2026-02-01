# bf_investment_fundamentals

## Source
- Migration: _None_
- Model:
- Code references: app/Models/AlertsModel.php:1735, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:87, docs/_aiops/doc-change-log.md:1382

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investment_fundamentals` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `trade_id` int NOT NULL DEFAULT NULL,
  `metric` varchar(255) NOT NULL DEFAULT NULL,
  `current_value` varchar(50) NULL DEFAULT NULL,
  `yoy_change` varchar(50) NULL DEFAULT NULL,
  `year_2020` varchar(50) NULL DEFAULT NULL,
  `year_2021` varchar(50) NULL DEFAULT NULL,
  `year_2022` varchar(50) NULL DEFAULT NULL,
  `year_2023` varchar(50) NULL DEFAULT NULL,
  `year_2024` varchar(50) NULL DEFAULT NULL,
  `pe_ratio` decimal(10,2) NULL DEFAULT NULL,
  `pb_ratio` decimal(10,2) NULL DEFAULT NULL,
  `roe` decimal(10,2) NULL DEFAULT NULL,
  `profit_margin` decimal(10,2) NULL DEFAULT NULL,
  `debt_to_equity` decimal(10,2) NULL DEFAULT NULL,
  `current_ratio` decimal(10,2) NULL DEFAULT NULL,
  `quick_ratio` decimal(10,2) NULL DEFAULT NULL,
  `eps_growth` decimal(10,2) NULL DEFAULT NULL,
  `free_cash_flow` decimal(10,2) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- trade_id int NOT NULL
- metric varchar(255) NOT NULL
- current_value varchar(50) NULL
- yoy_change varchar(50) NULL
- year_2020 varchar(50) NULL
- year_2021 varchar(50) NULL
- year_2022 varchar(50) NULL
- year_2023 varchar(50) NULL
- year_2024 varchar(50) NULL
- pe_ratio decimal(10,2) NULL
- pb_ratio decimal(10,2) NULL
- roe decimal(10,2) NULL
- profit_margin decimal(10,2) NULL
- debt_to_equity decimal(10,2) NULL
- current_ratio decimal(10,2) NULL
- quick_ratio decimal(10,2) NULL
- eps_growth decimal(10,2) NULL
- free_cash_flow decimal(10,2) NULL
- created_at timestamp NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_investment_fundamentals`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_fundamentals'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_fundamentals'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

