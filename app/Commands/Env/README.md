# Env Spark Commands

## Overview

This README documents Spark commands under `app/Commands/Env` and their operational dependencies.

## Operational Purpose

Provide operators and developers with command intent, dependencies, workflows, and recovery guidance.

## Command Inventory

- `env:doctor` (Diagnostic)

## Command Reference

### env:doctor

**Purpose**  
Environment diagnostics and snapshot.

**Usage**  
`php spark env:doctor`

**Options**  
`--notify=discord`, `Send summary to Discord.`, `--pack`, `Bundle JSON/Markdown into a tar.gz for sharing.`

**Services Used**  
`App\Services\Ops\EnvDoctorService`

**Models Used**  
None detected.

**Tables Used**  
`a`

**External APIs**  
`Discord`

**Related Commands**  
None detected.

**Expected Output**  
Command executes with status output and logs/errors based on runtime state.

**Example Execution**  
`php spark env:doctor`

## Dependencies

| Relationship | Target | Type |
|---|---|---|
| `env:doctor` | `App\Services\Ops\EnvDoctorService` | Command → Service |
| `env:doctor` | `a` | Command → Table |
| `env:doctor` | `Discord` | Command → API |

## Command Dependency Graph

```mermaid
graph TD
Env["Env Pipeline"]
Env --> env_doctor["env:doctor"]
```

## Execution Workflows

- `php spark env:doctor`

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
