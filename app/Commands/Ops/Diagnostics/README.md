# Diagnostics Spark Commands

## Overview

This README documents Spark commands under `app/Commands/Ops/Diagnostics` and their operational dependencies.

## Operational Purpose

Provide operators and developers with command intent, dependencies, workflows, and recovery guidance.

## Command Inventory

- `ops:filesystem-scan` (Operational)

## Command Reference

### ops:filesystem-scan

**Purpose**  
Ops helper command: ops:filesystem-scan

**Usage**  
`php spark ops:filesystem-scan`

**Options**  
None documented.

**Services Used**  
`App\Services\Ops\VpsHealthService`

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
`php spark ops:filesystem-scan`

## Dependencies

| Relationship | Target | Type |
|---|---|---|
| `ops:filesystem-scan` | `App\Services\Ops\VpsHealthService` | Command → Service |

## Command Dependency Graph

```mermaid
graph TD
Diagnostics["Diagnostics Pipeline"]
Diagnostics --> ops_filesystem_scan["ops:filesystem-scan"]
```

## Execution Workflows

- `php spark ops:filesystem-scan`

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
