# CSRF API Exceptions

## Scope
The global CSRF filter excludes API endpoints so JSON clients and service-to-service calls can remain stateless.

## Configuration
- `app/Config/Filters.php`
  - Global `csrf` filter enabled.
  - Exceptions: `API/*`, `api/*`.

## Expectations for API Clients
- Auth is handled by session, JWT, or API tokens depending on the endpoint—**not** by CSRF.
- Browser-based forms remain CSRF-protected; only explicit API routes are exempt.

## Notes
- If a new API route is added under a different prefix, evaluate whether it needs to be added to the CSRF exception list.
- Webhooks should either live under an API prefix or explicitly define their own CSRF exemption.
