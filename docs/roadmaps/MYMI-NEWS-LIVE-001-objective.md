# MYMI-NEWS-LIVE-001 — Multi-Source News Automation

- Original objective captured: 2026-07-27 02:29:02 UTC
- Repository: /apps/TBI/repos/mymiwallet-next
- Worktree: /apps/TBI/worktrees/mymi-news-live-001-multi-source-news-automation
- Branch: feature/mymi-news-live-001-multi-source-news-automation
- Base commit: 9ef526b9c0a94089e561df1655ed6335f4ae3429
- Production: /apps/TBI/www/mymiwallet/current
- Production mutation authorized: no

## Objective

MYMI-NEWS-LIVE-001 — Complete and deploy MyMI Wallet multi-source news automation.

Repository:
MillennialInvestments/MyMIWallet-Next.git

Canonical repository:
 /apps/TBI/repos/mymiwallet-next

Production:
 /apps/TBI/www/mymiwallet/current

Merged dependency:
PR #604 / GT-NH-007A market-feed registry and ledger foundation.

Use current origin/main as the base.

Do not implement from main, production, ~/TBI-Prod, or any deployment directory.
Create one exact feature branch and feature worktree.
Do not delete files.
Do not rollback production.
Do not mutate production until separately approved.

Objective:
Turn the disabled fixture-only market-feed foundation into a production-ready, scheduled, multi-source financial-news collector.

Required free sources:

1. Federal Reserve RSS
   - press releases
   - monetary policy
   - banking and regulatory releases

2. SEC RSS and Atom feeds
   - press releases
   - litigation
   - investor alerts
   - rulemaking

3. U.S. Treasury RSS
   - press releases
   - statements
   - sanctions and financial actions when available

4. Bureau of Labor Statistics public API or RSS
   - CPI
   - employment
   - PPI
   - labor-market releases

5. Bureau of Economic Analysis API or RSS
   - GDP
   - personal income
   - consumer spending
   - economic releases

6. Alpha Vantage NEWS_SENTIMENT
   - optional API-key source
   - disabled automatically when no key exists
   - strict free-tier throttling

7. Finnhub general and company news
   - optional API-key source
   - disabled automatically when no key exists
   - strict free-tier throttling

8. GNews or NewsAPI
   - optional provider only
   - disabled automatically without a key
   - do not make it a required source

9. Curated no-key RSS sources
   - Reuters business or markets feeds only when publicly fetchable
   - Yahoo Finance RSS only when publicly fetchable
   - Nasdaq RSS only when publicly fetchable
   - MarketWatch RSS only when publicly fetchable
   - skip any source whose terms or technical controls prohibit collection

Architecture requirements:

- Preserve the merged MarketingMarketFeed config, source registry, normalizer, repository service, models and ledger.
- Add a common MarketFeedAdapterInterface.
- Add separate RSS, Atom and JSON adapter implementations.
- Add a bounded HTTP client with:
  - connect timeout
  - response timeout
  - maximum response bytes
  - redirect limit
  - accepted content types
  - identifiable User-Agent
  - retry with bounded exponential backoff
  - no TLS verification bypass
  - no private-address or localhost requests
  - SSRF protection
- Registry-driven source configuration.
- Environment-based API keys.
- No API keys committed to Git.
- Per-source enabled flags.
- Global collection, network and persistence gates.
- Source-specific request interval and daily request limits.
- Database-backed fetch ledger.
- ETag and Last-Modified conditional requests.
- Store HTTP status, fetched time, duration and error reason.
- SHA-256 canonical identity deduplication.
- Normalize titles, descriptions, authors, symbols, categories, publication timestamps and canonical URLs.
- Reject malformed URLs and unsupported protocols.
- Sanitize HTML before storage or display.
- Do not store full copyrighted article bodies.
- Store headline, short provider-supplied summary, metadata and canonical link.
- Preserve source attribution.
- Add deterministic classification for:
  monetary-policy,
  economy,
  inflation,
  employment,
  markets,
  stocks,
  crypto,
  banking,
  regulation,
  personal-finance,
  retirement,
  housing,
  technology,
  business.
- Add optional ticker-symbol extraction without inventing symbols.
- Add collection locking so overlapping cron executions cannot run.
- Add bounded batch sizes.
- Add retention and stale-item policy without deleting production data automatically.
- Add report-only cleanup command.
- Add collect command.
- Add collect --source command.
- Add collect --dry-run command.
- Add health command.
- Add status command.
- Add sources command.
- Add retry-failures command.
- Add report command.
- All Spark commands must extend SafeBaseCommand, call parseParams(), and be AIOps governed.
- Commands must emit deterministic key=value output and non-zero exit codes on failure.
- Add tests for:
  RSS,
  Atom,
  JSON,
  ETag 304,
  duplicate articles,
  changed article metadata,
  malformed payload,
  timeout,
  HTTP 429,
  HTTP 500,
  oversized response,
  SSRF rejection,
  source disabled,
  global disabled,
  persistence disabled,
  missing API key,
  locking,
  retry limits,
  request quotas,
  timestamp normalization,
  canonical URL normalization,
  HTML sanitization.
- Add deterministic local fixtures.
- No tests may require live network access.
- Add migration only when schema additions are required.
- Never edit an already-merged migration.
- Add CLI and deployment documentation.
- Add .env.example entries with all flags disabled by default.

Scheduler requirements:

Create a lock-safe Spark orchestration command suitable for cron:

php spark marketing:market-feed:collect --scheduled

Recommended cadence:
- government RSS feeds every 15 minutes
- API-key providers every 30 minutes
- no source more frequently than its configured rate limit

Do not edit system crontab during implementation.
Provide the exact cron entry as deployment documentation only.

Production release requirements:

- Use the existing immutable MyMI deployment pipeline.
- Migration must be forward-only.
- Back up database schema metadata before migration.
- Deploy a release directory.
- Run migration from the new release.
- Warm cache in the new release.
- Run localhost and public smoke tests.
- Switch current symlink only after validation.
- Do not rollback production.
- If deployment fails before symlink switch, abandon the candidate release.
- If post-switch validation fails, stop and report; do not automatically roll production backward.
- Record release SHA, release path, migration batch and smoke evidence.
- Schedule installation and environment enablement require explicit owner approval.

Feature rollout:

Stage 1:
- migration applied
- all flags disabled
- health and source commands pass

Stage 2:
- enable collection and live networking
- persistence remains disabled
- dry-run production fetch validation

Stage 3:
- enable persistence for government sources only

Stage 4:
- enable optional API-key sources one at a time

Stage 5:
- install scheduled execution after owner approval

Output a roadmap with atomic Golden Tasks, exact proposed branch, exact proposed worktree, affected paths, migrations, validation matrix, smoke tests, deployment steps and rollback notes.

Do not implement until roadmap approval.
