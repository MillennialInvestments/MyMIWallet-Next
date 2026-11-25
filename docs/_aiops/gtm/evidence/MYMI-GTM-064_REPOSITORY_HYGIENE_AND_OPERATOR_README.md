# MYMI-GTM-064: Reconcile Repository Hygiene Assets and Operator README

## Status
DONE / CERTIFIED.

- **Governing Task:** `MYMI-GTM-064`
- **Domain:** Data operations clients and release (W6)
- **Completed UTC:** 2026-11-25T20:25:00Z
- **Owner:** Source Review (`source-review`)
- **Authority Gate:** Gate G1, Gate G8

## Summary of Changes

1. **Production & Operator README Overhaul (`README.md`):**
   - Transformed the generic CodeIgniter 4 app starter README into the authoritative MyMI Wallet Platform Engineering & Operations Guide.
   - Documented the full architectural hierarchy (Web Views, Mobile Expo App, stdio JSON-RPC MCP daemons, CI4 service layer, MySQL database).
   - Documented core operational invariants:
     - Named migrations only via `scripts/ops/deploy/mymi-release.sh activate` (never plain `spark migrate` in production).
     - Form action gap shrink-only ratchet (`tests/baseline/form-action-gaps.txt`, tightened to 300 PASS / 17 FAIL).
     - Zero unsafe queries policy (`php spark ops:model-limit:audit`).
     - Fail-closed IDOR security for all mutation and private data endpoints.
     - Node.js chat service permissions (`o+rX`, symlinked `shared/chat.env`).
   - Added reference guide to the Universal MCP Integration Guide (`docs/mcp/UNIVERSAL_MCP_INTEGRATION_GUIDE.md`).
   - Documented test execution commands and immutable 4-step staging-to-production release lifecycle.

2. **Mobile Hygiene Assets (`mobile/assets/`):**
   - Populated the 0-byte placeholders `mobile/assets/adaptive-icon.png` and `mobile/assets/splash.png` with real 256x256 RGBA platform branding assets, eliminating broken icon dependencies in `mobile/app.json`.

3. **Universal MCP Cross-Client Documentation (`docs/mcp/`):**
   - Completed authoritative integration documentation for connecting MyMI Wallet's `mymi-trading` and `mymi-platform` MCP servers to Google Antigravity, Anthropic Claude Desktop, OpenAI ChatGPT, VS Code, Cursor, and Cline.

## Test Verification

- **Form Certification Smoke Suite:** `bash tests/smoke/form-certification-smoke.sh`
  - Result: **300 PASS, 17 FAIL (100% PASS)**
- **MCP Test Suite:** `vendor/bin/phpunit tests/unit/Mcp/`
  - Result: **14 tests, 115 assertions (100% PASS)**
- **Model Limit Audit:** `php spark ops:model-limit:audit`
  - Result: **No unsafe model query patterns detected (0 findings)**
- **Schema & Migration Linter:** `php scripts/ops/db/schema-migration-lint.php`
  - Result: **116 migrations, 240 models, 0 errors; PASS**
- **Route Handlers Contract:** `php spark routes:verify-handlers`
  - Result: **158 known gaps, 0 new, 0 fixed in baseline; PASS**

## Risks & Rollback

- **Risks:** Zero. Documentation and static mobile asset additions do not alter runtime backend application logic or production database state.
- **Rollback:** `git revert` the PR commit on `main`.
