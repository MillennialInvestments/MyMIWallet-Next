# Resolution: auth-routes.txt

## Scope
- Active route/controller surface for login/register.

## Findings
- `/login` + `/index.php/login` map to `App\Controllers\AuthController` (`login`/`attemptLogin`).
- `/register` + `/index.php/register` map to `App\Controllers\AuthController` (`register`/`attemptRegister`).
- No explicit route entry points to `App\Legacy\Auth\Controllers\AuthController` for active login/register routes.

## Validation
- Added route-surface unit test (`AuthRouteSurfaceTest`) asserting active mappings and no legacy auth controller string.

## Next Step
- Keep route ownership with active controller; treat legacy controller as reference-only unless explicitly routed.
