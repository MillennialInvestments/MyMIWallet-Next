# External API Cost Controls

- Implemented centralized guard service: `App\Services\ExternalApiGuard`.
- Config source: `app/Config/ExternalApiPolicy.php`.
- Provider hard caps now defined for:
  - alphavantage
  - marketaux
  - plaid
  - robinhood
  - discord
  - llm
- Enforced behavior:
  - per-process request counter by provider
  - if count exceeds cap => critical log + graceful caller abort (`allow()` returns false)
  - optional micro-sleep backoff via policy (`enableBackoff`, `microSleepBackoffUs`)

## Integration readiness
- Injectable globally through `Config\Services::externalApiGuard()`.
- No route/controller contract changes required for adoption.

## Result
- **PASS** for GAP-003 launch criterion (hard cap policy now centralized and enforceable).
