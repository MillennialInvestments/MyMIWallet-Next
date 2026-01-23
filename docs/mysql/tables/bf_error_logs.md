-- Table: bf_error_logs
-- Sources: code: app/Models/DiscordModel.php:440, app/Models/DiscordModel.php:451, app/Modules/APIs/Controllers/ChatController.php:241, app/Modules/APIs/Controllers/ChatController.php:242, app/Modules/APIs/Controllers/ChatController.php:253, app/Modules/APIs/Controllers/MarketingController.php:1055, app/Modules/APIs/Controllers/ManagementController.php:2145, app/Log/Handlers/DatabaseLoggerHandler.php:34, app/Log/Handlers/DatabaseLoggerHandler.php:106, app/Log/Handlers/DatabaseLoggerHandler.php:109, app/Log/Handlers/DatabaseLoggerHandler.php:119, app/Commands/NewsAudit.php:702, app/Commands/NewsAudit.php:705, app/Commands/NewsAudit.php:718, app/Commands/AlertsAudit.php:544, app/Commands/AlertsAudit.php:557, app/Commands/LogHealthcheck.php:67, app/Commands/AuthAudit.php:1229, app/Commands/AuthAudit.php:1250, app/Commands/AuthAudit.php:1263, app/Libraries/MyMIMarketing.php:5379, app/Libraries/MyMIMarketing.php:5381, app/Libraries/MyMILogger.php:73, docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:38, docs/functional_inventory/docs_to_code_map.md:42, docs/functional_inventory/docs_to_code_map.md:49, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:86, docs/functional_inventory/docs_to_code_map.md:90, docs/functional_inventory/docs_to_code_map.md:93, docs/functional_inventory/docs_to_code_map.md:97, docs/functional_inventory/docs_to_code_map.md:124, docs/functional_inventory/docs_to_code_map.md:126, docs/functional_inventory/docs_to_code_map.md:129, docs/codex/00_master_plan.md:17, docs/codex/02_pr2_worker_and_registry.md:66, docs/ops/reviews/_index.md:32, docs/ops/control_plane_assumptions.md:15, docs/ops/control_plane_assumptions.md:16, docs/ops/control_plane_assumptions.md:16, docs/ops/runbooks/database-log-review.md:4, docs/ops/runbooks/database-log-review.md:14, docs/ops/runbooks/logger-repair.md:32, docs/ops/n8n-capabilities-for-mymiwallet.md:20, docs/ops/n8n-capabilities-for-mymiwallet.md:52, docs/ops/logging_healthcheck.md:6, docs/ops/logging_healthcheck.md:21, docs/ops/logs/logging_audit_2025-12-21.md:13, docs/ops/01-foundation.report.md:23, docs/ops/01-foundation.report.md:33, docs/ops/01-foundation.report.md:43, docs/ops/n8n_responsibilities.md:84, docs/integrations/technology_investor_integrations.md:286, docs/discord/marketing_news_automation.md:94, docs/discord/marketing_news_automation.md:112, docs/discord/server_setup_and_alert_routing.md:95, docs/discord/server_setup_and_alert_routing.md:189, docs/discord/mysql_discord_schema.md:133, docs/operations/08-security-compliance.md:24, docs/operations/01-foundation.report.md:23, docs/operations/01-foundation.report.md:33, docs/operations/01-foundation.report.md:43, docs/operations/05-database.md:20, docs/operations/05-database.md:20, docs/operations/05-database.md:29, docs/OVERVIEW.md:93, docs/OVERVIEW.md:120, docs/OVERVIEW.md:134, docs/OVERVIEW.md:187, docs/esports_preflight.md:11, docs/esports_preflight.md:26, docs/chatgpt/codex_executive_director/summary.md:12, docs/health/modules/system_ops.md:27, docs/health/modules/system_ops.md:32, docs/health/health_test_checklist.md:608, docs/health/health_test_checklist.md:613, docs/chat/README.md:32, docs/chat/OPS.md:15, docs/cron/jobs/ops_fetch_commands.md:27, docs/cron/jobs/ops_analyze_commands.md:25, docs/security/auth_registration_audit.md:56
CREATE TABLE IF NOT EXISTS `bf_error_logs` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_error_logs' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_error_logs` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_error_logs`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_error_logs'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_error_logs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

