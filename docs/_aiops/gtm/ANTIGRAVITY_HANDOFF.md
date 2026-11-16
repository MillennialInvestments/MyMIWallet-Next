# MyMI GTM roadmap: handoff to Antigravity

Written 2026-11-16 by Claude (MyMI GTM thread) at Tim's request, so Antigravity
can carry the remaining GTM work. Read this file, `AGENTS.md`, and
`docs/_aiops/gtm/HUMAN_GATE_REGISTER.md` before starting.

## 1. Where things stand (verified, 2026-11-16 12:53Z)

- **Production:** release `20261116T124907Z-gtm-da4bf7f6` (main `da4bf7f`).
  - Rollback target: `20261116T120828Z-gtm-b7fabfd6`.
- **Staging:** <https://staging.mymiwallet.com> runs the same commit. The last form test there gave 27/27 live submits PASS.
- **Launch scope:** Tim chose **Everything** on 2026-11-16. Every domain in the launch-scope table of `HUMAN_GATE_REGISTER.md` must be certified. Nothing can be hidden behind a flag instead of being certified.
- **Money switches** in `app/Config/Features.php` are all OFF and stay OFF (gate G14). They go on in prod only after Tim approves that one switch by name.
  - `FEATURE_WALLETS`, `FEATURE_PREDICTIONS`
  - `FEATURE_SOLANA_TRADING`, `FEATURE_AUCTIONS`, `FEATURE_PROJECT_INVESTING`
  - `FEATURE_MYMIGOLD_PURCHASES`, `FEATURE_MEMBERSHIP_PURCHASES`
- **Done in the last stretch (#709-#721):**
  - mutation guard matrix, API auth matrix
  - CSP nonces on inline scripts, sidebar fixes
  - form certification: 0 live form FAILs
  - staging environment
  - plaintext crypto keys encrypted
  - GTM-032 ledger: unique index on `bf_users_wallet_transactions.transaction_id` is live
  - GTM-037 budget owner checks

## 2. Rules (non-negotiable)

1. **Evidence or it did not happen.** Report a task as done only when you can give:
   - a merged PR number and commit SHA,
   - the test files that prove it,
   - the CI run.

   Earlier "fixed" claims that were never committed have cost time. If it is not on `main`, it is not done.
2. **No merging and no deploying.** Open the PR and stop. Tim merges, and Tim runs every server command himself.
3. **Never on production:**
   - no file edits
   - no plain `php spark migrate`. `ShieldIdentityBackfill` (2026-10-26-180000) stays unapplied on purpose.
   - Migrations run only by name: `MIGRATE='<name>' bash ~/mymi-release.sh activate <exact release>`. Always give the exact release name, never a placeholder.
4. **No secrets anywhere.** The repo is PUBLIC. Never commit, print, or paste keys, tokens, `.env` values (including `chat/.env`), DB dumps, user emails, or PII. Name env keys only.
5. **Money switches stay OFF.** Never flip one, and never add a code path that moves money without a switch that defaults OFF.
6. **Ratchets only shrink.** Never add lines to these baselines to get CI green:
   - `tests/baseline/*.txt`: route-handler gaps, form-action gaps, guard matrix, API auth matrix, known failures.
7. **IDOR rule:** every mutation scopes by the session user (`$this->cuID`). Never take a user id from the request. Prove it with a test where a non-owner is refused and nothing changes.
8. **No destructive git:**
   - no force push, `reset --hard`, `clean`, stash, or history rewrite
   - no deleting worktrees under `/apps/TBI/worktrees`
9. **One domain per PR.** Use the PR body headings: Summary, Tests / Checks Run, Risks, Rollback Notes, AIOps Follow-Up Status, Deployment Notes. Deployment Notes always say "Do not deploy without Teddy's approval".

## 3. Known traps

- **CI `model-limit-audit`** fails any PR that touches a file containing pre-existing unbounded `get()` / `findAll()`, even a commented-out one (e.g. `app/Models/BudgetModel.php`). Either put new logic in a service, or add limits to every flagged line in that file.
- **`tableExists()` caching:** tests that call it must call `db->resetDataCache()` in setUp/tearDown, or `MarketingDistroTest` breaks later.
- **Known failure:** `MarketingDistroTest::testVoiceoverServiceGeneratesValidMp3` fails in sandboxes and on main. Ignore it.
- **Route casing:** CI4 routes are case-sensitive. Form and JS URLs must use a leading `/` or `site_url()`.
- **Login noise:** every login on staging logs a "Myth/Auth attempt failed ... compatibility login" warning. This is known noise; login uses `bf_users.password_hash` directly.
- **Release order:** `activate` refuses a commit that staging is not running. The order is always staging deploy, then form test, then activate.

## 4. The per-domain loop

For each task below, in order:

1. Read the domain's row in the launch-scope table and the task's acceptance text in `docs/_aiops/gtm/tasks.csv`.
2. Find the routes for the domain (`php spark routes | grep -i <area>`), and their controllers, services and models.
3. Audit each mutation:
   - owner scope, filter (`login` / `permission:` / `feature:`), CSRF and HTTP method
   - input validation, idempotency for money, error paths
4. Fix what you find. Add tests under `tests/unit/<Domain>/`:
   - positive (owner succeeds)
   - negative (bad input)
   - authorization (non-owner or guest is refused, and nothing changes)
   - failure (provider down or bad signature returns a safe error)
5. Run `vendor/bin/phpunit`. The only allowed failure is the known one above.
6. Open the PR on its own branch. Update the task row in `tasks.csv`: Status `in_review`, Evidence_Link pointing to the PR.
7. Give Tim one paste-able deploy block. He works from an iPad terminal, so batch everything into a single block:

   ```
   bash ~/mymi-release.sh build main && sudo bash ~/mymi-staging.sh deploy <full main sha> && sudo bash ~/mymi-staging.sh form-test && MIGRATE='<names or empty>' bash ~/mymi-release.sh activate <exact release name printed by build>
   ```

8. After it is live, write an evidence file at `docs/_aiops/gtm/evidence/MYMI-GTM-0NN_<SHORT>.md` with:
   - PR and SHA
   - release name
   - tests
   - staging form-test result
   - risks and rollback

   Then set Status to `certified`.

## 5. Roadmap (in order)

### W3 core journeys

| Task | Domain | What to do | Gate |
| --- | --- | --- | --- |
| 032 | Wallet ledger | **Done** (index live). Write the evidence file only. | none |
| 033 | Wallet CRUD | Owner-only create/edit/delete tests. `WalletModel::deleteWallet` has no `user_id` scope; controllers use `deleteWalletCascade($id, $userId)`. Scope it or remove the unused path, with a test. | none |
| 034 | Transactions and imports | Import parser tests, duplicate-import guard. Trade import UI is still to build. | none |
| 035 | Payments and webhooks | Idempotency test for every webhook (PayPal claims in `bf_payment_claims`), reconciliation report. | G9 PayPal sandbox |
| 036 | Dashboard and onboarding | Journey test on staging. | G3 |
| 037 | Budget, debt, credit | Owner checks are **done** (#721). Add CRUD and math tests, then write the evidence file. | none |
| 038 | Plaid | Link, exchange, refresh and webhook tests against the sandbox. | G9 Plaid |
| 039-040 | Investments, strategies, goals | Fix the strategy and goal route handlers (024), watchlist tests. | none |
| 041 | Market data and news | Freshness checks. | data keys |
| 042 | Alerts | Create, evaluate, deliver and history tests. | Discord webhooks on staging |
| 043 | Referrals and memberships | Entitlement tests. | G9 PayPal, G14 |
| 044 | Support and notifications | Ticket and email tests. | G12 |
| 045 | Privacy export and erase | Export and erase tests. | G8 |

### W4 extended domains

| Task | Domain | What to do | Gate |
| --- | --- | --- | --- |
| 046 | Exchange | Order book and balance reconciliation are still to build. The old CI3 views were removed in #713. | G9, G14 |
| 047 | Solana | Dry-run tests on devnet. Mainnet flags stay off. | G9, G6, G14 |
| 048 | Bitcoin and DigiByte | Testnet address and balance tests. Add a switch before any send path. | G9, G6 |
| 049 | Projects and CoinVault | Contribution HMAC and payout approval tests. | partner keys, G14 |
| 050 | Predictions | Presentation and disclaimer tests. | G8 |
| 051 | Tax | Calculation tests and disclaimers. | G8 |
| 052 | PropFirms | Route and view certification. | none |
| 053 | MDIT | On-ramp webhook signature tests. Add a money switch. | G9 |
| 054 | Community, chat, advisor, search, eSports | Moderation and privacy tests. eSports keeps `ESPORTS_DRY_RUN` on. | G8 |

### Then

- 065/066: contract tests for the mobile app and SDK API.
- Agent queue, from the register:
  - 027/028: move in-controller checks onto route filters
  - 022-026: shrink `route-handler-gaps.txt`
  - 030: finish nonces so CSP can leave report-only mode
  - 029: RBAC test for every admin and Management route
  - 061-063: risk-based coverage, cron inventory, SLO signals
- 068-070: certify the release candidate on staging, approve deployment and prove rollback, reconcile production.

## 6. Open human gates (only Tim or Teddy can close these)

Do not try to work around these. List them in your report instead.

| Gate | What is needed |
| --- | --- |
| G3 | Browser sign-up and reset check |
| G4 | Teddy approves ADR 0002 |
| G6 | Notify the 3 users whose keys were encrypted |
| G7 | Duplicate-email groups |
| G8 | Legal sign-off |
| G9 | Sandbox keys in the staging env file |
| G11 | Restore drill |
| G12 | Postmark approval; DMARC moves to `p=quarantine` on 2026-12-05 |
| G13 | Load test window |
| G14 | Approve each money switch by name |

## 7. Reporting back to Tim

End every work session with these five lines:

```
Merged/ready: PR #___ (SHA ___) — task(s) ___
Tests: ___ passed, ___ failed (list any failure that is not the known voiceover one)
Deploy block: <one paste-able block, or "nothing to deploy">
Needs Tim: <gate ids or "nothing">
Next: <task id>
```
