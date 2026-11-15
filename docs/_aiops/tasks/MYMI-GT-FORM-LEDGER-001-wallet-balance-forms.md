# MYMI-GT-FORM-LEDGER-001 (F4, part 1): wallet deposit/withdraw/add form integrity

## Status

IMPLEMENTED_NOT_CERTIFIED: second commit on the MYMI-GT-FORM-HARNESS-001 draft PR, written outside a native AIOps worktree. Depends on F2 (harness). Related: MYMI-GTM-032/033 (WalletModel overdraft + amount guards, already merged).

## Findings on main@bbabb22 (found with the F1 inventory)

1. `WalletsController::deposit()` / `withdraw()` called `TransactionService::logTransaction()` with 4 of 5 required arguments and `completeDeposit()` with 1 of 2: every request was a fatal `ArgumentCountError`. Behind that: no wallet-ownership check (any `wallet_id`), the WalletService result was ignored (success reported on failure), withdraw called `completeDeposit`, and the three writes were not in one transaction. Routes accept GET.
2. `exchangeCurrency()` calls `WalletService::exchangeFunds()`, which does not exist: fatal on every call.
3. `WalletsController::add()` stored `user_id` from the POST body: a signed-in user could create a wallet in another user's account (IDOR).
4. The live Add Wallet modal (`Wallets/Add.php`, rendered by `add()`) posts to `/API/Wallets/Add`, which has no route (404). The handler is `POST /Wallets/Add`.
5. 104 view files with forms are not referenced by any PHP file (legacy CI3 views such as `Wallets/Deposit_Funds.php`, `Withdraw_Funds.php`, `Add_Deposit_Fetch.php`); 70 of the 144 route FAILs are in those. They are UNREACHABLE, not live defects.

## Change

- `App\Services\WalletBalanceService`: one DB transaction per deposit/withdrawal. Ownership predicate (`id` AND `user_id`) in both the check and the UPDATE; no-overdraft predicate in the UPDATE; exactly one ledger row (`bf_users_wallet_transactions`) for the same normalised amount; any failure rolls back. Missing and foreign wallets return the same `wallet_not_found`. Optional `request_id` nonce makes a repeated submission a no-op (`duplicate_request`).
- `deposit()` / `withdraw()`: POST only, USD only, use the service, report the real outcome. `exchangeCurrency()` refuses explicitly instead of crashing.
- `add()` and `mapFormToWalletData()`: `user_id` is always the signed-in user.
- `Wallets/Add.php`: form action is `Wallets/Add`.
- Form inventory: `view_referenced` per entry, legacy `(Original)`/`copy` folders, requests inside HTML comments ignored.

## Tests

- `tests/unit/Ledger/WalletBalanceServiceTest.php` (SQLite): one ledger row per change; balance conservation over a mixed sequence incl. rejected ops (Δbalance = Σledger); IDOR for deposit and withdraw; invalid amounts (0, negative, '', 'abc', SQL text, NAN, INF, null, 1e400); overdraft; ledger-write failure rolls the balance back; same nonce applied once.
- `tests/unit/Ledger/WalletFormHandlersContractTest.php`: pins the handler wiring (POST-only, service, no posted user_id) and the Add form action.

## Validation

- `tests/unit/Ledger` + `tests/unit/AIOps`: 43 tests, 225 assertions, OK
- unit suite: 305 tests, only the sandbox-only `MarketingDistroTest` voiceover failure
- auth-smoke 15/15; `routes:verify-handlers` 188 known, 0 new; `git diff --check` clean

## Not done (next F4 tasks)

- Browser/HTTP feature test of `POST /Wallets/Deposit` with a signed-in fixture user (needs the staging fixture lane, F2 policy allow-list).
- Views do not send `request_id` yet; add a per-form nonce field.
- Budget forms (`Budget/Add`, `Account-Manager`, recurring schedule) and wallet `delete()`/`submitEdit()` ownership tests.
- Decide the fate of the 104 unreferenced views (delete in a governed cleanup PR, owner call).

## Rollback

Revert the commit. No schema or data change; ledger rows written by the new path use existing columns.
