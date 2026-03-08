# Queue Spark Commands

## Overview

This README documents Spark commands under `app/Commands/Ollama/Queue` and their operational dependencies.

## Operational Purpose

Provide operators and developers with command intent, dependencies, workflows, and recovery guidance.

## Command Inventory

- `ollama:queue:push` (Operational)
- `ollama:queue:retry` (Operational)
- `ollama:queue:stats` (Operational)
- `ollama:queue:work` (Operational)

Indirect/supporting commands:
- `aiops:status`
- `logs:doctor`

## Command Reference

### ollama:queue:push

**Purpose**  
Queues an Ollama job in DB.

**Usage**  
`php spark ollama:queue:push`

**Options**  
`--type`, `generate|chat|embed`, `--model`, `Model name`, `--payload-file`, `JSON payload file`, `--priority`, `Priority`, `--json`, `JSON`

**Services Used**  
None detected.

**Models Used**  
`App\Models\OllamaQueueModel`

**Tables Used**  
None detected.

**External APIs**  
`Ollama`

**Related Commands**  
`aiops:status`, `logs:doctor`

**Expected Output**  
Command executes with status output and logs/errors based on runtime state.

**Example Execution**  
`php spark ollama:queue:push`

### ollama:queue:retry

**Purpose**  
Retries failed jobs from queue.

**Usage**  
`php spark ollama:queue:retry`

**Options**  
`--json`, `JSON output`, `--base-url`, `Override URL`, `--timeout`, `Timeout`, `--dry-run`, `Dry run where supported`

**Services Used**  
None detected.

**Models Used**  
None detected.

**Tables Used**  
`queue`

**External APIs**  
`Ollama`

**Related Commands**  
`aiops:status`, `logs:doctor`

**Expected Output**  
Command executes with status output and logs/errors based on runtime state.

**Example Execution**  
`php spark ollama:queue:retry`

### ollama:queue:stats

**Purpose**  
Queue depth and status counts.

**Usage**  
`php spark ollama:queue:stats`

**Options**  
`--json`, `JSON output`

**Services Used**  
None detected.

**Models Used**  
`App\Models\OllamaQueueModel`

**Tables Used**  
None detected.

**External APIs**  
`Ollama`

**Related Commands**  
`aiops:status`, `logs:doctor`

**Expected Output**  
Command executes with status output and logs/errors based on runtime state.

**Example Execution**  
`php spark ollama:queue:stats`

### ollama:queue:work

**Purpose**  
Consumes queued Ollama jobs.

**Usage**  
`php spark ollama:queue:work`

**Options**  
`--once`, `Process one item`, `--max`, `Max jobs`, `--base-url`, `URL`, `--timeout`, `Timeout`, `--json`, `JSON`

**Services Used**  
None detected.

**Models Used**  
`App\Models\OllamaQueueModel`

**Tables Used**  
None detected.

**External APIs**  
`Ollama`

**Related Commands**  
`aiops:status`, `logs:doctor`

**Expected Output**  
Command executes with status output and logs/errors based on runtime state.

**Example Execution**  
`php spark ollama:queue:work`

## Dependencies

| Relationship | Target | Type |
|---|---|---|
| `ollama:queue:push` | `App\Models\OllamaQueueModel` | Command → Model |
| `ollama:queue:push` | `Ollama` | Command → API |
| `ollama:queue:retry` | `queue` | Command → Table |
| `ollama:queue:retry` | `Ollama` | Command → API |
| `ollama:queue:stats` | `App\Models\OllamaQueueModel` | Command → Model |
| `ollama:queue:stats` | `Ollama` | Command → API |
| `ollama:queue:work` | `App\Models\OllamaQueueModel` | Command → Model |
| `ollama:queue:work` | `Ollama` | Command → API |

## Command Dependency Graph

```mermaid
graph TD
Queue["Queue Pipeline"]
Queue --> ollama_queue_push["ollama:queue:push"]
Queue --> ollama_queue_retry["ollama:queue:retry"]
Queue --> ollama_queue_stats["ollama:queue:stats"]
Queue --> ollama_queue_work["ollama:queue:work"]
```

## Execution Workflows

- `php spark ollama:queue:push`
- `php spark ollama:queue:retry`
- `php spark ollama:queue:stats`
- `php spark ollama:queue:work`
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
