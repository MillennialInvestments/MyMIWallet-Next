# AIOPS INGEST JOB #8

## Goal
Analyze the instruction and produce minimal CI4-compatible code changes.

## Governance Context
- Risk Level: HIGH
- Governance Score: 65
- Manual Review Required: YES

## Targeting Hints (best-effort)
- app/Config/Events.php
- app/Config/Filters.php
- app/Controllers/BaseController.php
- app/Config/Routes.php
- app/Controllers/
- app/Models/
- app/Services/
- app/Config/Logger.php


## Output Contract (STRICT)
Write outputs into:
- docs/_aiops/pr_ready/8/
Include:
- pr.md (title, summary, rationale, rollback, tests)
- patch/ (full replacement files OR unified diffs per file)
- risks.md
- tests.md

## Instruction
🔥 MASTER DEBUG INSTRUMENTATION INSTRUCTIONS FOR CODEX Objective: Inject structured, layered, production-safe debugging across: Controllers Services Models Routes Filters AJAX endpoints Exceptions Database operations Recurring scheduling Fetch/AJAX detection CSRF validation Memory usage Response types Without breaking performance. 🔴 PHASE 1 — GLOBAL REQUEST TRACE LOGGER Modify: app/Config/Events.php Add: Events::on('pre_system', function () { log_message('debug', '[REQUEST][START] ' . (['REQUEST_METHOD'] ?? 'UNKNOWN') . ' ' . (['REQUEST_URI'] ?? 'UNKNOWN')); }); Events::on('post_system', function () { log_message('debug', '[REQUEST][END]'); }); This confirms every request lifecycle. 🔴 PHASE 2 — ROUTE RESOLUTION TRACE Modify: app/Config/Filters.php Inside global “before” filter: log_message('debug', '[ROUTE] Controller=' . service('router')->controllerName() . ' Method=' . service('router')->methodName()); This tells us whether Account-Manager is resolving at all. 🔴 PHASE 3 — CONTROLLER ENTRY INSTRUMENTATION In BaseController (VERY IMPORTANT) Modify: app/Controllers/BaseController.php Inside initController(): log_message('debug', '[CONTROLLER INIT] ' . static::class . '::' . ->request->getMethod()); In BudgetController — At TOP of EVERY public method: Codex must inject: log_message('debug', '[BudgetController::METHOD_ENTRY] ' . __FUNCTION__); Especially: accountManager Add Edit RecurringAccount Schedule 🔴 PHASE 4 — FORCE AJAX DETECTION TRACE Inside accountManager: log_message('debug', '[AJAX CHECK] isAJAX=' . (->request->isAJAX() ? 'YES' : 'NO')); log_message('debug', '[HEADERS] ' . json_encode(->request->headers())); log_message('debug', '[POST DATA] ' . json_encode(->request->getPost())); If you don’t see this, the method isn’t executing. 🔴 PHASE 5 — CSRF TRACE Inside Config/Filters.php, CSRF section: Add temporary logging: log_message('debug', '[CSRF] token name=' . csrf_token() . ' hash=' . csrf_hash()); If failing, add inside CSRF exception handler. 🔴 PHASE 6 — FETCH FAILURE TRACE (FRONTEND) Codex must modify your JS submit handler to include: console.log(Submitting