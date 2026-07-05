# GT-001E-B Broker Remediation Plan

## Status

Planning only. No route changes, no guard changes, no controller restoration, no production mutation, no database mutation, and no external API calls.

## Evidence

- Production base: 44e7a87469750e994c005bddad00de5177dddf8a
- API/Broker routes registered: 81
- Explicit API/Broker route guards: 0
- Missing Broker handler files: 77
- Budget cross-controller routes: 4
- External-fetch review routes: 60
- Mutation review routes: 7
- User-auth read routes: 10

## Existing Related Controllers

- app/Modules/APIs/Controllers/BrokerSmokeAPIController.php
- app/Modules/APIs/Controllers/BudgetController.php
- app/Modules/APIs/Controllers/WalletsAPIController.php
- app/Modules/User/Controllers/BudgetController.php

## Remediation Buckets

1. Restore only routes with confirmed active product ownership.
2. Redirect newer account-linking and wallet routes to Wallets API where equivalent behavior already exists.
3. Guard legacy Broker routes before any public exposure decision.
4. Deprecate orphaned routes only after owner approval.
5. Replace external-fetch routes with service-backed, token-guarded, non-GET mutation-safe equivalents.

## Proposed Next Golden Tasks

- GT-001E-B1: Build full Broker route remediation matrix.
- GT-001E-B2: Owner decision pass for restore, redirect, guard, deprecate, or replace.
- GT-001E-B3: Implement safest first Broker guard patch after approval.
- GT-001E-B4: Validate Wallets API replacement coverage.
- GT-001E-B5: Production smoke and GTM score update.

## Owner Decision Required

Before implementation, decide whether API/Broker should remain a supported service surface or become a deprecated compatibility layer behind explicit guards.
