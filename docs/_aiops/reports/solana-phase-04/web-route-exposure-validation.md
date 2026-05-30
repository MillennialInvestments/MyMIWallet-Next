# Solana Phase 04 Web Route Exposure Validation

Date: 2026-05-30
Branch requested: `fix/solana-exchange-web-route-exposure`
Branch available in this workspace: `work` (the requested branch was not present locally and no remote is configured, so no new branch was created).

## Files Changed

- `app/Config/Routes.php`
- `docs/_aiops/reports/solana-phase-04/web-route-exposure-validation.md`

No controller or filter files were modified.

## Files Inspected Before Patching

- `app/Config/Routes.php`
- `app/Modules/Exchange/Controllers/SolanaController.php`
- `app/Modules/APIs/Controllers/SolanaAPIController.php`
- `app/Config/Filters.php`

## Routes Added

Explicit case-sensitive CodeIgniter 4 route aliases were added for production smoke-test URLs:

| Method | URL | Controller mapping | Filter intent |
| --- | --- | --- | --- |
| GET | `/Exchange/Solana` | `\App\Modules\Exchange\Controllers\SolanaController::index` | `login` |
| GET | `/Exchange/Solana/Swap` | `\App\Modules\Exchange\Controllers\SolanaController::coinSwap` | `login` |
| GET | `/Exchange/Solana/Assets` | `\App\Modules\Exchange\Controllers\SolanaController::assets` | `login` |
| GET | `/Exchange/Solana/Create` | `\App\Modules\Exchange\Controllers\SolanaController::create` | `login` |
| GET | `/API/Solana/health` | `\App\Modules\APIs\Controllers\SolanaAPIController::health` | global safe API filters only |

## Controller Methods Mapped

- `SolanaController::index()` renders the Solana exchange landing view.
- `SolanaController::coinSwap()` renders the Solana swap view.
- `SolanaController::assets()` renders the Solana assets view.
- `SolanaController::create()` renders the Solana create view.
- `SolanaAPIController::health()` returns a safe Solana network health JSON envelope via `getSafeNetworkStatus()`.

## Local Validation Commands

```bash
php -l app/Config/Routes.php
php -l app/Modules/Exchange/Controllers/SolanaController.php
php -l app/Modules/APIs/Controllers/SolanaAPIController.php
php spark routes | grep -Ei "Exchange/Solana|API/Solana|Solana"
```

Results:

- `app/Config/Routes.php`: no syntax errors detected.
- `app/Modules/Exchange/Controllers/SolanaController.php`: no syntax errors detected.
- `app/Modules/APIs/Controllers/SolanaAPIController.php`: no syntax errors detected.
- `php spark routes` listed the required routes, including:
  - `GET API/Solana/health -> \App\Modules\APIs\Controllers\SolanaAPIController::health`
  - `GET Exchange/Solana -> \App\Modules\Exchange\Controllers\SolanaController::index`
  - `GET Exchange/Solana/Swap -> \App\Modules\Exchange\Controllers\SolanaController::coinSwap`
  - `GET Exchange/Solana/Assets -> \App\Modules\Exchange\Controllers\SolanaController::assets`
  - `GET Exchange/Solana/Create -> \App\Modules\Exchange\Controllers\SolanaController::create`

## Production Curl Status Results

The requested production curl commands were attempted from this environment:

```bash
curl -I -L https://www.mymiwallet.com/Exchange/Solana
curl -I -L https://www.mymiwallet.com/Exchange/Solana/Swap
curl -I -L https://www.mymiwallet.com/Exchange/Solana/Assets
curl -I -L https://www.mymiwallet.com/Exchange/Solana/Create
curl -I -L https://www.mymiwallet.com/API/Solana/health
```

Each request was blocked by the environment/proxy before reaching the production application:

| URL | Observed result |
| --- | --- |
| `https://www.mymiwallet.com/Exchange/Solana` | `curl: (56) CONNECT tunnel failed, response 403`; `HTTP/1.1 403 Forbidden`; `server: envoy` |
| `https://www.mymiwallet.com/Exchange/Solana/Swap` | `curl: (56) CONNECT tunnel failed, response 403`; `HTTP/1.1 403 Forbidden`; `server: envoy` |
| `https://www.mymiwallet.com/Exchange/Solana/Assets` | `curl: (56) CONNECT tunnel failed, response 403`; `HTTP/1.1 403 Forbidden`; `server: envoy` |
| `https://www.mymiwallet.com/Exchange/Solana/Create` | `curl: (56) CONNECT tunnel failed, response 403`; `HTTP/1.1 403 Forbidden`; `server: envoy` |
| `https://www.mymiwallet.com/API/Solana/health` | `curl: (56) CONNECT tunnel failed, response 403`; `HTTP/1.1 403 Forbidden`; `server: envoy` |

Because the 403 response is from the CONNECT tunnel/proxy layer, it does not validate production application behavior and is not an application-level 404. Re-run the curl commands from a network path that can reach `www.mymiwallet.com` directly after deployment.

## Remaining 404 / Redirect / Auth Behavior

- Local route registration now confirms that all five required paths resolve to controller actions, so there are no local CodeIgniter 4 route-table 404s for the requested paths.
- Exchange view routes intentionally retain the existing `login` protection model. Browser smoke tests from unauthenticated sessions may redirect or be challenged by auth depending on production filter behavior; that is expected and safer than exposing authenticated exchange views publicly.
- `/API/Solana/health` maps to the safe health endpoint and does not use token minting, transfer, swap execution, or broadcast routes.
- Production curl behavior could not be verified from this environment because all five requests were blocked by a proxy CONNECT 403 before reaching the site.

## Safety Confirmations

- No private keys, credentials, tokens, or secrets were added or exposed.
- No database schema changes were made.
- No Solana mainnet minting was enabled.
- No transaction broadcast, transfer, swap execution, or minting behavior was changed.
- No unrelated routes were modified; only explicit Solana smoke-test aliases were added.
- No AIOps follow-up task files were queued under `docs/_aiops/tasks/` because the requested patch and validation report were completed.
