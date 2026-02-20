# Integration Migration Report

## What moved to Core
Created an extraction-ready baseline at `infrastructure/tbi-ci4-core` with:

- Core contracts:
  - `app/Integrations/Contracts/ProviderInterface.php`
  - `app/Integrations/Contracts/HealthcheckInterface.php`
  - `app/Integrations/Contracts/RateLimitInterface.php`
- Core HTTP infrastructure:
  - `app/Integrations/Http/HttpClientFactory.php`
  - `app/Integrations/Http/RetryMiddleware.php`
  - `app/Integrations/Http/CircuitBreaker.php`
- Provider adapters (dumb clients):
  - AlphaVantage, MarketAux, Discord, Zapier, IMAP, Twilio
- Shared services:
  - `IntegrationRegistry`, `RateLimiter`, `CacheService`, `Secrets`
- Config layer:
  - `app/Config/Features.php`
  - `app/Config/Integrations.php`
- Operational commands:
  - `infra:api-inventory`
  - `infra:integration-health`
- Secrets normalization template:
  - `.env.template`

## What stayed vertical and why
- Alert parsing workflows, symbol enrichment, and notification sequencing remain in vertical classes such as `MyMIAlerts`, `MyMIMarketing`, and related controllers/services.
- Market sentiment/content generation remains vertical because it bundles domain-specific scoring and publication rules.
- Forecasting pipelines remain vertical because provider calls are interleaved with strategy and portfolio logic.

## Needs-refactor components
1. **AlphaVantage**
   - Split pure HTTP response normalization from alert/forecast enrichment.
2. **MarketAux**
   - Move request-building + paging into adapter and keep “which news matters” in vertical modules.
3. **IMAP scanners**
   - Keep mailbox fetch in adapter and move email interpretation to vertical processors.
4. **CoinGecko fallback paths**
   - Isolate fallback transport from Solana/business service logic.

## Follow-up tasks
1. Replace direct `Services::curlrequest()` calls in vertical classes with registry-backed provider clients.
2. Move hardcoded provider defaults to `Config/Integrations.php` + `.env` values only.
3. Add `infra:secrets-scan` and `infra:provider-drift` commands to support AIOps governance.
4. Add provider-specific unit tests for response normalization and rate-limit behavior.
5. Add CI check to block new hardcoded secrets and enforce `INTEGRATION_*` key naming.
