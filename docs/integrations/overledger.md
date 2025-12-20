# Overledger Integration (MyMIExchange)

This connector wraps Quant Overledger via OAuth2 client-credential flow and exposes a small, stable surface area through `MyMIExchange`.

## Environment variables

Set these in `.env` (do **not** hardcode secrets):

```dotenv
OVERLEDGER_ENV=sandbox            # or production
OVERLEDGER_BASE_URL=https://api.sandbox.overledger.io
OVERLEDGER_OAUTH_URL=https://api.sandbox.overledger.io/oauth/token
OVERLEDGER_CLIENT_ID=xxx
OVERLEDGER_CLIENT_SECRET=xxx
OVERLEDGER_TIMEOUT=20             # optional, seconds
OVERLEDGER_CACHE_PREFIX=overledger:
OVERLEDGER_TOKEN_LEEWAY_SECONDS=120
# Optional: comma-separated allowlist of networks
# OVERLEDGER_ALLOWED_NETWORKS=eth-sepolia,polygon-amoy,xrpl-testnet
```

## Surface area

* `GET /API/Overledger/health`
* `GET /API/Overledger/networks`
* `GET /API/Overledger/balance?network=...&address=...&asset=...`
* `POST /API/Overledger/tx/prepare`
* `POST /API/Overledger/tx/submit`

Each response follows `{ success, data, error, meta }` and includes a `request_id` correlation id.

## Library responsibilities

`app/Libraries/Overledger/MyMIOverledger.php`:

* OAuth2 client credentials → caches token in Redis when available, file cache fallback.
* Token refreshes early when `now + leeway >= expires_at`.
* HTTP wrapper with retries (2x) on `429/503`, auth refresh on `401/403`, masked logging.
* Read caches:
  * Supported networks: 300s TTL.
  * Balances: 60s TTL (key: `overledger_balance_{env}_{network}_{address_hash}_{asset_hash}`).
* Wrapper methods: `healthCheck`, `getSupportedNetworks`, `getBalance`, `prepareTransaction`, `submitTransaction`.

## Caching strategy

* **Access token**: cache entry stores `{token, expires_at}`. Refreshed when within `OVERLEDGER_TOKEN_LEEWAY_SECONDS` of expiry.
* **Read caches**:
  * Networks: 5 minutes.
  * Balances: 30–120 seconds (currently 60s).
* Write/submit responses are **not** cached.

## Routing and throttling

* Routes defined under `/API/Overledger/*` in `app/Config/Routes.php`.
* Controllers apply IP+user throttling (30 req/60s) and strict network allowlist from config (`OVERLEDGER_ALLOWED_NETWORKS`).
* Payloads limited to 32 KiB.

## Auditing and usage

Migrations create:

* `bf_overledger_audit`: action, request_id, payload hash, status, latency, error, user_id.
* `bf_overledger_usage_daily`: daily aggregates (calls, errors, average latency) keyed by date+environment+endpoint.

Each API call records both audit and usage rows.

## Token refresh lifecycle

1. Check cache; if token missing or expiring within leeway → refresh.
2. Refresh uses OAuth client credentials against `OVERLEDGER_OAUTH_URL`.
3. Cache token with `expires_in` TTL and computed `expires_at`.
4. If API call returns `401/403`, force a single refresh and retry once.

## Troubleshooting

* **401/403**: verify client id/secret, ensure clock skew is small; tokens auto-refresh but delete cache if needed.
* **429/503**: connector retries with exponential backoff; check `bf_overledger_usage_daily` for spikes.
* **5xx**: inspect Database/File logs (masked) via `DatabaseLoggerHandler`; ensure `OVERLEDGER_BASE_URL` is correct for sandbox vs prod.
* **Timeouts**: raise `OVERLEDGER_TIMEOUT` cautiously; confirm network access to Quant endpoints.
* **Cache issues**: Redis preferred; falls back to file cache if Redis unavailable.
* **Unsupported network**: update `OVERLEDGER_ALLOWED_NETWORKS` to include new chains after contract review.

## Sandbox vs production

* `OVERLEDGER_ENV` and `OVERLEDGER_BASE_URL`/`OVERLEDGER_OAUTH_URL` must match (sandbox vs prod tenant/region).
* Keep secrets isolated per environment; never log raw tokens.
* Validate production connectivity via `php spark overledger:health` after rotating credentials.

## CLI smoke commands

* `php spark overledger:health`
* `php spark overledger:balance --network=eth-sepolia --address=0x... [--asset=...]`

Both commands emit the correlation id to cross-reference audit tables and logs.

## References

* Quant Developer Hub / Overledger onboarding & OAuth2 documentation (per tenant/region).
