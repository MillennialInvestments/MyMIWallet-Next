# Investments Spark Commands

## Overview

This README documents Spark commands under `app/Commands/Investments` and their operational dependencies.

## Operational Purpose

Provide operators and developers with command intent, dependencies, workflows, and recovery guidance.

## Command Inventory

- `investments:economy:updateall` (Operational)

## Command Reference

### investments:economy:updateall

**Purpose**  
Fetch and store economic indicators from FRED into local tables.

**Usage**  
`php spark investments:economy:updateall`

**Options**  
None documented.

**Services Used**  
None detected.

**Models Used**  
None detected.

**Tables Used**  
`FRED`, `local`, `complete`

**External APIs**  
None detected.

**Related Commands**  
None detected.

**Expected Output**  
Command executes with status output and logs/errors based on runtime state.

**Example Execution**  
`php spark investments:economy:updateall`

## Dependencies

| Relationship | Target | Type |
|---|---|---|
| `investments:economy:updateall` | `FRED` | Command → Table |
| `investments:economy:updateall` | `local` | Command → Table |
| `investments:economy:updateall` | `complete` | Command → Table |

## Command Dependency Graph

```mermaid
graph TD
Investments["Investments Pipeline"]
Investments --> investments_economy_updateall["investments:economy:updateall"]
```

## Execution Workflows

- `php spark investments:economy:updateall`

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
