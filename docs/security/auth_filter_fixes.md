# Auth Filter Audit & Fixes

## Summary of Findings

- **Global auth guard (`authcheck`) was missing multiple public paths** such as `/activate`, `/register/success`, `/pricing`, and lower-case `/blog` routes. This could redirect users to `/login` for public content.
- **`LoginFilter` allowlist did not include activation, resend, and provider callback routes**, which risked blocking auth-related flows if `login` was applied at the route-group level.

## Fixes Applied

1. **Expanded `authcheck` global exceptions** to include activation, registration success, blog/news (both case variants), pricing, and support routes so public content is not redirected to `/login`.
2. **Expanded `LoginFilter` reserved routes** to include activation, resend activation, registration success, and social auth provider callbacks so those routes can remain public when `login` is applied elsewhere.
3. **Added `routes:auth-audit` CLI command** to probe public routes and flag unauthenticated redirects/errors.
4. **Added `PublicRoutesAccessibleTest` feature test** to validate public endpoints remain accessible without authentication.

## Why It Broke

Public marketing and auth routes were **not uniformly represented in filter exceptions**, so the global `authcheck` filter could intercept them. In addition, the `LoginFilter` allowlist focused on basic auth endpoints but not all activation and OAuth callback routes used by the app.

## Prevention / Regression Protection

- **Run** `php spark routes:auth-audit` after route/filter changes to catch auth regressions early.
- **Keep** the public route inventory up to date when adding new marketing or auth endpoints.
- **Maintain** the feature test list for public pages to enforce 200/redirect behavior in CI.
