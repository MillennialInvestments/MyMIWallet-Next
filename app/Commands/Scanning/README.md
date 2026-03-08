# Scanning Spark Commands

## Overview

This README documents Spark commands under `app/Commands/Scanning` and their operational dependencies.

## Operational Purpose

Provide operators and developers with command intent, dependencies, workflows, and recovery guidance.

## Command Inventory

- `scanning:run` (Automation)

## Command Reference

### scanning:run

**Purpose**  
Run MyMI liquidity + momentum scanner

**Usage**  
`php spark scanning:run`

**Options**  
`--timeframe`, `Timeframe (1min,5min,15min,1day).`, `--source`, `Symbol source (watchlist|universe|manual).`, `--limit`, `Max symbol count.`

**Services Used**  
None detected.

**Models Used**  
None detected.

**Tables Used**  
None detected.

**External APIs**  
None detected.

**Related Commands**  
None detected.

**Expected Output**  
Command executes with status output and logs/errors based on runtime state.

**Example Execution**  
`php spark scanning:run`

## Dependencies

| Relationship | Target | Type |
|---|---|---|

## Command Dependency Graph

```mermaid
graph TD
Scanning["Scanning Pipeline"]
Scanning --> scanning_run["scanning:run"]
```

## Execution Workflows

- `php spark scanning:run`

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
