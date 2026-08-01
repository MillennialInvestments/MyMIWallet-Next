# MYMI-NEWS-LIVE-001 — Multi-Source News Automation Roadmap

## Objective

Convert the merged fixture-only market-feed foundation into a controlled,
production-ready financial-news collection and distribution system.

The first operational slice is an Alpha Vantage Market Pulse pilot that:

1. collects Alpha Vantage NEWS_SENTIMENT data;
2. normalizes and deduplicates provider records;
3. ranks relevant financial stories;
4. creates evidence-bound MyMI summaries;
5. requires controlled approval;
6. distributes first to a private Discord destination;
7. records delivery receipts and failures.

Production, persistence, scheduling, and public distribution remain disabled
until their individual activation gates are approved.

## Governed lane

- Repository: `/apps/TBI/repos/mymiwallet-next`
- Worktree: `/apps/TBI/worktrees/mymi-news-live-001-multi-source-news-automation`
- Branch: `feature/mymi-news-live-001-multi-source-news-automation`
- Production: `/apps/TBI/www/mymiwallet/current`
- Base dependency: PR #604 / GT-NH-007A
- Production mutation authorized: no

## Golden Tasks

### MYMI-NEWS-LIVE-001A — Baseline and Roadmap

- Preserve the merged registry, normalizer, models, repository service and ledger.
- Inventory current commands, services, migrations, tests and distribution adapters.
- Record affected paths and validation baseline.
- Confirm no implementation is performed from production or main.

### MYMI-NEWS-LIVE-001B — Safe Provider Transport

Build the shared provider transport layer.

Required scope:

- `MarketFeedAdapterInterface`
- bounded HTTP client;
- TLS verification required;
- SSRF and private-address rejection;
- connect and response timeouts;
- response-size limits;
- redirect limits;
- accepted content types;
- bounded exponential retry;
- deterministic provider errors;
- identifiable MyMI User-Agent.

All network and provider flags remain disabled by default.

### MYMI-NEWS-LIVE-001C — Alpha Vantage Market Pulse Adapter

Implement the paid Alpha Vantage source first.

Required behavior:

- use `NEWS_SENTIMENT`;
- environment-based API key;
- never log or commit the key;
- disabled automatically when the key is missing;
- configurable per-minute and daily quotas;
- topic and ticker request support;
- bounded result count;
- provider attribution;
- source URL preservation;
- dry-run mode;
- deterministic local fixture coverage.

Initial topic feeds:

- financial markets;
- monetary economy;
- fiscal economy;
- technology;
- blockchain.

Ticker requests must be separate from broad topic requests where appropriate.

### MYMI-NEWS-LIVE-001D — Normalization, Ranking and Dedupe

Normalize:

- headline;
- provider summary;
- source;
- authors;
- canonical URL;
- publication timestamp;
- tickers;
- topics;
- relevance score;
- sentiment score and label.

Required controls:

- SHA-256 canonical identity;
- canonical URL normalization;
- duplicate suppression;
- changed-metadata handling;
- HTML sanitization;
- malformed URL rejection;
- unsupported-protocol rejection;
- no full copyrighted article bodies.

Initial ranking model:

- provider relevance;
- recency;
- sentiment magnitude;
- MyMI strategic relevance.

### MYMI-NEWS-LIVE-001E — MyMI Market Pulse Content

Generate an approval-ready Market Pulse containing:

- Market Summary;
- What Happened;
- Why It Matters;
- What to Watch Next;
- MyMI Watchlist;
- source attribution;
- canonical article links;
- financial-information disclaimer.

Rules:

- maximum five primary stories per digest;
- summaries must remain grounded in collected evidence;
- no invented tickers, facts, prices or claims;
- retain source record IDs used to create each section;
- generated content begins in pending-review status.

### MYMI-NEWS-LIVE-001F — Approval and Distribution Bridge

Connect approved Market Pulse content to the existing marketing distribution
system.

Initial destination:

- private Discord only.

Later destinations:

- MyMI in-app;
- MyMI blog;
- public Discord;
- email;
- signed outbound webhook.

Required controls:

- no dispatch without approved or explicitly auto-approved status;
- per-target delivery receipts;
- retry limits;
- dead-letter status;
- duplicate-dispatch prevention;
- deterministic failure reporting;
- retraction/correction linkage.

### MYMI-NEWS-LIVE-001G — Government Sources

Add separately configured adapters for:

- Federal Reserve RSS;
- SEC RSS and Atom;
- U.S. Treasury RSS;
- BLS API or RSS;
- BEA API or RSS.

Each source receives an independent Golden Task implementation checkpoint,
fixture set, request policy and rollout gate.

### MYMI-NEWS-LIVE-001H — Fetch Ledger and Conditional Retrieval

Add or extend schema only when required.

Required behavior:

- source fetch ledger;
- ETag;
- Last-Modified;
- HTTP status;
- request duration;
- fetched timestamp;
- error classification;
- retry state;
- per-source quota state;
- lock ownership;
- stale-record reporting.

Never modify an already-merged migration.

### MYMI-NEWS-LIVE-001I — Spark Command Surface

Required commands:

- `marketing:market-feed:collect`
- `marketing:market-feed:collect --source`
- `marketing:market-feed:collect --dry-run`
- `marketing:market-feed:collect --scheduled`
- health;
- status;
- sources;
- retry-failures;
- report;
- report-only cleanup.

Commands must:

- extend `SafeBaseCommand`;
- call `parseParams()`;
- emit deterministic key/value output;
- return non-zero on failure;
- enforce global, network and persistence gates;
- use overlap locking and bounded batches.

### MYMI-NEWS-LIVE-001J — Test and Fixture Certification

Required deterministic tests:

- Alpha Vantage JSON fixture;
- RSS;
- Atom;
- ETag 304;
- duplicate records;
- changed metadata;
- malformed payload;
- timeout;
- HTTP 429;
- HTTP 500;
- oversized response;
- SSRF rejection;
- source disabled;
- global disabled;
- persistence disabled;
- missing API key;
- locking;
- retry limits;
- quotas;
- timestamp normalization;
- URL normalization;
- HTML sanitization;
- approval enforcement;
- duplicate distribution prevention;
- receipt and dead-letter behavior.

No automated tests may require live network access.

### MYMI-NEWS-LIVE-001K — Deployment and Activation

Use the immutable MyMI release pipeline.

Stage 1:

- deploy source and migration;
- all feature flags disabled;
- health and source commands pass.

Stage 2:

- enable networking;
- keep persistence disabled;
- perform production dry-run collection.

Stage 3:

- enable persistence for approved government sources.

Stage 4:

- enable Alpha Vantage independently;
- run private Discord pilot;
- reconcile delivery receipts.

Stage 5:

- install scheduled execution only after owner approval.

Required evidence:

- release SHA;
- release path;
- migration batch;
- environment flag state;
- localhost smoke;
- public smoke;
- collection report;
- distribution receipts;
- GTM score update.

## Expected affected paths

Confirm exact existing namespaces during implementation before creating files.

Likely areas:

- `app/Config/MarketingMarketFeed.php`
- `app/Services/Marketing/MarketFeed/`
- `app/Services/Marketing/Distribution/`
- `app/Commands/Marketing/`
- `app/Models/`
- `app/Database/Migrations/`
- `tests/`
- `docs/golden-tasks/`
- `docs/roadmaps/`
- `.env.example`

## First implementation checkpoint

The first implementation checkpoint is:

`MYMI-NEWS-LIVE-001B` through `MYMI-NEWS-LIVE-001F`

Acceptance outcome:

- Alpha Vantage fixture ingestion passes;
- live Alpha Vantage dry-run succeeds;
- normalized articles are produced;
- one Market Pulse draft is generated;
- approval is required;
- an approved digest reaches private Discord;
- a delivery receipt is recorded;
- persistence, scheduling and public distribution remain disabled.

## Rollback

Before merge:

- retain changes only in the feature worktree;
- restore reviewed source paths individually when necessary;
- do not delete evidence or unrelated files.

After merge:

- create a dedicated rollback branch and revert through a pull request.

Production:

- do not automatically roll production backward;
- disable source, collection, persistence and distribution flags;
- stop scheduled execution;
- preserve collection and delivery evidence;
- rotate provider credentials only when compromise is suspected.
