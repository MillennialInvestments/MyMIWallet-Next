# WalletsModule – Wallet Retrieval & Reconciliation Workflow

## 1. Overview
MyMI Wallet aggregates a member's entire financial footprint (banking, credit, crypto, debt, and investments) into a single dashboard. The WalletsModule:
- Surfaces balances and account metadata on `/Wallets`.
- Normalizes rows from specialized account tables through `App\Libraries\MyMIWallets::processWalletData()` so the UI can render consistent keys.
- Powers both the server-rendered dashboard (`WalletsController::index`) and the async API endpoint (`API/Wallets`).
- Keeps the master wallet list in `bf_users_wallet` (legacy documentation sometimes names this `bf_users_wallets`) in sync with subsidiary tables via `MyMIWallets::reconcileUserWallets()`.

## 2. Data Sources
- `bf_users_wallet` – Master ledger of every wallet. Important columns: `id`, `user_id`, `wallet_type`, `category`, `amount`, `status`, `active`, `deleted`, `created_on`, `credentials`.
- `bf_users_bank_accounts` – Checking/Savings accounts with `account_type`, `bank_name`, `balance`, `available_balance`, `deleted`.
- `bf_users_credit_accounts` – Revolving credit instruments with `credit_limit`, `current_balance`, `available_balance`, `deleted`.
- `bf_users_crypto_accounts` – Exchange and chain wallets with `exchange`, `network`, `coin_address`, optional `deleted` flag.
- `bf_users_debt_accounts` – Loans and liabilities with `debtor`, `current_balance`, amortization details, `deleted`.
- `bf_users_invest_accounts` – Brokerage and retirement accounts with `broker`, `amount`, `net_worth`, `deleted`.

## 3. Retrieval Flow (`WalletsController::index`)
1. Guard the route via `guardAuthenticated()` and resolve `$cuID` from the current session/auth context.
2. Load supporting aggregates (budget snapshot, Solana snapshot, account collections) for sidebar widgets.
3. Fetch server-side wallet summaries with `WalletModel::getUserWallets($cuID)`, which now automatically filters out `deleted` rows and logs the result count per request. These totals power legacy summary widgets.
4. If the query string contains `?reconcile=1`, the controller instantiates `MyMIWallets` and calls `reconcileUserWallets($cuID)` to self-heal any gaps before rendering.
5. Render `App\Modules\User\Views\Wallets\index`, which in turn bootstraps the SPA-like wallet block (`types/wallets_block.php`).
6. The wallet block fetches real-time data from `GET /API/Wallets?category={financial|credit|...}`. The API controller resolves the authenticated user and delegates to `WalletModel::listByUser($uid, $category, $activeOnly)`.
   - `listByUser` always excludes `deleted=1` master rows.
   - Passing `active_only=1` (optional query string) adds `status/active` filters. The default (`active_only=0`) returns all non-deleted wallets so nothing silently disappears from the UI.
7. `MyMIWallets::processWalletData()` ensures every wallet array exposes `walletID`, `walletTitle`, `walletAmount`, `walletBroker`, `walletNickname`, and related metadata regardless of the original table structure.

## 4. Reconciliation Flow (`MyMIWallets::reconcileUserWallets`)
1. Pull all non-deleted master wallets for the user via `WalletModel::listByUser($userId, null, false)`.
2. For each wallet row, map it to a subsidiary table using `WalletModel::mapWalletRow()` and attempt to locate the linked record with `findSubsidiaryForWallet()`.
3. Missing subsidiaries are auto-created with `WalletModel::createSubsidiaryFromWallet()`, which seeds the child table with the best-available metadata and links the `wallet_id`.
4. Existing subsidiaries are checked for missing critical fields through `WalletModel::requiredMissingForType()`. Any gaps are added to the reconciliation report.
5. The routine also scans the subsidiary tables for "orphans" (rows whose `wallet_id` is empty or no longer exists in the master list) so operations can clean them up manually.
6. A structured summary is returned (and optionally logged) containing counts of processed wallets, auto-created child rows, outstanding issues, and orphaned accounts.
7. You can trigger reconciliation on demand by visiting `/Wallets?reconcile=1` (useful in development) or by wiring the method into a CLI/CRON job.

## 5. Edge Cases & Business Rules
- Non-deleted wallets are always visible; `status`/`active` flags are advisory and only applied when explicitly requested via `active_only=1`.
- The API never returns rows for unauthenticated callers (`401 Unauthorized`).
- `MyMIWallets::processWalletData()` gracefully handles partial data: it normalizes balances using `available_balance`, `current_balance`, `balance`, `amount`, or `investment_amount`, whichever is present.
- Subsidiary lookups prioritize `wallet_id`, but also fall back to `id`/`account_id` for legacy data.
- Reconciliation logging is intentionally verbose to help audit user-specific issues (especially for user_id=2 while debugging).
- The optional reconciliation hook is guarded behind an explicit query parameter to avoid adding latency for everyday production page loads.

## 6. Future Improvements
- Add UI toggles so users can switch between "All" and "Active" wallets without extra API calls.
- Surface the reconciliation summary inside an admin dashboard so support staff can resolve orphaned records without shell access.
- Consider caching wallet API responses per user to reduce duplicate DB hits when rapidly switching tabs.
- Expand the reconciliation engine to backfill missing account numbers or Plaid metadata by cross-referencing transaction logs.
- Extend the documentation with sequence diagrams for Plaid/SnapTrade onboarding workflows once they are finalized.
