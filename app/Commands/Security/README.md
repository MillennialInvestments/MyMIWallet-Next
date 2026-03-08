# Security Spark Commands

## Overview

This README documents Spark commands under `app/Commands/Security` and their operational dependencies.

## Operational Purpose

Provide operators and developers with command intent, dependencies, workflows, and recovery guidance.

## Command Inventory

- `keys:generate` (Maintenance)
- `keys:generate-ci4` (Maintenance)
- `security:secrets-audit` (Diagnostic)

## Command Reference

### keys:generate

**Purpose**  
Generate a cryptographically secure encryption key.

**Usage**  
`php spark keys:generate`

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
`php spark keys:generate`

### keys:generate-ci4

**Purpose**  
Generate and rotate CodeIgniter 4 encryption.key

**Usage**  
`php spark keys:generate-ci4`

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
`php spark keys:generate-ci4`

### security:secrets-audit

**Purpose**  
Detect sensitive secrets in configs, logs, or docs.

**Usage**  
`php spark security:secrets-audit`

**Options**  
`--emit`, `Output mode: docs (default: docs).`, `--out`, `Override artifact directory (must be inside docs/aiops/artifacts).`, `--dry-run`, `Generate a report without mutating state.`, `--approve`, `Acknowledge execution (required for mutating commands).`

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
`php spark security:secrets-audit`

## Dependencies

| Relationship | Target | Type |
|---|---|---|

## Command Dependency Graph

```mermaid
graph TD
Security["Security Pipeline"]
Security --> keys_generate["keys:generate"]
Security --> keys_generate_ci4["keys:generate-ci4"]
Security --> security_secrets_audit["security:secrets-audit"]
```

## Execution Workflows

- `php spark keys:generate`
- `php spark keys:generate-ci4`
- `php spark security:secrets-audit`

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
