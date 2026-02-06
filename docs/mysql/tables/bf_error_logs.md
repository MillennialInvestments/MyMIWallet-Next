# bf_error_logs

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/MyMILogger.php:73, app/Libraries/MyMIMarketing.php:5379, app/Libraries/MyMIMarketing.php:5381, app/Models/DiscordModel.php:440, app/Models/DiscordModel.php:451, app/Modules/APIs/Controllers/ChatController.php:242, app/Modules/APIs/Controllers/ChatController.php:243, app/Modules/APIs/Controllers/ChatController.php:254, app/Modules/APIs/Controllers/MarketingController.php:1055, app/Modules/APIs/Controllers/ManagementController.php:2159, app/Services/Spark/AuthAuditRunner.php:1210, app/Services/Spark/AuthAuditRunner.php:1231, app/Services/Spark/AuthAuditRunner.php:1244, app/Services/Spark/LogHealthcheckService.php:71, app/Services/Spark/LogHealthcheckService.php:76, app/Services/Spark/LogHealthcheckService.php:89, app/Commands/NewsAudit.php:725, app/Commands/NewsAudit.php:728, app/Commands/NewsAudit.php:741, app/Commands/AlertsAudit.php:567, app/Commands/AlertsAudit.php:580, app/Log/Handlers/DatabaseLoggerHandler.php:34, app/Log/Handlers/DatabaseLoggerHandler.php:106, app/Log/Handlers/DatabaseLoggerHandler.php:109, app/Log/Handlers/DatabaseLoggerHandler.php:119, docs/ops/runbooks/database-log-review.md:4, docs/ops/runbooks/database-log-review.md:14, docs/ops/runbooks/logger-repair.md:32, docs/ops/01-foundation.report.md:23, docs/ops/01-foundation.report.md:33, docs/ops/01-foundation.report.md:43, docs/ops/reviews/_index.md:32, docs/ops/control_plane_assumptions.md:15, docs/ops/control_plane_assumptions.md:16, docs/ops/control_plane_assumptions.md:16, docs/ops/logs/logging_audit_2025-12-21.md:13, docs/ops/logging_healthcheck.md:6, docs/ops/logging_healthcheck.md:21, docs/ops/n8n-capabilities-for-mymiwallet.md:20, docs/ops/n8n-capabilities-for-mymiwallet.md:52, docs/ops/n8n_responsibilities.md:84, docs/discord/server_setup_and_alert_routing.md:95, docs/discord/server_setup_and_alert_routing.md:189, docs/discord/mysql_discord_schema.md:133, docs/discord/marketing_news_automation.md:94, docs/discord/marketing_news_automation.md:112, docs/operations/01-foundation.report.md:23, docs/operations/01-foundation.report.md:33, docs/operations/01-foundation.report.md:43, docs/operations/05-database.md:20, docs/operations/05-database.md:20, docs/operations/05-database.md:29, docs/operations/08-security-compliance.md:24, docs/security/auth_registration_audit.md:56, docs/esports_preflight.md:11, docs/esports_preflight.md:26, docs/OVERVIEW.md:93, docs/OVERVIEW.md:120, docs/OVERVIEW.md:134, docs/OVERVIEW.md:187, docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:38, docs/functional_inventory/docs_to_code_map.md:42, docs/functional_inventory/docs_to_code_map.md:49, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:86, docs/functional_inventory/docs_to_code_map.md:90, docs/functional_inventory/docs_to_code_map.md:93, docs/functional_inventory/docs_to_code_map.md:97, docs/functional_inventory/docs_to_code_map.md:124, docs/functional_inventory/docs_to_code_map.md:126, docs/functional_inventory/docs_to_code_map.md:129, docs/chatgpt/codex_executive_director/summary.md:12, docs/chatgpt/archive/MyMI_Codex_Executive/Spark_Automation_Framework_and_Codex_Executive_Plan.md:91, docs/codex/00_master_plan.md:17, docs/codex/02_pr2_worker_and_registry.md:66, docs/cron/jobs/ops_analyze_commands.md:25, docs/cron/jobs/ops_fetch_commands.md:27, docs/integrations/technology_investor_integrations.md:286, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:68, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:68, docs/_aiops/doc-change-log.md:1316, docs/chat/README.md:32, docs/chat/OPS.md:15, docs/health/health_test_checklist.md:608, docs/health/health_test_checklist.md:613, docs/health/modules/system_ops.md:27, docs/health/modules/system_ops.md:32, docs/spark/categories/alerts/alerts-audit.md:13, docs/spark/categories/alerts/alerts-audit.md:20, docs/spark/categories/alerts/alerts-audit.md:34, docs/spark/categories/auth/auth-audit.md:13, docs/spark/categories/auth/auth-audit.md:35, docs/spark/categories/logs/logs-healthcheck.md:13, docs/spark/categories/marketing/news-audit.md:13, docs/spark/categories/marketing/news-audit.md:20

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_error_logs` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL DEFAULT 404,
  `path` varchar(255) NOT NULL DEFAULT NULL,
  `full_url` text NOT NULL DEFAULT NULL,
  `ip_address` varchar(45) NULL DEFAULT NULL,
  `user_agent` text NULL DEFAULT NULL,
  `uri` varchar(255) NULL DEFAULT NULL,
  `method` varchar(16) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `level` varchar(10) NOT NULL DEFAULT 'error',
  `message` text NULL DEFAULT NULL,
  `context` text NULL DEFAULT NULL,
  `file` varchar(255) NULL DEFAULT NULL,
  `line` int NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- type varchar(10) NOT NULL
- path varchar(255) NOT NULL
- full_url text NOT NULL
- ip_address varchar(45) NULL
- user_agent text NULL
- uri varchar(255) NULL
- method varchar(16) NULL
- created_at datetime NULL
- level varchar(10) NOT NULL
- message text NULL
- context text NULL
- file varchar(255) NULL
- line int NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_error_logs`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_error_logs'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_error_logs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

