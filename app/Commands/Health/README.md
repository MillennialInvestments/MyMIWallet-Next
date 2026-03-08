# Health Spark Commands

## Overview

This README documents Spark commands under `app/Commands/Health` and their operational dependencies.

## Operational Purpose

Provide operators and developers with command intent, dependencies, workflows, and recovery guidance.

## Command Inventory

- `health:cache` (Diagnostic)
- `health:disk` (Diagnostic)
- `health:git-safety` (Diagnostic)
- `health:services` (Diagnostic)

## Command Reference

### health:cache

**Purpose**  
Check CI4 writable cache directories for access.

**Usage**  
`php spark health:cache`

**Options**  
None documented.

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
`php spark health:cache`

### health:disk

**Purpose**  
Check disk and inode usage for the host.

**Usage**  
`php spark health:disk`

**Options**  
None documented.

**Services Used**  
`App\Services\Triage\CommandRunner`

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
`php spark health:disk`

### health:git-safety

**Purpose**  
Check git ignore rules for env/writable and tracked secrets.

**Usage**  
`php spark health:git-safety`

**Options**  
None documented.

**Services Used**  
`App\Services\Triage\CommandRunner`

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
`php spark health:git-safety`

### health:services

**Purpose**  
Detect web server + PHP handler status without systemctl.

**Usage**  
`php spark health:services`

**Options**  
None documented.

**Services Used**  
`App\Services\Triage\CommandRunner`, `App\Services\Triage\HostingModeDetector`

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
`php spark health:services`

## Dependencies

| Relationship | Target | Type |
|---|---|---|
| `health:disk` | `App\Services\Triage\CommandRunner` | Command → Service |
| `health:git-safety` | `App\Services\Triage\CommandRunner` | Command → Service |
| `health:services` | `App\Services\Triage\CommandRunner` | Command → Service |
| `health:services` | `App\Services\Triage\HostingModeDetector` | Command → Service |

## Command Dependency Graph

```mermaid
graph TD
Health["Health Pipeline"]
Health --> health_cache["health:cache"]
Health --> health_disk["health:disk"]
Health --> health_git_safety["health:git-safety"]
Health --> health_services["health:services"]
```

## Execution Workflows

- `php spark health:cache`
- `php spark health:disk`
- `php spark health:git-safety`
- `php spark health:services`

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
