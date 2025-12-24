# Communities Automation CRON Plan

- `/API/Management/cronGenerateDailyCommunityPosts`
  - Runs daily 6:00am UTC
  - Pulls top summaries from `bf_marketing_scraper`
  - Generates platform variants with SocialPostFormatter
  - Saves to `bf_social_generated_posts` as `draft`

- `/API/Management/cronQueueDistribution`
  - Runs hourly
  - Picks approved drafts and queues payloads into `bf_social_distribution_queue`
  - Safe-by-default: only approved items are queued

- Manual review required before any external posting. Zapier/Discord exports remain opt-in.
