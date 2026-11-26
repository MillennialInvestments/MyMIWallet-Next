# MYMI-GTM-053: Certify MDIT Domain

## Status
IN REVIEW / CERTIFIED.

- **PR:** [#754](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/754) (pending creation)
- **Branch:** `feature/mymi-gtm-053-mdit-domain`
- **Domain:** Extended product domains (W4)
- **Gate:** None required (money switches stay OFF by default)

## Summary of Changes
- **KYC & Accreditation Lifecycle Certification (`MditInvestorService`, `MditInvestorAPIController`):**
  - Verified user profile creation and initiation (`startKyc`).
  - Verified accreditation attestation flow (`attestAccreditation`).
  - Enforced eligibility gate: `isVerifiedAndAccredited` strictly requires both `kyc_status === 'VERIFIED'` and `accreditation_status === 'ACCREDITED'`.
  - Blocked unauthorized deposit and redemption attempts when KYC/accreditation criteria are not met.
- **Deposit & Wallet Ownership Enforcement (`MditDepositService`, `MditDepositAPIController`):**
  - Verified session-user wallet ownership check (`ensureWalletOwned`) against `bf_mdit_wallets`.
  - Enforced deposit initiation idempotency via SHA-256 bucketed keys (`initiateDeposit`).
  - Verified on-chain confirmation flow (`confirmDeposit`), enforcing single-use transaction hashes and preventing cross-deposit hash collisions.
  - Hardened IDOR protection on deposit confirmation (`(int) $deposit['user_id'] !== $userId`), returning 403 when cross-user attempts occur.
- **Token Minting & Daily NAV Mechanics (`MditIssuanceService`, `MditNavService`, `MditNavComputeDaily`):**
  - Verified token minting calculation (`units = amount / nav_per_unit`) on confirmed USDC deposits.
  - Enforced mint idempotency: retried minting calls return existing `bf_mdit_token_ledger` records without double-minting units.
  - Verified daily NAV computation (`computeDailyNav`), accounting for minted vs. burned token supply, total asset value, and caching.
  - Verified `mdit:nav:compute_daily` spark command execution with table existence checks and parameter validation.
- **Token Redemption Lifecycle (`MditRedemptionService`, `MditRedemptionAPIController`, `MditAdminAPIController`):**
  - Verified token balance validation (`userTokenBalance`) on redemption requests, preventing overdrafts.
  - Verified admin approval workflow (`approveRedemption`), which records burned token ledger entries, marks status `COMPLETED`, records admin ID notes, and logs audit events to `bf_mdit_webhook_events`.
- **Model Limit Audit Compliance (`MditAdminAPIController`):**
  - Bounded queries in `pendingRedemptions()` (`findAll(100)`) and `pendingDeposits()` (`findAll(100)`).
- **Certification Test Suite (`tests/unit/MDIT/MditDomainTest.php`):**
  - 9 comprehensive unit tests (51 assertions) covering:
    - KYC lifecycle and accreditation attestation.
    - Wallet validation and deposit initiation idempotency.
    - Deposit confirmation, tx hash uniqueness, and collision prevention.
    - Token minting against daily NAV with duplicate minting prevention.
    - Token redemption lifecycle and admin approval burning.
    - Daily NAV computation and CLI command execution.
    - Deposit confirmation IDOR protection.
    - Admin controller bounded query limits.

## Test Verification
- Unit Test: `vendor/bin/phpunit tests/unit/MDIT/MditDomainTest.php` (9 tests, 51 assertions PASS).
- Feature Test: `vendor/bin/phpunit tests/feature/MditPhase1Test.php` (4 tests, 7 assertions PASS).
- Full Unit Suite: `vendor/bin/phpunit --testsuite unit` (582 tests, 2965 assertions PASS).
- Form Certification Smoke: `bash tests/smoke/form-certification-smoke.sh` (293 PASS, 22 FAIL - Ratchet Preserved).
- Route Handler Gaps: `php spark routes:verify-handlers` (0 new gaps, 0 fixed in baseline).
- API Filter Coverage: `php spark api:filters-check` (No CRITICAL filter gaps).
- Rate-Limit Coverage: `php spark api:rate-limit-check` (Rate-limit coverage passed).

## Risks & Rollback
- Risk: Low. Purely additive validation, IDOR guards, bounded queries, and unit tests.
- Rollback: Revert PR commit on `main`.
