# Phase 3C: Funnel Attribution + Community Analytics

## Objective

Track social/community marketing performance from generated content to clicks, conversions, memberships, and revenue attribution.

No external posting.
No Zapier sends.
No TBI Marketing exports.
Analytics only.

## Required Build

1. Tables:
- bf_social_tracking_links
- bf_social_click_events
- bf_social_conversion_events
- bf_social_funnel_metrics

2. Service:
- app/Services/SocialTrackingService.php

3. Spark commands:
- marketing:social:funnel-audit
- marketing:social:create-sample-tracking
- marketing:social:metrics-refresh

4. API endpoints:
- API/Management/createTrackingLink
- API/Management/getTrackingLinks
- API/Management/recordSocialClick
- API/Management/recordSocialConversion
- API/Management/getCommunityMetrics
- API/Management/getCampaignMetrics
- API/Management/getPlatformMetrics

5. UI:
- Management/Marketing/Funnel-Analytics

6. Safety:
- no posting
- no Zapier sends
- no TBI exports
- analytics only

7. Validation:
- marketing:communities:smoke-test
- marketing:social:orchestration-smoke-test
- marketing:social:generation-smoke-test
- marketing:social:campaign-smoke-test
- marketing:social:funnel-audit
- revenue:scan
