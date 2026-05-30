# Solana API Health Service Initialization Validation

Date: 2026-05-30
Branch requested: `fix/solana-api-health-service-init`
Working branch available in this checkout: `work` (the requested branch was not present locally and no new branch was created).

## Files changed

- `app/Modules/APIs/Controllers/SolanaAPIController.php`
- `app/Config/Services.php`

No changes were made to `public/.htaccess` or Solana route definitions.

## Root cause

`SolanaAPIController::health()` called `service('solanaService')->getSafeNetworkStatus()` directly. In this checkout, `Config\Services` did not define a `solanaService()` factory, so the service lookup could return `null` in environments where CodeIgniter did not resolve a shared instance. The direct chained call then produced `Call to a member function getSafeNetworkStatus() on null`.

## Fix summary

- Added a `Config\Services::solanaService()` factory that returns `App\Services\SolanaService`.
- Added a safe Solana service resolver to `SolanaAPIController` that:
  - reuses an already resolved service when available,
  - tries CodeIgniter's service container,
  - falls back to direct `new SolanaService()` construction,
  - returns `null` rather than throwing if construction fails.
- Updated `SolanaAPIController::health()` so it never calls `getSafeNetworkStatus()` on `null`.
- Preserved fallback support for `getNetworkStatus()` if `getSafeNetworkStatus()` is unavailable.
- Degraded health responses use safe JSON status objects and do not include private keys, access tokens, seed phrases, mnemonics, or secret keys.

## Validation commands and results

### PHP syntax checks

```bash
php -l app/Modules/APIs/Controllers/SolanaAPIController.php
php -l app/Services/SolanaService.php
php -l app/Libraries/MyMISolana.php
```

Result: all three commands reported no syntax errors.

### Route verification

```bash
php spark routes | grep -Ei "API/Solana/health|Exchange/Solana|Solana"
```

Result: `GET API/Solana/health` is registered to `App\Modules\APIs\Controllers\SolanaAPIController::health`. `Exchange/Solana` routes remain present with login/auth filters in the route output. No route definitions were changed.

### Production health endpoint curl

```bash
curl -sS -L -o /tmp/solana_health.json -w "HTTP=%{http_code} FINAL=%{url_effective} CONTENT_TYPE=%{content_type}\n" https://www.mymiwallet.com/API/Solana/health
cat /tmp/solana_health.json

curl -sS -L -o /tmp/solana_health_index.json -w "HTTP=%{http_code} FINAL=%{url_effective} CONTENT_TYPE=%{content_type}\n" https://www.mymiwallet.com/index.php/API/Solana/health
cat /tmp/solana_health_index.json
```

Result in this container: both outbound HTTPS requests failed before reaching the site with `curl: (56) CONNECT tunnel failed, response 403`, returning `HTTP=000` and no response body file. This appears to be an environment/network proxy limitation in the execution container, not an application response.

### Local web smoke test

```bash
php spark serve --host 127.0.0.1 --port 8088
curl -sS -L -o /tmp/local_solana_health.json -w "HTTP=%{http_code} FINAL=%{url_effective} CONTENT_TYPE=%{content_type}\n" http://127.0.0.1:8088/API/Solana/health
cat /tmp/local_solana_health.json
```

Result: local request reached CodeIgniter but returned HTTP 500 because this container cannot connect to the configured MySQL database (`Connection refused`). The response did not contain `Call to a member function getSafeNetworkStatus() on null`.

## Security confirmations

- No private keys, access tokens, seed phrases, mnemonics, or secret keys are included in the Solana health degraded payloads.
- Existing `sanitizeWalletPayload()` redaction remains in place for response envelopes.
- `SolanaService::guardMainnetAction()` was not weakened.
- Mainnet minting remains disabled unless the existing `SOLANA_ALLOW_MAINNET_MINTING=true` environment guard is explicitly set.
- Mainnet broadcast remains disabled unless the existing `SOLANA_ALLOW_MAINNET_BROADCAST=true` environment guard is explicitly set.
- No transaction broadcast or minting paths were executed by this patch.

## AIOps follow-up status

No follow-up task files were queued in `docs/_aiops/tasks/`. The only validation limitation was outbound HTTPS access from this container and local missing MySQL connectivity.
