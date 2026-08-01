# MYMI-NEWS-LIVE-001B-C1 — Alpha Vantage Transport and Adapter

## Objective

Implement the first atomic source slice for the MyMI Market Pulse pilot.

Extend the merged GT-NH-007A market-feed foundation with:

1. a common market-feed adapter interface;
2. a bounded HTTP transport;
3. an Alpha Vantage NEWS_SENTIMENT adapter;
4. deterministic Alpha Vantage fixture parsing;
5. source registration;
6. fixture-only and live dry-run collection;
7. unit and command smoke coverage.

This task does not implement persistence, digest generation, approval,
Discord delivery, scheduling, migration changes, or production enablement.

## Existing source to extend

- `app/Config/MarketingMarketFeed.php`
- `app/Services/Marketing/MarketFeed/MarketFeedSourceRegistryService.php`
- `app/Services/Marketing/MarketFeed/MarketFeedNormalizerService.php`
- `app/Services/Marketing/MarketFeed/MarketFeedRepositoryService.php`
- `app/Services/Marketing/MarketFeed/FederalReserveRssFixtureAdapter.php`
- `app/Commands/Marketing/MarketFeed/Audit.php`
- `app/Commands/Marketing/MarketFeed/Health.php`
- `app/Commands/Marketing/MarketFeed/Sources.php`
- `app/Commands/Marketing/MarketFeed/CollectDryRun.php`
- `tests/unit/Marketing/MarketFeed/`
- `tests/Fixtures/Marketing/MarketFeed/`

Do not duplicate those capabilities.

## Expected implementation surface

Confirm names against existing conventions before creating files.

Candidate additions:

- `app/Services/Marketing/MarketFeed/MarketFeedAdapterInterface.php`
- `app/Services/Marketing/MarketFeed/BoundedMarketFeedHttpClient.php`
- `app/Services/Marketing/MarketFeed/AlphaVantageNewsSentimentAdapter.php`
- `tests/Fixtures/Marketing/MarketFeed/alpha-vantage-news-sentiment.json`
- `tests/unit/Marketing/MarketFeed/AlphaVantageNewsSentimentAdapterTest.php`
- `tests/unit/Marketing/MarketFeed/BoundedMarketFeedHttpClientTest.php`

Candidate modifications:

- `app/Config/MarketingMarketFeed.php`
- `app/Services/Marketing/MarketFeed/MarketFeedSourceRegistryService.php`
- `app/Commands/Marketing/MarketFeed/CollectDryRun.php`
- `.env.example`
- architecture and validation documentation.

## Configuration contract

All new behavior remains disabled by default.

Required configuration includes:

- global collection enabled;
- live network enabled;
- Alpha Vantage source enabled;
- Alpha Vantage API key;
- request timeout;
- connection timeout;
- maximum response bytes;
- maximum result count;
- per-minute quota;
- daily quota;
- topic list;
- optional ticker list.

Read the API key only from the environment.

Never:

- log the key;
- print the key;
- include the key in an exception;
- include the key in a URL stored in evidence;
- commit the key;
- copy the key into `.env.example`.

## Transport contract

The transport must enforce:

- HTTPS for Alpha Vantage;
- TLS certificate verification;
- bounded connect and response timeouts;
- bounded response size;
- bounded redirects;
- JSON content-type validation;
- private, loopback and link-local address rejection;
- deterministic HTTP error classification;
- bounded retries for transient failures;
- identifiable MyMI Wallet User-Agent.

## Adapter contract

Use Alpha Vantage function:

`NEWS_SENTIMENT`

Normalize each item to the existing market-feed contract using:

- external item identity;
- title;
- provider summary;
- canonical URL;
- publication timestamp;
- source;
- authors;
- tickers;
- topics;
- relevance score;
- sentiment score;
- sentiment label;
- provider metadata.

Do not store or reproduce full article bodies.

## Command behavior

Prefer extending the existing dry-run command rather than creating a duplicate
collection surface.

Required invocation capability:

- fixture-only Alpha Vantage parsing;
- `--source=alpha_vantage_news`;
- `--dry-run`;
- optional live mode only when every required gate is enabled;
- no persistence for this checkpoint;
- deterministic key/value output;
- non-zero result on provider, transport or parsing failure.

Commands must follow the repository’s `SafeBaseCommand` and `parseParams()`
contract when that is the existing command standard.

## Deterministic validation

Required tests:

- valid Alpha Vantage fixture;
- missing feed array;
- malformed JSON;
- malformed URL;
- unsupported URL protocol;
- missing API key;
- source disabled;
- global collection disabled;
- live network disabled;
- timeout;
- HTTP 429;
- HTTP 500;
- oversized response;
- duplicate articles;
- timestamp normalization;
- ticker and topic normalization;
- canonical identity stability;
- no credential disclosure.

No automated test may require live network access.

## Live validation

One explicitly invoked live dry-run may call Alpha Vantage after deterministic
tests pass.

The live validation must:

- use the existing environment key;
- not display the key;
- not persist records;
- not schedule future execution;
- not dispatch content;
- capture only redacted request metadata and normalized result counts.

## Acceptance

This checkpoint is complete when:

- deterministic tests pass;
- audit, health and source commands pass;
- Alpha Vantage appears as disabled by default;
- fixture collection returns normalized records;
- live dry-run returns normalized records;
- no key appears in Git, logs or evidence;
- no migration is changed;
- no data is persisted;
- no distribution occurs;
- `git diff --check` passes.
