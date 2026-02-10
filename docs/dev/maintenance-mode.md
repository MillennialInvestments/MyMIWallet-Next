# Maintenance Mode

## Overview
MyMI Wallet uses a global `MaintenanceModeFilter` to safely route public traffic to `/Maintenance` when `app.maintenanceMode=true`.

## Behavior
When enabled:
- Public web requests are redirected to `/Maintenance` with status `503`.
- `Retry-After` header is returned (default `600` seconds).
- CLI/Spark commands are bypassed.
- API and operations paths remain online.
- Admin users (permission/group-based) are allowed through.

## Exempt Routes
- `/Maintenance`
- `/Support`
- `/API/*`
- `/Management/*`
- `/Ops/*`
- `/chat/*`
- Any CLI execution

## Configuration
Set in `.env`:

```dotenv
app.maintenanceMode=true
app.maintenanceMessage="We’re performing scheduled maintenance"
app.maintenanceETA="ETA: 8:30 PM UTC"
app.maintenanceRetryAfter=600
```

## Public Page Content
`MaintenanceController` dynamically scans docs markdown content from:
- `docs/product`
- `docs/marketing`
- `docs/mdit`
- `docs/discord`
- `docs/standards/summary.md` (if present)

It extracts light markdown metadata (headings, bullets, summary text) for ecosystem cross-promotion.
