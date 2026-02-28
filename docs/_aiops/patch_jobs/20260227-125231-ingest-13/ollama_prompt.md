# AIOPS INGEST JOB #13

## Goal
Analyze the instruction and produce minimal CI4-compatible code changes.

## Governance Context
- Risk Level: HIGH
- Governance Score: 100
- Manual Review Required: YES

## Targeting Hints (best-effort)
- app/Config/Routes.php
- app/Config/Filters.php
- app/Config/Logger.php
- app/Config/App.php
- app/Config/Database.php
- app/Config/Cache.php
- app/Commands/
- app/Controllers/
- app/Services/AIOps/
- app/Database/Migrations/
- app/Views/


## Output Contract (STRICT)
Write outputs into:
- docs/_aiops/pr_ready/13/
Include:
- pr.md (title, summary, rationale, rollback, tests)
- patch/ (full replacement files OR unified diffs per file)
- risks.md
- tests.md

## Instruction
AIOPS_PATCH_JOB_TITLE=2026-02-27_PROFITABILITY_LAUNCH_GATE_AUDIT_AND_PATCH_PLAN AIOPS_OBJECTIVE=Determine_GO_NO_GO_for_marketing_and_profitability_readiness_generate_blocker_patch_jobs_and_apply_critical_fixes_only CONTEXT: - Date/time: 2026-02-27 06:44 America/Chicago - Goal: complete deep analysis + determine required work today; fix all marketing blockers today. - Scope: CI4 app + all Modules + Routes + Filters + Auth + Logging + Rate limiting + core user flows. - Output must be deterministic, auditable, and reproducible. DELIVERABLES_REQUIRED: 1) docs/launch/launch_gate_report.md 2) docs/launch/blockers_today.md (only items that must be fixed before marketing) 3) docs/launch/next_7_days.md (high impact but not blocking) 4) docs/launch/revenue_readiness.md (pricing hooks, onboarding, upsell points, CTA readiness) 5) docs/_aiops/patch_jobs/ generated files for EACH blocker (one job per cohesive patch) 6) docs/Github/temporary/ patch artifacts (file-by-file output ready for PR) HARD_RULES: - Do NOT propose long refactors tonight. - Identify the smallest patch set that yields a marketing-safe GO. - Any discovered security exposure is automatically a BLOCKER. - Any logging recursion / alert spam loop is a BLOCKER. - Any endpoint that can trigger high API spend without auth/limits is a BLOCKER. PHASE_1_DISCOVERY (Must execute): A) Inventory - Run: php spark routes > writable/triage/routes.txt (or equivalent output location) - Scan: app/Config/Routes.php, app/Config/Filters.php, app/Config/Logger.php, app/Config/App.php, app/Config/Database.php, app/Config/Cache.php - Enumerate: app/Modules/**/Controllers/**/*.php and list public methods - Create: docs/launch/_inventory.md with counts and locations B) Security & Permissions Audit - Identify all /API/* routes and categorize: - public safe - authenticated user - admin only - internal/cron - Verify Myth/Auth enforcement: - filters present - group/permission mapping exists - Output: docs/launch/security_audit.md - Any admin/cron route missing restriction => BLOCKER C) Rate Limit & Cost Bomb Audit - Identify all external API call sites (AlphaVantage, MarketAux, Zapier, Discord, email scrape) - Determine: - if calls are queued/batched - if caps exist - if failures halt - Flag any loop risk that can exceed limits quickly => BLOCKER - Output: docs/launch/cost_bomb_audit.md D) Logging & Alerting Audit - Verify DatabaseLoggerHandler not in recursion - Search for “LOGGER TEST”, noisy debug markers, infinite loops - Verify bf_error_logs insert path is stable - Output: docs/launch/logging_audit.md - Any recursion/spam loop => BLOCKER E) Core User Journey Smoke Test Plan (no browser automation required) - Determine the minimal endpoints/pages needed for marketing demo: - register/login - budget add + view - watchlist add + view - marketing preview modal (if present) - Produce: docs/launch/smoke_test_plan.md - If any of these are known broken => BLOCKER PHASE_2_LAUNCH_GATE_DECISION (Must execute): - Produce docs/launch/launch_gate_report.md with: - GO/NO-GO verdict - Blockers list (with severity, owner, fix estimate in patch size, NOT time) - Risks accepted (explicitly) - What’s safe to market (exact feature list) - What to avoid marketing (exact list) PHASE_3_PATCH_JOB_GENERATION (Must execute): For each BLOCKER create a patch job file: - docs/_aiops/patch_jobs/2026-02-27__BLOCKER_<slug>.md Each patch job must include: - Objective - Root cause (file/line) - Files to edit - Exact patch content to place in docs/Github/temporary with correct paths - Tests / commands to validate - Rollback plan PHASE_4_OLLAMA_ASSISTED_PATCH_DRAFTING: - Use Ollama to draft code for each patch job - Put outputs under docs/Github/temporary/<patch_job_slug>/ - Include: - modified files - new files - migration SQL if needed - updated docs PHASE_5_VALIDATION (Must execute): - Run locally: - php spark routes - php spark cache:clear (if available) - php spark app:logs:healthcheck (or your equivalent) - Ensure no new fatal errors - Ensure blocking endpoints are protected - Update launch_gate_report.md with validation results AUTOMATIC_BLOCKERS (Always treat as BLOCKER if detected): 1) Any Management/Alerts/CRON route callable without auth/token/CLI restriction 2) Any logger recursion / repeated inserts/email spam loop 3) Any external API call loop without cap or circuit breaker 4) Any 500 error on login/register/budget/watchlist pages 5) Any missing Terms/Privacy links (can be placeholder pages) OUTPUT_FORMAT_REQUIREMENTS: - No emojis - Use exact file paths - Use concrete commands Teddy can run - Summaries must include counts and lists