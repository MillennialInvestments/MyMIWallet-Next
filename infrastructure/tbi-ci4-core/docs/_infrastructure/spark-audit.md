# Spark Audit

## Scope
Audit command naming, collisions, and registration readiness for infrastructure overlay commands.

## Commands provided by overlay
- `infra:api-inventory`
- `infra:integration-health`
- `infra:subsystem-inventory`
- `infra:toggle-audit`
- `infra:overlay-test`
- `infra:layer-audit`
- `infra:env-audit`
- `infra:certify`

## Findings
- Naming prefix `infra:` avoids collision with existing `ops:` and framework commands.
- Commands are CLI-safe and generate report artifacts without requiring API credentials.
- Fresh CI4 overlay requires explicit registration in `Config/Console.php`.

## Regression recommendation
- Add CI check running `php spark list` after overlay install in a clean CI4 fixture.
