# MYMI-GTM-034: Certify Transaction Lifecycle and Imports

## Status
DONE / MERGED.

- **PR:** [#724](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/724)
- **Commit:** `72c9172ffccbe5e5927514a38260da7f4469f62c`
- **Completed UTC:** 2026-11-16T14:47:00Z
- **Domain:** Core financial journeys (W3)

## Summary of Changes
- Implemented `App\Services\TradeImportService`:
  - Broker CSV format normalization supporting standard headers and broker variants (`Ticker`, `Quantity`, `Price`, `Date`, `Action`).
  - Strict input validation for numeric prices and share quantities.
  - Deterministic SHA-256 trade signature hashing guaranteeing intra-batch and cross-file duplicate prevention.
  - User-scoped atomic batch inserts into `bf_users_trades`.
- Wired `InvestmentModel::importInvestmentsFromCSV($filePath, ?int $userId)` to delegate to `TradeImportService`.
- Closed IDOR in `InvestmentsController::saveTradeData` by enforcing `$this->cuID`, returning HTTP 401 on unauthenticated requests, and returning HTTP 403 Forbidden on non-owner trade update attempts.
- Added authenticated trade import route `/Trade-Tracker/importCsv` in `app/Config/Routes.php`.
- Hardened `TransactionModel`: `insertTransaction` preserves caller-supplied `transaction_id` for idempotency; `updateTransaction` enforces optional `$userId` scoping.
- Built automated Human Gate audit runner: `app/Commands/Gtm/GateAudit.php` (`php spark gtm:gate:audit`) and `scripts/ops/gtm/mymi-gate-audit.sh`.

## Test Verification
- Test file: `tests/unit/Transactions/TradeImportServiceTest.php` (14 tests, 62 assertions passing).
- CI Run: GitHub Actions run on PR #724 — 12/12 checks passing.
- Smoke Suite: `bash tests/smoke/form-certification-smoke.sh` passed.
- Model Limit Audit: 30 baseline findings maintained; 0 additions.

## Risks & Rollback
- Risk: Low. Purely additive and backwards-compatible.
- Rollback: `git revert 72c9172ffccbe5e5927514a38260da7f4469f62c`.
