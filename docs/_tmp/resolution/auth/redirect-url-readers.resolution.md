# Resolution: redirect-url-readers.txt

## Scope
- Reader path that consumes `redirect_url` after auth success.

## Findings
- Active reader remains `App\Controllers\AuthController::determineRedirectDestination()`.
- Reader now consumes values that were normalized at all known upstream writers.
- Final destination logging is now explicit and request-correlated.

## Fix Status
- Completed (reader + writer normalization aligned).

## Validation
- Verified helper-backed sanitize path plus unit coverage for redirect edge cases.

## Next Step
- Keep legacy controller unchanged unless route mapping explicitly targets it.
