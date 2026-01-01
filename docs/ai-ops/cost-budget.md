# AI Ops Cost Budget and Caps

## Monthly Budget Targets (Example Defaults)

| Subsystem                  | Purpose                    | Hard Cap (USD) | Soft Alert (80%) | Daily Budget (Cap/30) | Notes                                    |
|----------------------------|----------------------------|----------------|------------------|-----------------------|------------------------------------------|
| ChatGPT API – Marketing    | Summaries/posts/hashtags   | 30             | 24               | 1.00                  | Cached heavily; skip duplicates          |
| ChatGPT API – Alerts       | Alert summaries/scripts    | 25             | 20               | 0.83                  | Batch + queue                            |
| ChatGPT API – Analytics    | Insights/weekly digests    | 15             | 12               | 0.50                  | Weekly runs                              |
| Codex API – Codegen        | scaffolds/refactors/tests  | 40             | 32               | 1.33                  | Only on-demand + PR-based                |
| GitHub AI Reviews          | PR review automation       | 0–20           | 80%              | n/a                   | Track count; if API used, meter          |
| Buffer/Overages Reserve    | Unexpected spikes          | 20             | 16               | 0.66                  | Only with manual enable                  |

**Global Hard Cap**

- `AI_GLOBAL_CAP_USD`: sum of above (example: 130)
- System must stop API jobs automatically when caps are exceeded unless “override” is enabled.

> **Note:** Keep the numbers configurable in the database and `SiteSettings`, not hard-coded.

## Per-subsystem caps

Caps are stored in `bf_ai_ops_caps` and editable via dashboard (`setCaps`) or CLI seed. Each row includes subsystem slug, USD cap, optional token cap, reset period (monthly), and enable flag.

## Pricing assumptions

- Use generic per-1K token pricing from configuration; do not hardcode vendor pricing.
- Prefer API-returned usage/cost when available; otherwise estimate using stored pricing multipliers.
- Mark estimated costs as “estimated” in UI.

## Adjusting budgets

1. Update caps in dashboard or via `php spark aiops:seed --reset` to reload defaults.
2. Align daily budgets to CRON volume; raise caps if weekly analytics is expanded.
3. Prefer increasing cache TTL or batching before raising caps.
4. Document any override usage in the event log with reason/IP/UserAgent.
