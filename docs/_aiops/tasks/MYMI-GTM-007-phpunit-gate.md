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

## Risks

- 5 of 9 auth-smoke tests fail: login with valid and invalid credentials, the no-cache login headers, and two registration fallbacks. This is real W1 risk (GTM-016/017), and the baseline only makes it visible.
- 18 baseline entries need owning successor tasks before release certification.

## Rollback

Revert the PR. CI returns to report-only, zero-test behaviour.
