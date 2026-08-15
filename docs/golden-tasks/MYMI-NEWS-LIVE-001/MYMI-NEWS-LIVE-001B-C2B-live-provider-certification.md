# MYMI-NEWS-LIVE-001B/C2B — Live Provider Certification

## Objective

Certify the existing bounded Alpha Vantage NEWS_SENTIMENT transport with
exactly one explicitly approved live request without deployment,
persistence, scheduling, retries, Discord, Zapier, or public exposure.

## Safety gates

- market feed enabled only inside the certification process environment
- live network enabled only inside the certification process environment
- Alpha Vantage enabled only inside the certification process environment
- `alpha_vantage_live_dry_run_enabled` required
- persistence remains disabled
- retry attempts remain zero
- API key is transient
- transport permits exactly one request
- certification command is not AIOps-runnable
- provider-controlled text never appears in safe exception reasons

## Provider-level classification

- `Error Message` => `provider_error`
- throttle/rate-limit `Note` or `Information` => `rate_limited`
- other `Note` or `Information` => `provider_error`
- malformed JSON => `malformed_provider_response`

## Live request accounting

- `REQUEST_COUNT=0`: authorization not consumed
- `REQUEST_COUNT=1`: authorization consumed; never run a second request
- `REQUEST_COUNT>1`: certification failure

## Validation

- PHP syntax checks
- market-feed audit
- provider client unit tests
- one-shot transport unit tests
- command registration
- side-effect scan
- TBI Ollama review
- git diff --check

## Production

No deployment or production mutation is part of C2B.
