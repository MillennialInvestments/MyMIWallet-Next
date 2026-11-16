# MYMI-GTM-035: Enforce Idempotency Webhook and Payment Reconciliation

## Status
DONE / MERGED.

- **PR:** [#725](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/725)
- **Commit:** `06a10dc83cce236104bc1ec97444760aee7ca62c`
- **Completed UTC:** 2026-11-16T14:51:00Z
- **Domain:** Core financial journeys (W3)

## Summary of Changes
- Implemented `App\Services\Payments\PaymentReconciliationService`:
  - Cross-references PayPal claims recorded in `bf_payment_claims` against ledger mutations in `bf_users_wallet_transactions`.
  - Accurately categorizes claims into reconciled/matched, unfulfilled, claim-vs-verified amount discrepancies, and orphaned ledger purchases.
  - Generates deterministic financial audit summaries.
- Created `App\Commands\Gtm\PaymentReconciliation` (`php spark gtm:payments:reconcile`), registered in `app/Config/Console.php`.
- Webhook idempotency certification:
  - PayPal claims: single-use enforcement in `PaymentClaimService` prevents replay or claim theft. Verified server-side amount overrides claimed amount.
  - Plaid webhooks: cryptographic JWT verification via `PlaidWebhookVerifier`.
  - MDIT onramp: HMAC signature validation and event logging.
  - Esports results: SHA-256 payload digest deduplication prevents double settlement.
- Money switches: Verified that `FEATURE_MYMIGOLD_PURCHASES`, `FEATURE_MEMBERSHIP_PURCHASES`, and `FEATURE_WALLETS` remain strictly `false` by default in `Config\Features` (Gate G14).

## Test Verification
- Test file: `tests/unit/Payments/PaymentWebhookIdempotencyTest.php` (7 tests, 33 assertions passing).
- Full suite: `vendor/bin/phpunit -c phpunit.xml.dist --testsuite unit` (429 tests, 2139 assertions passing).
- CI Run: GitHub Actions run on PR #725 — 12/12 checks passing.
- Smoke Suite: `bash tests/smoke/form-certification-smoke.sh` passed.
- Model Limit Audit: 30 baseline findings maintained; 0 additions.

## Risks & Rollback
- Risk: Low. Reconciliation logic is read-only and non-destructive. Money switches remain OFF.
- Rollback: `git revert 06a10dc83cce236104bc1ec97444760aee7ca62c`.
