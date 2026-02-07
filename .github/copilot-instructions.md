# Copilot Instructions

## Overview
MyMI Wallet is a CodeIgniter 4 application for budgeting, investing workflows, market/news ingestion, and operational automation. Prefer additive, low-risk changes that preserve production behavior and provide explicit rollback paths.

## Architecture
- Application code lives primarily under `app/` with command orchestration in `app/Commands` and service orchestration in `app/Services`.
- Modular API and user features are under `app/Modules`.
- Database schema changes must use CI4 migrations in `app/Database/Migrations`.
- AI-Ops reports and generated operational artifacts are written under `docs/_aiops` and `docs/aiops/artifacts`.

## Developer Workflows
- Validate Spark command behavior before and after changes (`php spark <command>`).
- Prefer idempotent migrations and defensive schema guards (`tableExists`, `fieldExists`).
- Keep command safety conventions: destructive commands require `--approve`; read-only commands should be safe by default.
- Update documentation for every operationally significant behavior change.

## Project-Specific Conventions
- Spark commands extend `App\Commands\SafeBaseCommand` unless explicitly documented otherwise.
- Commands should define `$name`, `$group`, and `$description` metadata.
- Use CI4 services/models rather than ad-hoc raw SQL where feasible.
- Preserve generated-doc markers in `docs/_aiops/*` and avoid deleting manual todo blocks.

## Integration Points
- External data providers include market/news and alert integrations used by forecasting and scraper pipelines.
- Notification and automation touchpoints include Discord/email and scheduler-driven Spark commands.
- Database documentation and drift tooling are managed through `db:*` commands and docs in `docs/mysql`.

## Communication Patterns
- Report changes in terms of observed runtime evidence (logs/artifacts), not hypotheticals.
- Call out what is fixed now vs deferred, with risks and follow-up actions.
- Keep PR notes concise, test-backed, and operationally actionable.
