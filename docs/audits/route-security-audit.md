# Route Security Audit

## Findings
1. Dynamic registration routes such as `/Discord/register` and `/{source}/register/{ref}` were defined, but filter exceptions only explicitly covered `register` and `register/*`, leaving a likely auth/CSRF mismatch for source-prefixed registration URLs.
2. `Routes.php` contained a duplicate `Purchase/Memberships/Success` route definition.
3. Premium-sensitive API endpoints existed outside the user controllers (`InvestmentsAPIController`, `SolanaAPIController`, `ChatAPIController`).

## Fixes Applied
- Added `*/register` and `*/register/*` to auth-check and CSRF registration exceptions.
- Removed the duplicate memberships success route.
- Added premium enforcement to premium-sensitive API endpoints for investments analytics and Solana swap flows.
- Updated `ChatAPIController` to resolve membership via `PremiumEntitlementService` instead of its own legacy tier lookup.

## Remaining Risks
- Additional legacy API endpoints may still expose premium-adjacent data indirectly and should be reviewed before launch.
- Public preview routes intentionally remain public and should stay read-only.
