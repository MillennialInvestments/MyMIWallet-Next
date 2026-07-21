# GT-NH-007A: Market Feed Source Registry and Ledger Validation

## Purpose
- Disabled-by-default market-feed source registry and ledger.
- Deterministic fixture-only Federal Reserve RSS ingestion.

## Generated Scope
- Configuration
- Forward-only migration
- Two models
- Source registry
- Normalizer
- Repository gate
- Fixture adapter
- Read-only Spark commands
- Deterministic RSS fixture
- Unit tests
- Architecture, schema, and validation documentation

## Containment
- Live HTTP disabled by default.
- Persistence disabled by default.
- No cron.
- No queues.
- No email.
- No Zapier.
- No publication.
- No market claims.
- No production mutation.

## Validation Commands
- PHP lint for generated PHP files.
- PHPUnit market-feed tests.
- php spark marketing:market-feed:audit.
- php spark marketing:market-feed:health.
- php spark marketing:market-feed:sources.
- php spark marketing:market-feed:collect-dry-run.
- git diff --check.
