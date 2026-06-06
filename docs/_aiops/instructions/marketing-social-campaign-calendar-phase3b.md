# Phase 3B: Social Campaign Calendar + Scheduling Layer

## Objective

Add campaign/calendar scheduling on top of generated social drafts.

## Required Build

1. Tables:
- bf_social_campaigns
- bf_social_campaign_posts
- bf_social_campaign_schedule

2. Service:
- app/Services/SocialCampaignService.php

3. Commands:
- marketing:social:campaign-smoke-test
- marketing:social:create-sample-campaign
- marketing:social:schedule-due

4. API:
- API/Management/createSocialCampaign
- API/Management/getSocialCampaigns
- API/Management/addPostToSocialCampaign
- API/Management/scheduleSocialCampaignPost
- API/Management/getSocialCampaignSchedule

5. UI:
- Management/Marketing/Social-Campaigns

6. Safety:
- Scheduling only changes internal rows.
- Do not send to Zapier automatically.
- Do not post externally.

7. Validation:
- community smoke
- orchestration smoke
- generation smoke
- campaign smoke
- revenue scan
