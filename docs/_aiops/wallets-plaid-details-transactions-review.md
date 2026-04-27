# Wallets Plaid/Details/Transactions Review (2026-04-27)

## Scope
Reviewed and repaired wallet-linking, details routing/dispatch, transaction-history rendering, DataTables wiring, and delete modal/delete-link behavior for:
- API controller (`WalletsAPIController`)
- Wallet service/model transaction paths
- Wallet details + listing views
- Wallet routes and route exposure

## Files changed
- `app/Modules/APIs/Controllers/WalletsAPIController.php`
- `app/Services/WalletService.php`
- `app/Modules/User/Views/Wallets/Details.php`
- `app/Modules/User/Views/Wallets/Details/credit_accounts.php`
- `app/Modules/User/Views/Wallets/index/fiat_wallets/Wallet_Listing.php`

## Methods/areas changed
- `WalletsAPIController::plaidExchange()`
  - Confirmed insert flow uses `addWalletReturnId()` + `addBankWalletReturnId()`.
  - Updated child payload to prefer safe/known bank child fields (`fl_loginId`, `fl_institution_id`, `provider`, account/balance/status timestamps), with `wallet_id` set after parent insert.
  - Confirmed no `addBankWallet()` call inside `plaidExchange()`.

- `WalletService::syncPlaidTransactions()`
  - Improved transaction date normalization from Plaid payload (`date`, `authorized_date`, `datetime`, `authorized_datetime`).
  - Prevents invalid zero-date values and writes normalized `transaction_date` + `posted_date`/`date` (when valid).
  - Keeps parent wallet ID linkage and dedupe path via `walletTransactionExists()`.

- `Wallets Details view`
  - Removed broken duplicate/extra script block and local duplicate DataTables initialization to avoid reinit conflicts.
  - Retained unified transaction table (`walletTransactionDatabase` + `defaultDTTable`) for helper-driven DataTables with newest-first ordering.

- `credit_accounts.php`
  - Corrected default delete endpoint from `Wallets/Delete/Bank/...` to `Wallets/Delete/Credit/...`.

- `fiat_wallets/Wallet_Listing.php`
  - Normalized delete link attributes to required modal contract (`delete-wallet-button`, `data-id`, `data-wallet-id`, `data-account-id`, `data-type`, bootstrap modal target, `openDeleteModal(event)`).
  - Corrected delete type to `Bank` and target modal id to `#deleteWalletModal`.

## Routes verified
Verified via `php spark routes` output:
- `Wallets/Banking/Details/(:segment)`
- `Wallets/Credit/Details/(:segment)`
- `Wallets/Debt/Details/(:segment)`
- `Wallets/Investment/Details/(:segment)`
- `Wallets/Crypto/Details/(:segment)`
- `Wallets/Delete/(:segment)/(:segment)`
- `API/Wallets/Plaid/Exchange`
- `API/Wallets/Plaid/Link-Token`
- `API/Wallets/Plaid/Sync-Transactions/(:segment)`

## SQL findings / runtime DB findings
- **Direct SQL query validation was not completed in this environment** due CLI bootstrap/DB access limitations for ad-hoc raw SQL execution.
- Could not conclusively extract live transaction date column usage from production-like rows in this container run.

## Transaction/date rendering findings
- Details dispatcher already includes robust date-resolution fallback list and invalid-date filtering, including anti-`Nov 30, -0001` guards.
- Service-side sync now persists normalized transaction dates when Plaid provides valid date fields, reducing N/A/invalid date display risk.

## DataTables findings
- Existing dashboard DataTables helper already initializes `#walletTransactionDatabase` with `order: [[0, 'desc']]`.
- Removed duplicate page-level init in `Details.php` to prevent `Cannot reinitialise DataTable` warnings.

## Delete cascade findings
- `WalletsController::delete()` delegates to `WalletService::deleteWalletCascade()`.
- `WalletService::deleteWalletCascade()` delegates to `WalletModel::deleteWalletCascade()`.
- `WalletModel::deleteWalletCascade()` includes parent + child type map logic, soft-delete updates, orphan-child targeted deletion support via explicit `account_id`, transaction usage, and safeguards against broad `wallet_id IS NULL` deletes.

## Remaining risks / recommended migrations
1. Consider adding explicit/consistent child columns where missing (`wallet_id` indexes, optional plaid metadata columns) to simplify fallback logic.
2. Validate `bf_users_wallet_transactions` schema consistency across environments (`transaction_date`, `date`, `posted_date`, `created_on`) and add migration if fields differ.
3. There are legacy Bootstrap 4 modal attributes in unrelated wallet legacy views outside this task scope; migrate incrementally to Bootstrap 5 for consistency.
4. Perform full manual runtime flow validation in a connected app/database environment (Plaid link, sync, details, delete linked + orphan scenarios).
