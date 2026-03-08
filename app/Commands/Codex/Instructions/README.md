# Instructions Spark Commands

## Overview

This README documents Spark commands under `app/Commands/Codex/Instructions` and their operational dependencies.

## Operational Purpose

Provide operators and developers with command intent, dependencies, workflows, and recovery guidance.

## Command Inventory

- `codex:instruct:audit` (Diagnostic)
- `codex:instruct:devops_review` (Operational)
- `codex:instruct:summarize` (Operational)

## Command Reference

### codex:instruct:audit

**Purpose**  
Batch review repository files via OpenAI API

**Usage**  
`php spark codex:instruct:audit`

**Options**  
None documented.

**Services Used**  
None detected.

**Models Used**  
None detected.

**Tables Used**  
None detected.

**External APIs**  
`https://api.openai.com/v1/chat/completions`

**Related Commands**  
None detected.

**Expected Output**  
Command executes with status output and logs/errors based on runtime state.

**Example Execution**  
`php spark codex:instruct:audit`

### codex:instruct:devops_review

**Purpose**  
Generate instruction payload to audit AI DevOps layer against docs/*

**Usage**  
`php spark codex:instruct:devops_review`

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
`php spark codex:instruct:devops_review`

### codex:instruct:summarize

**Purpose**  
Generate structured AI documentation summary template

**Usage**  
`php spark codex:instruct:summarize`

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
`php spark codex:instruct:summarize`

## Dependencies

| Relationship | Target | Type |
|---|---|---|
| `codex:instruct:audit` | `https://api.openai.com/v1/chat/completions` | Command → API |

## Command Dependency Graph

```mermaid
graph TD
Instructions["Instructions Pipeline"]
Instructions --> codex_instruct_audit["codex:instruct:audit"]
Instructions --> codex_instruct_devops_review["codex:instruct:devops_review"]
Instructions --> codex_instruct_summarize["codex:instruct:summarize"]
```

## Execution Workflows

- `php spark codex:instruct:audit`
- `php spark codex:instruct:devops_review`
- `php spark codex:instruct:summarize`

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
