# bf_investment_alert_enrichment

## Source
- Migration: _None_
- Model:
- Code references: app/Models/AlertsModel.php:951, app/Models/AlertsModel.php:2717

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investment_alert_enrichment` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `alert_id` int NOT NULL DEFAULT NULL,
  `symbol` varchar(128) NOT NULL DEFAULT NULL,
  `exchange` varchar(128) NULL DEFAULT NULL,
  `av_price` decimal(10,2) NULL DEFAULT NULL,
  `av_open` decimal(10,2) NULL DEFAULT NULL,
  `av_high` decimal(10,2) NULL DEFAULT NULL,
  `av_low` decimal(10,2) NULL DEFAULT NULL,
  `av_volume` bigint NULL DEFAULT NULL,
  `av_previous_close` decimal(10,2) NULL DEFAULT NULL,
  `av_change` decimal(10,2) NULL DEFAULT NULL,
  `av_change_percent` varchar(16) NULL DEFAULT NULL,
  `tv_financials_summary` text NULL DEFAULT NULL,
  `tv_technicals_summary` text NULL DEFAULT NULL,
  `tv_options_summary` text NULL DEFAULT NULL,
  `tv_news_snippets` text NULL DEFAULT NULL,
  `summary_generated` text NULL DEFAULT NULL,
  `gpt_template_used` text NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- alert_id int NOT NULL
- symbol varchar(128) NOT NULL
- exchange varchar(128) NULL
- av_price decimal(10,2) NULL
- av_open decimal(10,2) NULL
- av_high decimal(10,2) NULL
- av_low decimal(10,2) NULL
- av_volume bigint NULL
- av_previous_close decimal(10,2) NULL
- av_change decimal(10,2) NULL
- av_change_percent varchar(16) NULL
- tv_financials_summary text NULL
- tv_technicals_summary text NULL
- tv_options_summary text NULL
- tv_news_snippets text NULL
- summary_generated text NULL
- gpt_template_used text NULL
- created_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_investment_alert_enrichment`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_alert_enrichment'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_alert_enrichment'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

