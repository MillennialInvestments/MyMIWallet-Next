# GT-002-02A Post-Fix Production Smoke

## Result

`/Free/register` and `/Beta/register` no longer return 404.

## Production smoke

- `/Free/register` direct: `302`
- `/Free/register` redirect target: `https://www.mymiwallet.com/register`
- `/Free/register` followed: `200`
- `/Beta/register` direct: `302`
- `/Beta/register` redirect target: `https://www.mymiwallet.com/register`
- `/Beta/register` followed: `200`

## Register page signals

- Registration page title present.
- Create account copy present.
- Register form present.
- CSRF token present.
- Email field present.
- Password field present.

## Safety

No login POST was submitted.

No registration POST was submitted.

No account was created.

No email was sent.

No production database mutation was performed.

No production rollback was performed.
