# Repo-Wide Script Standards

Use these conventions for all future scripts to keep them portable on DreamHost (no sudo) and predictable for daily ops.

## Naming Conventions
- Use `kebab-case` or `snake_case` filenames that reflect the task (e.g., `smoke-routes`, `build_inventory`).
- Place operational scripts in `scripts/` (or scoped subfolders) and prefer a matching doc in `docs/ops/scripts/<name>.md`.
- Use consistent prefixes for related tasks: `build_*` for generators, `lint_*` for validators, `check_*` for read-only probes.

## Required Header Template
For shell scripts, start with:
```bash
#!/usr/bin/env bash
set -euo pipefail

usage() {
  cat <<'USAGE'
  <one-line description>
  Usage: $0 [options]
    -h, --help        Show help
  USAGE
}

ROOT="$(cd "$(dirname "$0")/.." && pwd)"
```

For Python scripts:
```python
#!/usr/bin/env python3
"""Short description."""
from __future__ import annotations
import argparse
```

For PHP CLI utilities:
```php
#!/usr/bin/env php
<?php
declare(strict_types=1);
```

## Logging Pattern
- Print a short banner at start, and per-step status lines using `[OK]`, `[SKIP]`, `[FAIL]` prefixes.
- On errors, emit actionable guidance (e.g., missing binary path) before exiting.
- Support `--verbose` to surface command output when debugging.

## Exit Code Conventions
- `0`: success
- `1`: validation or lint failures (action needed)
- `2`: usage errors (bad flags/inputs)
- `>2`: unexpected runtime errors
- Prefer explicit `exit <code>` in error paths; avoid silent `set +e` unless paired with per-step status logging.

## Dry-Run Support
- Provide `--dry-run` for scripts that write or delete files; show target paths and skipped actions when enabled.
- For network actions, allow `--offline`/`--no-network` to disable outbound calls in constrained environments.

## Safe File Output Rules
- Default outputs under the repo (e.g., `writable/diagnostics`, `docs/`); never assume `/tmp` or system paths.
- Create parent directories with `mkdir -p` and show absolute paths on completion.
- When overwriting files, write to a temp path and atomically move into place after success.

## Token and Secret Handling
- Read secrets via environment variables or `.env` using safe parsers; never echo secrets to stdout.
- Redact sensitive keys in logs (API keys, DB credentials, webhook tokens) with placeholders.
- Do not pipe unverified network responses into interpreters (`curl | bash` is disallowed).

## Portability Tips
- Avoid `sudo` and OS-specific utilities; rely on POSIX tools available on DreamHost (bash, coreutils, php, python3, node where installed).
- Detect optional tools (e.g., `shellcheck`) via `command -v` and degrade gracefully when missing.
