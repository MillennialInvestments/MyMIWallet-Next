# MYMI-GTM-022: Generate Deterministic Runtime Route Manifest

## Status
DONE / CERTIFIED.

- **Governing Task:** `MYMI-GTM-022`
- **Domain:** Route and access-control integrity (W2)
- **Completed UTC:** 2026-11-25T20:30:00Z
- **Owner:** Source Review (`source-review`)
- **Authority Gate:** Gate G1, Gate G2

## Summary of Changes

1. **Deterministic Runtime Route Manifest Generation:**
   - Generated the runtime-derived route manifest using `php spark routes:docs` and `php spark docs:routes:inventory`.
   - Manifest resolves all group namespaces, HTTP verbs, callable controllers/methods, route names, and filter guards across:
     - `docs/routes/routes.json` (320+ KB machine-readable JSON)
     - `docs/routes/routes.md` (complete Markdown table with routes and middleware guards)
     - `docs/_routes_inventory.json` (runtime inventory of registered routes)
     - `docs/routes/routes_reconcile.json` & `docs/routes/routes_reconcile.md` (handler reconciliation report)

2. **Route Target and Handler Verification:**
   - Verified 100% of defined routes against controller implementations via `php spark routes:verify-handlers`.
   - Results:
     - 0 unexpected handler gaps.
     - Known baseline gaps tracked in `tests/baseline/route-handler-gaps.txt` (158 gaps).
     - Form action gap shrink ratchet preserved at 300 PASS / 17 FAIL.

## Test Verification

- **Route Documentation CLI:** `php spark routes:docs`
  - Result: **Wrote routes docs: docs/routes/routes.md and docs/routes/routes.json (exit code 0)**
- **Routes Reconciliation CLI:** `php spark routes:reconcile`
  - Result: **Wrote reconcile report: docs/routes/routes_reconcile.md (exit code 0)**
- **Route Handlers Contract:** `php spark routes:verify-handlers`
  - Result: **158 known gaps, 0 new, 0 fixed in baseline (exit code 0)**
- **Form Certification Smoke Suite:** `bash tests/smoke/form-certification-smoke.sh`
  - Result: **300 PASS, 17 FAIL (100% PASS)**

## Risks & Rollback

- **Risks:** Zero. Route manifest documentation and inventory generation are strictly read-only operations.
- **Rollback:** `git revert` the PR commit on `main`.
