# Spark Command Audit Report

## Before
- `app:update` was registered in `app/Config/Console.php`, but Spark did not reliably surface it, which is consistent with stale command cache behavior (CI4 stores a command registry in `writable/cache/Commands.php`).
- There was no automated validation to catch missing classes, invalid namespaces, or malformed command metadata.

## After
- Added an auditor command: `php spark ops:commands:audit`.
  - Verifies each registered command exists, extends `CodeIgniter\CLI\BaseCommand`, declares a non-empty `protected $name` (with a `group:command` pattern), declares a non-empty `protected $group`, and implements `run(array $params)`.
  - Emits a table of results and returns a non-zero exit code if any command is invalid.
- Registered the new auditor command in `app/Config/Console.php`.

## Fixes Applied
1. Added the `ops:commands:audit` command to validate the registry.
2. Ensured the command registry includes the new audit command alongside the existing validated commands.
3. Documented command cache reset guidance: delete `writable/cache/Commands.php` when Spark command lists are stale (or after adding new commands).

## Suggested Reset (Manual)
```bash
rm -f writable/cache/Commands.php
php spark list
```

> Optional helper: if you want a one-liner, create a local `make spark-reset` target that removes the cache file and re-runs `php spark list`.
