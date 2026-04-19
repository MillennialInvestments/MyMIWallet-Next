# Resolution: register-routes.txt

## Scope
- Register route declarations.

## Findings
- `GET register` -> `AuthController::register`.
- `POST register` -> `AuthController::attemptRegister`.
- `index.php/register` GET+POST fallbacks exist and also target `AuthController`.

## Root Cause
- No route mismatch for registration flow.

## Fix Status
- No code change required.

## Validation
- Confirmed route entries in `app/Config/Routes.php`.

## Next Step
- Keep campaign/referral register aliases (`Discord/register`) under same controller path.
