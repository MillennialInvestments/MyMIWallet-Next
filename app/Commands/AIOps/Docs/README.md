# Docs Spark Commands

## Overview

This README documents Spark commands under `app/Commands/AIOps/Docs` and their operational dependencies.

## Operational Purpose

Provide operators and developers with command intent, dependencies, workflows, and recovery guidance.

## Command Inventory

- `aiops:docs-sync` (Maintenance)

Indirect/supporting commands:
- `ops:doctor:full`
- `logs:summarize`

## Command Reference

### aiops:docs-sync

**Purpose**  
Run documentation sync pipeline using DocsSyncEngine

**Usage**  
`php spark aiops:docs-sync`

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
`aiops:docs-sync`

**Expected Output**  
Command executes with status output and logs/errors based on runtime state.

**Example Execution**  
`php spark aiops:docs-sync`

## Dependencies

| Relationship | Target | Type |
|---|---|---|
| `aiops:docs-sync` | `aiops:docs-sync` | Command → Command |

## Command Dependency Graph

```mermaid
graph TD
Docs["Docs Pipeline"]
Docs --> aiops_docs_sync["aiops:docs-sync"]
aiops_docs_sync --> aiops_docs_sync["aiops:docs-sync"]
```

## Execution Workflows

- `php spark aiops:docs-sync`
- `php spark ops:doctor:full`
- `php spark logs:summarize`

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

- `aiops:docs-sync`
- `logs:summarize`
- `ops:doctor:full`

## Console Registry Verification

- Console registry is auto-discovered in CI4; explicit `$commands` entries in `app/Config/Console.php` should be added for any commands that fail `ops:commands:missing`.
