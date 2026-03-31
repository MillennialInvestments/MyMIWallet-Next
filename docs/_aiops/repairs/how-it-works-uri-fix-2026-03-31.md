# How It Works URI Access Fix (2026-03-31)

## Issue Summary
Runtime failures were triggered by direct access to protected `IncomingRequest::$uri`.

## Evidence
- Error pattern: cannot access protected property `IncomingRequest::$uri`.
- Primary target: `HowItWorksController` and similar controller patterns.

## Root Cause
Controllers and views used `$this->request->uri` and `$request->uri`, which is not valid in CI4/PHP 8.2.

## Files Changed
- Multiple controller/view files across `app/` where request URI property access was used.

## Exact Fix Strategy
- Replaced direct property access with `getUri()` accessors.
- Preserved segment reads using `->getUri()->getSegment()`.

## Risks
- Low risk; this aligns with CI4 request API.

## Test Steps
- `php spark routes`
- `php spark logs:errors`

## Outcome
Protected property runtime errors are now normalized away from direct request-property usage.
