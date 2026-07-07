# GT-002-01F How-It-Works Content and Public Theme Remediation

## Objective

Build out `/How-It-Works` with real user-facing content and ensure `/How-It-Works/Personal-Budgeting` renders through the public theme layout family.

## Scope

- `HowItWorksController`
- `app/Views/themes/public/how_it_works/index.php`
- `app/Modules/Blog/Views/HowItWorks/Personal_Budgeting.php`

## Changes

- Forces mapped How-It-Works pages through `renderPublic(...)`.
- `renderPublic(...)` wraps content with `themes/public/layouts/index`.
- Adds a complete `/How-It-Works` overview page.
- Replaces the legacy Personal Budgeting page with a public-theme content section.
- Leaves sibling How-It-Works pages for separate validation and Golden Tasks if confirmed mismatches remain.

## Safety

No production mutation was performed.

No production database mutation was performed.

No production rollback was performed.
