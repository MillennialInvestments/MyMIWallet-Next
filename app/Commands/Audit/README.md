# Audit Spark Commands

## Overview

This README documents Spark commands under `app/Commands/Audit` and their operational dependencies.

## Operational Purpose

Provide operators and developers with command intent, dependencies, workflows, and recovery guidance.

## Command Inventory

- `audit:all` (Diagnostic)
- `audit:node` (Diagnostic)

## Command Reference

### audit:all

**Purpose**  
Full system visibility audit

**Usage**  
`php spark audit:all`

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
`php spark audit:all`

### audit:node

**Purpose**  
Detect tracked node_modules and native build artifacts (read-only).

**Usage**  
`php spark audit:node`

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
`php spark audit:node`

## Dependencies

| Relationship | Target | Type |
|---|---|---|

## Command Dependency Graph

```mermaid
graph TD
Audit["Audit Pipeline"]
Audit --> audit_all["audit:all"]
Audit --> audit_node["audit:node"]
```

## Execution Workflows

- `php spark audit:all`
- `php spark audit:node`

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
