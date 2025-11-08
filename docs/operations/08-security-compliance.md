# Security & Compliance

## Overview
Evaluates frontend nonce injection, dependency hygiene, input sanitization, and secret management practices.

## Inventory (Auto-collected)
- Generated on: 2025-10-06 21:26 UTC
- Tooling: grep/awk/php spark/composer/git

## Status Table
| Area / Item | Current Status | Action Needed | Priority | Notes |
|---|---|---|---|---|
| CSP nonce injection verified in layouts/js-links.php | ⚙️ Needs Review | Audit all theme layouts to reuse centralized nonce helpers. | 🟡 Medium | JS links inject nonce but rely on controller-provided data. |
| Known NPM CVEs & planned remediation | ❌ Broken/Unknown | Remove or update legacy `package-lock.json` artifacts under `public/` assets. | 🔴 Critical | Multiple stale lockfiles likely contain vulnerable dependencies. |
| Email/HTML sanitization before NLP | ⚙️ Needs Review | Extend sanitization coverage to all marketing ingestion paths. | 🟠 High | Marketing library cleans raw HTML but relies on manual fallback. |
| Secret rotation policy | ⚙️ Needs Review | Document cadence for Alpha Vantage, Discord, Zapier keys and automate reminders. | 🟠 High | Rotation handled ad hoc via library/runbook only. |
| Error email alerts (support@) confirmed | ⚙️ Needs Review | Replace raw `@mail` with queued notifier and central logging. | 🟡 Medium | 404 template emails support directly from view. |

## Findings (Evidence)
- Public layout injects nonce-aware scripts using `$nonce['script']` and fallback logic.【F:app/Views/themes/public/layouts/js-links.php†L1-L83】
- Repository contains numerous legacy `package-lock.json` files under `public/` assets directories.【a64f6a†L1-L10】
- Marketing sanitization workflow trims and validates email content before summarization.【0ae9ba†L1-L94】
- Alpha Vantage rotation relies on library-level key pools without central policy documentation.【c29c65†L1-L127】
- Error templates send mail to `support@mymiwallet.com` directly inside the view and log to `bf_error_logs`.【245b84†L52-L75】

## Required Fixes / Tasks
- [ ] Purge or upgrade legacy vendor assets under `public/` and consolidate npm dependencies (owner: Codex).
- [ ] Establish quarterly secret rotation checklist covering Alpha Vantage, Discord, Zapier (owner: Codex).
- [ ] Perform manual secret audit via [env-baseline-keys.md](../ops/runbooks/env-baseline-keys.md) (owner: Teddy/manual).

## Links & References
- `app/Views/themes/public/layouts/js-links.php`
- `app/Libraries/MyMIMarketing.php`, `app/Libraries/MyMIAlphaVantage.php`
- `app/Views/errors/html/error_404.php`
- `public/**/package-lock.json`
