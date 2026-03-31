# Patch Plan

## PLAN-001
- Target file: app/Controllers/BaseController.php
- Why chosen: Investigate and repair runtime error.
- Methods to inspect: safeView, normalizeAppOverridesFolder
- Patch strategy: Add guard clauses, normalize inputs, and update CI4 APIs where needed.
- Regression risks: Potential behavior changes in request validation/rendering paths.
- Tests to run: php spark logs:errors, php spark aiops:all --logs-only, php spark aiops:repairs, php spark routes, php spark cache:clear

## PLAN-002
- Target file: app/Controllers/BaseController.php
- Why chosen: Investigate and repair runtime error.
- Methods to inspect: safeView, normalizeAppOverridesFolder
- Patch strategy: Add guard clauses, normalize inputs, and update CI4 APIs where needed.
- Regression risks: Potential behavior changes in request validation/rendering paths.
- Tests to run: php spark logs:errors, php spark aiops:all --logs-only, php spark aiops:repairs, php spark routes, php spark cache:clear

## PLAN-003
- Target file: app/Filters/CsrfDebugFilter.php
- Why chosen: Review token propagation, method handling, AJAX headers, and justified exclusions.
- Methods to inspect: before, logLoginCsrfDebug
- Patch strategy: Bridge known CSRF header variants and log route-level diagnostics for Budget account flows.
- Regression risks: Potential behavior changes in request validation/rendering paths.
- Tests to run: php spark logs:errors, php spark aiops:all --logs-only, php spark aiops:repairs, php spark routes, php spark cache:clear

## PLAN-004
- Target file: app/Controllers/BaseController.php
- Why chosen: Investigate and repair runtime error.
- Methods to inspect: safeView, normalizeAppOverridesFolder
- Patch strategy: Add guard clauses, normalize inputs, and update CI4 APIs where needed.
- Regression risks: Potential behavior changes in request validation/rendering paths.
- Tests to run: php spark logs:errors, php spark aiops:all --logs-only, php spark aiops:repairs, php spark routes, php spark cache:clear

## PLAN-005
- Target file: app/Controllers/BaseController.php
- Why chosen: Investigate and repair runtime error.
- Methods to inspect: safeView, normalizeAppOverridesFolder
- Patch strategy: Add guard clauses, normalize inputs, and update CI4 APIs where needed.
- Regression risks: Potential behavior changes in request validation/rendering paths.
- Tests to run: php spark logs:errors, php spark aiops:all --logs-only, php spark aiops:repairs, php spark routes, php spark cache:clear

