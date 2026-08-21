# MYMI-NEWS-LIVE-001C/C3 — Durable News Persistence Certification & Hardening

## Objective

Certify and harden the existing MyMI market-feed persistence layer
without replacing the existing ledger or expanding into scheduling,
distribution, or production activation.

## Existing Components To Preserve

- `bf_marketing_market_sources`
- `bf_marketing_market_feed_items`
- `MarketFeedNormalizerService`
- `MarketFeedRepositoryService`
- deterministic `identity_sha256`
- deterministic `payload_sha256`
- persistence disabled by default

## Required Implementation

1. Preserve the existing ledger and extend it additively.
2. Keep `identity_sha256` as the authoritative unique item identity.
3. Make duplicate-key races concurrency-safe and idempotent.
4. Add first-class nullable relevance/sentiment durability where required.
5. Keep detailed provider/topic/ticker metadata in deterministic normalized JSON.
6. Persist only sanitized/allowlisted metadata.
7. Never persist provider credentials, API keys, sensitive headers, or secret URLs.
8. Make a governed persistence batch transactional.
9. Roll back the batch on persistence failure.
10. Do not implement hidden retry/backoff in C3.
11. Preserve existing history; no destructive retention action.
12. Add bounded ingest-run provenance and result evidence.
13. Any schema extension must use a new forward-only additive migration.
14. Do not modify the already-merged market-feed ledger migration in place.
15. Add deterministic unit and non-production DB-backed certification.

## Required Tests

- persistence disabled by default
- new item insert
- second identical ingestion is unchanged
- changed payload updates existing identity
- external item identity
- canonical URL fallback identity
- duplicate-key concurrency reconciliation
- transactional rollback
- sentiment/relevance persistence
- deterministic normalized metadata hashing
- metadata sanitation
- ingest-run provenance/accounting
- zero provider-network requests during certification
- no scheduler/distribution activation

## Acceptance

- C3_EXISTING_LEDGER_REUSED=PASS
- C3_FORWARD_ONLY_SCHEMA_EXTENSION=PASS
- C3_IDEMPOTENCY=PASS
- C3_CONCURRENT_DUPLICATE_HANDLING=PASS
- C3_BATCH_TRANSACTION_ROLLBACK=PASS
- C3_SENTIMENT_RELEVANCE_DURABILITY=PASS
- C3_METADATA_SANITATION=PASS
- C3_PROVENANCE_AUDIT=PASS
- C3_NO_HIDDEN_RETRY=PASS
- C3_NO_PROVIDER_NETWORK=PASS
- C3_NONPROD_DB_CERTIFICATION=PASS
- C3_PERSISTENCE_DEFAULT_DISABLED=PASS
- C3_SCHEDULER_NOT_ACTIVATED=PASS
- C3_DISTRIBUTION_NOT_ACTIVATED=PASS
- C3_PRODUCTION_UNCHANGED=PASS

## Ollama Execution Requirement

Every substantial TBI Ollama reasoning, code-generation, review,
diagnostic, and certification operation in this lane must use governed
streaming execution with live progress telemetry.

## Out Of Scope

- Alpha Vantage live requests
- scheduler/cron activation
- Discord/public distribution
- production migration
- production deployment
- production configuration mutation
- branch deletion
- worktree deletion

## C3 Implementation Certification

- C3_EXISTING_LEDGER_REUSED=PASS
- C3_FORWARD_ONLY_SCHEMA_EXTENSION=PASS
- C3_IDEMPOTENCY=PASS
- C3_CONCURRENT_DUPLICATE_HANDLING=PASS
- C3_BATCH_TRANSACTION_ROLLBACK=PASS
- C3_SENTIMENT_RELEVANCE_DURABILITY=PASS
- C3_METADATA_SANITATION=PASS
- C3_PROVENANCE_AUDIT=PASS
- C3_NO_HIDDEN_RETRY=PASS
- C3_NO_PROVIDER_NETWORK=PASS
- C3_NONPROD_DB_CERTIFICATION=PASS
- C3_PERSISTENCE_DEFAULT_DISABLED=PASS
- C3_SCHEDULER_NOT_ACTIVATED=PASS
- C3_DISTRIBUTION_NOT_ACTIVATED=PASS
- C3_PRODUCTION_UNCHANGED=PASS

Certification environment:
- PHPUnit bootstrap=tests/_support/bootstrap.php
- database=isolated SQLite in-memory
- DBPrefix=empty because ledger table names explicitly include bf_
- Alpha Vantage requests=0
- provider network requests=0
- production database access=0
- production mutations=0
- evidence=/tmp/MYMI-NEWS-LIVE-001C-C3-FINAL-CERT-20260818-141259
