# bf_investment_tickers

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/MyMIAlerts.php:1892, app/Libraries/MyMIAlerts.php:1919, app/Models/AlertsModel.php:110, app/Models/AlertsModel.php:214, app/Models/AlertsModel.php:218, app/Models/AlertsModel.php:257, app/Models/AlertsModel.php:434, app/Models/AlertsModel.php:575, app/Models/AlertsModel.php:576, app/Models/AlertsModel.php:576, app/Models/AlertsModel.php:1530, app/Models/AlertsModel.php:1544, app/Models/AlertsModel.php:1554, app/Models/AlertsModel.php:1571, app/Models/AlertsModel.php:1747, app/Models/AlertsModel.php:1821, app/Models/AlertsModel.php:1833, app/Models/AlertsModel.php:2907, app/Models/AlertsModel.php:2908, app/Models/AlertsModel.php:2940, app/Models/AlertsModel.php:2949, app/Models/AlertsModel.php:2976, app/Models/AlertsModel.php:2987, app/Models/AlertsModel.php:2995, app/Models/AlertsModel.php:3026, app/Models/InvestmentModel.php:528, app/Models/InvestmentModel.php:532, app/Models/InvestmentModel.php:646, app/Models/InvestmentModel.php:648, app/Modules/APIs/Controllers/InvestmentsController.php:401, app/Modules/APIs/Models/InvestmentsTickersModel.php:9, docs/marketing/02-budgeting-and-investments-libraries.md:41, docs/marketing/13-x-twitter-guide.md:42, docs/marketing/14-stocktwits-guide.md:42, docs/marketing/_templates/CAMPAIGN_TEMPLATE.md:25, docs/operations/05-database.md:16, docs/operations/05-database.md:27, docs/functional_inventory/docs_to_code_map.md:12, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:57, docs/functional_inventory/docs_to_code_map.md:68, docs/functional_inventory/docs_to_code_map.md:69, docs/functional_inventory/docs_to_code_map.md:75, docs/functional_inventory/docs_to_code_map.md:83, docs/functional_inventory/docs_to_code_map.md:90, docs/alerts/alerts_marketing_pipline.md:17, docs/notes/2025-11-23-alerts-preview-lazy-refresh-and-advisor-errors.md:31, docs/notes/2025-11-23-alerts-preview-lazy-refresh-and-advisor-errors.md:95, docs/chatgpt/mymi_alert_system/summary.md:73, docs/chatgpt/mymi_alert_system/summary.md:149, docs/chatgpt/mymi_alert_system/inventory.md:52, docs/chatgpt/mymi_alert_system/inventory.md:105, docs/chatgpt/mymi_alert_system/standards.md:127, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:94, docs/_aiops/doc-change-log.md:1409, docs/health/health_test_checklist.md:345, docs/health/modules/alerts.md:45, docs/forecasting/01_data_flow.md:12

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investment_tickers` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `symbol` varchar(10) NOT NULL DEFAULT NULL,
  `name` varchar(255) NULL DEFAULT NULL,
  `currency` varchar(10) NULL DEFAULT NULL,
  `exchange` varchar(50) NULL DEFAULT NULL,
  `created_on` datetime NULL DEFAULT NULL,
  `market_cap` decimal(20,2) NULL DEFAULT NULL,
  `mic_code` varchar(10) NULL DEFAULT NULL,
  `country` varchar(100) NULL DEFAULT 'US',
  `type` varchar(50) NOT NULL DEFAULT 'Stocks',
  `cik` varchar(10) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- symbol varchar(10) NOT NULL
- name varchar(255) NULL
- currency varchar(10) NULL
- exchange varchar(50) NULL
- created_on datetime NULL
- market_cap decimal(20,2) NULL
- mic_code varchar(10) NULL
- country varchar(100) NULL
- type varchar(50) NOT NULL
- cik varchar(10) NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_investment_tickers`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_tickers'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_tickers'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

