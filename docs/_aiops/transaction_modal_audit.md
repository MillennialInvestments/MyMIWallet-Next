# Transaction Modal Audit (`#transactionModal`)

## Scope
Audit and fix modal lifecycle for open/load/submit/close/refresh in CI4 + Bootstrap 5 without duplicate modal instances, CSRF failures, DataTables re-init issues, or non-JSON AJAX failures.

## Inventory Command
```bash
grep -RIn "transactionModal\|data-transaction\|transaction-modal\|TransactionModal\|PlaidTransaction\|transactionsTable\|transactionHistory\|dynamicModalLoader" \
app/Modules app/Views public/assets/js 2>/dev/null | tee /tmp/transaction_modal_refs.txt
```

## Key Findings
1. `transactionModal` loader was already Bootstrap 5 based, but lacked guarded global binding and robust JSON form submit handling for modal-hosted forms.
2. Wallet modal partials (`Add`/`Edit`) still used Bootstrap 4 dismiss attributes (`data-dismiss`).
3. Wallet delete partial rendered a **second modal** (`#deleteWalletModal`) inside transaction modal content, causing duplicate modal behavior and runtime conflicts.
4. Wallet controller add/edit/delete handlers redirected on POST; AJAX modal submissions could receive HTML redirects/error pages instead of JSON.
5. Some delete triggers used duplicate IDs and lacked dataset values needed to load correct delete record in `Dashboard/Transaction-Modal/...`.

## Changes Applied

### 1) Central transaction modal runtime hardening
**File:** `app/Modules/User/Views/Dashboard/index/transaction-modal.php`
- Added one-time global binding guard (`window.__transactionModalBound`) to prevent duplicate event bindings.
- Kept Bootstrap 5-only modal API usage via `bootstrap.Modal.getOrCreateInstance(...)`.
- Added unified inline error renderer for in-modal failures.
- Added robust JSON parsing guard for modal form submissions.
- Added delegated POST form submit handler for modal-loaded content:
  - sends `X-Requested-With` + CSRF header,
  - requires JSON response,
  - updates CSRF hash from payload,
  - displays in-modal errors,
  - closes modal on success,
  - refreshes transaction/DataTable state without reinitializing DataTables,
  - falls back to page reload when no table is present.

### 2) Remove duplicate modal instance from delete partial
**File:** `app/Modules/User/Views/Wallets/Delete.php`
- Replaced nested `#deleteWalletModal` markup with modal **content fragment only** (header/body/footer) for injection into `#transactionModal`.
- Added Bootstrap 5 close button (`btn-close`, `data-bs-dismiss`).
- Added actual delete form (`POST`) with CSRF field and route derived from URI segments.

### 3) Bootstrap 5 dismiss attr fixes
**Files:**
- `app/Modules/User/Views/Wallets/Add.php`
- `app/Modules/User/Views/Wallets/Edit.php`

Changes:
- Replaced Bootstrap 4 `data-dismiss="modal"` close buttons with Bootstrap 5 equivalents.
- Removed local `Edit.php` submit script to avoid duplicate submit handlers; modal submission is now centrally handled by transaction modal runtime.

### 4) Ensure AJAX endpoints return JSON for modal submissions
**File:** `app/Modules/User/Controllers/WalletsController.php`
- Updated `add()`, `edit()`, and `delete()` to detect AJAX/JSON expectations and return JSON payloads consistently:
  - success: `{status: "success", message, redirect, csrfHash}`
  - error: `{status: "error", message, csrfHash}` with appropriate status codes
- Preserved existing redirect behavior for non-AJAX/full-page flows.

### 5) Delete trigger data consistency
**File:** `app/Modules/User/Views/Wallets/Details/wallets.php`
- Replaced duplicate `id="deleteWalletBtn"` usage with class-based triggers.
- Added `data-accountid` and `data-category` so the modal loader can request the correct delete payload.

## Outcome Mapping vs Requested Criteria
1. **Single modal instance in DOM:** enforced by modal partial strategy + no nested delete modal.
2. **Opens from action buttons:** delegated click loader remains active and idempotent.
3. **Loads correct transaction record:** delete triggers now pass account id/category.
4. **Loading state:** preserved and reset on hide.
5. **Errors shown in modal:** centralized inline error block added.
6. **Submit/update with CSRF:** modal submit uses CSRF header + backend returns JSON + refreshed token hash.
7. **Refresh after save/delete/update:** DataTable draw/reload path + fallback reload.
8. **DataTables stable:** no re-init logic added; existing table instance is reused.
9. **No duplicate event binding:** guarded with `window.__transactionModalBound`.
10. **No `bootstrap is not defined`:** guarded runtime checks before usage.
11. **No `Cannot reinitialise DataTable`:** table refresh uses existing instance.
12. **No non-JSON AJAX failures:** controller JSON responses for add/edit/delete in AJAX mode + strict client parser.
13. **Audit report produced:** this file.

## Notes
- Internal app routes use `site_url()` in modified flows.
- No Bootstrap script duplication was introduced.
- Existing CI4/Plaid/Budget logic was preserved except where modal correctness required changes.
