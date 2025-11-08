# Marketing & Growth Automation

## Overview
Assesses NLP summarization, campaign generation, live preview tooling, and outbound distribution for marketing automation.

## Inventory (Auto-collected)
- Generated on: 2025-10-06 21:17 UTC
- Tooling: grep/awk/php spark/composer/git

## Status Table
| Area / Item | Current Status | Action Needed | Priority | Notes |
|---|---|---|---|---|
| Summarization stability (guards vs malformed docs) | ⚙️ Needs Review | Add retry budget + telemetry around `summarizeContent` fallback paths. | 🟡 Medium | Recursion capped at depth 2 but only logs on failure. |
| Post generator + CTA overrides | ⚙️ Needs Review | Enforce required CTA fields and persist revision history. | 🟠 High | Control panel triggers post generation without approval gate. |
| Dynamic modal preview loader | ⚙️ Needs Review | Ensure modals handle empty states and async errors gracefully. | 🟡 Medium | Live mode toggles rely on JS fetch success. |
| Live Mode (auto refresh 30s) | ⚙️ Needs Review | Debounce refresh + persist toggle state per user. | 🟡 Medium | Live toggle present but not persisted server-side. |
| Campaign reference docs present/missing | ⚙️ Needs Review | Update `/docs/marketing` index with latest automation flows. | 🟡 Medium | Docs exist but need mapping to current cron + tooling. |
| Distribution via Zapier/Discord | ⚙️ Needs Review | Capture webhook response codes and throttle Discord sends. | 🟠 High | Manual endpoints send to Zapier/Discord without retry logic. |

## Findings (Evidence)
- Marketing library sanitizes content and retries summarization but only logs when output too short.【F:app/Libraries/MyMIMarketing.php†L1874-L1958】
- Management marketing control panel provides live mode toggle and immediate post generation actions via fetch APIs.【F:app/Modules/Management/Views/Marketing/resources/controlPanelBlock.php†L7-L160】
- Marketing controller exposes cron endpoints for inbox scrape, summary generation, and distribution without additional guards.【F:app/Modules/APIs/Controllers/MarketingController.php†L80-L188】
- Zapier and Discord distribution handled through management controller with minimal error handling.【F:app/Modules/APIs/Controllers/ManagementController.php†L1326-L1434】
- Marketing documentation directory contains campaign guides covering multiple platforms.【bca01a†L1-L6】

## Required Fixes / Tasks
- [ ] Implement telemetry + circuit breakers for marketing summarization and post generation (owner: Codex).
- [ ] Add approval queue/state machine for Discord/Zapier distribution endpoints (owner: Codex).
- [ ] Review marketing playbooks in [docs/marketing/index.md](../marketing/index.md) and align cron notes with current automation (owner: Teddy/manual).

## Links & References
- `app/Libraries/MyMIMarketing.php`
- `app/Modules/Management/Views/Marketing/resources/controlPanelBlock.php`
- `app/Modules/APIs/Controllers/MarketingController.php`, `ManagementController.php`
- `docs/marketing/`
