# API Integration Inventory (MyMIWallet → TBI CI4 Core)

## Scope
Inventory generated from CI4 app folders (`app/Config`, `app/Services`, `app/Libraries`, `app/Commands`) focusing on transport/auth/retry/caching infrastructure and provider-specific adapters.

## Provider Summary

| Provider | Classification | Notes |
|---|---|---|
| AlphaVantage | NEEDS_REFACTOR | Core HTTP calls exist but mixed with investment pipeline logic and fallback orchestration. |
| MarketAux | NEEDS_REFACTOR | API calls are embedded in alerts/marketing domain classes. |
| CoinGecko | NEEDS_REFACTOR | Used as fallback inside Solana/marketing business services. |
| Discord | CORE_REUSABLE | Mostly webhook transport; message composition is domain-specific. |
| Zapier | CORE_REUSABLE | Webhook forwarding is portable, payload composition is vertical-specific. |
| IMAP | NEEDS_REFACTOR | Shared mailbox transport exists but currently tied to alert parsing/business workflows. |
| Twilio | VERTICAL_ONLY | Current usage is tied to SMS marketing flow and campaign-specific processing. |

## Existing Cross-Cutting Patterns Found
- `Services::curlrequest()` wrappers are repeatedly used in services/libraries.
- Local resilience utilities already exist (`app/Libraries/Resilience/HttpClient.php`, `CircuitBreaker.php`) and can seed Core middleware.
- Feature-like toggles exist in mixed config files (`Config/MyMI.php`, `Config/Discord.php`) but not centralized under integration feature flags.

## Spark/Cron Touchpoints
- Spark command registry is explicit in `app/Config/Console.php`.
- Integration flows are also invoked by route-based cron endpoints in `app/Config/Routes.php` (Marketing/Alerts/Predictions routes).

## Environment Key Sprawl
- Mixed naming conventions found (`ALPHA_VANTAGE_API_KEY`, `ALPHA_VANTAGE_KEY`, `ALPHAVANTAGE_API_KEY`).
- Provider keys appear across multiple config classes and service classes.
- IMAP credentials appear in both generic and alerts-prefixed keys.

## Output Artifacts
- Machine-readable inventory: `docs/_infrastructure/api-inventory.json`
- Migration plan/report: `docs/_infrastructure/integration-migration-report.md`
