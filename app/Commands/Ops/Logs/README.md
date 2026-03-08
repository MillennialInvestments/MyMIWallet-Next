# Logs Spark Commands

## Overview

This README documents Spark commands under `app/Commands/Ops/Logs` and their operational dependencies.

## Operational Purpose

Provide operators and developers with command intent, dependencies, workflows, and recovery guidance.

## Command Inventory

- `logs:scan` (Operational)
- `logs:watch` (Operational)

## Command Reference

### logs:scan

**Purpose**  
Ops helper command: logs:scan

**Usage**  
`php spark logs:scan`

**Options**  
None documented.

**Services Used**  
`App\Services\Ops\LogOpsService`

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
`php spark logs:scan`

### logs:watch

**Purpose**  
Ops helper command: logs:watch

**Usage**  
`php spark logs:watch`

**Options**  
None documented.

**Services Used**  
`App\Services\Ops\LogOpsService`

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
`php spark logs:watch`

## Dependencies

| Relationship | Target | Type |
|---|---|---|
| `logs:scan` | `App\Services\Ops\LogOpsService` | Command → Service |
| `logs:watch` | `App\Services\Ops\LogOpsService` | Command → Service |

## Command Dependency Graph

```mermaid
graph TD
Logs["Logs Pipeline"]
Logs --> logs_scan["logs:scan"]
Logs --> logs_watch["logs:watch"]
```

## Execution Workflows

- `php spark logs:scan`
- `php spark logs:watch`

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
