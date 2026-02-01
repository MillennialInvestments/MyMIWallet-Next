# Email Scraper Audit (Trade + News)

## Purpose
The `scraper:audit-emails` Spark command validates the end-to-end email scraping pipeline for trade alerts and news emails without changing business logic. It inspects recent inbox-derived records, checks them against the expected schema, and reports any risks that could break downstream processing or dashboards.

## How `scraper:audit-emails` Works
1. Loads the expected schema from `docs/scrapers/email_expected_schema.yaml`.
2. Pulls the most recent emails from:
   - Trade alerts staging (`bf_investment_scraper`)
   - News/marketing staging (`bf_marketing_temp_scraper`)
3. Validates each record for:
   - Category correctness (trade vs news)
   - Required fields + metadata
   - Content sanitization safety checks
   - Presentation-safe fields used in dashboards
   - Duplicate identifiers
   - Missing inserts into final tables when records are marked processed
4. Writes a JSON audit report to `writable/triage/email-scraper-audit-{timestamp}.json`.

## Current Logic Review (Discovery Notes)
- **Trade alerts ingestion:** `MyMIAlerts::ingestEmailPayload` classifies emails, extracts symbols, and inserts into `bf_investment_scraper` before queuing parsing jobs.【F:app/Libraries/MyMIAlerts.php†L688-L931】
- **Trade alert inbox fetch:** `MyMIAlerts::fetchAndStoreEmails` connects via IMAP and inserts alert emails into `bf_investment_scraper`, then updates `bf_investment_alert_history`.【F:app/Libraries/MyMIAlerts.php†L1463-L1563】
- **News/marketing inbox fetch:** `MyMIMarketing::fetchAndStoreEmails` connects via IMAP, sanitizes HTML, stores into `bf_marketing_temp_scraper`, and logs analytics scores.【F:app/Libraries/MyMIMarketing.php†L1101-L1224】
- **CRON entry points:** `MarketingController` exposes endpoints that call the inbox fetchers for trade/news workflows.【F:app/Modules/APIs/Controllers/MarketingController.php†L150-L224】

### Usage
```bash
php spark scraper:audit-emails
php spark scraper:audit-emails 50
php spark scraper:audit-emails --limit=50
```

## Expected Schema
The schema file defines per-category requirements and guardrails:
- Required fields and derived fields (symbol/title/keywords)
- Global safety constraints (length caps, encoding, HTML sanitization)
- Validation rules (trade keyword checks, news sentence count)
- Presentation requirements expected by UI dashboards
- Default fallbacks applied to prevent blank cards in dashboards

See `docs/scrapers/email_expected_schema.yaml` for the canonical configuration.

## Failure Types
The audit classifies failures using these types:
- `CATEGORY_MISSING` — record category mismatched or missing.
- `PARSE_FAILED` — symbols/keywords missing where expected.
- `SCHEMA_INVALID` — missing required fields or too-short content.
- `UNSAFE_CONTENT` — unsafe HTML/scripts detected.
- `DB_INSERT_FAILED` — missing downstream insert into final tables.
- `UI_BREAK_RISK` — required UI fields are missing.
- `DUPLICATE_DETECTED` — identifier collision detected.
- `FALLBACK_APPLIED` — defaults filled missing fields (non-fatal, still reported).

## Why This Protects the Platform
- **Trade alerts**: ensures symbols, category, and identifiers are intact so alerts can enrich and distribute correctly.
- **News feeds**: validates summaries, keywords, and titles to avoid blank rows and broken modals.
- **Dashboards**: confirms presentation-safe fields are populated before UI rendering.
- **Fallbacks**: auto-fills missing labels/titles so dashboards stay resilient while still logging gaps.

## Reporting
Each failed record includes:
- `failure_type`
- `root_cause_guess`
- `affected_table`
- `recommended_fix`

The report also includes a generated `fix_plan` created by `ScraperOpsService` to guide safe patches.

## Dashboard Visibility
The Executive Dashboard includes an **Email Pipeline Health** block that reads the latest audit report from `writable/triage/` and summarizes:
- Emails scanned (last 24h run)
- Trade vs news counts
- Failures (red) and fallbacks applied (yellow)
- Status indicator: ✅ Pipeline Healthy, ⚠️ Recovered with defaults, or ❌ Attention Needed

## Future Integration
This audit is designed to integrate with:
- **CRON** (scheduled health checks)
- **Discord alerts** (notify ops if failure thresholds are exceeded)
- **Codex auto-fix tasks** (future automated remediation workflows)

Use the report output as the input payload for those automation layers.
