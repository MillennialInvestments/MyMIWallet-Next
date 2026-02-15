# Auth Audit — Last Run

## Executive summary
- Tests executed: 29
- Passed: 25
- Failed: 3
- Warnings: 1
- Info: 1
- Health score: 86% (WARNING)

## Failing test cases
- **Registration: Valid registration** (FAILURE): Stored password hash does not verify.
- **Reset Password: Valid token reset** (FAILURE): Valid reset failed: Validation failed
- **Reset Password: Token reuse attempt** (FAILURE): Initial reset failed: Validation failed
- **Session & Cookie: Secure cookie alignment** (WARNING): App/Session secure cookie flags are not aligned.

## Error signatures
- Registration: Valid registration: Stored password hash does not verify.
- Reset Password: Valid token reset: Valid reset failed: Validation failed
- Reset Password: Token reuse attempt: Initial reset failed: Validation failed
- Session & Cookie: Secure cookie alignment: {"app_cookie_secure":true,"session_cookie_secure":false}

## Root cause analysis
- Review authentication validation, email transport configuration, and session/cookie settings for misalignment.
- Confirm reset token generation and throttling behavior to avoid abuse.
- Verify remember-me token storage and secure cookie expectations.

## Files/configs to review
- app/Config/Auth.php
- app/Config/Session.php
- app/Config/App.php
- Myth/Auth controllers/models

## Recommended fixes (INSTRUCTIONS ONLY)
- Resolve the failing test cases listed above before re-running `php spark auth:audit`.
- Address any config warnings (cookie domain, secure flags, SameSite settings, or CSRF settings).
- Validate email transport connectivity and From addresses if delivery tests failed.
- Investigate reset token throttling and remember-me persistence if warnings were reported.