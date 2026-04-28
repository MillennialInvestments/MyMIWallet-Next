# Wallet Delete Cascade Review (Active Flow)

Date: 2026-04-28 (UTC)

## Active flow confirmed

The active wallet index path was reviewed as:

1. `app/Modules/User/Views/Wallets/index.php`
2. `app/Modules/User/Views/Wallets/types/wallets_block.php`
3. Dynamic wallet card rendering in `wallets_block.php` (`renderWalletCard`) for category views.

Notes:
- The legacy per-category `Wallet_Listing.php` files still exist and were normalized for delete ID handling consistency.
- In current runtime behavior, `wallets_block.php` fetches `/API/Wallets?category=...` and builds cards client-side.

## Files reviewed

- `app/Modules/User/Views/Wallets/index.php`
- `app/Modules/User/Views/Wallets/types/wallets_block.php`
- `app/Modules/User/Views/Wallets/index/financial_wallets/Wallet_Listing.php`
- `app/Modules/User/Views/Wallets/index/credit_wallets/Wallet_Listing.php`
- `app/Modules/User/Views/Wallets/index/debt_wallets/Wallet_Listing.php`
- `app/Modules/User/Views/Wallets/index/investment_wallets/Wallet_Listing.php`
- `app/Modules/User/Views/Wallets/index/crypto_wallets/Wallet_Listing.php`
- `app/Modules/User/Views/Wallets/index/fiat_wallets/Wallet_Listing.php`
- `app/Modules/User/Controllers/WalletsController.php`
- `app/Services/WalletService.php`
- `app/Models/WalletModel.php`
- `app/Config/Routes.php`

## Files changed

- `app/Modules/User/Views/Wallets/index.php`
- `app/Modules/User/Views/Wallets/types/wallets_block.php`
- `app/Modules/User/Views/Wallets/index/financial_wallets/Wallet_Listing.php`
- `app/Modules/User/Views/Wallets/index/credit_wallets/Wallet_Listing.php`
- `app/Modules/User/Views/Wallets/index/debt_wallets/Wallet_Listing.php`
- `app/Modules/User/Views/Wallets/index/investment_wallets/Wallet_Listing.php`
- `app/Modules/User/Views/Wallets/index/crypto_wallets/Wallet_Listing.php`
- `app/Modules/User/Views/Wallets/index/fiat_wallets/Wallet_Listing.php`
- `app/Models/WalletModel.php`
- `app/Config/Routes.php`

## Index modal/POST handler status

`app/Modules/User/Views/Wallets/index.php` uses one shared modal (`#deleteWalletModal`) with Bootstrap 5 markup and POST fetch behavior.

Verified behavior:
- confirm button uses `id="confirmDeleteButton"`, `href="#"`, `data-delete-url="#"`.
- `openDeleteModal(event)` reads `data-type`, `data-wallet-id`, `data-id`, `data-account-id`, `data-name`.
- delete URL built from `site_url('Wallets/Delete')` and appends `?account_id=` when present.
- fetch sends `Accept: application/json`, `X-Requested-With: XMLHttpRequest`, plus CSRF header when helpers are available.
- on success, page reloads; on failure, button is restored and error logged.

## wallets_block.php parent/child ID passing status

`wallets_block.php` was updated so dynamic cards pass both IDs into delete actions:
- `data-wallet-id` => route target (parent wallet id when present)
- `data-account-id` => resolved child account id when available

Key changes:
- dynamic delete buttons now call `openDeleteModal(event)` and use modal attributes expected by `index.php`.
- removed local direct-confirm delete fetch path that omitted `account_id`.
- details/edit in dynamic cards now use child account id when available.

`WalletModel::listByUser()` now enriches each API row with child linkage:
- resolves subsidiary row with `findSubsidiaryForWallet()`.
- populates `child_account_id` and backfills `account_id` when missing.

This allows delete URLs like:
- linked: `/Wallets/Delete/Credit/{parent_wallet_id}?account_id={child_id}`
- orphan fallback: `/Wallets/Delete/Credit/{child_id}?account_id={child_id}` (when route target is child).

## Delete ID examples by type

Expected outbound modal URL pattern from dynamic cards:

- Bank: `/Wallets/Delete/Bank/{wallet_id}?account_id={bank_account_id}`
- Credit: `/Wallets/Delete/Credit/{wallet_id}?account_id={credit_account_id}`
- Debt: `/Wallets/Delete/Debt/{wallet_id}?account_id={debt_account_id}`
- Investment: `/Wallets/Delete/Investment/{wallet_id}?account_id={invest_account_id}`
- Crypto: `/Wallets/Delete/Crypto/{wallet_id}?account_id={crypto_account_id}`

When a child id is not resolvable, URL is still generated with route id only and backend cascade safe-lookups apply.

## Controller/service/model route checks

- `WalletsController::delete()` uses `deleteWalletCascade()` and reads `account_id` from POST/GET/JSON.
- `WalletService::deleteWalletCascade()` delegates to model method with guard.
- `WalletModel::deleteWalletCascade()` supports parent-id and child-id matching, explicit `account_id`, linked child lookup, and user-scoped updates only.
- Wallet delete route is now explicitly matched as GET/POST with alias `wallets.delete.type.id`.

## Command results

### Syntax checks

All passed:
- `php -l app/Modules/User/Views/Wallets/index.php`
- `php -l app/Modules/User/Views/Wallets/types/wallets_block.php`
- `php -l app/Modules/User/Views/Wallets/index/financial_wallets/Wallet_Listing.php`
- `php -l app/Modules/User/Views/Wallets/index/credit_wallets/Wallet_Listing.php`
- `php -l app/Modules/User/Views/Wallets/index/debt_wallets/Wallet_Listing.php`
- `php -l app/Modules/User/Views/Wallets/index/investment_wallets/Wallet_Listing.php`
- `php -l app/Modules/User/Views/Wallets/index/crypto_wallets/Wallet_Listing.php`
- `php -l app/Modules/User/Controllers/WalletsController.php`
- `php -l app/Services/WalletService.php`
- `php -l app/Models/WalletModel.php`
- `php -l app/Config/Routes.php`

### Routes

`php spark routes | grep -i "Wallets/Delete"` returns:
- `GET Wallets/Delete/([^/]+)/([^/]+)`
- `POST Wallets/Delete/([^/]+)/([^/]+)`

### Cache

- `php spark cache:clear` completed successfully.

## Before/after DB verification for one Credit wallet

Not executed in this container (no production DB connection available).

Use these SQL checks in the target environment:

```sql
SELECT id, status, active, deleted, modified_on
FROM bf_users_wallet
WHERE id = {parent_wallet_id};

SELECT id, wallet_id, status, active, deleted, updated_on
FROM bf_users_credit_accounts
WHERE id = {child_credit_id} OR wallet_id = {parent_wallet_id};
```

Expected after delete:
- parent: `status='deleted'`, `active=0`, `deleted=1`
- child: `status=0`, `active=0`, `deleted=1`

## Remaining concerns

1. There are legacy Wallets views outside the active index flow still containing Bootstrap 4 modal attributes and old delete references.
2. Runtime browser/cURL validation against production was not performed from this environment.
3. Production SQL repair statements were not executed from this environment.

