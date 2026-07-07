# GT-002-01D Public Theme Layout Consistency Audit

## Objective

Confirm all public-facing MyMI Wallet pages use the public theme layout family under:

`app/Views/themes/public/layouts/*`

## Status

IN_PROGRESS

## Certification rule

A public-facing page passes only when its controller/view path renders through the public theme system and does not use a standalone layout outside `app/Views/themes/public/layouts/*`.

## Evidence files

- `docs/gt-002/evidence/GT-002-01D/public-layout-files.txt`
- `docs/gt-002/evidence/GT-002-01D/all-routes.txt`
- `docs/gt-002/evidence/GT-002-01D/public-route-candidates.txt`
- `docs/gt-002/evidence/GT-002-01D/controller-render-calls.txt`
- `docs/gt-002/evidence/GT-002-01D/view-layout-references.txt`
- `docs/gt-002/evidence/GT-002-01D/possible-standalone-html-views.txt`

## Initial public route groups to certify

- Homepage
- How It Works
- Blog
- Knowledgebase
- Features
- Legal pages
- Subscribe
- Contact / support public pages
- Public marketing pages
- Public redirect aliases

## Pass criteria

- Public layout files exist under `app/Views/themes/public/layouts/*`.
- Public controllers use `renderTheme(...)` or a view/layout path that resolves to the public layout family.
- Public views do not contain standalone full HTML documents unless explicitly intended as a special-case shell.
- Exceptions are documented with a reason and owner decision.
- Confirmed defects become atomic Golden Tasks.

## Confirmed defects

None yet.

## Safety

No production mutation was performed.

No production database mutation was performed.

No production rollback was performed.
