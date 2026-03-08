# Codex Spark Operations Manual

## Overview

Deep operational documentation for Spark commands in this category.

## Operational Purpose

Define when and how operators should run commands safely in production and CI.

## Command Inventory

- `codex:audit` (Diagnostic)
- `codex:continue` (Operational)
- `codex:gate` (Operational)
- `codex:gate:severity` (Operational)
- `codex:index` (Operational)
- `codex:instruct:audit` (Diagnostic)
- `codex:instruct:devops_review` (Operational)
- `codex:instruct:summarize` (Operational)
- `codex:review` (Operational)
- `codex:review:commit` (Operational)
- `codex:review:list` (Operational)
- `codex:review:pr-outbox` (Operational)
- `codex:review:publish` (Operational)
- `codex:status` (Operational)

## Command Reference

### codex:audit

**Purpose**  
Full repository audit via OpenAI

**Usage**  
`php spark codex:audit`

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
`codex:index`

**Expected Output**  
Command status and diagnostics are printed to console and logs.

**Example Execution**  
`php spark codex:audit`

### codex:continue

**Purpose**  
Continue audit in batches (default 5 files) with OpenAI + severity tracking

**Usage**  
`php spark codex:continue`

**Options**  
None documented.

**Services Used**  
None detected.

**Models Used**  
None detected.

**Tables Used**  
`counters`

**External APIs**  
None detected.

**Related Commands**  
`codex:index`

**Expected Output**  
Command status and diagnostics are printed to console and logs.

**Example Execution**  
`php spark codex:continue`

### codex:gate

**Purpose**  
Fail build if high severity issues exist

**Usage**  
`php spark codex:gate`

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
`ops:commands:audit`, `repo:class-trace`

**Expected Output**  
Command status and diagnostics are printed to console and logs.

**Example Execution**  
`php spark codex:gate`

### codex:gate:severity

**Purpose**  
Fail if severity counters exceed thresholds

**Usage**  
`php spark codex:gate:severity`

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
`ops:commands:audit`, `repo:class-trace`

**Expected Output**  
Command status and diagnostics are printed to console and logs.

**Example Execution**  
`php spark codex:gate:severity`

### codex:index

**Purpose**  
Index repository and initialize audit state

**Usage**  
`php spark codex:index`

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
`ops:commands:audit`, `repo:class-trace`

**Expected Output**  
Command status and diagnostics are printed to console and logs.

**Example Execution**  
`php spark codex:index`

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
`ops:commands:audit`, `repo:class-trace`

**Expected Output**  
Command status and diagnostics are printed to console and logs.

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
`ops:commands:audit`, `repo:class-trace`

**Expected Output**  
Command status and diagnostics are printed to console and logs.

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
`ops:commands:audit`, `repo:class-trace`

**Expected Output**  
Command status and diagnostics are printed to console and logs.

**Example Execution**  
`php spark codex:instruct:summarize`

### codex:review

**Purpose**  
Generate Codex review artifacts (summary + prompt payload)

**Usage**  
`php spark codex:review`

**Options**  
`--dry-run`, `Preview actions without writing output files`

**Services Used**  
None detected.

**Models Used**  
None detected.

**Tables Used**  
None detected.

**External APIs**  
None detected.

**Related Commands**  
`ops:commands:audit`, `repo:class-trace`

**Expected Output**  
Command status and diagnostics are printed to console and logs.

**Example Execution**  
`php spark codex:review`

### codex:review:commit

**Purpose**  
Commit Codex review artifacts intentionally (latest or by date).

**Usage**  
`php spark codex:review:commit`

**Options**  
`--latest`, `Commit the latest review artifacts`, `--date=YYYY-MM-DD`, `Commit review artifacts for a specific date`, `--dry-run`, `Preview git commands without committing`, `--approve`, `Approve destructive changes (required for real commit)`

**Services Used**  
None detected.

**Models Used**  
None detected.

**Tables Used**  
None detected.

**External APIs**  
None detected.

**Related Commands**  
`ops:commands:audit`, `repo:class-trace`

**Expected Output**  
Command status and diagnostics are printed to console and logs.

**Example Execution**  
`php spark codex:review:commit`

### codex:review:list

**Purpose**  
List available Codex review artifacts stored under docs.

**Usage**  
`php spark codex:review:list`

**Options**  
`--limit=5`, `Limit the number of review files shown`, `--latest`, `Show only the latest review file`

**Services Used**  
None detected.

**Models Used**  
None detected.

**Tables Used**  
None detected.

**External APIs**  
None detected.

**Related Commands**  
`ops:commands:audit`, `repo:class-trace`

**Expected Output**  
Command status and diagnostics are printed to console and logs.

**Example Execution**  
`php spark codex:review:list`

### codex:review:pr-outbox

**Purpose**  
Review the latest PR outbox bundle and publish CODEX_REVIEW.md.

**Usage**  
`php spark codex:review:pr-outbox`

**Options**  
`--dry-run`, `Preview review output without writing.`

**Services Used**  
None detected.

**Models Used**  
None detected.

**Tables Used**  
None detected.

**External APIs**  
None detected.

**Related Commands**  
`ops:commands:audit`, `repo:class-trace`

**Expected Output**  
Command status and diagnostics are printed to console and logs.

**Example Execution**  
`php spark codex:review:pr-outbox`

### codex:review:publish

**Purpose**  
Aggregate governance lint results and publish review artifacts.

**Usage**  
`php spark codex:review:publish`

**Options**  
`--dry-run`, `Preview payloads without writing artifacts`

**Services Used**  
None detected.

**Models Used**  
None detected.

**Tables Used**  
None detected.

**External APIs**  
`GitHub`

**Related Commands**  
`ops:filesystem:lint`, `codex:review:publish`

**Expected Output**  
Command status and diagnostics are printed to console and logs.

**Example Execution**  
`php spark codex:review:publish`

### codex:status

**Purpose**  
Show audit status

**Usage**  
`php spark codex:status`

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
`ops:commands:audit`, `repo:class-trace`

**Expected Output**  
Command status and diagnostics are printed to console and logs.

**Example Execution**  
`php spark codex:status`

## Dependencies

| Relationship | Target | Type |
|---|---|---|
| `codex:audit` | `codex:index` | Command → Command |
| `codex:continue` | `counters` | Command → Table |
| `codex:continue` | `codex:index` | Command → Command |
| `codex:review:publish` | `ops:filesystem:lint` | Command → Command |
| `codex:review:publish` | `codex:review:publish` | Command → Command |

## Command Dependency Graph

```mermaid
graph TD
Category["Category Pipeline"]
Category --> codex_audit["codex:audit"]
Category --> codex_continue["codex:continue"]
Category --> codex_gate["codex:gate"]
Category --> codex_gate_severity["codex:gate:severity"]
Category --> codex_index["codex:index"]
Category --> codex_instruct_audit["codex:instruct:audit"]
Category --> codex_instruct_devops_review["codex:instruct:devops_review"]
Category --> codex_instruct_summarize["codex:instruct:summarize"]
Category --> codex_review["codex:review"]
Category --> codex_review_commit["codex:review:commit"]
Category --> codex_review_list["codex:review:list"]
Category --> codex_review_pr_outbox["codex:review:pr-outbox"]
```

## Execution Workflows

- `php spark codex:audit`
- `php spark codex:continue`
- `php spark codex:gate`
- `php spark codex:gate:severity`
- `php spark codex:index`
- `php spark codex:instruct:audit`
- `php spark codex:instruct:devops_review`
- `php spark codex:instruct:summarize`
- `php spark ops:commands:audit`
- `php spark repo:class-trace`

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

- Common failures: registry misses, dependency outages, schema drift, permission issues.
- Diagnostics commands: `php spark ops:commands:audit`, `php spark ops:commands:missing`, `php spark logs:doctor`.
- Recovery steps: repair namespaces, clear cache, rerun worker and health checks.

## Related Commands

- `ops:commands:audit`
- `repo:class-trace`

## Console Registry Verification

Review `app/Config/Console.php` and command auto-discovery output from `ops:commands:missing`; add explicit `$commands` entries for commands that must be hard-registered in your environment.
