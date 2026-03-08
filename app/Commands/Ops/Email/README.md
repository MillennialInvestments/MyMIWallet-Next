# Email Spark Commands

## Overview

This README documents Spark commands under `app/Commands/Ops/Email` and their operational dependencies.

## Operational Purpose

Provide operators and developers with command intent, dependencies, workflows, and recovery guidance.

## Command Inventory

- `email:healthcheck` (Diagnostic)
- `email:queue-scan` (Operational)
- `email:test` (Operational)

## Command Reference

### email:healthcheck

**Purpose**  
Ops helper command: email:healthcheck

**Usage**  
`php spark email:healthcheck`

**Options**  
None documented.

**Services Used**  
`App\Services\Ops\EmailOpsService`

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
`php spark email:healthcheck`

### email:queue-scan

**Purpose**  
Ops helper command: email:queue-scan

**Usage**  
`php spark email:queue-scan`

**Options**  
None documented.

**Services Used**  
`App\Services\Ops\EmailOpsService`

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
`php spark email:queue-scan`

### email:test

**Purpose**  
Ops helper command: email:test

**Usage**  
`php spark email:test`

**Options**  
None documented.

**Services Used**  
`App\Services\Ops\EmailOpsService`

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
`php spark email:test`

## Dependencies

| Relationship | Target | Type |
|---|---|---|
| `email:healthcheck` | `App\Services\Ops\EmailOpsService` | Command → Service |
| `email:queue-scan` | `App\Services\Ops\EmailOpsService` | Command → Service |
| `email:test` | `App\Services\Ops\EmailOpsService` | Command → Service |

## Command Dependency Graph

```mermaid
graph TD
Email["Email Pipeline"]
Email --> email_healthcheck["email:healthcheck"]
Email --> email_queue_scan["email:queue-scan"]
Email --> email_test["email:test"]
```

## Execution Workflows

- `php spark email:healthcheck`
- `php spark email:queue-scan`
- `php spark email:test`

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
