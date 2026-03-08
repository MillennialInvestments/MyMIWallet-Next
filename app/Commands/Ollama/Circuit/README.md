# Circuit Spark Commands

## Overview

This README documents Spark commands under `app/Commands/Ollama/Circuit` and their operational dependencies.

## Operational Purpose

Provide operators and developers with command intent, dependencies, workflows, and recovery guidance.

## Command Inventory

- `ollama:circuit:reset` (Operational)
- `ollama:circuit:status` (Operational)

Indirect/supporting commands:
- `aiops:status`
- `logs:doctor`

## Command Reference

### ollama:circuit:reset

**Purpose**  
Resets circuit breaker state.

**Usage**  
`php spark ollama:circuit:reset`

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
`php spark ollama:circuit:reset`

### ollama:circuit:status

**Purpose**  
Shows circuit breaker state.

**Usage**  
`php spark ollama:circuit:status`

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
`php spark ollama:circuit:status`

## Dependencies

| Relationship | Target | Type |
|---|---|---|
| `ollama:circuit:reset` | `Ollama` | Command → API |
| `ollama:circuit:status` | `Ollama` | Command → API |

## Command Dependency Graph

```mermaid
graph TD
Circuit["Circuit Pipeline"]
Circuit --> ollama_circuit_reset["ollama:circuit:reset"]
Circuit --> ollama_circuit_status["ollama:circuit:status"]
```

## Execution Workflows

- `php spark ollama:circuit:reset`
- `php spark ollama:circuit:status`
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
