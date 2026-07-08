# GT-002-02A Registration Legacy Alias 404 Fix

## Objective

Fix confirmed 404 behavior for:

- `/Free/register`
- `/Beta/register`

## Fix

Add safe GET redirects from legacy public registration aliases to `/register`.

## Safety

No login POST was submitted.

No registration POST was submitted.

No account was created.

No email was sent.

No production database mutation was performed.

No production rollback was performed.
