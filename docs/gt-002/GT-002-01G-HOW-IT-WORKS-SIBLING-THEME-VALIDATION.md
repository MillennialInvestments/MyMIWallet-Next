# GT-002-01G How-It-Works Sibling Page Theme Validation

## Objective

Validate every public How-It-Works page for HTTP availability, public theme signals, content signals, and standalone HTML risks.

## Status

CONFIRMED_DEFECT_FOUND

## Evidence

- `docs/gt-002/evidence/GT-002-01G/how-it-works-routes.txt`
- `docs/gt-002/evidence/GT-002-01G/how-it-works-controller-rendering.txt`
- `docs/gt-002/evidence/GT-002-01G/how-it-works-standalone-html-findings.txt`
- `docs/gt-002/evidence/GT-002-01G/how-it-works-view-files.txt`
- `docs/gt-002/evidence/GT-002-01G/how-it-works-public-smoke-matrix.tsv`


## Result summary

- 12 How-It-Works public pages passed HTTP/content/theme smoke.
- 1 How-It-Works public page failed public theme signal validation.
- Confirmed defect: `/How-It-Works/alerts`.
- Golden Task created: `docs/gt-002/golden-tasks/GT-002-01G-01-how-it-works-alerts-public-theme.md`.

## Classification rules

- `PASS`: HTTP 200, content signal present, public theme signal present.
- `CONTENT_REVIEW`: HTTP 200 and theme signal present, but content signal weak or cleanup needed.
- `FAIL_CONFIRMED`: non-200 response or missing public theme signal.
- `SPECIAL_CASE_ALLOWED`: intentionally non-standard public page with documented reason.

## Initial note

GT-002-01F fixed `/How-It-Works` and `/How-It-Works/Personal-Budgeting`. This lane validates all sibling How-It-Works pages and captures any remaining confirmed defects as separate Golden Tasks.

## Known cleanup candidate

- `/How-It-Works/Personal-Budgeting` smoke output showed `MyMI Walletworkflows`; this should be corrected if present in source or rendered output.

## Safety

No production mutation was performed.

No production database mutation was performed.

No production rollback was performed.
