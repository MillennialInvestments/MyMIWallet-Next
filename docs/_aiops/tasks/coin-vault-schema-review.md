# AIOps Handoff: Coin Vault Schema Review

## Status

Queued because `php spark db:table-list --save=1` could not connect to MySQL in the Codex environment.

## Requested follow-up

1. Run `php spark db:table-list --save=1` on a MyMI Wallet environment with database access.
2. Review `writable/reports/db-table-list-latest.md`.
3. Confirm whether existing tables can satisfy any Coin Vault registry, wallet, ledger, contribution, payout, or external log requirements.
4. If not, create a guarded CI4 migration for the recommended `bf_coin_vault_*` tables in `docs/coin-vault/database-inventory-review.md`.
5. Confirm Solana mint/transfer production methods and key custody path before enabling on-chain release automation.

## Runtime behavior impact

The current patch is additive. It registers routes and commands, but the Coin Vault API returns a table-missing response until schema is approved and migrated.
