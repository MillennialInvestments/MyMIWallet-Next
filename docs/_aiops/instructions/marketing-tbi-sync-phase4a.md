# Phase 4A: MyMI Wallet to TBI Marketing Sync Client

## Objective

Add a safe disabled-by-default outbound sync client so MyMI Wallet can send approved social export jobs to TBI Marketing.

## Required Build

1. Service:
- app/Services/TbiMarketingExportService.php

2. Command:
- marketing:social:tbi-sync-smoke-test

3. Update:
- app/Commands/Marketing/SocialTbiExport.php
- MarketingAdminController::sendTbiMarketingExport()

4. Docs:
- docs/integrations/tbi-marketing/phase4a_sync_client.md

## Safety

- Disabled by default.
- Requires MYMI_MARKETING_EXPORT_ENABLED=true.
- Requires TBI_MARKETING_API_BASE.
- Requires TBI_MARKETING_API_KEY.
- No external request if missing config.
- All attempts log to bf_social_delivery_logs.
- Only approved/queued export jobs can send.
