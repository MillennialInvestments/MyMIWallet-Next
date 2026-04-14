# Discord Documentation Inventory

This file maps each guide in `/docs/discord` to the commands, routes, tables, and environment variables it references so engineers can quickly validate assumptions when refactoring the stack.

## Reference Matrix

| Document | Spark Commands | Routes / HTTP Endpoints | Tables | Environment Variables | Capability Notes |
| --- | --- | --- | --- | --- | --- |
| README.md | — | — | — | DISCORD_WEBHOOK_URL (fallback mention) | Hub overview of the docs and quick enable/disable checklist for alerts/marketing pipelines. |
| _index.md | — | — | — | — | File listing for the Discord documentation folder. |
| alerts_automation.md | `discord:list`, `discord:test` | — | bf_discord_channels, bf_discord_subscriptions, bf_discord_queue, bf_discord_policies, bf_discord_events_log | DISCORD_*_WEBHOOK, DISCORD_*_CHANNEL_ID, DISCORD_DEFAULT_WEBHOOK, DISCORD_USE_BOT_API_FALLBACK, DISCORD_STORE_WEBHOOK_MSG_ID, DISCORD_ALERTS_STRICT, DISCORD_ALERTS_DRY_RUN, DISCORD_TIMEZONE, DISCORD_QUIET_HOURS_START, DISCORD_QUIET_HOURS_END | Explains delivery model, channel keys, queue-first behavior, and troubleshooting for Discord alerts. |
| marketing_news_automation.md | — | — | — | Discord webhook env vars (per marketing channel) | Shows how MarketAux/news and marketing automations format and send content to Discord webhooks. |
| earnings_calendar_automation.md | — | — | — | Discord webhook env vars for earnings channels | Describes weekly/daily earnings posts and payload structure. |
| operations_and_montioring.md | — | — | — | — | Operational guardrails: rate limiting, retries, health checks, and deployment hygiene for Discord automations. |
| server_setup_and_ci4_integration.md | — | `/API/Alerts/sendDiscordAlerts`, `/API/Alerts/sendDiscordAlertsBySymbol/{symbol}`, `/API/Management/sendAllDiscordAlerts` | bf_discord_channels, bf_discord_templates, bf_discord_subscriptions | DISCORD_DEFAULT_WEBHOOK, DISCORD_ALERTS_WEBHOOK, DISCORD_MARKETING_WEBHOOK, DISCORD_EARNINGS_WEBHOOK, DISCORD_OPS_WEBHOOK, DISCORD_SUPPORT_WEBHOOK, DISCORD_ALERTS_TIER{1..3}_WEBHOOK, DISCORD_MYMI_AI_BOT_TOKEN (primary), DISCORD_BOT_TOKEN (legacy fallback), DISCORD_GUILD_ID, DISCORD_ALERTS_DRY_RUN, DISCORD_USE_BOT_API_FALLBACK | End-to-end checklist for creating channels, mapping webhooks, wiring alerts/marketing/earnings routes, and validating deployments. |
| discord_integration_overview.md | — | ManagementController::sendAllDiscordAlerts (HTTP), MyMIAlerts::sendDiscordNotification (library) | bf_investment_trade_alerts (source), Discord queue tables | DISCORD_WEBHOOK_URL | Summarizes current touchpoints (alerts, marketing posts), planned earnings/system health routes, and config hygiene. |
| discord_to_ci4_commands.md | Example `discord:registerCommands` | `/API/Discord/interactions`, optional `/API/Discord/messageHook`, `/API/Discord/webhook`, `/Account/Social-Media` | bf_users_discord_links (proposed), bf_discord_subscriptions/templates/channels/queue (reuse) | DISCORD_MYMI_AI_BOT_TOKEN (primary), DISCORD_BOT_TOKEN (legacy fallback), DISCORD_PUBLIC_KEY, DISCORD_CLIENT_ID, DISCORD_CLIENT_SECRET, DISCORD_REDIRECT_URI, DISCORD_WEBHOOK_ALERTS/NEWS/EARNINGS, DISCORD_ROLE_PLAN_MAP | Design for slash commands, account linking, role sync, `$TICKER` hooks, and interaction verification. |
| discord_schema_v3.sql.md | — | — | bf_discord_subscriptions, bf_discord_message_history, bf_discord_policies, bf_discord_queue | — | SQL alters for digest templates, normalized hashes, policy tables, and queue indexes. |
| discord_seed_v3.sql.md | — | — | bf_discord_templates, bf_discord_subscriptions | — | Sample digest template and subscription update for market news digests. |
| marketing_news_automation.md | — | — | bf_marketing_temp_scraper, bf_marketing_scraper (sources) | — | Details content ingestion and Discord posting patterns for marketing/news. |
| operations_and_montioring.md | — | — | — | — | Rate limiting, retries, health checks for Discord pipelines. |
| earnings_calendar_automation.md | — | — | EarningsModel data | — | Weekly/daily earnings summaries for Discord. |
| server_setup_and_ci4_integration.md | — | as above | bf_discord_channels/templates/subscriptions | Webhook/bot env vars listed above | Setup checklist for Discord + CI4 wiring. |
| my_midiscord_server_setup_and_alert_routing.md | `discord:list`, `discord:wire-check`, `discord:process-queue`, `discord:test`, `discord:test-liquidity` | `/API/Alerts/sendDiscordAlerts`, `/API/Management/sendAllDiscordAlerts` (validation hooks) | bf_discord_channels, bf_discord_queue, bf_discord_subscriptions, bf_discord_templates | DISCORD_MYMI_AI_BOT_TOKEN (primary), DISCORD_BOT_TOKEN (legacy fallback), DISCORD_GUILD_ID, DISCORD_TIMEZONE, DISCORD_MIN_SECONDS_BETWEEN_POSTS, DISCORD_QUIET_HOURS_START/END, DISCORD_USE_BOT_API_FALLBACK, DISCORD_STORE_WEBHOOK_MSG_ID, DISCORD_ALERTS_STRICT, DISCORD_ALERTS_DRY_RUN, per-channel webhooks/IDs | Developer quickstart for sending test messages, dispatching events, and verifying queue processing. |
| environments.md | — | — | — | Consolidated env list (bot, guild, quiet hours, per-channel webhooks/IDs, toggles) | Canonical reference for all Discord-related env vars. |
| events_matrix.md | — | — | bf_discord_subscriptions | — | Matrix of event_key → channel_key → template_key mappings for alerts/news/ops. |
| python_workers.md | — | `/API/Discord/feed/alerts-recent` (example), CI4 endpoints for metrics | bf_discord_events (optional metrics) | Python worker .env/config keys for webhooks/bot token/API hosts | Describes optional Python utilities for digests, engagement analytics, and MEE6 exploration. |
| mee6_and_mymi_automation.md | — | — | — | — | Documents how MEE6 pairs with MyMIDiscord today and roadmap for MyMI-branded automation. |
| premium_flows_and_upsell.md | — | — | bf_users subscriptions (source data) | — | Maps plans to Discord roles/channels and outlines upsell flows. |

## Quick How-to Use This Inventory

- When updating docs, cross-check this table so every referenced command/route/table/env exists in code. If something is missing, add it to CI4 (command, route, or schema SQL) or adjust the docs to match reality.
- Use the `events_matrix.md` and `mysql_discord_schema.md` files as ground truth for subscriptions and schema alignment when creating migrations or seeders.
