# Ops / Observability

- Dedicated daily snapshot command is active: `php spark gtm:health:snapshot`.
- Snapshot output: `docs/launch/daily_health_snapshot.md` (idempotent overwrite).
- Snapshot includes:
  - Route count + list
  - Filter summary
  - Active cache backend
  - Logger handlers
  - Environment flags
  - External API policy summary (now including `ExternalApiPolicy` provider caps/backoff)

## Result
- **PASS** for ops observability launch requirement.
