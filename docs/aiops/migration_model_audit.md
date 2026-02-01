# Migration vs Model Drift Audit (CI4)

Generated: 2026-02-01 14:47 UTC

## Scope
- `app/Database/Migrations/**`
- `app/Models/**`

## Migration Risk Summary
| Migration | Issue | Severity | Recommendation |
| --- | --- | --- | --- |
| 2025-09-10-000020_AddReferralFieldsToUsers.php | Adds referral_code and referred_by_user_id without tableExists/fieldExists guards; non-idempotent addColumn; assumes users table exists; potential referral_code naming conflict with referrer_code usage. | High | Wrap in tableExists("users") and fieldExists guards; if referrer_code exists decide on canonical column name; add conditional addColumn per field. |
| 2026-01-21-000110_AddOutputTextToOpsRuns.php | Adds output_text without fieldExists guard; re-running migration fails if column already exists. | Medium | Add fieldExists("output_text", "bf_ops_job_runs") check before addColumn. |
| 2026-03-10-000200_CreateInvestmentForecastAccuracyTable.php | Conflicts with 2026-03-12-000100_CreateInvestmentForecastAccuracy.php: both create bf_investment_forecast_accuracy with different schemas. | High | Patch one migration to detect existing schema and add missing columns conditionally; keep both files but make later migration additive. |
| 2026-03-12-000100_CreateInvestmentForecastAccuracy.php | Conflicts with 2026-03-10-000200_CreateInvestmentForecastAccuracyTable.php: overlapping table with different columns; potential drift between environments. | High | Patch to be additive (fieldExists guards) and avoid redefining table if it already exists. |

## Unsafe / Non-Idempotent Migrations
- `2025-09-10-000020_AddReferralFieldsToUsers.php`: adds columns without `tableExists`/`fieldExists` guards, and no protection from duplicate runs; also conflicts with existing `referrer_code` usage in `ReferralModel`.
- `2026-01-21-000110_AddOutputTextToOpsRuns.php`: lacks `fieldExists` guard for `output_text`.

## Duplicate/Conflicting Migrations
- `2026-03-10-000200_CreateInvestmentForecastAccuracyTable.php` and `2026-03-12-000100_CreateInvestmentForecastAccuracy.php` both create `bf_investment_forecast_accuracy` with different schemas. Patch the later migration to be additive only and ensure any missing columns are conditionally added.

## Required Guards (fieldExists / tableExists)
- `2025-09-10-000020_AddReferralFieldsToUsers.php`: add `tableExists("users")` and `fieldExists("referral_code", "users")`, `fieldExists("referred_by_user_id", "users")` checks.
- `2026-01-21-000110_AddOutputTextToOpsRuns.php`: add `fieldExists("output_text", "bf_ops_job_runs")` check before `addColumn`.

## Migrations That Must Be Patched (Not Deleted)
- `2025-09-10-000020_AddReferralFieldsToUsers.php` (add guards + address referral_code/referrer_code mismatch).
- `2026-01-21-000110_AddOutputTextToOpsRuns.php` (add fieldExists guard).
- `2026-03-10-000200_CreateInvestmentForecastAccuracyTable.php` and/or `2026-03-12-000100_CreateInvestmentForecastAccuracy.php` (resolve schema drift with additive guards).

## Suggested Hardened Migration Patterns
```php
// Guarded addColumn
if ($this->db->tableExists($table)) {
    if (! $this->db->fieldExists($column, $table)) {
        $this->forge->addColumn($table, [$column => $definition]);
    }
}

// Guarded createTable (preferred)
if (! $this->db->tableExists($table)) {
    $this->forge->addField($fields);
    $this->forge->addKey("id", true);
    $this->forge->createTable($table, true);
}
```

## Referral Code Conflict Callout
- `users` table migration adds `referral_code`/`referred_by_user_id`, but several model queries reference `referrer_code` (e.g., `ReferralModel`). This is a likely schema mismatch that will fail on environments where only `referral_code` exists. Align column naming and add migration guards for whichever column is canonical.

## Model Map (table/keys/allowedFields)
> Extracted from model properties; `useTimestamps` is shown as literal value when present.

| Model | Table | Primary Key | useTimestamps | allowedFields |
| --- | --- | --- | --- | --- |
| APIModel | bf_applications | id |  | field1, field2, field3 |
| AccountsModel | bf_applications | id |  |  |
| AdvisorModel | bf_users_certified_advisors | id |  | user_id, name, specialty, location, contact, bio, certifications, experience, fee_structure, created_at, updated_at |
| AiOpsSettingsModel | bf_aiops_settings | setting_key | true | setting_key, setting_value, updated_at, updated_by |
| AiOpsTaskModel | bf_aiops_tasks | id | true | task_key, title, severity, domain, prompt, context_json, status, assigned_to, locked_at, locked_by, last_error, created_at, updated_at |
| AiOpsTaskRunModel | bf_aiops_task_runs | id | true | task_id, status, stdout, stderr, exit_code, result_json, created_at, updated_at |
| AiUsageModel | bf_ai_usage | id | true | subsystem, action, user_id, tokens_prompt, tokens_completion, cost_usd, meta_json, created_at, updated_at |
| AlertJobModel | bf_investment_alert_jobs | id | true | type, payload, status, attempts, last_error, available_at, created_at, updated_at |
| AlertsModel | bf_investment_trade_alerts | id |  | active, status, occurrences, alert_count, distributed_count, created_on, created_by, updated_at, alert_created, send_alert, alert_sent, ticker, exchange, company, price, open, high, low, volume, market_cap, trailing_stop_percent, locked_profit_stop, stop_loss, max_entry, current_price, entry_price, potential_price, target_price, market_sentiment, trade_type, category, alert_priority, trade_description, financial_news, analysis_summary, tv_chart_type, tv_chart, display, notification_sent, submitted_date, last_updated, last_updated_time, ema_9, ema_21, ema_34, ema_48, ema_100, ema_200, symbol, name, currency, mic_code, country, type, url, title, summary, content, email_identifier, email_date, email_sender, email_subject, email_body, source_email, email_type, news_vendor, symbols, links, images, videos, metadata, structured_data, additional_html_elements, page_performance_data, network_requests, user_interaction_points, accessibility_information, page_relationships, seo_elements, social_media_links, comments_user_generated_content, contact_information, legal_information, breadcrumbs, date_time, author_information, ratings_reviews, price_information, location_data, language_locale, mobile_responsiveness, security_information, technology_stack, server_information, caching_information, content_type, character_set, rss_atom_feeds, pagination, custom_data, error_handling, historical_changes, user_reviews_ratings, inventory_levels, shipping_information, bots_crawlers_information, affiliate_links, advertisements, cookie_notices, popups_modals, browser_specific_data, geolocation_specific_content, ab_testing_variations, user_agent_specific_content, screen_size_specific_content, device_specific_content, browser_extension_data, custom_scripts_analytics, order_status, keywords, last_marketed_at, marketing_status, distribution_channels, latest_forecast_id, forecast_confidence, forecast_direction, forecast_target_price, forecast_range_low, forecast_range_high, forecast_updated_at, source, account_type, broker_order_id, execution_id, filled_qty, filled_price, filled_at, side, notified_discord |
| AnalyticalModel | bf_applications | id | true |  |
| AnnouncementsModel | bf_applications | id |  | field1, field2, field3 |
| ApiTokenModel | bf_api_tokens | id | false | user_id, token_prefix, token_hash, scopes_json, last_used_at, revoked_at, created_at |
| AssetsModel | bf_exchanges_assets | id |  | user_id |
| AuctionBalanceModel | bf_auction_balances | id | false | user_id, gold_cents, hold_cents |
| AuctionBidModel | bf_auction_bids | id | false | lot_id, bidder_id, amount_cents, leading |
| AuctionItemModel | bf_auction_items | id | true | user_id, title, slug, description, category, condition_grade, images_json, fmv_source_json, fmv_amount_cents, reserve_cents, min_increment, status |
| AuctionLotModel | bf_auction_lots | id | true | item_id, starts_at, ends_at, anti_snipe_sec, extend_threshold_sec, currency, status |
| AuctionModel | bf_exchange_auctions | id |  | item_id, start_time, end_time |
| AuctionPaymentModel | bf_auction_payments | id | true | user_id, lot_id, method, direction, amount_cents, rate_used, tx_ref, status |
| AuctionSettlementModel | bf_auction_settlements | id | true | lot_id, item_id, seller_id, winner_id, winning_cents, fee_bps, fee_cents, payout_cents, escrow_status, status, tx_meta_json |
| AuditLogModel | bf_audit_logs | id | false | event, actor_id, target, meta_json, ip_address, user_agent, created_at |
| AuthHealthRunModel | bf_auth_health_runs | id | false | run_at, status, score, summary, details_json, duration_ms, server, build_tag |
| AuthRegistrationAttemptModel | bf_auth_registration_attempts | id | true | email, email_hash, ip_address, user_agent, uri, status, error_message |
| BiddingModel | bids | id |  | auction_id, user_id, amount, time |
| BlogModel | blog_posts | id | true | title, slug, content, meta_description, meta_keywords, featured_image, category_id, published_at, created_at, updated_at |
| BudgetModel | bf_users_budgeting | id |  | id, status, deleted, mode, paid, paid_date, paid_time, beta, submitted_on, unix_timestamp, designated_date, designated_date_override, initial_weeks_left, last_date, month, day, year, time, created_by, created_by_email, username, account_type, source_type, name, net_amount, gross_amount, monthly_payment, account_summary, wallet_id, is_debt, is_cc_payment, intervals, recurring_account, recurring_account_primary, recurring_account_id, recurring_account_order, recurring_schedule, link |
| CampaignModel | bf_marketing_campaigns | id |  | name, primary_content, email_message, is_draft, created_at, updated_at |
| ChatToolRunModel | bf_chat_tool_runs | id | true | user_id, mode, tool, request_json, response_json, status |
| ChatUsageModel | chat_usage | user_id | false | user_id, month, tokens_used, usd_used, last_plan, last_email, updated_at |
| CircuitBreakerModel | bf_circuit_breakers | id | false | name, state, failures, successes, opened_at, updated_at |
| ContentIdeaModel | bf_content_ideas | id | true | ingest_id, symbol, score_total, tier, reasons_json, recommended_platforms_json, status, created_at, updated_at |
| ContentPostModel | bf_content_posts | id | true | idea_id, platform, title, body, hashtags, cta, payload_json, status, last_error, created_at, updated_at |
| ContentScannerIngestModel | bf_content_scanner_ingest | id | true | scan_name, quote_ts, payload_hash, source, row_count, status, created_at, updated_at |
| ContentScannerRowModel | bf_content_scanner_rows | id | false | ingest_id, symbol, raw_json, stage, mark, mark_pct_change, pct_chng_5d, market_cap_m, volume, dollar_vol_m, abvvol, vol_365, high_52w, low_52w, pct_1mo_chg, created_at |
| DashboardModel | users | id | true | name, email, phone, message, title, url, keywords, user_id, goal_description, goal_type, goal_frequency, reward_amount |
| DesignModel | bf_applications | id |  | field1, field2, field3 |
| DiligenceModel | bf_users_stock_research | id |  |  |
| DiscordAiMessageModel | bf_discord_ai_messages | id | true | session_id, role, content, meta_json, created_at |
| DiscordAiNoteModel | bf_discord_ai_notes | id | true | user_id, discord_user_id, title, note_type, content, tags, encrypted, created_at, updated_at |
| DiscordAiSessionModel | bf_discord_ai_sessions | id | true | user_id, discord_user_id, channel_id, session_key, topic, context_json, is_active, created_at, updated_at |
| DiscordLinkModel | bf_discord_links | id | true | user_id, discord_user_id, discord_username, link_token, token_expires_at, linked_at, status, ai_persona, last_seen_at, scopes_json |
| DiscordModel |  |  |  |  |
| DripCampaignModel | bf_email_drip_campaigns | id |  | name, description, trigger_event, is_active |
| EmailModel | bf_email_distribution_lists | id |  |  |
| EmailOutboxModel | bf_email_outbox | id | false | user_id, to_email, subject, type, status, error_message, provider, meta_json, created_at, sent_at |
| EsportsModel | bf_esports_events | id |  |  |
| ExchangeModel | bf_exchanges | id | true | active, status, deleted, created_on, completed_on, user_id, from_token, to_token, amount, fees, transaction_result, suspicious, suspicious_reason, reported_at, reported_by, kyc_status |
| FailedJobModel | bf_failed_jobs | id | false | queue, payload_json, exception, failed_at |
| FeatureFlagModel | bf_feature_flags | id | false | flag, enabled, rollout_pct, rules_json, description, created_at, updated_at |
| FeatureFlagOverrideModel | bf_feature_flag_overrides | id | false | flag, user_id, allow, created_at |
| PositionDailyModel | bf_fin_positions_daily | id | false | user_id, date, symbol, qty, avg_cost, market_price, market_value, unrealized_pnl, realized_pnl, created_at |
| PriceEodModel | bf_fin_prices_eod | id | false | symbol, date, close, source, created_at |
| RiskBreachModel | bf_fin_risk_breaches | id | false | user_id, type, symbol, metric, threshold, details, occurred_at, resolved_at |
| RiskBudgetModel | bf_fin_risk_budgets | id | false | user_id, max_position_pct, max_asset_class_pct, max_daily_loss_pct, max_drawdown_pct, updated_at, created_at |
| TradeModel | bf_fin_trades | id | false | user_id, symbol, asset_type, qty, price, fee, side, trade_ts, wallet_id, ext_id, notes, created_at, updated_at |
| GoalsModel | bf_users_goal_checklist | id |  | user_id, goal_type, goal_description, status, goal_completion_status, gold_reward, start_date, end_date, created_at, updated_at |
| IdempotencyModel | bf_idempotency | id | false | key, request_hash, status_code, response_json, state, created_at, updated_at, expires_at |
| InboundWebhookModel | bf_inbound_webhooks | id | false | source, idempotency_key, signature, payload_body, received_at, processed_at, status, notes |
| InstitutesModel | bf_users_financial_institutions | id |  | user_id, name, specialty, location, contact, bio, certifications, experience, fee_structure, created_at, updated_at |
| InvestmentForecastAccuracyModel | bf_investment_forecast_accuracy | id | false | forecast_id, ticker, timeframe, evaluation_window, forecast_direction, confidence_score, target_price, range_low, range_high, hit_result, mfe, mae, window_start, window_end, evaluated_at, notes, created_at |
| InvestmentForecastHistoryModel | bf_investment_forecast_history | id | false | forecast_id, ticker, timeframe, forecast_direction, target_price, range_low, range_high, confidence_score, indicators_json, recorded_at |
| InvestmentModel | bf_users_trades | id | true | active, status, submitted_date, created_on, modified_on, created_by, modified_by, user_id, user_email, username, trading_account, order_status, category, trade_type, closed, symbol, current_price, entry_price, net_gains, open_date, open_time, position_type, shares, total_trade_cost, wallet, json_user_fields |
| InvestmentPriceForecastModel | bf_investment_price_forecasts | id | false | alert_id, ticker, timeframe, forecast_direction, target_price, range_low, range_high, confidence_score, signal_score, indicators_json, data_source, created_at, updated_at |
| InvestorModel | users | id | false |  |
| JobModel | bf_jobs | id | false | queue, payload_json, attempts, available_at, reserved_at, reserved_by, created_at, expires_at |
| LoginModel | auth_logins | id | false | ip_address, email, user_id, date, success |
| MditDepositModel | bf_mdit_deposits | id | true | user_id, wallet_address, chain, asset_symbol, amount, tx_hash, confirmations, status, idempotency_key, provider_event_id, created_on, updated_on |
| MditDisclosureAcceptanceModel | bf_mdit_disclosures_acceptance | id | false | user_id, disclosure_version, accepted_on, ip_address, user_agent |
| MditInvestorProfileModel | bf_mdit_investor_profiles | id | true | user_id, kyc_status, accreditation_status, risk_ack_on, created_on, updated_on |
| MditNavSnapshotModel | bf_mdit_nav_snapshots | id | false | as_of_date, nav_total, token_supply, nav_per_unit, cash_value, equities_value, created_on |
| MditRedemptionModel | bf_mdit_redemptions | id | false | user_id, wallet_address, token_units, requested_on, approved_on, approved_by, status, payout_asset, payout_amount, notes |
| MditTokenLedgerModel | bf_mdit_token_ledger | id | false | user_id, wallet_address, token_symbol, units, nav_at_mint, minted_on, burned_on, source_deposit_id, source_redemption_id, status |
| MditWalletModel | bf_mdit_wallets | id | false | user_id, wallet_address, chain, is_primary, status, created_on |
| MditWebhookEventModel | bf_mdit_webhook_events | id | false | provider, event_id, event_type, payload_json, payload_hash, received_on, processed_on, status, error_message |
| MailQueueModel | bf_mail_queue | id | false | module, provider, to_email, subject, html, text, status, attempts, last_error, scheduled_at, sent_at, created_at, updated_at |
| AudienceModel | bf_audience | id |  | campaign_id, user_id, account_type |
| EmailMarketingModel | bf_marketing_campaigns | id |  | name, type, audience_type, scheduled_at, stage, html_content, description, created_by, status |
| EmailOpenTrackingModel | bf_email_open_tracking | id |  | email_id, opened_at |
| EmailQueueModel | bf_marketing_email_queue | id |  | campaign_id, email, subject, content, status, created_at, updated_at |
| EmailTemplateModel | bf_marketing_email_templates | id |  | title, subject, content, created_at, updated_at |
| MarketingModel | bf_marketing_scraper | id | true | title, description, created_on, modified_on, status, type, source_id, source_type, source, symbols, category, topics_json, symbols_json, is_macro, used_in_storyboard, day, time, activity, link, url, summary, content, email_identifier, email_date, email_sender, email_subject, email_body, email_attachments, keywords, scraped_at, links, images, videos, metadata, structured_data, url, date_scraped, meta_json, hash, platforms, sched_id, escalated, audience_type, stage, name, assigned_on, assigned_to, completed_on, scheduled_at, primary_content, secondary_content, html_content, voice_script, shared, shared_users, blog, in_app, email, discord, facebook, linkedin, telegram, twitter, website, promotional_links, facebook_message, linkedin_message, discord_message, stocktwits_message, tiktok_message, youtube_message, email_message, additional_info, image_paths |
| MarketingNewsletterModel | bf_marketing_newsletters | id | false | title, slug, subject, body_html, status, week_start_date, created_at, updated_at |
| MgmtBudgetModel | bf_users_budgeting | id | true | created_by, created_by_date, unix_timestamp, month, day, year, time, status, account_type, source_type, intervals, name, amount, designated_date |
| MyMICoinModel | bf_mymicoin_overview | id | true | Name, email, phone, message |
| MyMIGoldModel | bf_mymigold_overview | id | true | Name, email, phone, message |
| NotificationOutboxModel | notification_outbox | id | true | recipient, subject, message, status, sent_at, created_at, updated_at |
| SparkHealthModel | bf_ops_spark_health | id | false | created_at, hostname, app_env, php_version, ci_version, status, command_count, invalid_count, invalid_files_json, notes |
| OpsCommandInboxModel | bf_ops_command_inbox | id | true | message_id, from_email, subject, raw_body, parsed_json, ai_plan_json, ai_summary, security_flags, status, meta_json, received_at |
| OpsJobsModel | bf_ops_jobs | id | true | job_key, name, description, handler, max_attempts, is_enabled, last_run_at, created_at, updated_at |
| OpsQueueModel | bf_ops_queue | id | true | job_key, payload_json, status, attempts, locked_until, last_error, created_at, updated_at |
| OpsRunsModel | bf_ops_job_runs | id | true | job_id, queue_id, status, attempts, payload_json, result_json, output_json, output_text, last_error, started_at, finished_at, created_at, updated_at |
| PageSEOModel | bf_marketing_page_seo | id |  | page_name, page_title, page_description, page_url, page_internal_url, page_image, status, source, created_at, updated_at |
| PermissionModel | bf_permissions | id |  | slug, label, created_at, updated_at |
| PermissionRoleModel | bf_permission_role | id |  | permission_id, role_id, created_at |
| PlaidModel | bf_applications |  |  |  |
| LiquidityModel | bf_predictions_liquidity | id |  | market_id, option_id, provider_user_id, asset, amount, state, created_at, updated_at |
| MarketsModel | bf_predictions_markets | id | false | slug, title, description, category, resolution_source, currency_mode, state, open_at, lock_at, resolve_at, created_by, created_at, updated_at |
| OptionsModel | bf_predictions_options | id |  | market_id, label, odds_bips, liquidity_gold, is_winner, created_at, updated_at |
| OrdersModel | bf_predictions_orders | id |  | user_id, market_id, option_id, side, stake_amount, stake_asset, expected_payout, fee_bips, state, created_at, updated_at |
| PayoutsModel | bf_predictions_payouts | id |  | user_id, market_id, position_id, asset, amount, status, tx_ref, created_at, updated_at |
| PositionsModel | bf_predictions_positions | id |  | user_id, market_id, option_id, avg_entry_odds_bips, stake_asset, stake_total, payout_max, created_at, updated_at |
| TradesModel | bf_predictions_trades | id | false | order_id, user_id, market_id, option_id, stake_asset, stake_amount, fee_amount, fill_odds_bips, created_at |
| PrivacyRequestModel | bf_privacy_requests | id | false | user_id, type, status, notes, result_path, created_at, updated_at |
| ProfileModel | bf_user_profiles |  |  | user_id, phone, street, city, state, postal_code, phone_ciphertext, phone_iv, phone_tag, street_ciphertext, street_iv, street_tag, city_ciphertext, city_iv, city_tag, state_ciphertext, state_iv, state_tag, postal_code_ciphertext, postal_code_iv, postal_code_tag, phone_sha |
| ProjectCommitmentsModel | bf_project_commitments | id | true | project_id, user_id, amount, status, created_at, updated_at, deleted_at |
| ProjectDistributionsModel | bf_project_distributions | id | true | project_id, period_start, period_end, gross_revenue, net_distributable, notes, created_at |
| ProjectInboxModel | bf_projects_inbox | id | true | source, source_key, trigger, raw_subject, raw_body, url, payload_json, status, created_at, updated_at |
| ProjectPayoutsModel | bf_project_payouts | id | true | distribution_id, project_id, user_id, token_symbol, share_ratio, amount, status, created_at, updated_at |
| ProjectTaskRegistryModel | project_task_registry | id | true | project, title, description, status, priority, assignee, source, source_ref, planned_at, due_at, meta_json |
| ProjectTokenAllocationsModel | bf_project_token_allocations | id | true | project_id, user_id, token_symbol, tokens, cost_basis, created_at |
| ProjectWithdrawalsModel | bf_project_withdrawals | id | false | project_id, user_id, requested_at, eligible_amount, fee_percent, fee_amount, net_amount, status, created_at, updated_at |
| ProjectsModel | bf_projects | id | true | title, slug, description, asset_url, purchase_price, target_raise, min_commit, max_commit, commit_deadline, status, exchange_symbol, exchange_asset_id, auction_id, auction_snapshot, created_at, updated_at |
| PublicModel | bf_applications | id | true | Name, email, phone, message |
| PushSubscriptionModel | bf_push_subscriptions | id | false | user_id, endpoint, p256dh, auth, user_agent, created_at, revoked_at, last_sent_at |
| ReferralModel | bf_users_referral_program | id |  | user_id, referrer_code, active, signup_date, user_type, first_name, last_name, email, phone, address, city, state, country, zipcode, paypal, other_payment, user_ip_address, total_spend, days_active |
| RoleModel | bf_roles | id |  | slug, label, created_at, updated_at |
| RoleUserModel | bf_role_user | id |  | role_id, user_id, created_at |
| RuntimeConfigModel | bf_runtime_config | id | true | config_key, config_value, created_at, updated_at |
| SecurityModel | bf_security | id |  |  |
| SignalFilesModel | bf_investment_signal_files | id | true | week_key, file_date, file_path, file_name, category, signal_type, file_hash, rows_total, rows_inserted, rows_skipped, processed_at, created_at, updated_at |
| SignalsModel | bf_investment_signals | id | true | week_key, signal_date, symbol, category, signal_type, source, source_file, row_hash, score, appearances, metrics_json, status, created_at, updated_at |
| SocialCommunityModel | bf_social_communities | id | true | platform_id, community_name, community_type, community_url, join_url, invite_code, is_primary, status, notes |
| SocialDistributionQueueModel | bf_social_distribution_queue | id | true | generated_post_id, channel_key, payload_json, status, attempts, last_error |
| SocialGeneratedPostModel | bf_social_generated_posts | id | true | source_type, source_id, platform_id, community_id, template_id, post_title, post_body, hashtags, tickers, cta_link, status, posted_at, external_post_url, error |
| SocialPlatformModel | bf_social_platforms | id | true | platform_key, display_name, base_url, supports_groups, supports_short_video, supports_long_video, supports_live, supports_polls, supports_threads |
| SocialPostTemplateModel | bf_social_post_templates | id | true | platform_id, template_key, title, max_chars, hashtag_limit, supports_links, supports_mentions, supports_tickers, rules_json, body_template |
| SolanaModel | bf_exchanges | id |  | user_id, from_token, to_token, amount, fees, transaction_result, created_on, modified_on, suspicious, wallet_id, available_funds, net_worth, public_key, private_key, wallet_type, nickname, status, active |
| SqueezeModel |  |  |  |  |
| SubscribeModel | bf_applications | id | true | email, referral |
| SupportModel | bf_support_requests | id |  | user_id, email, name, details, date, time, res_id, response, status, topic |
| TokenModel | bf_tokens | id |  | name, symbol, total_supply, blockchain, admin_wallet, metadata_uri |
| TrackerModel | bf_applications | id | true |  |
| TransactionModel | bf_users_wallet_transactions | id |  | transaction_id, status, active, unix_timestamp, submitted_date, month, day, year, time, trans_type, currency, wallet_id, bank_account, broker, nickname, user_id, user_email, type, deposit_date, withdraw_date, amount, initial_amount, current_amount, fees, total_cost, large_transaction_flag, reviewed, reviewed_by, reviewed_at, review_notes, suspicious_pattern, pattern_details |
| UserModel | users | id | true | email, username, password_hash, 2fa_secret, reset_hash, reset_at, reset_expires, activate_hash, status, status_message, active, force_pass_reset, permissions, deleted_at, anonymous_id, ip_address, created_at, user_id, comment, ticker, referral_code, referred_by_user_id |
| UserPermissionOverrideModel | bf_user_permission_overrides | id |  | user_id, permission_id, allow, created_at |
| UserSessionModel | bf_user_sessions | id | true | session_id, user_id, revoked, created_at, updated_at |
| UserTwoFactorModel | bf_user_2fa | id | false | user_id, is_enabled, secret_ciphertext, secret_iv, secret_tag, backup_codes_hashes, created_at, updated_at |
| WalletModel | bf_users_wallet | id | false | status, active, beta, user_id, user_email, username, wallet_type, bank_name, account_type, account_number, routing_number, balance, nickname, broker, investment_type, investment_amount, investment_date, symbol, net_worth, available_funds, exchange, network, address, id, status, active, unix_timestamp, submitted_date, month, day, year, time, trans_type, currency, wallet_id, bank_account, broker, nickname, user_id, user_email, type, deposit_date, withdraw_date, amount, initial_amount, current_amount, fees, total_cost, created_on, modified_on, deleted_on, provider, credentials, category, label |
| WebhookOutboxModel | bf_webhook_outbox | id | false | target_url, headers_json, body_json, signature, status, attempts, last_error, next_attempt_at, created_at, sent_at |
| WeeklyStreamWatchlistModel | bf_weekly_stream_watchlist | id | false | week_start_date, watchlist_name, symbol, score, notes, created_at |

## Cross-Check: Model Tables Missing in Migrations (Scope-Limited)
The following model tables were not found in the migration-derived table list within `app/Database/Migrations/**`. These may be legacy tables, managed elsewhere, or manually created.

bf_api_tokens, bf_applications, bf_auction_balances, bf_auction_bids, bf_auction_items, bf_auction_lots, bf_auction_payments, bf_auction_settlements, bf_audience, bf_audit_logs, bf_auth_registration_attempts, bf_circuit_breakers, bf_content_ideas, bf_content_posts, bf_content_scanner_ingest, bf_content_scanner_rows, bf_discord_ai_messages, bf_discord_ai_notes, bf_discord_ai_sessions, bf_discord_links, bf_email_distribution_lists, bf_email_drip_campaigns, bf_email_open_tracking, bf_esports_events, bf_exchange_auctions, bf_exchanges, bf_exchanges_assets, bf_failed_jobs, bf_feature_flag_overrides, bf_feature_flags, bf_fin_positions_daily, bf_fin_prices_eod, bf_fin_risk_breaches, bf_fin_risk_budgets, bf_fin_trades, bf_idempotency, bf_inbound_webhooks, bf_investment_alert_jobs, bf_jobs, bf_mail_queue, bf_marketing_campaigns, bf_marketing_email_queue, bf_marketing_email_templates, bf_marketing_newsletters, bf_marketing_page_seo, bf_marketing_scraper, bf_mymicoin_overview, bf_mymigold_overview, bf_ops_spark_health, bf_permission_role, bf_permissions, bf_privacy_requests, bf_project_commitments, bf_project_distributions, bf_project_payouts, bf_project_token_allocations, bf_project_withdrawals, bf_projects, bf_projects_inbox, bf_push_subscriptions, bf_role_user, bf_roles, bf_security, bf_support_requests, bf_tokens, bf_user_2fa, bf_user_permission_overrides, bf_user_sessions, bf_users_budgeting, bf_users_certified_advisors, bf_users_financial_institutions, bf_users_goal_checklist, bf_users_referral_program, bf_users_stock_research, bf_users_trades, bf_users_wallet, bf_users_wallet_transactions, bf_webhook_outbox, bf_weekly_stream_watchlist, bids, blog_posts, notification_outbox, project_task_registry

## Cross-Check: Model Fields Not Found in Migration Columns (Scoped)
> Only compares against columns discovered from migrations in scope; older migrations or manual schema changes may exist.

| Table | Model | Missing allowedFields (not found in migrations) |
| --- | --- | --- |
| bf_investment_trade_alerts | AlertsModel | active, status, occurrences, alert_count, distributed_count, created_on, created_by, updated_at, alert_created, send_alert, alert_sent, ticker, exchange, company, price, open, high, low, volume, market_cap, trailing_stop_percent, locked_profit_stop, stop_loss, max_entry, current_price, entry_price, potential_price, target_price, market_sentiment, trade_type, category, alert_priority, trade_description, financial_news, analysis_summary, tv_chart_type, tv_chart, display, notification_sent, submitted_date, last_updated, last_updated_time, ema_9, ema_21, ema_34, ema_48, ema_100, ema_200, symbol, name, currency, mic_code, country, type, url, title, summary, content, email_identifier, email_date, email_sender, email_subject, email_body, source_email, email_type, news_vendor, symbols, links, images, videos, metadata, structured_data, additional_html_elements, page_performance_data, network_requests, user_interaction_points, accessibility_information, page_relationships, seo_elements, social_media_links, comments_user_generated_content, contact_information, legal_information, breadcrumbs, date_time, author_information, ratings_reviews, price_information, location_data, language_locale, mobile_responsiveness, security_information, technology_stack, server_information, caching_information, content_type, character_set, rss_atom_feeds, pagination, custom_data, error_handling, historical_changes, user_reviews_ratings, inventory_levels, shipping_information, bots_crawlers_information, affiliate_links, advertisements, cookie_notices, popups_modals, browser_specific_data, geolocation_specific_content, ab_testing_variations, user_agent_specific_content, screen_size_specific_content, device_specific_content, browser_extension_data, custom_scripts_analytics, order_status, keywords, last_marketed_at, marketing_status, distribution_channels, latest_forecast_id, forecast_confidence, forecast_direction, forecast_target_price, forecast_range_low, forecast_range_high, forecast_updated_at |
| users | DashboardModel | name, phone, message, title, url, keywords, user_id, goal_description, goal_type, goal_frequency, reward_amount |
| bf_user_profiles | ProfileModel | street, city, state, postal_code, phone_ciphertext, phone_iv, phone_tag, street_ciphertext, street_iv, street_tag, city_ciphertext, city_iv, city_tag, state_ciphertext, state_iv, state_tag, postal_code_ciphertext, postal_code_iv, postal_code_tag, phone_sha |
| users | UserModel | 2fa_secret, permissions, anonymous_id, ip_address, user_id, comment, ticker |

## Cross-Check: Columns Created in Migrations But Not Listed in Model allowedFields
> allowedFields is for mass assignment, so this may include benign differences; treat as a drift indicator only.

| Table | Model | Migration-only columns (not in allowedFields) |
| --- | --- | --- |
| bf_aiops_tasks | AiOpsTaskModel | id |
| bf_aiops_task_runs | AiOpsTaskRunModel | id |
| bf_ai_usage | AiUsageModel | id |
| bf_investment_trade_alerts | AlertsModel | message_hash |
| bf_auth_health_runs | AuthHealthRunModel | id |
| bf_chat_tool_runs | ChatToolRunModel | created_at, id, updated_at |
| users | DashboardModel | activate_hash, active, created_at, deleted_at, force_pass_reset, id, password_hash, referral_code, referred_by_user_id, reset_at, reset_expires, reset_hash, status, status_message, updated_at, username |
| bf_email_outbox | EmailOutboxModel | id |
| bf_investment_forecast_accuracy | InvestmentForecastAccuracyModel | actual_price, constraint, evaluation_minutes, forecast_target, hit_target, id, max_adverse_excursion, max_favorable_excursion, recorded_at |
| bf_investment_forecast_history | InvestmentForecastHistoryModel | constraint, id |
| bf_investment_price_forecasts | InvestmentPriceForecastModel | constraint, id |
| auth_logins | LoginModel | id |
| bf_mdit_deposits | MditDepositModel | id |
| bf_mdit_disclosures_acceptance | MditDisclosureAcceptanceModel | id |
| bf_mdit_investor_profiles | MditInvestorProfileModel | id |
| bf_mdit_nav_snapshots | MditNavSnapshotModel | id |
| bf_mdit_redemptions | MditRedemptionModel | id |
| bf_mdit_token_ledger | MditTokenLedgerModel | id |
| bf_mdit_wallets | MditWalletModel | id |
| bf_mdit_webhook_events | MditWebhookEventModel | id |
| bf_ops_command_inbox | OpsCommandInboxModel | created_at, id, updated_at |
| bf_ops_jobs | OpsJobsModel | id |
| bf_ops_queue | OpsQueueModel | id |
| bf_ops_job_runs | OpsRunsModel | id |
| bf_predictions_liquidity | LiquidityModel | constraint, id |
| bf_predictions_markets | MarketsModel | constraint, id |
| bf_predictions_options | OptionsModel | id |
| bf_predictions_orders | OrdersModel | constraint, id |
| bf_predictions_payouts | PayoutsModel | constraint, id |
| bf_predictions_positions | PositionsModel | id |
| bf_predictions_trades | TradesModel | id |
| bf_user_profiles | ProfileModel | created_at, email, first_name, id, last_name, updated_at |
| bf_runtime_config | RuntimeConfigModel | id |
| bf_investment_signal_files | SignalFilesModel | id |
| bf_investment_signals | SignalsModel | id |
| bf_social_communities | SocialCommunityModel | created_at, id, updated_at |
| bf_social_distribution_queue | SocialDistributionQueueModel | created_at, id, updated_at |
| bf_social_generated_posts | SocialGeneratedPostModel | created_at, id, updated_at |
| bf_social_platforms | SocialPlatformModel | created_at, id, updated_at |
| bf_social_post_templates | SocialPostTemplateModel | created_at, id, updated_at |
| users | UserModel | id, updated_at |