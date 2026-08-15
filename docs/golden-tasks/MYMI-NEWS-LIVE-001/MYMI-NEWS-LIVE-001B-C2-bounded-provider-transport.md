# MYMI-NEWS-LIVE-001B/C2 — Bounded Provider Transport

## Status

Approved for implementation.

## Approved baseline

- Repository: `MillennialInvestments/MyMIWallet-Next`
- Base commit: `074deb6c6c8da9c0dc0b556b44d3d6952b9d4b1a`
- Branch:
  `feature/mymi-news-live-001-c2-bounded-provider-transport`
- Parent checkpoint: PR #605
- Production deployment: not authorized

## Objective

Introduce a deterministic, testable, bounded HTTPS transport for the
Alpha Vantage NEWS_SENTIMENT provider while keeping every live-network
capability disabled by default.

This checkpoint must not perform a real provider request during
implementation or deterministic validation.

## Atomic implementation slices

### C2A — deterministic bounded transport

C2A may implement:

1. A bounded HTTP request and response contract.
2. A transport interface that can be replaced with a fake in unit tests.
3. A public-IPv4 resolver contract.
4. A resolver that rejects private, reserved, loopback, link-local,
   multicast, unspecified, and otherwise non-public addresses.
5. A cURL-backed HTTPS transport with:
   - TLS peer verification;
   - TLS hostname verification;
   - HTTPS-only protocol restrictions;
   - redirects disabled;
   - DNS resolution followed by connection pinning;
   - bounded connection timeout;
   - bounded total timeout;
   - bounded response size;
   - deterministic error codes;
   - no secret-bearing exception text.
6. An Alpha Vantage NEWS_SENTIMENT client using a fixed provider
   endpoint and fixed provider hostname.
7. Disabled configuration gates and bounded numeric defaults.
8. Unit tests using fake transport and deterministic resolver behavior.
9. Registry and audit updates needed to describe the bounded but
   disabled provider capability.

### C2B — explicitly approved live dry-run

C2B remains blocked until C2A is merged and a separate approval is
issued.

C2B may later introduce a command that performs a live provider request
only when all of the following are true:

- the market-feed feature flag is enabled;
- live networking is enabled;
- the Alpha Vantage provider gate is enabled;
- a separate live-dry-run gate is enabled;
- a bounded approval token is supplied;
- the API key is available from the environment;
- no persistence or distribution path is invoked.

## Configuration contract

The implementation may introduce these configuration inputs:

- `MARKETING_MARKET_FEED_ALPHA_VANTAGE_ENABLED`
  - type: boolean
  - default: `false`
- `MARKETING_MARKET_FEED_ALPHA_VANTAGE_API_KEY`
  - type: string
  - default: empty
  - must never be printed, logged, committed, or included in an error
- `MARKETING_MARKET_FEED_ALPHA_VANTAGE_CONNECT_TIMEOUT_MS`
  - type: integer
  - default: `3000`
  - minimum: `250`
  - maximum: `10000`
- `MARKETING_MARKET_FEED_ALPHA_VANTAGE_TIMEOUT_MS`
  - type: integer
  - default: `10000`
  - minimum: `1000`
  - maximum: `30000`
- `MARKETING_MARKET_FEED_ALPHA_VANTAGE_MAX_RESPONSE_BYTES`
  - type: integer
  - default: `1048576`
  - minimum: `4096`
  - maximum: `4194304`
- `MARKETING_MARKET_FEED_ALPHA_VANTAGE_RETRY_ATTEMPTS`
  - type: integer
  - default: `0`
  - C2A must not retry
  - maximum accepted configuration value: `1`

No provider endpoint or hostname may be supplied through configuration,
CLI input, request input, or user-controlled data.

## Fixed provider policy

The client must use only:

- scheme: `https`
- host: `www.alphavantage.co`
- port: `443`
- path: `/query`
- function: `NEWS_SENTIMENT`

The implementation must reject:

- alternate schemes;
- alternate hosts;
- explicit credentials in a URL;
- fragments;
- non-443 ports;
- redirects;
- private or reserved resolution results;
- missing public IPv4 resolution;
- oversized bodies;
- timeouts;
- malformed transport responses.

## DNS and SSRF policy

The provider hostname must be resolved before the cURL request.

All resolved addresses must be checked. The request must fail closed if
any selected address is not a public IPv4 address.

The selected public address must be pinned to the fixed provider
hostname and port using the cURL resolve mechanism. The TLS request must
retain the original hostname so certificate verification remains
effective.

No arbitrary URL fetch method may be exposed through a Spark command.

## Error taxonomy

Errors must use stable non-secret-bearing reason codes, including:

- `provider_disabled`
- `live_network_disabled`
- `missing_api_key`
- `invalid_provider_endpoint`
- `dns_resolution_failed`
- `non_public_provider_address`
- `transport_initialization_failed`
- `transport_timeout`
- `response_too_large`
- `redirect_rejected`
- `rate_limited`
- `upstream_unavailable`
- `unexpected_http_status`
- `empty_response`
- `malformed_provider_response`

Messages must not contain the API key or full query string.

## Test matrix

Deterministic tests must cover:

1. Successful fake NEWS_SENTIMENT response.
2. Provider gate disabled.
3. Global live-network gate disabled.
4. Missing API key.
5. Fixed endpoint construction.
6. API key absence from exceptions.
7. Public IPv4 acceptance.
8. Private IPv4 rejection.
9. Reserved IPv4 rejection.
10. DNS resolution failure.
11. Redirect rejection.
12. Timeout classification.
13. Oversized response classification.
14. HTTP 429 classification.
15. HTTP 5xx classification.
16. Unexpected non-2xx classification.
17. Empty response rejection.
18. Malformed JSON rejection.
19. Retry count remains zero during C2A.
20. Existing fixture-only dry-run behavior remains unchanged.

No deterministic test may contact Alpha Vantage or any external host.

## Expected source scope

The implementation may modify:

- `app/Config/MarketingMarketFeed.php`
- `app/Commands/Marketing/MarketFeed/Audit.php`
- `app/Services/Marketing/MarketFeed/MarketFeedSourceRegistryService.php`

The implementation may add files under:

- `app/Services/Marketing/MarketFeed/Transport/`
- `app/Services/Marketing/MarketFeed/Provider/`
- `tests/unit/Marketing/MarketFeed/Transport/`
- `tests/unit/Marketing/MarketFeed/Provider/`

The implementation must not modify:

- production releases;
- `.env`;
- `vendor`;
- `writable`;
- database migrations;
- scheduler configuration;
- persistence services;
- Discord services;
- deployment configuration.

## Validation

Required validation includes:

- PHP syntax checks for every affected PHP file;
- command governance audit;
- Spark command lint;
- market-feed audit;
- market-feed health;
- fixture-only Federal Reserve dry-run;
- fixture-only Alpha Vantage dry-run;
- focused C2 unit tests;
- full unit test suite where available;
- PSR-4 validation;
- `git diff --check`;
- committed-path safety scan;
- credential-value scan;
- GitHub Actions.

## Rollback

Before merge, rollback is removal of the C2 branch changes.

After merge, rollback must be a governed forward fix or revert pull
request. Production rollback is not authorized.

## Non-production guarantee

C2A does not authorize:

- a real Alpha Vantage request;
- API-key entry;
- persistence;
- scheduling;
- Discord delivery;
- public publication;
- deployment;
- production mutation.
