# MyMI Wallet – DB Schema Adjustment Log
Date: 2026-02-05
Command: php spark db:inventory

## Summary
- Tables analyzed: 428
- Missing tables: 186
- Missing columns: 27
- Missing indexes: 56

## Result
❌ Schema drift detected

## Missing tables
- bf_action_login
- bf_aiops_budget
- bf_aiops_cache
- bf_aiops_dedupe
- bf_aiops_email_processed
- bf_aiops_runs
- bf_aiops_usage
- bf_aiops_workflows
- bf_announcements
- bf_api_requests
- bf_api_responses
- bf_api_tokens
- bf_applications
- bf_asset_management
- bf_assets
- bf_auction_activity
- bf_auction_balances
- bf_auction_bids
- bf_auction_items
- bf_auction_lots
- bf_auction_payments
- bf_auction_settlements
- bf_auction_watchlist
- bf_auctions
- bf_audience
- bf_audit_logs
- bf_audit_trail
- bf_auth_health_runs
- bf_backup_manifests
- bf_campaign_auto_logs
- bf_campaigns
- bf_chat_steps
- bf_circuit_breakers
- bf_contactus
- bf_content_enrichment_cache
- bf_contractors
- bf_csrf_tokens
- bf_dashboard_construction_to_do_list
- bf_dashboard_navbar
- bf_dashboard_navbar_indash
- bf_dashboard_upgrade
- bf_dashboard_upgrades
- bf_dashboards
- bf_discord_achievements
- bf_discord_events
- bf_discord_rate_limits
- bf_discord_user_achievements
- bf_email_open_tracking
- bf_email_tag_usage
- bf_employees
- bf_esports_creators
- bf_esports_disputes
- bf_esports_entries
- bf_esports_escrows
- bf_esports_events
- bf_esports_jobs
- bf_esports_payouts
- bf_esports_pools
- bf_esports_sponsorships
- bf_esports_webhooks
- bf_exchange_auctions
- bf_exchanges_blockchains
- bf_exchanges_coin_listing
- bf_exchanges_order
- bf_external_sites
- bf_failed_jobs
- bf_feature_flag_overrides
- bf_feature_flags
- bf_fin_positions_daily
- bf_fin_prices_eod
- bf_fin_risk_breaches
- bf_fin_risk_budgets
- bf_fin_trades
- bf_gdpr_requests
- bf_go_live_checklist
- bf_idempotency
- bf_inbound_webhooks
- bf_integrations_accounts
- bf_integrations_events
- bf_integrations_sync_jobs
- bf_integrations_webhooks
- bf_internal_team_messages
- bf_investment_alert_jobs
- bf_investment_alerts
- bf_investment_chart_analysis
- bf_investment_forecast_accuracy
- bf_investment_forecast_jobs
- bf_investment_goals
- bf_investment_price_forecasts
- bf_investment_scanner_lineage
- bf_investment_ticker_daily_counts
- bf_investment_trades
- bf_investments_overview
- bf_leads
- bf_legal_holds
- bf_management_alerts
- bf_market_news
- bf_marketing_email_bounces
- bf_marketing_generated_posts
- bf_marketing_page_views
- bf_marketing_page_views_per_user
- bf_marketing_posts
- bf_marketing_raw_emails
- bf_mdit_deposits
- bf_mdit_disclosures_acceptance
- bf_mdit_investor_profiles
- bf_mdit_nav_snapshots
- bf_mdit_redemptions
- bf_mdit_token_ledger
- bf_mdit_wallets
- bf_mdit_webhook_events
- bf_messaging
- bf_mymi_news
- bf_mymi_research
- bf_onboarding_progress
- bf_onboarding_steps
- bf_ops_runs
- bf_page_seo
- bf_password_history
- bf_password_reset_attempts
- bf_permission_role
- bf_permissions
- bf_posts
- bf_privacy_requests
- bf_project_distributions
- bf_project_scheduling
- bf_project_token_allocations
- bf_project_withdrawals
- bf_projects_inbox
- bf_push_subscriptions
- bf_quantities
- bf_questions
- bf_referrals
- bf_role_user
- bf_roles
- bf_script_studio
- bf_search_logs
- bf_security
- bf_security_events
- bf_security_log
- bf_security_settings
- bf_services
- bf_squeeze_fade_setups
- bf_squeeze_scorecards
- bf_squeeze_universe
- bf_squeeze_zoomout
- bf_suggestions
- bf_support_feedback
- bf_tax_rates_ibfk_1
- bf_tax_return_lines_ibfk_1
- bf_timezone
- bf_token_holders
- bf_token_transfers
- bf_tokens
- bf_trade_alert_enrichment
- bf_user_2fa
- bf_user_broker_links
- bf_user_consent
- bf_user_events
- bf_user_permission_overrides
- bf_user_roles
- bf_user_sessions
- bf_user_setup_preferences
- bf_user_tax_return_jurisdictions_ibfk_1
- bf_user_tax_return_jurisdictions_ibfk_2
- bf_user_tax_return_values_ibfk_1
- bf_user_tax_return_values_ibfk_2
- bf_user_tax_returns_ibfk_1
- bf_user_wallets
- bf_users_accounting_accounts
- bf_users_bank_transactions
- bf_users_brokerage_accounts
- bf_users_discord_links
- bf_users_ecommerce_accounts
- bf_users_email_subscriptions
- bf_users_investments
- bf_users_posts
- bf_users_public_tokens
- bf_users_purchases
- bf_users_stock_research
- bf_users_trading_accounts
- bf_users_wallet_brokerages
- bf_users_wallets
- bf_wallet_providers
- bf_wallets
- bf_webhook_outbox

## Missing columns
- bf_aiops_registry.task_key
- bf_aiops_registry.handler
- bf_aiops_registry.description
- bf_aiops_registry.safe_mode_allowed
- bf_aiops_task_runs.created_at
- bf_aiops_task_runs.updated_at
- bf_chat_archives.chat_file
- bf_chat_archives.project
- bf_chat_archives.title
- bf_chat_archives.overall_status
- bf_chat_archives.next_required_step
- bf_chat_archives.last_updated
- bf_chat_archives.updated_at
- bf_investment_forecast_history.forecast_id
- bf_investment_forecast_history.ticker
- bf_investment_forecast_history.timeframe
- bf_investment_forecast_history.forecast_direction
- bf_investment_forecast_history.target_price
- bf_investment_forecast_history.range_low
- bf_investment_forecast_history.range_high
- bf_investment_forecast_history.indicators_json
- bf_ops_command_inbox.message_id
- bf_ops_command_inbox.raw_body
- bf_ops_command_inbox.ai_plan_json
- bf_ops_command_inbox.ai_summary
- bf_ops_command_inbox.security_flags
- bf_ops_command_inbox.meta_json

## Missing indexes
- bf_ai_ops_caps.subsystem
- bf_ai_ops_events.subsystem_created_at
- bf_ai_ops_events.event_type_created_at
- bf_ai_ops_runs.job_key_started_at
- bf_ai_ops_runs.subsystem_started_at
- bf_ai_ops_usage.month_key_subsystem
- bf_aiops_registry.task_key
- bf_aiops_task_runs.task_id
- bf_aiops_task_runs.status
- bf_aiops_task_runs.created_at
- bf_aiops_tasks.status
- bf_aiops_tasks.locked_at
- bf_aiops_tasks.assigned_to
- bf_aiops_tasks.task_key
- bf_chat_archives.project
- bf_chat_archives.chat_date
- bf_chat_archives.overall_status
- bf_chat_archives.chat_file
- bf_email_outbox.user_id
- bf_email_outbox.type
- bf_email_outbox.status
- bf_email_outbox.created_at
- bf_investment_forecast_history.forecast_id
- bf_investment_forecast_history.ticker
- bf_investment_forecast_history.recorded_at
- bf_ops_command_inbox.status
- bf_ops_command_inbox.received_at
- bf_predictions_liquidity.market_id_option_id
- bf_predictions_liquidity.provider_user_id
- bf_predictions_liquidity.state
- bf_predictions_markets.state
- bf_predictions_markets.category
- bf_predictions_markets.lock_at
- bf_predictions_markets.created_by
- bf_predictions_markets.slug
- bf_predictions_options.market_id_label
- bf_predictions_options.is_winner
- bf_predictions_orders.user_id
- bf_predictions_orders.market_id
- bf_predictions_orders.option_id
- bf_predictions_orders.user_id_state
- bf_predictions_orders.market_id_state
- bf_predictions_payouts.user_id
- bf_predictions_payouts.market_id
- bf_predictions_payouts.position_id
- bf_predictions_payouts.status
- bf_predictions_positions.user_id
- bf_predictions_positions.market_id
- bf_predictions_positions.option_id
- bf_predictions_positions.user_id_market_id_option_id
- bf_predictions_settlements.market_id
- bf_predictions_settlements.resolver_user_id
- bf_predictions_trades.order_id
- bf_predictions_trades.user_id
- bf_predictions_trades.market_id
- bf_predictions_trades.option_id

## SQL Required
```sql
-- MyMI Wallet adjustment SQL

-- Missing tables
CREATE TABLE IF NOT EXISTS `bf_action_login` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_aiops_budget` (
  `used_usd` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_aiops_cache` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_aiops_dedupe` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_aiops_email_processed` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `mailbox` VARCHAR(190) NOT NULL,
  `imap_uid` BIGINT UNSIGNED NOT NULL,
  `message_id` VARCHAR(255) NULL,
  `from_email` VARCHAR(255) NULL,
  `subject` VARCHAR(255) NULL,
  `received_at` DATETIME NULL,
  `processed_at` DATETIME NULL,
  `status` VARCHAR(32) NOT NULL DEFAULT 'stored',
  `meta_json` LONGTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mailbox_imap_uid` (`mailbox`, `imap_uid`),
  KEY `received_at` (`received_at`),
  KEY `from_email` (`from_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_aiops_runs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `run_key` VARCHAR(64) NOT NULL,
  `mailbox` VARCHAR(190) NOT NULL,
  `source_email` VARCHAR(255) NULL,
  `status` VARCHAR(32) NOT NULL DEFAULT 'running',
  `started_at` DATETIME NULL,
  `finished_at` DATETIME NULL,
  `duration_seconds` INT NULL,
  `scanned_count` INT NOT NULL DEFAULT 0,
  `processed_count` INT NOT NULL DEFAULT 0,
  `duplicate_count` INT NOT NULL DEFAULT 0,
  `ticker_count` INT NOT NULL DEFAULT 0,
  `meta_json` LONGTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `run_key` (`run_key`),
  KEY `status` (`status`),
  KEY `started_at` (`started_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_aiops_usage` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_aiops_workflows` (
  `enabled` TEXT NULL,
  `slug` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_announcements` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_api_requests` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_api_responses` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_api_tokens` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_applications` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_asset_management` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_assets` (
  `name` TEXT NULL,
  `created_at` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_auction_activity` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_auction_balances` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_auction_bids` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_auction_items` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `md` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_auction_lots` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_auction_payments` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_auction_settlements` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_auction_watchlist` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_auctions` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_audience` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_audit_logs` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_audit_trail` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_auth_health_runs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `run_at` DATETIME NOT NULL,
  `status` VARCHAR(10) NOT NULL,
  `score` INT(11) NOT NULL DEFAULT 0,
  `summary` VARCHAR(255) NOT NULL,
  `details_json` LONGTEXT NULL,
  `duration_ms` INT(11) NOT NULL DEFAULT 0,
  `server` VARCHAR(64) NOT NULL,
  `build_tag` VARCHAR(64) NULL,
  PRIMARY KEY (`id`),
  KEY `run_at` (`run_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_backup_manifests` (
  `created_at` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_campaign_auto_logs` (
  `campaign_id` TEXT NULL,
  `created_at` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_campaigns` (
  `name` TEXT NULL,
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `md` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_chat_steps` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `chat_archive_id` BIGINT UNSIGNED NOT NULL,
  `step` VARCHAR(20) NOT NULL,
  `status` VARCHAR(30) NOT NULL DEFAULT 'unknown',
  `detected_at` DATETIME NOT NULL,
  `notes` TEXT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `chat_archive_id_step` (`chat_archive_id`, `step`),
  KEY `chat_archive_id` (`chat_archive_id`),
  KEY `step` (`step`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_circuit_breakers` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_contactus` (
  `Name` TEXT NULL,
  `email` TEXT NULL,
  `phone` TEXT NULL,
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` TEXT NULL,
  `md` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_content_enrichment_cache` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_contractors` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_csrf_tokens` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_dashboard_construction_to_do_list` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `md` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_dashboard_navbar` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `md` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_dashboard_navbar_indash` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `md` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_dashboard_upgrade` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `md` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_dashboard_upgrades` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `md` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_dashboards` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `md` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_discord_achievements` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_discord_events` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_discord_rate_limits` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_discord_user_achievements` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_email_open_tracking` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_email_tag_usage` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_employees` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_esports_creators` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `md` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_esports_disputes` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_esports_entries` (
  `event_id` TEXT NULL,
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `md` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_esports_escrows` (
  `event_id` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_esports_events` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `md` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_esports_jobs` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `md` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_esports_payouts` (
  `event_id` TEXT NULL,
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `md` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_esports_pools` (
  `event_id` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_esports_sponsorships` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_esports_webhooks` (
  `payload_digest` TEXT NULL,
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `md` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_exchange_auctions` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_exchanges_blockchains` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_exchanges_coin_listing` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_exchanges_order` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_external_sites` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_failed_jobs` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_feature_flag_overrides` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_feature_flags` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_fin_positions_daily` (
  `user_id` TEXT NULL,
  `date` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_fin_prices_eod` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_fin_risk_breaches` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_fin_risk_budgets` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_fin_trades` (
  `user_id` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_gdpr_requests` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_go_live_checklist` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_idempotency` (
  `response_json` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_inbound_webhooks` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_integrations_accounts` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_integrations_events` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_integrations_sync_jobs` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_integrations_webhooks` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_internal_team_messages` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_investment_alert_jobs` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_investment_alerts` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_investment_chart_analysis` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_investment_forecast_accuracy` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `forecast_id` BIGINT UNSIGNED NOT NULL,
  `ticker` VARCHAR(16) NOT NULL,
  `timeframe` VARCHAR(16) NOT NULL,
  `evaluation_window` INT(6) NOT NULL,
  `forecast_direction` ENUM('bullish','bearish','neutral') NOT NULL,
  `confidence_score` INT(3) NOT NULL DEFAULT 0,
  `target_price` DECIMAL(16,6) NULL,
  `range_low` DECIMAL(16,6) NULL,
  `range_high` DECIMAL(16,6) NULL,
  `hit_result` VARCHAR(16) NOT NULL DEFAULT 'unknown',
  `mfe` DECIMAL(16,6) NULL,
  `mae` DECIMAL(16,6) NULL,
  `window_start` DATETIME NULL,
  `window_end` DATETIME NULL,
  `evaluated_at` DATETIME NULL,
  `notes` TEXT NULL,
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  KEY `forecast_id` (`forecast_id`),
  KEY `ticker` (`ticker`),
  KEY `timeframe` (`timeframe`),
  KEY `evaluation_window` (`evaluation_window`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_investment_forecast_jobs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `alert_id` BIGINT UNSIGNED NULL,
  `ticker` VARCHAR(16) NOT NULL,
  `status` VARCHAR(16) NOT NULL DEFAULT 'queued',
  `attempts` INT(3) NOT NULL DEFAULT 0,
  `run_after` DATETIME NULL,
  `payload_json` LONGTEXT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `alert_id` (`alert_id`),
  KEY `status` (`status`),
  KEY `run_after` (`run_after`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_investment_goals` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_investment_price_forecasts` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `alert_id` BIGINT UNSIGNED NULL,
  `ticker` VARCHAR(16) NOT NULL,
  `timeframe` VARCHAR(16) NOT NULL,
  `forecast_direction` ENUM('bullish','bearish','neutral') NOT NULL,
  `target_price` DECIMAL(16,6) NULL,
  `range_low` DECIMAL(16,6) NULL,
  `range_high` DECIMAL(16,6) NULL,
  `confidence_score` INT(3) NOT NULL DEFAULT 0,
  `signal_score` DECIMAL(10,4) NULL,
  `indicators_json` LONGTEXT NULL,
  `data_source` VARCHAR(32) NOT NULL DEFAULT 'alphavantage',
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `ticker_timeframe` (`ticker`, `timeframe`),
  KEY `alert_id` (`alert_id`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_investment_scanner_lineage` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `scanner_key` VARCHAR(64) NOT NULL,
  `scanner_name` VARCHAR(190) NOT NULL,
  `source` VARCHAR(64) NOT NULL DEFAULT 'email',
  `meta_json` LONGTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `scanner_key_scanner_name_source` (`scanner_key`, `scanner_name`, `source`),
  KEY `scanner_key` (`scanner_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_investment_ticker_daily_counts` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticker` VARCHAR(16) NOT NULL,
  `scan_date` DATE NOT NULL,
  `source` VARCHAR(64) NOT NULL DEFAULT 'email',
  `scanner_key` VARCHAR(64) NOT NULL DEFAULT '',
  `occurrences` INT UNSIGNED NOT NULL DEFAULT 0,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ticker_scan_date_source_scanner_key` (`ticker`, `scan_date`, `source`, `scanner_key`),
  KEY `scan_date` (`scan_date`),
  KEY `scanner_key` (`scanner_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_investment_trades` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_investments_overview` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_leads` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_legal_holds` (
  `user_id` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_management_alerts` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_market_news` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_marketing_email_bounces` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_marketing_generated_posts` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_marketing_page_views` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_marketing_page_views_per_user` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_marketing_posts` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_marketing_raw_emails` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_mdit_deposits` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `wallet_address` VARCHAR(128) NOT NULL,
  `chain` VARCHAR(32) NOT NULL,
  `asset_symbol` VARCHAR(16) NOT NULL,
  `amount` DECIMAL(18,8) NOT NULL,
  `tx_hash` VARCHAR(191) NULL,
  `confirmations` INT(11) NOT NULL DEFAULT 0,
  `status` VARCHAR(32) NOT NULL DEFAULT 'CREATED',
  `idempotency_key` VARCHAR(191) NOT NULL,
  `provider_event_id` VARCHAR(191) NULL,
  `created_on` DATETIME NULL,
  `updated_on` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tx_hash` (`tx_hash`),
  UNIQUE KEY `idempotency_key` (`idempotency_key`),
  KEY `user_id` (`user_id`),
  KEY `status` (`status`),
  KEY `created_on` (`created_on`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_mdit_disclosures_acceptance` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `disclosure_version` VARCHAR(32) NOT NULL,
  `accepted_on` DATETIME NULL,
  `ip_address` VARCHAR(64) NULL,
  `user_agent` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `accepted_on` (`accepted_on`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_mdit_investor_profiles` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `kyc_status` VARCHAR(32) NOT NULL DEFAULT 'PENDING',
  `accreditation_status` VARCHAR(32) NOT NULL DEFAULT 'PENDING',
  `risk_ack_on` DATETIME NULL,
  `created_on` DATETIME NULL,
  `updated_on` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `created_on` (`created_on`),
  KEY `kyc_status` (`kyc_status`),
  KEY `accreditation_status` (`accreditation_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_mdit_nav_snapshots` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `as_of_date` DATE NOT NULL,
  `nav_total` DECIMAL(18,8) NOT NULL,
  `token_supply` DECIMAL(18,8) NOT NULL,
  `nav_per_unit` DECIMAL(18,8) NOT NULL,
  `cash_value` DECIMAL(18,8) NOT NULL,
  `equities_value` DECIMAL(18,8) NOT NULL,
  `created_on` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `as_of_date` (`as_of_date`),
  KEY `created_on` (`created_on`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_mdit_redemptions` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `wallet_address` VARCHAR(128) NOT NULL,
  `token_units` DECIMAL(18,8) NOT NULL,
  `requested_on` DATETIME NULL,
  `approved_on` DATETIME NULL,
  `approved_by` INT(11) UNSIGNED NULL,
  `status` VARCHAR(32) NOT NULL DEFAULT 'REQUESTED',
  `payout_asset` VARCHAR(32) NULL,
  `payout_amount` DECIMAL(18,8) NULL,
  `notes` VARCHAR(512) NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `status` (`status`),
  KEY `requested_on` (`requested_on`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_mdit_token_ledger` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `wallet_address` VARCHAR(128) NOT NULL,
  `token_symbol` VARCHAR(16) NOT NULL,
  `units` DECIMAL(18,8) NOT NULL,
  `nav_at_mint` DECIMAL(18,8) NULL,
  `minted_on` DATETIME NULL,
  `burned_on` DATETIME NULL,
  `source_deposit_id` INT(11) UNSIGNED NULL,
  `source_redemption_id` INT(11) UNSIGNED NULL,
  `status` VARCHAR(32) NOT NULL DEFAULT 'MINTED',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `status` (`status`),
  KEY `source_deposit_id` (`source_deposit_id`),
  KEY `source_redemption_id` (`source_redemption_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_mdit_wallets` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `wallet_address` VARCHAR(128) NOT NULL,
  `chain` VARCHAR(32) NOT NULL,
  `is_primary` TINYINT(1) NOT NULL DEFAULT 0,
  `status` VARCHAR(32) NOT NULL DEFAULT 'ACTIVE',
  `created_on` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `wallet_address` (`wallet_address`),
  KEY `user_id` (`user_id`),
  KEY `status` (`status`),
  KEY `created_on` (`created_on`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_mdit_webhook_events` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `provider` VARCHAR(64) NOT NULL,
  `event_id` VARCHAR(191) NOT NULL,
  `event_type` VARCHAR(64) NOT NULL,
  `payload_json` LONGTEXT NOT NULL,
  `payload_hash` VARCHAR(128) NOT NULL,
  `received_on` DATETIME NULL,
  `processed_on` DATETIME NULL,
  `status` VARCHAR(32) NOT NULL DEFAULT 'RECEIVED',
  `error_message` VARCHAR(512) NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `provider_event_id` (`provider`, `event_id`),
  KEY `status` (`status`),
  KEY `received_on` (`received_on`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_messaging` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_mymi_news` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_mymi_research` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_onboarding_progress` (
  `user_id` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_onboarding_steps` (
  `code` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_ops_runs` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_page_seo` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_password_history` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_password_reset_attempts` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_permission_role` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_permissions` (
  `slug` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_posts` (
  `status` TEXT NULL,
  `title` TEXT NULL,
  `created_at` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_privacy_requests` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_project_distributions` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_project_scheduling` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_project_token_allocations` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_project_withdrawals` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_projects_inbox` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_push_subscriptions` (
  `user_id` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_quantities` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_questions` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_referrals` (
  `status` TEXT NULL,
  `reward_days` TEXT NULL,
  `partner_pct` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_role_user` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_roles` (
  `slug` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_script_studio` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_search_logs` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_security` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_security_events` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_security_log` (
  `user_id` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_security_settings` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_services` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_squeeze_fade_setups` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_squeeze_scorecards` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_squeeze_universe` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_squeeze_zoomout` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_suggestions` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_support_feedback` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_tax_rates_ibfk_1` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_tax_return_lines_ibfk_1` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_timezone` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_token_holders` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_token_transfers` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_tokens` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_trade_alert_enrichment` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_2fa` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_broker_links` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_consent` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_events` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NULL,
  `event_key` VARCHAR(64) NOT NULL,
  `event_group` VARCHAR(32) NOT NULL,
  `referral_code` VARCHAR(64) NULL,
  `ip` VARCHAR(45) NULL,
  `user_agent` VARCHAR(255) NULL,
  `meta_json` LONGTEXT NULL,
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `event_key` (`event_key`),
  KEY `event_group` (`event_group`),
  KEY `referral_code` (`referral_code`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_permission_overrides` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_roles` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_sessions` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_setup_preferences` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `dismiss_all` TINYINT(1) NOT NULL DEFAULT 0,
  `dismiss_budget` TINYINT(1) NOT NULL DEFAULT 0,
  `dismiss_wallets` TINYINT(1) NOT NULL DEFAULT 0,
  `dismiss_dashboard` TINYINT(1) NOT NULL DEFAULT 0,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_tax_return_jurisdictions_ibfk_1` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_tax_return_jurisdictions_ibfk_2` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_tax_return_values_ibfk_1` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_tax_return_values_ibfk_2` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_tax_returns_ibfk_1` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_wallets` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_accounting_accounts` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_bank_transactions` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_brokerage_accounts` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_discord_links` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_ecommerce_accounts` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_email_subscriptions` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_investments` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_posts` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_public_tokens` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_purchases` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_stock_research` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_trading_accounts` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_wallet_brokerages` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_wallets` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_wallet_providers` (
  `enabled` TEXT NULL,
  `sort_order` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_wallets` (
  `user_id` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_webhook_outbox` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Missing columns
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_caps' AND index_name = 'subsystem');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_ai_ops_caps` ADD UNIQUE INDEX `subsystem` (`subsystem`)', 'SELECT ''index subsystem already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_events' AND index_name = 'subsystem_created_at');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_ai_ops_events` ADD INDEX `subsystem_created_at` (`subsystem`, `created_at`)', 'SELECT ''index subsystem_created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_events' AND index_name = 'event_type_created_at');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_ai_ops_events` ADD INDEX `event_type_created_at` (`event_type`, `created_at`)', 'SELECT ''index event_type_created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_runs' AND index_name = 'job_key_started_at');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_ai_ops_runs` ADD INDEX `job_key_started_at` (`job_key`, `started_at`)', 'SELECT ''index job_key_started_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_runs' AND index_name = 'subsystem_started_at');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_ai_ops_runs` ADD INDEX `subsystem_started_at` (`subsystem`, `started_at`)', 'SELECT ''index subsystem_started_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_usage' AND index_name = 'month_key_subsystem');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_ai_ops_usage` ADD UNIQUE INDEX `month_key_subsystem` (`month_key`, `subsystem`)', 'SELECT ''index month_key_subsystem already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_registry' AND column_name = 'task_key');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_aiops_registry` ADD COLUMN `task_key` VARCHAR(190) NOT NULL', 'SELECT ''column task_key already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_registry' AND column_name = 'handler');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_aiops_registry` ADD COLUMN `handler` VARCHAR(190) NOT NULL', 'SELECT ''column handler already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_registry' AND column_name = 'description');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_aiops_registry` ADD COLUMN `description` TEXT NULL', 'SELECT ''column description already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_registry' AND column_name = 'safe_mode_allowed');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_aiops_registry` ADD COLUMN `safe_mode_allowed` TINYINT(1) NOT NULL DEFAULT 1', 'SELECT ''column safe_mode_allowed already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_registry' AND index_name = 'task_key');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_aiops_registry` ADD UNIQUE INDEX `task_key` (`task_key`)', 'SELECT ''index task_key already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_task_runs' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_aiops_task_runs` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_task_runs' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_aiops_task_runs` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_task_runs' AND index_name = 'task_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_aiops_task_runs` ADD INDEX `task_id` (`task_id`)', 'SELECT ''index task_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_task_runs' AND index_name = 'status');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_aiops_task_runs` ADD INDEX `status` (`status`)', 'SELECT ''index status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_task_runs' AND index_name = 'created_at');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_aiops_task_runs` ADD INDEX `created_at` (`created_at`)', 'SELECT ''index created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_tasks' AND index_name = 'status');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_aiops_tasks` ADD INDEX `status` (`status`)', 'SELECT ''index status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_tasks' AND index_name = 'locked_at');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_aiops_tasks` ADD INDEX `locked_at` (`locked_at`)', 'SELECT ''index locked_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_tasks' AND index_name = 'assigned_to');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_aiops_tasks` ADD INDEX `assigned_to` (`assigned_to`)', 'SELECT ''index assigned_to already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_tasks' AND index_name = 'task_key');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_aiops_tasks` ADD UNIQUE INDEX `task_key` (`task_key`)', 'SELECT ''index task_key already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_chat_archives' AND column_name = 'chat_file');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_chat_archives` ADD COLUMN `chat_file` VARCHAR(255) NOT NULL', 'SELECT ''column chat_file already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_chat_archives' AND column_name = 'project');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_chat_archives` ADD COLUMN `project` VARCHAR(120) NOT NULL DEFAULT ''default''', 'SELECT ''column project already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_chat_archives' AND column_name = 'title');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_chat_archives` ADD COLUMN `title` VARCHAR(255) NULL', 'SELECT ''column title already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_chat_archives' AND column_name = 'overall_status');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_chat_archives` ADD COLUMN `overall_status` VARCHAR(40) NOT NULL DEFAULT ''unknown''', 'SELECT ''column overall_status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_chat_archives' AND column_name = 'next_required_step');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_chat_archives` ADD COLUMN `next_required_step` VARCHAR(40) NULL', 'SELECT ''column next_required_step already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_chat_archives' AND column_name = 'last_updated');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_chat_archives` ADD COLUMN `last_updated` DATETIME NULL', 'SELECT ''column last_updated already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_chat_archives' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_chat_archives` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_chat_archives' AND index_name = 'project');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_chat_archives` ADD INDEX `project` (`project`)', 'SELECT ''index project already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_chat_archives' AND index_name = 'chat_date');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_chat_archives` ADD INDEX `chat_date` (`chat_date`)', 'SELECT ''index chat_date already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_chat_archives' AND index_name = 'overall_status');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_chat_archives` ADD INDEX `overall_status` (`overall_status`)', 'SELECT ''index overall_status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_chat_archives' AND index_name = 'chat_file');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_chat_archives` ADD UNIQUE INDEX `chat_file` (`chat_file`)', 'SELECT ''index chat_file already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_email_outbox' AND index_name = 'user_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_email_outbox` ADD INDEX `user_id` (`user_id`)', 'SELECT ''index user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_email_outbox' AND index_name = 'type');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_email_outbox` ADD INDEX `type` (`type`)', 'SELECT ''index type already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_email_outbox' AND index_name = 'status');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_email_outbox` ADD INDEX `status` (`status`)', 'SELECT ''index status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_email_outbox' AND index_name = 'created_at');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_email_outbox` ADD INDEX `created_at` (`created_at`)', 'SELECT ''index created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_forecast_history' AND column_name = 'forecast_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_forecast_history` ADD COLUMN `forecast_id` BIGINT UNSIGNED NOT NULL', 'SELECT ''column forecast_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_forecast_history' AND column_name = 'ticker');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_forecast_history` ADD COLUMN `ticker` VARCHAR(16) NOT NULL', 'SELECT ''column ticker already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_forecast_history' AND column_name = 'timeframe');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_forecast_history` ADD COLUMN `timeframe` VARCHAR(16) NOT NULL', 'SELECT ''column timeframe already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_forecast_history' AND column_name = 'forecast_direction');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_forecast_history` ADD COLUMN `forecast_direction` ENUM(''bullish'',''bearish'',''neutral'') NOT NULL', 'SELECT ''column forecast_direction already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_forecast_history' AND column_name = 'target_price');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_forecast_history` ADD COLUMN `target_price` DECIMAL(16,6) NULL', 'SELECT ''column target_price already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_forecast_history' AND column_name = 'range_low');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_forecast_history` ADD COLUMN `range_low` DECIMAL(16,6) NULL', 'SELECT ''column range_low already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_forecast_history' AND column_name = 'range_high');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_forecast_history` ADD COLUMN `range_high` DECIMAL(16,6) NULL', 'SELECT ''column range_high already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_forecast_history' AND column_name = 'indicators_json');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_forecast_history` ADD COLUMN `indicators_json` LONGTEXT NULL', 'SELECT ''column indicators_json already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_investment_forecast_history' AND index_name = 'forecast_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_investment_forecast_history` ADD INDEX `forecast_id` (`forecast_id`)', 'SELECT ''index forecast_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_investment_forecast_history' AND index_name = 'ticker');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_investment_forecast_history` ADD INDEX `ticker` (`ticker`)', 'SELECT ''index ticker already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_investment_forecast_history' AND index_name = 'recorded_at');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_investment_forecast_history` ADD INDEX `recorded_at` (`recorded_at`)', 'SELECT ''index recorded_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_command_inbox' AND column_name = 'message_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_command_inbox` ADD COLUMN `message_id` VARCHAR(255) NULL', 'SELECT ''column message_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_command_inbox' AND column_name = 'raw_body');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_command_inbox` ADD COLUMN `raw_body` LONGTEXT NULL', 'SELECT ''column raw_body already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_command_inbox' AND column_name = 'ai_plan_json');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_command_inbox` ADD COLUMN `ai_plan_json` LONGTEXT NULL', 'SELECT ''column ai_plan_json already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_command_inbox' AND column_name = 'ai_summary');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_command_inbox` ADD COLUMN `ai_summary` TEXT NULL', 'SELECT ''column ai_summary already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_command_inbox' AND column_name = 'security_flags');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_command_inbox` ADD COLUMN `security_flags` LONGTEXT NULL', 'SELECT ''column security_flags already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_command_inbox' AND column_name = 'meta_json');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_command_inbox` ADD COLUMN `meta_json` LONGTEXT NULL', 'SELECT ''column meta_json already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_ops_command_inbox' AND index_name = 'status');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_ops_command_inbox` ADD INDEX `status` (`status`)', 'SELECT ''index status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_ops_command_inbox' AND index_name = 'received_at');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_ops_command_inbox` ADD INDEX `received_at` (`received_at`)', 'SELECT ''index received_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_liquidity' AND index_name = 'market_id_option_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_liquidity` ADD INDEX `market_id_option_id` (`market_id`, `option_id`)', 'SELECT ''index market_id_option_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_liquidity' AND index_name = 'provider_user_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_liquidity` ADD INDEX `provider_user_id` (`provider_user_id`)', 'SELECT ''index provider_user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_liquidity' AND index_name = 'state');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_liquidity` ADD INDEX `state` (`state`)', 'SELECT ''index state already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets' AND index_name = 'state');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_markets` ADD INDEX `state` (`state`)', 'SELECT ''index state already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets' AND index_name = 'category');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_markets` ADD INDEX `category` (`category`)', 'SELECT ''index category already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets' AND index_name = 'lock_at');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_markets` ADD INDEX `lock_at` (`lock_at`)', 'SELECT ''index lock_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets' AND index_name = 'created_by');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_markets` ADD INDEX `created_by` (`created_by`)', 'SELECT ''index created_by already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets' AND index_name = 'slug');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_markets` ADD UNIQUE INDEX `slug` (`slug`)', 'SELECT ''index slug already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_options' AND index_name = 'market_id_label');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_options` ADD INDEX `market_id_label` (`market_id`, `label`)', 'SELECT ''index market_id_label already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_options' AND index_name = 'is_winner');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_options` ADD INDEX `is_winner` (`is_winner`)', 'SELECT ''index is_winner already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_orders' AND index_name = 'user_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_orders` ADD INDEX `user_id` (`user_id`)', 'SELECT ''index user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_orders' AND index_name = 'market_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_orders` ADD INDEX `market_id` (`market_id`)', 'SELECT ''index market_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_orders' AND index_name = 'option_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_orders` ADD INDEX `option_id` (`option_id`)', 'SELECT ''index option_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_orders' AND index_name = 'user_id_state');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_orders` ADD INDEX `user_id_state` (`user_id`, `state`)', 'SELECT ''index user_id_state already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_orders' AND index_name = 'market_id_state');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_orders` ADD INDEX `market_id_state` (`market_id`, `state`)', 'SELECT ''index market_id_state already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_payouts' AND index_name = 'user_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_payouts` ADD INDEX `user_id` (`user_id`)', 'SELECT ''index user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_payouts' AND index_name = 'market_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_payouts` ADD INDEX `market_id` (`market_id`)', 'SELECT ''index market_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_payouts' AND index_name = 'position_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_payouts` ADD INDEX `position_id` (`position_id`)', 'SELECT ''index position_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_payouts' AND index_name = 'status');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_payouts` ADD INDEX `status` (`status`)', 'SELECT ''index status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_positions' AND index_name = 'user_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_positions` ADD INDEX `user_id` (`user_id`)', 'SELECT ''index user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_positions' AND index_name = 'market_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_positions` ADD INDEX `market_id` (`market_id`)', 'SELECT ''index market_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_positions' AND index_name = 'option_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_positions` ADD INDEX `option_id` (`option_id`)', 'SELECT ''index option_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_positions' AND index_name = 'user_id_market_id_option_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_positions` ADD UNIQUE INDEX `user_id_market_id_option_id` (`user_id`, `market_id`, `option_id`)', 'SELECT ''index user_id_market_id_option_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_settlements' AND index_name = 'market_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_settlements` ADD INDEX `market_id` (`market_id`)', 'SELECT ''index market_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_settlements' AND index_name = 'resolver_user_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_settlements` ADD INDEX `resolver_user_id` (`resolver_user_id`)', 'SELECT ''index resolver_user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_trades' AND index_name = 'order_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_trades` ADD INDEX `order_id` (`order_id`)', 'SELECT ''index order_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_trades' AND index_name = 'user_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_trades` ADD INDEX `user_id` (`user_id`)', 'SELECT ''index user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_trades' AND index_name = 'market_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_trades` ADD INDEX `market_id` (`market_id`)', 'SELECT ''index market_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_trades' AND index_name = 'option_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_trades` ADD INDEX `option_id` (`option_id`)', 'SELECT ''index option_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;


```

