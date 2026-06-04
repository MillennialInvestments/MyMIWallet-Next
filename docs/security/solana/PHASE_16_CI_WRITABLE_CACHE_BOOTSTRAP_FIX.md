# Phase 16 CI Writable Cache Bootstrap Fix

## Reason

GitHub Actions runs Spark commands from a fresh checkout where `writable/cache` may not exist. CodeIgniter attempts to write `FileLocatorCache` during Spark boot, causing a fatal error when the directory is missing.

## Fix

- Added `scripts/ci/prepare-writable.sh`.
- Updated workflows that invoke `php spark` to call the writable preparation script after dependency installation or checkout.
- The script creates the CodeIgniter runtime directories required by CI:
  - `writable/cache`
  - `writable/debugbar`
  - `writable/logs`
  - `writable/session`
  - `writable/uploads`

## Safety

- No Solana transaction execution enabled.
- No Solana broadcast enabled.
- No mainnet minting enabled.
- No private-key submission enabled.
- No auth or CSRF bypass.

## Validation Commands

```bash
bash -n scripts/ci/prepare-writable.sh
rm -rf writable/cache
bash scripts/ci/prepare-writable.sh
test -d writable/cache
php spark list
php spark ops:commands:audit
php spark solana:preview-browser-runtime:smoke
php spark solana:preview-runtime:smoke
php spark solana:wallet-secrets:audit --guardrails-smoke
Expected Results
writable/cache exists
Spark command audit passes
Phase 16 browser runtime smoke: FAIL count 0
Phase 15 runtime smoke: FAIL count 0
Permanent Solana guardrails: FAIL count 0

