# Priority: Authentication Context Consistency

## Scope
Ensure auth/context helpers resolve consistently across modules and controllers.

## Target Errors
- Undefined helper methods for customer/user context
- Session-based ID lookups returning null in authenticated routes
- Downstream service calls failing due to missing user context

## Constraints
- Keep fixes focused to shared helpers and controller guards
- No auth provider redesign
- Preserve existing route behavior

## Completion Criteria
- Auth context errors stop appearing in logs
- PR(s) merged with regression-safe guards
- Task moved to /done

## Notes (Human)
This priority protects cross-module reliability for dashboard, alerts, and wallet features.
