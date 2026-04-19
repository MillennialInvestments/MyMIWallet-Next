# Resolution: login-form-hooks.txt

## Scope
- Login submit behavior for `form[data-auth-form="login"]`.

## Findings
- `public/assets/js/login-init.js` submit listener is diagnostic-only.
- No `preventDefault()` in auth submit handler.
- Listener does not mutate `form.action` or hidden `redirect_url`.
- Enter-key vs button-submit diagnostics improved via `event.submitter`/active-element logging.

## Fix Applied
- Kept native submit behavior and added explicit in-code comment to prevent accidental interception.

## Validation
- Reviewed JS handler after patch.

## Next Step
- Retain diagnostics-only policy for auth submit hooks.
