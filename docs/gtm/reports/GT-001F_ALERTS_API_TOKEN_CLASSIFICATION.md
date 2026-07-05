# GT-001F Alerts API_TOKEN Classification

## Status

Discovery/report-only. No route mutation, no guard mutation, no controller restoration, no route deletion, no database mutation, no external API calls, and no production mutation.

## Purpose

Classify Alerts route and controller coverage before any API_TOKEN/internal-token guard patch.

## Counts

- Alerts route reference rows: 99
- Alerts API controller function rows: 101
- Alerts web controller function rows: 0
- Alerts route rows with apiToken: 0
- Alerts route rows with internalToken: 8
- Alerts route rows with any filter: 8

## Initial Classification

- Explicit apiToken/internalToken routes are confirmed guarded candidates.
- Unfiltered Alerts API routes require owner review before guard patching.
- Read routes must be separated from create/update/send/process routes.
- External fetch, send, signing, key-generation, and marketing/social routes require separate mutation review.

## Next Gate

GT-001F-B1 should produce a full Alerts route remediation matrix before any route guard mutation.
