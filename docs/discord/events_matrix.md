# Discord Events → Channels → Templates

Use this matrix to ensure `bf_discord_subscriptions` rows and templates exist for every event we publish.

| event_key | channel_key | template_key | Description |
| --- | --- | --- | --- |
| `scanner.liquidity` | `alerts.liquidity` | `scanner.liquidity.basic` | Liquidity scanner alerts sourced from ThinkOrSwim/TradingView feeds. |
| `scanner.momentum` | `alerts.momentum` | `scanner.momentum.basic` | Momentum scanner alerts. |
| `alerts.trade_update` | `alerts` | `alerts.trade_update` | Real-time trade openings/updates for paid tiers. |
| `alerts.free_preview` | `alerts.free` | `alerts.trade_preview` | Trimmed preview of premium alerts for free users. |
| `marketing.daily_digest` | `marketing.news` | `digest.market_news.15m` | MarketAux/news digest posts. |
| `earnings.weekly` | `earnings` | `earnings.weekly_overview` | Monday morning earnings calendar. |
| `earnings.daily` | `earnings` | `earnings.daily_watch` | Optional daily earnings lineup. |
| `ops.health` | `ops` | `ops.health_ping` | CRON/queue status checks and outages. |
| `support.ticket` | `support` | `support.ticket_created` | Support ticket notifications. |
| `alerts.upsell` | `alerts.free` | `alerts.upsell_prompt` | Upsell CTA for active free users engaging with alerts. |

Update this list as new event types are added. Each row should have a corresponding entry in `bf_discord_subscriptions` and a live template in `bf_discord_templates`.
