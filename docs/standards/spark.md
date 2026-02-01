# Spark Command Standards (CI4 4.6.x)

These standards lock Spark behavior for deterministic, auditable operations on PHP 8.2 in DreamHost shared/VPS environments.

## ❌ Forbidden

- Defining `__construct()` in any Spark command class.
- Injecting services via constructor arguments.
- Extending `CodeIgniter\CLI\BaseCommand` directly for new commands.
- Typed Spark metadata properties (`$group`, `$name`, `$description`, `$usage`, `$options`).
- Nested `php spark` execution from within any command.

## ✅ Required

- Extend `App\Commands\SafeBaseCommand` for every new command.
- Resolve dependencies inside `run()` via `Config\Services` or helpers like `service()`.
- Register each command explicitly in `app/Config/Console.php`.
- Enforce guardrails using `SafeBaseCommand` + `AIOpsPolicy`.
- Emit artifacts for every run (`summary.md` + `report.json`).
- Use standardized flags and exit codes.

## Ops Update Governance (Mandatory)

- `ops:app:update` is the **only approved** post-deploy update command.
- `spark optimize` is forbidden outside CI.
- Composer is forbidden inside ops commands.
- Dev dependencies must remain present at runtime.
- `ops:commands:audit` must pass before update orchestration continues.

## Canonical Spark Command Taxonomy

| Prefix | Meaning |
| --- | --- |
| health:* | Diagnostics only (read-only) |
| audit:* | Verification (read-only, CI-enforced) |
| fix:* | Guarded remediation |
| runtime:* | Runtime / infrastructure |
| spark:* | Spark layer governance |
| ops:* | Orchestration & policy |
| ci:* | CI-only commands |
| security:* | Security audits |
| perf:* | Performance diagnostics |
| db:* | Database health & drift |
| cache:* | Cache health / purge |
| marketing:* | Marketing automation |
| alerts:* | Alerts pipeline |
| notify:* | External dispatch |
| aiops:* | AI task queue & quotas |

**New commands must conform to this taxonomy.** Any legacy proposals with non-conforming prefixes must be renamed before implementation.

## Required Flags

All commands must accept and honor the following flags:

- `--emit` (required): output mode (e.g., `docs`, `json`, `both`).
- `--out` (required): artifact output directory override.
- `--dry-run` (required for any mutating command): perform no changes.
- `--approve` (required for any mutating command): explicit approval gate.

## Artifact Paths

Default output paths are deterministic:

- **Primary artifacts:** `docs/aiops/artifacts/<command>/<timestamp>/`
- **Raw artifacts:** `writable/aiops/artifacts/<command>/<timestamp>/`
- **Required files:** `summary.md`, `report.json`

`--out` must point inside one of the two approved roots.

## Exit Codes

| Exit Code | Meaning |
| --- | --- |
| 0 | Success (no issues) |
| 10 | Audit completed with findings (non-fatal) |
| 20 | Validation failure (bad flags / missing artifact path) |
| 30 | Guardrail violation (policy denied) |
| 40 | Execution failed (runtime error) |
| 50 | Artifact write failure |

## CI Enforcement

- CI runs **read-only** commands only.
- CI blocks destructive or mutating commands even with `--approve`.
- CI validates that all commands are registered in `app/Config/Console.php`.

## Rationale

CodeIgniter 4 instantiates Spark commands internally; constructors and typed metadata can prevent discovery without clear errors. Enforcing a SafeBaseCommand-only architecture with untyped metadata and explicit registration keeps Spark deterministic and prevents silent command loss.
