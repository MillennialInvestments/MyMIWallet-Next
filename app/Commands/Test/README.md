# Test Spark Commands

## Overview

This README documents Spark commands under `app/Commands/Test` and their operational dependencies.

## Operational Purpose

Provide operators and developers with command intent, dependencies, workflows, and recovery guidance.

## Command Inventory

- `test:redis` (Operational)

## Command Reference

### test:redis

**Purpose**  
Test Redis connection

**Usage**  
`php spark test:redis`

**Options**  
None documented.

**Services Used**  
`App\Services\Infrastructure\RedisService`

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
`php spark test:redis`

## Dependencies

| Relationship | Target | Type |
|---|---|---|
| `test:redis` | `App\Services\Infrastructure\RedisService` | Command → Service |

## Command Dependency Graph

```mermaid
graph TD
Test["Test Pipeline"]
Test --> test_redis["test:redis"]
```

## Execution Workflows

- `php spark test:redis`

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
