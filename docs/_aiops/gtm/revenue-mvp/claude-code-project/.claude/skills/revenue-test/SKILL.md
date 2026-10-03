---
name: revenue-test
description: "Run targeted and regression validation for the current Revenue MVP slice and judge evidence via the revenue-validator agent. Use after each slice change and before closeout."
allowed-tools: Read, Grep, Glob, Bash(bash docs/_aiops/gtm/revenue-mvp/scripts/04-revenue-test.sh:*), Bash(vendor/bin/phpunit:*), Bash(git diff:*), Bash(git status:*)
---
# /revenue-test
1. Run scripts/04-revenue-test.sh with TARGETED_TESTS and REGRESSION_TESTS from the slice record. Capture rc; never swallow failures.
2. Required behavioral proof for the MVP: authorized paid user allowed; free user denied; missing data; stale data; provider failure; invalid input; inactive subscription; canceled subscription; failed-payment state where supported; no secrets in output.
3. Run `git diff --check`. Pass the evidence to the `revenue-validator` agent for PASS/FAIL/BLOCKED.
4. On FAIL: diagnose within slice scope, fix, rerun targeted then regression. On BLOCKED (missing sandbox, keys, DB): record the exact blocker.
