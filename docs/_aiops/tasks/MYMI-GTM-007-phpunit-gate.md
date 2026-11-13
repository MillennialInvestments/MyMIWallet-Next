# MYMI-GTM-007 (part A): Restore PHPUnit suites and make them a blocking ratchet gate

## Status

PROPOSED: an owner-approved draft PR, written outside TBI AIOps governance. This is not task completion.

## Finding

Since 2026-04-20, CI's PHPUnit steps have run **zero tests**. Commit `0894a666a` deleted `phpunit.xml`, and `.gitignore` ignores both `phpunit.xml` and `phpunit.xml.dist`. With no config, `phpunit --testsuite unit` printed usage text, and `|| true` turned that into a green step.

## Change

- `phpunit.xml.dist`: restores the `unit` (tests/unit, tests/feature) and `auth-smoke` (tests/app/Auth) suites from the deleted file, and adds `failOnEmptyTestSuite`. `.gitignore` now ignores only a local `phpunit.xml`.
- `scripts/ci/phpunit_baseline_gate.py`: reads the JUnit report. It fails on any failing test that isn't in the baseline (exit 1), and on a missing report or an empty suite (exit 2). Known failures are reported as warnings; baseline tests that now pass are reported as notices.
- `tests/baseline/phpunit-known-failures.txt`: the 13 unit and 5 auth-smoke tests failing at restoration. The list only shrinks.
- `.github/workflows/ci.yml`: the two `|| true` PHPUnit steps are replaced by blocking gated steps. The other 6 report-only steps (filesystem lint, codex dry run, spark doctor, subs audit, copilot validate, doctor JSON) are unchanged and stay explicitly labelled. They are follow-up scope.

## Evidence (sandbox, PHP 8.3.6, PHPUnit 10.5.63, no DB)

- unit: 196 tests, 1036 assertions, 7 errors, 6 failures. auth-smoke: 9 tests, 1 error, 4 failures.
- Gate positive cases: unit and auth reports against the full baseline both exit 0.
- Gate negative cases: removing one baseline entry exits 1 with a NEW error. An empty report exits 2. A missing report exits 2.
- First CI run (PHP 8.2.35, run 43428529967): unit had 196 tests (12 failing), auth-smoke had 9 tests (5 failing), and the gate passed with new=0. `MarketingDistroTest::testVoiceoverServiceGeneratesValidMp3` failed only in the sandbox and passes on the CI runner, so it was removed from the baseline. The baseline now holds 17 entries, matching CI.

## Part B: baseline burn-down (owner request "Proceed to correction of any issues found", 2026-11-13)

All 17 baseline entries were traced and fixed; the baseline file is now empty, so any failing test fails CI. No test was skipped or weakened. Root causes:

Application bugs fixed:
- `app/Filters/NoCacheFilter.php`: `Cache-Control` was appended to the framework default, giving duplicated directives. Now replaced.
- `SystemPublicIpv4Resolver::isPublicIpv4()`: accepted multicast (224.0.0.0/4) and reserved (240.0.0.0/4) addresses as public. Both are now rejected (SSRF hardening for the market-feed transport).
- `MditIssuanceService::mintForDeposit()`: a retried mint threw "not confirmed" because the first mint had moved the deposit to MINTED. The idempotency lookup now runs before the status check, so a retry returns the existing ledger entry and never mints twice.
- `Config\Services`: `service('mymialerts')` was never defined, so `/API/Scanner/status` and `AlertsController` received null (TypeError). Added `myMIAlerts()`.
- Migration `2026-08-18-000001_HardenMarketingMarketFeedPersistence`: re-running `up()` failed on a stale field cache. Now idempotent.
- `Config\Database` (testing only): models (default group) and DatabaseTestTrait (tests group) opened two separate `:memory:` databases. Testing now uses one shared group.

Test bugs fixed:
- Auth smoke: login POSTs carried no CSRF token and no `bf_users` table existed; header and body assertions called methods that `TestResponse::__call` silently turns into `null`; the generic `(:segment)/register` route is intentionally disabled, so that test now asserts 404. Added a test that a login POST without a CSRF token is rejected.
- `getStatusCode()` / `getJSON(true)` on `TestResponse` returned null or a string (AiOps, system health, MDIT). Now read from `response()` and `json_decode`.
- `ExternalApiGuardTest` depended on `MYMI_DISABLE_EXTERNAL` from the environment; it now isolates it and adds a kill-switch test.
- Marketing distro tests created the same table with conflicting schemas; each now drops it first.
- MDIT and scanner tests: the full migration chain cannot run on SQLite (Myth/Auth and Shield both create `users`; some migrations use MySQL table options). New `Tests\Support\Database\AppliesAppMigrations` runs only the needed App migration with the literal `bf_` table names.

Local result (PHP 8.3.6): unit 199 tests, gate new=0 except `MarketingDistroTest::testVoiceoverServiceGeneratesValidMp3`, which fails only in the sandbox and passes on CI; auth-smoke 10/10.

Follow-ups found, not changed here (auth scope needs owner authority):
- `AiOpsAPIController::toggle()` and `run()` accept any logged-in user; no admin permission check was found. `status()` is guarded by `InternalEndpointGuardService`, which also allows any logged-in user.
- The full migration chain does not run on SQLite (duplicate `users` from Myth/Auth and Shield).

## Risks

- Auth smoke now passes against an SQLite fixture. It does not prove production login against MySQL; W1 (GTM-016/017) still needs a live smoke.
- With an empty baseline, any newly failing test blocks merges. That is intended.

## Rollback

Revert the PR. CI returns to report-only, zero-test behaviour.
