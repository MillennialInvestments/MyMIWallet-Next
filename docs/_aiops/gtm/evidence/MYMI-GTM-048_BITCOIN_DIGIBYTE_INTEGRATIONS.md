# MYMI-GTM-048: Certify Bitcoin and DigiByte Integrations

## Status
READY FOR REVIEW / CERTIFIED.

- **PR:** [#746](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/746) (pending creation)
- **Completed UTC:** 2026-11-23T16:30:00Z
- **Domain:** Extended product domains (W4)
- **Gate:** None required (Money switches remain OFF)

## Summary of Changes
- **Configuration & Guardrails Architecture (`Config\Bitcoin`, `Config\DigiByte`):**
  - Created missing `Config\Bitcoin` with configuration defaults and safety switches:
    - `allowTransactionExecution` = `false`
    - `allowMainnetBroadcast` = `false`
    - `allowPrivateKeySubmission` = `false`
    - `defaultDryRun` = `true`
  - Added identical safety guardrails and money switches to `Config\DigiByte`.
- **Bitcoin Service & PSBT Engine (`App\Services\BitcoinService`):**
  - Added multi-format address validation supporting P2PKH (`1...`), P2SH (`3...`), Bech32 (`bc1...`), and testnet (`tb1...`, `2...`, `m...`, `n...`).
  - Added `guardMainnetAction(string $action, ?string $network = null)` blocking mainnet actions unless explicitly authorized.
  - Implemented BIP174 PSBT builder (`buildUnsignedPsbt`) validating input/output schemas and returning serialized base64 PSBT envelopes with standard magic bytes (`psbt\xff`).
  - Implemented `broadcastRawTransaction` with deterministic sha256d txid computation in dry-run mode and network-resilient request handling (`http_errors => false`).
- **DigiByte Service & RPC Layer (`App\Services\DigiByteService`):**
  - Added multi-format DigiByte address validation supporting Legacy P2PKH (`D...`), Script P2SH (`S...`), and SegWit Bech32 (`dgb1...`).
  - Added `guardMainnetAction(string $action, ?string $network = null)` blocking unapproved mainnet broadcasts.
  - Hardened `broadcast` with safe dry-run handling and network failure resilience.
- **DigiByte Controller & Session IDOR Protection (`App\Modules\Exchange\Controllers\DigiByteController`):**
  - Implemented all 7 registered routes in `app/Config/Routes.php`:
    - `fetchFrontendData()`
    - `provisionDefaultWallet()`
    - `connectWallet()`
    - `disconnectWallet()`
    - `refreshWallet()`
    - `getAssets()`
    - `createWallet()`
  - Enforced strict session-user ownership (`$this->cuID` / `$this->currentUserId()`) on all mutations.
  - Disconnect operations strictly scope deletion to authenticated session user, eliminating cross-user IDOR vulnerabilities.
  - Non-custodial DigiByte addresses bind to `bf_exchanges_coin_addresses` with `chain = 'digibyte'`.
  - Added `privateKeySubmissionDisabledResponse()` rejecting browser-submitted private keys with HTTP 403.
- **Bitcoin API Controller Hardening (`App\Modules\APIs\Controllers\BitcoinAPIController`):**
  - Hardened `buildUnsignedPsbt` with input/output schema validation and dry-run metadata.
  - Hardened `broadcastSignedTx` with strict private key rejection (HTTP 403 Forbidden).
- **Bitcoin Library Fixes (`App\Libraries\MyMIBitcoin`):**
  - Initialized `$this->db` in `__construct` to prevent null property access errors.
  - Fixed query from non-existent `cuID` column to standard `user_id` in `bf_exchanges_coin_addresses`.
- **Certification Test Suite (`Tests\Unit\Crypto\BitcoinDigiByteIntegrationTest`):**
  - 15 unit tests covering:
    - Bitcoin address validation (P2PKH, P2SH, Bech32, testnet, invalid).
    - PSBT builder generation and validation rejection.
    - Deterministic dry-run txid computation.
    - Bitcoin mainnet safety guardrails.
    - DigiByte address validation (Legacy P2PKH, Script P2SH, SegWit Bech32).
    - DigiByte mainnet guardrails and broadcast dry-run.
    - DigiByte controller connect/disconnect lifecycle and IDOR cross-user rejection.
    - DigiByte controller private key submission rejection.
    - DigiByte controller frontend data fetching and default provisioning.
    - Bitcoin API controller PSBT building and private key rejection.
    - Config money switches and guardrail defaults.

## Test Verification
- Crypto Unit Test: `vendor/bin/phpunit tests/unit/Crypto/BitcoinDigiByteIntegrationTest.php` (15 tests, 81 assertions PASS).
- Unit Test Suite: `vendor/bin/phpunit --testsuite unit` (613 tests, 3,157 assertions PASS).
- Auth Smoke Suite: `vendor/bin/phpunit --testsuite auth-smoke` (20 tests, 89 assertions PASS).
- Form Certification Smoke: `bash tests/smoke/form-certification-smoke.sh` (293 PASS, 22 FAIL - Ratchet Preserved).
- Spark Command Rules Audit: `php spark ops:commands:audit --json` (0 violations).
- Model Limit Audit: `php spark ops:model-limit:audit` (0 new violations).

## Known Risks & Rollback
- Risk: Low. All Bitcoin and DigiByte money switches remain strictly disabled by default (`allowTransactionExecution = false`, `allowMainnetBroadcast = false`, `defaultDryRun = true`). All database interactions use pre-existing additive schema (`bf_exchanges_coin_addresses`).
- Rollback: Revert branch `feature/mymi-gtm-048-bitcoin-digibyte-integrations`.
