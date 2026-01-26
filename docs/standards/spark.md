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
