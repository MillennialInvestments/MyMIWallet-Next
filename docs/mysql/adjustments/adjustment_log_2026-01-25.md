# MyMI Wallet – DB Schema Adjustment Log
Date: 2026-01-25
Command: php spark db:inventory

## Summary
- Tables analyzed: 350
- Missing tables: 201
- Missing columns: 0
- Missing indexes: 35

## Result
❌ Schema drift detected

## Missing tables
- bf_action_login
- bf_ai_usage
- bf_aiops_budget
- bf_aiops_cache
- bf_aiops_dedupe
- bf_aiops_runs
- bf_aiops_usage
- bf_aiops_workflow_usage
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
- bf_chat_tool_runs
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
- bf_discord_logs
- bf_discord_message_history
- bf_discord_rate_limits
- bf_discord_user_achievements
- bf_email_open_tracking
- bf_email_outbox
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
- bf_investment_forecast_history
- bf_investment_forecast_jobs
- bf_investment_goals
- bf_investment_price_forecasts
- bf_investment_signal_files
- bf_investment_signals
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
- bf_messaging
- bf_mymi_news
- bf_mymi_research
- bf_onboarding_progress
- bf_onboarding_steps
- bf_ops_command_inbox
- bf_ops_job_runs
- bf_ops_jobs
- bf_ops_queue
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
- bf_runtime_config
- bf_script_studio
- bf_search_logs
- bf_security
- bf_security_events
- bf_security_log
- bf_security_settings
- bf_services
- bf_social_communities
- bf_social_distribution_queue
- bf_social_generated_posts
- bf_social_platforms
- bf_social_post_templates
- bf_squeeze_fade_setups
- bf_squeeze_scorecards
- bf_squeeze_universe
- bf_squeeze_zoomout
- bf_suggestions
- bf_support_feedback
- bf_tax_audit_log
- bf_tax_jurisdictions
- bf_tax_rates
- bf_tax_rates_ibfk_1
- bf_tax_return_lines
- bf_tax_return_lines_ibfk_1
- bf_tax_return_templates
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
- bf_user_tax_return_jurisdictions
- bf_user_tax_return_jurisdictions_ibfk_1
- bf_user_tax_return_jurisdictions_ibfk_2
- bf_user_tax_return_values
- bf_user_tax_return_values_ibfk_1
- bf_user_tax_return_values_ibfk_2
- bf_user_tax_returns
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
- _None_

## Missing indexes
- bf_ai_ops_caps.subsystem
- bf_ai_ops_events.subsystem_created_at
- bf_ai_ops_events.event_type_created_at
- bf_ai_ops_runs.job_key_started_at
- bf_ai_ops_runs.subsystem_started_at
- bf_ai_ops_usage.month_key_subsystem
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
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_ai_usage` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `subsystem` VARCHAR(150) NOT NULL,
  `action` VARCHAR(150) NULL,
  `user_id` BIGINT UNSIGNED NULL,
  `tokens_prompt` INT(11) NOT NULL DEFAULT 0,
  `tokens_completion` INT(11) NOT NULL DEFAULT 0,
  `cost_usd` DECIMAL(10,4) NOT NULL DEFAULT 0.0000,
  `meta_json` LONGTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `subsystem` (`subsystem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_aiops_budget` (
  `used_usd` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_aiops_cache` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_aiops_dedupe` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_aiops_runs` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_aiops_usage` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_aiops_workflow_usage` (
  `workflow_id` VARCHAR(64) NOT NULL,
  `workflow_slug` VARCHAR(190) NULL,
  `month` CHAR(7) NOT NULL,
  `usd_used` DECIMAL(10,4) NOT NULL DEFAULT 0,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`workflow_id`, `month`),
  KEY `workflow_slug` (`workflow_slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_aiops_workflows` (
  `enabled` TEXT NULL,
  `slug` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_announcements` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_api_requests` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_api_responses` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_api_tokens` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_applications` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_asset_management` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_assets` (
  `name` TEXT NULL,
  `created_at` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_auction_activity` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_auction_balances` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_auction_bids` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_auction_items` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_auction_lots` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_auction_payments` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_auction_settlements` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_auction_watchlist` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_auctions` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_audience` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_audit_logs` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_audit_trail` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
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
  `created_at` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_campaign_auto_logs` (
  `campaign_id` TEXT NULL,
  `created_at` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_campaigns` (
  `name` TEXT NULL,
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_chat_tool_runs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT UNSIGNED NOT NULL,
  `mode` VARCHAR(25) NOT NULL,
  `tool` VARCHAR(100) NOT NULL,
  `request_json` LONGTEXT NULL,
  `response_json` LONGTEXT NULL,
  `status` VARCHAR(20) NOT NULL DEFAULT 'success',
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_tool` (`user_id`, `tool`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_circuit_breakers` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_contactus` (
  `Name` TEXT NULL,
  `email` TEXT NULL,
  `phone` TEXT NULL,
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_content_enrichment_cache` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_contractors` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_csrf_tokens` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_dashboard_construction_to_do_list` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_dashboard_navbar` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_dashboard_navbar_indash` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_dashboard_upgrade` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_dashboard_upgrades` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_dashboards` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_discord_achievements` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_discord_events` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_discord_logs` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_discord_message_history` (
  `dedupe_hash` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_discord_rate_limits` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_discord_user_achievements` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_email_open_tracking` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_email_outbox` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NULL,
  `to_email` VARCHAR(190) NOT NULL,
  `subject` VARCHAR(190) NOT NULL,
  `type` VARCHAR(50) NOT NULL,
  `status` VARCHAR(20) NOT NULL DEFAULT 'queued',
  `error_message` VARCHAR(255) NULL,
  `provider` VARCHAR(50) NOT NULL DEFAULT 'smtp',
  `meta_json` TEXT NULL,
  `created_at` DATETIME NOT NULL,
  `sent_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `type` (`type`),
  KEY `status` (`status`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_email_tag_usage` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_employees` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_esports_creators` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_esports_disputes` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_esports_entries` (
  `event_id` TEXT NULL,
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_esports_escrows` (
  `event_id` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_esports_events` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_esports_jobs` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_esports_payouts` (
  `event_id` TEXT NULL,
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_esports_pools` (
  `event_id` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_esports_sponsorships` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_esports_webhooks` (
  `payload_digest` TEXT NULL,
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_exchange_auctions` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_exchanges_blockchains` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_exchanges_coin_listing` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_exchanges_order` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_external_sites` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_failed_jobs` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_feature_flag_overrides` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_feature_flags` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_fin_positions_daily` (
  `user_id` TEXT NULL,
  `date` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_fin_prices_eod` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_fin_risk_breaches` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_fin_risk_budgets` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_fin_trades` (
  `user_id` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_gdpr_requests` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_go_live_checklist` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_idempotency` (
  `response_json` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_inbound_webhooks` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_integrations_accounts` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_integrations_events` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_integrations_sync_jobs` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_integrations_webhooks` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_internal_team_messages` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_investment_alert_jobs` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_investment_alerts` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_investment_chart_analysis` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
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

CREATE TABLE IF NOT EXISTS `bf_investment_forecast_history` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `forecast_id` BIGINT UNSIGNED NOT NULL,
  `ticker` VARCHAR(16) NOT NULL,
  `timeframe` VARCHAR(16) NOT NULL,
  `forecast_direction` ENUM('bullish','bearish','neutral') NOT NULL,
  `target_price` DECIMAL(16,6) NULL,
  `range_low` DECIMAL(16,6) NULL,
  `range_high` DECIMAL(16,6) NULL,
  `confidence_score` INT(3) NOT NULL DEFAULT 0,
  `indicators_json` LONGTEXT NULL,
  `recorded_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  KEY `forecast_id` (`forecast_id`),
  KEY `ticker` (`ticker`),
  KEY `recorded_at` (`recorded_at`)
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
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
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

CREATE TABLE IF NOT EXISTS `bf_investment_signal_files` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `week_key` VARCHAR(8) NOT NULL,
  `file_date` DATE NULL,
  `file_path` VARCHAR(255) NOT NULL,
  `file_name` VARCHAR(190) NOT NULL,
  `category` VARCHAR(64) NULL,
  `signal_type` VARCHAR(64) NULL,
  `file_hash` CHAR(64) NOT NULL,
  `rows_total` INT UNSIGNED NOT NULL DEFAULT 0,
  `rows_inserted` INT UNSIGNED NOT NULL DEFAULT 0,
  `rows_skipped` INT UNSIGNED NOT NULL DEFAULT 0,
  `processed_at` DATETIME NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_signal_file_path_hash` (`file_path`, `file_hash`),
  KEY `week_key` (`week_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_investment_signals` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `week_key` VARCHAR(8) NOT NULL,
  `signal_date` DATE NULL,
  `symbol` VARCHAR(16) NOT NULL,
  `category` VARCHAR(64) NOT NULL,
  `signal_type` VARCHAR(64) NOT NULL,
  `source` VARCHAR(32) NOT NULL DEFAULT 'csv',
  `source_file` VARCHAR(255) NULL,
  `row_hash` CHAR(64) NOT NULL,
  `score` INT UNSIGNED NOT NULL DEFAULT 50,
  `appearances` INT UNSIGNED NOT NULL DEFAULT 1,
  `metrics_json` TEXT NULL,
  `status` VARCHAR(16) NOT NULL DEFAULT 'new',
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_signal_row` (`source_file`, `row_hash`),
  KEY `week_key_symbol` (`week_key`, `symbol`),
  KEY `category_signal_type` (`category`, `signal_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_investment_trades` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_investments_overview` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_leads` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_legal_holds` (
  `user_id` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_management_alerts` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_market_news` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_marketing_email_bounces` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_marketing_generated_posts` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_marketing_page_views` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_marketing_page_views_per_user` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_marketing_posts` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_marketing_raw_emails` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_messaging` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_mymi_news` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_mymi_research` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_onboarding_progress` (
  `user_id` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_onboarding_steps` (
  `code` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_ops_command_inbox` (
  `ai_summary` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_ops_job_runs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_id` BIGINT UNSIGNED NOT NULL,
  `queue_id` BIGINT UNSIGNED NULL,
  `status` VARCHAR(50) NOT NULL DEFAULT 'running',
  `attempts` INT(11) NOT NULL DEFAULT 0,
  `payload_json` LONGTEXT NULL,
  `result_json` LONGTEXT NULL,
  `output_json` LONGTEXT NULL,
  `output_text` LONGTEXT NULL,
  `last_error` LONGTEXT NULL,
  `started_at` DATETIME NULL,
  `finished_at` DATETIME NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `job_id` (`job_id`),
  KEY `status` (`status`),
  KEY `started_at` (`started_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_ops_jobs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_key` VARCHAR(150) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NULL,
  `handler` VARCHAR(255) NULL,
  `max_attempts` INT(11) NOT NULL DEFAULT 3,
  `is_enabled` TINYINT(1) NOT NULL DEFAULT 1,
  `last_run_at` DATETIME NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `job_key` (`job_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_ops_queue` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_key` VARCHAR(150) NOT NULL,
  `payload_json` LONGTEXT NULL,
  `status` VARCHAR(50) NOT NULL DEFAULT 'pending',
  `attempts` INT(11) NOT NULL DEFAULT 0,
  `locked_until` DATETIME NULL,
  `last_error` LONGTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `job_key` (`job_key`),
  KEY `locked_until` (`locked_until`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_ops_runs` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_page_seo` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_password_history` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_password_reset_attempts` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_permission_role` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_permissions` (
  `slug` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_posts` (
  `status` TEXT NULL,
  `title` TEXT NULL,
  `created_at` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_privacy_requests` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_project_distributions` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_project_scheduling` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_project_token_allocations` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_project_withdrawals` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_projects_inbox` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_push_subscriptions` (
  `user_id` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_quantities` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_questions` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_referrals` (
  `status` TEXT NULL,
  `reward_days` TEXT NULL,
  `partner_pct` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_role_user` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_roles` (
  `slug` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_runtime_config` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `config_key` VARCHAR(191) NOT NULL,
  `config_value` LONGTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `config_key` (`config_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_script_studio` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_search_logs` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_security` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_security_events` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_security_log` (
  `user_id` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_security_settings` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_services` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_social_communities` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `platform_id` INT(11) UNSIGNED NOT NULL,
  `community_name` VARCHAR(150) NOT NULL,
  `community_type` VARCHAR(50) NOT NULL,
  `community_url` VARCHAR(255) NOT NULL,
  `join_url` VARCHAR(255) NOT NULL,
  `invite_code` VARCHAR(100) NULL,
  `is_primary` TINYINT(1) NOT NULL DEFAULT 0,
  `status` VARCHAR(50) NOT NULL DEFAULT 'active',
  `notes` TEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`platform_id`) REFERENCES `bf_social_platforms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_social_distribution_queue` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `generated_post_id` INT(11) UNSIGNED NOT NULL,
  `channel_key` VARCHAR(50) NOT NULL,
  `payload_json` TEXT NOT NULL,
  `status` VARCHAR(25) NOT NULL DEFAULT 'pending',
  `attempts` INT(11) NOT NULL DEFAULT 0,
  `last_error` TEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`generated_post_id`) REFERENCES `bf_social_generated_posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_social_generated_posts` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `source_type` VARCHAR(50) NOT NULL,
  `source_id` INT(11) NOT NULL,
  `platform_id` INT(11) UNSIGNED NOT NULL,
  `community_id` INT(11) UNSIGNED NULL,
  `template_id` INT(11) UNSIGNED NOT NULL,
  `post_title` VARCHAR(255) NULL,
  `post_body` MEDIUMTEXT NOT NULL,
  `hashtags` TEXT NULL,
  `tickers` TEXT NULL,
  `cta_link` VARCHAR(255) NULL,
  `status` VARCHAR(25) NOT NULL DEFAULT 'draft',
  `posted_at` DATETIME NULL,
  `external_post_url` VARCHAR(255) NULL,
  `error` TEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `source_type_source_id` (`source_type`, `source_id`),
  FOREIGN KEY (`platform_id`) REFERENCES `bf_social_platforms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`community_id`) REFERENCES `bf_social_communities` (`id`) ON DELETE CASCADE ON UPDATE SET NULL,
  FOREIGN KEY (`template_id`) REFERENCES `bf_social_post_templates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_social_platforms` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `platform_key` VARCHAR(32) NOT NULL,
  `display_name` VARCHAR(100) NOT NULL,
  `base_url` VARCHAR(255) NULL,
  `supports_groups` TINYINT(1) NOT NULL DEFAULT 0,
  `supports_short_video` TINYINT(1) NOT NULL DEFAULT 0,
  `supports_long_video` TINYINT(1) NOT NULL DEFAULT 0,
  `supports_live` TINYINT(1) NOT NULL DEFAULT 0,
  `supports_polls` TINYINT(1) NOT NULL DEFAULT 0,
  `supports_threads` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_social_post_templates` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `platform_id` INT(11) UNSIGNED NOT NULL,
  `template_key` VARCHAR(64) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `max_chars` INT(11) NULL,
  `hashtag_limit` INT(11) NULL,
  `supports_links` TINYINT(1) NOT NULL DEFAULT 1,
  `supports_mentions` TINYINT(1) NOT NULL DEFAULT 1,
  `supports_tickers` TINYINT(1) NOT NULL DEFAULT 1,
  `rules_json` TEXT NULL,
  `body_template` TEXT NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `platform_id_template_key` (`platform_id`, `template_key`),
  FOREIGN KEY (`platform_id`) REFERENCES `bf_social_platforms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_squeeze_fade_setups` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_squeeze_scorecards` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_squeeze_universe` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_squeeze_zoomout` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_suggestions` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_support_feedback` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_tax_audit_log` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `action` VARCHAR(50) NOT NULL,
  `entity_type` VARCHAR(50) NOT NULL,
  `entity_id` INT(11) UNSIGNED NOT NULL,
  `before_json` LONGTEXT NULL,
  `after_json` LONGTEXT NULL,
  `created_at` DATETIME NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_tax_jurisdictions` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `state` VARCHAR(2) NOT NULL DEFAULT 'LA',
  `parish` VARCHAR(100) NOT NULL,
  `name` VARCHAR(150) NOT NULL,
  `code` VARCHAR(10) NOT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_tax_rates` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `jurisdiction_id` INT(11) UNSIGNED NOT NULL,
  `rate_total` DECIMAL(7,4) NOT NULL,
  `rate_components` JSON NULL,
  `effective_start` DATE NOT NULL,
  `effective_end` DATE NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`jurisdiction_id`) REFERENCES `bf_tax_jurisdictions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_tax_rates_ibfk_1` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_tax_return_lines` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `template_id` INT(11) UNSIGNED NOT NULL,
  `line_number` INT(11) NOT NULL,
  `label` VARCHAR(255) NOT NULL,
  `type` ENUM('input','calc','info') NOT NULL,
  `calc_rule` VARCHAR(255) NULL,
  `requires_explain` TINYINT(1) NOT NULL DEFAULT 0,
  `sort_order` INT(11) NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`template_id`) REFERENCES `bf_tax_return_templates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_tax_return_lines_ibfk_1` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_tax_return_templates` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  `authority` VARCHAR(150) NOT NULL,
  `frequency` ENUM('monthly','quarterly','annual') NOT NULL,
  `notes` TEXT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_timezone` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_token_holders` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_token_transfers` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_tokens` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_trade_alert_enrichment` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_2fa` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_broker_links` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_consent` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
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
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_roles` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_sessions` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
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

CREATE TABLE IF NOT EXISTS `bf_user_tax_return_jurisdictions` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `return_id` INT(11) UNSIGNED NOT NULL,
  `jurisdiction_id` INT(11) UNSIGNED NOT NULL,
  `taxable_amount` DECIMAL(12,2) NOT NULL DEFAULT 0.00,
  `tax_due` DECIMAL(12,2) NOT NULL DEFAULT 0.00,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`return_id`) REFERENCES `bf_user_tax_returns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`jurisdiction_id`) REFERENCES `bf_tax_jurisdictions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_tax_return_jurisdictions_ibfk_1` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_tax_return_jurisdictions_ibfk_2` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_tax_return_values` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `return_id` INT(11) UNSIGNED NOT NULL,
  `line_id` INT(11) UNSIGNED NOT NULL,
  `amount` DECIMAL(12,2) NOT NULL DEFAULT 0.00,
  `explain_text` VARCHAR(255) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`return_id`) REFERENCES `bf_user_tax_returns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`line_id`) REFERENCES `bf_tax_return_lines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_tax_return_values_ibfk_1` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_tax_return_values_ibfk_2` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_tax_returns` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `template_id` INT(11) UNSIGNED NOT NULL,
  `filing_period_start` DATE NOT NULL,
  `filing_period_end` DATE NOT NULL,
  `due_date` DATE NOT NULL,
  `file_date` DATE NULL,
  `status` ENUM('draft','ready','filed','paid','delinquent','void') NOT NULL DEFAULT 'draft',
  `total_remitted` DECIMAL(12,2) NOT NULL DEFAULT 0.00,
  `notes` TEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`template_id`) REFERENCES `bf_tax_return_templates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_tax_returns_ibfk_1` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_user_wallets` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_accounting_accounts` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_bank_transactions` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_brokerage_accounts` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_discord_links` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_ecommerce_accounts` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_email_subscriptions` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_investments` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_posts` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_public_tokens` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_purchases` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_stock_research` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_trading_accounts` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_wallet_brokerages` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_users_wallets` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_wallet_providers` (
  `enabled` TEXT NULL,
  `sort_order` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_wallets` (
  `user_id` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bf_webhook_outbox` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
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

