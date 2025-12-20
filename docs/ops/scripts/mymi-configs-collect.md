# scripts/mymi-configs/collect.sh

## Purpose
Collects a diagnostic snapshot (system info, PHP/Composer versions, CI4 spark outputs, config copies, and greps) into a timestamped directory under `writable/diagnostics`.

## How to run
```bash
# Default PHP binary
bash scripts/mymi-configs/collect.sh

# Custom PHP binary (e.g., DreamHost multi-php)
PHPBIN=/usr/local/bin/php82 bash scripts/mymi-configs/collect.sh
```

## Inputs/Outputs
- **Inputs**: Optional `PHPBIN` env var to choose PHP CLI.
- **Outputs**: Multiple text snapshots and file copies saved to `writable/diagnostics/diag-YYYYMMDD-HHMMSS/` plus a `probe.php` stub.
- **Exit codes**: `set +e` means errors are ignored; exit status reflects the last command (usually 0 even on partial failure).

## Dependencies
- Bash; coreutils (`mkdir`, `cp`, `sed`, `grep`, `find`).
- PHP CLI and Composer; CI4 `spark` commands available in repo.
- Write access to `writable/diagnostics`.

## Risks found
- Uses `set +e` without logging failures, so missing tools (e.g., Composer) silently degrade output.
- No `set -u`/`pipefail`; undefined vars or pipe errors could hide issues.
- No usage/help text; optional behaviors (e.g., skipping Composer) are not documented.
- Copies `.env` with regex redaction; pattern may miss new secret keys unless kept updated.
- Writes diagnostic copies of config files; ensure directory is gitignored and protected before sharing archives.

## Suggested improvements
- Enable `set -euo pipefail` with scoped `|| true` where best-effort behavior is desired, plus per-step status logging.
- Add `usage()` and flags such as `--skip-composer`, `--skip-spark`, and `--output-dir`.
- Add simple error summary at end showing which collection steps failed or were skipped.
- Expand secret redaction patterns to cover new env keys (e.g., OAuth tokens, webhook secrets) and support custom redact list via env.

## Proposed patch summary
- Refactor into discrete functions per step with guarded execution and clear logging.
- Add argument parsing + help, defaulting to safe paths under repo root.
- Track step results and emit a summary plus archive suggestion when complete.

## Owner Notes
- Designed for DreamHost/shared hosting (no sudo). Ensure `writable/diagnostics` is excluded from backups shared externally, as it may include sensitive configuration snapshots.
