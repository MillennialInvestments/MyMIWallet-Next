# MYMI-GTM-032: Wallet Ledger Invariants & Unique Transaction IDs

## Status

- **Status:** Complete / Verified in Production
- **PR:** [#721](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/721)
- **Commit SHA:** `da4bf7f67894374f6d56211b0611a541e40c71eb`
- **Release:** `20261116T124907Z-gtm-da4bf7f6`
- **Previous Release (Rollback target):** `20261116T120828Z-gtm-b7fabfd6`

---

## 1. Scope & Invariants Enforced

GTM-032 ensures ledger balance equations are transactionally enforced and concurrent replay/duplicate failure cases reconcile exactly.

1. **Database-level uniqueness on transaction ID:**
   - Migration `2026-11-16-000100_UniqueWalletLedgerTransactionId` adds unique index `uq_wallet_tx_transaction_id` on `bf_users_wallet_transactions.transaction_id`.
   - Migration defends against pre-existing duplicates using `HAVING COUNT(*) > 1` before index application.
   - Replayed or duplicated transaction IDs fail at the database constraint level.

2. **Atomic balance updates:**
   - Atomic balance modifications are routed through `WalletBalanceService`.
   - Balance changes use database transactions and enforce ledger invariants.

---

## 2. Verification & Test Evidence

### Automated Unit Tests
- `tests/unit/Ledger/UniqueWalletLedgerTransactionIdMigrationTest.php`:
  - `testMigrationExistsAndTargetsLedger`: asserts migration references `bf_users_wallet_transactions`, `uq_wallet_tx_transaction_id`, and has `down()` rollback method.
  - `testMigrationRefusesWhenDuplicatesExist`: asserts migration checks for duplicates before adding the index (`HAVING COUNT(*) > 1`).
- `tests/unit/Ledger/WalletBalanceServiceTest.php`:
  - Verifies atomic ledger balance calculations, credits, debits, and invariance under concurrency.
- `tests/unit/Ledger/WalletFundsTest.php`:
  - Verifies wallet fund transfers, balance invariants, and validation.
- `tests/unit/Ledger/AuctionBalanceInvariantTest.php`:
  - Verifies auction escrow and balance invariants.
- `tests/unit/Ledger/WalletFormHandlersContractTest.php`:
  - Pins controller methods to atomic services and verifies no unauthenticated or un-scoped mutations occur.

### Staging Verification
- Staging host: `https://staging.mymiwallet.com` deployed commit `da4bf7f6`.
- Live form tests: `27/27 live submits PASS (0 FAIL)`.

---

## 3. Risks & Rollback

- **Risks:** Any background job or legacy endpoint attempting to reuse an existing `transaction_id` will fail with a duplicate key error rather than silently corrupting account balances.
- **Rollback:**
  - Code rollback to `20261116T120828Z-gtm-b7fabfd6`.
  - Database rollback: `MIGRATE='UniqueWalletLedgerTransactionId' php spark migrate:rollback` or dropping `uq_wallet_tx_transaction_id` on `bf_users_wallet_transactions`.
