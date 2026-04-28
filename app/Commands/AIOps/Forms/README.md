# Forms Spark Commands

## Overview

This README documents Spark commands under `app/Commands/AIOps/Forms` and their operational dependencies.

## Operational Purpose

Provide operators and developers with command intent, dependencies, workflows, and recovery guidance.

## Command Inventory


Indirect/supporting commands:
- `ops:doctor:full`
- `logs:summarize`

## Command Reference

## Dependencies

| Relationship | Target | Type |
|---|---|---|

## Command Dependency Graph

```mermaid
graph TD
Forms["Forms Pipeline"]
```

## Execution Workflows

- `php spark ops:doctor:full`
- `php spark logs:summarize`

## Operational Playbooks

**Investigate Application Failure**

- `php spark logs:doctor`
- `php spark ops:php:fpm:health`
- `php spark ops:server:nginx:status`
- `php spark spark:diagnose-503`

**Diagnose Database Issue**

- `php spark db:inventory`
- `php spark db:drift`
- `php spark aiops:sql:check`

## Troubleshooting

- Common failure: command not found in registry.
- Diagnostics: `php spark ops:commands:audit`, `php spark ops:commands:missing`.
- Recovery: repair namespace/PSR-4 and rerun command audit tools.

## Related Commands

- `logs:summarize`
- `ops:doctor:full`

## Console Registry Verification

- Console registry is auto-discovered in CI4; explicit `$commands` entries in `app/Config/Console.php` should be added for any commands that fail `ops:commands:missing`.

## Added Mode: `aiops:form:test --scan-all`

Purpose:
- End-to-end form debugging workflow with optional seeding preparation.

Example usage:
- `php spark aiops:form:test --scan-all --dry-run`
- `php spark aiops:form:test --scan-all --seeder=OpsJobsSeeder --dry-run`
- `php spark aiops:form:test --scan-all --seeder=OpsJobsSeeder --submit --allow-destructive --approve`

Behavior:
- Dry-run by default in scan-all mode.
- Seeder execution is skipped in dry-run.
- Live submissions require explicit opt-in and approval flags.
- Writes reports to `docs/_aiops/form-tests` and `writable/aiops/form-tests`.
