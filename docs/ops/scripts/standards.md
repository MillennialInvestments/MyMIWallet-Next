# Scripts Standards

These standards apply to all scripts under `scripts/` (and subfolders) to keep DreamHost-friendly, secure, and maintainable operations.

## Naming conventions
- Use lowercase names with hyphens or underscores that reflect the action (e.g., `warm_routes.sh`, `build_inventory.py`).
- Place related scripts in a subfolder (e.g., `scripts/ops/`) and mirror the folder name in docs (e.g., `ops_*` docs).
- Configuration or data-only files should be suffixed with `.json`, `.txt`, or `.sample.<ext>` and documented alongside the consuming script.

## Required header template (bash)
```bash
#!/usr/bin/env bash
set -euo pipefail

usage() {
  cat <<'USAGE'
Usage: $0 [options]
...describe flags...
USAGE
}
```
- Default to safe values; initialize variables (`var=""`) before use.
- Support `--help` to print usage and exit 0.

## Required header template (python/php/node)
- Python/Node: `#!/usr/bin/env python3` or `#!/usr/bin/env node` when executable; otherwise document invocation.
- PHP CLI: `#!/usr/bin/env php` and `declare(strict_types=1);` at the top.
- Always guard main entry with `if __name__ == "__main__":` (Python) or `if (PHP_SAPI === 'cli') { ... }` (PHP) to prevent accidental inclusion side effects.

## Required logging pattern
- Emit a clear start banner with timestamp (ISO-8601) and key parameters.
- Log to stdout by default; support `--log-file <path>` to tee output when useful.
- For network operations, log each target URL and the HTTP status/time.

## Exit code conventions
- Exit 0 on success, non-zero on any failed required operation.
- When partial failures are acceptable, provide `--allow-failures` or `--soft-fail` and still summarize counts.
- Print actionable error messages to stderr before exiting.

## “dry-run” support guidance
- Prefer `--dry-run` to print commands instead of executing external calls.
- In dry-run mode, do not write files or perform network calls; simulate outputs when helpful.

## Safe file output rules
- Default output paths inside the repo or `writable/` folder; never write to system directories.
- Create parent directories with `mkdir -p` and fail loudly if creation is not possible.
- Use atomic writes where feasible (write to temp + move) for logs and JSON indexes.

## Token/secret handling rules
- Read secrets from environment variables or `.env` using PHP/CI4 helpers; never echo raw secrets.
- Redact sensitive values in logs (replace with `***redacted***`).
- Avoid `curl | bash` or inline script downloads; prefer vendor-checked binaries or existing tools.
- Provide explicit flags for headers (`--header "Key: value"`) rather than hard-coding tokens.

## Portability notes (DreamHost)
- Do not require sudo or system package installs; rely on repo-provided tools (php, composer.phar, bash).
- Set curl timeouts to avoid hung cron jobs; avoid GNU-specific options when POSIX equivalents exist.
- Detect optional tools (e.g., `shellcheck`) with `command -v` and skip gracefully when absent.
