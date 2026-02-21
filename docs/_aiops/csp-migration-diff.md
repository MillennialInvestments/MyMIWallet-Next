# CSP Migration Diff Report

## Scope
- Phase 0 safety toggle scaffolded via `CSP_STRICT_MODE`.
- Phase 1 nonce support enabled at config level and layout-level script tag updates applied.
- Phase 2 audit engine added with Markdown report output.

## Changed Files
- `.env.example`
- `app/Config/ContentSecurityPolicy.php`
- `app/Views/themes/dashboard/layouts/js-links_old.php`
- `app/Commands/AIOps/CspAudit.php`

## Notes
- No module-level view refactors were performed in this phase.
- `unsafe-inline` remains allowed unless `CSP_STRICT_MODE=true`.
- Audit report path: `docs/_aiops/audits/csp-audit-YYYYMMDD.md`.
