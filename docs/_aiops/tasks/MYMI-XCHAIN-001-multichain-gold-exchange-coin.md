---
task_id: MYMI-XCHAIN-001
repo_key: mymiwallet
repo_name: MillennialInvestments/mymiwallet-next
source_agent: Claude
target_agent: Antigravity
source_branch: claude/project-thread-whu2g4
source_pr: null
base_branch: main
risk_level: high
priority: P1
status: queued
model_preference: TBI Ollama
requires_human_approval: true
---

# Title

Multi-chain payments, MyMI Gold, MyMI Exchange and MyMI Coin on staging

# Objective

Build every wave of `docs/roadmaps/MYMI-XCHAIN-001-roadmap.md` on staging in
one continuous Antigravity run, with each wave in its own draft PR and an
integration branch deployed to staging.mymiwallet.com. Production stays
untouched until each feature's owner gates pass.

# Background

On 2026-11-25 the owner asked for the full multi-chain stack (crypto checkout
on all chains, MyMI Gold as in-app credit, MyMI Exchange, MyMI Coin) built on
staging now and promoted to production step by step. The design and US
regulatory reasoning are in the Claude Doc
https://claude.ai/artifact/FEJDwE1gHDDLawwg9eHWNK.

# Current State

- Crypto checkout for ETH/Base USDC, XRP and BTC is merged (#766, #767). Staging
  passed end to end for XRP and Ethereum; Bitcoin was paid and is waiting on
  testnet4 blocks; Base is waiting on test gas.
- Solana Pay USDC is merged (#758).
- Money switches in `app/Config/Features.php` are all off in production.
- MDIT already implements a Reg D 506(c) accredited-only token workflow in sandbox.

# What Needs To Change

Waves W0 to W11 exactly as listed in the roadmap, executed under
`docs/roadmaps/MYMI-XCHAIN-001-antigravity-brief.md`.

# Files To Inspect

- `AGENTS.md`
- `docs/roadmaps/MYMI-XCHAIN-001-roadmap.md`
- `docs/roadmaps/MYMI-XCHAIN-001-antigravity-brief.md`
- `app/Libraries/CryptoPay/`
- `app/Config/Features.php`
- `app/Services/MDIT/`
- `app/Modules/Exchange/`
- `tools/testnet-wallets/wallets.mjs`

# Files To Avoid

- Production paths under `/apps/TBI/www/mymiwallet/`
- Any `.env` file with real values
- `tests/baseline/form-action-gaps.txt` (shrink-only)
- `app/Database/Migrations/2026-10-26-180000_ShieldIdentityBackfill.php`

# Commands To Run

```bash
php -l <each changed PHP file>
vendor/bin/phpunit tests/unit/CryptoPay
vendor/bin/phpunit <focused tests for the wave>
git diff --check
bash tests/smoke/form-certification-smoke.sh
php spark routes
```

# Acceptance Criteria

- Every wave has a draft PR, or a BLOCKED row in `docs/_aiops/runs/MYMI-XCHAIN-001/progress.md` with its reason.
- `integration/mymi-xchain-001` passes the full PHPUnit suite and the form-certification smoke.
- The owner's staging packet exists and contains no placeholders.
- Every new money feature's flag defaults to false in `app/Config/Features.php`.
- No secrets, no production changes, no merges by the agent.

# Risks

- Money features misconfigured on staging could confuse testers; mitigated by testnet-only settings and flags.
- Legal: MyMI Gold, the exchange and MyMI Coin need counsel sign-off before production (gate G8).
- Large surface area: waves are kept in separate PRs so each can be reviewed and reverted alone.

# Rollback Notes

Each wave is an additive draft PR; close it or revert its merge commit. Staging
rolls back by redeploying `main` with `sudo bash scripts/ops/staging/mymi-staging.sh deploy main`.
New tables are created by named migrations only and are not dropped automatically.

# Final Report Requirements

`docs/_aiops/runs/MYMI-XCHAIN-001/final-report.md` listing each wave's result,
PR link, tests run with counts, open errors, open owner gates, the staging
packet path, rollback notes and the next owner action.
