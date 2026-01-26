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

## 🔥 Rationale

CodeIgniter 4 instantiates Spark commands internally, and constructor mismatches cause commands to disappear from `spark list` without a clear error. Cache invalidation does not resolve constructor signature violations. Removing constructors from command classes and enforcing a single base class keeps registration deterministic and prevents silent runtime loss.

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
