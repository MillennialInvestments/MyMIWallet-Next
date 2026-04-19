# Resolution: login-routes.txt

## Scope
- Login route declarations.

## Findings
- `GET login` -> `AuthController::login`.
- `POST login` -> `AuthController::attemptLogin`.
- Legacy `index.php/login` GET+POST preserved for backward compatibility.

## Root Cause
- No broken login route mapping identified.

## Fix Status
- No code change required.

## Validation
- Confirmed route mapping and controller method existence.

## Next Step
- Continue tracing only POST submit path when debugging login failures.
