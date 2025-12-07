# Discord Automation Hub

Discord is a core distribution channel for MyMI Wallet: it delivers real-time trade alerts, news and marketing content, earnings watchlists, and community engagement messages. This folder inventories current touchpoints and documents how to build or refine fully autonomous Discord pipelines.

## What’s Inside
- [`discord_integration_overview.md`](discord_integration_overview.md) — Inventory of existing code-level Discord entry points, triggers, and data sources.
- [`alerts_automation.md`](alerts_automation.md) — Trade-alert pipelines from email scraping and manual alerts to Discord delivery.
- [`marketing_news_automation.md`](marketing_news_automation.md) — News scraping, MarketAux integrations, and marketing content flows targeting Discord.
- [`earnings_calendar_automation.md`](earnings_calendar_automation.md) — Concepts for weekly and daily earnings posts.
- [`operations_and_monitoring.md`](operations_and_monitoring.md) — Safety, observability, and rollout guidance for Discord automations.
- [`server_setup_and_ci4_integration.md`](server_setup_and_ci4_integration.md) — Step-by-step server, webhook, and CI4 wiring checklist to deploy the pipelines.
- [`discord_to_ci4_commands.md`](discord_to_ci4_commands.md) — Interactive Discord slash commands that query CI4 (alerts, portfolio, watchlists, earnings, news) after account linking.
- [`server_setup_support_category.md`](server_setup_support_category.md) — Make **Support** the default landing zone with MEE6 + Community Onboarding (mirrors staging and production).
- [`discord_to_ci4_commands.md`](discord_to_ci4_commands.md) — Interactive Discord slash commands that query CI4 (alerts, portfolio, watchlists, earnings, news) after account linking.
- [`where_to_share_what.md`](where_to_share_what.md) — Channel governance: alerts, DD, support, streaming, and off-topic boundaries.
- [`streaming_setup.md`](streaming_setup.md) — How to announce Twitch/YouTube streams and weave MyMI data into live sessions.


## Quick Enable/Disable Checklist
- Configure webhook URLs/Discord bot credentials in environment (`DISCORD_WEBHOOK_URL`, channel-specific secrets) and 1Password.
- Verify CRON triggers for alert processing and Discord distribution (e.g., `sendAllDiscordAlerts` HTTP endpoint).
- Toggle per-automation channels/templates in management UI (see planned `Management/Discord` admin) or configuration arrays.
- Use staging webhooks for template tests; promote to production after validating rate limits and payload formatting.