# MyMI Solana Exchange Phase 02 Implementation Plan

Use this report as source context:

docs/_aiops/reports/solana-phase-02/phase-02-readiness-20260530-055719.txt

## Goal

Complete production-readiness work for MyMI Solana Exchange, TBI Solutions Project, TBI Coin, and TBI Invest Coin.

## Required Outcomes

1. Confirm SolanaService and MyMISolana provide reliable RPC health, wallet balance, token lookup, and transaction status methods.
2. Confirm SolanaController endpoints return consistent JSON for wallet connect, disconnect, refresh, frontend data, swap, token updates, and asset viewing.
3. Confirm TbiProjectCoinService and TbiProjectCoinModel can create draft project coin records.
4. Add or improve TBI Solutions Project, TBI Coin, and TBI Invest Coin draft creation.
5. Ensure mainnet minting is blocked by default.
6. Ensure devnet/test minting is separated from production minting.
7. Improve MyMI Exchange front-end JavaScript for:
   - real-time wallet state
   - balance refresh
   - transaction status lifecycle
   - submit locks
   - DataTables reloads
   - friendly wallet/RPC/slippage errors
8. Add support/team notification hooks for:
   - RPC outage
   - mint failure
   - failed transaction
   - repeated transaction failures
   - swap/trade failure
9. Add support/admin transaction lookup by:
   - user ID
   - wallet address
   - signature
   - mint address
   - status
   - date range
10. Add Spark commands:
   - aiops:solana-healthcheck
   - aiops:solana-digest
   - aiops:solana-transaction-audit
   - exchange:create-tbi-project-coin-drafts

## Patch Rules

- Do not hardcode secrets.
- Do not modify unrelated modules.
- Do not enable live mainnet minting.
- Use CodeIgniter 4 conventions.
- Use PHP 8.2-compatible syntax.
- Prefer complete replacement methods/functions.
- Add exact file placement for every change.
- Add rollback notes.
- Add testing commands.
