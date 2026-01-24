# Spark Command: `php spark audit:psr4`

## Purpose
The `audit:psr4` command scans the `/app` tree and validates that class namespaces and filenames comply with PSR-4. It ignores directories excluded from Composer autoloading (`app/_legacy` and `app/Database/Migrations`) while still reporting legacy file counts for visibility.

## Behavior
The command parses each PHP file for:
- Namespace declarations
- Class/interface/trait/enum names
- Expected PSR-4 file paths

It detects:
- Filename mismatches
- Directory mismatches
- Multiple class declarations per file
- Legacy suffixes (`.orig.php`, `.bak.php`, `.disabled.php`)

### Sample Output
```
❌ App\Controllers\Home
  Expected: app/Controllers/Home.php
  Found:    app/Controllers/LandingPageController.php

✅ App\Models\UserModel
```

## Exit Codes
- `0`: No violations
- `1`: Violations detected

## Flags
- `--ci`: Suppresses verbose output and returns a non-zero exit code on any issue.
- `--json`: Outputs machine-readable JSON for dashboards and automation.

## JSON Schema (Excerpt)
```json
{
  "summary": {
    "total_classes": 412,
    "psr4_ok": 409,
    "violations": 3,
    "legacy_files": 7,
    "last_scan": "2026-01-24 06:12:00"
  },
  "issues": [
    {
      "type": "filename-mismatch",
      "class": "App\\Controllers\\Home",
      "expected": "app/Controllers/Home.php",
      "found": "app/Controllers/LandingPageController.php"
    }
  ]
}
```
