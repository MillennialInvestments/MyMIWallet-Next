# GT-002-02A Registration Legacy Alias 404

## Status

CONFIRMED_DEFECT

## User-facing flow

Legacy/public registration aliases:

- `/Free/register`
- `/Beta/register`

## Observed result

GT-002-02 public auth GET smoke returned:

- `/Free/register  404`
- `/Beta/register  404`

## Expected result

Public registration CTA aliases should not return 404.

They should either:

- redirect safely to `/register`, or
- render the appropriate registration page, or
- be intentionally removed from all public CTAs and documented as deprecated.

## Evidence

- `docs/gt-002/evidence/GT-002-02/auth-public-get-smoke-matrix.tsv`
- `docs/gt-002/evidence/GT-002-02/auth-controller-surface.txt`
- `docs/gt-002/evidence/GT-002-02/auth-view-files.txt`

## Atomic Golden Task rule

This task is limited to resolving `/Free/register` and `/Beta/register` public 404 behavior.

Do not mutate production without explicit approval.

Do not create users.

Do not submit registration forms.

Do not mutate the production database.

Do not rollback production.
