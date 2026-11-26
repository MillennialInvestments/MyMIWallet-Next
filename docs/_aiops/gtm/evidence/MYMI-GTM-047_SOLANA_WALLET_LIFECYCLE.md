# MYMI-GTM-047: Certify Solana Wallet and Transaction Lifecycle

## Status
READY FOR REVIEW / CERTIFIED.

- **PR:** [#744](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/744) (pending creation)
- **Completed UTC:** 2026-11-22T17:00:00Z
- **Domain:** Extended product domains (W4)
- **Gate:** None required (Money switches remain OFF)

## Summary of Changes
- **Keypair & Base58 Encoding Pure-PHP Resilience (`App\Services\SolanaService`):**
  - Enhanced `b58encodeFromBinary(string $bin)` with pure-PHP base conversion fallback when `ext-gmp` is not present, ensuring reliable ed25519 public key encoding across all server runtimes.
  - Verified `generateNewKeypair()` correctly outputs `public_b58`, `public_hex` (64 chars / 32 bytes), `secret_key_b64` (64 bytes), and `seed_b64` (32 bytes).
  - Maintained complete address normalization and validation (`isValidPublicKey`, `normalizeAddress`).
- **Solana Guardrails & Money Switch Invariants (`Config\Solana`, `SolanaService`):**
  - Confirmed all money switches and broadcast capabilities default to safe values:
    - `allowTransactionExecution` = `false`
    - `allowMainnetBroadcast` = `false`
    - `allowMainnetMint` = `false`
    - `allowPrivateKeySubmission` = `false`
    - `requireWalletSignature` = `true`
    - `defaultDryRun` = `true`
  - Enforced `guardMainnetAction`: blocks mainnet broadcasts and minting with status `blocked` and actionable error message unless explicitly enabled via environment variables.
- **Controller & API IDOR Protection (`SolanaController`, `SolanaAPIController`):**
  - Fixed variable collision in `SolanaController::addExternalWallet` (`$addr = $svc->normalizeAddress($addr)`).
  - Enforced session-user IDOR protection on `SolanaController::executeSwap` (`$userId = (int) ($this->cuID ?? $this->currentUserId() ?? 0)`).
  - Scoped transaction confirmation recipients to session user email (`$this->session?->get('user_email')`).
  - Scoped `SolanaController::lockTokens` to session user (`$this->currentUserId()`).
  - Hardened `SolanaAPIController::executeSwap` to scope `$userId` to authenticated session/auth token (`$this->cuID ?? $this->auth?->id() ?? 0`).
  - Enforced `privateKeySubmissionDisabledResponse()` returning HTTP 403 on any browser attempt to submit raw private keys.
- **Database Model & Migration (`SolanaModel`, `2026-11-22-000200_CreateExchangeCoinAddressTable`):**
  - Created defensive, additive migration for `bf_exchanges_coin_addresses` using `tableExists($table, false)` and unprefixed table creation.
  - Updated `SolanaModel` to point external coin addresses to `bf_exchanges_coin_addresses` via `$addressTable`.
  - Added request cache invalidation (`unset($this->requestCache['defaultAddress:' . $userId])`) on `attachExternalWallet`, `setDefaultAddress`, and `addNonCustodialAddress`.
  - Added `getDefaultAddress(int $userId): ?array` alias for intuitive address resolution.
  - Verified `disconnectWallet($walletId, $userId)` strictly verifies wallet ownership and prevents cross-user wallet disconnection.
- **Audit Command (`App\Commands\SolanaWalletSecretsAudit`):**
  - Fixed associative argument parsing bug in `parseOptions()` when options are passed directly by CI4 Spark.
  - Verified `solana:wallet-secrets:audit --guardrails-smoke` (41 PASS, 0 FAIL).
- **Certification Test Suites:**
  - `tests/unit/Solana/SolanaWalletLifecycleTest.php` (8 tests, 73 assertions PASS):
    - `testSolanaKeypairGenerationProducesValidBase58AndKeys`: validates keypair generation, base58 address validity, and byte lengths.
    - `testSolanaAddressValidationAndNormalization`: validates base58 alphabet check, whitespace trimming, 64-hex conversion, array payloads, and invalid rejection.
    - `testNonCustodialAddressLifecycleInDatabase`: validates address creation, default switching, and multi-tenant isolation.
    - `testDisconnectWalletOwnershipEnforcement`: validates owner disconnection and rejects cross-user attacker attempts.
    - `testSolanaMainnetSafetyGuardrails`: validates devnet/testnet allowed and mainnet broadcast/mint blocked by default.
    - `testSolanaConfigDefaultsAndMoneySwitches`: validates all 6 money switches and guardrail flags.
    - `testSolanaControllerAndApiSecuritySurface`: validates source-level IDOR hardening and private key submission denial.
    - `testSolanaWalletSecretsAuditSmokeCommand`: validates spark command execution and 0 failures.

## Test Verification
- Solana Unit Test: `vendor/bin/phpunit tests/unit/Solana/` (8 tests, 73 assertions PASS).
- Exchange Unit Test: `vendor/bin/phpunit tests/unit/Exchange/` (17 tests, 89 assertions PASS).
- Auth Smoke Suite: `vendor/bin/phpunit --testsuite auth-smoke` (20 tests, 89 assertions PASS).
- Form Certification Smoke: `bash tests/smoke/form-certification-smoke.sh` (293 PASS, 22 FAIL - Ratchet Preserved).
- Spark Command Rules Audit: `php spark ops:commands:audit --json` (0 violations).
- Model Limit Audit: `php spark ops:model-limit:audit` (0 new violations, 0 changed-file findings).

## Risks & Rollback
- Risk: Low. All Solana money switches remain strictly disabled (`allowTransactionExecution = false`, `allowMainnetBroadcast = false`, `allowMainnetMint = false`). Database changes are purely additive with `IF NOT EXISTS` guards.
- Rollback: Revert branch `feature/mymi-gtm-047-solana-wallet-lifecycle` or down-migrate `2026-11-22-000200_CreateExchangeCoinAddressTable.php`.
