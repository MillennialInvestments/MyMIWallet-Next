# GT-001F-B1 Alerts Route Remediation Matrix

## Status
Report-only. No route mutation, no guard mutation, no controller mutation, no database mutation, no external API calls, and no production mutation.

## Counts
- Total Alerts route reference rows: 99
- Internal-token guarded rows: 8
- Unguarded review rows: 91
- External/send/marketing review rows: 28
- Mutation review rows: 30

## Owner Decision Matrix
- Keep internalToken on existing guarded internal automation routes.
- Do not add apiToken to all Alerts routes blindly.
- Separate read-only routes from mutation, send, process, fetch, generate, social, signing, and key routes.
- Next implementation must patch only owner-approved low-risk routes.

## Next Gate
GT-001F-B2 owner decision pass before any route guard patch.
