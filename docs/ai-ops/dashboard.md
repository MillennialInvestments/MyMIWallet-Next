# AI Ops Management Dashboard

## Overview

The dashboard provides real-time visibility into AI spend, usage, and controls. It is built with the existing Management module (Bootstrap / NK block style) and uses Fetch API to retrieve JSON from the AI Ops endpoints.

## Access URLs
- **CI4 Dashboard:** `https://mymiwallet.com/Management/AiOps` (proxied to the main app on port `9010`).
- **n8n Webhooks/Base URL:** `https://aiops.mymiwallet.com` (port `8500` behind Nginx).
- **Chat UI:** `https://chat.mymiwallet.com` (port `8300` behind Nginx).

## UI behavior

- **Master Switch:** global toggle that disables all AI automation when OFF.
- **Subsystem toggles:** Marketing, Alerts, Analytics, and Codex. Disable only the affected subsystem without touching the master switch.
- **Override toggle:** Admin-only, requires confirmation modal; allows temporary operation beyond caps. Every change is logged with user/IP/UA/reason.
- **Month selector:** Defaults to current month; updates the status cards via Fetch.
- **Cards:** Show Cap USD, Used USD, % Used (with progress bar), Requests, Cache Hits, Errors per subsystem.
- **Run Now buttons:** Trigger Marketing daily, Alerts digest, Analytics weekly, and Caps check endpoints.
- **Event log table:** Shows last 200 events with timestamp, subsystem, event type, and message/meta.

## Roles and permissions

- Access restricted to admins via the existing permission filter.
- Override actions require admin role; non-admins cannot toggle override or caps.

## Toggle explanations

- **Master kill-switch:** Stops all AI Ops calls; run endpoints return `{status:'error', message:'AI Ops disabled'}`.
- **Subsystem toggles:** Disable only one area (e.g., marketing) without impacting others.
- **Automation levers:** Surface the granular automation toggles from `SiteSettings` for marketing/alerts/analytics/docs alignment.
- **Override beyond caps:** When ON, `assertCanRun` permits runs even if caps are exceeded, but events are logged and alerts still fire.

## Screenshots

Insert UI screenshots here after implementation:

1. Dashboard overview with switches and cards.  
2. Event log table.  
3. Cap edit modal and Run Now buttons.  
4. Override confirmation modal.
