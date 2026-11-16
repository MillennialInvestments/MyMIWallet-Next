# MYMI-GT-FORM-HARNESS-001 (F2): safe form-test harness + F1 inventory + route-gap ratchet

## Status

IMPLEMENTED_NOT_CERTIFIED: draft PR written by Claude outside a native TBI AIOps worktree (the AIOps MCP has `mutation_enabled: false`). Not a completion attestation.

Parent: #646 (form-certification subwaves F0–F8, comments 6896287405 / 6896501903 / 6897085098). Related GTM tasks: MYMI-GTM-022 (route handlers), MYMI-GTM-024 (mutation guards).

## Reconciliation of the Antigravity report (2026-11-15)

- Its harness and auth-test edits were never committed: not on `origin/main@bbabb22`, not in any open PR, and `/apps/TBI/repos/mymiwallet-next` is clean on `main@14b9ab5` (checked through the AIOps MCP `git_status`). This task rebuilds the harness from scratch.
- Its F3 auth "fixes" (CSRF tokens, in-memory `bf_users`, `response()->getHeaderLine`, register route) duplicate MYMI-GTM-007 part B, already merged (#675). `auth-smoke` passes 15/15 on main; no auth change is needed here.

## Defects fixed

| # | Defect on main | Fix |
|---|---|---|
| 1 | Single-form mode always sent a real HTTP request and wrote a DB row | Default is a read-only inventory. `FormTestExecutor::execute()` refuses (status BLOCKED, no DB, no network) unless given an allowed `FormSubmissionPolicy` decision. `plan()` previews the payload. |
| 2 | Only `forms[0]` was analysed | Every `<form>` plus JS requests (`fetch`, `$.ajax`, `$.post`, `$.get`, `axios.*`) is inventoried with a stable key `F-<sha1>`. |
| 3 | Dry-run wrote markdown into `docs/_aiops/form-tests`; patch jobs went to `docs/_aiops/patch_jobs` | Reports go to `WRITEPATH/aiops/form-tests` or `AIOPS_FORM_REPORT_DIR`; any directory inside the source tree (other than WRITEPATH) is refused. |
| 4 | Route mapping used substring matching (matched almost anything) and ignored the HTTP verb | `FormRouteMatcher` uses the CI4 router's anchored, case-sensitive regex per verb and reports `verb_mismatch`, `case_mismatch`, `no_route`. |
| 5 | PHP helpers were invisible: `form_open()` forms were not found at all; `site_url()` actions were lost | Raw view source is resolved (`form_open[_multipart]`, `form_close`, `csrf_field`, `site_url`, `base_url`, `url_to`) with line numbers preserved. Other PHP becomes a `{php}` marker, so the action is BLOCKED, never guessed. |
| 6 | Seeder and full-table `COUNT(*)` ran during "dry-run" audits | Seeders run only on an approved live run; row counts only with `--with-db-counts`. |
| 7 | Payloads used `@example.com` | Synthetic identities use the reserved `.test` TLD. |

Live submission needs all of: `--submit --allow-destructive --approve`, `ENVIRONMENT` not `production`, a target host listed in `AIOPS_FORM_TEST_ALLOWED_HOSTS` (empty by default), and a host that is not `mymiwallet.com`/`www.mymiwallet.com`.

## Status vocabulary (per inventory entry)

- PASS: action + method resolve to a defined route (route contract only, not business behaviour).
- FAIL: `no_route`, `verb_mismatch` or `case_mismatch` (CI4 routing would 404/405).
- BLOCKED: `blank_action`, `dynamic_action`, `dynamic_action_no_static_match`, `named_route_unresolved`, `script_action`, `dynamic_method`; needs runtime/browser evidence.
- SKIPPED: `legacy_file`, `external_action`, `static_asset_request`.

## Also in this change

- `tests/baseline/form-action-gaps.txt` + `FormActionGapRatchetTest`: every current FAIL is listed; a new broken form action fails CI and a fixed one must be removed.
- `phpunit.xml.dist`: `tests/app/Security` (the #709 mutation guard matrix) was in no suite, so CI never ran it. It now runs in `unit`.

## Validation

```
vendor/bin/phpunit tests/unit/AIOps            # 22 tests, 105 assertions, OK
vendor/bin/phpunit --testsuite unit            # 296 tests; 1 failure = MarketingDistroTest voiceover (sandbox-only, passes on CI per GTM-007)
vendor/bin/phpunit --testsuite auth-smoke      # 15 tests, OK
php spark aiops:form:test --scan-all --json --no-report   # rc 0, forms_submitted 0, git status unchanged
php spark ops:commands:lint                    # rc 0
git diff --check                               # clean
```

## Rollback

Revert the PR. No schema, data, route or runtime config change.

## Next tasks (dependency-ready after merge)

- MYMI-GT-FORM-ROUTES-001: shrink `form-action-gaps.txt`, starting with the wallet/budget views (F4) that still post to removed `/User/Wallets/*` routes.
- MYMI-GT-FORM-LEDGER-001 (F4): deposit/withdraw/transfer atomicity, balance conservation and IDOR tests.
