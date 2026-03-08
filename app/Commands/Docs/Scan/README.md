# Scan Spark Commands

## Overview

This README documents Spark commands under `app/Commands/Docs/Scan` and their operational dependencies.

## Operational Purpose

Provide operators and developers with command intent, dependencies, workflows, and recovery guidance.

## Command Inventory

- `docs:controllers:list` (Maintenance)
- `docs:services:list` (Maintenance)
- `docs:views:dirs` (Maintenance)
- `docs:views:list` (Maintenance)

## Command Reference

### docs:controllers:list

**Purpose**  
List all module controllers

**Usage**  
`php spark docs:controllers:list`

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
`php spark docs:controllers:list`

### docs:services:list

**Purpose**  
List all Services classes

**Usage**  
`php spark docs:services:list`

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
`php spark docs:services:list`

### docs:views:dirs

**Purpose**  
No description provided.

**Usage**  
`php spark docs:views:dirs`

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
`php spark docs:views:dirs`

### docs:views:list

**Purpose**  
No description provided.

**Usage**  
`php spark docs:views:list`

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
`php spark docs:views:list`

## Dependencies

| Relationship | Target | Type |
|---|---|---|

## Command Dependency Graph

```mermaid
graph TD
Scan["Scan Pipeline"]
Scan --> docs_controllers_list["docs:controllers:list"]
Scan --> docs_services_list["docs:services:list"]
Scan --> docs_views_dirs["docs:views:dirs"]
Scan --> docs_views_list["docs:views:list"]
```

## Execution Workflows

- `php spark docs:controllers:list`
- `php spark docs:services:list`
- `php spark docs:views:dirs`
- `php spark docs:views:list`

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
