# ops:app:update (Canonical Ops Orchestrator)

`ops:app:update` is the single **approved** post-deploy and maintenance command for MyMI Wallet in ops, staging, and production environments. It orchestrates safe checks, validation, and health checks without touching `vendor/`, running Composer, or executing unsafe Spark commands.

## ✅ What it does

1. **Environment guardrails**
   - Logs environment, hostname, and timestamp.
   - Blocks CI execution unless `--allow-ci` is passed.
   - Hard-fails if any `spark optimize` attempt is detected.
2. **Filesystem & permissions**
   - Verifies `writable/` plus cache/logs/sessions/aiops/triage.
   - Creates missing directories (safe + non-destructive).
3. **Cache & autoload sanity**
   - Runs `cache:clear`.
   - Resets the FileLocator cache if available.
4. **Database health**
   - Tests DB connectivity.
   - Confirms migrations table exists.
   - Detects pending migrations (optional apply via `--migrate`).
5. **Configuration audit**
   - Validates required non-secret settings (base URL, encryption, email).
   - Sanity checks Redis/queue config if enabled.
6. **API & integration checks**
   - Internal routes (e.g., `/system/healthz`).
   - CSRF + auth guard sanity.
   - External checks (Discord, email transport, market/news APIs).
7. **Spark command governance**
   - Runs `ops:commands:audit` and fails if violations exist.
8. **Application self-tests**
   - Controller instantiation.
   - Service container resolution.
   - Route collection load.
9. **AIOps snapshot**
   - Writes to `writable/aiops/snapshots/app-update-YYYYMMDD-HHMMSS.json` (unless `--no-aiops`).

## ❌ What it does NOT do

- Run Composer (`composer install`, `composer dump-autoload`, etc.).
- Modify `vendor/`.
- Remove dev dependencies.
- Run `spark optimize`.
- Execute PHPUnit or CI test suites.

## ✅ Approved usage

```bash
php spark ops:app:update
```

Optional flags:

```bash
php spark ops:app:update --dry-run
php spark ops:app:update --migrate
php spark ops:app:update --migrate-only
php spark ops:app:update --strict
php spark ops:app:update --no-api
php spark ops:app:update --no-aiops
php spark ops:app:update --json
```

## 🚫 Forbidden commands

- `php spark optimize`
- Any Composer command during ops updates
- Ad-hoc update scripts that bypass `ops:app:update`

## CI vs Ops Behavior

- **CI**: blocked by default (requires `--allow-ci`).
- **Ops/Staging/Prod**: permitted and safe by default.
- **Strict mode**: external integration failures become fatal.

## Failure modes & exit codes

| Exit Code | Meaning |
| --- | --- |
| 0 | Success (no warnings or failures) |
| 1 | Warnings only (non-fatal) |
| 2 | Hard failure (blocked or unsafe state) |

## Governance rules

- `ops:app:update` is the only approved post-deploy update command.
- `ops:commands:audit` must pass before updates proceed.
- Composer is forbidden inside ops commands.
- Dev dependencies must remain present at runtime.
- `spark optimize` is forbidden outside CI.
