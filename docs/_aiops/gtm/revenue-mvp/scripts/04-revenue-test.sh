#!/usr/bin/env bash
# Targeted + regression tests. TARGETED_TESTS / REGRESSION_TESTS are space-separated phpunit paths.
SELF="$(cd "$(dirname "$0")" && pwd)"
. "$SELF/lib.sh"
verify_worktree; rc=$?
if [ "$rc" -ne 0 ]; then exit "$rc"; fi
PHPUNIT="${PHPUNIT:-vendor/bin/phpunit}"
if [ ! -x "$PHPUNIT" ]; then say "BLOCKED phpunit missing at $PHPUNIT"; exit 2; fi
TARGETED_TESTS="${TARGETED_TESTS:-tests/feature/AlertsRoutesTest.php tests/feature/PublicRoutesAccessibleTest.php}"
REGRESSION_TESTS="${REGRESSION_TESTS:-tests/unit/RouteAndViewGuardrailsTest.php}"
fail=0
for t in $TARGETED_TESTS; do
  if [ ! -f "$t" ]; then say "BLOCKED test file missing $t"; fail=2; continue; fi
  run_cap "target-$(basename "$t" .php)" "$PHPUNIT" "$t"; r=$?
  if [ "$r" -ne 0 ] && [ "$fail" -eq 0 ]; then fail=1; fi
done
if [ "$fail" -eq 1 ]; then say "FAIL targeted tests (skipping regression)"; snapshot_git test; exit 1; fi
for t in $REGRESSION_TESTS; do
  if [ ! -f "$t" ]; then say "BLOCKED test file missing $t"; fail=2; continue; fi
  run_cap "regr-$(basename "$t" .php)" "$PHPUNIT" "$t"; r=$?
  if [ "$r" -ne 0 ]; then fail=1; fi
done
snapshot_git test
if [ "$(cat "$EVDIR/git-diff-check.test.rc")" != "0" ]; then say "FAIL git diff --check"; exit 1; fi
if [ "$fail" -eq 0 ]; then say "PASS tests"; exit 0; fi
if [ "$fail" -eq 2 ]; then exit 2; fi
exit 1
