# Pending: Distribution platform adapters

## remaining work
- Replace stub distribution methods with platform adapters (Discord, LinkedIn, X, Email).
- Persist full per-attempt response payloads with retry metadata.

## blockers
- API credentials and webhook destinations not standardized across envs.

## dependencies
- Secret management and outbound rate limiter policies.

## recommended next implementation order
1. Implement adapter interfaces.
2. Add retry/backoff queue worker.
3. Add delivery health metrics dashboard.
