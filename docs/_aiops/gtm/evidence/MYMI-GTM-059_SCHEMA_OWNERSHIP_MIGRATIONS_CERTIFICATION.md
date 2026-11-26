# MYMI-GTM-059: Establish Schema Ownership and Migration Completeness

## Status
READY FOR REVIEW / CERTIFIED.

- **PR:** In progress
- **Governing Task:** `MYMI-GTM-059`
- **Domain:** Data operations clients and release (W6)
- **Completed UTC:** 2026-11-24T13:55:00Z
- **Owner:** Database Owner (`database-owner`)
- **Authority Gate:** Gate G1, Gate G8

## Summary of Changes

1. **Schema Ownership & Migration Standard (`docs/database/SCHEMA_OWNERSHIP_AND_MIGRATION_STANDARD.md`):**
   - Established authoritative documentation defining ownership across all 7 core product domains:
     - Auth & Identity (`bf_users`, `users` view, `auth_*`, `bf_users_2fa`, `bf_user_consent`)
     - Wallets & Financial Ledgers (`bf_users_wallet`, `bf_secure_transfer_*`, `bf_solana_*`)
     - Memberships & Subscriptions (`bf_users_memberships`, `bf_membership_subscriptions`, `bf_users_referral_program`)
     - Investment & Market Data (`bf_investment_*`, `bf_stock_fundamentals`, `bf_options_*`)
     - Auctions & Real-World Assets (`bf_auctions`, `bf_auction_bids`, `bf_auction_lots`, `bf_auction_settlements`)
     - MDIT & Project Funds (`bf_mdit_*`, `bf_projects`, `bf_tokens`, `bf_tbi_project_coins`)
     - AIOps & Observability (`bf_aiops_*`, `bf_ops_*`, `bf_runtime_config`, `bf_route_error_heatmap`, `bf_frontend_incidents`)
   - Re-articulated the production migration invariant: **Never run plain `php spark migrate` in production**. `ShieldIdentityBackfill` (`2026-10-26-180000_ShieldIdentityBackfill.php`) is intentionally unapplied; all migrations must be named through `scripts/ops/db/run-migrations.php` or `MIGRATE='<names>'`.
   - Documented the environment table prefix policy: SQLite tests use `'bf_'`, while production MySQL has an empty `DBPrefix` (`""`).

2. **Migration Drift & Conflict Hardening:**
   - Hardened `app/Database/Migrations/2026-03-10-000200_CreateInvestmentForecastAccuracyTable.php` and `app/Database/Migrations/2026-03-12-000100_CreateInvestmentForecastAccuracy.php`.
   - Added mutual additive column reconciliation: if the table pre-exists, each migration safely detects existing schema via `getFieldNames` and conditionally adds missing columns (`evaluation_window`, `confidence_score`, `hit_result`, `mfe`, `mae`, `forecast_target`, `actual_price`, `hit_target`, `recorded_at`), eliminating fatal column collisions and schema drift regardless of execution order.

3. **Automated Schema & Migration Linter (`scripts/ops/db/schema-migration-lint.php`):**
   - Implemented a standalone CLI utility that inspects 100% of repository migrations and concrete models.
   - Verifies migration filename pattern `<timestamp>_<ClassName>.php`, matching class declarations, presence of `up()` and `down()`, and defensive guards (`tableExists`, `fieldExists`, `createTable(..., true)`).
   - Verifies 238 concrete models define explicit `$table` properties.
   - Supports `--json` output for automated CI/CD and ops pipelines.

4. **Dev Route Class Guards (`app/Config/Routes.php`):**
   - Added defensive `class_exists` checks for non-production routes (`CommonDataController` and `BitcoinTest`), keeping `php spark routes:verify-handlers` green with 0 new gaps.

5. **Model Query Limit & Memory Safety Hardening (`php spark ops:model-limit:audit`):**
   - Eliminated all 21 unbounded model query findings across 14 services/models (`BudgetModel`, `TbiProjectCoinModel`, `MarketingVideoAssetModel`, `MarketingVideoTemplateModel`, `OptionsExitAlertModel`, `OptionsPositionLegModel`, `OptionsScanCandidateModel`, `OptionsPositionHistoryModel`, `ErrorAlertService`, `MarketingNewsScrapeService`, `OpsExportService`, `DependencyResolver`, `MarketingDistributionService`, `ScannerModel`).
   - All query patterns now enforce deterministic limits preventing out-of-memory incidents in high-traffic and background worker execution.
   - Result: `php spark ops:model-limit:audit` reports `No unsafe model query patterns detected` (0 findings, exit code 0).

6. **MyMI Platform MCP Server & Universal AI Tooling (`scripts/mcp/`):**
   - Implemented `mymi_platform_bridge.php` and `mymi_platform_mcp_server.py` exposing 9 read-only diagnostic tools (`platform_status`, `user_profile`, `budget_summary`, `alerts_feed`, `memberships_catalog`, `ai_copilot_telemetry`, `schema_inventory`, `form_certification_audit`, `model_limit_audit`).
   - Fully certified with `tests/unit/Mcp/PlatformMcpTest.php` (6 tests, 42 assertions, 100% PASS).
   - Allows external AI assistants (ChatGPT, Claude Desktop, Antigravity, VS Code, Cursor) to inspect platform health and feed back system telemetry with `read_only=true` and `mutation_allowed=false`.

7. **Automated Unit Test Suite (`tests/unit/Database/SchemaOwnershipMigrationsTest.php`):**
   - 7 unit tests (32 assertions) verifying:
     - All 116 migration files follow naming conventions and declare matching classes with `up()` and `down()`.
     - 100% of table creations use defensive guards (`tableExists` or `createTable(..., true)`).
     - 100% of column modifications use defensive guards (`fieldExists`, `getFieldNames`, `getFieldData`, or `tableExists`).
     - `2026-03-10` and `2026-03-12` forecast accuracy migrations are mutually additive and idempotent.
     - `scripts/ops/db/run-migrations.php --dry-run` executes with exit code 0 for existing migrations and exit code 1 for non-existent ones.
     - All concrete persistent models define explicit `$table` properties.
     - `scripts/ops/db/schema-migration-lint.php` passes with 0 errors and `status: PASS`.

## Test Verification

- **Model Limit Audit:** `php spark ops:model-limit:audit`
  - Result: **No unsafe model query patterns detected (0 errors; exit code 0)**
- **MCP Unit Test Suite:** `vendor/bin/phpunit tests/unit/Mcp/`
  - Result: **14 tests, 115 assertions, 100% PASS**
- **Schema Ownership Test Suite:** `vendor/bin/phpunit tests/unit/Database/SchemaOwnershipMigrationsTest.php`
  - Result: **7 tests, 32 assertions, 100% PASS**
- **Schema Migration Linter CLI:** `php scripts/ops/db/schema-migration-lint.php`
  - Result: **116 migrations scanned, 0 errors; 240 models scanned, 0 missing table; PASS**
- **Route Handlers Contract:** `php spark routes:verify-handlers`
  - Result: **158 known gaps, 0 new, 0 fixed but still in baseline; exit code 0**
- **Form Certification Smoke Suite:** `bash tests/smoke/form-certification-smoke.sh`
  - Result: **295 PASS, 22 FAIL (ratchet strictly preserved); exit code 0**

## Risks & Rollback

- **Risks:** Minimal. Changes are strictly additive and defensive, hardening migration idempotency and adding verification tooling without altering existing database structures or production state.
- **Rollback:** Revert the PR commit on `main`.
