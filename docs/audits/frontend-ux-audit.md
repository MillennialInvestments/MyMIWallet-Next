# Frontend / UX Premium Audit

## Findings
1. Registration fields for email and username were not repopulating on validation failure.
2. Swap links in shared dashboard layouts could send free users directly into premium-only flows.
3. Frontend fetch handling did not distinguish premium 403 responses from generic failures.

## Fixes Applied
- Added `set_value()` repopulation for registration email and username fields.
- Updated dashboard sidebar/footer swap links to show an upgrade path when the current user lacks `exchange.swap`.
- Added premium-aware fetch handling and redirect support in the shared JS helpers.

## Remaining Risks
- Many older views still contain hard-coded premium marketing copy and legacy UX patterns.
- Not every legacy jQuery AJAX flow is standardized yet; the highest-risk premium user paths were prioritized.
