# MYMI-XCHAIN-001 — Antigravity run brief

You are Antigravity, the frontend and backend implementation engineer for
MyMI Wallet. Execute `docs/roadmaps/MYMI-XCHAIN-001-roadmap.md` from W0 to
W11 in one continuous run. Do not stop to ask for review between waves. Track
every problem in the error ledger and keep going. Stop only at the end of W11
or at a hard stop listed below.

## 1. Read first

1. `AGENTS.md` (repository rules and the 2026-11 lessons).
2. `docs/roadmaps/MYMI-XCHAIN-001-roadmap.md` (the waves and acceptance criteria).
3. `docs/crypto-pay/README.md`, `docs/mdit/phase1_implementation_notes.md`,
   `docs/_aiops/tasks/MYMI-GTM-HUMAN-GATES.md`, `app/Config/Features.php`.
4. `docs/_aiops/task-schema.md` for any task file you write.

Current repository source wins over this brief if they disagree. Record the
disagreement in `errors.md` and follow the source.

## 2. Tools

- **TBI AIOps MCP** (client key `antigravity-tim`): `health`, `git_status`,
  `git_diff_check`, `php_lint`, `phpunit`, `ai_check`, `ai_next`,
  `fleet_complete`, `fleet_summarize_file`, `chatroom_board`, `chatroom_checkin`.
  Use `fleet_summarize_file` for first reads of large files and `fleet_complete`
  for first-pass reviews of each wave's diff. Fleet output is advisory: verify
  every claim against the code.
- **MyMI Platform MCP** and **Trading MCP** (`scripts/mcp/`): read-only state.
- **GitHub**: push feature branches and open draft PRs in
  `MillennialInvestments/mymiwallet-next`. Never merge.
- Local checks: `php -l`, `vendor/bin/phpunit <focused path>`,
  `git diff --check`, `bash tests/smoke/form-certification-smoke.sh`,
  `php spark routes` when routes change.

Before W0, check in on the AIOps chatroom (`chatroom_checkin`, agent
`antigravity`, branch `integration/mymi-xchain-001`). Check in again after
each wave.

## 3. Hard boundaries (never, even if a step seems to need it)

- No production change: no deploy, no `/apps/TBI/www/mymiwallet/current`
  edits, no production `.env`, no production migrations.
- No mainnet funds or keys. Staging uses testnet, devnet and sandboxes only.
- No merge to `main`, no force push, no history rewrite, no `git reset --hard`,
  no `git clean`, no `|| exit 1`.
- No secrets in git: keys, tokens, seeds and passwords live only in `.env`.
  Document variable names, never values.
- No new Composer or npm dependency. If a wave truly needs one, log it in
  `gates.md` as "package approval" and build the rest of the wave without it.
- Every new money feature is behind a flag that defaults to `false` in
  `app/Config/Features.php`. Turn flags on only through staging `.env` lines
  in the W9 packet.
- MyMI Gold: no transfer, withdraw or cash-out endpoint of any kind.
- MyMI Coin: no public purchase path; accredited-only via MDIT; never listed
  on the exchange.
- No real customer data, no real KYC submissions.
- Identity always from the session (`$this->cuID` / `auth()->id()`).
- spark commands extend `App\Commands\SafeBaseCommand`; no unbounded
  `findAll()` or `->get()->getResultArray()` in changed files; migrations
  check columns with `getFieldData()`; routes are case-exact with absolute paths.
- Never add lines to `tests/baseline/form-action-gaps.txt`.

## 4. Per-wave loop

For each wave in the run order (W0, W1, W8, W4, W2, W3, W5, W6, W7, W9, W10, W11):

1. **Branch.** `git fetch origin main`, then create
   `feature/mymi-xchain-001-w<N>-<slug>` from `origin/main`. If the wave
   depends on an unmerged wave, branch from that wave's branch instead and
   say so in the PR body.
2. **Build.** Implement the wave's Golden Tasks. Keep the diff inside the
   wave's scope.
3. **Validate.** `php -l` on every changed PHP file, focused PHPUnit for the
   wave, the CryptoPay suite (`vendor/bin/phpunit tests/unit/CryptoPay`),
   `git diff --check`, form-certification smoke when views or routes change.
   PHPUnit exit 1 with only the "No code coverage driver" warning and zero
   failures counts as PASS.
4. **Review.** Send the diff to `fleet_complete` for a first-pass review.
   Fix verified findings. Record rejected ones with a reason in `progress.md`.
5. **Ship.** Commit exact paths only (no `git add .`), push, open a **draft** PR
   titled `MYMI-XCHAIN-001 W<N>: <title>` with sections: Summary, Tests and
   checks run (with counts), Known risks, Rollback notes, AIOps follow-up.
6. **Record.** Append the wave result to `progress.md`
   (wave, branch, PR, tests, SEMANTIC_RESULT) and check in on the chatroom.
7. **Continue** to the next wave immediately.

## 5. When something fails

Classify every failure: `CORRECTABLE_LOCAL`, `RETRYABLE_TRANSIENT`,
`BLOCKED_SAFETY`, `EXPECTED_GATE` or `FAILED`.

- `CORRECTABLE_LOCAL`: fix it in the same branch, at most **3 attempts**, then
  treat it as `FAILED`.
- `RETRYABLE_TRANSIENT`: retry up to 2 times with a pause.
- `EXPECTED_GATE` (needs the owner, counsel, a partner, a key or a package):
  add a row to `gates.md`, build everything around it, continue.
- `BLOCKED_SAFETY` or `FAILED`: add a row to `errors.md` with the exact
  command, output excerpt (no secrets), suspected cause and next step. Mark the
  task BLOCKED in `progress.md`. Continue with the next task or wave that
  does not depend on it.

`errors.md` columns: `#`, time (UTC), wave/task, class, command, symptom,
suspected cause, resolution status. At W11, go back through every open row:
fix what is now fixable, re-run its validation, and update the row.

Minimize change: prefer extending existing services (`CryptoPayService`,
`Fulfillers`, MDIT services, Exchange module views) over new parallel ones.
Never rewrite working code to make a new feature fit; add an adapter instead.

## 6. Hard stops (end the run, write the final report)

- gq-ai01 storage guard trips, the disk goes read-only, or MCP `health` reports
  storage failure.
- Any sign that a step would touch production or real funds.
- A secret is found staged for commit (unstage it, record it, stop).

## 7. End of run (W9 to W11)

- W9: build `integration/mymi-xchain-001` by merging every wave branch, run the
  full validation there, push it, and write the owner's staging packet
  (`scripts/ops/staging/mymi-xchain-staging.md`): **one** copy-paste block
  that deploys the integration ref to staging with the named `MIGRATE=` list,
  appends staging-only `.env` lines, and adds crons. No placeholders: the
  owner pastes it literally.
- W10: production packets, prepared only.
- W11: `final-report.md` with: waves PASS/BLOCKED, PR links, test counts,
  open errors, open gates, the staging packet path, and the next owner action.
  Then open one docs PR proposing `AGENTS.md` lessons learned in this run.
