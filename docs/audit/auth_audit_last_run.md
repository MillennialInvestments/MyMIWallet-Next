# Auth Audit — Last Run

## Executive summary
- Tests executed: 30
- Passed: 22
- Failed: 6
- Warnings: 2
- Info: 1
- Health score: 73% (FAIL)

## Failing test cases
- **Registration: Valid registration** (FAILURE): Stored password hash does not verify.
- **Forgot Password: Valid email reset request** (FAILURE): Exception thrown.
- **Reset Password: Valid token reset** (FAILURE): Valid reset failed: Validation failed
- **Reset Password: Token reuse attempt** (FAILURE): Initial reset failed: Validation failed
- **Email Delivery: Registration activation** (FAILURE): Exception thrown.
- **Email Delivery: Reset password** (FAILURE): Exception thrown.
- **Audit: Seed user** (WARNING): Seeder failed to run.
- **Audit: Ensure dedicated test user** (WARNING): Unable to provision audit user.

## Error signatures
- Registration: Valid registration: Stored password hash does not verify.
- Forgot Password: Valid email reset request: {"message":"trim(): Argument #1 ($string) must be of type string, null given","file":"\/home\/mymiteam\/mymiwallet\/site\/current\/vendor\/codeigniter4\/framework\/system\/View\/View.php","line":206}
- Reset Password: Valid token reset: Valid reset failed: Validation failed
- Reset Password: Token reuse attempt: Initial reset failed: Validation failed
- Email Delivery: Registration activation: {"message":"trim(): Argument #1 ($string) must be of type string, null given","file":"\/home\/mymiteam\/mymiwallet\/site\/current\/vendor\/codeigniter4\/framework\/system\/View\/View.php","line":206}
- Email Delivery: Reset password: {"message":"trim(): Argument #1 ($string) must be of type string, null given","file":"\/home\/mymiteam\/mymiwallet\/site\/current\/vendor\/codeigniter4\/framework\/system\/View\/View.php","line":206}
- Audit: Seed user: {"message":"Call to a member function call() on null"}
- Audit: Ensure dedicated test user: Unable to provision audit user.

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