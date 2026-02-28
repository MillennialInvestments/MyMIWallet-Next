# GTM Change Log

## Touched in this pass
- `app/Services/LLM/OllamaCircuitBreaker.php`
- `app/Services/AIOps/OllamaPatchRunner.php`
- `app/Log/Handlers/DatabaseLoggerHandler.php`
- `docs/launch/*` GTM readiness package files
- `docs/sql/gtm_required_changes.sql`
- `docs/Github/temporary/ollama-patch-pipeline-fallback/README.md`

## Refused / not touched
- Did not auto-apply SQL schema changes.
- Did not implement new 403/500/504 templates in this pass (captured as blocker GAP-001).
- Did not add new spark health snapshot command yet (captured as blocker GAP-002).

## Cycle 2 (Phase 1 execution mode)
- Added `docs/launch/gtm_execution_queue.md` from prioritized unresolved gaps.
- Refreshed `docs/launch/gtm_gap_report.json` run metadata timestamp/commit.
- Updated `docs/launch/gtm_readiness_report.md` with execution-mode cycle note.

## Cycle 3 (Patch Unit GAP-001)
- Implemented custom 403/404/500/504 error lifecycle pages with explicit status codes and 5-second `/Support` redirect.
- Added guarded error logging bootstrap (`ERROR_LOGGING_ACTIVE` + try/catch swallow) to prevent recursion loops.
- Added duplicate DB insert suppression window to `DatabaseLoggerHandler` to further reduce log storms.
- Added patch artifact folder `docs/Github/temporary/gtm_gap-001/` with validation steps.
- Added feature test coverage for manual error routes: `tests/feature/ErrorLifecyclePagesTest.php`.

## Cycle 4 (Patch Unit GAP-002)
- Added dedicated command `gtm:health:snapshot` via `app/Commands/GtmHealthSnapshot.php` and explicit registration in `Config\Console`.
- Generated idempotent snapshot artifact `docs/launch/daily_health_snapshot.md`.
- Updated GAP tracking to mark GAP-002 as FIXED and moved queue to GAP-003 only.

## Cycle 5 (Patch Unit GAP-003)
- Added centralized `ExternalApiGuard` service with process-level provider counters and hard-cap enforcement.
- Added `Config\ExternalApiPolicy` for caps/backoff policy values (alphavantage, marketaux, plaid, robinhood, discord, llm).
- Registered injectable service accessor `Services::externalApiGuard()`.
- Updated GTM snapshot command to emit external policy details from `ExternalApiPolicy`.
- Re-ran daily snapshot and marked GAP-003 as FIXED.

