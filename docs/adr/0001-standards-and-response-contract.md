# ADR 0001: Standards, Logging, and API Response Contract

## Status
Accepted

## Context
The initial stability hardening pass targets shared infrastructure and the Management/Marketing modules. We need clear defaults for coding standards, logging behaviour, and API response structure before expanding the migration to other modules.

## Decision
- Adopt PHP 8.2 and CodeIgniter 4 as the supported stack, enforcing PSR-12 via php-cs-fixer and static analysis with PHPStan/Psalm.
- Use a unified logger pipeline that writes to both the file handler and the existing database handler, enriching entries with request context.
- Standardise API responses through `App\Support\Http`, ensuring `{status: 'success'|'error', data|message}` across controllers.
- Place new API routes for back-office modules under `/API/{Module}/...` and expose health diagnostics under `/system/*`.
- Apply a strangler migration approach, moving functionality module-by-module onto the hardened standards.

## Consequences
- Tooling configuration now lives in the repository, enabling consistent formatting and static analysis in CI.
- Downstream consumers can rely on consistent JSON envelopes, making it easier to add smoke and contract tests.
- The logging handler can correlate file/database entries using shared request IDs and metrics.
- Future modules will follow the same routing conventions, easing documentation and cross-service integrations.
