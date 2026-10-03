# MyMI Wallet Revenue/GTM project
Goal: find the strongest EXISTING MyMI feature that can become a paid subscription with the least remaining work, then drive it to SANDBOX_REVENUE_READY. Current candidate: Trade Alerts (`alerts.trade_alerts`); see docs/_aiops/gtm/revenue-mvp/README.md.

## Facts
- Repo MillennialInvestments/MyMIWallet-Next (CodeIgniter 4 / PHP). Canonical clone /apps/TBI/repos/mymiwallet-next. Production /apps/TBI/www/mymiwallet/current is NEVER a workspace.
- TBI AIOps is the sole governed mutation and closeout authority. Source-controlled AIOps state outranks this file, memory, old SHAs, stale branches and PRs.

## Invariants
- Never implement from main or production. Mutate source only inside an exact AIOps-authorized worktree.
- Before any mutation verify: worktree, branch, status, objective, recipe, scope, allowlist, rollback, `ai check`, `ai next`.
- Do not hand-edit AIOps state JSON. Do not manually commit/merge when `ai finish` owns closeout.
- Forbidden: git reset --hard, git clean, git stash, force push, history rewrite, rm -rf, production overwrite (hooks enforce this).
- Same-scope failure: detect, diagnose, fix, validate, preserve evidence, continue. Out of scope becomes a successor.
- Evidence goes under /tmp/mymi-revenue-mvp/evidence/<run>/. Readiness states: NOT_READY, IMPLEMENTATION_READY, SANDBOX_REVENUE_READY, PRODUCTION_REVENUE_READY. Never skip one; HTTP 200 alone proves nothing.

## Context discipline
Prefer rg/find/git/php spark routes/test output. Budget: 6 files, 48 KiB source, 400 log lines, 3 candidates. Never read vendor/, node_modules/, DB dumps, full logs, whole route files.
Workflows live in skills: /revenue-mvp (master), /revenue-discover, /revenue-slice, /revenue-test, /revenue-handoff, /revenue-certify. Use agents (read-only) for discovery, audit, security and claims review.

## Session start
Report only: PROJECT, REPO, WORKTREE, BRANCH, HEAD, ORIGIN_MAIN, AIOPS_STATE, REVENUE_MVP, CURRENT_SLICE, NEXT_SAFE_ACTION, HUMAN_ACTION_REQUIRED. No broad audit.

## Human approval mandatory
APPROVE tokens, provider credentials, payment-provider account, pricing/owner decisions, DB mutation, legal/compliance, production/deployment, irreconcilable scope or control-plane conflict.
