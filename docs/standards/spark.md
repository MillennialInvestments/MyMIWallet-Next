# Spark Command Standards

These rules lock down Spark command behavior to prevent silent command loss and constructor signature mismatches.

## ❌ Forbidden

- Defining `__construct()` in any Spark command class.
- Injecting services via constructor arguments.
- Extending `CodeIgniter\CLI\BaseCommand` directly for new commands.

## ✅ Required

- Extend `App\Commands\SafeBaseCommand` for every new command.
- Resolve dependencies inside `run()` via `Config\Services` or helpers like `service()`.
- Register each command explicitly in `app/Config/Console.php`.
- Run `php spark ops:commands:audit` before merge.
- Use discovery-safe metadata: untyped `$group`, `$name`, `$description`, `$usage`, `$options` fields only.
- Avoid typed properties for Spark metadata; typed properties can break discovery.

## 🔥 Rationale

CodeIgniter 4 instantiates Spark commands internally, and constructor mismatches cause commands to disappear from `spark list` without a clear error. Cache invalidation does not resolve constructor signature violations. Removing constructors from command classes and enforcing a single base class keeps registration deterministic and prevents silent runtime loss.

## 📝 Recent Root Cause & Fix

`runtime:diagnose-502` was missing from `spark list` because the command metadata and signature drifted from CI4 discovery rules (it did not match the exact SafeBaseCommand signature, and the required Spark metadata/usage strings were not aligned). CI4 only discovers commands that are properly registered in `app/Config/Console.php`, extend the expected base class without constructors/typed properties, and expose the plain (untyped) `$group`, `$name`, `$description`, and `$usage` properties. Keeping these values exact and untyped, plus clearing the Spark command cache, restores command discovery and prevents silent drops in the future.

## Runtime Diagnostics Commands

Runtime diagnostics commands inspect web infrastructure (PHP handlers, sockets, nginx configs, logs) to explain 502/503 conditions without destabilizing shared-host environments.

**Purpose**
- Provide safe, read-only checks that quickly pinpoint handler mismatches, stale sockets, and bad fastcgi_pass targets.
- Offer minimal, guard-railed fix steps when explicitly forced.

**When to run**
- After a 502/503 incident or when deploys start returning Bad Gateway.
- During shared-host migrations or PHP version switches.

**Shared-host limitations**
- Commands may not be allowed to restart handlers or access system-level nginx.
- They only scan user-space configs (`~/nginx/**`) and current logs.

**Why fixes are intentionally limited**
- Shared VPS/DreamHost environments prohibit system config edits and service restarts.
- SafeBaseCommand guardrails enforce `--force` and `--dry-run` so diagnostics never escalate risk by default.

## ops:next-steps (AIOps snapshot)

`ops:next-steps` aggregates existing audit commands into a single Issue list and writes:

- `docs/next/Next-Steps.md` (human-friendly “what to do next”)
- `docs/next/snapshots/issues-YYYY-MM-DD.json` (machine-readable snapshot)

Supported emit modes:

- `--emit=docs` (default) writes docs + snapshot.
- `--emit=db` enqueues issues into `bf_aiops_tasks`.
- `--emit=both` does both.

Issue schema fields:

- `id` (stable hash)
- `task_key` (same as `id`)
- `domain` (`dev|ops|security|ux|marketing`)
- `severity` (`P0|P1|P2`)
- `title`
- `evidence` (file paths/log excerpts/command outputs)
- `suggested_fix` (short steps)
- `ai_prompt` (legacy single prompt)
- `codex_prompt` (copy/paste prompt block)
- `chatgpt_prompt` (copy/paste prompt block)
- `owner` (`human|codex|aiops`)
- `status` (`open|queued|done`)
- `auto_queue` (`true|false`)
