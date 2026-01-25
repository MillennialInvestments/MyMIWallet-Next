# `php spark health:cache`

## Purpose
Validates that CI4 writable cache directories exist and are writable.

## What it does
Checks:
- `writable/cache`
- `writable/debugbar`
- `writable/session`

For each path, it prints `OK` or `FAIL`, and outputs a final `overall=PASS` or `overall=FAIL`.

## Expected output
```
cache=OK (/path/to/writable/cache)
debugbar=OK (/path/to/writable/debugbar)
session=OK (/path/to/writable/session)

overall=PASS
```

## Notes
- This command is **read-only**.
- Use `fix:503` if you want automatic cache clearing (safe-guarded) after a bootstrap failure.
