# bf_investment_economic_data

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/MyMIInvestments.php:1625, app/Models/InvestmentModel.php:600, app/Models/InvestmentModel.php:851

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investment_economic_data` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `title` varchar(255) NULL DEFAULT NULL,
  `notes` text NULL DEFAULT NULL,
  `realtime_start` date NULL DEFAULT NULL,
  `realtime_end` date NULL DEFAULT NULL,
  `observation_start` date NULL DEFAULT NULL,
  `observation_end` date NULL DEFAULT NULL,
  `frequency` varchar(100) NULL DEFAULT NULL,
  `units` varchar(100) NULL DEFAULT NULL,
  `seasonal_adjustment` varchar(100) NULL DEFAULT NULL,
  `last_updated` datetime NULL DEFAULT NULL,
  `popularity` int NULL DEFAULT NULL,
  `series_id` varchar(255) NULL DEFAULT NULL,
  `frequency_short` varchar(100) NULL DEFAULT NULL,
  `units_short` varchar(100) NULL DEFAULT NULL,
  `seasonal_adjustment_short` varchar(100) NULL DEFAULT NULL,
  `filter_variable` varchar(255) NULL DEFAULT NULL,
  `filter_value` varchar(255) NULL DEFAULT NULL,
  `order_by` varchar(255) NULL DEFAULT NULL,
  `sort_order` varchar(100) NULL DEFAULT NULL,
  `count` int NULL DEFAULT NULL,
  `offset` int NULL DEFAULT NULL,
  `content_limit` int NULL DEFAULT NULL,
  `geographical_info` text NULL DEFAULT NULL,
  `source_link` varchar(255) NULL DEFAULT NULL,
  `category` varchar(255) NULL DEFAULT NULL,
  `full_content` text NULL DEFAULT NULL,
  `summarized_content` text NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- title varchar(255) NULL
- notes text NULL
- realtime_start date NULL
- realtime_end date NULL
- observation_start date NULL
- observation_end date NULL
- frequency varchar(100) NULL
- units varchar(100) NULL
- seasonal_adjustment varchar(100) NULL
- last_updated datetime NULL
- popularity int NULL
- series_id varchar(255) NULL
- frequency_short varchar(100) NULL
- units_short varchar(100) NULL
- seasonal_adjustment_short varchar(100) NULL
- filter_variable varchar(255) NULL
- filter_value varchar(255) NULL
- order_by varchar(255) NULL
- sort_order varchar(100) NULL
- count int NULL
- offset int NULL
- content_limit int NULL
- geographical_info text NULL
- source_link varchar(255) NULL
- category varchar(255) NULL
- full_content text NULL
- summarized_content text NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_investment_economic_data`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_economic_data'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_economic_data'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

