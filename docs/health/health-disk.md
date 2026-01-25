# `php spark health:disk`

## Purpose
Checks disk usage and inode utilization for the host to surface common 503 causes (disk or inode exhaustion).

## What it does
- Runs:
  - `df -h`
  - `df -i`
- Scans output for any usage **>90%**.
- Returns `PASS` when no thresholds are exceeded; otherwise returns `WARN`.

## Expected output
```
Disk usage (df -h)
----------------------------------------
...

Inode usage (df -i)
----------------------------------------
...

overall=PASS
```

## Notes
- This command is **read-only**; it does not delete files.
- Use `fix:503` if you want an orchestrated triage with logging.
