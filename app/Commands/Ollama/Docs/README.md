# Docs Spark Commands

## Overview

This README documents Spark commands under `app/Commands/Ollama/Docs` and their operational dependencies.

## Operational Purpose

Provide operators and developers with command intent, dependencies, workflows, and recovery guidance.

## Command Inventory

- `ollama:docs:inventory` (Maintenance)
- `ollama:docs:sync` (Maintenance)

Indirect/supporting commands:
- `aiops:status`
- `logs:doctor`

## Command Reference

### ollama:docs:inventory

**Purpose**  
Builds docs embedding/metadata manifest.

**Usage**  
`php spark ollama:docs:inventory`

**Options**  
`--json`, `JSON output`, `--base-url`, `Override URL`, `--timeout`, `Timeout`, `--dry-run`, `Dry run where supported`

**Services Used**  
None detected.

**Models Used**  
None detected.

**Tables Used**  
None detected.

**External APIs**  
`Ollama`

**Related Commands**  
`aiops:status`, `logs:doctor`

**Expected Output**  
Command executes with status output and logs/errors based on runtime state.

**Example Execution**  
`php spark ollama:docs:inventory`

### ollama:docs:sync

**Purpose**  
Regenerates Ollama inventory and policy docs.

**Usage**  
`php spark ollama:docs:sync`

**Options**  
`--profile`, `Profile name`, `--base-url`, `URL`, `--timeout`, `Timeout`, `--json`, `JSON output`

**Services Used**  
None detected.

**Models Used**  
None detected.

**Tables Used**  
None detected.

**External APIs**  
`Ollama`

**Related Commands**  
`aiops:status`, `logs:doctor`

**Expected Output**  
Command executes with status output and logs/errors based on runtime state.

**Example Execution**  
`php spark ollama:docs:sync`

## Dependencies

| Relationship | Target | Type |
|---|---|---|
| `ollama:docs:inventory` | `Ollama` | Command → API |
| `ollama:docs:sync` | `Ollama` | Command → API |

## Command Dependency Graph

```mermaid
graph TD
Docs["Docs Pipeline"]
Docs --> ollama_docs_inventory["ollama:docs:inventory"]
Docs --> ollama_docs_sync["ollama:docs:sync"]
```

## Execution Workflows

- `php spark ollama:docs:inventory`
- `php spark ollama:docs:sync`
- `php spark aiops:status`
- `php spark logs:doctor`

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

- `aiops:status`
- `logs:doctor`

## Console Registry Verification

- Console registry is auto-discovered in CI4; explicit `$commands` entries in `app/Config/Console.php` should be added for any commands that fail `ops:commands:missing`.
