# GT-002-02 Auth Controlled Test Notes

## Activation endpoints

The baseline GET smoke returned:

- `/activate 429`
- `/activate-account 429`

These are not fixed in this baseline lane because activation routes may require a valid token, email, user state, or rate-limit-safe test case.

Classification:

`NEEDS_CONTROLLED_TOKEN_TEST`

## Registration mutation path

Runtime logs include historical registration/auth failures:

- `register_password_hash_invalid`
- `Stored password hash failed post-registration verification`
- historical `trim(): Argument #1 ($string) must be of type string, null given` through `Auth/register.php`

These are not fixed in this baseline lane because confirming them requires a controlled registration mutation test.

Classification:

`NEEDS_CONTROLLED_MUTATION_TEST`

## Safety

No login POST was submitted.

No registration POST was submitted.

No password reset POST was submitted.

No activation email was sent.

No production database mutation was performed.
