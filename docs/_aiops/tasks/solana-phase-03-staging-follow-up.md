# AIOps Handoff: Solana Phase 03 Staging Follow-up

Created: 2026-05-30
Repository key: `mymiwallet`

## Context

Codex implemented Solana Exchange Phase 03 code and docs. Local validation was limited because MySQL refused connections in the workspace and browser wallet QA cannot be performed from CLI.

## Follow-up tasks

1. Run migrations in staging and confirm `bf_tbi_project_coins` has `network`, `decimals`, `initial_supply`, `metadata_uri`, and `created_by`.
2. Run `php spark exchange:create-tbi-project-coin-drafts --apply` in staging.
3. Confirm the three draft rows exist and remain `devnet` / `draft` with no mint address:
   - `tbi_solutions_project`
   - `tbi_coin`
   - `tbi_invest_coin`
4. Perform browser QA with Phantom and Solflare on devnet for wallet connect/disconnect/refresh, swap form locks, token draft/mint guard messaging, orders refresh, and tab-visibility polling.
5. Confirm support recipients/webhooks are configured through environment variables only and `SOLANA_ALLOW_MAINNET_MINTING` remains unset or false.

## Safety requirements

- Do not enable mainnet minting.
- Do not hardcode secrets.
- Do not log or return private keys.
- Do not deploy or auto-merge.
