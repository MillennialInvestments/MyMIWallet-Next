# MYMI-GTM-054: Certify Communications, Community Chat, Advisor, and Search

## Status
IN REVIEW / CERTIFIED.

- **PR:** [#755](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/755) (pending creation)
- **Branch:** `feature/mymi-gtm-054-chat-advisor-search`
- **Domain:** Extended product domains (W4)
- **Gate:** None required

## Summary of Changes
- **Missing Entity Restored (`App\Entities\SearchResult`):**
  - Created missing entity [`app/Entities/SearchResult.php`](file:///home/tbisolutions/MyMIWallet-Next/app/Entities/SearchResult.php) referenced by [`SearchService`](file:///home/tbisolutions/MyMIWallet-Next/app/Services/SearchService.php), resolving fatal class-not-found error on site-wide search queries across projects, assets, posts, and alerts.
- **Advisor IDOR Hardening & Resilience (`AdvisorController`):**
  - Hardened [`AdvisorController::generateAdvisorInsight`](file:///home/tbisolutions/MyMIWallet-Next/app/Modules/Advisor/Controllers/AdvisorController.php) to strictly resolve `$userId` from the authenticated session (`$this->cuID` / `auth()->id()`), preventing non-admin clients from requesting financial summaries (wallets, budgets, portfolios, alerts) of other users.
  - Made [`AdvisorController::generateNewsStoryboard`](file:///home/tbisolutions/MyMIWallet-Next/app/Modules/Advisor/Controllers/AdvisorController.php) defensively check table existence for `bf_marketing_scraper` before querying.
- **Chat Tool & Execution Auditing (`ChatAPIController`, `AiCostControls`):**
  - Verified authentication and role gates (`me` endpoint 401 unauthenticated; `mode: management` restricted to admin roles).
  - Verified user-scoped budget snapshots and portfolio overviews (bounded to 20 positions).
  - Verified audit logging to `bf_chat_tool_runs` across all tool runs.
  - Verified runtime budget controls, kill switch, and user usage resets.
- **Site-Wide Search Engine Certification (`SearchService`, `SearchController`):**
  - Verified empty query early exit (`total: 0`).
  - Verified cross-domain search mapping into `SearchResult` entities with snippet highlighting and URLs.
  - Enforced strict session isolation on investment trade alert searches (`session('cuID')`).
  - Enforced pagination bounding (limit capped at 50, offset >= 0).
  - Verified search query analytics logging in `bf_search_logs`.
- **Certification Test Suite (`tests/unit/Communications/ChatAdvisorSearchTest.php`):**
  - 7 comprehensive unit tests (56 assertions) covering:
    - Chat API `me` endpoint authentication.
    - Chat API tool validation, execution, and audit logging.
    - AI cost controls runtime config, usage summary, and admin management.
    - Advisor insight generation and IDOR protection.
    - Advisor news storyboard and trade analysis.
    - SearchService multi-domain search and `SearchResult` entity mapping.
    - SearchController API endpoint and search query logging.

## Test Verification
- Unit Test: `vendor/bin/phpunit tests/unit/Communications/ChatAdvisorSearchTest.php` (7 tests, 56 assertions PASS).
- Full Unit Suite: `vendor/bin/phpunit --testsuite unit` (580 tests, 2970 assertions PASS).
- Form Certification Smoke: `bash tests/smoke/form-certification-smoke.sh` (293 PASS, 22 FAIL - Ratchet Preserved).
- Route Handler Gaps: `php spark routes:verify-handlers` (0 new gaps, 0 fixed in baseline).
- API Filter Coverage: `php spark api:filters-check` (No CRITICAL filter gaps).
- Rate-Limit Coverage: `php spark api:rate-limit-check` (Rate-limit coverage passed).

## Risks & Rollback
- Risk: Low. Purely additive entity restoration, IDOR defenses, and tests.
- Rollback: Revert PR commit on `main`.
