# Frontend Incident Report

## Executive Summary
- Generated: 2026-02-21T13:56:18+00:00
- Total incidents: 6
- High severity count: 4
- Affected subsystems: Dashboard, Income
- Risk level: HIGH

## CSP Violations
### style-src
- Dashboard:1766 — Refused to apply inline style because it violates the following Content Security Policy directive: "style-src 'self'". Dashboard:1766

### script-src
- Dashboard:1901 — Refused to execute inline script because it violates the following Content Security Policy directive: "script-src 'self'". Dashboard:1901

## API Endpoint Failures
- `/API/Investments/getConfidenceHeatmap` — count: 1
- `/API/Investments/getForecastHighlights` — count: 1

## Root Cause Analysis
- JSON parse errors occur when frontend fetch logic expects JSON but receives an HTML 404 payload.
- Missing or mismatched API routes under `/API/*` produce 404 responses that cascade into parse failures.

## Fix Strategy (Non-breaking)
- Add safe fetch guard: check `response.ok` before parsing body.
- Verify response content type includes `application/json` before `response.json()`.
- Verify API route definitions and route groups in `app/Config/Routes.php`.
- Confirm rewrite behavior and `index.php` path assumptions in Nginx/CI4 routing.
- Deduplicate Meta Pixel initialization in shared layout files.
