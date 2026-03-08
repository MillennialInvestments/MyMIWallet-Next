## Overview

Supplemental operational documentation entry for this Spark scope.

## Operational Purpose

Provide standardized runbook sections for operators and developers.

## Command Inventory

- See local command tables and linked inventories.

## Command Reference

- Reference command blocks in this file or parent category docs.

## Dependencies

- Use `docs/spark/_spark_command_dependencies.json` for relationship data.

## Execution Workflows

- Run category bootstrap, diagnostics, and validation sequences as applicable.

## Operational Playbooks

- Incident triage: logs, services, routes, and database diagnostics.

## Troubleshooting

- Use `php spark ops:commands:audit`, `php spark ops:commands:missing`, and runtime diagnostics.

## Related Commands

- `ops:commands:audit`
- `ops:commands:missing`
- `spark:commands:graph`

---

# Spark CLI Standards (CI4 4.6.x Safe)

This document defines the baseline rules for every Spark command in this repository.

## Forbidden APIs

The following methods **must never** be used in CI4 `BaseCommand` classes:

- `$this->option()`
- `$this->argument()`
- `$this->getOption()`
- `$this->getArgument()`

These methods do not exist on CI4 `BaseCommand` and will throw runtime errors.

## Required Base Command

All Spark commands must extend `App\Commands\SafeBaseCommand`. This provides the CI4-safe parser, intent logging, dry-run resolution, and destructive guards. Commands should not duplicate these helpers.

## Required Param Parsing Pattern

`SafeBaseCommand` includes the following parser. Commands should call it in `run(array $params)`:

```php
protected function parseParams(array $params): array
{
    $args  = [];
    $flags = [];

    foreach ($params as $param) {
        if (str_starts_with($param, '--')) {
            $flags[ltrim($param, '-')] = true;
        } else {
            $args[] = $param;
        }
    }

    return [$args, $flags];
}
```

Usage in `run`:

```php
[$args, $flags] = $this->parseParams($params);
```

> `parseParams()` now logs intent and enforces approval guards automatically.

## Destructive vs Non-Destructive Rules

Every command **must** define:

```php
protected function isDestructive(): bool
{
    return false; // or true
}
```

### Non-Destructive Commands

Examples: summarize, healthcheck, report, audit, analyze.

- ✅ **Write output by default**
- ✅ **Support optional `--dry-run`**
- ❌ **Never require `--approve`**
- ❌ **Never auto-enable dry-run**

Dry-run handling (use the base helper):

```php
$dryRun = $this->resolveDryRun($flags);
```

### Destructive Commands

Examples: prune, purge, delete, rewrite, backfill (when overwriting data).

- ❌ **Must not run without `--approve`**
- ✅ **May support `--dry-run`**
- ✅ **Must hard-fail when `--approve` is missing**

## Logging Requirements

Every command must emit structured logs for observability:

- **On start**:
  ```php
  log_message('info', '[spark:<command>] Started', ['params' => $params]);
  ```
- **On failure**:
  ```php
  log_message('error', '[spark:<command>] Failed', ['reason' => $message]);
  ```
- **On success**:
  ```php
  log_message('info', '[spark:<command>] Completed', [...context]);
  ```

Replace `<command>` with the Spark command name (e.g., `logs:healthcheck`).

## Help Text Consistency

- `$options` and `$usage` are documentation only.
- Ensure help text matches the real behavior and accepted parameters.
- Prefer positional arguments for values and `--flag` for booleans.

## Regression Protection

CI should fail if any Spark command uses forbidden APIs. Use the lint script:

```bash
scripts/ci/check_spark_cli.sh
```

## Filesystem Safety

- All Spark commands must anchor writes to `ROOTPATH`.
- Writes to `public/` or `writable/` are forbidden (use `log_message()` for logs).
- CI runs `php spark ops:filesystem:lint` to enforce these rules across app/Commands, tools, and aiops.

## Codex Review Lifecycle

- `codex:review:list` surfaces available review artifacts under `docs/codex/reviews`.
- `codex:review:commit` stages/commits only review artifacts, defaulting to `--dry-run`.
- `codex:review:publish` posts summaries to Discord or GitHub PR comments (CI only).
