# Autoload Health Dashboard Widget

## Overview
The Autoload Health widget surfaces live PSR-4 compliance on the Management dashboard and highlights legacy drift.

## Data Source
Endpoint: `/API/Management/getAutoloadHealth`

Returns:
```json
{
  "total_classes": 412,
  "psr4_ok": 409,
  "violations": 3,
  "legacy_files": 7,
  "last_scan": "2026-01-24 06:12:00"
}
```

## Status Colors
- 🟢 **Green**: 0 violations
- 🟡 **Yellow**: 1–2 violations
- 🔴 **Red**: 3+ violations

## Optional Documentation Link
The widget links to `/docs/optimize/psr4_fixes_latest.md` for the most recent fix log.
