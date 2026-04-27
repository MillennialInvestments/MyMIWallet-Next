# Wallets Transaction Date + Subtotal Fix

## Summary
This update fixes Wallet Details transaction date rendering and ordering for Plaid-linked wallets by prioritizing `posted_date` end-to-end (querying, sync storage, and view resolution), and ensures running subtotal values recalculate using current DataTables sort/filter context.

## Files Changed
- `app/Models/WalletModel.php`
- `app/Services/WalletService.php`
- `app/Modules/User/Controllers/WalletsController.php`
- `app/Modules/User/Views/Wallets/Details.php`

## Methods Changed
### `app/Models/WalletModel.php`
- `getTransactionHistory($walletId, ?int $userId = null, int $limit = 100): array`
  - Now prioritizes `posted_date` ordering first, then falls back to older date columns.
  - Keeps defensive column checks and active/deleted filtering.
- `updateWalletTransactionDateIfMissing(int $userId, int $walletId, string $externalId, ?string $transactionDate): bool`
  - Repairs missing/bad date fields using a robust invalid-date detector.
  - Backfills `posted_date`, `date`, `transaction_date`, `submitted_date`, and `created_on` when needed.
- `insertWalletTransaction(array $data): int`
  - Normalizes inbound Plaid dates.
  - Stores `posted_date` and safely backfills related date fields for new inserts.

### `app/Services/WalletService.php`
- `resolvePlaidTransactionDate(array $transaction): ?string`
  - Now prioritizes `posted_date` and rejects zero/null/invalid placeholders.
- `syncPlaidTransactions(int $userId, int $walletId, int $daysBack = 90): array`
  - Fixes the `$txn` variable usage bug.
  - Stores `posted_date`, `date`, `transaction_date`, `submitted_date`, and `created_on` consistently.
  - Tracks inserted/updated/skipped counts and repairs existing rows when possible.

### `app/Modules/User/Controllers/WalletsController.php`
- `details($accountID = null): ResponseInterface|string`
  - Uses the account lookup helpers by type.
  - Resolves transaction wallet ID from `previousData['wallet_id']` first.
  - Loads history via `resolveWalletService()->getWalletTransactionHistory(...)`.
  - Ensures `commonData()` is called before `array_merge()` and enables DataTables.

### `app/Modules/User/Views/Wallets/Details.php`
- Transaction date resolver now prioritizes `posted_date` first.
- Added/confirmed helper closures:
  - `$formatDate`
  - `$formatDateSortValue`
  - `$transactionDate`
  - `$transactionDescription`
  - `$transactionAmount`
- Transaction table includes six columns and running subtotal support:
  1. Date
  2. Description
  3. Category
  4. Status
  5. Amount
  6. Running Subtotal
- DataTables script preserves safe init behavior and recalculates running subtotal in sorted/filtered order.

## Confirmation: `posted_date` Priority
Yes — `posted_date` is now prioritized in:
- Transaction history retrieval sort order.
- Plaid transaction date resolution and payload storage.
- Wallet Details transaction date display resolver.

## One-time SQL Repair Status
- **Not run in this environment** (database client/connection details were not available from this workspace shell session).
- SQL repair statement is still recommended for existing historical rows where `posted_date` is valid but `submitted_date` / `created_on` are blank or zero.

## Before/After Example (wallet_id 981)
### Before
- `posted_date`: `2026-04-26`
- `created_on`: `0000-00-00 00:00:00`
- `submitted_date`: blank
- UI date could render as `Nov 30, -0001`

### After (expected)
- `posted_date`: `2026-04-26` (source of truth)
- `submitted_date`: `2026-04-26 00:00:00`
- `created_on`: `2026-04-26 00:00:00`
- UI date renders correctly (e.g., `Apr 26, 2026`)

## Remaining Risks
- Existing rows with malformed legacy date data still need the one-time SQL backfill run.
- Runtime verification for `/index.php/Wallets/Banking/Details/981` still needs to be performed in browser/UI environment to confirm end-user rendering and interaction behavior.
