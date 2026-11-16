# MYMI-GTM-033: Certify Wallet CRUD Authorization and Lifecycle

## Status
DONE / MERGED.

- **PR:** [#723](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/723)
- **Commit:** `080884af4a69cf49455325b1b42600ec80674f1c`
- **Completed UTC:** 2026-11-16T14:45:00Z
- **Domain:** Core financial journeys (W3)

## Summary of Changes
- Scoped `WalletModel::deleteWallet(int $walletId, int $userId): bool` and `AccountsModel::deleteWallet(int $walletId, int $userId): bool` to verify active session user ownership.
- Protected `WalletsController::delete()` against CSRF and accidental GET deletions; renders `DeleteConfirm.php` on GET and only executes deletion on POST with valid CSRF tokens.
- Updated all subsidiary wallet view actions (bank, credit, crypto, debt, investment) to submit via POST forms with `csrf_field()`.
- Closed IDOR in `WalletsAPIController::updateByType()` by routing through `WalletModel::updateAccountAndWallet()` with strict user scoping.

## Test Verification
- Test file: `tests/unit/Wallet/WalletCrudOwnershipTest.php` (13 tests, 47 assertions passing).
- CI Run: GitHub Actions run on PR #723 — 12/12 checks passing.
- Smoke Suite: `bash tests/smoke/form-certification-smoke.sh` passed.
- Model Limit Audit: 30 baseline findings maintained; 0 additions.

## Risks & Rollback
- Risk: None. Deletion endpoints and subsidiary models require owner authentication.
- Rollback: `git revert 080884af4a69cf49455325b1b42600ec80674f1c`.
