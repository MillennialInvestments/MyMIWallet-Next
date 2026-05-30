# Solana Exchange Phase 03 Launch Readiness Checklist

Date: 2026-05-30

## Backend safety

- [x] Default Solana network resolves explicitly and safely to `devnet` unless configured.
- [x] Mainnet minting has a hard guard requiring both environment opt-in and admin confirmation.
- [x] RPC health checks are cacheable and non-fatal.
- [x] RPC failure modes are normalized for API/command callers.
- [x] Wallet and mint address validators are reusable.
- [x] Transaction status lookup by signature is available.
- [x] Private keys are not returned by Solana wallet JSON responses patched in Phase 03.

## Draft project coins

- [x] TBI Solutions Project draft definition prepared.
- [x] TBI Coin draft definition prepared.
- [x] TBI Invest Coin draft definition prepared.
- [x] Drafts are idempotent via `coin_key`.
- [x] Drafts default to `devnet` / `draft` with no mint address.
- [x] Creator user ID defaults to `1`.

## Spark commands

- [x] `aiops:solana-healthcheck`
- [x] `aiops:solana-digest`
- [x] `aiops:solana-transaction-audit`
- [x] `exchange:create-tbi-project-coin-drafts --dry-run`
- [x] `exchange:create-tbi-project-coin-drafts --apply`

## Front-end UX

- [x] Shared `window.MyMISolanaState` object added.
- [x] CSRF-safe fetch helper added.
- [x] Wallet connect/disconnect/refresh helper added.
- [x] Submit locks for wallet, swap, mint, and order forms added.
- [x] Status UI supports checking, connected, disconnected, pending, submitted, confirming, confirmed, and failed states.
- [x] Polling pauses while the tab is hidden and refreshes every 20 seconds while visible.
- [x] DataTables/order panels refresh without a full page reload when AJAX-backed DataTables exist.

## Support workflow

- [x] Failed Solana support events write to logs and `writable/aiops/reports/solana/support-events-YYYYMMDD.jsonl`.
- [x] Optional webhook hook uses `SOLANA_SUPPORT_WEBHOOK_URL` without hardcoding secrets.
- [x] Notification events are available for RPC outage, mint failure, swap/trade failure, and failed transaction paths.

## Pre-launch blockers

- [ ] Run database migrations in staging and confirm the added draft metadata columns exist.
- [ ] Run `php spark exchange:create-tbi-project-coin-drafts --apply` against staging after migrations.
- [ ] Confirm production environment keeps `SOLANA_ALLOW_MAINNET_MINTING` unset/false for launch rehearsal.
- [ ] Confirm support webhook/email recipients are configured through environment values only.
- [ ] Complete browser QA with Phantom and Solflare extensions on devnet.

## AIOps follow-up

- [x] Follow-up queued at `docs/_aiops/tasks/solana-phase-03-staging-follow-up.md` for staging migrations, apply command, and browser QA.
