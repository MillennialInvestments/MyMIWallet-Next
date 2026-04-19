# Resolution: js-submit-redirect.txt

## Scope
- Broad JS submit/redirect hit list.

## Findings
- Active auth submit instrumentation resides in `public/assets/js/login-init.js` and does not call `preventDefault()`.
- Large portions of scan output are third-party/minified assets and not part of auth form execution path.

## Root Cause
- No active JS submit interception root cause found for auth forms.

## Fix Status
- No code change required.

## Validation
- Verified active auth script path and behavior.

## Next Step
- Exclude vendor/minified trees from future auth-focused JS scans to reduce noise.
