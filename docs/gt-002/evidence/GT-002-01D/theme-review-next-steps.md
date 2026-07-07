# GT-002-01D Public Theme Review Next Steps

## Current audit state

This audit confirms public layout files exist and captures route/render evidence, but it does not yet certify every public-facing page.

## Remaining review counts

- `public-theme-route-matrix.tsv` contains rows marked `NEEDS_REVIEW`.
- `possible-standalone-html-views.txt` contains standalone HTML candidates.

## Required next step

Each `NEEDS_REVIEW` route must be classified as one of:

- `PUBLIC_THEME_PASS`
- `NOT_PUBLIC_PAGE`
- `SPECIAL_CASE_ALLOWED`
- `FAIL_CONFIRMED`

Each standalone HTML candidate must be classified as one of:

- `PUBLIC_THEME_PASS`
- `NOT_PUBLIC_PAGE`
- `SPECIAL_CASE_ALLOWED`
- `FAIL_CONFIRMED`

## Golden Task rule

Only `FAIL_CONFIRMED` rows become Golden Tasks.

## Known likely special cases

- error templates
- email layouts
- API docs
- dashboard layouts
- maintenance pages
- auth-specific layouts
- generated/static HTML assets

## Safety

No production mutation was performed.

No production database mutation was performed.

No production rollback was performed.
