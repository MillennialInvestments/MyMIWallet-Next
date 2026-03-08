# Growth Spark Commands

## Overview

This README documents Spark commands under `app/Commands/Growth` and their operational dependencies.

## Operational Purpose

Provide operators and developers with command intent, dependencies, workflows, and recovery guidance.

## Command Inventory

- `growth:retention-watch` (Operational)

## Command Reference

### growth:retention-watch

**Purpose**  
Detect retention anomalies from engagement signals.

**Usage**  
`php spark growth:retention-watch`

**Options**  
`--emit`, `Output mode: docs (default: docs).`, `--out`, `Override artifact directory (must be inside docs/aiops/artifacts).`, `--dry-run`, `Generate a report without mutating state.`, `--approve`, `Acknowledge execution (required for mutating commands).`

**Services Used**  
None detected.

**Models Used**  
None detected.

**Tables Used**  
`engagement`

**External APIs**  
None detected.

**Related Commands**  
None detected.

**Expected Output**  
Command executes with status output and logs/errors based on runtime state.

**Example Execution**  
`php spark growth:retention-watch`

## Dependencies

| Relationship | Target | Type |
|---|---|---|
| `growth:retention-watch` | `engagement` | Command → Table |

## Command Dependency Graph

```mermaid
graph TD
Growth["Growth Pipeline"]
Growth --> growth_retention_watch["growth:retention-watch"]
```

## Execution Workflows

- `php spark growth:retention-watch`

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


## Console Registry Verification

- Console registry is auto-discovered in CI4; explicit `$commands` entries in `app/Config/Console.php` should be added for any commands that fail `ops:commands:missing`.
